@extends('layouts.web')
@section('title_bar', 'Faculty cum Paid Dinner & Residential Package')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>@if(Request::path() == 'package-dinner') Faculty cum Paid Dinner @else Residential Package @endif</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>@if(Request::path() == 'package-dinner') Faculty cum Paid Dinner @else Residential Package @endif</span></a>
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
@php
    $price_status = checkRoomPriceLimit();
@endphp
<div id="overlay"><div class="cv-spinner"><span class="spinner"></span></div></div>
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
<div class="contact-inner-section sp1 d-none">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="heading2 text-center space-margin60">
                    <div class="space18"></div>
                    <h2>@if(Request::path() == 'package-dinner') Faculty cum Paid Dinner @else Residential Package @endif</h2>
                </div>
            </div>
        </div>
        <div class="registration ">
            <div class=" contact4-boxarea" data-aos="zoom-in" data-aos-duration="1000">
                <div class="row d-flex justify-content-center">
                    
                    <div class="col-lg-12">
                        <form action="javascript:void(0)" name="package-form" id="package-form" class="fs-form" method="POST" enctype="multipart/form-data">
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
                                            <div class="row align-items-center">
                                    @if(isset($dinner) && !empty($dinner))
                                    <div class="col-lg-6">
										<h5 class="mb-2">Faculty cum Paid Dinner (29/11/2025)</h5>
										<div class="fs-field">
											<label class="fs-label" for="gala_dinner">
											    <input type="hidden" id="gala_dinner_usd_price" data-gala-dinner-usd-price="{{ isset($dinner->usd_price) && !empty($dinner->usd_price) ? $dinner->usd_price : 0 }}">
												<input class="fs-checkbox gala_dinner" name="gala_dinner" id="gala_dinner" type="checkbox" data-gala_dinner_price="{{ isset($dinner->price) && !empty($dinner->price) ? $dinner->price : 0 }}" value="faculty cum paid dinner" required=""/> <span style="position: relative;top: -6px;left: 10px;" id="gala_dinner_text">{{ isset($dinner->price) && !empty($dinner->price) ? $dinner->name.' ₹ '.$dinner->price.' '.$dinner->text : 0 }} </span>
											</label>
										</div>
										<span id="dinner_error"></span>
									</div>
									@endif
									@if ($price_status['is_limit_reached'])
									<div class="col-lg-6">
                                        <span class="text-danger fw-bold fs-5 font-semibold">
                                            🚫 Room selection limit reached! You cannot select more rooms.
                                        </span>
                                        </div>
                                    @else
									@if(isset($room_tarrif) && !empty($room_tarrif))
									<div class="col-lg-6">
									    <h5 class="mb-2">Residential Package</h5>
									    <div class="fs-field">
    										<label class="fs-label"> <input class="fs-radio room_tarrif" name="room_tarrif" data-room_tarrif_data="single_bed" id="single" type="radio" value="{{ isset($room_tarrif->single_bed_price) && !empty($room_tarrif->single_bed_price) ? $room_tarrif->single_bed_price : 0 }}" required="" /><span style="position: relative;top: -6px;left: 10px;" id="single_text">{{ isset($room_tarrif->single_bed) && !empty($room_tarrif->single_bed) ? ucfirst($room_tarrif->single_bed) : '' }} </span></label>
    										<label class="fs-label"> <input class="fs-radio room_tarrif" name="room_tarrif" data-room_tarrif_data="double_bed" id="double" type="radio" value="{{ isset($room_tarrif->double_bed_price) && !empty($room_tarrif->double_bed_price) ? $room_tarrif->double_bed_price : 0 }}" /><span style="position: relative;top: -6px;left: 10px;" id="double_text"> {{ isset($room_tarrif->double_bed) && !empty($room_tarrif->double_bed) ? ucfirst($room_tarrif->double_bed) : '' }}</span></label>
    							        </div>
						            </div>
						            <div class="col-lg-5">
							            <h5 class="mb-2">Select Room Dates</h5>
										<div class="fs-field">
											@if(isset($room_tarrif->no_of_days) && !empty($room_tarrif->no_of_days))
											    @for($i = 0; $i < (int)$room_tarrif->no_of_days; $i++)
											        @php $start_date = date('Y-m-d',strtotime($room_tarrif->start_date)); @endphp
											        @if($i==0)
											        <label class="fs-label" for="room_tarrif_date_{{$i}}" ><input class="fs-checkbox room_tarrif_date" name="room_tarrif_date[]" id="room_tarrif_date_{{$i}}" type="checkbox" value="28 Nov 2025" /> <span style="position: relative;top: -6px;left: 5px;">27 Nov 2:00 PM to 28 Nov 12:00 PM</span> </label>
											        @elseif($i==1)
											        <label class="fs-label" for="room_tarrif_date_{{$i}}" ><input class="fs-checkbox room_tarrif_date" name="room_tarrif_date[]" id="room_tarrif_date_{{$i}}" type="checkbox" value="29 Nov 2025" /> <span style="position: relative;top: -6px;left: 5px;">28 Nov 2:00 PM to 29 Nov 12:00 PM</span> </label>
											        @elseif($i==2)
											        <label class="fs-label" for="room_tarrif_date_{{$i}}" ><input class="fs-checkbox room_tarrif_date" name="room_tarrif_date[]" id="room_tarrif_date_{{$i}}" type="checkbox" value="30 Nov 2025" /> <span style="position: relative;top: -6px;left: 5px;">29 Nov 2:00 PM to 30 Nov 12:00 PM</span> </label>
											        @endif
											    @endfor
											@endif
										</div>
							        </div>
							        @endif
							        <div class="col-lg-7" id="person_stay" style="display:none;">
							            <h5 class="mb-2">Accompanying Person Detail</h5>
							            <div class="row">
							                <div class="col-lg-12 mt-1 mb-1" >
                                                <label class="fs-label" for="register_no_1">Conference Registration Number / For Spouse - Fill it as Spouse</label>
                                                <input class="fs-input" id="register_no_1" name="person[0][register_no]" placeholder="Member ID | Register Number" style="width:100%;"/>
                                            </div>
                                            <div class="col-lg-6 mt-1 mb-1">
                                                <label class="fs-label" for="person_name_1">Person Name</label>
                                                <input class="fs-input" id="person_name_1" name="person[0][name]" style="width:100%;"/>
                                            </div>
                                            <div class="col-lg-6 mt-1 mb-1">
                                                <label class="fs-label" for="person_mobile_1">Person Mobile No</label>
                                                <input class="fs-input" id="person_mobile_1" name="person[0][mobile_no]" style="width:100%;"/>
                                            </div>
                                        </div>
							        </div>
							        <input type="hidden" id="register_no_1" name="person[0][register_no]" placeholder="" style="width:100%"/>
						            <input type="hidden" id="person_name_1" name="person[0][name]" style="width:100%" />
						            <input type="hidden" id="person_mobile_1" name="person[0][mobile_no]"  style="width:100%"/>
						            @endif
                                </div>
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
                                        <table width="100%" id="amount_table">
                                            
                                            <tr>
                                                <td style="padding:10px;"><span id="gala_dinner_td" style="font-weight:600;font-size:17px;" align="right"></span></td>
                                                <td style="padding:10px;"><span id="gala_dinner_amount_td" style="font-weight:600;font-size:17px;"></span></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:10px;"><span id="room_tarrif_td" style="font-weight:600;font-size:17px;"></span></td>
                                                <td style="padding:10px;"><span id="room_tarrif_amount_td" style="font-weight:600;font-size:17px;"></span></td>
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
                                        <button class="vl-btn1" type="submit" id="package-submit">Book Now</button>
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
      $(".room_tarrif_date").slice(0, 3).on('click', function(e) {
         e.preventDefault();
         return false;
      });
    $(document).on("click","#package-submit",function() {
        $("#package-form").validate({
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
             invalidHandler: function(){
                 $(this).find(":input.error:first").focus();
             },
             errorPlacement: function(error,element) {
                 
              if(element.hasClass("room_tarrif_date")) {
                  error.insertAfter(element.closest("label"));
              }
              else if(element.hasClass("room_tarrif")){
                  error.insertAfter(element.closest("label"));
              }
              else if(element.hasClass("gala_dinner")){
                  error.insertAfter(element.closest("label"));
                  
              }
              else{
                  error.insertAfter(element);
              }
             }
        });
        if ($("form#package-form").valid()) {
            let form = $("form#package-form");
            let category = $('#package-form #category').val();
            let total_amt = $('#package-form #total').val();
            let currency = '';
            total_amt = parseFloat(total_amt) * 100;
            //total_amt = 100 * 100;
            if(category !='' && category == 'international'){
                currency = 'USD';
            } else {
                currency = 'INR';
            }
            $("form#package-form #currency").val(currency);
            $("form#package-form").attr('action', "{{ url('package-form') }}");
            $("form#package-form").submit();
            // razorPay();
            // $('#payBtn').trigger('click');
            
            //$("form#package-form").submit();
        }
    });
    
    window.setTimeout(function() {
        $(".error").text('');
    }, 7000);
    
    
    $(document).on("click","#search-btn",function() {
        let search = $('#search').val();
        if(search !='' && search !='undefined'){
            $.get("{{ url('search-members') }}"+"/"+search, function(data, status){
                //console.log(data.member.dinner);
                @if(Request::path() == 'package-dinner')
                if(data.dinner !='0.00'){
                    toastSucess('Faculty cum Paid Dinner has already been purchased.');
                      $("#package-submit").css('display','none');
                //    $("#package-submit").attr('disabled','disabled');
                } else {
                    $("#package-submit").css('display','inline-block');
                  //  $('#package-submit').removeAttr('disabled');
                }
                @else
                //console.log(data, data.room !=0);
                if(data.room !='0.00'){
                    toastSucess(' Room Tarrif has already been purchased.');
                    $("#package-submit").css('display','none');
                    // $("#package-submit").attr('disabled','disabled');
                } else {
                    $("#package-submit").css('display','inline-block');
                 //   $('#package-submit').removeAttr('disabled');
                }
                @endif
                if(data.member.profile != '' && data.member.profile != null){
                    $('#profile_image').attr("src", "{{ url('/') }}"+data.member.profile);    
                }
                else{
                    $('#profile_image').attr("src", "{{ url('/') }}"+'/public/id_card/download.png'); 
                }
                $('#profile_name').text(data.member.name.toUpperCase());
                $('#profile_catergory').text(data.member.category.toUpperCase());
                if(data.member.qr_code != ''){
                    $('#profile_qr_code').attr("src", "{{ url('/') }}/public/"+data.member.qr_code);
                }
                $('#profile_mobile').text(data.member.mobile);
                $('#package-form #member_id').val(data.member.id);
                $('#package-form #name').val(data.member.name);
                $('#package-form #mobile').val(data.member.mobile);$('#package-form #code').val(data.member.code);
                
                $('#package-form #mobile_hidden').val(data.member.code+""+data.member.mobile);
                $('#package-form #email').val(data.member.email);
                $('#package-form #category').val(data.member.category);
                $('#amount_table').hide();
                $("input[name='gala_dinner']").prop("checked", false);
                
                $("input[name='room_tarrif']").prop("checked", false);
                // $('#amount_table tr').each(function() {
                //   $(this).find('td:eq(1)').text("0"); 
                // });
                // if($('.room_tarrif:checked').length > 0){
                //       handleRoomTarrif();
                //       }
                if(data.member.category == 'international'){

                    $('#package-form #gala_dinner_text').text('{{ isset($dinner->usd_price) && !empty($dinner->usd_price) ? $dinner->name." $ ".$dinner->usd_price.' '.$dinner->text : 0 }}');
                    $('#package-form #gala_dinner').attr("data-gala_dinner_price", data.gala_dinner.usd_price);
                    $('#package-form #single_text').text(data.room_tarrif?.single_bed_usd ?? '');
                    $('#package-form #double_text').text(data.room_tarrif?.double_bed_usd ?? '');
                    $('#package-form #single').val(data.room_tarrif?.single_bed_usd_price ?? '');
                    $('#package-form #double').val(data.room_tarrif?.double_bed_usd_price ?? '');
                    if ($('#gala_dinner').is(':checked')) {
                    $('#gala_dinner_amount_td').text('$ '+ data.gala_dinner.usd_price);
                    $('.total').text('$ '+ data.gala_dinner.usd_price);
                    $('#package-submit').text('Book Now  $ '+ data.gala_dinner.usd_price);
                    }

                }
                else {

                    $('#package-form #gala_dinner_text').text('{{ isset($dinner->price) && !empty($dinner->price) ? $dinner->name.' ₹ '.$dinner->price.' '.$dinner->text : 0 }}');
                    $('#package-form #gala_dinner').attr("data-gala_dinner_price", data.gala_dinner.price);
                    $('#package-form #single_text').text(data.room_tarrif?.single_bed ?? '');
                    $('#package-form #double_text').text(data.room_tarrif?.double_bed ?? '');
                    $('#package-form #single').val(data.room_tarrif?.single_bed_price ?? '');
                    $('#package-form #double').val(data.room_tarrif?.double_bed_price ?? '');
                    if ($('#gala_dinner').is(':checked')) {
                    $('#gala_dinner_amount_td').text('₹ '+ data.gala_dinner.price);
                    $('.total').text('₹ '+ data.gala_dinner.price);
                    $('#package-submit').text('Book Now  ₹ '+ data.gala_dinner.price);
                    }
                }
                if($("input[name='gala_dinner']:checked").length == 0){
                     $('#package-submit').text('Book Now');
                }
            });
        } 
    });
    $(document).on("click","#gala_dinner",function() {
        $('#amount_table').show();
        let gala_dinner = $('#gala_dinner:checked').val();
        if($('#gala_dinner').is(':checked')){
            
            let gala_dinner_price = $(this).data('gala_dinner_price');
            let gala_dinner_usd_price = $('#gala_dinner_usd_price').data('galaDinnerUsdPrice');;
            $('#gala_dinner_td').text('Faculty cum Paid Dinner');
            let category = $('#category').val();
          //  console.log("categroy:"+ gala_dinner_usd_price);
            if(category == "international"){
                $('#gala_dinner_amount_td').text('$ '+ gala_dinner_usd_price);
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
        let gala_dinner = 0;let gala_dinner_usd_price = 0;
        let room_tarrif = 0;
        let gst = 0;
        let total = 0;
        
        let category = $('#category').val();
        gala_dinner = $('#gala_dinner:checked').data('gala_dinner_price');
        gala_dinner_usd_price = $('#gala_dinner').is(':checked')
    ? $('#gala_dinner_usd_price').data('galaDinnerUsdPrice')
    : 0;
        
        let room_tarrif_date = new Array();
        $('.room_tarrif_date:checkbox:checked').each(function() {
             room_tarrif_date.push($(this).val());
        });
        room_tarrif = $("input[name='room_tarrif']:checked").val();
        gala_dinner = (typeof gala_dinner == 'undefined') ? 0 : gala_dinner;
        room_tarrif = (typeof room_tarrif == 'undefined') ? 0 : room_tarrif;
        
        
        gst = ((parseFloat(plan_amount) + parseFloat(room_tarrif_date.length * room_tarrif)) * 18) / 100;
        
        
        $('#gst_txt').css('display','block');
        $('#total_txt').css('display','block');
        if(category == "international"){
                    total = (parseFloat(plan_amount) + parseFloat(gala_dinner_usd_price) + parseFloat(room_tarrif_date.length * room_tarrif) +  gst);

            $('#gst').text(' $ '+gst.toFixed(2));
            $('.total').text(' $ '+total.toFixed(2));
        } else {
                    total = (parseFloat(plan_amount) + parseFloat(gala_dinner) + parseFloat(room_tarrif_date.length * room_tarrif) +  gst);

            $('#gst').text(' ₹ '+gst.toFixed(2));
            $('.total').text(' ₹ '+total.toFixed(2));
        }
        
        $('.total').val(total.toFixed(2));
        if(category == "international"){
            $('#package-submit').text('Book Now  $ '+ total.toFixed(2));
        } else {
            $('#package-submit').text('Book Now  ₹ '+ total.toFixed(2));
        }
    }
    
    
    
   $(document).on("change", "input[name='room_tarrif']", handleRoomTarrif);


    
   function handleRoomTarrif(){
    $('#amount_table').show();
    $(".room_tarrif_date").prop('checked', false);

    let $selected = $("input[name='room_tarrif']:checked");
    let room_tarrif = $selected.val();
    let room_tarrif_data = $selected.data('room_tarrif_data');
    let category = $('#category').val();

    $('#room_tarrif_td').text('Room Tarrif');
    $('#room_tarrif_txt').val(room_tarrif_data);

    if(room_tarrif_data == 'single_bed'){
        // Auto check first 3
        $(".room_tarrif_date").slice(0,3).prop('checked', true).css('pointer-events', 'none');;
        $('#person_stay').css('display','none');
        $('#room_tarrif_hint').text('{{ isset($room_tarrif->single_bed) && !empty($room_tarrif->single_bed) ? $room_tarrif->single_bed : '' }}');    
    } else if(room_tarrif_data == 'double_bed') {
        // Auto check first 3 (or change slice as needed)
        $(".room_tarrif_date").slice(0,3).prop('checked', true).css('pointer-events', 'none');;
        $('#person_stay').css('display','block');
        $('#room_tarrif_hint').text('{{ isset($room_tarrif->double_bed) && !empty($room_tarrif->double_bed) ? $room_tarrif->double_bed : '' }}');
    } else {
        $('#room_tarrif_hint').text('');
    }

    //  Recalculate amount same as .room_tarrif_date handler
    let room_tarrif_date = [];
    $('.room_tarrif_date:checkbox:checked').each(function() {
        room_tarrif_date.push($(this).val());
    });

    let totalPrice = room_tarrif_date.length * room_tarrif;

    if(category == "international"){
        $('#room_tarrif_amount_td').text('$ ' + totalPrice);
    } else {
        $('#room_tarrif_amount_td').text('₹ ' + totalPrice);
    }
    $('#room_tarrif_price').val(totalPrice);

    // Mark required fields
    $('.room_tarrif_date').prop('required',true);
    $('#person_name_1').prop('required',true);
    $('#person_mobile_1').prop('required',true);
    $('#person_name_2').prop('required',true);
    $('#person_mobile_2').prop('required',true);

    ototal();
}

    
    // $(document).on("click","input[name='room_tarrif']:checked",function() {
       
    // });
    
    
    $(document).on("click",".room_tarrif_date",function() {
        if($('.room_tarrif_date:checked').is(':checked')){
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
    
    let code = $('#code').val();
    console.log(code+""+mobile_no);

    let category = $('#package-form #category').val();
    let currency = '';
    total_amt = parseFloat(total_amt) * 100;
    //total_amt = 100 * 100;
    if(category !='' && category == 'international'){
        currency = 'USD';
    } else {
        currency = 'INR';
    }
    let mobilecode = code+""+mobile_no;
    console.log(mobilecode);
    var options = {
        "key": "{{ env('RAZORPAY_KEY') }}",
        "amount": total_amt,
        "currency": currency,
        "name": "Rhinocon",
        "description": "thank you for choose us ",
        "image": "{{ env('APP_URL').'public/asset/img/favicon.png' }}",
        "prefill": {
            "name": name,
            "email": email,
            "contact": mobilecode
        },
        "notes": {
            "address": ""
        },
        // "theme": {
        //     "color": "#AD0E60"
        // },
        "handler" : function(response) {
            if (typeof response.razorpay_payment_id != 'undefined') {
                $("#overlay").css('display','block');
                $("form#package-form #currency").val(currency);  
                $("form#package-form #razorpay_payment_id").val(response.razorpay_payment_id);  
                $("form#package-form").attr('action', "{{ url('package-form') }}");
                $("form#package-form").submit();
                
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