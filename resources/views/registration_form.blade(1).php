@extends('layouts.web')
@section('title_bar', 'Registration Form | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Registration Form</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Registration Form</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<style>
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
</style>
<div id="overlay"><div class="cv-spinner"><span class="spinner"></span></div></div>
<div class="contact-inner-section sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="heading2 text-center space-margin60">
                    <h5>Fill up the Form</h5>
                    <div class="space18"></div>
                    <h2>Registration Form </h2>
                </div>
            </div>
        </div>
        <div class="registration ">
            <div class=" contact4-boxarea" data-aos="zoom-in" data-aos-duration="1000">
                <div class="row">
                    <div class="col-lg-8">
                        <form action="javascript:void(0)" name="registration-form" id="registration-form" class="fs-form" method="POST" enctype="multipart/form-data">
                            @csrf
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
                                            <select class="fs-select" id="category" name="category">
                                                <option value="" selected>Choose Category</option>
                                                @if(isset($category) && !empty($category))
                                                    @foreach($category as $c)
                                                    <option value="{{$c->slug}}" @if(isset($_GET['category']) && !empty($_GET['category']) && $_GET['category'] == $c->slug) selected @endif>{{$c->name}}</option>
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
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="fs-field">
                                                    <label class="fs-label" for="gala_dinner"><input class="fs-checkbox" data-gala_dinner_price="{{ isset($dinner->price) && !empty($dinner->price) ? $dinner->price : 0 }}" id="gala_dinner" type="checkbox" name="gala_dinner" value="GALA Dinner" /> <span style="position: relative;top:-6px;left:20px;">Gala Dinner</span></label>
                                                </div>
                                                @if($errors->has('gala_dinner')) <span class="error" > {{ $errors->first('gala_dinner') }} </span> @endif
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="fs-field">
                                                    <label class="fs-label" for="room_tarrif">Room Tarrif</label>
                                                    <label class="fs-label" for="single_bed">
                                                        <input class="fs-radio" id="single_bed" data-room_tarrif_data="single_bed" name="room_tarrif" value="{{ isset($room_tarrif->single_bed_price) && !empty($room_tarrif->single_bed_price) ? $room_tarrif->single_bed_price : 0 }}" type="radio" style="position: relative;top: -29px;left: 100px;" /> <span style="position: relative;top: -35px;left: 110px;">Single Bed</span> 
                                                    </label>
                                                    <label class="fs-label" for="double_bed">
                                                        <input class="fs-radio" id="double_bed" data-room_tarrif_data="double_bed" name="room_tarrif" value="{{ isset($room_tarrif->double_bed_price) && !empty($room_tarrif->double_bed_price) ? $room_tarrif->double_bed_price : 0 }}" type="radio" style="position: relative;top: -64px;left: 230px;"  /> <span style="position: relative;top: -69px;left: 250px;">Double Bed</span> 
                                                    </label>
                                                    <p id="room_tarrif_hint" style="position: relative;top: -64px;font-size:14px;color:#AD0E60;"></p>
                                                </div>
                                                @if($errors->has('room_tarrif')) <span class="error" > {{ $errors->first('room_tarrif') }} </span> @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="membership_no_" style="display:none">
                                        <div class="fs-field">
                                            <label class="fs-label" for="membership_no">Membership No</label>
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
                                            <label class="fs-label" for="name">Name</label>
                                            <input class="fs-input" id="name" name="name" required />
                                        </div>
                                        @if($errors->has('name')) <span class="error" > {{ $errors->first('name') }} </span> @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fs-field">
                                            <label class="fs-label" for="gender">Gender</label>
                                            <select class="fs-select" id="gender" name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        @if($errors->has('gender')) <span class="error" > {{ $errors->first('gender') }} </span> @endif
                                    </div>
                                    <div class="col-lg-4">
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
                                            <label class="fs-label" for="email">Email</label>
                                            <input class="fs-input" id="email" name="email" required />
                                        </div>
                                        @if($errors->has('email')) <span class="error" > {{ $errors->first('email') }} </span> @endif
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fs-field">
                                            <label class="fs-label" for="mobile">Mobile</label>
                                            <input class="fs-input" id="mobile" name="mobile" required onkeypress="return isNumberKey(event,this)"/>
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
                                            <label class="fs-label" for="pincode">Pincode</label>
                                            <input class="fs-input" id="pincode" name="pincode"  onkeypress="return isNumberKey(event,this)" />
                                        </div>
                                        @if($errors->has('pincode')) <span class="error" > {{ $errors->first('pincode') }} </span> @endif
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="fs-field">
                                            <label class="fs-label" for="diet">Diet</label>
                                            <select class="fs-select" id="diet" name="diet">
                                                <option value="veg">Veg</option>
                                                <option value="non-veg">Non-veg</option>
                                            </select>
                                        </div>
                                        @if($errors->has('diet')) <span class="error" > {{ $errors->first('diet') }} </span> @endif
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
                                                <td style="padding:10px;"><span id="gst_txt" style="display:none;font-weight:600;font-size:17px;">GST 18% </span></td>
                                                <td style="padding:10px;"><span id="gst" style="font-weight:600;"></span></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px;"><span id="total_txt"  style="display:none;font-weight:600;font-size:17px;">Total</span></td>
                                                <td style="padding:10px;"><span class="total" style="font-weight:600;color:#AD0E60;font-size:17px;"></span><input id="total" type="hidden" class="total" name="total"/> </td>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                    <input type="hidden" name="gala_dinner_price" id="gala_dinner_price" value="{{ $dinner->price }}">
                                    <input type="hidden" name="gala_dinner_tax" id="gala_dinner_tax" value="0">
                                    
                                    <input type="hidden" name="room_tarrif_txt" id="room_tarrif_txt">
                                    <input type="hidden" name="room_tarrif_price" id="room_tarrif_price">
                                    <input type="hidden" name="room_tarrif_tax" id="room_tarrif_tax">
                                    
                                    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                                    <div class="text-end">
                                        <button class="vl-btn1" type="submit" id="registration-submit">Register Now</button>
                                        <button id="payBtn" style="visibility: hidden;">Pay Now</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
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
<script>
$(document).ready(function(){
    $(document).on("click","#registration-submit",function() {
        $("#registration-form").validate({
            rules: {
                //profile: { required: true, },
                category: { required: true, },
                //membership_no: { required: true, },
                name: { required: true, minlength: 1, maxlength: 100},
                //medical_reg_no: { required: true, minlength: 1, maxlength: 100 },
                //designation: { required: true, minlength: 1, maxlength: 100 },
                //institute: { required: true, minlength: 1, maxlength: 100 },
                mobile: { required: true, number:true, maxlength: 10 },
                email: { required: true, email:true, minlength: 1, maxlength: 100},
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
                mobile: { required: "Mobile Number is required", },
                email: { required: "Email is required", },
                address: { required: "Address is required",  },
                city: { required: "City is required",  },
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
            }
        });
        if ($("form#registration-form").valid()) {
            razorPay();
            $('#payBtn').trigger('click');
            
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
            $('#gala_dinner_amount_td').text('₹ '+ gala_dinner_price);
            $('#gala_dinner_price').val(gala_dinner_price);
        } else {
            
            $('#gala_dinner_td').text('');
            $('#gala_dinner_amount_td').text('');
            $('#gala_dinner_price').val(0);
        }
        ototal();
    });

    function ototal(){
        let plan_amount = 0;
        let gala_dinner = 0;
        let room_tarrif = 0;
        let gst = 0;
        let total = 0;
        
        plan_amount = $('#plan_amount').val();
        gala_dinner = $('#gala_dinner:checked').data('gala_dinner_price');
        room_tarrif = $("input[name='room_tarrif']:checked").val();
        gala_dinner = (typeof gala_dinner == 'undefined') ? 0 : gala_dinner;
        room_tarrif = (typeof room_tarrif == 'undefined') ? 0 : room_tarrif;
        
        
        gst = ((parseFloat(plan_amount) + parseFloat(room_tarrif)) * 18) / 100;
        total = (parseFloat(plan_amount) + parseFloat(gala_dinner) + parseFloat(room_tarrif) +  gst);
        
        $('#gst_txt').css('display','block');
        $('#total_txt').css('display','block');
        $('#gst').text(' ₹ '+gst.toFixed(2));
        $('.total').text(' ₹ '+total.toFixed(2));
        $('.total').val(total.toFixed(2));
        $('#registration-submit').text('Register Now  ₹ '+ total.toFixed(2));
    }
    
    $(document).on("click","input[name='room_tarrif']:checked",function() {
        let room_tarrif = $(this).val();
        let room_tarrif_data = $(this).data('room_tarrif_data');
        $('#room_tarrif_td').text('Room Tarrif');
        $('#room_tarrif_txt').val(room_tarrif_data);
        $('#room_tarrif_amount_td').text('₹ '+room_tarrif);
        $('#room_tarrif_price').val(room_tarrif);
        if(room_tarrif_data == 'single_bed'){
            $('#room_tarrif_hint').text('{{ isset($room_tarrif->single_bed) && !empty($room_tarrif->single_bed) ? $room_tarrif->single_bed : '' }}');    
        } else if(room_tarrif_data == 'double_bed') {
            $('#room_tarrif_hint').text('{{ isset($room_tarrif->double_bed) && !empty($room_tarrif->double_bed) ? $room_tarrif->double_bed : '' }}');
        } else {
            $('#room_tarrif_hint').text('');
        }
        ototal();
    });
    
    $(document).on("change","#category",function() {
        let category = $(this).val();
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
                $('#plan').text(data.plan.other);
                $('#plan_id').val(data.plan.id);
                $('#plan_amount_').css('display','block');
                $('#plan_amount').css('display','block');
                
                
                $('#plan_amount_p').text(' ₹ '+data.plan.amount);
                
                $('#plan_amount').val(data.plan.amount);
                $('#plan_date').val(data.plan.date);
                $('#plan_amount').attr('readonly', true);
                
                $('#plan_name_td').text(data.plan.category+' members amount ');
                $('#plan_amount_td').text(' ₹ '+data.plan.amount);
                let gst = 0;
                let total = 0;
                gst = (parseFloat(data.plan.amount) * 18) / 100;
                total = (parseFloat(data.plan.amount) + gst);
                $('#gst_txt').css('display','block');
                $('#total_txt').css('display','block');
                $('#gst').text(' ₹ '+gst.toFixed(2));
                $('.total').text(' ₹ '+total.toFixed(2));
                $('.total').val(total.toFixed(2));
                $('#registration-submit').text('Register Now  ₹ '+ total.toFixed(2));
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
            $('#plan').text(data.plan.other);
            $('#plan_id').val(data.plan.id);
            $('#plan_amount_').css('display','block');
            $('#plan_amount').css('display','block');
            
            
            $('#plan_amount_p').text(' ₹ '+data.plan.amount);
            
            $('#plan_amount').val(data.plan.amount);
            $('#plan_date').val(data.plan.date);
            $('#plan_amount').attr('readonly', true);
            
            $('#plan_name_td').text(data.plan.category+' members amount ');
            $('#plan_amount_td').text(' ₹ '+data.plan.amount);
            let gst = 0;
            let total = 0;
            gst = (parseFloat(data.plan.amount) * 18) / 100;
            total = (parseFloat(data.plan.amount) + gst);
            $('#gst_txt').css('display','block');
            $('#total_txt').css('display','block');
            $('#gst').text(' ₹ '+gst.toFixed(2));
            $('.total').text(' ₹ '+total.toFixed(2));
            $('.total').val(total.toFixed(2));
            $('#registration-submit').text('Register Now  ₹ '+ total.toFixed(2));
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
    let mobile = $('#registration-form #mobile').val();
    let address = $('#registration-form #address').val();


    total_amt = parseFloat(total_amt) * 100;
    //total_amt = 100 * 100;
    
    var options = {
        "key": "{{ env('RAZORPAY_KEY') }}",
        "amount": total_amt,
        "name": "{{ env('APP_NAME') }}",
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
                $("form#registration-form #razorpay_payment_id").val(response.razorpay_payment_id);  
                $("form#registration-form").attr('action', "{{ url('registration-form') }}");
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
    
}
</script>

@endsection