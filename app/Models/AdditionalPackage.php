<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalPackage extends Model
{
    use HasFactory;

    protected $table = 'additional_package';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'member_id', 'order_id', 'payment_id', 'payment_message', 'payment_status', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person', 'training', 'total', 'mail_send', 'status', 'created_at', 'updated_at'];

}
