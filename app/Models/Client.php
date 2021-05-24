<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'balance',
        'enterprise',
        'adress',
        'email',
        'tel',
        'rfc'

    ];
    public function path(){

        return route('clients.show',$this);

    }
    public function sales()
    {
        return $this->hasMany(Sales::class)
                ->latest();
    }
}
