<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
    {
        $sales= Sale::all();
        return view('sales.index',compact('sales'));
    }
    public function show(Sale $sale)
    {
        return view('sales.show',compact('sale'));
    }
    public function create()
    {
        $products= Product::all();

        $clients= Client::all();
        $data=[
            'clients'=>$clients,
            'products'=>$products
        ];
        return view('sales.create',compact('data'));
    }

    public function store(Request $request)
    {
        Sale::create($this->validateTicket());

        return redirect('/sales');
    }
    public function edit(Sale $sale)
    {
        $products= Product::all();

        $clients= Client::all();
        $data=[
            'clients'=>$clients,
            'products'=>$products
        ];
        // dd($sale);
        return view('sales.edit',compact('sale','data'));
    }
    public function update(Request $request)
    {
        Sale::create($this->validateTicket());

        return redirect('/sales');
    }
    public function validateTicket()
    {

        // dd(request());
        $data = request()->validate([
            'client_id'=>'exists:clients,id',
            'product_id'=>'exists:products,id',
            'price'=>'numeric|min:0',
            'kg'=>'numeric|min:0',
            'inv'=> 'required'
        ]);
        $client = Client::find(request()->client_id);
        $product= Product::find(request()->product_id);

        $data['client_name'] =$client->name;
        $data['product_name'] = $product->name;

        $saldo = request()->kg * request()->price;
        $data['balance'] =$client->balance+$saldo;

        $client->balance +=$saldo;
        $client->save();

        $data['transaction'] = $saldo;

        if(request()->inv=='store'){
            $data['inv_store']=request()->kg;
            $data['inv_house']=0;
            $product->inv_store-=request()->kg;
        }else{
            $data['inv_house']=request()->kg;
            $data['inv_store']=0;
            $product->inv_house-=request()->kg;
        }
        $product->save();
        unset($data['kg']);
        unset($data['inv']);

        return $data;
    }
}
