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
    public function create()
    {
        return view('clients.create');
    }
    public function store()
    {
        $validator=$this->validateData();
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->with('modal','modalClient');
        }

        $client=Client::create($validator->validated());
        return redirect($client->path());
        return redirect('/clients');
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
    public function updateModal(Client $client,$modal)
    {
        $validator=$this->validateData();
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->with('modal',$modal);
        }

        $client->update($validator->validated());
        return redirect($client->path());
    }
    public function edit(Client $client)
    {
        return view('clients.edit',array('client'=>$client,'dataSales' => $this->dataSales));

    }

    public function update(Client $client)
    {
        $client->update( $this->validateArticle());
        return redirect($client->path());
    }
    public function validateArticle()
    {
        return request()->validate([
            'balance'=>['required','numeric','min:0'],
            'tel'=>['numeric','nullable'],
            'name'=>['required'],
            'email'=>['email','nullable'],
            'enterprise'=>'',
            'adress'=>'',
            'rfc'=>'',
        ]);
    }
    public function editBalance(Client $client)
    {
        return view('clients.balance',compact('client'));

    }

    public function updateBalance(Client $client)
    {
        $client->update(request()->validate([
            'balance'=>['required','numeric','min:0']
        ]));
        return redirect($client->path());
    }
    public function delete(Client $client)
    {
        $client->delete();

        return redirect('/clients');
    }

}
