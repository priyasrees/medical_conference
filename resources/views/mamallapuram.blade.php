@extends('layouts.web')
@section('title_bar', 'Mamallapuram | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Mamallapuram</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Mamallapuram</span></a>
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
                                <img src="{{ env('APP_URL').'public/asset/img/tour/mamallapuram1.jpg' }}" alt="Mamallapuram"
                                    class="w-100 h-100" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="space30"></div>
                            <div class="img1 reveal image-anime">
                                <img src="{{ env('APP_URL').'public/asset/img/tour/mamallapuram2.jpg' }}" alt="Mamallapuram"
                                    class="w-100 h-100" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="heading2 space-margin20">
                    <h5 data-aos="fade-left" data-aos-duration="700">Day Tour</h5>
                    <div class="space20"></div>
                    <h2 class="text-anime-style-3">Mamallapuram</h2>
                </div>
                <p data-aos="fade-left" data-aos-duration="900">Mahabalipuram - A beautiful beach which consists of
                    a the tiny village by the sea in which all else is dwarfed by a dream world of awesome Tamil
                    art, an open air museum of sculpture in living rock. The piece de resistance is Arjuna’s Penance
                    or the Descent of the Ganga, the world’s largest bas-relief, 764 ft. by 288 ft. (27m by 9m). It
                    is a beautiful composition of hundreds of celestial beings, human and animals all hurrying to a
                    natural rock cleft that divides the giant stone. The best known landmark of Mahabalipuram, is
                    the Shore Temple which has stood by the sea for 12 centuries. Its twin spires are pure poetry in
                    granite.
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
                                    <td>01 to 02 Pax </td>
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
                                    <td>01 to 02 Pax </td>
                                    <td>AC Etios or AC Swift Dzire</td>
                                </tr>
                                <tr>
                                    <td>03 to 05 pax</td>
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