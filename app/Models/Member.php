<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attendance;
class Member extends Model
{
    use HasFactory;

    protected $table = 'members';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'membership_no', 'type', 'profile', 'category', 'first_name', 'last_name', 'middle_name', 'name', 'medical_reg_no', 'designation', 'institute', 'mobile','code', 'email', 'address', 'city', 'state', 'pincode', 'country', 'diet', 'accompanying_person', 'acc_person_name', 'acc_age', 'acc_gender', 'acc_diet', 'payment_screen_shot', 'plan_id', 'plan_date', 'plan_amount', 'gst', 'total', 'payment_status', 'order_id', 'payment_id', 'payment_message', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'become_aris_member', 'become_aris_member_price', 'mail_send', 'path', 'invoice', 'status', 'created_at', 'updated_at'];
    
        public function attendance()
    {
        return $this->hasMany(Attendance::class, 'member_id', 'id');
    }


}
