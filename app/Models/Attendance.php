<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'status',
        'scanned_at'
    ];

    protected $casts = [
        'scanned_at' => 'datetime'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

}
