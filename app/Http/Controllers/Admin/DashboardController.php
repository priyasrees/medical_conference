<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin, App\Models\Member, App\Models\Dinner, App\Models\RoomTarrif, App\Models\AdditionalPackage, App\Models\Payment, App\Models\TAbstract, App\Models\Plan,App\Models\Absbackup;
use App\Exports\ArisExport,App\Exports\AbstractExport,App\Exports\TrainingExport, App\Exports\VipExport,App\Exports\ResidentExport,App\Exports\GalaDinnerExport, App\Exports\InternationalExport, App\Exports\NonExport, App\Exports\PgExport, App\Exports\SpouseExport, App\Models\Training, App\Models\OnsitePaymentHistory;
use session;
use Mail;
use Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');    
    }
    public function attendance(){
        $members = Member::where('status', 1)
                    ->whereHas('attendance')
                    ->withMax('attendance', 'scanned_at')
                    ->get();
        return view('admin.attendance')->with(['member' => $members]);
    }

    public function index()
    {
        $member = Member::count();
        $airs = Member::whereNull('type')->where('category', 'airs-members')->count();
        $non = Member::whereNull('type')->where('category', 'non-members')->count();
        $pg = Member::whereNull('type')->where('category', 'pg-students')->count();
        $international = Member::whereNull('type')->where('category', 'international')->count();
        $spouse = Member::whereNull('type')->where('category', 'spouse-accompanying')->count();
        $vip = Member::where('type', 'vip')->count();
        $total = ['total'=>$member, 'airs'=>$airs, 'non'=>$non, 'pg'=>$pg, 'international'=>$international, 'spouse'=>$spouse, 'vip'=>$vip];
        
        return view('admin.dashboard')->with(['total'=>$total]);
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
    public function tinyEditorUpload(Request $request)
    {
        $file = $request->file;
        $path = '/uploads/tinyeditorupload/';
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $file->move(public_path($path), $fileName);
        $filePath = $fileName;
        return json_encode(['location'=>asset('/public'.$path.$filePath)]);
    }
    public function handsTraining(Request $request)
    {
        $member = AdditionalPackage::whereNotNull('training')->join('members', 'additional_package.member_id', 'members.id')->select('additional_package.id', 'additional_package.member_id', 'additional_package.training', 'members.name', 'members.membership_no', 'members.mobile', 'members.code')->orderBy('id','desc')->get();
        
        return view('admin.course.index')->with(['member'=>$member]);
    }
    public function handstrainExport(){
        return Excel::download(new TrainingExport(), 'HandsOnTraining_'.time().'.xlsx');
    }
    public function galaDinner(Request $request)
    {
        $member =  Member::join('additional_package', 'additional_package.member_id', 'members.id')
        ->where(function($query) {
        $query->where('members.type', 'vip')
              ->orWhereNull('members.type'); 
        })
        ->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.gala_dinner','gala dinner')->where('members.status', 1)->get();
        
        return view('admin.vip.gala_dinner')->with(['member'=>$member]);
    }
    
    public function residentialPackage(Request $request)
    {
        $member =  Member::join('additional_package', 'additional_package.member_id', 'members.id')
        ->where(function($query) {
        $query->where('members.type', 'vip')
              ->orWhereNull('members.type'); 
        })
        ->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->whereNotNull('additional_package.room_tarrif')->where('additional_package.room_tarrif', '!=', '')->where('members.status', 1)->get();
        
        return view('admin.vip.residential_package')->with(['member'=>$member]);
    }
    
    
    public function becomeAirsMembers(Request $request)
    {
        $member =  Member::where(function($query) {
        $query->where('members.type', 'vip')
              ->orWhereNull('members.type');
            })->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->where('become_aris_member_price', '!=', '0.00')->orderBy('created_at','desc')->where('status', 1)->get();
       
        
        return view('admin.vip.become_airs')->with(['member'=>$member]);
    }
    public function residentRooms(Request $request){
        $member_count =  Member::join('additional_package', 'additional_package.member_id', 'members.id')
        ->where(function($query) {
        $query->where('members.type', 'vip')
              ->orWhereNull('members.type'); 
        })
        ->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.room_tarrif_price', '!=', '0.00')->where('members.status', 1)->count();
        
      return view('admin.vip.resident_rooms')->with(['member_count'=>$member_count]);
    }
    
    public function abstractData(Request $request)
    {
      
        $member = TAbstract::where('status', 1);
        if(isset($request->search) && !empty($request->search)){
            $member = $member->where('name','LIKE',"%{$request->search}%")->orwhere('email','LIKE',"%{$request->search}%")->orwhere('category_id','LIKE',"%{$request->search}%");
        }
        $member = $member->orderBy('id','desc')->get();
        
        return view('admin.abstract.index')->with(['member'=>$member]);
    }
    public function abstractBckupData(Request $request)
    {
      
        $member = Absbackup::where('status', 1);
        if ($request->filled('search')) {
        $member = $member->where(function($q) use ($request) {
            $q->where('name', 'LIKE', "%{$request->search}%")
              ->orWhere('email', 'LIKE', "%{$request->search}%")
              ->orWhere('category_id', 'LIKE', "%{$request->search}%");
        });
    }

    $member = $member->orderBy('id', 'desc')->get();
        

        return view('admin.abstract.absbckup')->with(['member'=>$member]);
    }
    public function abstractDetail($id)
    {
        $member = TAbstract::find($id);
        return view('admin.abstract.detail')->with(['member'=>$member]);
    }
    public function airsMembers(Request $request)
    {
        if(isset($request->from_date) && !empty($request->from_date) && isset($request->to_date) && !empty($request->to_date) && isset($request->option) && !empty($request->option)){
            // echo "test1";
            // exit;
            if($request->option == 'all'){
                
                $members =  Member::whereBetween('created_at', [
                    Carbon::parse($request->from_date)->startOfDay(),
                    Carbon::parse($request->to_date)->endOfDay()
                ])->where('category', 'airs-members')->select('id','membership_no', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->orderBy('created_at','desc')->where('status', 1)->get();
                foreach($members as $member){
                    $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person', 'training')->get();
                }
                
            } else if($request->option == 1){
                $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')
                ->whereBetween('members.created_at', [
                    Carbon::parse($request->from_date)->startOfDay(),
                    Carbon::parse($request->to_date)->endOfDay()
                ])
                ->where('members.category', 'airs-members')->select('members.id','members.membership_no', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.gala_dinner_price', '!=', '0.00')->where('members.status', 1)->orderBy('members.created_at','desc')->get();
                foreach($members as $member){
                    $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax')->get();
                }
            } else if($request->option == 2){
                $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')
                ->whereBetween('members.created_at', [
                    Carbon::parse($request->from_date)->startOfDay(),
                    Carbon::parse($request->to_date)->endOfDay()
                ])
                ->where('members.category', 'airs-members')->select('members.id','members.membership_no', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.room_tarrif_price', '!=', '0.00')->where('members.status', 1)->orderBy('members.created_at','desc')->get();
                foreach($members as $member){
                    $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person')->get();
                }
            }
            else if($request->option == 3){
                $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')
                ->whereBetween('members.created_at', [
                    Carbon::parse($request->from_date)->startOfDay(),
                    Carbon::parse($request->to_date)->endOfDay()
                ])
                ->where('members.category', 'airs-members')->select('members.id','members.membership_no', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->whereNotNull('additional_package.training')->where('additional_package.training', '!=', '')->where('members.status', 1)->orderBy('members.created_at','desc')->get();
                foreach($members as $member){
                    $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'training')->get();
                }
            } 
            else if($request->option == 4){
                $members =  Member::whereBetween('created_at', [
                    Carbon::parse($request->from_date)->startOfDay(),
                    Carbon::parse($request->to_date)->endOfDay()
                ])->where('category', 'airs-members')->select('id', 'category','membership_no', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->where('become_aris_member_price', '!=', '0.00')->where('status', 1)->orderBy('created_at','desc')->get();
            }
        }
        else if(isset($request->option) && !empty($request->option) && empty($request->from_date) && empty($request->to_date)){
            // echo "test2";
            // exit;
            if($request->option == 'all'){
                    
                    $members =  Member::where('category', 'airs-members')->select('id','membership_no', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->where('status', 1)->orderBy('created_at','desc')->get();
                    
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person', 'training')->get();
                    }
                    
                } else if($request->option == 1){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->where('members.category', 'airs-members')->select('members.id','membership_no', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.gala_dinner_price', '!=', '0.00')->where('members.status', 1)->orderBy('members.created_at','desc')->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax')->get();
                    }
                } else if($request->option == 2){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->where('members.category', 'airs-members')->select('members.id','membership_no', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.room_tarrif_price', '!=', '0.00')->where('members.status', 1)->orderBy('members.created_at','desc')->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person')->get();
                    }
                } else if($request->option == 3){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->where('members.category', 'airs-members')->select('members.id','membership_no', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->whereNotNull('additional_package.training')->where('additional_package.training', '!=', '')->where('members.status', 1)->orderBy('members.created_at','desc')->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'training')->get();
                    }
                } else if($request->option == 4){
                    $members =  Member::where('category', 'airs-members')->select('id','membership_no', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->where('become_aris_member_price', '!=', '0.00')->where('status', 1)->orderBy('created_at','desc')->get();
                }
            
        } else {
            // echo "test3";
            // exit;
            $members = Member::whereNull('type')->where('category', 'airs-members')->where('status', 1);
            if(isset($request->from_date) && !empty($request->from_date) && isset($request->to_date) && !empty($request->to_date)) {
                    $from = $request->from_date;
                    $to = $request->to_date;
                    if(isset($from) && !empty($from) && isset($to) && !empty($to)){
                        $from = date("Y-m-d h:i:s", strtotime($request->from_date));
                        $to = date("Y-m-d h:i:s", strtotime($request->to_date));
                        $members = $members->whereBetween('created_at', [$from, $to]);
                    }
            }
            $members = $members->orderBy('created_at','desc')->get();
           
        }
        //dd($members);
        return view('admin.airs.index')->with(['members'=>$members]);
    }
    public function airsMembersDetail($id)
    {
        $member = Member::whereNull('type')->where('id', $id)->first();
        $additional_package = AdditionalPackage::where('member_id', $id)->get();
        $plan = Plan::where('id', $member->plan_id)->first();
        return view('admin.airs.detail')->with(['member'=>$member, 'additional_package'=>$additional_package,'plan' => $plan]);
    }
    public function airsMembersEdit($id)
    {
        $member = Member::whereNull('type')->where('id', $id)->first();
        $additional_package = AdditionalPackage::where('member_id', $id)->get();
        return view('admin.airs.edit')->with(['member'=>$member, 'additional_package'=>$additional_package]);
    }
    public function airsMembersExport(Request $request)
    {
        $from_date = '';
        $to_date = '';
        $option = '';
        if(isset($request->from_date) && !empty($request->from_date) && isset($request->to_date) && !empty($request->to_date)){
            $from_date = $request->from_date;
            $to_date = $request->to_date;
        }
        if(isset($request->option) && !empty($request->option)){
            $option = $request->option;
        }
        return Excel::download(new ArisExport($from_date, $to_date, $option), 'ArisMember_'.time().'.xlsx');
    }
    public function abstractExport(){
        return Excel::download(new AbstractExport(), 'Abstract_'.time().'.xlsx');
    }
    public function airsMembersSendMail($id)
    {

        try {
            //code...
        $member = Member::find($id);
        $to_name = $member->name;
        $to_email = $member->email;

        $overall_total = 0;
        $overall_tax = 0;
        
        $packages = AdditionalPackage::where('member_id', $member->id)->get();
        $payment = Payment::where('member_id', $member->id)->first();
        $plan = Plan::where('id', $member->plan_id)->first();
        
        if($member->type == "vip"){
            $overall_total += 0;
        $overall_tax += 0;
        }else{
        $overall_total += isset($plan->amount) && !empty($plan->amount) ? (float)$plan->amount : 0;
        $overall_tax += isset($plan->amount) && !empty($plan->amount) ? (float)$plan->amount : 0;
        }
        foreach($packages as $package){
            if(isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) && $package->gala_dinner_price !=0.00 || isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) && $package->room_tarrif_price !=0.00){
                $overall_total += isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) ? (float)$package->gala_dinner_price : 0;
                $overall_total += isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? (float)$package->room_tarrif_price : 0;
                $overall_tax += isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? (float)$package->room_tarrif_price : 0;
            }
        }
        if(isset($package->training) && !empty($package->training)){
            $training = explode(',',$package->training);
            $prices = Training::whereIn('text', $training)->pluck('price', 'text');
            foreach($training as $index => $trainingName)
            {
                $trainingName = trim($trainingName);
                $price = isset($prices[$trainingName]) ? (float) $prices[$trainingName] : 0;
                $overall_tax += $price;
                $overall_total += $price;
            }
            // $overall_total += isset($training) && !empty($training) ? (float)(count($training) * 1000) : 0;    
            // $overall_tax += isset($training) && !empty($training) ? (float)(count($training) * 1000) : 0;
        }
        
        if(isset($member->become_aris_member_price) && !empty($member->become_aris_member_price)){
            $overall_total += isset($member->become_aris_member_price) && !empty($member->become_aris_member_price) ? (float)$member->become_aris_member_price : 0;
        }
        $total_in_words = $this->getIndianCurrencyData($overall_total + ($overall_tax * 18) / 100);
        $data = ['member'=>$member, 'packages'=>$packages, 'payment'=>$payment, 'plan'=>$plan, 'total_in_words'=>$total_in_words];
        try {
            Mail::send('mail.invoice', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject('INVOICE - PAYMENT RECEIPT');
            });
            Member::where('id', $member->id)->update(['mail_send'=>2]);
            return response()->json(['status'=>true, 'msg'=>'Invoice has been sent successfully']);
        } catch (\Throwable $th) {
            return response()->json(['status'=>false, 'msg'=>'Invoice Failed to Send']);
        }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
        
    }
    public function confiramtionMail($id){
        try {
            $memeber = Member::find($id);
            $data = ['member'=>$memeber];
            $to_name = $memeber->name;
            $to_email = $memeber->email;
            
            Mail::send('mail.register', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject('Register successfully');
            });
            
            return response()->json(['status'=>true, 'msg'=>'Register confiramtion mail has been send successfully']);
        } catch (\Throwable $th) {
            //dd($th);
        }
    }
    public function membersUpdate(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'name'=>'required|min:1|max:100',
            'mobile'=>'required|max:10',
            'email'=>'required|min:1|max:100|email',
        ],[
            'name.required'=>'Name is required',
            'mobile.required'=>'Mobile Number is required',
            'email.required'=>'Email is required',
        ]);
        try {
            if(isset($request->id) && !empty($request->id)){
                $msg = 'Member has been Updated Successfully';
            } else {
                $msg = 'Member has been Stored Successfully';
            }
            $profile = '';
            if (request()->hasFile('profile')) {
                $profile = $this->imageUpload(request()->file('profile'), '/upload/member/');
            } else {
                $profile = $request->profile1;
            }
                $member = Member::updateOrCreate([
                    'id'=>$request->id,
                ],[
                    'profile'=> $profile,
                    'name'=> $request->name,
                    'mobile'=> $request->mobile,
                    'membership_no'=> $request->membership_no,
                    'medical_reg_no'=> $request->medical_reg_no,
                    //'gender'=> $request->gender,
                    'email'=> $request->email,
                    'institute'=> $request->institute,
                    'address'=> $request->address,
                    'diet'=> $request->diet,
                    //'age'=> $request->age,
                    'designation'=> $request->designation,
                    'city'=> $request->city,
                    'state'=> $request->state,
                    'pincode'=> $request->pincode,
                    

                ]);
             
            return back()->with(['status'=>true, 'msg'=>$msg]);
        } catch (\Throwable $th) {
            //dd($th);
            return back()->with(['status'=>false, 'msg'=>'Failed to Stored']);
        }
    }
    public function vipMembersUpdate(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'first_name'=>'required|min:1|max:100',
            'middle_name'=>'required|min:1|max:100',
            'last_name'=>'required|min:1|max:100',
            'mobile'=>'required|max:10',
            'email'=>'required|min:1|max:100|email',
        ],[
            'first_name.required'=>'Name is required',
            'mobile.required'=>'Mobile Number is required',
            'email.required'=>'Email is required',
        ]);
        try {
            if(isset($request->id) && !empty($request->id)){
                $msg = 'VIP Member has been Updated Successfully';
            } else {
                $msg = 'VIP Member has been Stored Successfully';
            }
            $profile = '';
            if (request()->hasFile('profile')) {
                $profile = $this->imageUpload(request()->file('profile'), '/upload/member/');
            } else {
                $profile = $request->profile1;
            }
                $member = Member::updateOrCreate([
                    'id'=>$request->id,
                ],[
                    'profile'=> $profile,
                    'first_name'=>$request->first_name,
                    'middle_name'=>$request->middle_name,
                    'last_name'=>$request->last_name,
                    'name'=> $request->first_name .' '.$request->middle_name .' '.$request->last_name,
                    'mobile'=> $request->mobile,
                    'membership_no'=> $request->membership_no,
                    'medical_reg_no'=> $request->medical_reg_no,
                    'type'=>'vip',
                    //'gender'=> $request->gender,
                    'email'=> $request->email,
                    'institute'=> $request->institute,
                    'address'=> $request->address,
                    'diet'=> $request->diet,
                    //'age'=> $request->age,
                    'designation'=> $request->designation,
                    'city'=> $request->city,
                    'state'=> $request->state,
                    'pincode'=> $request->pincode,
                    'country'=> $request->country,
                    

                ]);
             
            return back()->with(['status'=>true, 'msg'=>$msg]);
        } catch (\Throwable $th) {
            //dd($th);
            return back()->with(['status'=>false, 'msg'=>'Failed to Stored']);
        }
    }
    public function vipMembersDelete(Request $request)
    {
        $id = $request->id;
        if(isset($id) && !empty($id)){
            Member::where('type', 'vip')->where('id', $id)->delete();
            $additional_package = AdditionalPackage::where('member_id', $id)->delete();
            return back()->with(['status'=>true, 'msg'=>'VIP Members has been deleted successfully']);    
        } else {
            return back()->with(['status'=>false, 'msg'=>'Failed to delete']);
        }
    }
    public function vipMembersExport(Request $request)
    {
        $from_date = '';
        $to_date = '';
        $option = '';
        if(isset($request->from_date) && !empty($request->from_date) && isset($request->to_date) && !empty($request->to_date)){
            $from_date = $request->from_date;
            $to_date = $request->to_date;
        }
        if(isset($request->option) && !empty($request->option)){
            $option = $request->option;
        }
        return Excel::download(new VipExport($from_date, $to_date, $option), 'VipMember_'.time().'.xlsx');

    }
    public function residentPackageExport(Request $request)
    {
        
        return Excel::download(new ResidentExport(), 'ResidentPackage_'.time().'.xlsx');
    }
    public function galaDinnerExport()
    {
        
        return Excel::download(new GalaDinnerExport(), 'GalaDinner_'.time().'.xlsx');
    }
    
    public function airsMembersDelete(Request $request)
    {
        $id = $request->id;
        if(isset($id) && !empty($id)){
            Member::where('id', $id)->delete();
            $additional_package = AdditionalPackage::where('member_id', $id)->delete();
            return redirect('admin/airs-members')->with(['status'=>true, 'msg'=>'Members has been deleted successfully']);    
        } else {
            return redirect('admin/airs-members')->with(['status'=>false, 'msg'=>'Failed to delete']);
        }
    }
    public function nonMembers(Request $request)
    {
        if(isset($request->from_date) && !empty($request->from_date) && isset($request->to_date) && !empty($request->to_date) && isset($request->option) && !empty($request->option)) {
            
            if(isset($request->option) && !empty($request->option)){
                if($request->option == 'all'){
                    
                    $members =  Member::whereBetween('created_at', [
                    Carbon::parse($request->from_date)->startOfDay(),
                    Carbon::parse($request->to_date)->endOfDay()
                ])->where('category', 'non-members')->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->where('status', 1)->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person', 'training')->get();
                    }
                    
                } else if($request->option == 1){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->whereBetween('members.created_at', [
                    Carbon::parse($request->from_date)->startOfDay(),
                    Carbon::parse($request->to_date)->endOfDay()
                ])->where('members.category', 'non-members')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.gala_dinner_price', '!=', '0.00')->where('members.status', 1)->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax')->get();
                    }
                } else if($request->option == 2){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->whereBetween('members.created_at', [
                    Carbon::parse($request->from_date)->startOfDay(),
                    Carbon::parse($request->to_date)->endOfDay()
                ])->where('members.category', 'non-members')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.room_tarrif_price', '!=', '0.00')->where('members.status', 1)->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person')->get();
                    }
                } else if($request->option == 3){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->whereBetween('members.created_at', [
                    Carbon::parse($request->from_date)->startOfDay(),
                    Carbon::parse($request->to_date)->endOfDay()
                ])->where('members.category', 'non-members')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->whereNotNull('additional_package.training')->where('additional_package.training', '!=', '')->where('members.status', 1)->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'training')->get();
                    }
                } else if($request->option == 4){
                    $members =  Member::whereBetween('created_at', [
                    Carbon::parse($request->from_date)->startOfDay(),
                    Carbon::parse($request->to_date)->endOfDay()
                ])->where('category', 'non-members')->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->where('become_aris_member_price', '!=', '0.00')->where('status', 1)->get();
                }
            }
        } else if(empty($request->from_date) && empty($request->to_date) && isset($request->option) && !empty($request->option)) {
             
             if(isset($request->option) && !empty($request->option)){
                if($request->option == 'all'){
                    
                    $members =  Member::where('category', 'non-members')->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->where('status', 1)->orderBy('created_at','desc')->get();
                    
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person', 'training')->get();
                    }
                    
                } else if($request->option == 1){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->where('members.category', 'non-members')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.gala_dinner_price', '!=', '0.00')->where('members.status', 1)->orderBy('members.created_at','desc')->get();
                    
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax')->get();
                    }
                } else if($request->option == 2){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->where('members.category', 'non-members')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.room_tarrif_price', '!=', '0.00')->where('members.status', 1)->orderBy('members.created_at','desc')->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person')->get();
                    }
                } else if($request->option == 3){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->where('members.category', 'non-members')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->whereNotNull('additional_package.training')->where('additional_package.training', '!=', '')->where('members.status', 1)->orderBy('members.created_at','desc')->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'training')->get();
                    }
                } else if($request->option == 4){
                    $members =  Member::where('category', 'non-members')->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->where('become_aris_member_price', '!=', '0.00')->where('status', 1)->orderBy('created_at','desc')->get();
                }
            }           
        } else {
            $members = Member::whereNull('type')->where('category', 'non-members')->orderBy('id','desc')->get();
        }
        
        return view('admin.non.index')->with(['members'=>$members]);
    }
    public function nonMembersDetail($id)
    {
        $member = Member::whereNull('type')->where('id', $id)->first();
        $additional_package = AdditionalPackage::where('member_id', $id)->get();
        $plan = Plan::where('id', $member->plan_id)->first();
        return view('admin.non.detail')->with(['member'=>$member, 'additional_package'=>$additional_package,'plan'=> $plan]);
    }
    public function nonMembersEdit($id)
    {
        $member = Member::whereNull('type')->where('id', $id)->first();
        $additional_package = AdditionalPackage::where('member_id', $id)->get();
        return view('admin.non.edit')->with(['member'=>$member, 'additional_package'=>$additional_package]);
    }
    public function nonMembersDelete(Request $request)
    {
        $id = $request->id;
        if(isset($id) && !empty($id)){
            Member::where('id', $id)->delete();
            $additional_package = AdditionalPackage::where('member_id', $id)->delete();
            return redirect('admin/non-members')->with(['status'=>true, 'msg'=>'Non Members has been deleted successfully']);    
        } else {
            return redirect('admin/non-members')->with(['status'=>false, 'msg'=>'Failed to delete']);
        }
        
    }
    public function nonMembersExport(Request $request)
    {
        $from_date = '';
        $to_date = '';
        $option = '';
        if(isset($request->from_date) && !empty($request->from_date) && isset($request->to_date) && !empty($request->to_date)){
            $from_date = $request->from_date;
            $to_date = $request->to_date;
        }
        if(isset($request->option) && !empty($request->option)){
            $option = $request->option;
        }
        return Excel::download(new NonExport($from_date, $to_date, $option), 'NonMember_'.time().'.xlsx');

    }
    public function pgStudent(Request $request)
    {
        if(isset($request->from_date) && !empty($request->from_date) && isset($request->to_date) && !empty($request->to_date) && isset($request->option) && !empty($request->option)) {
            
            
            if(isset($request->option) && !empty($request->option)){
                if($request->option == 'all'){
                    
                    $members =  Member::whereBetween('created_at', [$request->from_date, $request->to_date])->where('category', 'pg-students')->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->where('status', 1)->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person', 'training')->get();
                    }
                    
                } else if($request->option == 1){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->whereBetween('members.created_at', [$request->from_date, $request->to_date])->where('members.category', 'pg-students')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.gala_dinner_price', '!=', '0.00')->where('members.status', 1)->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax')->get();
                    }
                } else if($request->option == 2){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->whereBetween('members.created_at', [$request->from_date, $request->to_date])->where('members.category', 'pg-students')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.room_tarrif_price', '!=', '0.00')->where('members.status', 1)->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person')->get();
                    }
                } else if($request->option == 3){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->whereBetween('members.created_at', [$request->from_date, $request->to_date])->where('members.category', 'pg-students')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->whereNotNull('additional_package.training')->where('additional_package.training', '!=', '')->where('members.status', 1)->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'training')->get();
                    }
                } else if($request->option == 4){
                    $members =  Member::whereBetween('created_at', [$request->from_date, $request->to_date])->where('category', 'pg-students')->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->where('become_aris_member_price', '!=', '0.00')->where('status', 1)->get();
                }
            }
        } else if(empty($request->from_date) && empty($request->to_date) && isset($request->option) && !empty($request->option)) {
             
             if(isset($request->option) && !empty($request->option)){
                if($request->option == 'all'){
                    
                    $members =  Member::where('category', 'pg-students')->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->where('status', 1)->get();
                    
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person', 'training')->get();
                    }
                    
                } else if($request->option == 1){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->where('members.category', 'pg-students')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.gala_dinner_price', '!=', '0.00')->where('members.status', 1)->get();
                    
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax')->get();
                    }
                } else if($request->option == 2){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->where('members.category', 'pg-students')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.room_tarrif_price', '!=', '0.00')->where('members.status', 1)->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person')->get();
                    }
                } else if($request->option == 3){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->where('members.category', 'pg-students')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->whereNotNull('additional_package.training')->where('additional_package.training', '!=', '')->where('members.status', 1)->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'training')->get();
                    }
                } else if($request->option == 4){
                    $members =  Member::where('category', 'pg-students')->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->where('become_aris_member_price', '!=', '0.00')->where('status', 1)->get();
                }
            }           
        } else {
            $members = Member::whereNull('type')->where('category', 'pg-students')->orderBy('id','desc')->get();
        }
        return view('admin.student.index')->with(['members'=>$members]);
    }
    public function pgStudentDetail($id)
    {
        $member = Member::whereNull('type')->where('id', $id)->first();
        $additional_package = AdditionalPackage::where('member_id', $id)->get();
        $plan = Plan::where('id', $member->plan_id)->first();
        
        return view('admin.student.detail')->with(['member'=>$member, 'additional_package'=>$additional_package,'plan' => $plan]);
    }
    public function pgStudentEdit($id)
    {
        $member = Member::whereNull('type')->where('id', $id)->first();
        $additional_package = AdditionalPackage::where('member_id', $id)->get();
        return view('admin.student.edit')->with(['member'=>$member, 'additional_package'=>$additional_package]);
    }
    public function pgStudentDelete(Request $request)
    {
        $id = $request->id;
        if(isset($id) && !empty($id)){
            Member::where('id', $id)->delete();
            AdditionalPackage::where('member_id', $id)->delete();
            return redirect('admin/pg-student')->with(['status'=>true, 'msg'=>'PG Student has been deleted successfully']);    
        } else {
            return redirect('admin/pg-student')->with(['status'=>false, 'msg'=>'Failed to delete']);
        }
    }
    public function pgStudentExport(Request $request)
    {
        $from_date = '';
        $to_date = '';
        $option = '';
        if(isset($request->from_date) && !empty($request->from_date) && isset($request->to_date) && !empty($request->to_date)){
            $from_date = $request->from_date;
            $to_date = $request->to_date;
        }
        if(isset($request->option) && !empty($request->option)){
            $option = $request->option;
        }
        return Excel::download(new PgExport($from_date, $to_date, $option), 'PGStudentMember_'.time().'.xlsx');

    }
    public function internationalExport(Request $request)
    {
        $from_date = '';
        $to_date = '';
        $option = '';
        if(isset($request->from_date) && !empty($request->from_date) && isset($request->to_date) && !empty($request->to_date)){
            $from_date = $request->from_date;
            $to_date = $request->to_date;
        }
        if(isset($request->option) && !empty($request->option)){
            $option = $request->option;
        }
        return Excel::download(new InternationalExport($from_date, $to_date, $option), 'InternationalMember_'.time().'.xlsx');

    }
    public function international(Request $request)
    {
        if(isset($request->from_date) && !empty($request->from_date) && isset($request->to_date) && !empty($request->to_date) && isset($request->option) && !empty($request->option)) {
            
            if(isset($request->option) && !empty($request->option)){
                if($request->option == 'all'){
                    
                    $members =  Member::whereBetween('created_at', [
                    Carbon::parse($request->from_date)->startOfDay(),
                    Carbon::parse($request->to_date)->endOfDay()
                ])->where('category', 'international')->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at','membership_no')->where('status', 1)->orderBy('created_at','desc')->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person', 'training')->get();
                    }
                    
                } else if($request->option == 1){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->whereBetween('members.created_at', [
                    Carbon::parse($request->from_date)->startOfDay(),
                    Carbon::parse($request->to_date)->endOfDay()
                ])->where('members.category', 'international')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at','membership_no')->where('additional_package.gala_dinner_price', '!=', '0.00')->where('members.status', 1)->orderBy('members.created_at','desc')->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax')->get();
                    }
                } else if($request->option == 2){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->whereBetween('members.created_at', [
                    Carbon::parse($request->from_date)->startOfDay(),
                    Carbon::parse($request->to_date)->endOfDay()
                ])->where('members.category', 'international')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at','membership_no')->where('additional_package.room_tarrif_price', '!=', '0.00')->where('members.status', 1)->orderBy('members.created_at','desc')->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person')->get();
                    }
                } else if($request->option == 3){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->whereBetween('members.created_at', [
                    Carbon::parse($request->from_date)->startOfDay(),
                    Carbon::parse($request->to_date)->endOfDay()
                ])->where('members.category', 'international')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at','membership_no')->whereNotNull('additional_package.training')->where('additional_package.training', '!=', '')->where('members.status', 1)->orderBy('members.created_at','desc')->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'training')->get();
                    }
                } else if($request->option == 4){
                    $members =  Member::whereBetween('created_at', [
                    Carbon::parse($request->from_date)->startOfDay(),
                    Carbon::parse($request->to_date)->endOfDay()
                ])->where('category', 'international')->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at','membership_no')->where('become_aris_member_price', '!=', '0.00')->where('status', 1)->orderBy('created_at','desc')->get();
                }
            }
        }
        else if(empty($request->from_date) && empty($request->to_date) && isset($request->option) && !empty($request->option)) {
             
             if(isset($request->option) && !empty($request->option)){
                if($request->option == 'all'){
                    
                    $members =  Member::where('category', 'international')->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at','membership_no')->where('status', 1)->orderBy('created_at','desc')->get();
                    
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person', 'training')->orderBy('members.created_at','desc')->get();
                    }
                    
                } else if($request->option == 1){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->where('members.category', 'international')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at','membership_no')->where('additional_package.gala_dinner_price', '!=', '0.00')->where('members.status', 1)->orderBy('members.created_at','desc')->get();
                    
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'gala_dinner', 'gala_dinner_price', 'gala_dinner_tax')->get();
                    }
                } else if($request->option == 2){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->where('members.category', 'international')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at','membership_no')->where('additional_package.room_tarrif_price', '!=', '0.00')->where('members.status', 1)->orderBy('members.created_at','desc')->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'room_tarrif_id', 'room_tarrif', 'room_tarrif_price', 'room_tarrif_tax', 'no_of_days', 'room_dates', 'person')->get();
                    }
                } else if($request->option == 3){
                    $members =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->where('members.category', 'international')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->whereNotNull('additional_package.training','membership_no')->where('additional_package.training', '!=', '')->where('members.status', 1)->orderBy('members.created_at','desc')->get();
                    foreach($members as $member){
                        $member['package'] = AdditionalPackage::where('member_id', $member->id)->select('id', 'training')->get();
                    }
                } else if($request->option == 4){
                    $members =  Member::where('category', 'international')->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at','membership_no')->where('become_aris_member_price', '!=', '0.00')->where('status', 1)->orderBy('created_at','desc')->get();
                }
            }           
        } else {
            $members = Member::whereNull('type')->where('category', 'international')->orderBy('id','desc')->get();    
        }
        
        return view('admin.international.index')->with(['members'=>$members]);
    }
    public function internationalDetail($id)
    {
        $member = Member::whereNull('type')->where('id', $id)->first();
        $additional_package = AdditionalPackage::where('member_id', $id)->get();
        $plan = Plan::where('id', $member->plan_id)->first();
        return view('admin.international.detail')->with(['member'=>$member, 'additional_package'=>$additional_package,'plan' => $plan]);
    }
    public function internationalEdit($id)
    {
        $member = Member::whereNull('type')->where('id', $id)->first();
        $additional_package = AdditionalPackage::where('member_id', $id)->get();
        return view('admin.international.edit')->with(['member'=>$member, 'additional_package'=>$additional_package]);
    }
    public function internationalDelete(Request $request)
    {
        $id = $request->id;
        if(isset($id) && !empty($id)){
            Member::where('id', $id)->delete();
            $additional_package = AdditionalPackage::where('member_id', $id)->delete();
            return redirect('admin/international')->with(['status'=>true, 'msg'=>'International Members has been deleted successfully']);    
        } else {
            return redirect('admin/international')->with(['status'=>false, 'msg'=>'Failed to delete']);
        }
    }
    public function spouse(Request $request)
    {
        $member = Member::whereNull('type')->where('category', 'spouse-accompanying');
        if(isset($request->from_date) && !empty($request->from_date) && isset($request->to_date) && !empty($request->to_date)) {
            $from = $request->from_date;
            $to = $request->to_date;
            if(isset($from) && !empty($from) && isset($to) && !empty($to)){
                $from = date("Y-m-d h:i:s", strtotime($request->from_date));
                $to = date("Y-m-d h:i:s", strtotime($request->to_date));
                $member = $member->whereBetween('created_at', [$from, $to]);
            }
        }
        if(isset($request->search) && !empty($request->search)){
            $member = $member->where('name','LIKE',"%{$request->search}%")->orwhere('email','LIKE',"%{$request->search}%")->orwhere('membership_no','LIKE',"%{$request->search}%")->orwhere('category_id','LIKE',"%{$request->search}%")->orwhere('medical_reg_no','LIKE',"%{$request->search}%")->orwhere('designation','LIKE',"%{$request->search}%")->orwhere('institute','LIKE',"%{$request->search}%")->orwhere('mobile','LIKE',"%{$request->search}%")->orwhere('email','LIKE',"%{$request->search}%")->orwhere('city','LIKE',"%{$request->search}%")->orwhere('state','LIKE',"%{$request->search}%")->orwhere('diet','LIKE',"%{$request->search}%")->orwhere('acc_age','LIKE',"%{$request->search}%")->orwhere('acc_gender','LIKE',"%{$request->search}%");
        }
        $member = $member->orderBy('id','desc')->get();
        return view('admin.spouse.index')->with(['member'=>$member]);
    }
    public function spouseDetail($id)
    {
        $member = Member::whereNull('type')->where('id', $id)->first();
        $additional_package = AdditionalPackage::where('member_id', $id)->get();
        $plan = Plan::where('id', $member->plan_id)->first();
        return view('admin.spouse.detail')->with(['member'=>$member, 'additional_package'=>$additional_package,'plan' => $plan]);
    }
    public function spouseEdit($id)
    {
        $member = Member::whereNull('type')->where('id', $id)->first();
        $additional_package = AdditionalPackage::where('member_id', $id)->get();
        return view('admin.spouse.edit')->with(['member'=>$member, 'additional_package'=>$additional_package]);
    }
    public function spouseDelete(Request $request)
    {
        $id = $request->id;
        if(isset($id) && !empty($id)){
            Member::where('id', $id)->delete();
            $additional_package = AdditionalPackage::where('member_id', $id)->delete();
            return redirect('admin/spouse')->with(['status'=>true, 'msg'=>'Spouse Accompanying has been deleted successfully']);    
        } else {
            return redirect('admin/spouse')->with(['status'=>false, 'msg'=>'Failed to delete']);
        }
    }
    public function spouseExport(Request $request)
    {
        $from_date = '';
        $to_date = '';
        $option = '';
        if(isset($request->from_date) && !empty($request->from_date) && isset($request->to_date) && !empty($request->to_date)){
            $from_date = $request->from_date;
            $to_date = $request->to_date;
        }
        if(isset($request->option) && !empty($request->option)){
            $option = $request->option;
        }
        return Excel::download(new SpouseExport($from_date, $to_date, $option), 'SpouseMember_'.time().'.xlsx');

    }
    public function vipMembers(Request $request)
    {
            $from = $request->from_date;
            $to = $request->to_date;
        $member = Member::whereNotNull('type')->where('type','vip');
        //->where('category', 'airs-members');
        if(isset($request->from_date) && !empty($request->from_date) && isset($request->to_date) && !empty($request->to_date) && !empty($request->option)) {
           if($request->option == 'all'){
                    
                    $member =  Member::whereBetween('created_at', [$from, $to])->where('type', 'vip')->select('id', 'category', 'name', 'first_name', 'middle_name', 'last_name', 'mobile', 'become_aris_member', 'become_aris_member_price', 'plan_id', 'plan_date', 'plan_amount', 'email', 'medical_reg_no', 'designation', 'institute', 'code', 'address', 'city', 'state', 'pincode', 'country', 'created_at')->where('status', 1);
                    
                    
                } else if($request->option == 1){
                    $member =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->whereBetween('members.created_at', [$from, $to])->where('members.type', 'vip')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->where('additional_package.gala_dinner','gala dinner')->where('members.status', 1);
                    
                } else if($request->option == 2){
                    $member =  Member::join('additional_package', 'additional_package.member_id', 'members.id')->whereBetween('members.created_at', [$from, $to])->where('members.type', 'vip')->select('members.id', 'members.category', 'members.name', 'members.first_name', 'members.middle_name', 'members.last_name', 'members.mobile', 'members.plan_id', 'members.plan_date', 'members.plan_amount', 'members.email', 'members.medical_reg_no', 'members.designation', 'members.institute', 'members.code', 'members.address', 'members.city', 'members.state', 'members.pincode', 'members.country', 'members.created_at')->whereNotNull('additional_package.room_tarrif')->where('additional_package.room_tarrif', '!=', '')->where('members.status', 1);
                    
                }
        }
     
            elseif(isset($from) && !empty($from) && isset($to) && !empty($to)){
                $from = date("Y-m-d h:i:s", strtotime($request->from_date));
                $to = date("Y-m-d h:i:s", strtotime($request->to_date));
                $member = $member->whereBetween('created_at', [$from, $to]);
            }
        
        elseif(isset($request->search) && !empty($request->search)){
            $member = $member->where('name','LIKE',"%{$request->search}%")->orwhere('email','LIKE',"%{$request->search}%")->orwhere('membership_no','LIKE',"%{$request->search}%")->orwhere('category_id','LIKE',"%{$request->search}%")->orwhere('medical_reg_no','LIKE',"%{$request->search}%")->orwhere('designation','LIKE',"%{$request->search}%")->orwhere('institute','LIKE',"%{$request->search}%")->orwhere('mobile','LIKE',"%{$request->search}%")->orwhere('email','LIKE',"%{$request->search}%")->orwhere('city','LIKE',"%{$request->search}%")->orwhere('state','LIKE',"%{$request->search}%")->orwhere('diet','LIKE',"%{$request->search}%")->orwhere('acc_age','LIKE',"%{$request->search}%")->orwhere('acc_gender','LIKE',"%{$request->search}%");
        }
        $member = $member->orderBy('id','desc')->get();
       
        return view('admin.vip.index')->with(['member'=>$member]);
    }
    public function vipMembersDetail($id)
    {
        $member = Member::whereNotNull('type')->where('id', $id)->first();
        $additional_package = AdditionalPackage::where('member_id', $id)->get();
        if(isset($additional_package->gala_dinner_price) && !empty($additional_package->gala_dinner_price)){
            $dinner_date = Dinner::where('status', 1)->pluck('start_date')->first();
            $additional_package['dinner_date'] = $dinner_date;
        }
        $plan = Plan::where('id', $member->plan_id)->first();
        return view('admin.vip.detail')->with(['member'=>$member, 'additional_package'=>$additional_package,'plan' => $plan]);
    }
    public function vipMembersEdit($id)
    {
        $member = Member::whereNotNull('type')->where('id', $id)->first();
        $additional_package = AdditionalPackage::where('member_id', $id)->get();
        return view('admin.vip.edit')->with(['member'=>$member, 'additional_package'=>$additional_package]);
    }

    public function payment()
    {
        $member = Payment::join('members','members.id','payment.member_id')->select('payment.id', 'payment.member_id', 'members.name','members.mobile', 'payment.payment_id', 'payment.payment_status', 'payment.total', 'payment.created_at', 'members.category', 'members.code')->orderBy('payment.created_at', 'desc')->get();
        //dd($member);
        return view('admin.payment')->with(['member'=>$member]);
    }
     public function onsite_payment()
    {
       $payment = OnsitePaymentHistory::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        //dd($member);
        return view('admin.onsite_payment')->with(['payment'=>$payment]);
    }
    
    public function generatePDF($id)
    {
        $member = Member::find($id);
        $package = AdditionalPackage::where('member_id', $id)->where('payment_status', 'paid')->select('gala_dinner_price', 'room_tarrif_price')->first();
        $data = ['member'=>$member, 'package'=>$package];
        $pdf = PDF::loadView('id_card', $data);
        $pdf->getDomPDF()->setHttpContext(
        stream_context_create([
                'ssl' => [
                    'allow_self_signed'=> TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        $directory = public_path('upload/member/id_card/');
        $fileLocated = $directory . $member->name.'.pdf';
        $file_store = '/upload/member/id_card/'.$member->name.'.pdf';
        $pdf->loadView('id_card', $data)->save($fileLocated);
        Member::where('id', $id)->update(['path'=>$file_store]);
        return $pdf->download($member->name.'.pdf');
    }
}

