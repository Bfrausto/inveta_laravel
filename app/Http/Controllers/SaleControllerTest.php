<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\ProductSale;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SaleControllerTest extends Controller
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
        $initDate = request('start_at');
        $endDate = request('end_at');

        $sales =
            Sale::
            whereBetween('created_at', [($initDate?$initDate:'0000-00-00'), ($endDate?Carbon::createFromFormat('Y-m-d', $endDate)->endOfDay():now())])
            ->where(request('client_id')?[['client_id','=', request('client_id')]]:[['client_id','!=',request('client_id')]] )
            ->orderBy('created_at')
            ->get();
        $clients= Client::all();
        return view('sales.index',['sales'=>$sales,'clients'=>$clients,'dataSales' => $this->dataSales]);
    }
    public function report(){

        $initDate = request('start_at');
        $endDate = request('end_at');

        $sales =
            Sale::
            whereBetween('created_at', [($initDate?$initDate:'0000-00-00'), ($endDate?Carbon::createFromFormat('Y-m-d', $endDate)->endOfDay():now())])
            ->selectRaw("SUM(total) as total")
            ->selectRaw("SUM(paid) as paid")
            ->selectRaw("client_id,created_at")
            ->groupBy('client_id')

            ->orderBy('created_at')
            ->get();
            // $sales2 =

        // dd($sales);
        $clients= Client::all();
        return view('sales.report',['sales'=>$sales,'clients'=>$clients,'dataSales' => $this->dataSales]);
    }
    public function generateCSV(Request $request)
    {
        $initDate = request('start_at');
        $endDate = request('end_at');
        $ids=array_unique(array_values(array_filter(explode((','),request('ids')))));
        $sales =request('ids')?
            Sale::
            whereBetween('created_at', [($initDate?$initDate:'0000-00-00'), ($endDate?Carbon::createFromFormat('Y-m-d', $endDate)->endOfDay():now())])
            ->selectRaw("SUM(total) as total")
            ->selectRaw("SUM(paid) as paid")
            ->selectRaw("client_id,created_at")
            ->whereIn('client_id',$ids)
            ->groupBy('client_id')

            ->orderBy('created_at')
            ->get():
            Sale::
            whereBetween('created_at', [($initDate?$initDate:'0000-00-00'), ($endDate?Carbon::createFromFormat('Y-m-d', $endDate)->endOfDay():now())])
            ->selectRaw("SUM(total) as total")
            ->selectRaw("SUM(paid) as paid")
            ->selectRaw("client_id,created_at")
            ->groupBy('client_id')

            ->orderBy('created_at')
            ->get();

        $sales =  $sales->map(function ($sale) {
            return [
                'Nombre del cliente' => $sale->getClient($sale->client_id),
                'Total comprado' =>$sale->total,
                'Total pagado' => $sale->paid
            ];
        })->toArray();

        return $this->generateCSVResponse($sales);
    }
    function generateCSVResponse($list, $fileName = 'records.csv'){
    $headers = [
        'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
        'Content-type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=$fileName",
        'Expires' => '0',
        'Pragma' => 'public'
    ];

    array_unshift($list, array_keys($list[0]));

    $callback = function () use ($list) {
        $FH = fopen('php://output', 'w');
        foreach ($list as $row) {
            fputcsv($FH, $row);
        }
        fclose($FH);
    };

    return response()->stream($callback, 200, $headers);
}
    public function show($id)
    {
        $sale= Sale::find($id);

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
        return view('sales.create',['data'=>$data,'dataSales' => $this->dataSales]);
    }

    public function store(Request $request)
    {
        $sale=Sale::create($this->validateSale());
        $products=array_map(function($array){

            return array_values(array_filter(explode((','),$array)));
        },array_filter(explode(('*'),$request['sale'])));

        foreach($products as $product){
            ProductSale::create([
                'sale_id' =>  $sale->id,
                'product_id' => $product[5],
                'product_name' => $product[2],
                'price' => $product[0],
                'total' => $product[0]*$product[1],
                'kg' => $product[1],
                'size'=> $product[4],
                'out' => $product[6]=="true"?"Almacén":"Bodega"
            ]);
            $productModify= Product::find($product[5]);
            $size=$product[4]=="small"?$productModify->small:($product[4]=="medium"?$productModify->medium:$productModify->big);
            $size->inv_house=$product[6]=="true"?$size->inv_house-$product[1]:$size->inv_store-$product[1];
            // if($product[6]=="true"){
            //     $size->inv_house=$size->inv_house-$product[1];
            // }else{
            //     $size->inv_store=$size->inv_store-$product[1];
            // }

            $size->save();
        }

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
        return view('sales.edit',compact('sale','data'));
    }
    public function update(Sale $sale)
    {
        $sale->update($this->validateTicket());

        return redirect('/sales');
    }
    public function validateSale()
    {

        $data = request()->validate([
            'sale'=>'required',
            'client_id'=>'exists:clients,id',
            'paid'=>'numeric|min:0',
            'total'=>'numeric|min:0',
        ]);
        if(request()->client_id!=1){
            $client = Client::find(request()->client_id);
            $client->balance +=$data['total']-$data['paid'];
            $client->save();
        }
        unset($data['sale']);
        return $data;
    }
    public function validateTicket()
    {

        $data = request()->validate([
            'sale'=>'required',
            'client_id'=>'exists:clients,id',
            'paid'=>'numeric|min:0',
            'total'=>'numeric|min:0',
        ]);

        unset($data['sale']);

        return $data;
    }
    public function delete(Sale $sale)
    {
        $sale->delete();

        return redirect('/sales');
    }
}
