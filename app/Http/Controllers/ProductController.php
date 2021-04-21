<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Product;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function store(Request $request)
    {
        // $name = $request->name;
        // $inv_store = $request->inv_store;

        $request->validate([
            'inv_store'=>'numeric|min:0',
            'inv_house'=>'numeric|min:0',
            'img'=>'image'
        ]);
        if($request->hasFile('img')){

            $destination_path='public\media\imgproducts';
            $image=$request->file('img');
            $image_name=$image->getClientOriginalName();
            $path = $request->file('img')->store($destination_path);
            $url=Storage::url($path);

        }
        $product=new Product;
        
        $product->name=$request->name;
        $product->inv_store=$request->inv_store;
        $product->inv_house=$request->inv_house;
        $product->description=$request->description;
        $product->img=$url;
        $product->save();
        // dd($request->all());
        
            return $this->show();
    }
    public function show()
    {
     
        $products=Product::all();
        // echo $name,$balance;
        // dd($request);
        return view('show_products',compact('products'));
    }
}
