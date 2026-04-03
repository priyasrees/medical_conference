@extends('layouts.web')
@section('title_bar', 'Hands on Training Courses')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Hands on Training Courses</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Hands on Training Courses</span></a>
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
.barcode img
{
    height: 65px;
    width: 65px;
    text-align: center;
    margin: 5px;
}
.barcode{
    text-align: center;
    position: relative;
    top: 10px;
}
</style>
<div class="container d-block">
			<div class="row">
			    <div class="col-lg-12 m-auto">
			        <div class="heading7 text-center space-margin60">
					    
						<div class="space20"></div>

						<h2>Registration Closed</h2>
					</div>
			        
			    </div>
			    </div>
			    </div>
<div id="overlay"><div class="cv-spinner"><span class="spinner"></span></div></div>
<div class="contact-inner-section sp1 d-none">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="heading2 text-center space-margin60">
                    <div class="space18"></div>
                    <h2>Hands on Training Courses
                    <center><h4>Only For Indians</h4></center>
                    </h2>
                </div>
            </div>
        </div>
        <div class="registration ">
            <div class=" contact4-boxarea" data-aos="zoom-in" data-aos-duration="1000">
                <div class="row d-flex justify-content-center">
                    
                    <div class="col-lg-12">
                        <form action="javascript:void(0)" name="traning-form" id="traning-form" class="fs-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="member_id" id="member_id"/>
                            <input type="hidden" name="email" id="email"/>
                            <input type="hidden" name="category" id="category"/>
                            <input type="hidden" name="currency" id="currency"/>
                            <input type="hidden" id="mobile_hidden" name="mobile_hidden" />
                            <input type="hidden" name="mobile" id="mobile"/><input type="hidden" name="code" id="code"/>
                            <fieldset>
                                <div class="row">
                                    
                                    <div class="col-lg-4">
                                        <div class="card" style="border-radius:18px;border:2px solid #AD0E60;">
                                            <div class="card-body">
                                                <div class="col-lg-12 mb-3">
                                                    <img src="{{ env('APP_URL').'public/id_card/download.png' }}" class="image_view preview profile_image" id="profile_image">
                                                </div>
                                                <div class="text-center">
                                                    <h5 id="profile_name">Name</h5>
                                                    <p style="color:lightgrey" id="profile_catergory">Members</p>
                                                    <div class="barcode">
                                        				<img id="profile_qr_code" src="{{ env('APP_URL').'public/id_card/qr sample.png' }}" />
                                        			</div>
                                                    <p class="mt-3 mb-5" id="profile_mobile">+91 00000000</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="col-lg-8">
                                        
                                        <div class="row">
                                            <div class="col-lg-11 mt-3 mb-3">
                                                <label class="fs-label mt-2 mb-2" for="payment_screen_shot" style="color:#AD0E60;"> Email  / Mobile No.</label>
                                                <input class="form-control" type="text" id="search" name="search" placeholder="Registered Email ID / Mobile No.. (without country code)" style="padding:0.775rem .75rem!important;" required="">
                                            </div>
                                            <div class="col-lg-1 mt-3 mb-3">
                                                <a href="javascript:void(0)" class="vl-btn1 mt-4" id="search-btn" style="top:8px!important"><i class="fas fa-search"></i></a>
                                            </div>
                                            
                                            @if(isset($training) && !empty($training))   
                                            <style>
                                                .fs-field {    
                                                    margin-bottom: 10px!important;
                                                }
                                            </style>
                                            <div class="row align-items-center">
            									<h5 class="mb-2">Hands on Training Courses</h5>
                								<div class="col-lg-12">
                								    @foreach($training as $keyt=>$t)
                								    @if($t->join_user < 20)
                									<div class="fs-field">
                										<label class="fs-label" for="{{ 'training_'.$keyt }}">
                											<input class="fs-checkbox training_data" name="training[]" id="{{ 'training_'.$keyt }}" type="checkbox" value="{{ $t->text }}" data-id="{{ $t->id }}" data-price="{{ $t->price }}" data-usd_price="{{ $t->usd_price }}" data-total_user="{{ $t->user }}" data-join_user="{{ $t->join_user }}" required=""/> <span style="position:relative;top:-6px;left:10px;">{{ $t->text }}</span>
                										</label>
                									</div>
                									@endif
                									@endforeach
            									</div>
            								</div>
            								@endif
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
                                    <div class="text-end mb-3">
                                        <table width="100%">
                                            
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
                                    
                                    <input type="hidden" name="room_tarrif_txt" id="room_tarrif_txt" value="">
                                    <input type="hidden" name="room_tarrif_price" id="room_tarrif_price">
                                    <input type="hidden" name="room_tarrif_tax" id="room_tarrif_tax">
                                    
                                    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                                    <div class="text-end">
                                        <button class="vl-btn1" type="submit" id="traning-submit">Book Now</button>
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
    $(document).on("click","#traning-submit",function() {
        $("#traning-form").validate({
            rules: {
                member_id: { required: true, },
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
            },
            errorPlacement: function(error,element){
                if(element.hasClass("training_data")){
                    error.insertAfter(element.closest("label"));
                }
                else{
                    error.insertAfter(element);
                }
            }
        });
        if ($("form#traning-form").valid()) {
            // razorPay();
            // $('#payBtn').trigger('click');
            let form = $("form#traning-form");
            let category = $('#traning-form #category').val();
            let total_amt = $('#traning-form #total').val();
            let currency = '';
            total_amt = parseFloat(total_amt) * 100;
            //total_amt = 100 * 100;
            if(category !='' && category == 'international'){
                currency = 'USD';
            } else {
                currency = 'INR';
            }
            $("form#traning-form #currency").val(currency);
            $("form#traning-form").attr('action', "{{ url('traning-form') }}");
            $("form#traning-form").submit();
            
            //$("form#traning-form").submit();
        }
    });
    
    window.setTimeout(function() {
        $(".error").text('');
    }, 7000);
    
    
    $(document).on("click","#search-btn",function() {
        let search = $('#search').val();
        if(search !='' && search !='undefined'){
            $.get("{{ url('search-members') }}"+"/"+search, function(data, status){
                if(data.member.category == "international"){
                    alert("This service is currently available to Indian members only.");
                    return;
                }
                
                if(data.member.profile != '' && data.member.profile != null){
                    $('#profile_image').attr("src", "{{ url('/') }}"+data.member.profile);    
                }
                $('#profile_name').text(data.member.name.toUpperCase());
                $('#profile_catergory').text(data.member.category.toUpperCase());
                if(data.member.qr_code != ''){
                    $('#profile_qr_code').attr("src", "{{ url('/') }}/public/"+data.member.qr_code);
                }
                $('#profile_mobile').text(data.member.mobile);
                $('#traning-form #member_id').val(data.member.id);
                $('#traning-form #name').val(data.member.name);
                $('#traning-form #mobile').val(data.member.mobile);
                $('#traning-form #code').val(data.member.code);
                $('#traning-form #mobile_hidden').val(data.member.code+""+data.member.mobile);
                $('#traning-form #email').val(data.member.email);
                $('#traning-form #category').val(data.member.category);
                if(data.member.category == 'international'){
                    $('#traning-form #gala_dinner_text').text('{{ isset($dinner->usd_price) && !empty($dinner->usd_price) ? $dinner->name." $ ".$dinner->usd_price.' '.$dinner->text : 0 }}');
                    $('#traning-form #gala_dinner').attr("data-gala_dinner_price", data.dinner.usd_price);
                    $('#traning-form #single_text').text(data.room_tarrif.single_bed_usd);
                    $('#traning-form #double_text').text(data.room_tarrif.double_bed_usd);
                    $('#traning-form #single').val(data.room_tarrif.single_bed_usd_price);
                    $('#traning-form #double').val(data.room_tarrif.double_bed_usd_price);
                } else {
                    $('#traning-form #gala_dinner_text').text('{{ isset($dinner->price) && !empty($dinner->price) ? $dinner->name.' ₹ '.$dinner->price.' '.$dinner->text : 0 }}');
                    $('#traning-form #gala_dinner').attr("data-gala_dinner_price", data.dinner.price);
                    $('#traning-form #single_text').text(data.room_tarrif.single_bed);
                    $('#traning-form #double_text').text(data.room_tarrif.double_bed);
                    $('#traning-form #single').val(data.room_tarrif.single_bed_price);
                    $('#traning-form #double').val(data.room_tarrif.double_bed_price);
                }
            });
        } 
    });
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
            //$('#gala_dinner_amount_td').text('₹ '+ gala_dinner_price);
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
        
        let category = $('#category').val();
        gala_dinner = $('#gala_dinner:checked').data('gala_dinner_price');
        let room_tarrif_date = new Array();
        $('.room_tarrif_date:checkbox:checked').each(function() {
             room_tarrif_date.push($(this).val());
        });
        room_tarrif = $("input[name='room_tarrif']:checked").val();
        gala_dinner = (typeof gala_dinner == 'undefined') ? 0 : gala_dinner;
        room_tarrif = (typeof room_tarrif == 'undefined') ? 0 : room_tarrif;
        
        
        gst = ((parseFloat(plan_amount) + parseFloat(room_tarrif_date.length * room_tarrif)) * 18) / 100;
        total = (parseFloat(plan_amount) + parseFloat(gala_dinner) + parseFloat(room_tarrif_date.length * room_tarrif) +  gst);
        
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
        let sumAmt = 0;
        if(category == "international"){
            training = $('#training:checked').data('usd_price');
            $('.training_data:checkbox:checked').each(function() {
                console.log($(this).data('usd_price'));
                 training_data.push($(this).data('usd_price'));
            });
            
            total_training_price = (1000 * training_data.length);
            total_training_tax = (total_training_price * 18) / 100;
            
            gst = (gst + total_training_tax);
            $('#gst').text(' $ '+gst.toFixed(2));
            $('#training_td').text('Hands on Training Courses');
            $('#training_amount_td').text(' $ '+total_training_price);
            $('#training_td').css('display', 'block');
            $('#training_amount_td').css('display', 'block');
            total = (total_training_price + total_training_tax + total);
        } else {
            //alert('a');
            training = $('#training:checked').data('price');
            $('.training_data:checkbox:checked').each(function() {
                const price = parseFloat($(this).data('price')) || 0;
                training_data.push(price);
                 //training_data.push($(this).data('price'));
                 sumAmt += price;
            });
           
            //total_training_price = (1000 * training_data.length);
            total_training_price = sumAmt;
            total_training_tax = (total_training_price * 18) / 100;
            //console.log(total_training_price,total_training_tax);
            gst = (gst + total_training_tax);
            $('#gst').text(' ₹ '+gst.toFixed(2));
            $('#training_td').text('Hands on Training Courses');
            $('#training_amount_td').text(' ₹ '+total_training_price);
            $('#training_td').css('display', 'block');
            $('#training_amount_td').css('display', 'block');
            total = (total_training_price + total_training_tax + total);
        }
        //console.log(total);
        $('.total').val(total.toFixed(2));
        $('.total').text(total.toFixed(2));
        if(category == "international"){
            $('#traning-submit').text('Book Now  $ '+ total.toFixed(2));
        } else {
            $('#traning-submit').text('Book Now  ₹ '+ total.toFixed(2));
        }
    }
    $('#training_td').css('display', 'none');
    $('#training_amount_td').css('display', 'none');
    $('#training_td').text('');
    $('#training_amount_td').text('');
    
    $(document).on("click",".training_data",function() {
        let training = $(this).val();
        console.log(training.length);
        if(training.length == 0){
            $('#training_td').css('display', 'none');
            $('#training_amount_td').css('display', 'none');
            $('#training_td').text('');
            $('#training_amount_td').text('');
            
        } else {
            
            ototal();
        }
    });
    $(document).on("click","input[name='room_tarrif']:checked",function() {
        $(".room_tarrif_date").prop('checked', false);
        let room_tarrif = $(this).val();
        let room_tarrif_data = $(this).data('room_tarrif_data');
        let category = $('#category').val();
        $('#room_tarrif_td').text('Room Tarrif');
        $('#room_tarrif_txt').val(room_tarrif_data);
        if(category == "international"){
            $('#room_tarrif_amount_td').text('$ '+room_tarrif);
        } else {
            $('#room_tarrif_amount_td').text('₹ '+room_tarrif);
        }
        $('#room_tarrif_price').val(room_tarrif);
        if(room_tarrif_data == 'single_bed'){
            $('#person_stay').css('display','none');
            $('#room_tarrif_hint').text('{{ isset($room_tarrif->single_bed) && !empty($room_tarrif->single_bed) ? $room_tarrif->single_bed : '' }}');    
        } else if(room_tarrif_data == 'double_bed') {
            $('#person_stay').css('display','block');
            $('#room_tarrif_hint').text('{{ isset($room_tarrif->double_bed) && !empty($room_tarrif->double_bed) ? $room_tarrif->double_bed : '' }}');
        } else {
            $('#room_tarrif_hint').text('');
        }
        
        $('.room_tarrif_date').prop('required',true);
        $('#person_name_1').prop('required',true);
        $('#person_mobile_1').prop('required',true);
        $('#person_name_2').prop('required',true);
        $('#person_mobile_2').prop('required',true);
        
        ototal();
    });
    
    $(document).on("click",".room_tarrif_date",function() {
        if($('#room_tarrif_date:checked').is(':checked')){
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
 
    
});
function razorPay(){
    let total_amt = $('#total').val();
    let name = $('#name').val();
    let email = $('#email').val();
    let mobile_no = $('#mobile').val();
    let category = $('#traning-form #category').val();
    let currency = '';
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
        "currency": currency,
        "name": "{{ env('APP_NAME') }}",
        "description": "thank you for choose us ",
        "image": "{{ env('APP_URL').'public/asset/img/favicon.png' }}",
        "prefill": {
            "name": name,
            "email": email,
            "contact": mobile_no
        },
        "notes": {
            "address": ""
        },
        "theme": {
            "color": "#AD0E60"
        },
        "handler" : function(response) {
            if (typeof response.razorpay_payment_id != 'undefined') {
                $("#overlay").css('display','block');
                
                $("form#traning-form #currency").val(currency);  
                $("form#traning-form #razorpay_payment_id").val(response.razorpay_payment_id);  
                $("form#traning-form").attr('action', "{{ url('traning-form') }}");
                $("form#traning-form").submit();
                
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