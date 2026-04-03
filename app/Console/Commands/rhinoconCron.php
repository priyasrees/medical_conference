<?php

namespace App\Console\Commands;
use App\Models\Member, App\Models\AdditionalPackage, App\Models\Payment, App\Models\Plan;
use Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Console\Command;

class rhinoconCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rhinocon:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            
            $member = Member::where('mail_send',1)->get();
            foreach($member as $m){
                $this->qrCode($m->id);
                $this->generatePDF($m->id);
                if(isset($m->email) && !empty($m->email)){
                    $data = ['member'=>$m];
                    $to_name = $m->name;
                    $to_email = $m->email;
                    
                    Mail::send('mail.register', $data, function($message) use ($to_name, $to_email) {
                        $message->to($to_email, $to_name)->subject('Register successfully');
                    });
                    
                    $overall_total = 0;
                    $overall_tax = 0;
                    $member = Member::find($m->id);
                    
                    $packages = AdditionalPackage::where('member_id', $m->id)->get();
                    $payment = Payment::where('member_id', $m->id)->first();
                    $plan = Plan::where('id', $member->plan_id)->first();
                    if($member->type == "vip"){
                    $overall_total += 0;
                    $overall_tax += 0;
                    }else{
                    $overall_total += isset($plan->amount) && !empty($plan->amount) ? (float)$plan->amount : 0;
                    $overall_tax += isset($plan->amount) && !empty($plan->amount) ? (float)$plan->amount : 0;
                    }
                  //  $overall_total += isset($plan->amount) && !empty($plan->amount) ? (float)$plan->amount : 0;
                  //  $overall_tax += isset($plan->amount) && !empty($plan->amount) ? (float)$plan->amount : 0;
                    foreach($packages as $package){
                        if(isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) && $package->gala_dinner_price !=0.00 || isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) && $package->room_tarrif_price !=0.00){
                            $overall_total += isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) ? (float)$package->gala_dinner_price : 0;
                            $overall_total += isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? (float)$package->room_tarrif_price : 0;
                            $overall_tax += isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? (float)$package->room_tarrif_price : 0;
                        }
                    }
                    if(isset($package->training) && !empty($package->training)){
                        $training = explode(',',$package->training);
            		    $overall_total += isset($training) && !empty($training) ? (float)(count($training) * 1000) : 0;    
            		    $overall_tax += isset($training) && !empty($training) ? (float)(count($training) * 1000) : 0;
                    }
                    if(isset($member->become_aris_member_price) && !empty($member->become_aris_member_price)){
                        $overall_total += isset($member->become_aris_member_price) && !empty($member->become_aris_member_price) ? (float)$member->become_aris_member_price : 0;
                    }
                    $total_in_words = $this->getIndianCurrencyData($overall_total + ($overall_tax * 18) / 100);
                    $data1 = ['member'=>$member, 'packages'=>$packages, 'payment'=>$payment, 'plan'=>$plan, 'total_in_words'=>$total_in_words];
                    
                    Mail::send('mail.invoice', $data1, function($message) use ($to_name, $to_email) {
                        $message->to($to_email, $to_name)->subject('INVOICE - PAYMENT RECEIPT');
                    });
                    
                    Member::where('id', $m->id)->update(['mail_send'=>2]);
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }
    public function generatePDF($id){
        $member = Member::find($id);
        if($member->type !== "vip"){
        $package = AdditionalPackage::where('member_id', $id)->where('payment_status', 'paid')->select('gala_dinner_price', 'room_tarrif_price','gala_dinner','room_tarrif')->first();
        }
        else{
            $package = AdditionalPackage::where('member_id', $id)->where('payment_status', 'Free Plan')->select('gala_dinner_price','gala_dinner','room_tarrif', 'room_tarrif_price')->first();
        }
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
    }
    public function qrCode($id){
        $member = Member::find($id);
        $path = 'upload/member/qrcode/'.time().'.png';
        $qr_code = public_path($path);
        
        $text = 'ID : '. isset($member->membership_no) && !empty($member->membership_no) ? 'RHIN'.'0000'.$member->id : 'RHIN'.'0000'.$member->id;
        $text .= ' Name : '.$member->name;
        Member::where('id',$id)->update(['qr_code'=>$path]);
        return \QrCode::format('png')->merge(public_path('/asset/img/favicon.png'), 0.1, true)->eye('circle')->margin(1)->size(300)->errorCorrection('M')->generate(@$text, $qr_code);
    }
    public function invoicePDF($id)
    {
        $overall_total = 0;
        $member = Member::find($id);
        $packages = AdditionalPackage::where('member_id', $id)->get();
        $payment = Payment::where('member_id', $id)->first();
        $plan = Plan::where('id', $member->plan_id)->first();
        if($member->type == "vip"){
        $overall_total += 0;
        $overall_tax += 0;
        }else{
        $overall_total += isset($plan->amount) && !empty($plan->amount) ? (float)$plan->amount : 0;
        $overall_tax += isset($plan->amount) && !empty($plan->amount) ? (float)$plan->amount : 0;
        }
     //   $overall_total += isset($plan->amount) && !empty($plan->amount) ? (float)$plan->amount : 0;
        foreach($packages as $package){
            if(isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) && $package->gala_dinner_price !=0.00 || isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) && $package->room_tarrif_price !=0.00){
                
                $overall_total += isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? (float)$package->room_tarrif_price : 0;
            }
        }
        if(isset($package->training) && !empty($package->training)){
            $training = explode(',',$package->training);
		    $overall_total += isset($training) && !empty($training) ? (float)(count($training) * 1000) : 0;    
        }
        
        $total_in_words = $this->getIndianCurrencyData($overall_total + ($overall_total * 18) / 100);
        $data = ['member'=>$member, 'packages'=>$packages, 'payment'=>$payment, 'plan'=>$plan, 'total_in_words'=>$total_in_words];
        $pdf = PDF::loadView('mail.invoice', $data);
        // $pdf->getDomPDF()->setHttpContext(
        // stream_context_create([
        //         'ssl' => [
        //             'allow_self_signed'=> TRUE,
        //             'verify_peer' => FALSE,
        //             'verify_peer_name' => FALSE,
        //         ]
        //     ])
        // );
        $directory = public_path('upload/member/invoice/');
        $fileLocated = $directory . $member->name.'.pdf';
        $file_store = '/upload/member/invoice/invoice_'.$member->name.'.pdf';
        $pdf->loadView('mail.invoice', $data)->save($fileLocated);
        Member::where('id', $id)->update(['invoice'=>$file_store]);
        //return $pdf->download('invoice_'.$member->name.'.pdf');
    }
    public function getIndianCurrencyData(float $number)
    {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(0 => '', 1 => 'one', 2 => 'two',
            3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
            7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve',
            13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
            40 => 'forty', 50 => 'fifty', 60 => 'sixty',
            70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
        $digits = array('', 'hundred','thousand','lakh', 'crore');
        while( $i < $digits_length ) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return strtoupper(($Rupees ? $Rupees . 'Rupees ' : '') . $paise);
    }
    public function numberFormatByComma($number, $decimals=0)
    {
        if (strpos($number,'.')!=null)
        {
            $decimalNumbers = substr($number, strpos($number,'.'));
            $decimalNumbers = substr($decimalNumbers, 1, $decimals);
        }
        else
        {
            $decimalNumbers = 0;
            for ($i = 2; $i <=$decimals ; $i++)
            {
                $decimalNumbers = $decimalNumbers.'0';
            }
        }
    
    
        $number = (int) $number;
        $number = strrev($number);  // reverse
    
        $n = '';
        $stringlength = strlen($number);
    
        for ($i = 0; $i < $stringlength; $i++)
        {
            // from digit 3, every 2 digit () add comma
            if($i==2 || ($i>2 && $i%2==0) ) $n = $n.$number[$i].','; 
            else $n = $n.$number[$i];
        }
    
        $number = $n;    
        $number = strrev($number); // reverse
    
        ($decimals!=0)? $number=$number.'.'.$decimalNumbers : $number ;
        if ($number[0] == ',') $number = substr_replace($number, '', 0, 1);
        if ($number[1] == ',' && $number[0] == '-') $number = substr_replace($number, '', 1, 1);      
    
        return $number;
    }
}
