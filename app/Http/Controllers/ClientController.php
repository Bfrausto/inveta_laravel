<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    protected $dataSales;
    public function __construct(){
        $this->middleware(function ($request, $next) {
            $this->dataSales=Session::get("data");
            return $next($request);
        });
    }

    public function index()
    {
        $clients= Client::all();
        return view('clients.index',array('clients'=>$clients,'dataSales' => $this->dataSales));
    }

    public function show(Client $client)
    {
        return view('clients.show',array('client'=>$client,'dataSales' => $this->dataSales));
    }

    public function store(Request $request)
    {
        $validator=$this->validateData();
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($request->input())
                        ->with('modal','modalClient');
        }
        $client=Client::create($validator->validated());
        return redirect('/clients');
    }

    public function update(Client $client,$modal,Request $request)
    {
        $validator=$this->validateData();
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($request->input())
                        ->with('modal',$modal);
        }

        $client->update($validator->validated());
        return redirect(route('clients'));
    }
    public function validateData()
    {
        return Validator::make(request()->toArray(), [
            'balance'=>['required','numeric','min:0'],
            'tel'=>['numeric','nullable'],
            'name'=>['required'],
            'email'=>['email','nullable'],
            'enterprise'=>'',
            'adress'=>'',
            'rfc'=>'',
        ]);
    }

    public function delete(Client $client)
    {
        $client->delete();
        return redirect('/clients');
    }

}
