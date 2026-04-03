@extends('layouts.web')
@section('title_bar', 'Program at a Glance | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Program at a Glance</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Program at a Glance</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<div class="event-team-area sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="heading7 text-center space-margin60">
                    <h5>Program at a Glance</h5>
                    <div class="space20"></div>
                    <h2 class="text-anime-style-3">Scientific Program </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="event-widget-area">
                    <div class="row">
                        <div class="col-lg-10 m-auto">
                            <div class="event2-boxarea box1">
                                <h1 class="active">01</h1>
                                <div class="row align-items-center">
                                    <div class="col-lg-5">
                                        <div class="img1">
                                            <img src="{{ env('APP_URL').'public/asset/img/all-images/program/pre-conference.jpg' }}" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-6">
                                        <div class="content-area">
                                            <ul>
                                                <li>
                                                    <a href="#"><img src="{{ env('APP_URL').'public/asset/img/icons/clock1.svg' }}" alt="" />9:00
                                                    AM - 12:00 PM </a>
                                                </li>
                                              <!--  <li>
                                                    <a href="#"><img src="{{ env('APP_URL').'public/asset/img/icons/location1.svg' }}"
                                                        alt="" />Madras Medical College </a>-->
                                                </li>
                                            </ul>
                                            <div class="space20"></div>
                                            <a href="#" class="head">Pre-Conference Cadaveric Demonstration</a>
                                            <div class="space20"></div>
                                            <p>Hands-on cadaveric workshop On Sinus and Anterior Skull Base done by  Dr. Narayanan Janakiram
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space48"></div>
                    <div class="row">
                        <div class="col-lg-10 m-auto">
                            <div class="event2-boxarea box1">
                                <h1 class="active">02</h1>
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="content-area">
                                          
                                            <a href="#" class="head">Hands on Training Courses</a>
                                            <p>(Each course is limited to 20 seats only)</p>
                                             <div class="space20"></div>

                                              <ul>
                                                <li>
                                                    <a href="#"><img src="{{ env('APP_URL').'public/asset/img/icons/clock1.svg' }}" alt="" />05.00 pm To 07.00 pm on 28th   Nov 2025 </a>
                                                </li>  
                                            </ul>
                                            <div class="space10"></div>
                                            <p>
                                                <img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Microdebrider Demonstration on sheep head (Xomed)                                            </p>
                                            <p>
                                                <img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Rhinomanometry
                                            </p>
                                            <p>
                                                <img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Allergy Skin Prick Testing
                                            </p>
                                             <div class="space20"></div>
                                              <ul>
                                                <li>
                                                    <a href="#"><img src="{{ env('APP_URL').'public/asset/img/icons/clock1.svg' }}" alt="" />05.00 pm To 07.00 pm on 29th   Nov 2025 </a>
                                                </li>
                                               
                                            </ul>
                                            <div class="space10"></div>
                                             <p>
                                                <img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Facial Trauma
                                            </p>
                                            <p>
                                                <img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Balloon Eustachian Tuboplasty and Sinuplasty
                                            </p>
                                            <p>
                                                <img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Olfaction Testing
                                            </p>
                                        </div>
                                        <div class="space30 d-lg-none d-block"></div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="img1">
                                            <img src="{{ env('APP_URL').'public/asset/img/all-images/program/courses.jpg' }}" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space30"></div>
                    <div class="row">
                        <div class="col-lg-10 m-auto">
                            <div class="event2-boxarea box1">
                                <h1 class="active">03</h1>
                                <div class="row align-items-center">
                                    <div class="col-lg-5">
                                        <div class="img1">
                                            <img src="{{ env('APP_URL').'public/asset/img/all-images/program/scientific-session.jpg' }}"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-6">
                                        
                                        <div class="content-area">
                                            <ul>
                                                 <li>
                                                    <a href="#"><img src="{{ env('APP_URL').'public/asset/img/icons/clock1.svg' }}" alt="" /> 08.00 am To 09.00 am </a>
                                                </li>
                                             
                                            </ul>
                                            <div class="space20"></div>
                                            <a href="#" class="head">Sun rise updates </a>
                                            <div class="space10"></div>
                                            <p> Dr Prahlada N. B </p>
                                            <p><a href="mailto:prahladnb@gmail.com" class="text-dark">prahladnb@gmail.com</a> | <a href="tel:+919342310854" class="text-dark">9342310854</a></p>
                                              <div class="space10"></div>
                                            <p>
                                                <img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> 28th Nov 2025 -  Gross and Endoscopic Anatomy of the Lateral Wall of the Nose.
                                            </p>
                                            <p>
                                                <img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> 29th Nov 2025 – Radiological anatomy and anatomical variations of PNS & Anterior Skull Base.
                                            </p>
                                            <p>
                                                <img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> 30th  Nov 2025 – Imaging findings in Pathology of PNS and Anterior Skull Base.
                                            </p>
                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space60"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
@endsection