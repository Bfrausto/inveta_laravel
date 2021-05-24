<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{
    protected $guarded =[];
    use HasFactory;
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public static function getName($id)
    {
        return ucfirst($id);
    }
    public function path(){

        return route('sales.show',$this);

    }
    public static function getProduct($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $data= $product->name." - ".$product->description;
        return $data;

    }
    public static function getClient($id)
    {
        $client = DB::table('clients')->where('id', $id)->first();
        $data= $client->name;
        return $data;

    }
    public static function getProductDescription($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $data= $product->description;
        return $data;

    }
}
