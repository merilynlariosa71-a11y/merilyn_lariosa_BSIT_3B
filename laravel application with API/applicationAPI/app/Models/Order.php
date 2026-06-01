<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'user_id',
        'email',
        'first_name',
        'last_name',
        'address',
        'city',
        'state',
        'zip_code',
        'subtotal',
        'shipping',
        'tax',
        'total',
        'status',
        'estimated_delivery',
    ];

    protected $casts = [
        'estimated_delivery' => 'date',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}