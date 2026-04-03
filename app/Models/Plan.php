<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'plan';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'category', 'start_date', 'no_of_days', 'plan_date', 'other', 'amount', 'status', 'created_at', 'updated_at'];

}
