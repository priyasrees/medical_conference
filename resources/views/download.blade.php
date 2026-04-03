@extends('layouts.web')
@section('title_bar', 'Downloads Brochure | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Downloads Brochure</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Downloads Brochure</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<div class="choose-section-area sp2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 m-auto">
                <div class="heading2 text-center space-margin60">
                    <div class="space18"></div>
                    <h2>DOWNLOADS</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="choose-widget-boxarea">
                    <div class="icons">
                      <a href="{{ env('APP_URL').'public/asset/img/rhinocon-brochure.pdf' }}" download>  <img src="{{ env('APP_URL').'public/asset/img/icons/pdf.png' }}" alt="" width="50" /></a>
                    </div>
                    <div class="space24"></div>
                    <div class="content-area">
                        <a href="{{ env('APP_URL').'public/asset/img/rhinocon-brochure.pdf' }}" download>Download Brochure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
@endsection