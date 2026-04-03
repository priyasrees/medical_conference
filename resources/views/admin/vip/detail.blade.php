@extends('layouts.admin')
@section('title_bar', 'VIP Members Detail')
@section('breadcrumb', 'VIP')
@section('maincontent')
<style>
.payment div, .payment p{
    font-size: 13px;
    font-weight: 500;
    color: black;
}
.student-details img{
    margin-top:10px;
}
</style>

<div class="content-body">
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-xl-8">
                <div class="card h-auto">
                    <div class="card-header p-0">
                        <div class="user-bg w-100">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="user">
                                <div class="user-media">
                                        
                                    <img src="{{ isset($member->profile) && !empty($member->profile) && public_path(str_replace('/public','',$member->profile)) ? env('APP_URL').$member->profile : env('APP_URL').'public/profile-empty-image.webp' }}" alt="" class="avatar avatar-xxl">
                                </div>
                                <div>
                                    <h2 class="mb-0">{{ $member->name }}</h2>
                                    <h5 class="text-primary font-w600">ID - {{ isset($member->membership_no) && !empty($member->membership_no) ? 'RHIN'.'0000'.$member->id : 'RHIN'.'0000'.$member->id }} </h5>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6 mb-3">
                                <ul class="student-details">
                                    <li class="me-2">
                                        <a class="icon-box bg-secondary">
                                        <img src="{{ env('APP_URL').'public/admin_asset/images/profile.svg' }}" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <span>Member Type:</span>
                                        <h5 class="mb-0">{{ strtoupper($member->category) }}</h5>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <ul class="student-details">
                                    <li class="me-2">
                                        <a class="icon-box bg-secondary">
                                        <img src="{{ env('APP_URL').'public/admin_asset/images/svg/location.svg' }}" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <span>City:</span>
                                        <h5 class="mb-0">{{ ucfirst($member->city) }}</h5>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <ul class="student-details">
                                    <li class="me-2">
                                        <a class="icon-box bg-secondary">
                                        <img src="{{ env('APP_URL').'public/admin_asset/images/svg/phone.svg' }}" alt="">
                                        </a>
                                    </li>
                                    <li>
                                       
                                        <span>Phone:</span>
                                        <h5 class="mb-0">{{ isset($member->code) ? $member->code : '' }} {{ ucfirst($member->mobile) }}</h5>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <ul class="student-details">
                                    <li class="me-2">
                                        <a class="icon-box bg-secondary">
                                        <img src="{{ env('APP_URL').'public/admin_asset/images/svg/email.svg' }}" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <span>Email:</span>
                                        <h5 class="mb-0">{{ ucfirst($member->email) }}</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="qrcode text-center mb-2">
                    <img src="{{ env('APP_URL').'public/'.$member->qr_code }}" class="w-100">
                </div>
                <div class="text-center">
                    <a href="{{ env('APP_URL').'public'.$member->path }}" download class="btn btn-primary mb-1 me-1">Download ID Card</a>
                    <a href="{{ env('APP_URL').'public/'.$member->qr_code }}" download class="btn btn-primary mb-1">Download QR</a>
                </div>
            </div>
        </div>
        <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Personal Details</h5>
            </div>
            <div class="card-body">
                <form name="profile_update" id="profile_update" method="POST" action="{{ url('admin/members-update') }}" enctype='multipart/form-data'>
                    @csrf
                    <input readonly type="hidden" name="id" id="id" value="{{ isset($member->id) && !empty($member->id) ? $member->id : '' }}">
                    
                    
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <label class="form-label text-primary">Photo<span
                            class="required">*</span></label>
                        <div class="avatar-upload">
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url({{ isset($member->profile) && !empty($member->profile) && file_exists(public_path(str_replace('/public','',$member->profile))) ? env('APP_URL').$member->profile : env('APP_URL').'public/admin_asset/images/no-img-avatar.png' }});">
                                </div>
                                <span class="bg_image-error"></span>
                            </div>
                            <div class="change-btn mt-2 mb-lg-0 mb-3 d-none">
                                <input readonly type='file' class="form-control d-none" id="profile" name="profile" accept=".png, .jpg, .jpeg" onchange="bgValidation1(this,'.bg_image-error','#imagePreview')">
                                <label for="profile" class="dlab-upload mb-0 btn btn-primary btn-sm">Choose File</label>
                                <a href="javascript:void(0)" class="btn btn-danger light remove-img ms-2 btn-sm" id="profile_image_remove">Remove</a>
                                
                                @if(isset($member->profile) && !empty($member->profile) && file_exists(public_path(str_replace('/public','',$member->profile))))
                                    <input readonly type="hidden" name="profile1" id="profile1" value="{{$member->profile}}"/>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label text-primary">Name<span
                                class="required">*</span></label>
                            <input readonly type="text" class="form-control" id="name" name="name" placeholder="" value="{{isset($member->name) && !empty($member->name) ? $member->name : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label text-primary">Phone Number<span class="required">*</span></label>
                            <input readonly type="number" class="form-control" id="mobile" name="mobile" placeholder="" value="{{isset($member->mobile) && !empty($member->mobile) ? $member->mobile : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="membership_no" class="form-label text-primary">Membership no<span class="required">*</span></label>
                            <input readonly type="text" class="form-control" name="membership_no" id="membership_no" placeholder="" value="{{isset($member->membership_no) && !empty($member->membership_no) ? $member->membership_no : '' }}">
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="row payment">
                        @if(isset($additional_package) && !empty($additional_package))
                            @foreach($additional_package as $package)
                            
                                <div class="col-xl-6 col-sm-6">
                                @if(isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) && $package->gala_dinner_price != 0.00)
                                    <div class="mb-3">
                                        <label for="email" class="form-label text-primary">Gala Dinner<span class="required">*</span></label>
                                        <p>{{isset($package->gala_dinner) && !empty($package->gala_dinner) ? ucfirst($package->gala_dinner) : '' }} </p>
                                    </div>
                                @endif
                                </div>
                                    <div class="col-xl-6 col-sm-6">
                                @if(isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) && $package->room_tarrif_price != 0.00)
                                    <h4 class="text-primary">Residential Package</h4>
                                    <p class="text-primary">{{isset($package->room_tarrif) && !empty($package->room_tarrif) ? ucfirst($package->room_tarrif) : '' }} </p>
                                    @php $room_dates = isset($package->room_dates) && !empty($package->room_dates) ? explode(',',$package->room_dates) : '' @endphp
                                    @foreach($room_dates as $r_date)
                                    {{isset($r_date) && !empty($r_date) ? $r_date : '' }} - 
                                    @endforeach
                                    <br/>No of Days : {{isset($package->no_of_days) && !empty($package->no_of_days) ? $package->no_of_days : 0 }}</p>
                                        @php $person = isset($package->person) && !empty($package->person) ? json_decode($package->person) : [] @endphp
                                        @if(isset($person) && !empty($person))
                                            @foreach($person as $p_key=>$p)
                                                @if($p_key == 0)
                                                <p><span  class="text-primary">{{isset($member->name) && !empty($member->name) ? $member->name : '' }}</span><br/>{{isset($member->mobile) && !empty($member->mobile) ? $member->code.' '.$member->mobile : '' }}</p>
                                                @else
                                                
                                                <p>{{isset($p->name) && !empty($p->name) ? ucfirst($p->name) : '' }}<br/>{{isset($p->mobile_no) && !empty($p->mobile_no) ? $p->mobile_no : '' }}</p>

                                                @endif
                                            @endforeach
                                        @endif
                                         
                                @endif
                              
                                @if(isset($package->training) && !empty($package->training))
                                    <h4 class="text-primary">Training</h4>
                                    <?php $training = explode(',', $package->training); ?>
                                    
                                    @if(isset($training) && !empty($training))
                                        @foreach((array)$training as $t)
                                            <p>{{$t}}</p>
                                        @endforeach
                                    @endif
                                @endif
                                </div>
                            @endforeach
                        @endif

                            
                            
                            
                            <div class="col-xl-6 col-sm-6">

                                <div class="mb-3">
                                    <label for="email" class="form-label text-primary">Email<span
                                        class="required">*</span></label>
                                    <input readonly type="email" class="form-control" id="email" name="email" placeholder=""  value="{{isset($member->email) && !empty($member->email) ? $member->email : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="institute" class="form-label text-primary">Institute<span  class="required">*</span></label>
                                    <input readonly type="text" class="form-control" id="institute" name="institute" placeholder="" value="{{isset($member->institute) && !empty($member->institute) ? $member->institute : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label text-primary">Address<span class="required">*</span></label>
                                    <textarea class="form-control" id="address" name="address" rows="6">{{isset($member->address) && !empty($member->address) ? $member->address : '' }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="diet" class="form-label text-primary">Diet <span class="required">*</span></label>
                                    <select class="form-control" id="diet" name="diet" readonly="">
                                        <option value="veg" @if(isset($member->diet) && !empty($member->diet) && $member->diet == 'veg') selected @endif>Veg</option>
                                        <option value="non-veg" @if(isset($member->diet) && !empty($member->diet) && $member->diet == 'non-veg') selected @endif>Non-veg</option>
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6">
                                
                                <div class="mb-3">
                                    <label for="designation" class="form-label text-primary">Designation<span class="required">*</span></label>
                                    <input readonly type="text" class="form-control" id="designation" name="designation" placeholder="" value="{{isset($member->designation) && !empty($member->designation) ? $member->designation : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="medical-reg" class="form-label text-primary">Medical Reg. No <span class="required">*</span></label>
                                    <input readonly type="text" class="form-control" id="medical-reg" name="medical_reg_no" placeholder="" value="{{isset($member->medical_reg_no) && !empty($member->medical_reg_no) ? $member->medical_reg_no : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="city" class="form-label text-primary">City<span class="required">*</span></label>
                                    <input readonly type="text" class="form-control" id="city" name="city" placeholder="" value="{{isset($member->city) && !empty($member->city) ? $member->city : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="state" class="form-label text-primary">State <span class="required">*</span></label>
                                    <input readonly type="text" class="form-control" id="state" name="state" placeholder="" value="{{isset($member->state) && !empty($member->state) ? $member->state : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="state" class="form-label text-primary">Pincode <span class="required">*</span></label>
                                    <input readonly type="text" class="form-control" id="pincode" name="pincode" placeholder="" value="{{isset($member->pincode) && !empty($member->pincode) ? $member->pincode : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

@php 
    $payment = \App\Models\Payment::where('member_id', $member->id)->get();
@endphp
@if(isset($payment) && !empty($payment))

        <div class="row">
            @foreach($payment as $p)
             @php
            $addition_package = \App\Models\AdditionalPackage::where('payment_id', $p->payment_id)->get();
            @endphp
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0 text-primary">Payment </h4>
                    </div>
                    <div class="card-body">
                        
                            <div class="row payment">
                                <div class="col-lg-6 text-primary">Particulars</div>
                                         <div class="col-lg-6 text-primary custom-list">
                                             
                           &#8226;{{ isset($plan->category) && !empty($plan->category) ? $plan->category : '' }}<br/> Plan Date : {{ isset($plan->plan_date) && !empty($plan->plan_date) ? date("F d, Y", strtotime($plan->plan_date)) : '' }} </li>
                                @foreach($additional_package as $package)
                                     @if(isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) && $package->gala_dinner_price !=0.00 && isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) && $package->room_tarrif_price !=0.00)
                                     <span><br>&#8226;Gala Dinner</span>
                                     
                                     @elseif(isset($package->gala_dinner) && !empty($package->gala_dinner))
                                      <span><br>&#8226; Gala Dinner</span>
                                       @endif
                                      @if(isset($package->room_tarrif) && !empty($package->room_tarrif))
                                      <span><br>&#8226;Room Tarrif - {{ isset($package->room_tarrif) && !empty($package->room_tarrif) ? $package->room_tarrif : '' }}<br/>
                                      <span style="font-size:12px;">
							    @if(isset($package->room_dates) && !empty($package->room_dates))
							        @foreach(explode(',',$package->room_dates) as $dates)
							        {{ trim($dates) }}@if (!$loop->last), @endif
							        @endforeach
							    @endif</span>
                                     @endif
                                @endforeach
                                @if(isset($member->become_aris_member_price) && !empty($member->become_aris_member_price) && $member->become_aris_member_price !=0.00)
                                <span><br>&#8226;Become ARIS Member</span>
                                @endif
                                @if(isset($package->training) && !empty($package->training))
        						@php
                                    $training = explode(',', $package->training);
                                    $prices = \App\Models\Training::whereIn('text', $training)->pluck('price', 'text');
                                @endphp
                                @foreach($training as $index => $trainingName)
                                  @php
                                    $trainingName = trim($trainingName);
                                    $price = isset($prices[$trainingName]) ? (float) $prices[$trainingName] : 0;
                                @endphp
                                    <span><br>&#8226;{{ $trainingName }}</span>
                                 @endforeach
					        	@endif
                                   </div> 
                                <div class="col-lg-6 text-primary">Payment Date </div>
                                <div class="col-lg-6">{{ isset($p->created_at) && !empty($p->created_at) ? date("d M, Y h:i: a", strtotime($p->created_at)) : '' }}</div>
                                <div class="col-lg-6 text-primary">Payment ID </div>
                                <div class="col-lg-6">{{ $p->payment_id }}</div>
                                <div class="col-lg-6 text-primary">Payment Status </div>
                                <div class="col-lg-6">{{ $p->payment_status }}</div>
                                <div class="col-lg-6 text-primary">Payment Message </div>
                                <div class="col-lg-6">{{ $p->payment_message }}</div>
                                <div class="col-lg-6 text-primary">Total </div>
                                <div class="col-lg-6">{{ $p->total }}</div>
                            </div>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>

@endif
@endsection



    </div>
</div>

@section('footer_script')
<script>
$(document).on("click","#profile_image_remove",function() {
    $("#imagePreview").removeAttr('style');
    $("#imagePreview").attr('style', 'background-image: url("{{ env('APP_URL').'public/admin_asset/images/no-img-avatar.png' }}")');
    $("#profile1").val('');
});

</script>
@endsection