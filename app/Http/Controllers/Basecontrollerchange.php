<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member, App\Models\Plan, App\Models\Categorys, App\Models\Dinner, App\Models\RoomTarrif, App\Models\AdditionalPackage, App\Models\Payment, App\Models\Training, App\Models\TAbstract, App\Models\Order;
use Carbon\Carbon;
use Razorpay\Api\Api;
use Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
class BaseController extends Controller
{
    public function home()
    {
        return view('homepage');
    }
    public function conferenceVenue()
    {
        return view('conference_venue');
    }
    public function message()
    {
        return view('message');
    }
    public function food()
    {
        return view('food');
    }
    public function committee()
    {
        return view('committee');
    }
    public function airsCommittee()
    {
        return view('airs');
    }
    public function aboutVenue()
    {
        return view('aboutvenue');
    }
    public function aboutChennai()
    {
        return view('aboutchennai');
    }
    public function programGlance()
    {
        return view('glance');
    }
    public function conferenceProgram()
    {
        return view('conference');
    }
    public function abstracts()
    {
        return view('abstracts');
    }
    public function abstractForm(Request $request)
    {
        return view('abstracts_form');
    }
    public function abstractStore(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'name'=>'required|min:1|max:100|unique:abstract,name',
        //    'email'=>'required|min:1|max:100|email|unique:abstract,email',
          'email'=>'required|min:1|max:100|email',
            'reg_id'=>'required',
            //'note'=>'required|min:50|max:300',
            //'file'=>'required',
            // 'file_0' => 'nullable|mimes:doc,docx|max:5120',
            // 'file_1' => 'nullable|mimes:doc,docx|max:5120',
            // 'file_2' => 'nullable|mimes:doc,docx|max:5120',
            // 'file_3' => 'nullable|mimes:doc,docx|max:5120',
            // 'file_4' => 'nullable|mimes:doc,docx|max:5120',
        ],[
            'name.required'=>'Name is required',
            'email.required'=>'Email is required',
            'reg_id.required'=>'Registration ID is required',
            // 'note.required'=>'Abstract is required',
            // 'title.required'=>'Title is required',
            // 'file.required'=>'Word / Doc is required',
        ]);
     try {
            if(isset($request->id) && !empty($request->id)){
                $msg = 'Abstract has been Updated Successfully';
            } else {
                $msg = 'Abstract Registration has been Stored Successfully';
            }
            $file_0 = '';
            $file_1 = '';
            $file_2 = '';
            $file_3 = '';
            $file_4 = '';
            
            if (request()->hasFile('file_0')) {
                $file_0 = $this->imageUpload(request()->file('file_0'), '/upload/abstract/');
            }
            if (request()->hasFile('file_1')) {
                $file_1 = $this->imageUpload(request()->file('file_1'), '/upload/abstract/');
            }
            if (request()->hasFile('file_2')) {
                $file_2 = $this->imageUpload(request()->file('file_2'), '/upload/abstract/');
            }
            if (request()->hasFile('file_3')) {
                $file_3 = $this->imageUpload(request()->file('file_3'), '/upload/abstract/');
            }
            if (request()->hasFile('file_4')) {
                $file_4 = $this->imageUpload(request()->file('file_4'), '/upload/abstract/');
            }
            
            $catergory = json_encode($request->category_id);
            $abstract = TAbstract::updateOrCreate([
                'id'=>$request->id,
            ],[
                'name'=> $request->name,
                'email'=> $request->email,
                'reg_id'=> $request->reg_id,
                'catergory_id'=>$catergory,
                'note'=>$request->note_0,
                'file'=> $file_0,
                'title_0' => $request->title_0,
                'note_1'=>$request->note_1,
                'file_1'=> $file_1,
                'title_1' => $request->title_1,
                'note_2'=>$request->note_2,
                'file_2'=> $file_2,
                'title_2' => $request->title_2,
                'note_3'=>$request->note_3,
                'file_3'=> $file_3,
                'title_3' => $request->title_3,
                'note_4'=>$request->note_4,
                'file_4'=> $file_4,
                'title_4' => $request->title_4,
            ]);
            $abstracts_arr = [];
           $category_map = [
                'Dr.I.S.Gupta Award presentation for Senior Consultant' => 0,
                'Mrs.Neena Saharia Award presentation for Junior Consultant' => 1,
                'Dr. Adesh Saxena and Dr.Mita Saxena Award presentation for Post Graduate' => 2,
                'Dr. Arvind Soni Award - Video Session' => 3,
                'Dr. Anoop Raj Award - Poster Session' => 4,
            ];
            $category_ids = (array) $request->category_id;
            foreach ($category_ids as $category) {
                 $category = trim($category);
  //  print_r($category_ids);
                $index = $category_map[$category] ?? null;
          
                if ($index !== null) {
                    $titleKey = 'title_' . $index;
            
                    $abstracts_arr[] = [
                        'category' => $category,
                        'title' => $request->$titleKey ?? '',
                    ];
                }
            }
            $to_name = $request->name;
            $to_email = $request->email;
            $data = ['name' => $request->name, 'reg_id' => $request->reg_id, 'abstracts_arr' => $abstracts_arr,'category_id'=>$request->category_id];
            try {
            Mail::send('mail.abstract', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject('Abstract Mail - Confirmation');
            });
            TAbstract::where('id', $abstract['id'])->update(['mail_send'=>2]);
            return redirect('abstract-form')->with(['status'=>true, 'msg'=>'Abstarct Mail has been sent successfully']);

        } catch (\Throwable $th) {
            // dd($th);
            // return back()->with(['status'=>false, 'msg'=>'Invoice Failed to Send']);
            return response()->json(['status'=>false, 'msg'=>'Invoice Failed to Send']);
        }
        } catch (\Throwable $th) {
            // dd($th);
            return back()->with(['status'=>false, 'msg'=>'Failed to Stored']);
        }
    }
    public function contact()
    {
        return view('contact');
    }
    public function weather()
    {
        return view('weather');
    }
    public function categoryList($category_name)
    {
        $category = Categorys::where('slug',$category_name)->pluck('name')->first();
        $plan = Plan::where('category', $category)->where('status',1)->where('amount','!=',0.00)->first();
        if(isset($plan) && !empty($plan)){
            $plan['other_date'] = isset($plan->plan_date) && !empty($plan->plan_date) ? date("M d, Y", strtotime($plan->plan_date)) : '';
        }
        return response()->json(['plan'=>$plan]);
    }
    public function categoryDetail($plan_id)
    {
        $plan = Plan::where('id', $plan_id)->first();
        return response()->json(['plan'=>$plan]);
    }
    public function registration()
    {
        $category = Categorys::select('id','name', 'slug')->where('status',1)->get();
        foreach($category as $c){
            $c['plan'] = Plan::where('category', $c->name)->where('status',1)->get();
        }
        $dinner = Dinner::where('status', 1)->get();
        $room_tarrif = RoomTarrif::where('status', 1)->orderBy('id', 'asc')->get();
        $training = Training::where('status',1)->get();
        return view('registration')->with(['plan'=>$category, 'dinner'=>$dinner, 'room_tarrif'=>$room_tarrif, 'training'=>$training]);
    }
    public function registrationForm()
    {
        $category = Categorys::select('id','name', 'slug')->where('status',1)->where('name', '!=', 'Senior Citizens')->get();
        $dinner = Dinner::where('status', 1)->orderBy('id', 'asc')->first();
        $room_tarrif = RoomTarrif::where('status', 1)->orderBy('id', 'asc')->first();
        $training = Training::where('status',1)->get();
        return view('registration_form')->with(['category'=>$category, 'dinner'=>$dinner, 'room_tarrif'=>$room_tarrif, 'training'=>$training]);
    }
    public function vipMember()
    {
        $category = Categorys::select('id','name', 'slug')->where('status',1)->where('name', '!=', 'Senior Citizens')->get();
        $dinner = Dinner::where('status', 1)->orderBy('id', 'asc')->first();
        $room_tarrif = RoomTarrif::where('status', 1)->orderBy('id', 'asc')->first();
        $training = Training::where('status',1)->get();
        return view('vip-member')->with(['category'=>$category, 'dinner'=>$dinner, 'room_tarrif'=>$room_tarrif, 'training'=>$training]);
    }
    public function package()
    {
        //$dinner = Dinner::where('status', 1)->orderBy('id', 'asc')->first();
        $room_tarrif = RoomTarrif::where('status', 1)->orderBy('id', 'asc')->first();
        return view('package')->with(['room_tarrif'=>$room_tarrif]);
    }
    public function dinner()
    {
        $dinner = Dinner::where('status', 1)->orderBy('id', 'asc')->first();
        //$room_tarrif = RoomTarrif::where('status', 1)->orderBy('id', 'asc')->first();
        return view('package')->with(['dinner'=>$dinner]);
    }
    public function training()
    {
        $training = Training::where('status',1)->get();
        return view('training')->with(['training'=>$training]);
    }
    public function searchMember($search)
    {
        //dd($search);
        $member = Member::orwhere('email', 'LIKE', "%$search%")->orwhere('mobile', 'LIKE', "%$search%")->select('id', 'membership_no', 'category', 'profile', 'name', 'email', 'mobile', 'qr_code')->first(); 
        $dinner = '';
        $room_tarrif = '';
        $training = '';
        if(isset($member) && !empty($member) && $member == 'international'){
            $dinner = Dinner::where('status', 1)->orderBy('id', 'asc')->first();
            $room_tarrif = RoomTarrif::where('status', 1)->orderBy('id', 'asc')->first();
        } else {
            $dinner = Dinner::where('status', 1)->orderBy('id', 'asc')->first();
            $room_tarrif = RoomTarrif::where('status', 1)->orderBy('id', 'asc')->first();
        }
        if(isset($member) && !empty($member)){
            $dinner = AdditionalPackage::where('member_id', $member->id)->whereNotNull('gala_dinner_price')->where('gala_dinner_price', '!=' , '0.00')->pluck('gala_dinner_price')->first();
            $room = AdditionalPackage::where('member_id', $member->id)->whereNotNull('room_tarrif_price')->where('room_tarrif_price', '!=' , '0.00')->pluck('room_tarrif_price')->first();
            ///dd($room);
            $training = AdditionalPackage::where('member_id', $member->id)->whereNotNull('training')->pluck('training')->first();
            $member['dinner'] = isset($dinner) && !empty($dinner) ? 1 : 0;
            $member['room_data'] = isset($room) && !empty($room) ? 1 : 0;
            $member['training'] = isset($training) && !empty($training) ? $training : 0;
        }
        //dd($room);
        return response()->json(['member'=>$member, 'dinner'=>isset($dinner) && !empty($dinner) ? $dinner : 0, 'room'=>isset($room) && !empty($room) ? $room : 0]);
    }
    public function registrationStore(Request $request)
    {
        
     

        $validatedData = $request->validate([
            'category'=>'required',
            'name'=>'required|min:1|max:100',
            'mobile'=>'required|max:10',
            'email'=>'required|min:1|max:100|email',
            //'address'=>'required|min:1|max:100',
            //'city'=>'required|min:1|max:100',
            //'state'=>'required|min:1|max:100',
            //'pincode'=>'required|max:6',
            //'diet'=>'required|min:1|max:100',
            // 'razorpay_payment_id'=>'required',
        ],[
            'profile.required'=>'Profile Image is required',
            'category.required'=>'Category is required',
            'membership_no.required'=>'Membership No is required',
            'name.required'=>'Name is required',
            'medical_reg_no.required'=>'Medical Reg. No is required',
            'designation.required'=>'Designation is required',
            'institute.required'=>'Institute is required',
            'mobile.required'=>'Mobile Number is required',
            'email.required'=>'Email is required',
            'address.required'=>'Address is required',
            'city.required'=>'City is required',
            'state.required'=>'State is required',
            'pincode.required'=>'Pincode is required',
            'diet.required'=>'Diet is required',
            'accompanying_person.required'=>'Accompanying person is required',
            'acc_person_name.required'=>'Person Name is required',
            'acc_age.required'=>'Age is required',
            'acc_gender.required'=>'Gender is required',
            'razorpay_payment_id.required'=>'Razorpay Payment Id is required',
        ]);
     //   try {
            // if(isset($request->id) && !empty($request->id)){
            //     $msg = 'Registration has been Updated Successfully';
            // } else {
            //     $msg = 'Registration has been Stored Successfully';
            // }
            // $profile = '';
            // $payment_screen_shot = '';
            // if (request()->hasFile('profile')) {
            //     $profile = $this->imageUpload(request()->file('profile'), '/upload/member/');
            // }
            // if (request()->hasFile('payment_screen_shot')) {
            //     $payment_screen_shot = $this->imageUpload(request()->file('payment_screen_shot'), '/upload/member/');
            // }
            
            // $receiptData = base64_encode(json_encode([
            //     'name' => $validatedData['name'],
            //     'email' => $validatedData['email'],
            //     'amount' => (int) round($amount * 100)
            // ]));
                if ($request->hasFile('profile')) {
                            $profile_path = $this->imageUpload(request()->file('profile'), '/upload/member/');
                          //  $path = $request->file('profile')->store('profiles');
                        }
                        if ($request->hasFile('payment_screen_shot')) {
                            $screenshot_path = $this->imageUpload(request()->file('payment_screen_shot'), '/upload/member/');
                        }
                        
                        $notes = array_merge(
                        $request->only([
                            'id',
                            'name',
                            'email',
                            'mobile',
                            'category',
                            'membership_no',
                            'medical_reg_no',
                            'designation',
                            'institute',
                            'address',
                            'city',
                            'state',
                            'pincode','country',
                            'diet','plan_date','plan_amount',
                            'accompanying_person',
                            'acc_person_name',
                            'acc_age',
                            'acc_gender',
                            'become_airs','plan_amount','plan_id','gala_dinner','gala_dinner_price','room_tarrif_txt','room_tarrif_price','room_tarrif_date','person',
                            'training','total'
                        ]),
                        [
                            'profile_path' => $profile_path ?? null,'payment_screen_shot_path' => $screenshot_path ?? null,
                        ]
                    );
                    
                   $receiptData = 'RCPT_' . time();
                   $amount = $request->total;
                    try {
                    
                   $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

                    $order = $api->order->create([
                        'receipt' => $receiptData,
                        'amount' => (int) round($amount * 100),
                        'currency' => $request->currency,
                        'payment_capture' => 1
                    ]);
                    
                     Cache::put('user_order_' . $order['id'], $notes, now()->addMinutes(30));
                     Order::create([
                                'razorpay_order_id' => $order['id'],
                                'receipt' => $receiptData,
                                'email' => $validatedData['email'],
                                'amount' => $amount,
                                'status' => 'created',
                            ]);
                     
                             return view('razorpay_checkout', [
                                'order_id' => $order['id'],
                                'amount' =>  (int) round($amount * 100),
                                'currency' => $request->currency,
                                'key' => config('services.razorpay.key'),'userName' => $validatedData['name'] ?? '',
                                'userEmail' => $validatedData['email'] ?? '', 'allData' => $request->all(),'receipt'    => $receiptData
                            ]);
                } catch (\Exception $e) {
                    Log::channel('webhook')->error("International Client Razorpay order creation", ['error' => $e->getMessage()]);
                     Cache::put('user_receipt_' . $receiptData, $notes, now()->addMinutes(30));
                       Order::create([
                            'razorpay_order_id' => null,
                            'receipt' => $receiptData,
                            'email' => $validatedData['email'],
                            'amount' => $amount,
                            'status' => 'created',
                        ]);
                
                        // ✅ Return same checkout view with receipt (no order id)
                        return view('razorpay_checkout', [
                            'order_id'   => null,
                            'amount'     => (int) round($amount * 100),
                            'currency'   => $request->currency,
                            'key'        => config('services.razorpay.key'),
                            'userName'   => $validatedData['name'] ?? '',
                            'userEmail'  => $validatedData['email'] ?? '',
                            'allData'    => $request->all(),
                            'receipt'    => $receiptData
                        ]);
                        //    return back()->with(['status'=>false, 'msg'=>'Failed to Stored']);
                }
            
            // if(isset($request->razorpay_payment_id) && !empty($request->razorpay_payment_id)){
                
            //     $order_id = "";
                
                
            //     $amount = $request->total;
                
            //     try{
            //         $payment = $api->payment->fetch($request->razorpay_payment_id)->capture(array('amount'=>($amount * 100),'currency' => $request->currency));
            //     } catch (\Throwable $th) {
            //         return back()->with(['status'=>false, 'msg'=>$th->getMessage()]);
            //     }
                
            //     //$payment = $api->payment->fetch($request->razorpay_payment_id)->capture(array('amount'=>(100 * 100),'currency' => 'INR'));
            //     $order_id = isset($payment['order_id']) && !empty($payment['order_id']) ? $payment['order_id'] : '';
            //     if(isset($payment->status) && !empty($payment->status) && $payment->status == "captured"){
            //         $pay_status = 'paid';    
                    
                    
                    
            //         $member = Member::updateOrCreate([
            //             'id'=>$request->id,
            //         ],[
            //             'profile'=> $profile,
            //             'category'=> $request->category,
            //             'membership_no'=> $request->membership_no,
            //             'name'=> $request->name,
            //             'medical_reg_no'=> $request->medical_reg_no,
            //             'designation'=> $request->designation,
            //             'institute'=> $request->institute,
            //             'mobile'=> $request->mobile,
            //             'email'=> $request->email,
            //             'address'=> $request->address,
            //             'city'=> $request->city,
            //             'state'=> $request->state,
            //             'pincode'=> $request->pincode,
            //             'country'=>isset($request->country) && !empty($request->country) ? $request->country : 'India',
            //             'diet'=> $request->diet,
            //             'payment_screen_shot'=> $payment_screen_shot,
            //             'plan_date'=> $request->plan_date,
            //             'plan_amount'=> $request->plan_amount,
            //             'plan_id'=> $request->plan_id,
            //             'gst'=>($request->plan_amount * 18)/100,
            //             'total'=>$request->total,
            //             'payment_id'=>$request->razorpay_payment_id,
            //             'order_id'=>$order_id,
            //             'payment_status'=>$pay_status,
            //             'payment_message'=>isset($payment->status) && !empty($payment->status) ? $payment->status : '',
            //             'become_aris_member'=>isset($request->become_airs) && !empty($request->become_airs) && $request->become_airs !=0 ? 1 : 0,
            //             'become_aris_member_price'=>isset($request->become_airs) && !empty($request->become_airs) ? $request->become_airs : 0,
            //             'mail_send'=>1,
            //         ]);
                    
            //         AdditionalPackage::create([
            //             'member_id'=>$member->id,
            //             'order_id'=>$order_id,
            //             'payment_id'=>$request->razorpay_payment_id,
            //             'payment_status'=>$pay_status,
            //             'payment_message'=>isset($payment->status) && !empty($payment->status) ? $payment->status : '',
            //             'mail_send'=>1,
            //             'gala_dinner'=>isset($request->gala_dinner) && !empty($request->gala_dinner) ? $request->gala_dinner : '',
            //             'gala_dinner_price'=>isset($request->gala_dinner_price) && !empty($request->gala_dinner_price) ? $request->gala_dinner_price : 0,
            //             'gala_dinner_tax'=>0,
            //             'room_tarrif_id'=>isset($request->plan_id) && !empty($request->plan_id) ? $request->plan_id : 0,
            //             'room_tarrif'=>isset($request->room_tarrif_txt) && !empty($request->room_tarrif_txt) ? $request->room_tarrif_txt : '',
            //             'room_tarrif_price'=>isset($request->room_tarrif_price) && !empty($request->room_tarrif_price) ? $request->room_tarrif_price : 0,
            //             'room_tarrif_tax'=>isset($request->room_tarrif_price) && !empty($request->room_tarrif_price) ? ($request->room_tarrif_price * 18)/100 : 0,
            //             'no_of_days'=>isset($request->room_tarrif_date) && !empty($request->room_tarrif_date) ? count((array)$request->room_tarrif_date) : 0,
            //             'room_dates'=>isset($request->room_tarrif_date) && !empty($request->room_tarrif_date) ? implode(",",(array)$request->room_tarrif_date) : '',
            //             'person'=>isset($request->person) && !empty($request->person) ? json_encode($request->person) : '',
            //             'training'=>isset($request->training) && !empty($request->training) ? implode(",",(array)$request->training) : '',
            //             'total'=>$amount,
            //             ]);
            //         Payment::create([
            //             'member_id'=>$member->id,
            //             'order_id'=>$order_id,
            //             'payment_id'=>$request->razorpay_payment_id,
            //             'payment_status'=>$pay_status,
            //             'payment_message'=>isset($payment->status) && !empty($payment->status) ? $payment->status : '',
            //             'total'=>$amount,
            //         ]);
            //         foreach((array)$request->training as $training){
            //             $training_count = Training::where('text', $training)->pluck('join_user')->first();
            //             Training::where('text', $training)->update(['join_user'=>((int)$training_count+1)]);
            //         }
            //         return redirect('registration')->with(['status'=>true, 'msg'=>$msg, 'rg'=>'rg']);
            //     } else {
            //         $pay_status = 'Failed';
            //         return back()->with(['status'=>false, 'msg'=>'Payment Failed']);
            //     }
            // } else {
            //     return back()->with(['status'=>false, 'msg'=>'Payment Failed']);
            // }
            //return redirect('registration')->with(['status'=>true, 'msg'=>$msg, 'rg'=>'rg']);
        // } catch (\Throwable $th) {
        //     //dd($th);
        //     \Log::error('Razorpay order creation failed', ['error' => $th]);
        //     return back()->with(['status'=>false, 'msg'=>'Failed to Stored']);
        // }
    }
    public function packageStore(Request $request)
    {
        
        $validatedData = $request->validate([
            //'category'=>'required',
            //'name'=>'required|min:1|max:100',
            //'mobile'=>'required|max:10',
            'email'=>'required|min:1|max:100|email',
            //'address'=>'required|min:1|max:100',
            //'city'=>'required|min:1|max:100',
            //'state'=>'required|min:1|max:100',
            //'pincode'=>'required|max:6',
            //'diet'=>'required|min:1|max:100',
            'razorpay_payment_id'=>'required',
        ],[
            'profile.required'=>'Profile Image is required',
            'category.required'=>'Category is required',
            'membership_no.required'=>'Membership No is required',
            'name.required'=>'Name is required',
            'medical_reg_no.required'=>'Medical Reg. No is required',
            'designation.required'=>'Designation is required',
            'institute.required'=>'Institute is required',
            'mobile.required'=>'Mobile Number is required',
            'email.required'=>'Email is required',
            'address.required'=>'Address is required',
            'city.required'=>'City is required',
            'state.required'=>'State is required',
            'pincode.required'=>'Pincode is required',
            'diet.required'=>'Diet is required',
            'accompanying_person.required'=>'Accompanying person is required',
            'acc_person_name.required'=>'Person Name is required',
            'acc_age.required'=>'Age is required',
            'acc_gender.required'=>'Gender is required',
            'razorpay_payment_id.required'=>'Razorpay Payment Id is required',
        ]);
        try {
            if(isset($request->id) && !empty($request->id)){
                $msg = 'Package has been Updated Successfully';
            } else {
                $msg = 'Package has been Stored Successfully';
            }
            
            if(isset($request->razorpay_payment_id) && !empty($request->razorpay_payment_id)){
                
                $order_id = "";
                $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
                $amount = $request->total;
                try{
                    $payment = $api->payment->fetch($request->razorpay_payment_id)->capture(array('amount'=>($amount * 100),'currency' => 'INR'));
                } catch (\Throwable $th) {
                    return back()->with(['status'=>false, 'msg'=>$th->getMessage()]);
                }
                
                //$payment = $api->payment->fetch($request->razorpay_payment_id)->capture(array('amount'=>(100 * 100),'currency' => 'INR'));
                $order_id = isset($payment['order_id']) && !empty($payment['order_id']) ? $payment['order_id'] : '';
                if(isset($payment->status) && !empty($payment->status) && $payment->status == "captured"){
                    $pay_status = 'paid';    
                    Member::where('id', $request->member_id)->update(['mail_send'=>1]);
                    AdditionalPackage::create([
                        'member_id'=>$request->member_id,
                        'order_id'=>$order_id,
                        'payment_id'=>$request->razorpay_payment_id,
                        'payment_status'=>$pay_status,
                        'payment_message'=>isset($payment->status) && !empty($payment->status) ? $payment->status : '',
                        'mail_send'=>1,
                        'gala_dinner'=>isset($request->gala_dinner) && !empty($request->gala_dinner) ? $request->gala_dinner : '',
                        'gala_dinner_price'=>isset($request->gala_dinner_price) && !empty($request->gala_dinner_price) ? $request->gala_dinner_price : 0,
                        'gala_dinner_tax'=>0,
                        'room_tarrif'=>isset($request->room_tarrif_txt) && !empty($request->room_tarrif_txt) ? $request->room_tarrif_txt : '',
                        'room_tarrif_price'=>isset($request->room_tarrif_price) && !empty($request->room_tarrif_price) ? $request->room_tarrif_price : 0,
                        'room_tarrif_tax'=>isset($request->room_tarrif_price) && !empty($request->room_tarrif_price) ? ($request->room_tarrif_price * 18)/100 : 0,
                        'no_of_days'=>isset($request->room_tarrif_date) && !empty($request->room_tarrif_date) ? count((array)$request->room_tarrif_date) : 0,
                        'room_dates'=>isset($request->room_tarrif_date) && !empty($request->room_tarrif_date) ? implode(",",(array)$request->room_tarrif_date) : '',
                        'person'=>isset($request->person) && !empty($request->person) ? json_encode($request->person) : '',
                        'total'=>$amount,
                        ]);
                    Payment::create([
                        'member_id'=>$request->member_id,
                        'order_id'=>$order_id,
                        'payment_id'=>$request->razorpay_payment_id,
                        'payment_status'=>$pay_status,
                        'payment_message'=>isset($payment->status) && !empty($payment->status) ? $payment->status : '',
                        'total'=>$amount,
                    ]);
                    return redirect('registration')->with(['status'=>true, 'msg'=>$msg]);
                } else {
                    $pay_status = 'Failed';
                    return back()->with(['status'=>false, 'msg'=>'Payment Failed']);
                }
            } else {
                return back()->with(['status'=>false, 'msg'=>'Payment Failed']);
            }
        } catch (\Throwable $th) {
            //dd($th);
            return back()->with(['status'=>false, 'msg'=>'Failed to Stored']);
        }
    }
    public function traningStore(Request $request)
    {
        
        $validatedData = $request->validate([
            //'category'=>'required',
            //'name'=>'required|min:1|max:100',
            //'mobile'=>'required|max:10',
            'email'=>'required|min:1|max:100|email',
            //'address'=>'required|min:1|max:100',
            //'city'=>'required|min:1|max:100',
            //'state'=>'required|min:1|max:100',
            //'pincode'=>'required|max:6',
            //'diet'=>'required|min:1|max:100',
            'razorpay_payment_id'=>'required',
        ],[
            'profile.required'=>'Profile Image is required',
            'category.required'=>'Category is required',
            'membership_no.required'=>'Membership No is required',
            'name.required'=>'Name is required',
            'medical_reg_no.required'=>'Medical Reg. No is required',
            'designation.required'=>'Designation is required',
            'institute.required'=>'Institute is required',
            'mobile.required'=>'Mobile Number is required',
            'email.required'=>'Email is required',
            'address.required'=>'Address is required',
            'city.required'=>'City is required',
            'state.required'=>'State is required',
            'pincode.required'=>'Pincode is required',
            'diet.required'=>'Diet is required',
            'accompanying_person.required'=>'Accompanying person is required',
            'acc_person_name.required'=>'Person Name is required',
            'acc_age.required'=>'Age is required',
            'acc_gender.required'=>'Gender is required',
            'razorpay_payment_id.required'=>'Razorpay Payment Id is required',
        ]);
        try {
            if(isset($request->id) && !empty($request->id)){
                $msg = 'Hands on Training has been Updated Successfully';
            } else {
                $msg = 'Hands on Training has been Stored Successfully';
            }
            
            if(isset($request->razorpay_payment_id) && !empty($request->razorpay_payment_id)){
                
                $order_id = "";
                $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
                $amount = $request->total;
                try{
                    $payment = $api->payment->fetch($request->razorpay_payment_id)->capture(array('amount'=>($amount * 100),'currency' => 'INR'));
                } catch (\Throwable $th) {
                    return back()->with(['status'=>false, 'msg'=>$th->getMessage()]);
                }
                
                //$payment = $api->payment->fetch($request->razorpay_payment_id)->capture(array('amount'=>(100 * 100),'currency' => 'INR'));
                $order_id = isset($payment['order_id']) && !empty($payment['order_id']) ? $payment['order_id'] : '';
                if(isset($payment->status) && !empty($payment->status) && $payment->status == "captured"){
                    $pay_status = 'paid';    
                    Member::where('id', $request->member_id)->update(['mail_send'=>1]);
                    AdditionalPackage::create([
                        'member_id'=>$request->member_id,
                        'order_id'=>$order_id,
                        'payment_id'=>$request->razorpay_payment_id,
                        'payment_status'=>$pay_status,
                        'payment_message'=>isset($payment->status) && !empty($payment->status) ? $payment->status : '',
                        'mail_send'=>1,
                        'training'=>isset($request->training) && !empty($request->training) ? implode(",",(array)$request->training) : '',
                        'total'=>$amount,
                        ]);
                    Payment::create([
                        'member_id'=>$request->member_id,
                        'order_id'=>$order_id,
                        'payment_id'=>$request->razorpay_payment_id,
                        'payment_status'=>$pay_status,
                        'payment_message'=>isset($payment->status) && !empty($payment->status) ? $payment->status : '',
                        'total'=>$amount,
                    ]);
                    foreach((array)$request->training as $training){
                        $training_count = Training::where('text', $training)->pluck('join_user')->first();
                        Training::where('text', $training)->update(['join_user'=>((int)$training_count+1)]);
                    }
                    return redirect('registration')->with(['status'=>true, 'msg'=>$msg]);
                } else {
                    $pay_status = 'Failed';
                    return back()->with(['status'=>false, 'msg'=>'Payment Failed']);
                }
            } else {
                return back()->with(['status'=>false, 'msg'=>'Payment Failed']);
            }
        } catch (\Throwable $th) {
            //dd($th);
            return back()->with(['status'=>false, 'msg'=>'Failed to Stored']);
        }
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
    public function invoicePDF($id)
    {
        $overall_total = 0;
        $overall_tax = 0;
        $member = Member::find($id);
        $packages = AdditionalPackage::where('member_id', $id)->get();
        $payment = Payment::where('member_id', $id)->first();
        $plan = Plan::where('id', $member->plan_id)->where('status',1)->first();
        
        $overall_total += isset($plan->amount) && !empty($plan->amount) ? (float)$plan->amount : 0;
        $overall_tax += isset($plan->amount) && !empty($plan->amount) ? (float)$plan->amount : 0;
        foreach($packages as $package){
            if(isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) && $package->gala_dinner_price !=0.00 || isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) && $package->room_tarrif_price !=0.00){
                $overall_total += isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) ? (float)$package->gala_dinner_price : 0;
                $overall_total += isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? (float)$package->room_tarrif_price : 0;
                $overall_tax += isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? (float)$package->room_tarrif_price : 0;
            }
        }
        if(isset($member->become_aris_member_price) && !empty($member->become_aris_member_price)){
            $overall_total += isset($member->become_aris_member_price) && !empty($member->become_aris_member_price) ? (float)$member->become_aris_member_price : 0;
        }
        if(isset($package->training) && !empty($package->training)){
            $prices = Training::whereIn('text', $training)->pluck('price', 'text');
            foreach($training as $index => $trainingName)
            {
                $trainingName = trim($trainingName);
                $price = isset($prices[$trainingName]) ? (float) $prices[$trainingName] : 0;
                $overall_tax += $price;
                $overall_total += $price;
            }
		  //  $overall_total += isset($training) && !empty($training) ? (float)(count($training) * 1000) : 0;
		  //  $overall_tax += isset($training) && !empty($training) ? (float)(count($training) * 1000) : 0;
        }
        $total_in_words = $this->getIndianCurrencyData($overall_total + ($overall_tax * 18) / 100);
        
        $data = ['member'=>$member, 'packages'=>$packages, 'payment'=>$payment, 'plan'=>$plan, 'total_in_words'=>$total_in_words];
        $pdf = PDF::loadView('mail.invoice', $data);
        $pdf->getDomPDF()->setHttpContext(
        stream_context_create([
                'ssl' => [
                    'allow_self_signed'=> TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        $directory = public_path('upload/member/invoice/');
        $fileLocated = $directory . $member->name.'.pdf';
        $file_store = '/upload/member/invoice/invoice_'.$member->name.'.pdf';
        $pdf->loadView('mail.invoice', $data)->save($fileLocated);
        Member::where('id', $id)->update(['invoice'=>$file_store]);
        return $pdf->download('invoice_'.$member->name.'.pdf');
    }
    public function vipStore(Request $request)
    {
        
        $validatedData = $request->validate([
            'category'=>'required',
            'first_name'=>'required|min:1|max:100',
            'mobile'=>'required|max:10',
            'email'=>'required|min:1|max:100|email',
            //'address'=>'required|min:1|max:100',
            //'city'=>'required|min:1|max:100',
            //'state'=>'required|min:1|max:100',
            //'pincode'=>'required|max:6',
            //'diet'=>'required|min:1|max:100',
            //'razorpay_payment_id'=>'required',
        ],[
            'profile.required'=>'Profile Image is required',
            'category.required'=>'Category is required',
            'membership_no.required'=>'Membership No is required',
            'name.required'=>'Name is required',
            'medical_reg_no.required'=>'Medical Reg. No is required',
            'designation.required'=>'Designation is required',
            'institute.required'=>'Institute is required',
            'mobile.required'=>'Mobile Number is required',
            'email.required'=>'Email is required',
            'address.required'=>'Address is required',
            'city.required'=>'City is required',
            'state.required'=>'State is required',
            'pincode.required'=>'Pincode is required',
            'diet.required'=>'Diet is required',
            'accompanying_person.required'=>'Accompanying person is required',
            'acc_person_name.required'=>'Person Name is required',
            'acc_age.required'=>'Age is required',
            'acc_gender.required'=>'Gender is required',
            'razorpay_payment_id.required'=>'Razorpay Payment Id is required',
        ]);
        //dd('a1');
        try {
            if(isset($request->id) && !empty($request->id)){
                $msg = 'Registration has been Updated Successfully';
            } else {
                $msg = 'Registration has been Stored Successfully';
            }
            $profile = '';
            $payment_screen_shot = '';
            if (request()->hasFile('profile')) {
                $profile = $this->imageUpload(request()->file('profile'), '/upload/member/');
            }
            if (request()->hasFile('payment_screen_shot')) {
                $payment_screen_shot = $this->imageUpload(request()->file('payment_screen_shot'), '/upload/member/');
            }
            
            if(isset($request->razorpay_payment_id) && !empty($request->razorpay_payment_id)){
                
                $order_id = "";
                $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
                
                $amount = $request->total;
                
                try{
                    $payment = $api->payment->fetch($request->razorpay_payment_id)->capture(array('amount'=>($amount * 100),'currency' => 'INR'));
                } catch (\Throwable $th) {
                    return back()->with(['status'=>false, 'msg'=>$th->getMessage()]);
                }
                $order_id = isset($payment['order_id']) && !empty($payment['order_id']) ? $payment['order_id'] : '';
                if(isset($payment->status) && !empty($payment->status) && $payment->status == "captured"){
                    $pay_status = 'paid';    
                } else {
                    $pay_status = 'Failed';
                }    
            } else {
                $order_id = "";
                $pay_status = 'Failed';
                $amount = $request->total;
            }
                    
                    $member = Member::updateOrCreate([
                        'id'=>$request->id,
                    ],[
                        'profile'=> $profile,
                        'category'=> $request->category,
                        'membership_no'=> $request->membership_no,
                        'first_name'=>$request->first_name,
                        'middle_name'=>$request->middle_name,
                        'last_name'=>$request->last_name,
                        'name'=> $request->first_name .' '.$request->middle_name .' '.$request->last_name,
                        'type'=>'vip',
                        'medical_reg_no'=> $request->medical_reg_no,
                        'designation'=> $request->designation,
                        'institute'=> $request->institute,
                        'mobile'=> $request->mobile,
                        'email'=> $request->email,
                        'address'=> $request->address,
                        'city'=> $request->city,
                        'state'=> $request->state,
                        'pincode'=>$request->pincode,
                        'country'=>isset($request->country) && !empty($request->country) ? $request->country : 'India',
                        'diet'=> $request->diet,
                        'payment_screen_shot'=> $payment_screen_shot,
                        'plan_date'=> $request->plan_date,
                        'plan_amount'=> $request->plan_amount,
                        'plan_id'=> $request->plan_id,
                        'gst'=>($request->plan_amount * 18)/100,
                        'total'=>$request->total,
                        'payment_id'=>isset($request->razorpay_payment_id) && !empty($request->razorpay_payment_id) ? $request->razorpay_payment_id : '',
                        'order_id'=>$order_id,
                        'payment_status'=>$pay_status,
                        'payment_message'=>isset($payment->status) && !empty($payment->status) ? $payment->status : '',
                        'become_aris_member'=>0,
                        'become_aris_member_price'=>0,
                        'mail_send'=>1,
                    ]);
                    
                    AdditionalPackage::create([
                        'member_id'=>$member->id,
                        'order_id'=>$order_id,
                        'payment_id'=>isset($request->razorpay_payment_id) && !empty($request->razorpay_payment_id) ? $request->razorpay_payment_id : '',
                        'payment_status'=>$pay_status,
                        'payment_message'=>isset($payment->status) && !empty($payment->status) ? $payment->status : '',
                        'mail_send'=>1,
                        'gala_dinner'=>isset($request->gala_dinner) && !empty($request->gala_dinner) ? $request->gala_dinner : '',
                        'gala_dinner_price'=>isset($request->gala_dinner_price) && !empty($request->gala_dinner_price) ? $request->gala_dinner_price : 0,
                        'gala_dinner_tax'=>0,
                        'room_tarrif_id'=>isset($request->plan_id) && !empty($request->plan_id) ? $request->plan_id : 0,
                        'room_tarrif'=>isset($request->room_tarrif_txt) && !empty($request->room_tarrif_txt) ? $request->room_tarrif_txt : '',
                        'room_tarrif_price'=>isset($request->room_tarrif_price) && !empty($request->room_tarrif_price) ? $request->room_tarrif_price : 0,
                        'room_tarrif_tax'=>isset($request->room_tarrif_price) && !empty($request->room_tarrif_price) ? ($request->room_tarrif_price * 18)/100 : 0,
                        'no_of_days'=>isset($request->room_tarrif_date) && !empty($request->room_tarrif_date) ? count((array)$request->room_tarrif_date) : 0,
                        'room_dates'=>isset($request->room_tarrif_date) && !empty($request->room_tarrif_date) ? implode(",",(array)$request->room_tarrif_date) : '',
                        'person'=>isset($request->person) && !empty($request->person) ? json_encode($request->person) : '',
                        'training'=>isset($request->training) && !empty($request->training) ? implode(",",(array)$request->training) : '',
                        'total'=>$amount,
                        ]);
                    Payment::create([
                        'member_id'=>$member->id,
                        'order_id'=>$order_id,
                        'payment_id'=>isset($request->razorpay_payment_id) && !empty($request->razorpay_payment_id) ? $request->razorpay_payment_id : '',
                        'payment_status'=>$pay_status,
                        'payment_message'=>isset($payment->status) && !empty($payment->status) ? $payment->status : '',
                        'total'=>$amount,
                    ]);
                    
                    foreach((array)$request->training as $training){
                        $training_count = Training::where('text', $training)->pluck('join_user')->first();
                        Training::where('text', $training)->update(['join_user'=>((int)$training_count+1)]);
                    }
                    return redirect('vip-member')->with(['status'=>true, 'msg'=>$msg, 'rg'=>'rg']);
                
            
            //return redirect('registration')->with(['status'=>true, 'msg'=>$msg, 'rg'=>'rg']);
        } catch (\Throwable $th) {
            dd($th);
            return back()->with(['status'=>false, 'msg'=>'Failed to Stored']);
        }
    }
    public function download()
    {
        return view('download');
    }
    public function mamallapuram()
    {
        return view('mamallapuram');
    }
    public function chennai()
    {
        return view('chennai');
    }
    public function kanchipuram()
    {
        return view('kanchipuram');
    }
    public function accommodation()
    {
        return view('accommodation');
    }
}
