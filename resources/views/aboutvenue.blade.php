@extends('layouts.web')
@section('title_bar', 'About Venue | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>About Venue</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>About Venue</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<div class="about3-section-area sp1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about3-images">
                    <div class="img1" data-aos="zoom-in" data-aos-duration="1000">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/about/about-img7.jpg' }}" alt="Le Royal Meridien" />
                    </div>
                    <div class="img2" data-aos="zoom-in" data-aos-duration="1100">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/about/about-img8.jpg' }}" alt="Le Royal Meridien" />
                    </div>
                    <div class="img3" data-aos="zoom-in" data-aos-duration="1200">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/about/about-img9.jpg' }}" alt="Le Royal Meridien" />
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-header heading7 ">
                    <h5 data-aos="fade-left" data-aos-duration="700">Venue</h5>
                    <div class="space20"></div>
                    <h2 class="text-anime-style-3">Le Royal Meridien, Chennai</h2>
                    <div class="space30"></div>
                    <p data-aos="fade-left" data-aos-duration="900">Once a tiny fishing village, Chennai formerly Madras is now a lively metropolis and the capital of the state of Tamil Nadu. Situated on 3.5 acres of exquisitely landscaped gardens, the architectural wonder of Le Royal Meridien Chennai inspires guests to explore the city's allegiance to ancient traditions. Located between the international airport and the business district, Le Royal Meridien Chennai features meeting and banquet space for up 1,500 guests, five restaurants and bars, a state-of-the-art fitness center and a splendid outdoor pool with whirlpool. A travel desk is in the hotel's lobby that assists guests as they experience the sights of Chennai, including the Marina Beach, temple architecture, a vibrant theater scene and a five week-long Music Season, one of the world's largest cultural events.
                    </p>
                    
                    <div class="space12"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="others-pricing-area sp2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="pricing-heading heading9 text-center space-margin60">
                    <h2 class="text-anime-style-3">Featured Amenities</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" data-aos="fade-right" data-aos-duration="1000">
                <div class="pricing-boarea">
                    <div class="row">
                        <div class="col-lg-3">
                            <ul>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Sustainability</li>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Restaurant </li>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Bar </li>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Fitness Center </li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <ul>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Spa</li>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Outdoor Pool </li>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Gift Shop </li>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Dry Cleaning Service </li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <ul>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Laundry </li>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Room Service </li>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Wakeup calls </li>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Daily Housekeeping </li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <ul>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Turndown Service </li>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Mobile Key </li>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Digital Check In </li>
                                <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Service Request </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="memory1-section-area sp2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="memory-header text-center heading2 space-margin60">
                    <h2 class="text-anime-style-3">Gallery</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="memory-slider-area owl-carousel">
                    <div class="memory-boxarea">
                        <div class="img1 image-anime">
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/room1.jpg' }}" alt="" />
                        </div>
                    </div>
                    <div class="memory-boxarea">
                        <div class="img1 image-anime">
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/room2.jpg' }}" alt="" />
                        </div>
                    </div>
                    <div class="memory-boxarea">
                        <div class="img1 image-anime">
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/room3.jpg' }}" alt="" />
                        </div>
                    </div>
                    <div class="memory-boxarea">
                        <div class="img1 image-anime">
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/room4.jpg' }}" alt="" />
                        </div>
                    </div>
                    <div class="memory-boxarea">
                        <div class="img1 image-anime">
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/room5.jpg' }}" alt="" />
                        </div>
                    </div>
                    <div class="memory-boxarea">
                        <div class="img1 image-anime">
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/room6.jpg' }}" alt="" />
                        </div>
                    </div>
                    <div class="memory-boxarea">
                        <div class="img1 image-anime">
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/room7.jpg' }}" alt="" />
                        </div>
                    </div>
                    <div class="memory-boxarea">
                        <div class="img1 image-anime">
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/room8.jpg' }}" alt="" />
                        </div>
                    </div>
                    <div class="memory-boxarea">
                        <div class="img1 image-anime">
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/room9.jpg' }}" alt="" />
                        </div>
                    </div>
                    <div class="memory-boxarea">
                        <div class="img1 image-anime">
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/room10.jpg' }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
@endsection