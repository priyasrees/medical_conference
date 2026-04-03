@extends('layouts.web')
@section('title_bar', 'AIRS Executive Committee | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>AIRS Executive Committee</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>AIRS Executive Committee</span></a>
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
                    <h2 class="text-anime-style-3">AIRS Executive Committee </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/rohit-sharma.png' }}" alt="Dr. Rohit Sharma" />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr Rohit Sharma </a>
                        <div class="space10"></div>
                        <p>President </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/ajay.png' }}" alt="Dr. Ajay Jain " />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Ajay Jain </a>
                        <div class="space10"></div>
                        <p>Hony Secretary </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/sanjeev.png' }}" alt="Dr. Sanjeev Arora " />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Sanjeev Arora </a>
                        <div class="space10"></div>
                        <p>Hony Treasurer </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/mohnish.png' }}" alt="Dr. Mohnish Grover" />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Mohnish Grover </a>
                        <div class="space10"></div>
                        <p>President (Delhi)</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/rahul.png' }}" alt="Dr. Rahul Aggarwal" />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Rahul Aggarwal</a>
                        <div class="space10"></div>
                        <p>Vice President (Delhi)</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/anuragini.png' }}" alt="Dr. Anuragini Gupta" />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Anuragini Gupta </a>
                        <div class="space10"></div>
                        <p>Joint Secretary (Chandigarh)</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="img1 image-anime">
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/bachi.png' }}" alt="Dr Bachi Hathiram " />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr Bachi Hathiram </a>
                        <div class="space10"></div>
                        <p>Past President (Mumbai)</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="space80"></div>
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading7 text-center space-margin60">
                    <h2 class="text-anime-style-3">Zonal Coordinator </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <p>North </p>
                        <div class="space10"></div>
                        <a href="javascript:void(0)">Dr. Gaurav Gupta </a>
                        <div class="space10"></div>
                        <p>Bikaner </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <p>East </p>
                        <div class="space10"></div>
                        <a href="javascript:void(0)">Dr. Shruti Baruah </a>
                        <div class="space10"></div>
                        <p>Guwahati </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <p>West </p>
                        <div class="space10"></div>
                        <a href="javascript:void(0)">Dr. Vikram Khanna </a>
                        <div class="space10"></div>
                        <p>Mumbai </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <p>South </p>
                        <div class="space10"></div>
                        <a href="javascript:void(0)">Dr. Ahilasamy </a>
                        <div class="space10"></div>
                        <p>Chennai </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="space80"></div>
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading7 text-center space-margin60">
                    <h2 class="text-anime-style-3">Governing Body Members </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Suresh Kumar M</a>
                        <div class="space10"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Amit Kumar Rana</a>
                        <div class="space10"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Monika Sood</a>
                        <div class="space10"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Satyawati Mohindra</a>
                        <div class="space10"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Vijay Rangachari</a>
                        <div class="space10"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Dharmendra Kumar</a>
                        <div class="space10"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Munish Kumar Saroch</a>
                        <div class="space10"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Shantanu Panja</a>
                        <div class="space10"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1200">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Gaurav Khandelwal</a>
                        <div class="space10"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1200">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. Neha Sharma</a>
                        <div class="space10"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space80"></div>
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading7 text-center space-margin60">
                    <h2 class="text-anime-style-3">Nominated Members </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1400">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr.Gopika Kalsotra </a>
                        <div class="space10"></div>
                        <p> </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1400">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr.M.G.Rajiniganth </a>
                        <div class="space10"></div>
                        <p>Madurai (TN) </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="space80"></div>
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading7 text-center space-margin40">
                    <h2 class="text-anime-style-3">Chairman Editorial Board </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1400">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr.Sanjay Sood </a>
                        <div class="space10"></div>
                        <p>Delhi </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="space80"></div>
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading7 text-center space-margin40">
                    <h2 class="text-anime-style-3">Editor in Chief</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1400">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr.Ashok Gupta Gupta </a>
                        <div class="space10"></div>
                        <p>Chandigarh </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="space80"></div>
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading7 text-center space-margin60">
                    <h2 class="text-anime-style-3">Editorial Board Members </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1400">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr.Karan Sharma </a>
                        <div class="space10"></div>
                        <p>Amritsar </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1400">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr.Ravi Meher </a>
                        <div class="space10"></div>
                        <p>Delhi </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1400">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr.Rijuneeta </a>
                        <div class="space10"></div>
                        <p>Chandigarh </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1400">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr.Divya Aggarwal</a>
                        <div class="space10"></div>
                        <p>Delhi </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="space80"></div>
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading7 text-center space-margin40">
                    <h2 class="text-anime-style-3">Website Editors</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1800">
                <div class="team10-widget-boxarea2 text-center">
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr.Ajay Jain</a>
                        <div class="space10"></div>
                        <p>Delhi </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
@endsection