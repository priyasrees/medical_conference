<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnsiteRegister extends Model
{
    use HasFactory;

    protected $table = 'onsite_register';

    protected $fillable = [
        'name',
        'mobile',
        'amount',
        'payment_mode',
        'razorpay_payment_id',
    ];

    public function paymentHistory()
    {
        return $this->hasOne(PaymentHistory::class, 'user_id');
    }
}
