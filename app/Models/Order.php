<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'bag_id',
        'customer_name',
        'phone',
        'quantity',
        'total_price'
    ];

    public function bag()
    {
        return $this->belongsTo(Bag::class);
    }
}