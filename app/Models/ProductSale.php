<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    protected $guarded =[];
    use HasFactory;
    public function sale(){
        return $this->belongsTo(Sale::class);
    }
    public function product(){
        return $this->hasmany(Product::class);
    }
}
