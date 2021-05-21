<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Client;
class ClientController extends Controller
{
    public function index()
    {
        $clients= Client::all();
        return view('clients.index',compact('clients'));
    }
    public function show(Client $client)
    {
        return view('clients.show',compact('client'));
    }
    public function create()
    {
        return view('clients.create');
    }
    public function store()
    {

        Client::create($this->validateArticle());

        return redirect('/clients');
    }
    public function validateArticle()
    {
        return request()->validate([
            'balance'=>['required','numeric','min:0'],
            'tel'=>['numeric','nullable'],
            'name'=>'required',
            'email'=>['email','nullable'],
            'enterprise'=>'',
            'adress'=>'',
            'rfc'=>'',
        ]);
    }
    public function edit(Client $client)
    {
        return view('clients.edit',compact('client'));

    }

    public function update(Client $client)
    {
        $client->update($this->validateArticle());
        return redirect($client->path());
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

}
