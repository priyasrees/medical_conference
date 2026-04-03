@extends('layouts.web')
@section('title_bar', 'Organizing Committee | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Organizing Committee</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Organizing Committee</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<div class="team10-section-area sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading7 text-center space-margin60">
                    <h5>Members</h5>
                    <div class="space20"></div>
                    <h2 class="text-anime-style-3">Organizing Committee </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/mohan.png' }}" alt="Mohan Kameswaran" />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Prof. Mohan Kameswaran </a>
                        <div class="space10"></div>
                        <p>Patron</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team10-widget-boxarea2 text-center" data-aos="fade-up" data-aos-duration="800">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/dhinakaran.png' }}" alt="Dr. Dhinakaran" />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Dhinakaran </a>
                        <div class="space10"></div>
                        <p>Joint Patron</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="team10-widget-boxarea2 text-center" data-aos="fade-up" data-aos-duration="800">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/ahilasamy.png' }}" alt="Dr. Ahilasamy" />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Ahilasamy </a>
                        <div class="space10"></div>
                        <p>Congress President</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team10-widget-boxarea2 text-center" data-aos="fade-up" data-aos-duration="800">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/anthony.png' }}" alt="Dr. Anthony Irudhaya Rajan " />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Anthony Irudhaya Rajan </a>
                        <div class="space10"></div>
                        <p>Congress Secretary</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team10-widget-boxarea2 text-center" data-aos="fade-up" data-aos-duration="1000">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/rajiniganth.png' }}" alt="Rajiniganth" />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. M. G. Rajiniganth </a>
                        <div class="space10"></div>
                        <p>Congress Treasurer</p>
                    </div>
                </div>
            </div>
             <div class="col-lg-3 col-md-6">
                <div class="team10-widget-boxarea2 text-center" data-aos="fade-up" data-aos-duration="1000">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/janakiram.png' }}" alt="Dr. Janakiram " />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Narayanan Janakiram </a>
                        <div class="space10"></div>
                        <p>Scientific Committee Chairman</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team10-widget-boxarea2 text-center" data-aos="fade-up" data-aos-duration="1000">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/vijaya-krishnan.png' }}" alt="Vijaya Krishnan" />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Vijaya Krishnan </a>
                        <div class="space10"></div>
                        <p>Joint Secretary</p><p class="mt-2">Audio Visual Committee</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team10-widget-boxarea2 text-center" data-aos="fade-up" data-aos-duration="1000">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/raghu.png' }}" alt="Dr. Raghu Nandhan " />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Raghu Nandhan </a>
                        <div class="space10"></div>
                        <p>Joint Treasurer</p>
                    </div>
                </div>
            </div>
           
            
            <div class="col-lg-3 col-md-6">
                <div class="team10-widget-boxarea2 text-center" data-aos="fade-up" data-aos-duration="1200">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/karthi.png' }}" alt="Dr. S. Karthikeyan  " />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. S. Karthikeyan </a>
                        <div class="space10"></div>
                        <p>Registration Committee</p>
                    </div>
                </div>
            </div>
        
            
            <div class="col-lg-3 col-md-6">
                <div class="team10-widget-boxarea2 text-center" data-aos="fade-up" data-aos-duration="1200">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/jegadeesh.png' }}" alt="Dr.L.Jegadeesh Marthandam " />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr.L.Jagadeesh Marthandam </a>
							<div class="space10"></div>
							<p>Travel & Accommodation Committee</p>
                    </div>
                </div>
            </div>
             <div class="col-lg-3 col-md-6">
                <div class="team10-widget-boxarea2 text-center" data-aos="fade-up" data-aos-duration="1200">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/udayakumar.png' }}" alt="Dr.M.UdayaKumar " />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr.M.UdayaKumar </a>
							<div class="space10"></div>
							<p>Reception Committee</p>
							<p class="mt-2">+91 90031 76543</p>
                    </div>
                </div>
            </div>
        </div>
        
         <div class="space80"></div>
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading7 text-center space-margin60">
                    <h2 class="text-anime-style-3">Souvenir  Committee </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="team10-widget-boxarea2 text-center" data-aos="fade-up" data-aos-duration="1200">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/sankar.png' }}" alt="M. N. Shankar  " />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Prof.M. N. Shankar </a>
                        <div class="space10"></div>
                        <p> Souvenir Committe</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/semmanaselvan.png' }}" alt="Semmanaselvan" />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Prof.Dr. K. Semmanaselvan</a>
                        <div class="space10"></div>
                        <p>Souvenir Committee</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
@endsection