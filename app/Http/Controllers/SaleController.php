<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SaleController extends Controller
{
    protected $dataSales;
    public function __construct(){
        $this->middleware(function ($request, $next) {

                $products= Product::all();

                $clients= Client::all();
                $this->dataSales =[
                    'clients'=>$clients,
                    'products'=>$products
                ];
                Session::put('data', $this->dataSales);

            return $next($request);
        });
    }
    public function index()
    {
        $sales= Sale::all();

        return view('sales.index',array('sales'=>$sales,'dataSales' => $this->dataSales));
    }
    public function show(Sale $sale)
    {
        return view('sales.show',array('sale'=>$sale,'dataSales' => $this->dataSales));
    }
    public function storeModal()
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
    public function update(Sale $sale)
    {
        $sale->update($this->validateTicket());

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
        // $product->save();
        unset($data['kg']);
        unset($data['inv']);

        return $data;
    }
    public function delete(Sale $sale)
    {
        $sale->delete();

        return redirect('/sales');
    }
}
