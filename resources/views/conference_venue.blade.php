@extends('layouts.web')
@section('title_bar', 'Conference Venue | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Conference Venue</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Conference Venue</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<div class="about3-section-area sp2">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-5">
					<div class="xabout3-images">

						<div class="img1" data-aos="zoom-in" data-aos-duration="1000">
							<img src="{{ env('APP_URL').'public/asset/img/rhinocon-eventhall.jpg' }}" alt="Le Royal Meridien" />
						</div>

					</div>
				</div>
				<div class="col-lg-7">

					<div class="about-header heading7 ">
						<h5 data-aos="fade-left" data-aos-duration="700">Explore Our Interactive Stalls</h5>
						<div class="space20"></div>
						<h2 class="text-anime-style-3">Rhinocon 2025</h2>
						<div class="space30"></div>
						<p data-aos="fade-left" data-aos-duration="900">Discover innovation and creativity at every
							corner of Rhinocon 2025! Our event features a wide array of themed stalls showcasing
							cutting-edge products, industry-leading solutions, and immersive experiences from top brands
							and emerging creators. Whether you're looking to network, learn, or simply explore, our
							stalls offer something for everyone. Dive into demonstrations, exclusive launches, and
							engaging activities—all under one roof.


						</p>
						<div class="space18"></div>



					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('footer_script')
@endsection