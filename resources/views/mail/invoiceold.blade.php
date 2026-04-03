<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="assets/img/favicon.png" />
	<title>RHINOCON 2025 - Invoice</title>



	<!-- Stylesheet
======================= -->
	<link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css" />
	<style>
		body {
			font-family: "Arial", serif;
			font-size: 14px;
			line-height: 22px;
		}

		.invoice-container {
			margin: 15px auto;
			padding: 20px;
			max-width: 850px;
			background-color: #fff;
			border: 1px solid #ccc;
			-moz-border-radius: 6px;
			-webkit-border-radius: 6px;
			-o-border-radius: 6px;
			border-radius: 6px;
		}



		img {
			vertical-align: inherit;
		}

		p {
			line-height: 1.9;
		}

		iframe {
			border: 0 !important;
		}
    
    
        table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}
	</style>

</head>
<body>
	<!-- Container -->
	<div class="container invoice-container">
		<!-- Main Content -->
		<main>
			<div class="table-responsive">
				<table class="table table-bordered  border-secondary mb-0" width="100%">
					<tbody>
						<tr>
							<td colspan="6" class="text-center" align="centre">
								<img src="https://rhinocon2025chennai.com/public/asset/img/logo.png" align="centre" class="text-center" style="margin:0 auto;">
								<h5 class="mb-2 mt-2"><strong>PAYMENT RECEIPTS</strong></h5>
							</td>
						</tr>

						<tr>
							<td colspan="2">
								<p><strong>ENDO ENT SOCIETY - MADURAI NORTH</strong><br />Conference Secretariat<br />Harshini
									Hospital<br />10, Sivagangai Main Road, Sathamangalam,<br /> Madurai – 625020<br/> GST : 33AACAE3724C1ZE.
								</p>

								<p>www.rhinocon2025chennai.com<br />(https://rhinocon2025chennai.com/)<br />rhinocon2025chennai@gmail.com<br />+91
									9383272750
								</p>
							</td>
							<td colspan="2">
								<table>
									<tbody>
										<tr>
											<td style="border:none!important;border-bottom: none!important;border-bottom: 0!important;">
												<p><strong>Receipt Number</strong><br />RHIN0000{{isset($member->id) && !empty($member->id) ? $member->id : ""}} </p>
											</td>

										</tr>
										<tr>
											<td>
												<p><strong>Mode of Payment</strong><br />Online </p>
											</td>

										</tr>
										<tr>
											<td>
												<p><strong>Payment ID. # </strong><br />{{isset($member->payment_id) && !empty($member->payment_id) ? $member->payment_id : ""}} </p>
											</td>

										</tr>
									</tbody>
								</table>
							</td>
							<td colspan="2">
								<table width="100%">
									<tbody>
										<tr>
											<td>
												<p><strong>Date of Transaction</strong><br />{{isset($member->created_at) && !empty($member->created_at) ? $member->created_at : ""}} </p>
											</td>
										</tr>
										<tr>
											<td>
												
											</td>
										</tr>
										<tr>
											<td>
												<p><strong>Order #</strong><br />ORD0{{date('y')}}00{{isset($member->id) && !empty($member->id) ? $member->id : ""}} </p>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>

						<tr>
							<td colspan="2">
								<p><strong>Billing Address</strong><br />{{isset($member->address) && !empty($member->address) ? $member->address : ""}}
								</p>

								<p><strong>Email : </strong>
									{{isset($member->email) && !empty($member->email) ? $member->email : ""}}<br /><strong>Contact No :</strong> {{isset($member->code) && !empty($member->code) ? $member->code : ""}} {{isset($member->mobile) && !empty($member->mobile) ? $member->mobile : ""}}
								</p>
							</td>
							<td colspan="2">
								<table>
									<tbody>
										<tr>
											<td>
												<p><strong>Conference Name</strong><br />ENDO ENT SOCIETY - MADURAI NORTH </p>
											</td>
										</tr>
										<tr>
											<td>
												<p><strong>User category </strong><br />{{isset($member->category) && !empty($member->category) ? strtoupper($member->category) : ""}} </p>
											</td>
										</tr>

									</tbody>
								</table>
							</td>
							<td colspan="2">
								<table>
									<tbody>
										<tr>
											<td>
												<p><strong>Delegate ID </strong><br />RHIN0000{{isset($member->id) && !empty($member->id) ? $member->id : ""}} </p>
											</td>
										</tr>
									</tbody>
								</table>
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
						@php 
						    $overall_total = 0;
						    $overall_tax = 0;
						    $overall_total += isset($plan->amount) && !empty($plan->amount) ? (float)$plan->amount : 0;
						    $overall_tax += isset($plan->amount) && !empty($plan->amount) ? (float)$plan->amount : 0;
						@endphp
						<tr>
							<td style="padding:10px;" align="centre">1</td>
							<td style="padding:10px;" align="centre"><strong>{{ isset($plan->category) && !empty($plan->category) ? $plan->category : '' }}</strong><br/> Plan Date : {{ isset($plan->plan_date) && !empty($plan->plan_date) ? date("F d, Y", strtotime($plan->plan_date)) : '' }} </td>
							<!--<td style="padding:10px;" align="centre">998596</td>-->
							<td style="padding:10px;" align="centre">1</td>
							<td style="padding:10px;" align="centre">@if(isset($member->category) && !empty($member->category) && $member->category == 'international') USD @else INR @endif {{ isset($plan->amount) && !empty($plan->amount) ? number_format($plan->amount,2) : 0 }} </td>
							<td style="padding:10px;" align="centre" colspan="2">@if(isset($member->category) && !empty($member->category) && $member->category == 'international') USD @else INR @endif {{ isset($plan->amount) && !empty($plan->amount) ? number_format($plan->amount,2) : 0 }} </td>
						</tr>
						@foreach($packages as $package)
						
						@if(isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) && $package->gala_dinner_price !=0.00 && isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) && $package->room_tarrif_price !=0.00)
						
						@php 
						    $overall_total += isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) ? (float)$package->gala_dinner_price : 0;
						    $overall_total += isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? (float)$package->room_tarrif_price : 0; 
						    $overall_tax += isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? (float)$package->room_tarrif_price : 0;
						    
					    @endphp
						<tr>
							<td style="padding:10px;" align="centre">2</td>
							<td style="padding:10px;" align="centre"><strong>Gala Dinner</strong></td>
							<!--<td style="padding:10px;" align="centre">998596</td>-->
							<td style="padding:10px;" align="centre">1</td>
							<td style="padding:10px;" align="centre">@if(isset($member->category) && !empty($member->category) && $member->category == 'international') USD @else INR @endif {{ isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) ? number_format($package->gala_dinner_price,2) : '' }} </td>
							<td style="padding:10px;" align="centre" colspan="2">@if(isset($member->category) && !empty($member->category) && $member->category == 'international') USD @else INR @endif {{ isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) ? number_format($package->gala_dinner_price,2) : '' }} </td>
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
							<td style="padding:10px;" align="centre">@if(isset($member->category) && !empty($member->category) && $member->category == 'international') USD @else INR @endif {{ isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? number_format($package->room_tarrif_price,2) : '' }} </td>
							<td style="padding:10px;" align="centre" colspan="2">@if(isset($member->category) && !empty($member->category) && $member->category == 'international') USD @else INR @endif {{ isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? number_format($package->room_tarrif_price,2) : '' }} </td>
						</tr>
						@elseif(isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) && $package->gala_dinner_price !=0.00)
						@php 
						    $overall_total += isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) ? (float)$package->gala_dinner_price : 0;
						@endphp
						<tr>
							<td style="padding:10px;" align="centre">2</td>
							<td style="padding:10px;" align="centre"><strong>Gala Dinner</strong></td>
							<!--<td style="padding:10px;" align="centre">998596</td>-->
							<td style="padding:10px;" align="centre">1</td>
							<td style="padding:10px;" align="centre">@if(isset($member->category) && !empty($member->category) && $member->category == 'international') USD @else INR @endif {{ isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) ? number_format($package->gala_dinner_price,2) : '' }} </td>
							<td style="padding:10px;" align="centre" colspan="2">@if(isset($member->category) && !empty($member->category) && $member->category == 'international') USD @else INR @endif {{ isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) ?number_format($package->gala_dinner_price,2) : '' }} </td>
						</tr>
						@elseif(isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) && $package->room_tarrif_price !=0.00)
						@php 
						
						    $overall_total += isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? (float)$package->room_tarrif_price : 0; 
						    $overall_tax += isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? (float)$package->room_tarrif_price : 0;
						@endphp
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
							<td style="padding:10px;" align="centre">@if(isset($member->category) && !empty($member->category) && $member->category == 'international') USD @else INR @endif {{ isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? $package->room_tarrif_price : '' }} </td>
							<td style="padding:10px;" align="centre" colspan="2">@if(isset($member->category) && !empty($member->category) && $member->category == 'international') USD @else INR @endif {{ isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? number_format($package->room_tarrif_price,2) : '' }} </td>
						</tr>
						@endif
						@endforeach
						@if(isset($member->become_aris_member_price) && !empty($member->become_aris_member_price) && $member->become_aris_member_price !=0.00)
						@php 
						    $overall_total += isset($member->become_aris_member_price) && !empty($member->become_aris_member_price) ? (float)$member->become_aris_member_price : 0; 
						    
						@endphp
						<tr>
							<td style="padding:10px;" align="centre">2</td>
							<td style="padding:10px;" align="centre"><strong>Become ARIS Member</strong></td>
							<!--<td style="padding:10px;" align="centre">998596</td>-->
							<td style="padding:10px;" align="centre">1</td>
							<td style="padding:10px;" align="centre">@if(isset($member->category) && !empty($member->category) && $member->category == 'international') USD @else INR @endif {{ isset($member->become_aris_member_price) && !empty($member->become_aris_member_price) ? number_format($member->become_aris_member_price,2) : '' }} </td>
							<td style="padding:10px;" align="centre" colspan="2">@if(isset($member->category) && !empty($member->category) && $member->category == 'international') USD @else INR @endif {{ isset($member->become_aris_member_price) && !empty($member->become_aris_member_price) ? number_format($member->become_aris_member_price,2) : '' }} </td>
						</tr>
						@endif
						@if(isset($package->training) && !empty($package->training))
						<tr>
							<td style="padding:10px;" align="centre">2</td>
							<td style="padding:10px;" align="centre"><strong>{{$package->training}}</strong></td>
							@php
							    $training = explode(',',$package->training);
							    //$overall_total += isset($training) && !empty($training) ? (float)(count($training) * 1000) : 0;
							   $overall_tax += isset($training) && !empty($training) ? (float)(count($training) * 1000) + ((count($training) * 1000) * 18)/100 : 0;
							@endphp
							<!--<td style="padding:10px;" align="centre">998596</td>-->
							<td style="padding:10px;" align="centre">{{ count($training) }}</td>
							<td style="padding:10px;" align="centre">@if(isset($member->category) && !empty($member->category) && $member->category == 'international') USD @else INR @endif {{ isset($package->training) && !empty($package->training) ? (count($training) * 1000) : '' }} </td>
							<td style="padding:10px;" align="centre" colspan="2">@if(isset($member->category) && !empty($member->category) && $member->category == 'international') USD @else INR @endif {{ isset($package->training) && !empty($package->training) ? number_format((count($training) * 1000),2) : '' }} </td>
						</tr>
						@endif
						<tr>
							<td style="padding:10px;"align="centre"></td>
							<td style="padding:10px;"align="centre"><strong>GST @18% for Registration</strong>
							<br/>
							<span style="font-size:12px;">
							{{ isset($plan->category) && !empty($plan->category) ? $plan->category.' Tax ' : '' }} - {{isset($plan->amount) && !empty($plan->amount) ? (float)($plan->amount*18)/100 : 0 }} , 
								@foreach($packages as $package)
								@if(isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) && $package->room_tarrif_price !=0.00)
									{{ isset($package->room_tarrif) && !empty($package->room_tarrif) ? $package->room_tarrif. ' Tax ' : '' }} - {{ isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? (float)($package->room_tarrif_price * 18) / 100 : 0 }}
								@endif
								@endforeach
							</span>
						</td>
							<td style="padding:10px;"align="centre">
								
								

							</td>
							<td style="padding:10px;"align="centre">@if(isset($member->category) && !empty($member->category) && $member->category == 'international') USD @else INR @endif {{ number_format(($overall_tax * 18) / 100 ,2) }}</td>
							<td colspan="2" style="padding:10px;"align="centre">@if(isset($member->category) && !empty($member->category) && $member->category == 'international') USD @else INR @endif {{ number_format(($overall_tax * 18) / 100 ,2) }} </td>
						</tr>
						<tr>
							<td colspan="2" style="padding:10px;height:100px;"><span style="float:right;margin-right:20px;font-weight:600;">Total</span></td>
							<td colspan="2" style="padding:10px;height:100px;"></td>
							<td colspan="2" style="padding:10px;height:100px;border-left-style: none;"><span style="text-align: centre;">@if(isset($member->category) && !empty($member->category) && $member->category == 'international') USD @else INR @endif {{ isset($overall_total) && !empty($overall_total) ? number_format($overall_total + ($overall_tax * 18) / 100, 2) : 0 }}</span></td>
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
				<p class="text-center" style="text-align:centre">Original invoice will be given on the day of the conference from the registration counter.
				</p>
			</div>
		</footer>
	</div>
</body>
</html>