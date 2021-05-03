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
            'tel'=>'numeric|min:0',
            'name'=>'require'
        ]);;
    }

}
