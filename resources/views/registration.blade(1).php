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
<div class="pricing-lan-section-area sp1">
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
                                @if($p->name == 'International')
                                <a href="javascript:void(0)" class="vl-btn1">Coming Soon</a>
                                @else
                                <a href="{{ url('registration-form') }}?category={{$p->slug}}" class="vl-btn1">buy a ticket</a>
                                @endif
                                
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
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="heading2 text-center space-margin60">
                    <h2> Gala Dinner & Residential Package</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if(isset($dinner) && !empty($dinner))
                @foreach($dinner as $d=>$din)
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-boxarea">
                        <h5>{{ ucfirst($din->name) }}</h5>
                        <div class="space20"></div>
                        <ul>
                            <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />{{ ucfirst($din->text) }}
                            </li>
                        </ul>
                        <div class="space28"></div>
                        <div class="btn-area1">
                            <a href="{{ url('package') }}" class="vl-btn1">Book Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            
            @if(isset($room_tarrif) && !empty($room_tarrif))
            <div class="col-lg-8 col-md-12">
                <div class="pricing-boxarea">
                    <h5>Residential Package</h5>
                    <div class="space20"></div>
                    <div class="row">
                        @foreach($room_tarrif as $trarrif)
                        <div class="col-lg-4">
                            <p>{{ $trarrif->title }}</p>
                            <ul>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> {{ $trarrif->single_bed }}
                                </li>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />{{ $trarrif->double_bed }}
                                </li>
                            </ul>
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="space28"></div>
                    <div class="btn-area1">
                        <a href="{{ url('package') }}" class="vl-btn1">Book Now</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="reg-guide">
            <div class="row">
                <div class="col-lg-12">
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
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
@endsection