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

        $request->validate([
            'inv_store'=>'numeric|min:0',
            'inv_house'=>'numeric|min:0',
            'img'=>['image','required'],
            'name'=>'required',
            'description'=>'required'
        ]);
        if($request->hasFile('img')){

            $destination_path='public\media\imgproducts';
            $image=$request->file('img');
            $image_name=$image->getClientOriginalName();
            $path = $request->file('img')->store($destination_path);
            $url=Storage::url($path);

        }
        Product::create([
            'name'=>$request->name,
            'inv_store'=>$request->inv_store,
            'inv_house'=>$request->inv_house,
            'description'=>$request->description,
            'img'=>$url
        ]);
        // $product=new Product;

        // $product->name=$request->name;
        // $product->inv_store=$request->inv_store;
        // $product->inv_house=$request->inv_house;
        // $product->description=$request->description;
        // $product->img=$url;
        // $product->save();

        return redirect('/products');
    }
}
