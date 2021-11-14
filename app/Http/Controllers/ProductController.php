<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
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

        return redirect('/products');
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
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'name'=>'required',
            'description'=>'required',
            'price_small'=>'numeric|'.($request['small']?'required':'nullable'),
            'inv_store_small'=>'numeric|'.($request['small']?'required':'nullable'),
            'inv_house_small'=>'numeric|'.($request['small']?'required':'nullable'),
            'price_medium'=>'numeric|'.($request['medium']?'required':'nullable'),
            'inv_store_medium'=>'numeric|'.($request['medium']?'required':'nullable'),
            'inv_house_medium'=>'numeric|'.($request['medium']?'required':'nullable'),
            'price_big'=>'numeric|'.($request['big']?'required':'nullable'),
            'inv_store_big'=>'numeric|'.($request['big']?'required':'nullable'),
            'inv_house_big'=>'numeric|'.($request['big']?'required':'nullable'),
        ],[
            'image'=>'La imagen tiene un formato incorrecto',
            'required'=>" "
        ]);
    }
    public function update(Product $product,$modal,Request $request)
    {
        $validator=$this->validateDataId($request,$product);
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
        $small=$this->getSizesId('small-'.$product->id,$request,$attributes,$product->small,$product);
        $medium=$this->getSizesId('medium-'.$product->id,$request,$attributes,$product->medium,$product);
        $big=$this->getSizesId('big-'.$product->id,$request,$attributes,$product->big,$product);
        if($small==null && $medium==null && $big==null){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input())
                ->with('modal','modalProduct');
        }

        $product->update([
            'img'=>$attributes['img']??null,
            'name'=>$attributes['name'],
            'description'=>$attributes['description'],
            'small_id'=>$small->id??null,
            'medium_id'=>$medium->id??null,
            'big_id'=>$big->id??null,
        ]);
        return redirect('/products');
    }

    private function getSizesId($size,$request,$attributes,$productSize,$product){

        if($request[$size]){
            if($productSize){

                $productSize->update([
                    'price'=> $attributes['price_'.$size],
                    'inv_store'=> $attributes['inv_store_'.$size],
                    'inv_house'=> $attributes['inv_house_'.$size]
                ]);
                return $productSize;
            }
            return Size::create(['price'=> $attributes['price_'.$size],
                            'inv_store'=> $attributes['inv_store_'.$size],
                            'inv_house'=> $attributes['inv_house_'.$size]]);
        }
        if($productSize){
            if($productSize==$product->small){
                $product->small_id=null;
            }elseif($productSize==$product->medium) {
                $product->medium_id=null;
            }else{
                $product->big_id=null;
            }
            $product->save();
            $productSize->delete();
        }
        return null;
    }

    public function validateDataId($request,$product)
    {
        return Validator::make(request()->toArray(), [
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'name'=>'required',
            'description'=>'required',
            'price_small-'.$product->id=>'numeric|'.($request['small-'.$product->id]?'required':'nullable'),
            'inv_store_small-'.$product->id=>'numeric|'.($request['small-'.$product->id]?'required':'nullable'),
            'inv_house_small-'.$product->id=>'numeric|'.($request['small-'.$product->id]?'required':'nullable'),
            'price_medium-'.$product->id=>'numeric|'.($request['medium-'.$product->id]?'required':'nullable'),
            'inv_store_medium-'.$product->id=>'numeric|'.($request['medium-'.$product->id]?'required':'nullable'),
            'inv_house_medium-'.$product->id=>'numeric|'.($request['medium-'.$product->id]?'required':'nullable'),
            'price_big-'.$product->id=>'numeric|'.($request['big-'.$product->id]?'required':'nullable'),
            'inv_store_big-'.$product->id=>'numeric|'.($request['big-'.$product->id]?'required':'nullable'),
            'inv_house_big-'.$product->id=>'numeric|'.($request['big-'.$product->id]?'required':'nullable'),
        ],[
            'image'=>'La imagen tiene un formato incorrecto',
            'required'=>" "
        ]);
    }

    public function delete(Product $product)
    {
        $product->small?$product->small->delete():'';
        $product->medium?$product->medium->delete():'';

        $product->big?$product->big->delete():'';
        $product->delete();
        return redirect('/products');
    }
}
