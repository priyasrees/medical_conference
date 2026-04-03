<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OnsiteRegister;
use App\Models\OnsitePaymentHistory;

class RazorpayWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // ---------------------------------------------------
        // 1. Validate Razorpay signature (SECURITY)
        // ---------------------------------------------------
        $signature = $request->header('X-Razorpay-Signature');
        $webhookSecret = env('RAZORPAY_WEBHOOK_SECRET');

        $payload = $request->getContent();

        if (!$this->isValidSignature($payload, $signature, $webhookSecret)) {
            $this->dailyLog('Webhook Signature FAILED', [
                'signature' => $signature,
            ]);

            return response()->json(['status' => 'invalid-signature'], 400);
        }

        $data = $request->all();
        $event = $data['event'] ?? null;

        // ---------------------------------------------------
        // 2. Log Incoming Webhook Event
        // ---------------------------------------------------
        $this->dailyLog("Webhook Received: {$event}", []);

        // ---------------------------------------------------
        // 3. Accept ONLY successful payments
        // Event: payment.captured
        // ---------------------------------------------------
        if ($event !== 'payment.captured') {
            $this->dailyLog('Ignored Event', [
                'event' => $event
            ]);

            return response()->json(['status' => 'ignored']);
        }

        $payment = $data['payload']['payment']['entity'];
        $orderId = $payment['order_id'];

        // Retrieve temp session data stored earlier
        $sessionData = session('onsite_data');

        if (!$sessionData || $sessionData['order_id'] !== $orderId) {
            $this->dailyLog('Order Mismatch / Missing Session', [
                'order_id_in_webhook' => $orderId,
            ]);

            return response()->json(['status' => 'order-missing'], 400);
        }
            if (OnsiteRegister::where('mobile', $sessionData['mobile'])->exists()) {
            
                $this->dailyLog('Duplicate Mobile - Skipped Insert', [
                    'mobile' => $sessionData['mobile'],
                    'order_id' => $payment['order_id']
                ]);
            
                return response()->json(['status' => 'duplicate-skipped']);
            }
            
            DB::beginTransaction();
    try {
        // ---------------------------------------------------
        // 4. INSERT ONSITE REGISTER
        // ---------------------------------------------------
        $user = OnsiteRegister::create([
            'name'                => $sessionData['name'],
            'mobile'              => $sessionData['mobile'],
            'amount'              => $sessionData['amount'],
            'payment_mode'        => 'online',
            'razorpay_payment_id' => $payment['id'],
        ]);
        

        // ---------------------------------------------------
        // 5. INSERT PAYMENT HISTORY
        // ---------------------------------------------------
        PaymentHistory::create([
            'user_id'       => $user->id,
            'amount'        => $sessionData['amount'],
            'payment_mode'  => 'online',
            'transaction_id'=> $payment['id'],
            'status'        => 'success'
        ]);
         $this->dailyLog('Payment Success & Saved', [
            'name'        => $sessionData['name'],
            'mobile'      => $sessionData['mobile'],
            'amount'      => $sessionData['amount'],
            'payment_id'  => $payment['id'],
            'order_id'    => $orderId
        ]);
         DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Onsite Register Webhook Error: ".$e->getMessage());
        }
        // ---------------------------------------------------
        // 6. SUCCESS LOG (today's file)
        // ---------------------------------------------------
       

        return response()->json(['status' => 'success'], 200);
    }

    
    private function isValidSignature($payload, $headerSignature, $secret)
    {
        $expected = hash_hmac('sha256', $payload, $secret);

        return hash_equals($expected, $headerSignature);
    }
    
    private function dailyLog($message, array $data = [])
    {
        $logFile = storage_path('logs/webhook-' . now()->format('Y-m-d') . '.log');

        Log::build([
            'driver' => 'single',
            'path'   => $logFile,
        ])->info($message, $data);
    }
}
