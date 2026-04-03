<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $table = 'training';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'text', 'price', 'usd_price', 'user', 'join_user', 'status', 'created_at', 'updated_at'];

}
