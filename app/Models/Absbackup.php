<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absbackup extends Model
{
    use HasFactory;

    protected $table = 'abstract_bckup';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'email', 'reg_id', 'catergory_id', 'note', 'file','title_0', 'note_1','title_1', 'file_1', 'note_2', 'file_2','title_2','note_3', 'file_3','title_3', 'note_4', 'file_4','title_4','mail_send', 'status', 'created_at', 'updated_at'];

}
