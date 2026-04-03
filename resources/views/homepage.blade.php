@extends('layouts.web')
@section('title_bar', 'RHINOCON 2025')
@section('breadcrumb')
@endsection
@section('maincontent')
<div class="hero1-section-area">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="1000">
            <img src="{{ env('APP_URL').'public/asset/img/banner/banner1.jpg' }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="2000">
        <img src="{{ env('APP_URL').'public/asset/img/banner/banner2.jpg' }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item"  data-bs-interval="3000">
        <img src="{{ env('APP_URL').'public/asset/img/banner/banner3.jpg' }}" class="d-block w-100" alt="...">
        </div>
    
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
</div>
<div class="about1-section-area sp1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="about-imges">
                    
                    <div class="row">
                         <div class="col-lg-6 col-md-6">
                            <div class="space30"></div>
                            <div class="img1 reveal image-anime text-center">
                                <img src="{{ env('APP_URL').'public/asset/img/all-images/team/mohan.png' }}" alt="" />
                            </div>
                            <div class="committee">
                                <div class="text-area text-center">
                                    <a href="javascript:void(0)">Prof. Mohan Kameswaran </a>
                                    <div class="space10"></div>
                                    <p>Patron</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="space30"></div>
                            <div class="img1 reveal image-anime text-center">
                                <img src="{{ env('APP_URL').'public/asset/img/all-images/team/ahilasamy.png' }}" alt="" />
                            </div>
                            <div class="committee">
                                <div class="text-area text-center">
                                     <a href="javascript:void(0)">Dr. Ahilasamy </a>
                                    <div class="space10"></div>
                                    <p>Congress President</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                 
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="space30"></div>
                            <div class="img1 reveal image-anime text-center">
                                <img src="{{ env('APP_URL').'public/asset/img/all-images/team/anthony.png' }}" alt="" />
                            </div>
                            <div class="committee">
                                <div class="text-area text-center">
                                    <a href="javascript:void(0)">Dr. Anthony Irudhaya Rajan </a>
                                    <div class="space10"></div>
                                    <p>Congress Secretary</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="space30"></div>
                            <div class="img1 reveal image-anime text-center">
                                <img src="{{ env('APP_URL').'public/asset/img/all-images/team/rajiniganth.png' }}" alt="" />
                            </div>
                            <div class="committee">
                                <div class="text-area text-center">
                                    <a href="javascript:void(0)">Dr. M. G. Rajiniganth </a>
                                    <div class="space10"></div>
                                    <p>Congress Treasurer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="about-header-area heading2">
                    <h5 data-aos="fade-left" data-aos-duration="800">Vanakkam!</h5>
                    <div class="space16"></div>
                    <h2 class="text-anime-style-3">RHINOCON 2025</h2>
                    <div class="space16"></div>
                    <p data-aos="fade-left" data-aos-duration="900">As the cultural and medical hub of South India,
                        Chennai takes immense pride in hosting the 36th Annual Conference of the All India Rhinology
                        Society – RHINOCON2025. Known for blending deep-rooted traditions with groundbreaking
                        advancements in healthcare, Chennai offers the perfect setting for this prestigious
                        gathering.
                    </p>
                    <div class="space10"></div>
                    <p data-aos="fade-left" data-aos-duration="900">We are thrilled to invite you to RHINOCON2025,
                        where the brightest minds and dedicated practitioners in rhinology will converge. The city’s
                        unique combination of heritage and cutting-edge medical innovation makes it an inspiring
                        venue for learning, collaboration, and professional growth.
                    </p>
                    <div class="space10"></div>
                    <p data-aos="fade-left" data-aos-duration="900">This conference is not just about academic
                        exchange – it’s about building connections, sharing ideas, and contributing to the
                        continuous progress of rhinological care. Whether you are a seasoned expert or an aspiring
                        ENT specialist, RHINOCON2025 promises to offer invaluable experiences and insights that will
                        shape the future of our field.
                    </p>
                    <div class="space10"></div>
                    <p data-aos="fade-left" data-aos-duration="900">We warmly welcome you to experience Chennai’s
                        unparalleled hospitality and rich cultural fabric as we embark on this journey together.
                        Your participation will undoubtedly make RHINOCON2025 a memorable and successful event.
                    </p>
                    <div class="space30"></div>
                    <div class="btn-area1" data-aos="fade-left" data-aos-duration="1200">
                        <a href="{{ url('registration') }}" class="vl-btn1">Join Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== ABOUT AREA ENDS =======-->
