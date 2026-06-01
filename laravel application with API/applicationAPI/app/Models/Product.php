<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'image',
        'rating',
        'reviews',
        'colors',
        'sizes',
    ];

    protected $casts = [
        'colors' => 'array',
        'sizes' => 'array',
        'rating' => 'decimal:1',
    ];
}