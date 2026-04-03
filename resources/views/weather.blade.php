@extends('layouts.web')
@section('title_bar', 'Weather | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Weather</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Weather</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<div class="about4-section-area sp1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-images">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="img1 image-anime reveal">
                                <img src="{{ env('APP_URL').'public/asset/img/all-images/weather1.jpg' }}" alt="" />
                            </div>
                            <div class="space30"></div>
                            <div class="content-box">
                                <div class="space12"></div>
                                <h6>Weather</h6>
                                <div class="space6"></div>
                                <ul>
                                    <li>
                                        <a href="#"> Temperature: 24°C to 30°C </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="space44"></div>
                            <div class="img1 image-anime reveal">
                                <img src="{{ env('APP_URL').'public/asset/img/all-images/weather2.jpg' }}" alt="" />
                            </div>
                            <div class="space30"></div>
                            <div class="img1 image-anime reveal">
                                <img src="{{ env('APP_URL').'public/asset/img/all-images/weather3.jpg' }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-header heading7 ">
                    <h5 data-aos="fade-left" data-aos-duration="700">Weather</h5>
                    <div class="space20"></div>
                    <h2 class="text-anime-style-3">Weather in Chennai – End of November 2025</h2>
                    <div class="space16"></div>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />
                            Chennai welcomes you in late November with pleasant tropical weather — a perfect blend
                            of warmth and comfort.
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Humidity: Moderately high, typical of
                            coastal cities 
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Rain: Occasional light showers, as the
                            monsoon season tapers off 
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Breeze: Gentle sea breeze keeps the
                            evenings soothing 
                        </li>
                    </ul>
                    <div class="space30"></div>
                    <h5 data-aos="fade-left" data-aos-duration="700">What to Wear</h5>
                    <div class="space20"></div>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />
                            Stay comfortable and stylish throughout RHINOCON2025
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Lightweight cotton or linen outfits –
                            breathable and ideal for the warm climate
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Casuals for sight seeing </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> A light shawl or stole – handy for
                            air-conditioned halls 
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Compact umbrella or raincoat – just in
                            case of a drizzle
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Comfortable footwear – suitable for
                            walking around the venue and exploring Chennai
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