<!--===== PRICING PLAN AREA STARTS =======-->
<div class="pricing-plan-section-area sp2">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-auto">
                <div class="pricingplan heading4 text-center space-margin60">
                    <h5>Step Into the Future of Rhinology</h5>
                    <div class="space18"></div>
                    <h2 class="text-anime-style-3">Join Us!</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="pricing-boxarea">
                    <div class="ticket-box">
                        <p>AIRS Members</p>
                        <div class="space16"></div>
                        <div class="border-bottom-2"></div>
                        <div class="space16"></div>
                        <h3>₹17,500</h3>
                        <div class="space20"></div>
                        <div class="btn-area1">
                            <a href="{{ url('registration') }}" class="vl-btn2"><span class="demo">View all</span><span
                                class="arrow"><i class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="pricing-boxarea">
                    <div class="ticket-box">
                        <p>Non-Members</p>
                        <div class="space16"></div>
                        <div class="border-bottom-2"></div>
                        <div class="space16"></div>
                        <h3>₹19,500</h3>
                        <div class="space20"></div>
                        <div class="btn-area1">
                            <a href="{{ url('registration') }}" class="vl-btn2"><span class="demo">View all</span><span
                                class="arrow"><i class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="pricing-boxarea">
                    <div class="ticket-box">
                        <p>PG Students</p>
                        <div class="space16"></div>
                        <div class="border-bottom-2"></div>
                        <div class="space16"></div>
                        <h3>₹14,500 <span style="font-size:15px; 	animation: blink 1s linear infinite;"  class="blink">Special Rates</span> </h3>
                        <p style="font-size:16px; font-weight:400; text-transform:capitalize">Includes Kits, three days Lunch & Refreshments and excludes Dinner</p>
                        <div class="space20"></div>
                        <div class="btn-area1">
                            <a href="{{ url('registration') }}" class="vl-btn2"><span class="demo">View all</span><span
                                class="arrow"><i class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="pricing-boxarea">
                    <div class="ticket-box">
                        <p>International</p>
                        <div class="space16"></div>
                        <div class="border-bottom-2"></div>
                        <div class="space16"></div>
                        <h3>USD 400</h3>
                        <div class="space20"></div>
                        <div class="btn-area1">
                            <a href="{{ url('registration') }}" class="vl-btn2"><span class="demo">View all</span><span
                                class="arrow"><i class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="pricing-boxarea">
                    <div class="ticket-box">
                        <p>Spouse / Accompanying</p>
                        <div class="space16"></div>
                        <div class="border-bottom-2"></div>
                        <div class="space16"></div>
                        <h3>₹16,500</h3>
                        <div class="space20"></div>
                        <div class="btn-area1">
                            <a href="{{ url('registration') }}" class="vl-btn2"><span class="demo">View all</span><span
                                class="arrow"><i class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
          <!--
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="pricing-boxarea">
                    <div class="ticket-box">
                        <p>Senior Citizens</p>
                        <div class="space16"></div>
                        <div class="border-bottom-2"></div>
                        <div class="space16"></div>
                        <h3>Complimentary</h3>
                        <div class="space20"></div>
                        <div class="btn-area1">
                            <a href="{{ url('registration') }}" class="vl-btn2"><span class="demo">View all</span><span
                                class="arrow"><i class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>
<!--===== PRICING PLAN AREA ENDS =======-->
<!--===== TEAM AREA STARTS =======-->
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
                        <img src="{{ env('APP_URL').'public/asset/img/all-images/team/sankar.png' }}" alt="Dr. M. N. Shankar  " />
                    </div>
                    <div class="text-area">
                        <a href="javascript:void(0)">Dr. M. N. Shankar </a>
                        <div class="space10"></div>
                        <p>Scientific Committee Co-Chairman</p>
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
        </div>
    </div>
</div>
@endsection
@section('footer_script')

@endsection