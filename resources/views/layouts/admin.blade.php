<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="robots" content="">
        <!-- Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Page Title Here -->
        <title>@yield('title_bar') | {{ env('APP_NAME') }}</title>
        <!-- FAVICONS ICON -->
        <link rel="shortcut icon" type="image/png" href="{{ env('APP_URL').'public/admin_asset/images/favicon.png' }}">
        <link href="{{ env('APP_URL').'public/admin_asset/vendor/wow-master/css/libs/animate.css' }}" rel="stylesheet">
        <link href="{{ env('APP_URL').'public/admin_asset/vendor/bootstrap-select/dist/css/bootstrap-select.min.css' }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ env('APP_URL').'public/admin_asset/vendor/bootstrap-select-country/css/bootstrap-select-country.min.css' }}">
        <link rel="stylesheet" href="{{ env('APP_URL').'public/admin_asset/vendor/jquery-nice-select/css/nice-select.css' }}">
        <link href="{{ env('APP_URL').'public/admin_asset/vendor/datepicker/css/bootstrap-datepicker.min.css' }}" rel="stylesheet">
        <link href="{{ env('APP_URL').'public/admin_asset/vendor/datatables/css/jquery.dataTables.min.css' }}" rel="stylesheet">
        <!--swiper-slider-->
        <link rel="stylesheet" href="{{ env('APP_URL').'public/admin_asset/vendor/swiper/css/swiper-bundle.min.css' }}">
        <!-- Style css -->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
        <link href="{{ env('APP_URL').'public/admin_asset/css/style1.css' }}" rel="stylesheet">
        <link href="{{ env('APP_URL').'public/admin_asset/css/custom.css' }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
        <style>
            .error{
                color: red;
                font-size: 13px;
            }
            .metismenu li a {
    display: flex;
    align-items: center;
    padding: 10px 18px;
    border-radius: 6px;
    color: #555;
    font-weight: 500;
    transition: all 0.3s ease;
}

.metismenu li.active > a {
    background: #FF81C0 !important;
    color: #fff !important;
    font-weight: 600;
    box-shadow: 0 3px 8px rgba(74,139,255,0.3);
}

.metismenu li.active > a i,
.metismenu li.active > a span {
    color: #fff !important;
}

.metismenu li a:hover {
    background: #FF81C0
;
    color: #2c7bff;
}

        </style>
        @yield('first_css')
    </head>
<body>
    <div id="main-wrapper" class="wallet-open active">
        @include('layouts.admin.header')
        @include('layouts.admin.sidebar')
        
        @yield('maincontent')
    </div>
    <script src="{{ env('APP_URL').'public/admin_asset/vendor/global/global.min.js' }}"></script>
	<script src="{{ env('APP_URL').'public/admin_asset/vendor/bootstrap-select/dist/js/bootstrap-select.min.js' }}"></script>
	<!-- Chart piety plugin files -->
	<script src="{{ env('APP_URL').'public/admin_asset/vendor/peity/jquery.peity.min.js' }}"></script>
	<script src="{{ env('APP_URL').'public/admin_asset/vendor/jquery-nice-select/js/jquery.nice-select.min.js' }}"></script>
	<!--swiper-slider-->
	<script src="{{ env('APP_URL').'public/admin_asset/vendor/swiper/js/swiper-bundle.min.js' }}"></script>
	<!-- Datatable -->
	<script src="{{ env('APP_URL').'public/admin_asset/vendor/datatables/js/jquery.dataTables.min.js' }}"></script>
	<script src="{{ env('APP_URL').'public/admin_asset/js/plugins-init/datatables.init.js' }}"></script>
	<!-- Dashboard 1 -->
	<script src="{{ env('APP_URL').'public/admin_asset/js/dashboard/dashboard-1.js' }}"></script>
	<script src="{{ env('APP_URL').'public/admin_asset/vendor/wow-master/dist/wow.min.js' }}"></script>
	<script src="{{ env('APP_URL').'public/admin_asset/vendor/bootstrap-datetimepicker/js/moment.js' }}"></script>
	<script src="{{ env('APP_URL').'public/admin_asset/vendor/datepicker/js/bootstrap-datepicker.min.js' }}"></script>
	<script src="{{ env('APP_URL').'public/admin_asset/vendor/bootstrap-select-country/js/bootstrap-select-country.min.js' }}"></script>
	<script src="{{ env('APP_URL').'public/admin_asset/js/dlabnav-init.js' }}"></script>
	<script src="{{ env('APP_URL').'public/admin_asset/js/custom.min.js' }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function toastSucess(message) {
            Swal.fire({ position: "top-end", icon: "success", title: message, showConfirmButton: !1, timer: 2500});
        }
        function toastError(message) {
            Swal.fire({ position: "top-end", icon: "error", title: message, showConfirmButton: !1, timer: 2500 });
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
        function bgValidation1(fuData,img_error,preview_img) {
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
                            $(preview_img).removeAttr('style');
                            $(preview_img).attr('style', 'background-image: url("' + e.target.result +'")');
                            //$(preview_img).css('background-image', e.target.result);
                            //console.log(e.target.result);
                            //$(preview_img).attr('src', e.target.result);
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
        function AjaxSendData(method, url, passData) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                type: method,
                url: url,
                success: function (data) {
                    if(data.status==true) {
                        toastSucess(data.msg);
                        setTimeout(function() {location.reload();}, 1000);                
                    } else if(data.status==false) {
                        toastError(data.msg);
                    }
                },
                error: function (data) {
                    toastError(data.msg);
                }
            });
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
        @if(Session::has('status'))
        @if(Session::has('status') == true)
        <script>
            toastSucess("{!! Session::get('msg') !!}");
        </script>
        @else if(Session::has('status') == false)
        <script>
            toastError("{!! Session::get('msg') !!}");
        </script>
        @endif
        @endif
    </script>
    @yield('footer_script')
</body>
</html>