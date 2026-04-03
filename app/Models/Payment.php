<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'member_id', 'payment_id', 'payment_status', 'payment_message', 'total', 'status', 'created_at', 'updated_at'];

}
