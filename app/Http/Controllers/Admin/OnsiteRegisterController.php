<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use session;
use Mail;
use Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;
use App\Models\OnsiteRegister;
use App\Models\OnsitePaymentHistory;

class OnsiteRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');    
    }
    public function spot_registration(){
          $data = OnsiteRegister::orderBy('id', 'DESC')->get();
          return view('admin.spot_register.index', compact('data'));
    }
    public function onsite_registration(){
        return view('admin.spot_register.add');
    }
     public function store(Request $req)
    {

        $req->validate([
            'name'   => 'required',
            'mobile' => 'required',
            'amount' => 'required|numeric',
            'payment_mode' => 'required'
        ]);
        
        // Check duplicate mobile
        if (OnsiteRegister::where('mobile', $req->mobile)->exists()) {
            return redirect()->back()->withInput()->with('error', 'This mobile number is already registered.');
        }

        // If CASH — directly insert & login
        if ($req->payment_mode === 'cash') {
            try {
            $user = OnsiteRegister::create([
                'name'   => $req->name,
                'mobile' => $req->mobile,
                'amount' => $req->amount,
                'payment_mode' => 'cash'
            ]);
            
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

           try {
            OnsitePaymentHistory::create([
                'user_id' => $user->id,
                'payment_mode' => 'cash',
                'amount' => $req->amount,
                'status' => 'success'
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }


            return redirect('/admin/onsite')
            ->with('success', 'Onsite Registration completed successfully!');
        }

            Log::channel('webhook')->info("Webhook Onsite Payment Log: " . now()->toDateTimeString());
            $data = $req->all();
            Log::channel('webhook')->info("Webhook: Onsite Raw Data: " . json_encode($data));
        // If ONLINE — Create Razorpay order
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $order = $api->order->create([
            'receipt' => uniqid(),
            'amount' => $req->amount * 100, // in paise
            'currency' => 'INR'
        ]);

        // store temp data in session
        session([
            'onsite_data' => [
                'name' => $req->name,
                'mobile' => $req->mobile,
                'amount' => $req->amount,
                'order_id' => $order['id'],
            ]
        ]);

        return view('admin.razorpay.payment', [
            'order_id' => $order['id'],
            'amount' => $req->amount,
            'razorpay_key' => env('RAZORPAY_KEY')
        ]);

    }
    public function razorpaySuccess(Request $request)
{
    $data = session('onsite_data');

    if(!$data){
        return response()->json(['error' => 'Session expired'], 400);
    }

    // Prevent duplicate mobile
    if (OnsiteRegister::where('mobile', $data['mobile'])->exists()) {
        return response()->json(['error' => 'Mobile already registered'], 400);
    }

    $user = OnsiteRegister::create([
        'name' => $data['name'],
        'mobile' => $data['mobile'],
        'amount' => $data['amount'],
        'payment_mode' => 'online',
        'razorpay_payment_id' => $request->razorpay_payment_id
    ]);

    OnsitePaymentHistory::create([
        'user_id' => $user->id,
        'amount' => $data['amount'],
        'payment_mode' => 'online',
        'transaction_id' => $request->razorpay_payment_id,
        'status' => 'success'
    ]);

    return response()->json(['success' => true]);
}

}