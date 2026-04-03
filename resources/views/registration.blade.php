@extends('layouts.web')
@section('title_bar', 'Registration | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Registration</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Registration</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
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
<div class="pricing-lan-section-area sp1 d-none">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="heading2 text-center space-margin60">
                    <h5>Registration</h5>
                    <div class="space18"></div>
                    <h2>Register For RHINOCON “2025”
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if(isset($plan) && !empty($plan))
                @foreach($plan as $p)
                
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-boxarea">
                            <h5>{{ $p->name }}</h5>
                            <div class="space20"></div>
                            <ul>
                                @if(isset($p->plan) && !empty($p->plan))
                                    @foreach($p->plan as $plan)
                                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />{!! $plan->other !!}</li>
                                    @endforeach
                                @endif
                            </ul>
                            <div class="space28"></div>
                            <div class="btn-area1">
                                <a href="{{ url('registration-form') }}?category={{$p->slug}}" class="vl-btn1">register</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            
            <!--
            
            <div class="col-lg-4 col-md-6">
                <div class="pricing-boxarea">
                    <h5>AIRS Members</h5>
                    <div class="space20"></div>
                    <ul>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till Apr 31, 2025 - ₹13,500</li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till July 31, 2025 - ₹15,500
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till Oct 31, 2025 - ₹17,500
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />On-Spot Registration - ₹19,500</li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /><s>Combo Offer - Not Applicable</s></li>
                    </ul>
                    <div class="space28"></div>
                    <div class="btn-area1">
                        <a href="{{ url('registration-form') }}" class="vl-btn1">buy a ticket</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="pricing-boxarea">
                    <h5>Non-Members</h5>
                    <div class="space20"></div>
                    <ul>
                         <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till Apr 31, 2025 - ₹15,500</li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till July 31, 2025 - ₹17,500
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till Oct 31, 2025 - ₹19,500
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />On-Spot Registration - ₹21,500</li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Combo Offer - ₹19,500 (₹4,000 Lifetime
                            Membership)
                        </li>
                    </ul>
                    <div class="space28"></div>
                    <div class="btn-area1">
                        <a href="{{ url('registration-form') }}" class="vl-btn1">buy a ticket</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="pricing-boxarea">
                    <h5>PG Students</h5>
                    <div class="space20"></div>
                    <ul>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till Apr 31, 2025 - ₹10,500</li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till July 31, 2025 - ₹12,500
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till Oct 31, 2025 - ₹14,500
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />On-Spot Registration - ₹16,500</li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Combo Offer - ₹14,500 (₹4,000 Lifetime
                            Membership)
                        </li>
                    </ul>
                    <div class="space28"></div>
                    <div class="btn-area1">
                        <a href="{{ url('registration-form') }}" class="vl-btn1">buy a ticket</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="pricing-boxarea">
                    <h5>International</h5>
                    <div class="space20"></div>
                    <ul>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till Apr 31, 2025 - USD 300</li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till July 31, 2025 - USD 350 </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till Oct 31, 2025 - USD 400 </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />On-Spot Registration USD 450</li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Combo Offer - Not Applicable</li>
                    </ul>
                    <div class="space28"></div>
                    <div class="btn-area1">
                        <a href="{{ url('registration-form') }}" class="vl-btn1">buy a ticket</a>
                    </div>
                </div>
            </div>
              <div class="col-lg-4 col-md-6">
                <div class="pricing-boxarea">
                    <h5>Spouse / Accompanying</h5>
                    <div class="space20"></div>
                    <ul>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till Apr 31, 2025 - ₹10,500</li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till July 31, 2025 - ₹12,500
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till Oct 31, 2025 - ₹14,500
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />On-Spot Registration - ₹16,500</li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Combo Offer - Not Applicable</li>

                    </ul>
                    <div class="space28"></div>
                    <div class="btn-area1">
                        <a href="{{ url('registration-form') }}" class="vl-btn1">buy a ticket</a>
                    </div>
                </div>
            </div>
             
            <div class="col-lg-4 col-md-6">
                <div class="pricing-boxarea">
                    <h5>Senior Citizens</h5>
                    <div class="space20"></div>
                    <ul>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till May 15, 2025 - Complimentary</li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till July 15, 2025 - Complimentary </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Till Sept 30, 2025 - Complimentary </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />On-Spot Registration - Complimentary
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Combo Offer - Not Applicable</li>
                    </ul>
                    <div class="space28"></div>
                    <div class="btn-area1">
                        <a href="{{ url('registration-form') }}" class="vl-btn1">buy a ticket</a>
                    </div>
                </div>
            </div>
            -->
        </div>
        @if(isset($dinner) && !empty($dinner) || isset($room_tarrif) && !empty($room_tarrif))    
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="pricing-boxarea">
                    <h5>Faculty cum Paid Dinner
                    </h5>
                    <div class="space20"></div>
                    <div class="row">
                        @if(isset($dinner) && !empty($dinner))
                            @foreach($dinner as $d=>$din)
                            <div class="col-lg-12">
                                <p>{{ ucfirst($din->name) }}</p>
                                <ul>
                                    <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />{{ $din->price.' '.ucfirst($din->text) }}</li>
                                </ul>
                               <!-- <a href="{{ env('APP_URL').'public/galadinner-menu.pdf' }}" class="btn bg-secondary text-white  mt-3" target="_blank"> Download
                                Menu</a>-->
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="space28"></div>
                    <div class="btn-area1">
                        <a href="{{ url('package-dinner') }}" class="vl-btn1">Book Now</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-12">
                <div class="pricing-boxarea">
                    <h5>Gala Dinner
                    </h5>
                    <div class="space20"></div>
                    <div class="row">
                        GALA DINNER _ 29 NOVEMBER  FREE
                    </div>
                    <div class="space28"></div>
                    
                </div>
            </div>
            
            <div class="col-lg-6 col-md-12">
                <div class="pricing-boxarea">
                    <h5>Residential Package</h5>
                    <div class="space20"></div>
                    <div class="row">
                        @if(isset($room_tarrif) && !empty($room_tarrif))
                            @foreach($room_tarrif as $trarrif)
                            <div class="col-lg-12">
                                <p>{{ $trarrif->title }}</p>
                                <ul>
                                    <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> {{ $trarrif->single_bed }}
                                    </li>
                                    <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />{{ $trarrif->double_bed }}
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                           
                        @endif
                    </div>
                    <div class="space28"></div>
                    <div class="btn-area1">
                        <a href="{{ url('package') }}" class="vl-btn1">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(isset($training) && !empty($training))
        <div class="col-lg-6 col-md-6">
			<div class="pricing-boxarea">
				<h5>Hands on Training Courses </h5>
			
				<div class="space20"></div>
				<p class="text-danger"><strong><center class="text-danger">(Only for Indians)</center></strong></p>
					<p><strong><center>(Each course is limited to 20 seats only)</center></strong></p>
				<ul>
				    @foreach($training as $keyt=>$t)
					<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> {{ $t->text }} - ₹{{$t->price}}</li>
					@endforeach
				</ul>
				<div class="space28"></div>
				<div class="btn-area1">
					<a href="{{ url('hands-on-training-courses') }}" class="vl-btn1">Book Now</a>
				</div>
			</div>
		</div>
		@endif
        <div class="reg-guide">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Registration Guidelines</h3>
                    <div class="space20"></div>
                    <h5>1. Eligibility</h5>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Open to all ENT surgeons,
                            otorhinolaryngologists, residents, and medical professionals.
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />International delegates are welcome to
                            register.
                        </li>
                    </ul>
                    <div class="space20"></div>
                    <h5> 2. Registration Fees Include</h5>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Entry to the Conference Venue and Trade
                            Exhibition Arena (Excludes Spouse/Accompanying Persons)
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />Conference/Delegate kit
                        </li>
                    </ul>
                    <div class="space20"></div>
                    <h5> 3. Terms & Conditions</h5>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> GST @18% is excluded in the
                            registration fees
                        </li>
                    </ul>
                    <div class="space20"></div>
                    <h5> 4. Cancellation & Refund Policy (Registration)</h5>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> 25% retention for cancellations
                            received by September 1, 2024
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> 50% retention for cancellations
                            received by October 1, 2024
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> 100% retention for cancellations
                            received after October 31, 2024
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Refunds will be processed via cheques
                            after the conclusion of the conference.
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> All cancellations must be requested via
                            email to the conference secretariat.
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Applicable GST @18% will be deducted
                            before processing the refunds.
                        </li>
                    </ul>
                    <div class="space20"></div>
                    <h5> 5. Additional Registration</h5>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Banquet Registration can be purchased
                            separately at the conference venue
                        </li>
                    </ul>
                    <div class="space20"></div>
                    <h5> 6. Combo Offer</h5>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Non-members and PG students can avail
                            combo offers that include lifetime AIRS membership along with conference registration.
                        </li>
                    </ul>
                    <div class="space20"></div>
                    <h5>7. Payment Methods</h5>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Payments can be made online via
                            credit/debit card or bank transfer.
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Payment details and account information
                            will be provided upon registration.
                        </li>
                    </ul>
                    <div class="space20"></div>
                    <h5> 8. Contact for Registration</h5>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> For queries and assistance with
                            registration, please contact +91 73050 57342
                        </li>
                    </ul>
                    <div class="space20"></div>
                </div>
                
                   <div class="col-lg-6">
                    <h3>Faculty cum Paid Dinner & Residential Package </h3>
                    <div class="space20"></div>
                    <h5>Important Notes</h5>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> 	Faculty cum Paid Dinner Date & Time: 29th November 2025, 19:00 - 23:00 Hrs
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />	Hotel Check-in & Check Out: 27th November 2025 (14:00 Hrs) to 30th November 2025 (12:00 Noon)
                        </li>
                        
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />	Residential Package Inclusions of Accommodation, Buffet Breakfast, Access to Swimming Pool & Gymnasium
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />	Full retention will be charged for non-utilized rooms
                        </li>
                    </ul>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
@endsection