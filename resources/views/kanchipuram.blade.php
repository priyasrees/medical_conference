@extends('layouts.web')
@section('title_bar', 'Kanchipuram | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Kanchipuram</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Kanchipuram</span></a>
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
                                <img src="{{ env('APP_URL').'public/asset/img/tour/kanchipuram1.jpg' }}" alt="Kanchipuram" class="w-100 h-100" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="space30"></div>
                            <div class="img1 reveal image-anime">
                                <img src="{{ env('APP_URL').'public/asset/img/tour/kanchipuram2.jpg' }}" alt="Kanchipuram" class="w-100 h-100" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="heading2 space-margin20">
                    <h5 data-aos="fade-left" data-aos-duration="700">Day Tour</h5>
                    <div class="space20"></div>
                    <h2 class="text-anime-style-3">Kanchipuram</h2>
                </div>
                <p data-aos="fade-left" data-aos-duration="900">Kanchipuram known as the Golden City is one of the
                    seven holy cities of India. It was the capital of the major Dravidian kingdoms (Pallava, Chola).
                    There are no fewer than 125 temples. The town now has 200,000 inhabitants and its economy is
                    based on tourism and silk weavers who made his reputation in the field. The two main currents of
                    Hinduism, Shaivism and Vishnuism are represented equally. During the visit, you can admire the
                    temples of Ekambareshwasar, Kailashnathar and Vaikunthaperumal. 
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
                                    <td>01 to 02 Pax </t>
                                    <td>INR 5000 + 5% GST</td>
                                </tr>
                                <tr>
                                    <td>03 to 05 pax</t>
                                    <td>INR 2400 + 5% GST</td>
                                </tr>
                                <tr>
                                    <td>06 to 09 pax</td>
                                    <td>INR 1600 + 5% GST</td>
                                </tr>
                                <tr>
                                    <td>30 Pax together by Ac Coach </td>
                                    <td>INR 700 + 5 % GST </td>
                                </tr>
                                <tr>
                                    <td>Lunch </td>
                                    <td>INR 1500 Per Person </td>
                                    <td></td>
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
                                    <td>01 to 02 Pax </t>
                                    <td>AC Etios or AC Swift Dzire</td>
                                </tr>
                                <tr>
                                    <td>03 to 05 pax</t>
                                    <td>AC Innova Crysta</td>
                                </tr>
                                <tr>
                                    <td>06 to 09 pax</td>
                                    <td>AC Tempo Traveller (12 seats)</td>
                                </tr>
                                <tr>
                                    <td>30 Pax together by Ac Coach </td>
                                    <td>Ac Coach 35 Seater </td>
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
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Entrances fee for monument visit
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Guide Charges Included only for Ac
                            coach
                            35 seater 
                        </li>
                    </ul>
                </div>
            </div>
            <div class="space40"></div>
            <h5>The Tour does not include</h5>
            <div class="col-lg-6">
                <div class="reg-guide">
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> GST</li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Camera fees at monuments </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Temple darshan fee</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="reg-guide">
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Transportation other than specified
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Extra running of the transport other
                            than specified 
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> English speaking guide Charges </li>
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