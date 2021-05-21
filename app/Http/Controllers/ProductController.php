<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Product;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function index()
    {
        $products= Product::all();
        return view('products.index',compact('products'));
    }
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }
    public function create()
    {
        return view('products.create');
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
