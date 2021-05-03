<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
