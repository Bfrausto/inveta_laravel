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
        'inv_store',
        'inv_house',
        'description',
        'img'
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
    
}
