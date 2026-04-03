@extends('layouts.web')
@section('title_bar', 'Chennai | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Chennai</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Chennai</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
   
<div class="about1-section-area sp1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-imges">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="space30"></div>
                            <div class="img1 reveal image-anime">
                                <img src="{{ env('APP_URL').'public/asset/img/tour/chennai1.jpg' }}" alt="Chennai" class="w-100 h-100" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="space30"></div>
                            <div class="img1 reveal image-anime">
                                <img src="{{ env('APP_URL').'public/asset/img/tour/chennai2.jpg' }}" alt="Chennai" class="w-100 h-100" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="heading2 space-margin20">
                    <h5 data-aos="fade-left" data-aos-duration="700">Day Tour</h5>
                    <div class="space20"></div>
                    <h2 class="text-anime-style-3">Chennai</h2>
                </div>
                <p data-aos="fade-left" data-aos-duration="900">Start a half a day tour visiting Fort St. George,
                    completed in 1653 and today filled with reminders of the past, including St. Mary’s, the first
                    church consecrated on Indian soil.
                    Later visit the National Art Gallery has many excellent bronzes including the famous Chola
                    period bronze Nataraja, the God Shiva, in the cosmic dance pose, then visit the Government
                    Museum (closed on Fridays) which contains sculpture and architecture produced by the Dravidian
                    dynasties.
                    Drive along the Marina Beach , Asia ‘s largest beach .
                </p>
                <p data-aos="fade-left" data-aos-duration="1000">Visit San Thome Basilica - the culmination of the
                    enduring legend of Thomas Didymus, the apostle who doubted and who is believed to have lived and
                    preached on Mylapore’s shores, last visit Mylapore Kapaleshwara temple. Later drop back to your
                    hotel.
                </p>
            </div>
        </div>
        <div class="space60"></div>
        <div class="row">
            <div class="col-lg-6">
                <h5>Price Sheet</h5>
                <div class="space20"></div>
                <div class="pricetable " data-aos="fade-left" data-aos-duration="1000">
                    <div class="  table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Number of Pax</th>
                                    <th>Rates per Person</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01 Pax </t>
                                    <td>INR 3400 + 5% GST</td>
                                </tr>
                                <tr>
                                    <td>02 pax</t>
                                    <td>INR 1700 + 5% GST</td>
                                </tr>
                                <tr>
                                    <td>03 to 05 pax</td>
                                    <td>INR 1500 + 5% GST</td>
                                </tr>
                                <tr>
                                    <td>06 pax to 09 pax </td>
                                    <td>INR 1000 + 5 % GST </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h5>Transport</h5>
                <div class="space20"></div>
                <div class="pricetable " data-aos="fade-left" data-aos-duration="1000">
                    <div class="  table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Number of Pax</th>
                                    <th>Transport</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01 to 02 pax </t>
                                    <td>AC Etios or AC Swift Dzire</td>
                                </tr>
                                <tr>
                                    <td>03 pax to 04 pax</t>
                                    <td>AC Innova</td>
                                </tr>
                                <tr>
                                    <td>05 pax to 09 pax</td>
                                    <td>AC Tempo Traveller (11 seats)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="space60"></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="reg-guide">
                    <h5>Tour Price Includes</h5>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> AC vehicle based on number of guests
                            with toll and parking 
                        </li>
                    </ul>
                </div>
                <div class="space30"></div>
                <div class="reg-guide">
                    <h5>The Tour does not include</h5>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> GST</li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Camera fees at monuments </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Temple darshan fee</li>
                    </ul>
                </div>
            </div>
            <div class="space60"></div>
            <div class="col-lg-6   m-auto">
                <div class="travelinfo text-center  ">
                    <img src="{{ env('APP_URL').'public/asset/img/all-images/team/augustvistas.png' }}" width="130">
                    <div class="space15"></div>
                    <h3>R. Balamurugan</h3>
                    <div class="space10"></div>
                    <p><i>Augustvistas Private Limited</i> </p>
                    <div class="space10"></div>
                    <h4>99625 69951</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
@endsection