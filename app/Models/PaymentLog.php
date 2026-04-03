<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    protected $fillable = [
        'payment_id',
        'order_id',
        'status',
        'amount',
        'payload',
    ];

    protected $casts = [
        'payload' => 'array', // Automatically decode JSON when accessing
    ];
}
