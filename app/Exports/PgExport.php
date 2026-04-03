<?php

namespace App\Exports;

use App\Models\Member, App\Models\AdditionalPackage;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;


class PgExport implements FromView, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $from_date;
    protected $to_date;
    protected $option;

    public function __construct($from_date, $to_date, $option) {
            $this->from_date = $from_date;
            $this->to_date = $to_date;
            $this->option = $option;
    }

    public function view(): View
    {
        if(isset($this->from_date) && !empty($this->from_date) && isset($this->to_date) && !empty($this->to_date) && isset($this->option) && !empty($this->option)) {
            
            
            if(isset($this->option) && !empty($this->option)){
                if($this->option == 'all'){
                    
                    $members =  Member::whereBetween('created_at', [$this->from_date, $this->to_date])->where('category', 'pg-students')->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->where('status', 1)->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person', 'training')->get();
                    }
                    
                } else if($this->option == 1){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->whereBetween('members.created_at', [$this->from_date, $this->to_date])->where('members.category', 'pg-students')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.gala_dinner_price', '!=', '0.00')->where('members.status', 1)->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax')->get();
                    }
                } else if($this->option == 2){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->whereBetween('members.created_at', [$this->from_date, $this->to_date])->where('members.category', 'pg-students')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.room_tarrif_price', '!=', '0.00')->where('members.status', 1)->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person')->get();
                    }
                } else if($this->option == 3){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->whereBetween('members.created_at', [$this->from_date, $this->to_date])->where('members.category', 'pg-students')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->whereNotNull('additional_package.training')->where('additional_package.training', '!=', '')->where('members.status', 1)->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'training')->get();
                    }
                } else if($this->option == 4){
                    $members =  Member::whereBetween('created_at', [$this->from_date, $this->to_date])->where('category', 'pg-students')->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->where('become_aris_member_price', '!=', '0.00')->where('status', 1)->get();
                }
            }
        } else if(empty($this->from_date) && empty($this->to_date) && isset($this->option) && !empty($this->option)) {
             
             if(isset($this->option) && !empty($this->option)){
                if($this->option == 'all'){
                    
                    $members =  Member::where('category', 'pg-students')->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->where('status', 1)->get();
                    
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person', 'training')->get();
                    }
                    
                } else if($this->option == 1){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->where('members.category', 'pg-students')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.gala_dinner_price', '!=', '0.00')->where('members.status', 1)->get();
                    
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax')->get();
                    }
                } else if($this->option == 2){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->where('members.category', 'pg-students')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.room_tarrif_price', '!=', '0.00')->where('members.status', 1)->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person')->get();
                    }
                } else if($this->option == 3){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->where('members.category', 'pg-students')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->whereNotNull('additional_package.training')->where('additional_package.training', '!=', '')->where('members.status', 1)->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'training')->get();
                    }
                } else if($this->option == 4){
                    $members =  Member::where('category', 'pg-students')->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->where('become_aris_member_price', '!=', '0.00')->where('status', 1)->get();
                }
            }           
        }
        return view('admin.student.export', ['members' => $members, 'from_date'=>$this->from_date, 'to_date'=>$this->to_date, 'option'=>$this->option]);
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