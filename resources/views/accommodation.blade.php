@extends('layouts.web')
@section('title_bar', 'Accommodation | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Accommodation</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Accommodation</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
   
<div class="about1-section-area sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h5>Luxury Hotels</h5>
                <div class="space20"></div>
                <div class="pricetable " data-aos="fade-left" data-aos-duration="1000">
                    <div class=" text-center  table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Hotel Name</th>
                                    <th>Single Room (₹)</th>
                                    <th>Double Room (₹)</th>
                                    <th>Distance from Le Meridien</th>
                                    <th>Distance from Airport</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Hotel Hilton</td>
                                    <td>12,000 + Tax</td>
                                    <td>13,000 + Tax</td>
                                    <td>2 Km</td>
                                    <td>4 Km</td>
                                </tr>
                                <tr>
                                    <td>Hotel Trident </td>
                                    <td>10,000 + Tax</td>
                                    <td>12,000 + Tax</td>
                                    <td>3 Km</td>
                                    <td>1 Km</td>
                                </tr>
                                <tr>
                                    <td>Hotel ITC Grand Chola</td>
                                    <td>16,000 + Tax</td>
                                    <td>18,000 + Tax</td>
                                    <td>1 Km</td>
                                    <td>6 Km</td>
                                </tr>
                                <tr>
                                    <td>Hotel Feathers</td>
                                    <td>15,000 + Tax</td>
                                    <td>16,000 + Tax</td>
                                    <td>5 Km</td>
                                    <td>4 Km</td>
                                </tr>
                                <tr>
                                    <td>Hotel Ramada Plaza</td>
                                    <td>7,750 + Tax</td>
                                    <td>8,750 + Tax</td>
                                    <td>1 Km</td>
                                    <td>6 Km</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="space50"></div>
            <div class="col-lg-12">
                <h5>Mid-Range Hotels</h5>
                <div class="space20"></div>
                <div class="pricetable " data-aos="fade-left" data-aos-duration="1000">
                    <div class="  table-responsive text-center">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Hotel Name</th>
                                    <th>Single Room (₹)</th>
                                    <th>Double Room (₹)</th>
                                    <th>Distance from Le Meridien</th>
                                    <th>Distance from Airport</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Hotel Lemon Tree</td>
                                    <td>8,000 + Tax</td>
                                    <td>9,000 + Tax</td>
                                    <td>1 Km</td>
                                    <td>7 Km</td>
                                </tr>
                                <tr>
                                    <td>Hotel Bloom Hub </td>
                                    <td>7,500 + Tax</td>
                                    <td>8,000 + Tax</td>
                                    <td>3 Km</td>
                                    <td>6 Km</td>
                                </tr>
                                <tr>
                                    <td>Hotel Hablis</td>
                                    <td>9,000 + Tax</td>
                                    <td>10,000 + Tax</td>
                                    <td>0.5 Km</td>
                                    <td>3 Km</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="space50"></div>
            <div class="col-lg-12">
                <h5>Budget Hotels</h5>
                <div class="space20"></div>
                <div class="pricetable " data-aos="fade-left" data-aos-duration="1000">
                    <div class="  table-responsive text-center">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Hotel Name</th>
                                    <th>Single Room (₹)</th>
                                    <th>Double Room (₹)</th>
                                    <th>Distance from Le Meridien</th>
                                    <th>Distance from Airport</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Itsy By Treebo Elite Inn</td>
                                    <td>2,100 + Tax</td>
                                    <td>2,900 + Tax</td>
                                    <td>4 Km</td>
                                    <td>13 Km</td>
                                </tr>
                                <tr>
                                    <td>Treebo Trend Rithika Inn </td>
                                    <td>2,300 + Tax</td>
                                    <td>2,900 + Tax</td>
                                    <td>4 Km</td>
                                    <td>10 Km</td>
                                </tr>
                                <tr>
                                    <td>Treebo Trend Nestlay Airport</td>
                                    <td>2,350 + Tax</td>
                                    <td>2,900 + Tax</td>
                                    <td>6 Km</td>
                                    <td>6 Km</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="space50"></div>
            <div class="col-lg-6">
                <div class="reg-guide">
                    <h5>Terms & Conditions</h5>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Taxes GST (5%) and additional taxes
                            apply.
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Cancellation Policy : Luxury &
                            Mid-Range Hotels:30 days prior: 1-night retention. Less than 10 days: Full retention, no
                            refund. Budget Hotels:7 days prior: No retention.Less than 48 hours: Full
                            retention for
                            all nights.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="reg-guide">
                    <h5>Contact</h5>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/mail1.svg' }}" alt="" /><a href="mailto:bala@augustvistas.in"
                            class="text-pink">
                            bala@augustvistas.in </a>
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/world1.svg' }}" alt="" /> <a href="https://augustvistas.in/"
                            class="text-pink" target="_blank">www.augustvistas.in</a> </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/phn1.svg' }}" alt="" /> <a href="tel:++919962569951"
                            class="text-pink">+91 99625
                            69951</a> 
                        </li>
                    </ul>
                </div>
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
@endsection
@section('footer_script')
@endsection