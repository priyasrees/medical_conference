<!DOCTYPE html>
<html lang="en">
    <!-- Added by HTTrack -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!-- /Added by HTTrack -->
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title_bar')</title>
        <!--=====FAB ICON=======-->
        
        <link rel="shortcut icon" href="{{ env('APP_URL').'public/asset/img/favicon.png' }}" />
        <!--===== CSS LINK =======-->
        <link rel="stylesheet" href="{{ env('APP_URL').'public/asset/css/vendor/bootstrap.min.css' }}" />
        <link rel="stylesheet" href="{{ env('APP_URL').'public/asset/css/vendor/aos.css' }}" />
        <link rel="stylesheet" href="{{ env('APP_URL').'public/asset/css/vendor/fontawesome.css' }}" />
        <link rel="stylesheet" href="{{ env('APP_URL').'public/asset/css/vendor/magnific-popup.css' }}" />
        <link rel="stylesheet" href="{{ env('APP_URL').'public/asset/css/vendor/mobile.css' }}" />
        <link rel="stylesheet" href="{{ env('APP_URL').'public/asset/css/vendor/owlcarousel.min.css' }}" />
        <link rel="stylesheet" href="{{ env('APP_URL').'public/asset/css/vendor/sidebar.css' }}" />
        <link rel="stylesheet" href="{{ env('APP_URL').'public/asset/css/vendor/slick-slider.css' }}" />
        <link rel="stylesheet" href="{{ env('APP_URL').'public/asset/css/vendor/nice-select.css' }}" />
        <link rel="stylesheet" href="{{ env('APP_URL').'public/asset/css/vendor/odometer.css' }}" />
        <link rel="stylesheet" href="{{ env('APP_URL').'public/asset/css/main.css' }}" />
        <link rel="stylesheet" href="{{ env('APP_URL').'public/asset/css/custom.css' }}" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css' }}" />

        <script src="{{ env('APP_URL').'public/asset/js/vendor/jquery-3.7.1.min.js' }}"></script>
        <style>
            .error{
                color: red;
                font-size: 13px;
            }
        </style>
        @yield('first_css')
    </head>
    <body class="homepage1-body">

    @include('layouts.web.header')
        @yield('breadcrumb')
        @yield('maincontent')
    @if(Request::path() != 'tour/mamallapuram')
    @if(Request::path() != 'tour/chennai')
    @if(Request::path() != 'tour/kanchipuram')
    @if(Request::path() != 'accommodation')
    <div class="cta1-section-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto text-center">
                    <div class="cta1-main-boxarea">
                        <div class="timer-btn-area">
                            <div class="timer">
                                <div class="time-box">
                                    <span id="days1" class="time-value">119</span>
                                    <br />
                                </div>
                                <div class="space14"></div>
                                <div class="time-box">
                                    <span id="hours1" class="time-value">22</span>
                                    <br />
                                </div>
                                <div class="space14"></div>
                                <div class="time-box">
                                    <span id="minutes1" class="time-value">18</span>
                                    <br />
                                </div>
                                <div class="space14"></div>
                                <div class="time-box" style="margin: 0 26px 0 0">
                                    <span id="seconds1" class="time-value">44</span>
                                    <br />
                                </div>
                            </div>
                            <div class="btn-area1">
                                <a href="#" class="vl-btn1 registration">Register now</a>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <a href="javascript:void(0)"><img src="{{ env('APP_URL').'public/asset/img/icons/calender1.svg' }}" alt="" />28, 29, 30 November
                                2025</a>
                            </li>
                            <li class="m-0">
                                <a href="javascript:void(0)"><img src="{{ env('APP_URL').'public/asset/img/icons/location1.svg' }}" alt="" />Le Royal Meridien,
                                Chennai</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif
    @endif
    @endif
    @include('layouts.web.footer')
    @if(Request::path() == '/')
    <style>
        .close-btn {
            top: 38px!important;
        }
    </style>
    <div id="popup" class="popup-overlay">
		<div class="popup-content">
			<span class="close-btn" id="close-popup">&times;</span>
			<a href="{{ url('registration') }}"><img src="{{ env('APP_URL').'public/asset/img/popup-img.jpg' }}" width="100%"></a>
		</div>
	</div>
	@endif
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ env('APP_URL').'public/asset/js/vendor/bootstrap.min.js' }}"></script>
	<script src="{{ env('APP_URL').'public/asset/js/vendor/fontawesome.js' }}"></script>
	<script src="{{ env('APP_URL').'public/asset/js/vendor/aos.js' }}"></script>
	<script src="{{ env('APP_URL').'public/asset/js/vendor/jquery.appear.js' }}"></script>
	<script src="{{ env('APP_URL').'public/asset/js/vendor/jquery.odometer.min.js' }}"></script>
	<script src="{{ env('APP_URL').'public/asset/js/vendor/sidebar.js' }}"></script>
	<script src="{{ env('APP_URL').'public/asset/js/vendor/magnific-popup.js' }}"></script>
	<script src="{{ env('APP_URL').'public/asset/js/vendor/gsap.min.js' }}"></script>
	<script src="{{ env('APP_URL').'public/asset/js/vendor/ScrollTrigger.min.js' }}"></script>
	<script src="{{ env('APP_URL').'public/asset/js/vendor/Splitetext.js' }}"></script>
	<script src="{{ env('APP_URL').'public/asset/js/vendor/mobilemenu.js' }}"></script>
	<script src="{{ env('APP_URL').'public/asset/js/vendor/owlcarousel.min.js' }}"></script>
	<script src="{{ env('APP_URL').'public/asset/js/vendor/nice-select.js' }}"></script>
	<script src="{{ env('APP_URL').'public/asset/js/vendor/waypoints.js' }}"></script>
	<script src="{{ env('APP_URL').'public/asset/js/vendor/slick-slider.js' }}"></script>
	<script src="{{ env('APP_URL').'public/asset/js/vendor/circle-progress.js' }}"></script>
	<script src="{{ env('APP_URL').'public/asset/js/main.js' }}"></script>
	
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.abstract, .registration').forEach(el => {
                el.addEventListener('click', function() {
                    alert("Registration Closed");
                });
});

