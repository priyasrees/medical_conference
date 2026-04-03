<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\Order, App\Models\Member, App\Models\AdditionalPackage, App\Models\Payment, App\Models\Training, App\Models\PaymentLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentWebhookController_old extends Controller
{
    public function handleWebhook1(Request $request)
    {
        // $date = now()->format('Y-m-d');
        //  $logPath = storage_path("logs/webhook-{$date}.log");
        //  $logger = new \Monolog\Logger('webhook');
        // $logger->pushHandler(new \Monolog\Handler\StreamHandler($logPath, \Monolog\Logger::INFO));

        // Log::info('Webhook triggered', ['data' => $request->all()]);

        // return response()->json(['status' => 'ok']);
        Log::channel('webhook')->info("Webhook Payment Log: " . now()->toDateTimeString());
        $signature = $request->header('X-Razorpay-Signature');
        $payload = $request->getContent();
        $secret = config('services.razorpay.webhook_secret');

        $generated = hash_hmac('sha256', $payload, $secret);
        if (!hash_equals($generated, $signature)) {
            Log::channel('webhook')->warning("Webhook signature mismatch.");
            return response()->json(['status' => 'error', 'message' => "Invalid signature"]);
            // return response("Invalid signature", 403);
        }
        try {

            $data = $request->all();
            Log::channel('webhook')->info("Webhook: Raw Data: " . json_encode($data));

            $event = $data['event'] ?? 'unknown';
            Log::channel('webhook')->info("Webhook: Event Data: " . json_encode($event));

            $allowedEvents = [
                'payment.authorized',
                'payment.captured',
                'payment.failed',
                'order.paid',
            ];

            // allow anything that starts with "payment.downtime."
            if (!in_array($event, $allowedEvents) && !Str::startsWith($event, 'payment.downtime.')) {
                Log::channel('webhook')->warning("Webhook: Ignored Event Type: $event");
                return response()->json(['status' => 'error', 'message' => "Ignored Event Type:$event"]);
            }
            Log::channel('webhook')->info("Webhook: Event Type Received: " . $event);

            $payment = $data['payload']['payment']['entity'] ?? [];
            $orderId = $payment['order_id'] ?? '';
            $razorpayPaymentId = $payment['id'] ?? null;
            $receipt = $payment['notes']['receipt'] ?? null;
            $finalOrderId = $orderId ?: $razorpayPaymentId;
            $isInternational = $payment['international'] ?? false;
            // $code = $isInternational ? '' : '+91';
            $userData = null;
            if (!$isInternational && !$orderId) {
                Log::channel('webhook')->warning("Webhook: Missing order_id in payment event", $data);
                //    DB::commit();
                return response()->json(['status' => 'error', 'message' => "Missing order_id in payment event"]);
                // return response()->json(['status' => 'ignored']);
            } else {
                Log::channel('webhook')->info("Non-payment webhook received", $data);
                if (!$razorpayPaymentId) {
                    Log::channel('webhook')->warning("Webhook: Missing payment_id in international payment event", $data);
                    return response()->json(['status' => 'error', 'message' => "Missing order_id in international payment event"]);
                    //  return response()->json(['status' => 'ignored']);
                }
            }
            Log::channel('webhook')->info("Webhook: Payment Data: " . json_encode($payment));

            if ($orderId) {
                $userData = Cache::get('user_order_' . $orderId);
            }
            //  if (!$userData && $razorpayPaymentId) {
            //   $userData = Cache::get('user_order_' . $razorpayPaymentId);
            // }
            elseif ($receipt) {
                $userData = Cache::get('user_receipt_' . $receipt);
            }

            //   Cache::forget('user_order_' . $orderId);
            //     Cache::flush();

            Log::channel('webhook')->info("Webhook: User Data: " . json_encode($userData));

            $name = $userData['name'] ?? null;
            $first_name = $userData['first_name'] ?? null;
            $middle_name = $userData['middle_name'] ?? null;
            $last_name = $userData['last_name'] ?? null;
            $email = $userData['email'] ?? null;
            $mobile = $userData['mobile'] ?? null;
            $country_code = $userData['country_code'] ?? null;
            $category = $userData['category'] ?? null;
            $profilePath = $userData['profile_path'] ?? null;
            $paymentShotPath = $userData['payment_screen_shot_path'] ?? null;

            $amount = isset($payment['amount']) ? number_format($payment['amount'] / 100, 2, '.', '') : null;
            if (!empty($first_name)) {
                $name = $first_name.' '.$middle_name.' '.$last_name;
            }

            // if (in_array($event, ['payment.authorized', 'payment.captured', 'order.paid'])) {
            // if ($event === 'payment.captured' || $event === 'order.paid') {
            if ($event === 'order.paid') {

                Log::channel('webhook')->info("Webhook: Authorised Data: " . json_encode($payment));
                //                     // $email = $payment['email'] ?? null;
                //  if (!$isInternational) {
                $order = Order::where('razorpay_order_id', $finalOrderId)->first();
                if (!$order) {
                    Log::channel('webhook')->error("Webhook: Order not found for ID: $finalOrderId");
                    return response()->json(['status' => 'error', 'message' => "Order not found"]);
                    // return response("Order not found", 404);
                }
                // }
                // else{
                //     $order = Order::where('razorpay_order_id', $razorpayPaymentId)->first();
                //     if (!$order) {
                //         Log::channel('webhook')->error("Webhook: International Order not found for ID: $razorpayPaymentId");
                //         return response("Order not found", 404);
                //     }
                // }
                Log::channel('webhook')->info('Order fetched:', $order ? $order->toArray() : ['message' => 'Order not found']);

                //   //  $receipt = json_decode(base64_decode($order->receipt), true);
//     // \Log::info('Decoded Receipt:', $receipt ?: ['message' => 'Receipt decode failed or empty']);

                //    if ($event == 'payment.captured' && $status == 'captured') {
                $order->update(['status' => 'paid']);
                $pay_status = 'paid';

                //                         //  if(isset($request->id) && !empty($request->id)){
//                         //         $msg = 'Registration has been Updated Successfully';
//                         //     } else {
//                         //         $msg = 'Registration has been Stored Successfully';
//                         //     }
//                     $profile = '';
//                     $payment_screen_shot = '';
//                     // if (request()->hasFile('profile')) {
//                     //     $profile = $this->imageUpload(request()->file('profile'), '/upload/member/');
//                     // }
//                     // if (request()->hasFile('payment_screen_shot')) {
//                     //     $payment_screen_shot = $this->imageUpload(request()->file('payment_screen_shot'), '/upload/member/');
//                     // }
//                     $expectedFields = [
//                         'id', 'membership_no', 'medical_reg_no', 'designation', 'institute',
//                         'mobile', 'email', 'address', 'city', 'state', 'pincode', 'country',
//                         'diet', 'plan_date', 'plan_amount', 'plan_id', 'total', 'become_airs'
//                     ];

                //                     // Check for missing keys
//                     $missingFields = [];
//                     foreach ($expectedFields as $field) {
//                         if (!array_key_exists($field, $userData)) {
//                             $missingFields[] = $field;
//                         }
//                     }

                //                     // Log missing fields if any
//                     // if (!empty($missingFields)) {
//                     //     \Log::error('Missing user data fields: ' . implode(', ', $missingFields));
//                     // } else {
//                     //     \Log::info('All expected user fields are present.');
//                     // }
                $id = $userData['id'] ?? 0;
                $membership_no = $userData['membership_no'] ?? null;
                $medical_reg_no = $userData['medical_reg_no'] ?? null;
                $designation = $userData['designation'] ?? null;
                $institute = $userData['institute'] ?? null;
                $mobile = $userData['mobile'] ?? null;
                $email = $userData['email'] ?? null;
                $address = $userData['address'] ?? null;
                $city = $userData['city'] ?? null;
                $state = $userData['state'] ?? null;
                $pincode = $userData['pincode'] ?? null;
                $country = $userData['country'] ?? null;
                $diet = $userData['diet'] ?? null;
                $plan_date = $userData['plan_date'] ?? null;
                $plan_amount = $userData['plan_amount'] ?? null;
                $plan_id = $userData['plan_id'] ?? null;
                $gst = ($plan_amount) ? ($plan_amount * 18) / 100 : 0;
                $total = $userData['total'] ?? null;
                $become_airs = $userData['become_airs'] ?? null;
                $type = $userData['type'] ?? null;
                //$usertype
                $usertype = !empty($userData['user_type']) ? $userData['user_type'] : 'non_update_member';
                $memberId = !empty($userData['member_id']) ? $userData['member_id'] : 0;

                // \Log::info('Member User Data:', [
                //         'id' => $id ? $id : 0,
                //         'membership_no' => $membership_no,
                //         'medical_reg_no' => $medical_reg_no,
                //         'designation' => $designation,
                //         'institute' => $institute,
                //         'mobile' => $mobile,
                //         'email' => $email,
                //         'address' => $address,
                //         'city' => $city,
                //         'state' => $state,
                //         'pincode' => $pincode,
                //         'country' => $country,
                //         'diet' => $diet,
                //         'plan_date' => $plan_date,
                //         'plan_amount' => $plan_amount,
                //         'gst' => $gst,
                //         'total' => $total,
                //         'plan_id' => $plan_id,
                //         'become_airs' => $become_airs,
                //     ]);
                try {
                    DB::beginTransaction();
                    if($usertype == "non_update_member"){
                    $member = Member::create([
                        'id' => $id,
                        'profile' => $profilePath,
                        'category' => $category,
                        'membership_no' => $membership_no,'type' => $type,
                        'name' => $name,
                        'first_name' => $first_name,
                        'middle_name' => $middle_name,
                        'last_name' => $last_name,
                        'medical_reg_no' => $medical_reg_no,
                        'designation' => $designation,
                        'institute' => $institute,
                        'mobile' => $mobile,
                        'code' => $country_code,
                        'email' => $email,
                        'address' => $address,
                        'city' => $city,
                        'state' => $state,
                        'pincode' => $pincode,
                        'country' => isset($country) && !empty($country) ? $country : 'India',
                        'diet' => $diet,
                        'payment_screen_shot' => $paymentShotPath,
                        'plan_date' => $plan_date,
                        'plan_amount' => $plan_amount,
                        'plan_id' => $plan_id,
                        'gst' => $gst,
                        'total' => $total,
                        'payment_id' => $razorpayPaymentId,
                        'order_id' => $orderId ?? null,
                        'payment_status' => $pay_status,
                        'payment_message' => isset($payment['status']) && !empty($payment['status']) ? $payment['status'] : '',
                        'become_aris_member' => isset($become_airs) && !empty($become_airs) && $become_airs != 0 ? 1 : 0,
                        'become_aris_member_price' => isset($become_airs) && !empty($become_airs) ? $become_airs : 0,
                        'mail_send' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    }
                    elseif($usertype == "update_member" && $memberId != 0){
                        Member::where('id', $memberId)->update(['mail_send'=>1]);
                    }
                    //    Log::info("Member saved successfully: " . json_encode($member));


                    //    Log::info("Member: Data: " . json_encode($member));

                    $gala_dinner = $userData['gala_dinner'] ?? '';
                    $gala_dinner_price = $userData['gala_dinner_price'] ?? 0;
                    $gala_dinner_tax = 0; // no tax calculation for this as per your logic

                    $room_tarrif = $userData['room_tarrif_txt'] ?? '';
                    $room_tarrif_price = $userData['room_tarrif_price'] ?? 0;

                    // Calculate tax dynamically like you do for $request
                    $room_tarrif_tax = !empty($room_tarrif_price) ? ($room_tarrif_price * 18) / 100 : 0;

                    $no_of_days = $userData['room_tarrif_date'] ?? 0;
                    $room_dates = $userData['room_dates'] ?? '';

                    $person = $userData['person'] ?? '';
                    $training = $userData['training'] ?? '';

                    AdditionalPackage::create([
                        'member_id' => $member->id,
                        'order_id' => $orderId ?? null,
                        'payment_id' => $razorpayPaymentId,
                        'payment_status' => $pay_status,
                        'payment_message' => isset($payment['status']) && !empty($payment['status']) ? $payment['status'] : '',
                        'mail_send' => 1,
                        'gala_dinner' => isset($gala_dinner) && !empty($gala_dinner) ? $gala_dinner : '',
                        'gala_dinner_price' => isset($gala_dinner_price) && !empty($gala_dinner_price) ? $gala_dinner_price : 0,
                        'gala_dinner_tax' => 0,
                        'room_tarrif_id' => isset($plan_id) && !empty($plan_id) ? $plan_id : 0,
                        'room_tarrif' => isset($room_tarrif) && !empty($room_tarrif) ? $room_tarrif : '',
                        'room_tarrif_price' => isset($room_tarrif_price) && !empty($room_tarrif_price) ? $room_tarrif_price : 0,
                        'room_tarrif_tax' => isset($room_tarrif_price) && !empty($room_tarrif_price) ? ($room_tarrif_price * 18) / 100 : 0,
                        'no_of_days' => isset($no_of_days) && !empty($no_of_days) ? count((array) $no_of_days) : 0,
                        'room_dates' => isset($no_of_days) && !empty($no_of_days) ? implode(",", (array) $no_of_days) : '',
                        'person' => isset($person) && !empty($person) ? json_encode($person) : '',
                        'training' => isset($training) && !empty($training) ? implode(",", (array) $training) : '',
                        'total' => $amount,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    $payment_det = Payment::create([
                        'member_id' => $member->id,
                        'order_id' => $orderId ?? null,
                        'payment_id' => $razorpayPaymentId,
                        'payment_status' => $pay_status,
                        'payment_message' => isset($payment['status']) && !empty($payment['status']) ? $payment['status'] : '',
                        'total' => $amount,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    foreach ((array) $training as $training) {
                        $training_count = Training::where('text', $training)->pluck('join_user')->first();
                        Training::where('text', $training)->update(['join_user' => ((int) $training_count + 1), 'updated_at' => now()]);
                    }
                    Log::channel('webhook')->info("User registered via webhook:", ['payment' => $payment_det]);
                    Log::channel('webhook')->info("Payment Detail via webhook:", ['payment_detail' => json_encode($payment)]);

                    //  Log::info("Payment Log: payment_id = " . ($payment_det->id ?? 'null'));
                    //     Log::info("Payment Log: order_id = " . ($orderId ?? 'null'));
                    //     Log::info("Payment Log: status = " . (!empty($payment['status']) ? $payment['status'] : ''));
                    //     Log::info("Payment Log: amount = " . ($amount ?? 'null'));
                    //     Log::info("Payment Log: payload = " . json_encode($payment));
                    PaymentLog::create([
                        'payment_id' => $payment_det->id,
                        'order_id' => $finalOrderId,
                        'status' => isset($payment['status']) && !empty($payment['status']) ? $payment['status'] : '',
                        'amount' => $amount,
                        'payload' => json_encode($payment),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    DB::commit();
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Payment processed successfully',
                    ]);

                } catch (\Exception $e) {
                    DB::rollBack();
                    Log::channel('webhook')->error("Webhook error: " . $e->getMessage());
                    return response()->json(['status' => 'error', 'message' => "Webhook failed " . $e->getMessage()]);
                    //  return response()->json(['error' => 'Webhook failed'], 500);
                    // optionally, throw or return error response:
                    // throw $e;
                    // or return response()->json(['error' => 'Failed to save member'], 500);
                }


                //  return redirect('registration')->with(['status'=>true, 'msg'=>$msg, 'rg'=>'rg']);



            } else {
                if (in_array($event, ['payment.failed', 'payment.refunded'])) {
                    Log::channel('webhook')->info("payment failed:");
                    if ($profilePath && file_exists(public_path($profilePath))) {
                        unlink(public_path($profilePath)); // Delete the uploaded file
                        Log::channel('webhook')->info("Deleted unused profile file: $profilePath");
                    }
                    if ($paymentShotPath && file_exists(public_path($paymentShotPath))) {
                        unlink(public_path($paymentShotPath)); // Delete the uploaded file
                        Log::channel('webhook')->info("Deleted unused Payment screenshot file: $paymentShotPath");
                    }


                    // if ($isInternational) {
                    $order = Order::where('razorpay_order_id', $finalOrderId)->first();
                    // } else {
                    //     $order = Order::where('razorpay_order_id', $orderId)->first();
                    // }
                    if (!$order) {
                        Log::channel('webhook')->error("Webhook Failed: Order not found for ID: $finalOrderId");
                        return response()->json([
                            'status' => 'error',
                            'message' => "Order not found"
                        ]);

                        // return response("Order not found", 404);
                    }
                    $order->update(['status' => 'failed', 'updated_at' => now()]);
                    PaymentLog::create([
                        'payment_id' => 0,
                        'order_id' => $finalOrderId,
                        'status' => isset($payment['status']) && !empty($payment['status']) ? $payment['status'] : '',
                        'amount' => $amount,
                        'payload' => json_encode($payment),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    Log::channel('webhook')->info("Payment failed/refund logged via webhook for $email");

                    $pay_status = 'Failed';
                    //return back()->with(['status'=>false, 'msg'=>'Payment Failed']);
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Event type not handled: ' . $event,
                    ], 200);
                }
            }
            //   DB::commit(); 
        } catch (\Throwable $e) {
            Log::channel('webhook')->error("Webhook DB error", [
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
                'trace'   => $e->getTraceAsString(),
            ]);

            DB::rollBack();
            //   dd($e->getMessage());
            // Show error on screen (for dev only)
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ], 500);
        }
        // $data = $request->all();
        // Log::error("Webhook: All Data: " . json_encode($data));

        // $event = $data['event'] ?? '';
        // $payment = $data['payload']['payment']['entity'] ?? [];
        // Log::error("Webhook: Payment Details: " . json_encode($payment));


        // $orderId = $payment['order_id'] ?? '';
        // $status = $payment['status'] ?? '';
        // $amount = $payment['amount'] / 100;





        //  return response('OK', 200);
    }
    public function checkStatus(Request $request)
    {
        $refId = $request->query('refId');

        //$payment = PaymentLog::where('order_id', $refId)->latest()->first();

        if (Str::startsWith($refId, 'order_')) {
            // Domestic → order id
            $payment = PaymentLog::where('order_id', $refId)->first();
        } elseif (Str::startsWith($refId, 'pay_')) {
            // International → payment id stored in order_id column
            $payment = PaymentLog::where('order_id', $refId)->first();
        }
        if ($payment && $payment->status === 'captured') {
            return response()->json(['status' => 'success']);
        }

        return response()->json([
            'status' => 'failed',
            'message' => $payment->status ?? 'No payment found'
        ]);
    }

}
