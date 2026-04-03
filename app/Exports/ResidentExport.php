<?php

namespace App\Exports;

use App\Models\Member, App\Models\AdditionalPackage;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;


class ResidentExport implements FromView, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
          $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')
        //   ->where('members.type', 'vip')
          ->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->whereNotNull('additional_package.room_tarrif')->where('additional_package.room_tarrif', '!=', '')->where('members.status', 1)->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person')->get();
                    }
     
        return view('admin.vip.resident_export', ['members' => $members]);
    }
    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 10,
            'C' => 25,
            'D' => 25,
            'E' => 25,
            'F' => 25,            
            'G' => 25,
            'H' => 25,
            'I' => 25,
            'J' => 25,
            'K' => 25,
            'L' => 25,
            'M' => 25,
            'N' => 25,
            'O' => 25,
            'P' => 25,
            'Q' => 25,
            'R' => 25,
            'S' => 25,
            'T' => 25,
            'U' => 25,
            'V' => 25,
            'W' => 25,
            'X' => 25,
            'Y' => 25,
            'Z' => 25,
            'AA' => 25,
            'AB' => 25,
            'AC' => 25,
            'AD' => 25,
            'AE' => 25,
            'AF' => 25,
            'AG' => 25,
            'AH' => 25,
            'AI' => 25,
            
        ];
    }
}