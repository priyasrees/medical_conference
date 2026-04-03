<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinner extends Model
{
    use HasFactory;

    protected $table = 'dinner';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'text', 'price', 'document', 'status', 'created_at', 'updated_at'];

}
