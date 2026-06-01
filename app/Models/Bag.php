<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
    protected $fillable = [
        'bag_name',
        'brand',
        'price',
        'stock',
        'image'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}