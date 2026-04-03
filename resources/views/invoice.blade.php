<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="assets/img/favicon.png" />
	<title>RHINOCON 2025 - Invoice</title>

	<link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css" />
	<style>
		body {
			font-family: "Arial", serif;
			font-size: 14px;
			line-height: 22px;
		}


        table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

		img {
			display: block;
  margin: auto;
  width: 50%;
		}

		p {
			line-height: 1.9;
		}

		iframe {
			border: 0 !important;
		}
	</style>

</head>

<body>
	<!-- Container -->
	<!--<div class="container invoice-container">-->
		<!-- Main Content -->
		<main>
			<div class="table-responsive">
				<table class="table table-bordered  border-secondary mb-0" width="100%">
					<tbody>
						<tr>
						    <td colspan="6" class="text-center" align="centre">
						        <img src="{{ public_path('logo.png') }}" style="width:250px;">
								<h3 align="center" style="text-align:center;font-weight:500;"><strong>PAYMENT RECEIPT</strong></h3>
						    </td>
						</tr>
                        <tr>
                            <td style="padding:10px;" colspan="2">
                                <p><strong>ENDO ENT SOCIETY - MADURAI NORTH</strong><br />Conference Secretariat<br />Harshini
									Hospital<br />10, Sivagangai Main Road, Sathamangalam,<br /> Madurai – 625020<br/> GST : 33AACAE3724C1ZE.
								</p>

								<p>www.rhinocon2025chennai.com<br />(https://rhinocon2025chennai.com/)<br />rhinocon2025chennai@gmail.com<br />+91
									9383272750
								</p>
								
                            </td>
                            <td style="padding:10px;" colspan="2">
                                <p><strong>Receipt Number</strong><br />RHIN0000{{isset($member->id) && !empty($member->id) ? $member->id : ""}} </p>
                                <p><strong>Mode of Payment</strong><br />Online </p>
                                <p><strong>Payment ID. # </strong><br />{{isset($member->payment_id) && !empty($member->payment_id) ? $member->payment_id : ""}} </p>
                            </td>
                            
                            <td style="padding:10px;" colspan="2">
                                <p><strong>Date of Transaction</strong><br />{{isset($member->created_at) && !empty($member->created_at) ? $member->created_at : ""}} </p>
                                <!--<p><strong>Payment via</strong><br />GPAY </p>-->
                                <p><strong>Order #</strong><br />ORD00{{isset($payment->id) && !empty($payment->id) ? $payment->id : ""}} </p>
                            </td>
                            
                        </tr>
						<tr>
						    <td style="padding:10px;" colspan="2">
						        <p><strong>Billing Address</strong><br />{{isset($member->address) && !empty($member->address) ? $member->address : ""}}</p>

								<p><strong>Email : </strong>
									{{isset($member->email) && !empty($member->email) ? $member->email : ""}}<br /><strong>Contact No :</strong> {{isset($member->code) && !empty($member->code) ? $member->code : ""}} {{isset($member->mobile) && !empty($member->mobile) ? $member->mobile : ""}}
								</p>
						    </td>
						    <td style="padding:10px;" colspan="2">
						        <p><strong>Conference Name</strong><br />ENDO ENT SOCIETY - MADURAI NORTH </p>
						        <p><strong>User category </strong><br />{{isset($member->category) && !empty($member->category) ? strtoupper($member->category) : ""}} </p>
						    </td>
						    <td style="padding:10px;" colspan="2">
						        <p><strong>Delegate ID </strong><br />RHIN0000{{isset($member->id) && !empty($member->id) ? $member->id : ""}} </p>
						    </td>
						    
						</tr>
						<tr>
							<td style="padding:10px;" width="5%" align="centre" >S.NO</td>
							<td style="padding:10px;" width="55%" align="centre">Particulars</td>
							<!--<td style="padding:10px;" align="centre">HSN/SAC</td>-->
							<td style="padding:10px;" width="10%" align="centre">Quantity</td>
							<td style="padding:10px;" width="15%" align="centre">Rate</td>
							<td style="padding:10px;" width="15%" align="centre" colspan="2">Amount</td>
						</tr>
						<tr>
							<td style="padding:10px;" align="centre">1</td>
							<td style="padding:10px;" align="centre"><strong>{{ isset($plan->category) && !empty($plan->category) ? $plan->category : '' }}</strong><br/> Plan Date : {{ isset($plan->plan_date) && !empty($plan->plan_date) ? date("F d, Y", strtotime($plan->plan_date)) : '' }} </td>
							<!--<td style="padding:10px;" align="centre">998596</td>-->
							<td style="padding:10px;" align="centre">1</td>
							<td style="padding:10px;" align="centre">INR {{ isset($plan->plan_amount) && !empty($plan->plan_amount) ? $plan->plan_amount : 0 }} </td>
							<td style="padding:10px;" align="centre" colspan="2">INR {{ isset($plan->plan_amount) && !empty($plan->plan_amount) ? ($plan->plan_amount + ($plan->plan_amount * 18)/100) : 0 }} </td>
						</tr>
						@if(isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) && isset($package->room_tarrif_price) && !empty($package->room_tarrif_price))
						<tr>
							<td style="padding:10px;" align="centre">2</td>
							<td style="padding:10px;" align="centre"><strong>Gala Dinner</strong></td>
							<!--<td style="padding:10px;" align="centre">998596</td>-->
							<td style="padding:10px;" align="centre">1</td>
							<td style="padding:10px;" align="centre">INR {{ isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) ? $package->gala_dinner_price : '' }} </td>
							<td style="padding:10px;" align="centre" colspan="2">INR {{ isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) ? $package->gala_dinner_price : '' }} </td>
						</tr>
						<tr>
							<td style="padding:10px;" align="centre">3</td>
							<td style="padding:10px;" align="centre"><strong>Room Tarrif - {{ isset($package->room_tarrif) && !empty($package->room_tarrif) ? $package->room_tarrif : '' }}</strong><br/><span style="font-size:12px;">
							    @if(isset($package->room_dates) && !empty($package->room_dates))
							        @foreach(explode(',',$package->room_dates) as $dates)
							        {{ isset($dates) && !empty($dates) ? $dates : '' }}<br/>
							        @endforeach
							    @endif
							<!--<td style="padding:10px;" align="centre">998596</td>-->
							<td style="padding:10px;" align="centre">{{ isset($package->no_of_days) && !empty($package->no_of_days) ? $package->no_of_days : 0 }}</td>
							<td style="padding:10px;" align="centre">INR {{ isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? $package->room_tarrif_price : '' }} </td>
							<td style="padding:10px;" align="centre" colspan="2">INR {{ isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? $package->room_tarrif_price : '' }} </td>
						</tr>
						@elseif(isset($package->gala_dinner_price) && !empty($package->gala_dinner_price))
						<tr>
							<td style="padding:10px;" align="centre">2</td>
							<td style="padding:10px;" align="centre"><strong>Gala Dinner</strong></td>
							<!--<td style="padding:10px;" align="centre">998596</td>-->
							<td style="padding:10px;" align="centre">1</td>
							<td style="padding:10px;" align="centre">INR {{ isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) ? $package->gala_dinner_price : '' }} </td>
							<td style="padding:10px;" align="centre" colspan="2">INR {{ isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) ? $package->gala_dinner_price : '' }} </td>
						</tr>
						@elseif(isset($package->room_tarrif_price) && !empty($package->room_tarrif_price))
						<tr>
							<td style="padding:10px;" align="centre">2</td>
							<td style="padding:10px;" align="centre"><strong>Room Tarrif - {{ isset($package->room_tarrif) && !empty($package->room_tarrif) ? $package->room_tarrif : '' }}</strong><br/><span style="font-size:12px;">
							    @if(isset($package->room_dates) && !empty($package->room_dates))
							        @foreach(explode(',',$package->room_dates) as $dates)
							        {{ isset($dates) && !empty($dates) ? $dates : '' }}
							        @endforeach
							    @endif
							</span></td>
							<!--<td style="padding:10px;" align="centre">998596</td>-->
							<td style="padding:10px;" align="centre">{{ isset($package->no_of_days) && !empty($package->no_of_days) ? $package->no_of_days : 0 }}</td>
							<td style="padding:10px;" align="centre">INR {{ isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? $package->room_tarrif_price : '' }} </td>
							<td style="padding:10px;" align="centre" colspan="2">INR {{ isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? $package->room_tarrif_price : '' }} </td>
						</tr>
						@endif
						@if(isset($member->become_aris_member_price) && !empty($member->become_aris_member_price))
						<tr>
							<td style="padding:10px;" align="centre">2</td>
							<td style="padding:10px;" align="centre"><strong>Become ARIS Member</strong></td>
							<!--<td style="padding:10px;" align="centre">998596</td>-->
							<td style="padding:10px;" align="centre">1</td>
							<td style="padding:10px;" align="centre">INR {{ isset($member->become_aris_member_price) && !empty($member->become_aris_member_price) ? $member->become_aris_member_price : '' }} </td>
							<td style="padding:10px;" align="centre" colspan="2">INR {{ isset($member->become_aris_member_price) && !empty($member->become_aris_member_price) ? $member->become_aris_member_price : '' }} </td>
						</tr>
						@endif
						@if(isset($package->training) && !empty($package->training))
						<tr>
							<td style="padding:10px;" align="centre">2</td>
							<td style="padding:10px;" align="centre"><strong>{{$package->training}}</strong></td>
							@php
							    $training = explode(',',$package->training);
							@endphp
							<!--<td style="padding:10px;" align="centre">998596</td>-->
							<td style="padding:10px;" align="centre">{{ count($training) }}</td>
							<td style="padding:10px;" align="centre">INR {{ isset($package->become_aris_member_price) && !empty($package->become_aris_member_price) ? count($training) * 1000 : '' }} </td>
							<td style="padding:10px;" align="centre" colspan="2">INR {{ isset($package->become_aris_member_price) && !empty($package->become_aris_member_price) ? count($training) * 1000 : '' }} </td>
						</tr>
						@endif
						<tr>
							<td style="padding:10px;"align="centre"></td>
							<td style="padding:10px;"align="centre"><strong>GST @18% for Registration</strong></td>
							<td style="padding:10px;"align="centre"></td>
							<td style="padding:10px;"align="centre">INR {{ isset($member->gst) && !empty($member->gst) ? $member->gst : '' }}</td>
							<td colspan="2" style="padding:10px;"align="centre">INR {{ isset($member->gst) && !empty($member->gst) ? $member->gst : '' }} </td>
						</tr>
						<tr>
							<td colspan="2" style="padding:10px;height:100px;"><span style="float:right;margin-right:20px;font-weight:600;">Total</span></td>
							<td colspan="2" style="padding:10px;height:100px;"></td>
							<td colspan="2" style="padding:10px;height:100px;border-left-style: none;"><span style="text-align: centre;">INR {{ isset($payment->total) && !empty($payment->total) ? $payment->total : '' }}</span></td>
						</tr>
						<tr>
							<td colspan="2" width="35%"> 
							    <p><strong>Amount Chargeable (in words) </strong></p>
								<p>{{ isset($total_in_words) && !empty($total_in_words) ? $total_in_words : '' }}</p>
							</td>
							<td colspan="4" width="65%" class="text-end"><span style="padding:10px;">Authorised Signatory</span></td>
						</tr>
					</tbody>
				</table>
			</div>
		</main>
		<footer class="text-center mt-4">
			<div class="btn-group btn-group-sm d-print-none">
				<p>Original invoice will be given on the day of the conference from the registration counter.
				</p>
			</div>
		</footer>
	<!--</div>-->

</body>
</html>