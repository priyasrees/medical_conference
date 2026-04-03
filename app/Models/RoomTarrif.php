<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTarrif extends Model
{
    use HasFactory;

    protected $table = 'room_tarrif';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'title', 'start_date', 'no_of_days', 'single_bed', 'single_bed_price', 'single_bed_usd', 'single_bed_usd_price', 'double_bed', 'double_bed_price', 'double_bed_usd', 'double_bed_usd_price', 'status', 'created_at', 'updated_at'];

}
