@extends('layouts.web')
@section('title_bar', 'VIP Member | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>VIP Member Form</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>VIP Member Form</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<style>
#mobile::placeholder {
    color: #ccc;
    opacity: 1; 
}
.image_view{
    width:150px;
    height:150px;
}
.image_view1{
    width:100px;
}
.profile_image{
    display: block;
    margin-left: auto;
    margin-right: auto;
    border-radius: 50%;
}
.nice-select .fs-select{
    visibility: hidden;
}
#overlay{ 
  position: fixed;
  top: 0;
  z-index: 100;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
  display:none;
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}
.fs-checkbox, .fs-radio {
    border: 1.3px solid var(--color-primary)!important;
    height: 1.5rem!important;
    width: 1.5rem!important;
}

.reg-sample-video {
    margin:50px 0;
}

</style>
<div id="overlay"><div class="cv-spinner"><span class="spinner"></span></div></div>
<div class="contact-inner-section sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="heading2 text-center space-margin60">
                    <h5>Fill up the Form</h5>
                    <div class="space18"></div>
                    <h2>VIP Member Form </h2>
                </div>
            </div>
        </div>
        <div class="registration ">
            <div class=" contact4-boxarea" data-aos="zoom-in" data-aos-duration="1000">
                <div class="row">
                    <div class="col-lg-8">
                        <form action="javascript:void(0)" name="registration-form" id="registration-form" class="fs-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" id="type" value="vip"/>
                            <fieldset>
                                <div class="row ">
                                    <div class="col-lg-12 mb-3">
                                        <img src="{{ env('APP_URL').'public/empty.webp' }}" class="image_view preview profile_image">
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label class="fs-label mt-2" for="profile">Upload Your Profile Picture</label>
                                        <input class="form-control" type="file" id="profile" name="profile" onchange="bgValidation(this,'.bg_image-error','.preview')">
                                        @if($errors->has('profile')) <span class="error" > {{ $errors->first('profile') }} </span> @endif
                                        <span class="bg_image-error"></span>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fs-field">
                                            <label class="fs-label" for="category">Category</label>
                                            <select class="fs-select" id="category" name="category" required>
                                                <option value="" selected>Choose Category</option>
                                                @if(isset($category) && !empty($category))
                                                    @foreach($category as $ckey=>$c)
                                                    <option value="{{$c->slug}}" @if($ckey == 0) selected @endif>{{$c->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @if($errors->has('category')) <span class="error" > {{ $errors->first('category') }} </span> @endif
                                    </div>
                                    <div class="col-lg-4 mt-4" id="plan_date_" style="display:none">
                                        <label class="fs-label" for="plan"></label>
                                        <p id="plan" style="margin-top: 9px;font-weight:600;"></p>
                                    </div>
                                    <div class="col-lg-4 mt-4" id="plan_amount_" style="display:none">
                                        <p id="plan_amount_p" style="margin-top: 9px;font-weight:600;"></p>
                                        <input type="hidden" class="fs-input" name="plan_amount" id="plan_amount" onkeypress="return isNumberKey(event,this)" style="display:none" readonly>
                                        <input type="hidden" name="plan_date" id="plan_date">
                                        <input type="hidden" name="plan_id" id="plan_id">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-12" id="membership_no_" style="display:none">
                                        <div class="fs-field">
                                            <label class="fs-label" for="membership_no">Membership No<span class="h6 text-danger">*</span></label>
                                            <input class="fs-input" id="membership_no" name="membership_no" />
                                        </div>
                                        @if($errors->has('membership_no')) <span class="error" > {{ $errors->first('membership_no') }} </span> @endif
                                    </div>
                                    <div class="col-lg-12" id="doctor_name_" style="display:none">
                                        <div class="fs-field">
                                            <label class="fs-label" for="doctor_name">Doctor Name</label>
                                            <input class="fs-input" id="doctor_name" name="doctor_name"/>
                                        </div>
                                        @if($errors->has('doctor_name')) <span class="error" > {{ $errors->first('doctor_name') }} </span> @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fs-field">
                                            <label class="fs-label" for="first_name">First Name <span style="font-size:12px;color:#AD0E60;">(Name as Per Passport) *</span></label>
                                            <input class="fs-input" id="first_name" name="first_name" required />
                                        </div>
                                        @if($errors->has('first_name')) <span class="error" > {{ $errors->first('first_name') }} </span> @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fs-field">
                                            <label class="fs-label" for="middle_name">Middle Name</label>
                                            <input class="fs-input" id="middle_name" name="middle_name" />
                                        </div>
                                        @if($errors->has('middle_name')) <span class="error" > {{ $errors->first('middle_name') }} </span> @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fs-field">
                                            <label class="fs-label" for="last_name"> Last Name </label>
                                            <input class="fs-input" id="last_name" name="last_name" />
                                        </div>
                                        @if($errors->has('last_name')) <span class="error" > {{ $errors->first('last_name') }} </span> @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="fs-field">
                                            <label class="fs-label" for="gender">Gender</label>
                                            <select class="fs-select" id="gender" name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        @if($errors->has('gender')) <span class="error" > {{ $errors->first('gender') }} </span> @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="fs-field">
                                            <label class="fs-label" for="age"> Age </label>
                                            <input class="fs-input" id="age" name="age"  onkeypress="return isNumberKey(event,this)"/>
                                        </div>
                                        @if($errors->has('age')) <span class="error" > {{ $errors->first('age') }} </span> @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="fs-field">
                                            <label class="fs-label" for="medical_reg_no">Medical Reg. No with State Medical Council Code</label>
                                            <input class="fs-input" id="medical_reg_no" name="medical_reg_no"  />
                                        </div>
                                        @if($errors->has('medical_reg_no')) <span class="error" > {{ $errors->first('medical_reg_no') }} </span> @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="fs-field">
                                            <label class="fs-label" for="designation">Designation</label>
                                            <input class="fs-input" id="designation" name="designation"  />
                                        </div>
                                        @if($errors->has('designation')) <span class="error" > {{ $errors->first('designation') }} </span> @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fs-field">
                                            <label class="fs-label" for="institute">Institute</label>
                                            <input class="fs-input" id="institute" name="institute"  />
                                        </div>
                                        @if($errors->has('institute')) <span class="error" > {{ $errors->first('institute') }} </span> @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fs-field">
                                            <label class="fs-label" for="email">Email<span class="text-danger">*</span></label>
                                            <input class="fs-input" id="email" name="email" required />
                                        </div>
                                        @if($errors->has('email')) <span class="error" > {{ $errors->first('email') }} </span> @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fs-field">
                                            <label class="fs-label" for="mobile">Mobile<span class="text-danger">*</span></label>
                                            <input class="fs-input" type="tel" id="mobile" name="mobile" required/>
                                            <input type="hidden" id="mobile_hidden" name="mobile_hidden" />
                                            <input type="hidden" id="country_code" name="country_code" />
                                        </div>
                                        @if($errors->has('mobile')) <span class="error" > {{ $errors->first('mobile') }} </span> @endif
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="fs-field">
                                            <label class="fs-label" for="address">Address</label>
                                            <textarea class="fs-textarea" id="address" name="address"></textarea>
                                        </div>
                                        @if($errors->has('address')) <span class="error" > {{ $errors->first('address') }} </span> @endif
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="fs-field">
                                            <label class="fs-label" for="city">City</label>
                                            <input class="fs-input" id="city" name="city"  />
                                        </div>
                                        @if($errors->has('city')) <span class="error" > {{ $errors->first('city') }} </span> @endif
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="fs-field">
                                            <label class="fs-label" for="state">State</label>
                                            <input class="fs-input" id="state" name="state"  />
                                        </div>
                                        @if($errors->has('state')) <span class="error" > {{ $errors->first('state') }} </span> @endif
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="fs-field">
                                            <label class="fs-label" for="pincode">Pincode / Postal Code</label>
                                            <input class="fs-input" id="pincode" name="pincode"  onkeypress="return isNumberKey(event,this)" />
                                        </div>
                                        @if($errors->has('pincode')) <span class="error" > {{ $errors->first('pincode') }} </span> @endif
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="fs-field">
                                            <label class="fs-label" for="country">Country</label>
                                            <input class="fs-input" id="country" name="country"/>
                                        </div>
                                        @if($errors->has('country')) <span class="error" > {{ $errors->first('country') }} </span> @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="fs-field">
                                            <label class="fs-label" for="diet">Cusine</label>
                                            <select class="fs-select" id="diet" name="diet">
                                                <option value="Tamilnadu Cusine">Tamilnadu Cusine</option>
                                                <option value="Continental Cusine">Continental Cusine</option>
                                            </select>
                                        </div>
                                        @if($errors->has('diet')) <span class="error" > {{ $errors->first('diet') }} </span> @endif
                                    </div>
                                    </div>
                                    <!--
                                        <div class="col-lg-8 ">
                                            <label class="fs-label mt-2" for="payment_screen_shot">Upload Screenshot</label>
                                            <input class="form-control" type="file" id="payment_screen_shot" name="payment_screen_shot" onchange="bgValidation(this,'.bg_image-error1','.preview1')" >
                                            <p style="color:#AD0E60;font-size:14px;">NOTE : We kindly request you to attach the screenshot of the payment transaction</p>
                                            @if($errors->has('payment_screen_shot')) <span class="error" > {{ $errors->first('payment_screen_shot') }} </span> @endif
                                            <span class="bg_image-error1"></span>
                                        </div>
                                        <div class="col-lg-4 mt-3 "><img src="" class="image_view1 preview1"></div>
                                    -->
                                    <div class="row align-items-center">
                                    <div class="col-lg-6">
										<h5 class="mb-2">{{ isset($dinner->name) && !empty($dinner->name) ? $dinner->name : '' }}</h5>
										<div class="fs-field">
											<label class="fs-label" for="gala_dinner">
												<input class="fs-checkbox" name="gala_dinner" id="gala_dinner" type="checkbox" @if(isset($_GET['category']) && !empty($_GET['category']) && $_GET['category'] == 'international') data-gala_dinner_price="{{ isset($dinner->usd_price) && !empty($dinner->usd_price) ? $dinner->usd_price : 0 }}" @else data-gala_dinner_price="{{ isset($dinner->price) && !empty($dinner->price) ? $dinner->price : 0 }}" @endif value="gala dinner"/> <span style="position: relative;top: -6px;left: 10px;" id="dinner_price_data">Gala Dinner @if(isset($_GET['category']) && !empty($_GET['category']) && $_GET['category'] == 'international') {{ isset($dinner->usd_price) && !empty($dinner->usd_price) ? $dinner->usd_price : 0 }}  @else {{ isset($dinner->price) && !empty($dinner->price) ? '₹ '.$dinner->price : 0 }} @endif (with GST)</span>
											</label>
										</div>
									</div>
									<div class="col-lg-6">
									    <h5 class="mb-2">Residential Package (Per Day)</h5>
									    <div class="fs-field">
    										<label class="fs-label"> <input class="fs-radio room_tarrif" name="room_tarrif" data-room_tarrif_data="single_bed" id="single" type="radio" @if(isset($_GET['category']) && !empty($_GET['category']) && $_GET['category'] == 'international') value="{{ isset($room_tarrif->single_bed_usd_price) && !empty($room_tarrif->single_bed_usd_price) ? $room_tarrif->single_bed_usd_price : 0 }}" @else value="{{ isset($room_tarrif->single_bed_price) && !empty($room_tarrif->single_bed_price) ? $room_tarrif->single_bed_price : 0 }}" @endif /><span style="position: relative;top: -6px;left: 10px;" id="single_text">@if(isset($_GET['category']) && !empty($_GET['category']) && $_GET['category'] == 'international') {{ isset($room_tarrif->single_bed_usd) && !empty($room_tarrif->single_bed_usd) ? ucfirst($room_tarrif->single_bed_usd) : '' }} @else {{ isset($room_tarrif->single_bed) && !empty($room_tarrif->single_bed) ? ucfirst($room_tarrif->single_bed) : '' }} @endif</span></label>
    										<label class="fs-label"> <input  class="fs-radio room_tarrif" name="room_tarrif" data-room_tarrif_data="double_bed" id="double" type="radio" @if(isset($_GET['category']) && !empty($_GET['category']) && $_GET['category'] == 'international') value="{{ isset($room_tarrif->double_bed_usd_price) && !empty($room_tarrif->double_bed_usd_price) ? $room_tarrif->double_bed_usd_price : 0 }}" @else value="{{ isset($room_tarrif->double_bed_price) && !empty($room_tarrif->double_bed_price) ? $room_tarrif->double_bed_price : 0 }}" @endif /><span style="position: relative;top: -6px;left: 10px;" id="double_text">@if(isset($_GET['category']) && !empty($_GET['category']) && $_GET['category'] == 'international') {{ isset($room_tarrif->double_bed_usd) && !empty($room_tarrif->double_bed_usd) ? ucfirst($room_tarrif->double_bed_usd) : '' }} @else  {{ isset($room_tarrif->double_bed) && !empty($room_tarrif->double_bed) ? ucfirst($room_tarrif->double_bed) : '' }} @endif</span></label>
    										<label class="fs-label"> <input  class="fs-radio room_tarrif" name="room_tarrif" data-room_tarrif_data="0" id="double" type="radio" value="0"/><span style="position: relative;top: -6px;left: 10px;">None of the above</span></label>
    							        </div>
						            </div>
						            <div class="col-lg-5">
							            <h5 class="mb-2">Select Room Dates (Per Day)</h5>
										<div class="fs-field">
											@if(isset($dinner->no_of_days) && !empty($dinner->no_of_days))
											    @for($i = 0; $i < (int)$dinner->no_of_days; $i++)
											        @php $start_date = date('Y-m-d',strtotime($dinner->start_date)); @endphp
											        @if($i==0)
											        <label class="fs-label" for="room_tarrif_date_{{$i}}" ><input class="fs-checkbox room_tarrif_date" name="room_tarrif_date[]" id="room_tarrif_date_{{$i}}" type="checkbox" value="27 Nov 2:00 PM to 28 Nov 12:00 PM"/> <span style="position: relative;top: -6px;left: 5px;">27 Nov 2:00 PM to 28 Nov 12:00 PM</span> </label>
											        @elseif($i==1)
											        <label class="fs-label" for="room_tarrif_date_{{$i}}" ><input class="fs-checkbox room_tarrif_date" name="room_tarrif_date[]" id="room_tarrif_date_{{$i}}" type="checkbox" value="28 Nov 2:00 PM to 29 Nov 12:00 PM"/> <span style="position: relative;top: -6px;left: 5px;">28 Nov 2:00 PM to 29 Nov 12:00 PM</span> </label>
											        @elseif($i==2)
											        <label class="fs-label" for="room_tarrif_date_{{$i}}" ><input class="fs-checkbox room_tarrif_date" name="room_tarrif_date[]" id="room_tarrif_date_{{$i}}" type="checkbox" value="29 Nov 2:00 PM to 30 Nov 12:00 PM"/> <span style="position: relative;top: -6px;left: 5px;">29 Nov 2:00 PM to 30 Nov 12:00 PM</span> </label>
											        @endif
											    @endfor
											@endif
										</div>
							        </div>
							        <div class="col-lg-7" id="person_stay" style="display:none;">
							            <h5 class="mb-2">Accompanying Person Detail</h5>
							            <div class="row">
							                <div class="col-lg-12 mt-1 mb-1">
                                                <label class="fs-label" for="register_no">Conference Registration Number /  For Spouse - Fill it as Spouse</label>
                                                <input class="fs-input" id="register_no" name="person[0][register_no]" placeholder="" style="width:100%"/>
                                            </div>
                                            <div class="col-lg-6 mt-1 mb-1">
                                                <label class="fs-label" for="person_name">Person Name</label>
                                                <input class="fs-input" id="person_name" name="person[0][name]" style="width:100%" />
                                            </div>
                                            <div class="col-lg-6 mt-1 mb-1">
                                                <label class="fs-label" for="person_mobile">Person Mobile No</label>
                                                <input class="fs-input" id="person_mobile" name="person[0][mobile_no]"  style="width:100%"/>
                                            </div>
                                            
                                        </div>
							        </div>

                                </div>
                                <!--
                                
                                @if(isset($training) && !empty($training) && isset($_GET['category']) && !empty($_GET['category']) && $_GET['category'] != 'international' && $_GET['category'] != 'spouse-accompanying')   
                                <style>
                                    .fs-field {    
                                        margin-bottom: 10px!important;
                                    }
                                </style>
                                <div class="row align-items-center" id="hands_training">
									<h5 class="mb-2">Hands on Training Courses</h5>
    								<div class="col-lg-12">
    								    @foreach($training as $keyt=>$t)
    								    @if($t->join_user < 20)
    									<div class="fs-field">
    										<label class="fs-label" for="{{ 'training_'.$keyt }}">
    											<input class="fs-checkbox training_data" name="training[]" id="{{ 'training_'.$keyt }}" type="checkbox" value="{{ $t->text }}" data-id="{{ $t->id }}" data-price="1" data-usd_price="{{ $t->usd_price }}" data-total_user="{{ $t->user }}" data-join_user="{{ $t->join_user }}" /> <span style="position:relative;top:-6px;left:10px;">{{ $t->text }}</span>
    										</label>
    									</div>
    									@endif
    									@endforeach
									</div>
								</div>
								@endif
                                <div class="row align-items-center" id="become_member" >
                                    <div class="col-lg-12">
									    <h5 class="mb-2">Become an AIRS member through combo offer</h5>
										<div class="fs-field">
										    
											<label class="fs-label" for="become_airs">
												<input class="fs-checkbox" name="become_airs" id="become_airs" type="checkbox" value="4000" />
												    <strong> <span style="position:relative;top:-6px;left:5px;">To become a AIRS member ( pay ₹4000 extra)</span></strong>
											</label>
											<p> <a href="javascript:void(0)" class="text-pink" target="_blank" id="google_form">Click Here to Fillout the form - <span style="color:#AD0E60;">https://forms.gle/J8Y4e4J5NzqXgBpo7</span></a></p>
											 <ul>
											     <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> <small> Email <a href="mailto:rhinocon2025chennai@gmail.com" style="color:#AD0E60;">rhinocon2025chennai@gmail.com</a> & <a href="mailto:allindiarhinologysociety@gmail.com" style="color:#AD0E60;">allindiarhinologysociety@gmail.com</a> with your personal information, payment details and Rhinocon registration number.</small></li>
							                	<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> <small>Expect a reply within 5 working days.</small></li>
							                	<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> <small>If not received, send a follow-up email.</small></li>
							                </ul>
										</div>
									</div>
                                </div>
                                -->
                                <div class="row ">
                                    <div class="text-end mb-3">
                                        <table width="100%">
                                            <tr>
                                                <td style="padding:10px;"><span id="plan_name_td" style="font-weight:600;font-size:17px;"></span></td>
                                                <td style="padding:10px;"><span id="plan_amount_td" style="font-weight:600;font-size:17px;"></span></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px;"><span id="gala_dinner_td" style="font-weight:600;font-size:17px;" align="right"></span></td>
                                                <td style="padding:10px;"><span id="gala_dinner_amount_td" style="font-weight:600;font-size:17px;"></span></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px;"><span id="room_tarrif_td" style="font-weight:600;font-size:17px;"></span></td>
                                                <td style="padding:10px;"><span id="room_tarrif_amount_td" style="font-weight:600;font-size:17px;"></span></td>
                                            </tr>
                                            
                                            <tr>
                                                <td style="padding:10px;"><span id="become_airs_td" style="font-weight:600;font-size:17px;"></span></td>
                                                <td style="padding:10px;"><span id="become_airs_amount_td" style="font-weight:600;font-size:17px;"></span></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px;"><span id="training_td" style="font-weight:600;font-size:17px;"></span></td>
                                                <td style="padding:10px;"><span id="training_amount_td" style="font-weight:600;font-size:17px;"></span></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px;"><span id="gst_txt" style="display:none;font-weight:600;font-size:17px;">GST 18% / Tax </span></td>
                                                <td style="padding:10px;"><span id="gst" style="font-weight:600;"></span></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px;"><span id="total_txt"  style="display:none;font-weight:600;font-size:17px;">Total</span></td>
                                                <td style="padding:10px;"><span class="total" style="font-weight:600;color:#AD0E60;font-size:17px;"></span><input id="total" type="hidden" class="total" name="total"/> </td>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                    <input type="hidden" name="gala_dinner_price" id="gala_dinner_price" value="0">
                                    <input type="hidden" name="gala_dinner_tax" id="gala_dinner_tax" value="0">
                                    
                                    <input type="hidden" name="room_tarrif_txt" id="room_tarrif_txt">
                                    <input type="hidden" name="room_tarrif_price" id="room_tarrif_price">
                                    <input type="hidden" name="room_tarrif_tax" id="room_tarrif_tax">
                                    
                                    
                                    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                                    <input type="hidden" name="currency" id="currency">
                                    <div class="text-end">
                                        <button class="vl-btn1" type="submit" id="registration-submit">Register Now</button>
                                        <button id="payBtn" style="visibility: hidden;">Pay Now</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="col-lg-4 mt-5">
                        
                        <!--
                        <div class="reg-sample-video " style="position:relative; ">
                              <h4 style=" color:#AD0E60;">Quick Registration Demo</h4>
                            <video width="100%" height="240" controls>
                                <source src="https://rhinocon2025chennai.com/public/asset/img/reg-sample.mp4" type="video/mp4">.
                            </video>
                        </div> 
                        <div class="card" style="position:relative; ">
                            <div class="card-body">
                                <a href="https://docs.google.com/spreadsheets/d/1W_4OvYYDmbq-6cijjIeWgzMBVRsu5xoy/edit?gid=1071324751#gid=1071324751" download target="_blank"><i class="fas fa-file-excel text-success" style="font-size:25px"></i> &nbsp;&nbsp;&nbsp;<span style="font-size:20px;color:#AD0E60;">AIRS Members list</span></a>        
                            </div>
                          
                        </div>
                       -->
                    </div>
              <!--      <div class="col-lg-4">
                        <div class="bankinfo">
                            <h4 class="mb-2"><b>Bank Details</b></h4>
                            <p class="mb-2"><b>Bank Name : Tamilnadu Mercantile Bank</b></p>
                            <p class="mb-2"><b>Account Name</b> : ENDO ENT SOCIETY MADURAI NORTH</p>
                            <p class="mb-2"><b>Account Type</b> : Current A/C</p>
                            <p class="mb-2"><b>Account Number</b> : 354150310875021</p>
                            <p class="mb-2"><b>IFSC Code</b> : TMBL0000354</p>
                            <p class="mb-2"><b>Branch</b> : 354-VANDIYUR</p>
                        </div>
                        <div class="card mt-4" style="padding:0px;margin:0px;border-radius:18px;display:none;">
                            <div class="card-body" style="padding:0px;margin:0px;">
                                <img src="{{ env('APP_URL').'public/QR_Code_page-0001.jpg' }}" style="width:100%;height:600px;" />
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>

<!--<button id="payBtn">Pay Now</button>-->
@endsection
@section('footer_script')
<script src="{{ env('APP_URL').'public/admin_asset/js/jquery.validate.min.js' }}"></script>
<script src="{{ env('APP_URL').'public/admin_asset/js/additional-methods.min.js' }}"></script>
<script src="//checkout.razorpay.com/v1/checkout.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"></script>
<script>
    
$(document).ready(function(){
    var input = document.querySelector("#mobile");
        window.iti = window.intlTelInput(input, {
          initialCountry: "in",
          nationalMode: true,       // allow 10-digit local number
          separateDialCode: true,   // optional: show +91 outside
          utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
        });
        input.addEventListener("countrychange", function() {
            input.value = ""; // remove typed value
            var countryData = iti.getSelectedCountryData();
            $("#country_code").val("+" + countryData.dialCode);
        });
        var countryData = iti.getSelectedCountryData();
        $("#country_code").val("+" + countryData.dialCode);
    $('#training_td').css('display', 'none');
    $('#training_amount_td').css('display', 'none');
    $('#training_td').text('');
    $('#training_amount_td').text('');
        $.validator.addMethod("validPhoneByCountry", function(value, element) {
  if (this.optional(element)) {
    return true;
  }
  if (window.iti) {
    let number = iti.getNumber();
    console.log("Raw input:", value);
    console.log("Full number:", number);
    console.log("Is valid:", iti.isValidNumber());
    console.log("Error code:", iti.getValidationError());
    return iti.isValidNumber();
  }
  return false;
}, "Invalid mobile number for the selected country");

    $(document).on("click","#registration-submit",function() {
        
        var fullNumber = iti.getNumber();
        $("#mobile_hidden").val(fullNumber);

        
        //  $.validator.addMethod("notAllZerosOrStartZero", function(value, element) {
        //     return this.optional(element) || (!/^0+$/.test(value) && !/^0/.test(value));
        // }, "Mobile Number cannot start with 0 or be all zeros");
        $.validator.addMethod("validPhoneByCountry", function(value, element) {
            if (this.optional(element)) {
                return true;
            }
            if (window.iti) {
                 let number = iti.getNumber();
               console.log("Input value:", value);
                console.log("Full E.164 number:", number);
                console.log("Is valid:", iti.isValidNumber());
                console.log("Validation error code:", iti.getValidationError());
                        return iti.isValidNumber();
            }
            return false;
        }, "Invalid mobile number for the selected country");

    
        $("#registration-form").validate({
            rules: {
                //profile: { required: true, },
                category: { required: true, },
                //membership_no: { required: true, },
                name: { required: true, minlength: 1, maxlength: 100},
                //medical_reg_no: { required: true, minlength: 1, maxlength: 100 },
                //designation: { required: true, minlength: 1, maxlength: 100 },
                //institute: { required: true, minlength: 1, maxlength: 100 },
                mobile: { required: true,  digits: true, validPhoneByCountry: true},
                email: { required: true, email:true, minlength: 1, maxlength: 100},
                // country: { required: true, minlength: 1, maxlength: 100 },
                //address: { required: true, minlength: 1, maxlength: 100 },
                //city: { required: true, minlength: 1, maxlength: 100 },
                //state: { required: true, minlength: 1, maxlength: 100 },
                //pincode: { required: true, number:true, maxlength: 6 },
                //diet: { required: true, minlength: 1, maxlength: 100 },
                ///accompanying_person: { required: true, },
                //acc_person_name: { required: true, minlength: 1, maxlength: 100 },
                //age: { required: true, number:true, maxlength: 3 },
                //gender: { required: true, },
                //acc_diet: { required: true, minlength: 1, maxlength: 100 },
                //payment_screen_shot: { required: true, },
            },
            messages: {
                profile: { required: "Profile Image is required", },
                category: { required: "Category is required", },
                membership_no: { required: "Membership No. is required", },
                name: { required: "Name is required", },
                medical_reg_no: { required: "Medical Reg. No is required" },
                designation: { required: "Designation is required" },
                institute: { required: "Institute is required",  },
                mobile: { 
                    required: "Mobile Number field is required",
                    validPhoneByCountry: "Invalid mobile number for the selected country"
                } ,
                email: { required: "Email is required", },
                address: { required: "Address is required",  },
                city: { required: "City is required",  },
                country: { required: "Country is required",  },
                state: { required: "State  is required", },
                pincode: { required: "Pincode is required",  },
                diet: { required: "Diet is required", },
                accompanying_person: { required: "Accompanying person is required", },
                acc_person_name: { required: "Person Name is required", },
                age: { required: "Age is required", },
                gender: { required: "gender is required", },
                acc_diet: { required: "Diet is required", },
                
            },
            focusInvalid: true,
            invalidHandler: function () {
                $(this).find(":input.error:first").focus();
            },
            errorPlacement: function(error, element) {
             if (element.hasClass("room_tarrif_date")) {
                // checkbox group
                error.insertAfter(element.closest("label"));
            } 
            else if (element.closest(".iti").length) {
                // intl-tel-input wrapper
                error.insertAfter(element.closest(".iti"));
            } 
            else {
                // default for other inputs
                error.insertAfter(element);
            }
        }

        });
        // if ($("form#registration-form").valid()) {
        //     let form = $("form#registration-form");
        //     let category = $('#registration-form #category').val();
        //     let total_amt = $('#registration-form #total').val();
        //     let currency = '';
        //     total_amt = parseFloat(total_amt) * 100;
        //     //total_amt = 100 * 100;
        //     if(category !='' && category == 'international'){
        //         currency = 'USD';
        //     } else {
        //         currency = 'INR';
        //     }
        //     $("form#registration-form #currency").val(currency);
        //     $("form#registration-form").attr('action', "{{ url('vip-member-form') }}");
        //     $("form#registration-form").submit();
        // }
        if ($("form#registration-form").valid()) {
            let form = $("form#registration-form");
            let category = $('#registration-form #category').val();
            let total_amt = $('#registration-form #total').val();
            let currency = '';
            total_amt = parseFloat(total_amt) * 100;
            //total_amt = 100 * 100;
            if(category !='' && category == 'international'){
                currency = 'USD';
            } else {
                currency = 'INR';
            }
            $("form#registration-form #currency").val(currency);
            $("form#registration-form").attr('action', "{{ url('vip-member-form') }}");
            $("form#registration-form").submit();
            // razorPay();
            // $('#payBtn').trigger('click');
            
            //$("form#registration-form").submit();
        }
    });
    
    window.setTimeout(function() {
        $(".error").text('');
    }, 7000);
    
    $(document).on("click","#gala_dinner",function() {
        let gala_dinner = $('#gala_dinner:checked').val();
        if($('#gala_dinner').is(':checked')){
            
            let gala_dinner_price = $(this).data('gala_dinner_price');
            $('#gala_dinner_td').text('GALA Dinner');
            let category = $('#category').val();
            if(category == "international"){
                $('#gala_dinner_amount_td').text('$ '+ gala_dinner_price);
            } else {
                $('#gala_dinner_amount_td').text('₹ '+ gala_dinner_price);
            }
            $('#gala_dinner_price').val(gala_dinner_price);
        } else {
            
            $('#gala_dinner_td').text('');
            $('#gala_dinner_amount_td').text('');
            $('#gala_dinner_price').val(0);
        }
        ototal();
    });
    
    let gala_dinner = $('#gala_dinner:checked').val();
    if($('#gala_dinner').is(':checked')){
        
        let gala_dinner_price = $('#gala_dinner').data('gala_dinner_price');
        $('#gala_dinner_td').text('GALA Dinner');
        let category = $('#category').val();
        if(category == "international"){
            $('#gala_dinner_amount_td').text('$ '+ gala_dinner_price);
        } else {
            $('#gala_dinner_amount_td').text('₹ '+ gala_dinner_price);
        }
        $('#gala_dinner_price').val(gala_dinner_price);
        ototal();
    } else {
        
        $('#gala_dinner_td').text('');
        $('#gala_dinner_amount_td').text('');
        $('#gala_dinner_price').val(0);
    }
    
    
    $(document).on("click","#become_airs",function() {
        let become_airs = $('#become_airs:checked').val();
        if($('#become_airs').is(':checked')){
            become_airs = parseFloat(become_airs);
            $('#become_airs_td').text('Become a AIRS Member')
            $('#become_airs_amount_td').text(' ₹ '+become_airs.toFixed(2))
            $('#become_airs_price').val(become_airs);
            $('#google_form').attr('href', 'https://forms.gle/J8Y4e4J5NzqXgBpo7');
            
        } else {
            $('#become_airs').prop('checked', false);
            $('#become_airs_td').text('')
            $('#become_airs_amount_td').text('')
            $('#become_airs_price').val(0);
            $('#google_form').attr('href', 'javascript:void(0)');
        }
        ototal();
    });

    function ototal(){
        let plan_amount = 0;
        let gala_dinner = 0;
        let room_tarrif = 0;
        
        let gst = 0;
        let total = 0;
        let category = $('#category').val();
        plan_amount = $('#plan_amount').val();
        
        
        
        gala_dinner = $('#gala_dinner:checked').data('gala_dinner_price');
        let room_tarrif_date = new Array();
        $('.room_tarrif_date:checkbox:checked').each(function() {
             room_tarrif_date.push($(this).val());
        });
        room_tarrif = $("input[name='room_tarrif']:checked").val();
        gala_dinner = (typeof gala_dinner == 'undefined') ? 0 : gala_dinner;
        room_tarrif = (typeof room_tarrif == 'undefined') ? 0 : room_tarrif;
        //room_tarrif_date = (typeof room_tarrif == 'undefined') ? 0 : room_tarrif;
        
        console.log(room_tarrif_date.length,room_tarrif);
        let become_airs = 0;
        if($('#become_airs').is(':checked')){
            become_airs = $('#become_airs:checked').val();
            if(category == "non-members" || category == "pg-students" && become_airs.length !=0){
                become_airs = parseFloat(become_airs);
                $('#become_airs_td').text('Become a AIRS Member')
                $('#become_airs_amount_td').text(' ₹ '+become_airs.toFixed(2))
                $('#become_airs_price').val(become_airs);
            } else {
                $('#become_airs_td').text('')
                $('#become_airs_amount_td').text('')
                $('#become_airs_price').val(0);
            }
        } else {
            $('#become_airs_td').text('')
            $('#become_airs_amount_td').text('')
            $('#become_airs_price').val(0);
        }
        
        gst = ((parseFloat(plan_amount) + parseFloat(room_tarrif_date.length * room_tarrif)) * 18) / 100;
        total = (parseFloat(plan_amount) + parseFloat(gala_dinner) + parseFloat(room_tarrif_date.length * room_tarrif) +  gst + parseFloat(become_airs));
        $('#gst_txt').css('display','block');
        $('#total_txt').css('display','block');
        if(category == "international"){
            $('#gst').text(' $ '+gst.toFixed(2));
            $('.total').text(' $ '+total.toFixed(2));
        } else {
            $('#gst').text(' ₹ '+gst.toFixed(2));
            $('.total').text(' ₹ '+total.toFixed(2));
        }
        
        let training_data = new Array();
        let training = 0; 
        let total_training_price = 0;
        let total_training_tax = 0;
        if(category == "international"){
            training = $('#training:checked').data('usd_price');
            $('.training_data:checkbox:checked').each(function() {
                 training_data.push($(this).data('usd_price'));
            });
            
            total_training_price = (1000 * training_data.length);
            total_training_tax = (total_training_price * 18) / 100;
            
            gst = (gst + total_training_tax);
            $('#gst').text(' $ '+gst.toFixed(2));
            if(total_training_price !=0){
                $('#training_td').text('Hands on Training Courses');
                $('#training_amount_td').text(' $ '+total_training_price);
                $('#training_td').css('display', 'block');
                $('#training_amount_td').css('display', 'block');
                total = (total_training_price + total_training_tax + total);
                
            } else {
                $('#training_td').text('');
                $('#training_amount_td').text('');
                $('#training_td').css('display', 'none');
                $('#training_amount_td').css('display', 'none');
            }
        } else {
            //alert('a');
            training = $('#training:checked').data('price');
            $('.training_data:checkbox:checked').each(function() {
                 training_data.push($(this).data('price'));
            });
            
            total_training_price = (1000 * training_data.length);
            total_training_tax = (total_training_price * 18) / 100;
            //console.log(total_training_price,total_training_tax);
            gst = (gst + total_training_tax);
            $('#gst').text(' ₹ '+gst.toFixed(2));
            if(total_training_price !=0){
                $('#training_td').text('Hands on Training Courses');
                $('#training_amount_td').text(' ₹ '+total_training_price);
                $('#training_td').css('display', 'block');
                $('#training_amount_td').css('display', 'block');
                total = (total_training_price + total_training_tax + total);
            } else {
                $('#training_td').text('');
                $('#training_amount_td').text('');
                $('#training_td').css('display', 'none');
                $('#training_amount_td').css('display', 'none');
            }
        }
        $('.total').val(total.toFixed(2));
        $('.total').text(total.toFixed(2));
        
        if(category == "international"){
            $('#registration-submit').text('Register Now  $ '+ total.toFixed(2));
        } else {
            $('#registration-submit').text('Register Now  ₹ '+ total.toFixed(2));
        }
    }
    
    
    $(document).on("click",".training_data",function() {
        let training = $('.training_data:checked').val();
        if($('.training_data:checked').is(':checked')){
            ototal();
        } else {
            $('#training_td').css('display', 'none');
            $('#training_amount_td').css('display', 'none');
            $('#training_td').text('');
            $('#training_amount_td').text('');
            ototal();
        }
    });
    $(document).on("click","input[name='room_tarrif']",function() {
        if($("input[name='room_tarrif']:checked").is(':checked')){
            
            $(".room_tarrif_date").prop('checked', false);
            let room_tarrif = $(this).val();
            let room_tarrif_data = $(this).data('room_tarrif_data');
            let category = $('#category').val();
            
            if(room_tarrif_data == 'single_bed'){
                $('#person_stay').css('display','none');
                $('#room_tarrif_hint').text('{{ isset($room_tarrif->single_bed) && !empty($room_tarrif->single_bed) ? $room_tarrif->single_bed : '' }}');    
                
                $('#room_tarrif_td').text('Room Tarrif');
                $('#room_tarrif_txt').val(room_tarrif_data);
                
                if(category == "international"){
                    $('#room_tarrif_amount_td').text('$ '+room_tarrif);
                } else {
                    $('#room_tarrif_amount_td').text('₹ '+room_tarrif);
                }
                $('#room_tarrif_price').val(room_tarrif);
                $('.room_tarrif_date').prop('required',true);
            $('#person_name').prop('required',true);
            $('#person_mobile').prop('required',true);
            } else if(room_tarrif_data == 'double_bed') {
                $('#person_stay').css('display','block');
                $('#room_tarrif_hint').text('{{ isset($room_tarrif->double_bed) && !empty($room_tarrif->double_bed) ? $room_tarrif->double_bed : '' }}');
                
                $('#room_tarrif_td').text('Room Tarrif');
                $('#room_tarrif_txt').val(room_tarrif_data);
                
                if(category == "international"){
                    $('#room_tarrif_amount_td').text('$ '+room_tarrif);
                } else {
                    $('#room_tarrif_amount_td').text('₹ '+room_tarrif);
                }
                $('#room_tarrif_price').val(room_tarrif);
                $('.room_tarrif_date').prop('required',true);
            $('#person_name').prop('required',true);
            $('#person_mobile').prop('required',true);
            } else if(room_tarrif_data == 0) {
                $('#person_stay').css('display','none');
                $('#room_tarrif_hint').text('');
                $('.room_tarrif_date').prop('required',false);
                $('#person_name').prop('required',false);
                $('#person_mobile').prop('required',false);
                
                $('#room_tarrif_td').text('');
                $('#room_tarrif_txt').val('');
                
                if(category == "international"){
                    $('#room_tarrif_amount_td').text('');
                } else {
                    $('#room_tarrif_amount_td').text('');
                }
                $('#room_tarrif_price').val(room_tarrif);
            }else {
                $('#person_stay').css('display','none');
                $('#room_tarrif_hint').text('');
                $('.room_tarrif_date').prop('required',false);
                $('#person_name').prop('required',false);
                $('#person_mobile').prop('required',false);
                
                $('#room_tarrif_td').text('');
                $('#room_tarrif_txt').val('');
                
                if(category == "international"){
                    $('#room_tarrif_amount_td').text('');
                } else {
                    $('#room_tarrif_amount_td').text('');
                }
                $('#room_tarrif_price').val(room_tarrif);
            }
            /*
            
            $('.room_tarrif_date').prop('required',true);
            $('#person_name').prop('required',true);
            $('#person_mobile').prop('required',true);
*/
            
            ototal();
        } else {
            ototal();
        }
        
        
        ototal();
    });
    
    if($("input[name='room_tarrif']:checked").is(':checked')){
    
    //$(".room_tarrif_date").prop('checked', false);
    let room_tarrif = $("input[name='room_tarrif']:checked").val();
    let room_tarrif_data = $("input[name='room_tarrif']:checked").data('room_tarrif_data');
    let category = $('#category').val();
    $('#room_tarrif_td').text('Room Tarrif');
    $('#room_tarrif_txt').val(room_tarrif_data);
    if(category == "international"){
        $('#room_tarrif_amount_td').text('$ '+room_tarrif);
    } else {
        $('#room_tarrif_amount_td').text('₹ '+room_tarrif);
    }
    $('#room_tarrif_price').val(room_tarrif);
     alert(room_tarrif_data);
    if(room_tarrif_data == 'single_bed'){
        $('#person_stay').css('display','none');
        $('#room_tarrif_hint').text('{{ isset($room_tarrif->single_bed) && !empty($room_tarrif->single_bed) ? $room_tarrif->single_bed : '' }}');  
        $('.room_tarrif_date').prop('required',true);
            $('#person_name').prop('required',true);
            $('#person_mobile').prop('required',true);
    } else if(room_tarrif_data == 'double_bed') {
        $('#person_stay').css('display','block');
        $('#room_tarrif_hint').text('{{ isset($room_tarrif->double_bed) && !empty($room_tarrif->double_bed) ? $room_tarrif->double_bed : '' }}');
        $('.room_tarrif_date').prop('required',true);
            $('#person_name').prop('required',true);
            $('#person_mobile').prop('required',true);
    } else if(room_tarrif_data == 0) {
                $('#person_stay').css('display','none');
        
                $('#room_tarrif_hint').text('');
                $('.room_tarrif_date').prop('required',false);
                $('#person_name').prop('required',false);
                $('#person_mobile').prop('required',false);
                
                $('#room_tarrif_td').text('');
                $('#room_tarrif_txt').val('');
                
                if(category == "international"){
                    $('#room_tarrif_amount_td').text('');
                } else {
                    $('#room_tarrif_amount_td').text('');
                }
                $('#room_tarrif_price').val(room_tarrif);
            } else {
        $('#person_stay').css('display','none');
        $('#room_tarrif_hint').text('');
        $('.room_tarrif_date').prop('required',false);
        $('#person_name_1').prop('required',false);
        $('#person_mobile_1').prop('required',false);
    }
    
    /*
    $('.room_tarrif_date').prop('required',true);
    $('#person_name_1').prop('required',true);
    $('#person_mobile_1').prop('required',true);
*/
    
    ototal();
} else {
    ototal();
}
    
    $(document).on("click",".room_tarrif_date",function() {
        if($('.room_tarrif_date:checked').is(':checked')){
            //alert('asdasd');
            let category = $('#category').val();
            let room_tarrif = $("input[name='room_tarrif']:checked").val();
            let room_tarrif_date = new Array();
            $('.room_tarrif_date:checkbox:checked').each(function() {
                room_tarrif_date.push($(this).val());
            });
            let room_tarrif_data = $("input[name='room_tarrif']:checked").data('room_tarrif_data');
            $('#room_tarrif_td').text('Room Tarrif');
            
            $('#room_tarrif_txt').val(room_tarrif_data);
            if(category == "international"){
                $('#room_tarrif_amount_td').text('$ '+ (room_tarrif_date.length * room_tarrif));
            } else {
                $('#room_tarrif_amount_td').text('₹ '+ (room_tarrif_date.length * room_tarrif));
            }
            $('#room_tarrif_price').val(room_tarrif_date.length * room_tarrif);
            ototal();
        } else {
            ototal();
        }
        
    });
    
    if($('.room_tarrif_date:checked').is(':checked')){
            //alert('asdasd');
        let category = $('#category').val();
        let room_tarrif = $("input[name='room_tarrif']:checked").val();
        let room_tarrif_date = new Array();
        $('.room_tarrif_date:checkbox:checked').each(function() {
            room_tarrif_date.push($(this).val());
        });
        let room_tarrif_data = $("input[name='room_tarrif']:checked").data('room_tarrif_data');
        
        $('#room_tarrif_td').text('Room Tarrif');
        
        $('#room_tarrif_txt').val(room_tarrif_data);
        if(category == "international"){
            $('#room_tarrif_amount_td').text('$ '+ (room_tarrif_date.length * room_tarrif));
        } else {
            $('#room_tarrif_amount_td').text('₹ '+ (room_tarrif_date.length * room_tarrif));
        }
        $('#room_tarrif_price').val(room_tarrif_date.length * room_tarrif);
        ototal();
    } else {
        ototal();
    }
    $(document).on("change","#category",function() {
        let category = $(this).val();
        $('#become_airs').prop('checked', false);
        if(category !=''){
            
            if(category == "international" || category == "International"){
                $('#hands_training').css('display','none');
                $('#country').prop('required',true);
            } else if(category == "spouse-accompanying") {
                $('#hands_training').css('display','none');
                $('#country').prop('required',false);
            } else {
                $('#hands_training').css('display','block');
                $('#country').prop('required',false);
            }
            if(category == "airs-members"){
                $('#country').prop('required',false);
                $('#membership_no_').css('display','block');
                $('#membership_no').prop('required',true);
                $('#doctor_name_').css('display','none');
                $('#doctor_name').prop('required',false);
            } else if(category == "spouse-accompanying") {
                $('#country').prop('required',false);
                $('#doctor_name_').css('display','block');
                $('#doctor_name').prop('required',false);
                $('#membership_no_').css('display','none');
                $('#membership_no').prop('required',false);
            } else {
                // console.log("test");
            //    $('#country').prop('required',false);
                $('#membership_no_').css('display','none');
                $('#membership_no').prop('required',false);
                $('#doctor_name_').css('display','none');
                $('#doctor_name').prop('required',false);
            }
            
            $.get("{{ url('get-plan-detail') }}"+"/"+category, function(data, status){
                $('#plan').empty();
                $('#plan_date_').css('display','block');
                $('#plan').css('display','block');
                $('#plan').text('Till ' + data.plan.other_date);
                $('#plan_id').val(data.plan.id);
                $('#plan_amount_').css('display','block');
                $('#plan_amount').css('display','block');
                
                let become_airs = 0;
                if($('#become_airs').is(':checked')){
                    become_airs = $('#become_airs:checked').val();
                    if(category == "non-members" || category == "pg-students" && become_airs.length !=0){
                        become_airs = parseFloat(become_airs);
                        $('#become_airs_td').text('Become a AIRS Member')
                        $('#become_airs_amount_td').text(' ₹ '+become_airs.toFixed(2))
                        $('#become_airs_price').val(become_airs);
                    } else {
                        $('#become_airs_td').text('')
                        $('#become_airs_amount_td').text('')
                        $('#become_airs_price').val(0);
                    }
                } else {
                    $('#become_airs_td').text('')
                    $('#become_airs_amount_td').text('')
                    $('#become_airs_price').val(0);
                }
                
                if(category == "pg-students" || category == "non-members"){
                    $('#become_member').css('display','block');
                } else {
                    $('#become_member').css('display','none');
                }
                if(data.plan.category == "international" || data.plan.category == "International"){
                    $('#hands_training').css('display','none');
                } else if(data.plan.category == "spouse-accompanying") {
                    $('#hands_training').css('display','none');
                } else {
                    $('#hands_training').css('display','block');
                }
                
                if(data.plan.category == "international" || data.plan.category == "International"){
                    $('#plan_amount_p').text(' $ 0');
                    $('#dinner_price_data').text('Gala Dinner $ {{ isset($dinner->usd_price) && !empty($dinner->usd_price) ? $dinner->usd_price.' '.$dinner->text : 0 }}');
                    $('#gala_dinner').attr('data-gala_dinner_price', '{{ isset($dinner->usd_price) && !empty($dinner->usd_price) ? $dinner->usd_price : 0 }}');
                    $('#single').val('{{ isset($room_tarrif->single_bed_usd_price) && !empty($room_tarrif->single_bed_usd_price) ? $room_tarrif->single_bed_usd_price : 0 }}');
                    $('#single_text').text('{{ isset($room_tarrif->single_bed_usd) && !empty($room_tarrif->single_bed_usd) ? ucfirst($room_tarrif->single_bed_usd) : '' }}');
                    $('#double').val('{{ isset($room_tarrif->double_bed_usd_price) && !empty($room_tarrif->double_bed_usd_price) ? $room_tarrif->double_bed_usd_price : 0 }}');
                    $('#double_text').text('{{ isset($room_tarrif->double_bed_usd) && !empty($room_tarrif->double_bed_usd) ? ucfirst($room_tarrif->double_bed_usd) : '' }}');
                } else {
                    $('#plan_amount_p').text(' ₹ 0');
                    $('#dinner_price_data').text('Gala Dinner ₹ {{ isset($dinner->price) && !empty($dinner->price) ? $dinner->price.' '.$dinner->text : 0 }} ');
                    $('#gala_dinner').attr('data-gala_dinner_price', '{{ isset($dinner->price) && !empty($dinner->price) ? $dinner->price : 0 }}');
                    $('#single').val('{{ isset($room_tarrif->single_bed_price) && !empty($room_tarrif->single_bed_price) ? $room_tarrif->single_bed_price : 0 }}');
                    $('#single_text').text('{{ isset($room_tarrif->single_bed) && !empty($room_tarrif->single_bed) ? ucfirst($room_tarrif->single_bed) : '' }}');
                    $('#double').val('{{ isset($room_tarrif->double_bed_price) && !empty($room_tarrif->double_bed_price) ? $room_tarrif->double_bed_price : 0 }}');
                    $('#double_text').text('{{ isset($room_tarrif->double_bed) && !empty($room_tarrif->double_bed) ? ucfirst($room_tarrif->double_bed) : '' }}');
                }
                
                $('#plan_amount').val(0);
                $('#plan_date').val(data.plan.plan_date);
                $('#plan_amount').attr('readonly', true);
                
                $('#plan_name_td').text(data.plan.category+' members amount ');
                if(data.plan.category == "international" || data.plan.category == "International"){
                    $('#plan_amount_td').text(' $ 0');
                } else {
                    $('#plan_amount_td').text(' ₹ 0');
                }
                let gst = 0;
                let total = 0;
                gst = (parseFloat(0) * 18) / 100;
                total = (parseFloat(0) + gst);
                
                $('#gst_txt').css('display','block');
                $('#total_txt').css('display','block');
                if(data.plan.category == "international" || data.plan.category == "International"){
                    $('#gst').text(' $ '+gst.toFixed(2));
                    $('.total').text(' $ '+total.toFixed(2));
                } else {
                    $('#gst').text(' ₹ '+gst.toFixed(2));
                    $('.total').text(' ₹ '+total.toFixed(2));
                }
                $('.total').val(total.toFixed(2));
                if(data.plan.category == "international" || data.plan.category == "International"){
                    $('#registration-submit').text('Register Now  $ '+ total.toFixed(2));
                } else {
                    $('#registration-submit').text('Register Now  ₹ '+ total.toFixed(2));
                }
                ototal();
            });
        } else {
            $('#membership_no_').css('display','none');
            $('#membership_no').prop('required',false);
            $('#doctor_name_').css('display','none');
            $('#doctor_name').prop('required',false);
            $('#country').prop('required',false);
            $('#plan_date_').css('display','none');
            $('#plan_amount_').css('display','none');   
        }
    });
    
    /*
    $(document).on("change","#plan",function() {
        let plan = $(this).val();
        if(plan !=''){
            $.get("{{ url('get-category-detail') }}"+"/"+plan, function(data, status){
                if(data.plan !=''){
                    $('#plan_amount_').css('display','block');
                    $('#plan_amount').css('display','block');
                    
                    $('#plan_amount').val(data.plan.amount);
                    $('#plan_date').val(data.plan.date);
                    $('#plan_amount').attr('readonly', true);
                    
                    $('#plan_name_td').text(data.plan.category+' members amount ');
                    $('#plan_amount_td').text(data.plan.amount);
                    let gst = 0;
                    let total = 0;
                    gst = (parseFloat(data.plan.amount) * 18) / 100;
                    total = (parseFloat(data.plan.amount) + gst);
                    $('#gst_txt').css('display','block');
                    $('#total_txt').css('display','block');
                    $('#gst').text(gst.toFixed(2));
                    $('.total').text(total.toFixed(2));
                    $('.total').val(total.toFixed(2));
                    $('#registration-submit').text('Register Now '+total.toFixed(2));
                } else {
                    $('#plan_amount_').css('display','none');
                    $('#registration-submit').text('Register Now');
                }
            });
        } else {
            $('#gst_txt').css('display','none');
            $('#total_txt').css('display','none');
            $('#plan_amount_').css('display','none');
            $('#registration-submit').text('Register Now');
        }
    });
    */
    
    let category = $('#category').val();
    if(category !=''){
        if(category == "airs-members"){
            $('#membership_no_').css('display','block');
            $('#membership_no').prop('required',true);
            $('#doctor_name_').css('display','none');
            $('#doctor_name').prop('required',false);
        } else if(category == "spouse-accompanying") {
            $('#doctor_name_').css('display','block');
            $('#doctor_name').prop('required',false);
            $('#membership_no_').css('display','none');
            $('#membership_no').prop('required',false);
        } else {
            $('#membership_no_').css('display','none');
            $('#membership_no').prop('required',false);
            $('#doctor_name_').css('display','none');
            $('#doctor_name').prop('required',false);
        }
        
        $.get("{{ url('get-plan-detail') }}"+"/"+category, function(data, status){
            //console.log(data.plan_data);
            $('#plan').empty();
            $('#plan_date_').css('display','block');
            $('#plan').css('display','block');
            $('#plan').text(data.plan.other_date);
            $('#plan_id').val(data.plan.id);
            $('#plan_amount_').css('display','block');
            $('#plan_amount').css('display','block');
            
            let become_airs = 0;
            if($('#become_airs').is(':checked')){
                become_airs = $('#become_airs:checked').val();
                if(category == "non-members" || category == "pg-students" && become_airs.length !=0){
                    become_airs = parseFloat(become_airs);
                    $('#become_airs_td').text('Become a AIRS Member')
                    $('#become_airs_amount_td').text(' ₹ '+become_airs.toFixed(2))
                    $('#become_airs_price').val(become_airs);
                } else {
                    $('#become_airs_td').text('')
                    $('#become_airs_amount_td').text('')
                    $('#become_airs_price').val(0);
                }
            } else {
                $('#become_airs_td').text('')
                $('#become_airs_amount_td').text('')
                $('#become_airs_price').val(0);
            }
            
            if(category == "pg-students" || category == "non-members"){
                $('#become_member').css('display','block');
            } else {
                $('#become_member').css('display','none');
            }
            
            if(data.plan.category == "international" || data.plan.category == "International"){
                $('#plan_amount_p').text(' $ 0');
                $('#dinner_price_data').text('Gala Dinner @if(isset($_GET["category"]) && !empty($_GET["category"]) && $_GET["category"] == "international") {{ isset($dinner->usd_price) && !empty($dinner->usd_price) ? "$ ".$dinner->usd_price.' '.$dinner->text : 0 }}  @else {{ isset($dinner->price) && !empty($dinner->price) ? "₹ ".$dinner->price.' '.$dinner->text : 0 }} @endif');
                
            } else {
                $('#plan_amount_p').text(' ₹ 0');
                $('#dinner_price_data').text('Gala Dinner @if(isset($_GET["category"]) && !empty($_GET["category"]) && $_GET["category"] == "international") {{ isset($dinner->usd_price) && !empty($dinner->usd_price) ? "$ ".$dinner->usd_price.' '.$dinner->text : 0 }}  @else {{ isset($dinner->price) && !empty($dinner->price) ? "₹ ".$dinner->price.' '.$dinner->text : 0 }} @endif');
            }
            
            
            $('#plan_amount').val(0);
            $('#plan_date').val(data.plan.plan_date);
            $('#plan_amount').attr('readonly', true);
            
            $('#plan_name_td').text(data.plan.category+' members amount ');
            if(data.plan.category == "international" || data.plan.category == "International"){
                $('#plan_amount_td').text(' $ 0');
            } else {
                $('#plan_amount_td').text(' ₹ 0');
            }
            let gst = 0;
            let total = 0;
            gst = (parseFloat(0) * 18) / 100;
            total = (parseFloat(0) + gst + parseFloat(become_airs));
            $('#gst_txt').css('display','block');
            $('#total_txt').css('display','block');
            if(data.plan.category == "international" || data.plan.category == "International"){
                $('#gst').text(' $ '+gst.toFixed(2));
                $('.total').text(' $ '+total.toFixed(2));
            } else {
                $('#gst').text(' ₹ '+gst.toFixed(2));
                $('.total').text(' ₹ '+total.toFixed(2));            
            }
            $('.total').val(total.toFixed(2));
            if(data.plan.category == "international" || data.plan.category == "International"){
                $('#registration-submit').text('Register Now  $ '+ total.toFixed(2));
            } else {
                $('#registration-submit').text('Register Now  ₹ '+ total.toFixed(2));
            }
            ototal();
        });
    } else {
        $('#membership_no_').css('display','none');
        $('#membership_no').prop('required',false);
        $('#doctor_name_').css('display','none');
        $('#doctor_name').prop('required',false);
        
        $('#plan_date_').css('display','none');
        $('#plan_amount_').css('display','none');   
    }
    
    /*
    setTimeout(function() {
    
  
    let plan = $("#plan:selected").val();
    if(plan !=''){
        $.get("{{ url('get-category-detail') }}"+"/"+plan, function(data, status){
            if(data.plan !=''){
                $('#plan_amount_').css('display','block');
                $('#plan_amount').css('display','block');
                
                $('#plan_amount').val(data.plan.amount);
                $('#plan_date').val(data.plan.date);
                $('#plan_amount').attr('readonly', true);
                
                $('#plan_name_td').text(data.plan.category+' members amount ');
                $('#plan_amount_td').text(data.plan.amount);
                let gst = 0;
                let total = 0;
                gst = (parseFloat(data.plan.amount) * 18) / 100;
                total = (parseFloat(data.plan.amount) + gst);
                $('#gst_txt').css('display','block');
                $('#total_txt').css('display','block');
                $('#gst').text(gst.toFixed(2));
                $('.total').text(total.toFixed(2));
                $('.total').val(total.toFixed(2));
                $('#registration-submit').text('Register Now '+total.toFixed(2));
            } else {
                $('#plan_amount_').css('display','none');
                $('#registration-submit').text('Register Now');
            }
        });
    } else {
        $('#gst_txt').css('display','none');
        $('#total_txt').css('display','none');
        $('#plan_amount_').css('display','none');
        $('#registration-submit').text('Register Now');
    }
    
    }, 1000);
    
    */
    
});
function razorPay(){
    
    let total_amt = $('#registration-form #total').val();
    let name = $('#registration-form #name').val();
    let email = $('#registration-form #email').val();
    let mobile = $('#registration-form #mobile_hidden').val();
    let address = $('#registration-form #address').val();
    let category = $('#registration-form #category').val();
    let currency = '';
    if(total_amt != 0 || total_amt !=0.00){
        console.log(total_amt);
        total_amt = parseFloat(total_amt) * 100;
        //total_amt = 100 * 100;
        if(category !='' && category == 'international'){
            currency = 'USD';
        } else {
            currency = 'INR';
        }
        var options = {
            "key": "{{ env('RAZORPAY_KEY') }}",
            "amount": total_amt,
            "name": "{{ env('APP_NAME') }}",
            "currency": currency,
            "description": "thank you for choose us ",
            "image": "{{ env('APP_URL').'public/asset/img/favicon.png' }}",
            "prefill": {
                "name": name,
                "email": email,
                "contact": mobile,
            },
            "notes": {
                "address": address
            },
            "theme": {
                "color": "#AD0E60"
            },
            "handler" : function(response) {
                if (typeof response.razorpay_payment_id != 'undefined') {
                    $("#overlay").css('display','block');
                    $("form#registration-form #currency").val(currency);
                    $("form#registration-form #razorpay_payment_id").val(response.razorpay_payment_id);  
                    $("form#registration-form").attr('action', "{{ url('vip-member-form') }}");
                    $("form#registration-form").submit();
                    
                }
                if(typeof response.order_id != 'undefined' || response.error !=''){
                    Swal.fire({
                        title: response.error.code,
                        text: response.error.description,
                        icon: "error"
                    });
                    window.location.href = '{{ url('/') }}';
                }
            },
            "modal": {
                "ondismiss": function () {
                    Swal.fire({
                        title: "Are you sure ?",
                        text: "Do you want to Cancel the Payment ?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#9fd638",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: "Payment Cancel",
                                    text: "Customer was cancel the payment",
                                    icon: "error"
                                });
                                window.location.href = '{{ url('/') }}';
                            } else {
                                $('#payBtn').trigger('click');
                            }
                    });
                }
            }
        };
        //console.log(options);
        var rzp1 = new Razorpay(options);
        document.getElementById('payBtn').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
            
        }
    
        rzp1.on('payment.failed', function(response) {
            event.preventDefault();
            console.log(response);
            Swal.fire({
                title: response.error.code,
                text: response.error.description,
                icon: "error"
            });
            setTimeout(function() {
                window.location.href = '{{ url('/') }}';
            }, 2000);
            //console.log(response.error.code, response.error.description);
        });
    } else {
        $("form#registration-form").attr('action', "{{ url('vip-member-form') }}");
        $("form#registration-form").submit();
    }
}
</script>

@endsection