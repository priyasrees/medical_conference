@extends('layouts.web')
@section('title_bar', 'Abstracts | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Abstracts</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Abstracts</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<div class="others-pricing-area sp2">
		<div class="container">
			<div class="row">
			    <div class="col-lg-12 m-auto d-none">
			        <div class="heading7 text-center space-margin60">
					    
						<div class="space20"></div>

						<h2>Registration Closed</h2>
					</div>
			        
			    </div>
				<div class="col-lg-6 m-auto d-block">
					<div class="heading7 text-center space-margin60">
					    	<h5>The deadline for abstract submission is November 10</h5>
					    		<div class="space20"></div>


						<h5>ABSTRACTS </h5>
						<div class="space20"></div>

						<h2>Abstract Submission</h2>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6 col-md-6" data-aos="fade-right" data-aos-duration="1000">
					<div class="abstract-area">
						<h3>Dr.I.S.Gupta Award presentation for Senior Consultant</h3>
						<div class="space12"></div>
						<a href="javascript:void(0)"><img src="{{ env('APP_URL').'public/asset/img/icons/clock1.svg' }}" alt="" /> 12 minutes</a>
						<div class="space12"></div>
						<p>Eligibility: More than 10 years experience after post graduation
						</p>
						<div class="space20"></div>
						<h5>Instructions :</h5>
						<ul>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Open to AIRS Members For Winning Price only 
							</li>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> More than 40 years of age Age proof to
								be furnished along with the abstract
							</li>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Abstract should not be more than 200
								words
							</li>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Abstract should be formatted in MS
								Word; Times New Roman Font and Font size 12 Pt
							</li>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Abstract should be under the following
								Headings Title, Presenting Author, Aim, Methodology, Results and Conclusions
							</li>

						</ul>
						<div class="space28"></div>
						<div class="btn-area1">
							<a href="{{ url('abstract-form') }}" class="vl-btn1 text-white">Apply</a>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-md-6" data-aos="fade-left" data-aos-duration="900">
					<div class="abstract-area">
						<h3>Mrs.Neena Saharia Award presentation for Junior Consultant
						</h3>
						<div class="space12"></div>
						<a href="javascript:void(0)"><img src="{{ env('APP_URL').'public/asset/img/icons/clock1.svg' }}" alt="" /> 10 minutes</a>
						<div class="space12"></div>
						<p>Eligibility: Less than 10 years experience after post graduation
						</p>

						<div class="space20"></div>
						<h5>Instructions :</h5>
						<ul>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Open to AIRS Members for winning only </li>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Less than 40 years of age Age proof to
								be furnished along with the abstract
							</li>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Abstract should not be more than 200
								words
							</li>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Abstract should be formatted in MS
								Word; Times New Roman Font and Font size 12 Pt

							</li>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Abstract should be under the following
								Headings Title, Presenting Author, Aim, Methodology, Results and Conclusions
							</li>

						</ul>
						<div class="space28"></div>
						<div class="btn-area1">
							<a href="{{ url('abstract-form') }}" class="vl-btn1 text-white">Apply</a>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-md-6" data-aos="fade-left" data-aos-duration="800">
					<div class="abstract-area">
						<h3>Dr. Adesh Saxena and Dr.Mita Saxena Award presentation for Post Graduate
						</h3>
						<div class="space12"></div>
						<a href="javascript:void(0)"><img src="{{ env('APP_URL').'public/asset/img/icons/clock1.svg' }}" alt="" /> 8 minutes</a>
						<div class="space12"></div>
						<p>Eligibility: Post Graduate </p>

						<div class="space20"></div>
						<h5>Instructions :</h5>
						<ul>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Open to AIRS Members for winning only
							</li>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Only Original work in Rhinology is
								advised. Winner will receive medel and certificate.
							</li>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Bonafide Certificate from the HOD of
								the Dept. to be attached with the Abstract
							</li>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Abstract should not be more than 200
								words
							</li>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Abstract should be formatted in MS
								Word; Times New Roman Font and Font size 12 Pt
							</li>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Abstract should be under the following
								Headings Title, Presenting Author, Aim, Methodology, Results and Conclusions
							</li>
						</ul>
						<div class="space28"></div>
						<div class="btn-area1">
							<a href="{{ url('abstract-form') }}" class="vl-btn1 text-white">Apply</a>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-md-6" data-aos="fade-left" data-aos-duration="700">
					<div class="abstract-area">
						<h3>Dr. Arvind Soni Award - Video Session
						</h3>
						<div class="space12"></div>
						<h5>Instructions :</h5>
						<ul>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Surgical video presentations, 5 minutes
							</li>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Audio should be incorporated into the
								video (no Powerpoint presentations)
							</li>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Must be an AIRS member
							</li>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Best video winner will receive a medal
								and certificate
							</li>


						</ul>
						<div class="space28"></div>
						<div class="btn-area1">
							<a href="{{ url('abstract-form') }}" class="vl-btn1 text-white">Apply</a>
						</div>
					</div>
					<div class="abstract-area">
						<h3>Dr. Anoop Raj Award - Poster Session
						</h3>
						<div class="space12"></div>
						<h5>Instructions :</h5>
						<ul>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Competitive session with posters
								displayed in a designated gallery or as e-posters.
							</li>
							<li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> The best poster winner will receive a
								medal and certificate
							</li>
						</ul>
						<div class="space28"></div>
						<div class="btn-area1">
							<a href="{{ url('abstract-form') }}" class="vl-btn1 text-white">Apply</a>
						</div>
					</div>
				</div>
			</div>




		</div>
	</div>
<div class="others-pricing-area sp2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading7 text-center space-margin60">
                    <h5>ABSTRACTS</h5>
                    <div class="space20"></div>
                    <h2>Abstract Guidelines</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="pricing-boarea">
                    <h3>Submission Guidelines</h3>
                    <div class="space24"></div>
                    <ul>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Category of abstract - Rhinology and
                            Skull Base
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> The structured abstract should be of a
                            minimum 300 words for all sessions
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> The abstract must be original and
                            should not have been published
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> The already presented paper will not be
                            accepted
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> No proxy presentation is allowed</li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Registration of participants is a must
                            for participation
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> The last date for abstract submission
                            is
                            10th November 2025
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> The matter presented can be used by the
                            All India Rhinology Society for its journal or YouTube channel
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Anyone can participate in more than one category but only one Abstract in each category
                        </li>
                        
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Participation and Presentations are open to all registered conference attendees. Please note, only those who have registered as AIRS members will be eligible for award consideration.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6" data-aos="fade-left" data-aos-duration="1000">
                <div class="pricing-boarea ">
                    <h3>Guidelines for Awards Papers</h3>
                    <div class="space24"></div>
                    <h4>For Sr. Consultant & Jr. Consultants:</h4>
                    <div class="space8"></div>
                    <ul>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Duration of presentation: 10 mins</li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Discussion Time: 2 mins
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" />
                        The abstract must be original and should not have been published.
                        Last date of submission is 10th November 2025
                        <!--The abstract must be original and-->
                        <!--    should not have been published Last date of submission is 15th October 2025 Should be-->
                        <!--    preregistered for the conference Structured abstract should be submitted-->
                        </li>
                    </ul>
                    <h4 class="mt-3"> For Residents:</h4>
                    <div class="space8"></div>
                    <ul>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Duration of presentation: 8 mins</li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Discussion Time: 2 mins
                        </li>
                        <li><img src="{{ env('APP_URL').'public/asset/img/icons/check4.svg' }}" alt="" /> Should be with the permission of the
                            HOD
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" data-aos="fade-right" data-aos-duration="1000">
                <h4>Please Note</h4>
                <div class="space20"></div>
                <p>Should the presentation contain extracts or other material from other copyright works, the
                    presenter should obtain from the owners of the respective copyrights written permission to
                    reproduce such extracts or other material in the presentation. In case a patient's clinical
                    photographs are used, the presenter should have written permission from the patient to use those
                    in the presentation. The responsibility for use of such material is solely the presenter’s.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
@endsection