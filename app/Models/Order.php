<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'razorpay_order_id',
        'receipt',
        'email',
        'amount',
        'status',
    ];

    // Cast receipt to array if you're storing JSON
    protected $casts = [
        'receipt' => 'array',
    ];
}
