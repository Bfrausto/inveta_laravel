<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
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
        $products= Product::all();
        return view('products.index',array('products'=>$products,'dataSales' => $this->dataSales));
    }
    public function show(Product $product)
    {
        return view('products.show',array('product'=>$product,'dataSales' => $this->dataSales));
    }
    public function create()
    {
        return view('products.create');
    }
    public function storeModal(Request $request)
    {
        $validator=$this->validateData();
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->with('modal','modalProduct');
        }
        $attributes=$validator->validated();
        if($request->img){

            $attributes['img'] =request('img')->store('imgproducts');
        }


        $product=Product::create($attributes);

        return redirect($product->path());
    }


    public function validateData()
    {
        return Validator::make(request()->toArray(), [
            'inv_store'=>'numeric|min:0',
            'inv_house'=>'numeric|min:0',
            'img' => 'image',
            'name'=>'required',
            'description'=>'required'
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
    public function store(Request $request)
    {
        // $name = $request->name;
        // $inv_store = $request->inv_store;

        $attributes=$this->validateArticle();
        if($request->img){

            $attributes['img'] =request('img')->store('imgproducts');
        }
        Product::create($attributes);
        // $product=new Product;

        // $product->name=$request->name;
        // $product->inv_store=$request->inv_store;
        // $product->inv_house=$request->inv_house;
        // $product->description=$request->description;
        // $product->img=$url;
        // $product->save();

        return redirect('/products');
    }
    public function validateArticle()
    {
        return request()->validate([
            'inv_store'=>'numeric|min:0',
            'inv_house'=>'numeric|min:0',
            'img' => 'image',
            'name'=>'required',
            'description'=>'required'
        ]);
    }
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    public function update(Product $product)
    {
        $attributes=$this->validateArticle();
        if(request()->img){

            $attributes['img'] =request('img')->store('imgproducts');
        }
        $product->update($attributes);
        return redirect($product->path());
    }

    public function editBalance(Product $product)
    {
        return view('products.balance',compact('product'));

    }

    public function updateBalance(Product $product)
    {
        $product->update(request()->validate([
            'inv_store'=>'numeric|min:0',
            'inv_house'=>'numeric|min:0',
        ]));
        return redirect($product->path());
    }
}
