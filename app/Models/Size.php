<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'inv_store',
        'inv_house',
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
