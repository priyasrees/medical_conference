@extends('layouts.web')
@section('title_bar', 'Contact Us | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Contact Us</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Contact Us</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<div class="contact4-section-area sp1">
    <div class="container">
        <div class="row xalign-items-center">
           <div class="col-lg-4" data-aos="zoom-in" data-aos-duration="1000">
                <div class="xmapouter">
                    <div class="xgmap_canvas">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.4389212826395!2d80.20441904337768!3d13.007697555437803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526741cf7fa17b%3A0x103fe63af5dea43c!2sLe%20Royal%20M%C3%A9ridien%20Chennai!5e0!3m2!1sen!2sin!4v1739443309587!5m2!1sen!2sin" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border-radius:12px"></iframe>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="contact4-header heading7">
                    <h5 data-aos="fade-left" data-aos-duration="800">How to reach</h5>
                    <div class="space18"></div>
                    <h2 class="text-anime-style-3">Connect with Our Team</h2>
                    <div class="space18"></div>
                    <p data-aos="fade-left" data-aos-duration="900">We’re here to help! you have any questions about
                        RHINOCON 2025, need assistance with registration, or want to learn more about.
                    </p>
                    <div class="space12"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-author-box" data-aos="fade-left" data-aos-duration="1100">
                                <div class="icons">
                                    <img src="{{ env('APP_URL').'public/asset/img/icons/phn1.svg' }}" alt="" />
                                </div>
                                <div class="text">
                                    <h4>Call/Message</h4>
                                    <div class="space10"></div>
                                   <a href="tel:+919894948917">+91 9894948917</a> <span>| </span> <a href="tel:+917305057342">+91 7305057342</a>  <span>| </span><a href="tel:+919383272750">+91 9383272750</a> 
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="contact-author-box" data-aos="fade-left" data-aos-duration="1100">
                                <div class="icons">
                                    <img src="{{ env('APP_URL').'public/asset/img/icons/location1.svg' }}" alt="" />
                                </div>
                                <div class="text">
                                    <h4> Harshini Hospital - Secretariat Office</h4>
                                    <div class="space10"></div>
                                    <a href="#">10, Sivagangai Main Road, Sathamangalam, Madurai – 625020</a>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-lg-12">
                            <div class="contact-author-box" data-aos="fade-left" data-aos-duration="1000">
                                <div class="icons">
                                    <img src="{{ env('APP_URL').'public/asset/img/icons/mail1.svg' }}" alt="" />
                                </div>
                                <div class="text">
                                    <h4>Our Email</h4>
                                    <div class="space10"></div>
                                    <a href="mailto:rhinocon2025chennai@gmail.com">rhinocon2025chennai@gmail.com</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="contact-author-box" data-aos="fade-left" data-aos-duration="1100">
                                <div class="icons">
                                    <img src="{{ env('APP_URL').'public/asset/img/icons/location1.svg' }}" alt="" />
                                </div>
                                <div class="text">
                                    <h4>Conference Venue</h4>
                                    <div class="space10"></div>
                                    <a href="#">Le Royal Meridien, Chennai -600016 </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <!--  <div class="col-lg-3" data-aos="zoom-in" data-aos-duration="1000">
                <div class="xmapouter">
                    <div class="xgmap_canvas">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.4389212826395!2d80.20441904337768!3d13.007697555437803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526741cf7fa17b%3A0x103fe63af5dea43c!2sLe%20Royal%20M%C3%A9ridien%20Chennai!5e0!3m2!1sen!2sin!4v1739443309587!5m2!1sen!2sin" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border-radius:12px"></iframe>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>
<div class="space100 d-lg-block d-none"></div>
<div class="space50 d-lg-none d-block"></div>
@endsection
@section('footer_script')
@endsection