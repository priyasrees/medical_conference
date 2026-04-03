<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnsitePaymentHistory extends Model
{
    use HasFactory;

    protected $table = 'payment_history';

    protected $fillable = [
        'user_id',
        'payment_mode',
        'amount',
        'transaction_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(OnsiteRegister::class, 'user_id');
    }
}
