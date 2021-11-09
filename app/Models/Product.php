<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'img',
        'small_id',
        'medium_id',
        'big_id'
    ];
    public function path(){

        return route('products.show',$this);

    }
    public function getImgAttribute($value)
    {
        if($value)
            return asset('storage/' .$value);
    }
    public function getNameAttribute($id)
    {
        return ucfirst($id);
    }
    public function sizes(){
        return $this->hasMany(Size::class);
    }
    public function getSize($id){
        return DB::table('sizes')->where('id', $id)->get();
    }
    public function small(){
        return $this->hasOne(Size::class,'id','small_id');
    }
    public function medium(){
        return $this->hasOne(Size::class,'id','medium_id');
    }
    public function big(){
        return $this->hasOne(Size::class,'id','big_id');
    }
    public static function getproductById($id)
    {
      return Product::find($id);
    }
    public function sale(){
        return $this->belongsTo(ProductSale::class);
    }
}
