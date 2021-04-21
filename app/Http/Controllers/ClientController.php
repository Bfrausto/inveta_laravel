<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Client;
class ClientController extends Controller
{
    public function store(Request $request)
    {
        // $name = $request->name;
        // $balance = $request->balance;

        $request->validate([
            'balance'=>'numeric|min:0',
            'tel'=>'numeric|min:0',
        ]);
        $client=new Client;
        
        $client->name=$request->name;
        $client->balance=$request->balance;
        $client->enterprise=$request->enterprise;
        $client->adress=$request->adress;
        $client->email=$request->email;
        $client->tel=$request->tel;
        $client->rfc=$request->rfc;
        $client->save();
        
        // dd($request->all());
        return $this->show();
    }
    public function show()
    {
     
        $clients=Client::all();
        // echo $name,$balance;
        // dd($request);
        return view('show_clients',compact('clients'));
    }
}
