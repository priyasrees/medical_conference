<style>
    .blink-highlight {
    background-color: #FDE6EE;
    padding: 10px 16px!important;
    border-radius: 8px;
    font-weight: bold;
    position: relative;
    transition: all 0.4s ease;
    animation: softGlow 3s infinite ease-in-out;
}

@keyframes softGlow {
    0% {
        box-shadow: 0 0 0px rgba(255, 79, 163, 0.3);
    }
    70% {
        box-shadow: 0 0 20px rgba(255, 79, 163, 0.8);
        background-color: #FFE6F1;
    }
    100% {
        box-shadow: 0 0 0px rgba(255, 79, 163, 0.3);
    }
}

.blink-highlight:hover {
      background-color: #F9D6E5;
    transform: scale(1.05);
    animation: none;
}
</style>
<div class="paginacontainer">
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
</div>
<header>
    <div class="header-area homepage1 header header-sticky d-none d-lg-block" id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-elements">
                        <div class="site-logo">
                            <a href="{{ url('/') }}"><img src="{{ env('APP_URL').'public/asset/img/logo.png' }}" alt="Rhinocon 2025 Logo" /></a>
                        </div>
                        <div class="main-menu">
                            <ul>
                                <li><a href="{{ url('message') }}">Message</a></li>
                                <li>
                                    <a href="javascript:void(0)">Committee <i class="fa-solid fa-angle-down"></i></a>
                                    <ul class="dropdown-padding">
                                        <li><a href="{{ url('organizing-committee') }}">Organizing Committee </a></li>
                                        <li><a href="{{ url('airs-executive-committee') }}">AIRS Executive Committee</a>
                                        </li>
                                    </ul>
                                </li>
                                <!--<li><a href="{{ url('registration') }}"  class="blink-highlight registration">Registration</a></li>-->
                                <li><a href="#"  class="blink-highlight registration">Registration</a></li>
                                <li>
                                    <a href="javascript:void(0)">Venue <i class="fa-solid fa-angle-down"></i></a>
                                    <ul class="dropdown-padding">
                                        <li><a href="{{ url('about-venue') }}">About Venue</a></li>
                                        <li><a href="{{ url('about-chennai') }}">About Chennai</a></li>
                                        <li><a href="{{ url('conference-venue') }}">Conference Venue</a></li>
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Program <i class="fa-solid fa-angle-down"></i></a>
                                    <ul class="dropdown-padding">
                                        <li><a href="{{ url('program-glance') }}">Program at a Glance</a></li>
                                        <li><a href="{{ url('conference-program') }}">Conference Program</a></li>
                                    </ul>
                                </li>
                                
                                
                                <li>
										<a href="javascript:void(0)">Tour <i class="fa-solid fa-angle-down"></i></a>
										<ul class="dropdown-padding">
											<li><a href="{{ url('tour/mamallapuram') }}">Mamallapuram</a></li>
											<li><a href="{{ url('tour/chennai') }}">Chennai</a></li>
											<li><a href="{{ url('tour/kanchipuram') }}">Kanchipuram</a></li>
										</ul>
									</li>
								
								<li><a href="{{ url('accommodation') }}">Accommodation</a></li>
								<li><a href="{{ url('congress-food-menu') }}">Food</a></li>
								<li><a href="{{ url('weather') }}">Weather</a></li>
								
									    
                                <!--<li><a href="{{ url('abstracts') }}" class="blink-highlight abstract">Abstracts</a></li>-->
                                <li><a href="#" class="blink-highlight abstract">Abstracts</a></li>
                                <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="body-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header mobile-haeder1 d-block d-lg-none">
    <div class="container-fluid">
        <div class="col-12">
            <div class="mobile-header-elements">
                <div class="mobile-logo">
                    <a href="{{ url('/') }}"><img src="{{ env('APP_URL').'public/asset/img/logo.png' }}" alt="Rhinocon 2025 Logo" /></a>
                </div>
                <div class="mobile-nav-icon dots-menu" style="background-color: #b31a44;  color:#fff;  width: auto;  padding: 15px; font-size:17px">
                   <span style="margin-right:6px">Click Here More! </span>  <i class="fa-solid fa-bars-staggered"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mobile-sidebar mobile-sidebar1">
    <div class="logosicon-area">
        <div class="logos">
            <img src="{{ env('APP_URL').'public/asset/img/logo.png' }}" alt="Rhinocon 2025 Logo" />
        </div>
        <div class="menu-close">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    <div class="mobile-nav mobile-nav1">
        <ul class="mobile-nav-list nav-list1">
            <li><a href="{{ url('message') }}">Message</a></li>
            <li>
                <a href="javascript:void(0)">Committee <i class="fa-solid fa-angle-down"></i></a>
                <ul class="dropdown-padding">
                    <li><a href="{{ url('organizing-committee') }}">Organizing Committee </a></li>
                    <li><a href="{{ url('airs-executive-committee') }}">AIRS Executive Committee</a>
                    </li>
                </ul>
            </li>
            <li><a href="#"  class="blink-highlight">Registration</a></li>
            <li>
                <a href="javascript:void(0)">Venue <i class="fa-solid fa-angle-down"></i></a>
                <ul class="dropdown-padding">
                    <li><a href="{{ url('about-venue') }}">About Venue</a></li>
                    <li><a href="{{ url('about-chennai') }}">About Chennai</a></li>
                    <li><a href="{{ url('conference-venue') }}">Conference Venue</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)">Program <i class="fa-solid fa-angle-down"></i></a>
                <ul class="dropdown-padding">
                    <li><a href="{{ url('program-glance') }}">Program at a Glance</a></li>
                    <li><a href="{{ url('conference-program') }}">Conference Program</a></li>
                </ul>
            </li>
            <li>
				<a href="javascript:void(0)">Tour <i class="fa-solid fa-angle-down"></i></a>
				<ul class="dropdown-padding">
					<li><a href="{{ url('tour/mamallapuram') }}">Mamallapuram</a></li>
					<li><a href="{{ url('tour/chennai') }}">Chennai</a></li>
					<li><a href="{{ url('tour/kanchipuram') }}">Kanchipuram</a></li>
				</ul>
			</li>
            <li><a href="{{ url('accommodation') }}">Accommodation</a></li>
            <li><a href="{{ url('congress-food-menu') }}">Food</a></li>
            <li><a href="{{ url('weather') }}">Weather</a></li>
								
            <li><a href="#"  class="blink-highlight abstract">Abstracts</a></li>
            <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
        </ul>
        <div class="allmobilesection">
            <div class="single-footer">
                <h3>Contact Info</h3>
                <div class="footer1-contact-info">
                    <div class="contact-info-single">
                        <div class="contact-info-icon">
                            <span><i class="fa-solid fa-phone-volume"></i></span>
                        </div>
                        <div class="contact-info-text">
                            <a href="tel:+917305057342">+91 73050 57342</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>