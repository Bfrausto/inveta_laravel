<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
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
        $validator=$this->validateData($request);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($request->input())
                        ->with('modal','modalProduct');
        }
        $attributes=$validator->validated();
        if($request->img){
            $attributes['img'] =request('img')->store('imgproducts');
        }
        $small=$this->getSizes('small',$request,$attributes);
        $medium=$this->getSizes('medium',$request,$attributes);
        $big=$this->getSizes('big',$request,$attributes);
        if($small==null && $medium==null && $big==null){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input())
                ->with('modal','modalProduct');
        }

        $product=Product::create([
            'img'=>$attributes['img']??null,
            'name'=>$attributes['name'],
            'description'=>$attributes['description'],
            'small_id'=>$small->id??null,
            'medium_id'=>$medium->id??null,
            'big_id'=>$big->id??null,
        ]);

        return redirect($product->path());
    }

    private function getSizes($size,$request,$attributes){
        if($request[$size]){
            return Size::create(['price'=> $attributes['price_'.$size],
                            'inv_store'=> $attributes['inv_store_'.$size],
                            'inv_house'=> $attributes['inv_house_'.$size]]);
        }
        return null;
    }
    public function validateData($request)
    {
        return Validator::make(request()->toArray(), [
            'img' => 'image|required|mimes:jpeg,png,jpg,gif,svg',
            'name'=>'required',
            'description'=>'required',
            'price_small'=>'numeric|min:0|'.($request['small']?'required':'nullable'),
            'inv_store_small'=>'numeric|min:0|'.($request['small']?'required':'nullable'),
            'inv_house_small'=>'numeric|min:0|'.($request['small']?'required':'nullable'),
            'price_medium'=>'numeric|min:0|'.($request['medium']?'required':'nullable'),
            'inv_store_medium'=>'numeric|min:0|'.($request['medium']?'required':'nullable'),
            'inv_house_medium'=>'numeric|min:0|'.($request['medium']?'required':'nullable'),
            'price_big'=>'numeric|min:0|'.($request['big']?'required':'nullable'),
            'inv_store_big'=>'numeric|min:0|'.($request['big']?'required':'nullable'),
            'inv_house_big'=>'numeric|min:0|'.($request['big']?'required':'nullable'),
        ],[
            'image'=>'La imagen tiene un formato incorrecto',
            'required'=>" "
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