// document.querySelector('.abstract,.registration').addEventListener('click',function(){
//     alert("Registration Closed");
// });
        function toastSucess(message) {
            Swal.fire({ position: "top-end", icon: "success", title: message, showConfirmButton: !1, timer: 2500});
        }
        function toastError(message) {
            Swal.fire({ position: "top-end", icon: "error", title: message, showConfirmButton: !1, timer: 2500 });
        }
        function toastSucessRg(message) {
            Swal.fire({ position: "top-end", icon: "success", title: message, text:'The ID card will arrive at your registered email address.', showConfirmButton: false, timer: 2500});
        }
        function bgValidation(fuData,img_error,preview_img) {
            if(fuData.files[0].size > 1000000) {
                $(img_error).text('Image size must under 10 MB!');
                fuData.value = "";
            } else {
                var FileUploadPath = fuData.value;
                var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
                if (Extension.toLowerCase() == "png" || Extension.toLowerCase() == "jpg" || Extension.toLowerCase() == "jpeg" || Extension.toLowerCase() == "gif" || Extension.toLowerCase() == "ico") {
                    if (fuData.files && fuData.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            //$(preview_div).removeAttr('style');
                            //$(link_img).attr("href", e.target.result)
                            $(preview_img).removeAttr('style');
                            $(preview_img).attr('src', e.target.result);
                        }
                        reader.readAsDataURL(fuData.files[0]);
                    }
                    $(img_error).text('');
                } else {
                    $(img_error).text('Photo only allows file Support of  PNG, JPG, JPEG and gif');
                    fuData.value = "";
                    return false;
                }
            }
        }
        function isNumberKey(evt, obj) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            var value = obj.value;
            var dotcontains = value.indexOf(".") != -1;
            if (dotcontains)
            if (charCode == 46) return false;
            if (charCode == 46) return true;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
            return true;
        }
	</script>
	@if(Session::has('status'))
        @if(Session::has('rg') == "rg" && Session::has('status') == true)
        <script>
            toastSucessRg("{!! Session::get('msg') !!}");
        </script>
        @elseif(Session::has('status') == true)
        <script>
            toastSucess("{!! Session::get('msg') !!}");
        </script>
        @else if(Session::has('status') == false)
        <script>
            toastError("{!! Session::get('msg') !!}");
        </script>
        @endif
    @endif
    @yield('footer_script')
    </body>
</html>