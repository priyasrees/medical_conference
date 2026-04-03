<?php

use App\Models\Member;

if (!function_exists('checkRoomPriceLimit')) {
    /**
     * Check if room price count reached the limit
     *
     * @param int $totalLimit
     * @return bool
     */
    function checkRoomPriceLimit()
    {
         $totalLimit = 80; 
        // Count members where room_price is not null, not empty, and not zero
        $usedCount =  Member::join('additional_package', 'additional_package.member_id', 'members.id')
        ->where(function($query) {
        $query->where('members.type', 'vip')
              ->orWhereNull('members.type'); 
        })
        ->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.room_tarrif_price', '!=', '0.00')->where('members.status', 1)->count();
           
        // If count reached total limit and usedCount is 0, return true
        //return $usedCount >= $totalLimit;
        return [
        'used' => $usedCount,
        'limit' => $totalLimit,
        'is_limit_reached' => $usedCount >= $totalLimit,
    ];
    }
}
