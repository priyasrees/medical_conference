@extends('layouts.web')
@section('title_bar', 'Message | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Message</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Message</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<div class="about6-section-area sp1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="img1 reveal image-anime  text-center">
                            <div class="space20 d-lg-block d-none"></div>
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/team/mohan.png' }}" alt="" />
                        </div>
                        <div class="committee">
                            <div class="text-area text-center">
                                 <a href="javascript:void(0)">Prof. Mohan Kameswaran </a>
                                <div class="space10"></div>
                                <p>Patron</p>
                            </div>
                        </div>
                        <div class="space30 d-md-none d-block"></div>
                          <div class="img1 reveal image-anime  text-center">
                            <div class="space30 d-lg-block d-none"></div>
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
                    <div class="col-lg-6 col-md-6">
                        <div class="img1 reveal image-anime">
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/team/anthony.png' }}" alt="" />
                        </div>
                        <div class="committee">
                            <div class="text-area text-center">
                                <a href="javascript:void(0)">Dr. Anthony Irudhaya Rajan </a>
                                <div class="space10"></div>
                                <p>Congress Secretary</p>
                            </div>
                        </div>
                        <div class="img1 reveal image-anime">
                            <div class="space30"></div>
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
            <div class="col-lg-7">
                <div class="about6-header heading7">
                    <h5 data-aos="fade-left" data-aos-duration="700">Message</h5>
                    <div class="space20"></div>
                    <h2 class="text-anime-style-3">Message from the Organizing Committee</h2>
                    <div class="space16"></div>
                    <p data-aos="fade-left" data-aos-duration="900">Dear Esteemed Colleagues and Friends,<br />
                        As the organizing committee of RHINOCON2025, we ensure that this will be the greatest
                        rhinology meet ever. We promise you an exceptional scientific program, seamless
                        arrangements, and, most importantly, the renowned humble hospitality that South India is
                        known for.
                    </p>
                    <div class="space16"></div>
                    <p data-aos="fade-left" data-aos-duration="1000">RHINOCON2025 will bring together leading minds
                        in rhinology for a platform rich in learning, collaboration, and camaraderie. Expect
                        stimulating keynote lectures, hands-on workshops, and engaging discussions aimed at
                        advancing our specialty.
                    </p>
                    <div class="space16"></div>
                    <p data-aos="fade-left" data-aos-duration="1000">We take great pride in ensuring every aspect of
                        the conference will reflect excellence, from academic sessions to the overall experience.
                        Let this conference be an opportunity to connect, grow, and contribute to the evolving field
                        of rhinology, all while experiencing the warmth and charm of Chennai.<br />We eagerly await
                        your presence and look forward to welcoming you to RHINOCON2025.
                    </p>
                    <div class="space24"></div>
                    <p data-aos="fade-left" data-aos-duration="1000">Warm regards,<br />
                        Organizing Committee<br />
                        RHINOCON2025
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
@endsection