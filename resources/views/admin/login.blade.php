@if(Auth::guard('admin')->check())
<script>window.location.href = "{{ url('admin/dashboard') }}";</script>
@endif
<!DOCTYPE html>
<html lang="en" class="h-100">
    <head>
        <!-- All Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="robots" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Page Title Here -->
        <title>Admin Login | RHINOCON 2025</title>
        <!-- FAVICONS ICON -->
        <link rel="shortcut icon" type="image/png" href="{{ env('APP_URL').'public/admin_asset/images/favicon.png' }}">
        <link href="{{ env('APP_URL').'public/admin_asset/vendor/bootstrap-select/dist/css/bootstrap-select.min.css' }}" rel="stylesheet">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
        <link href="{{ env('APP_URL').'public/admin_asset/css/style1.css' }}" rel="stylesheet">
        <link href="{{ env('APP_URL').'public/admin_asset/css/custom.css' }}" rel="stylesheet">
        <style>
            .error{
            color: red;
            font-size: 13px;
            }
        </style>
    </head>
    <body class="body  h-100">
        <div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
            <div
                class="container flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
                <div class="d-flex justify-content-center h-100 align-items-center">
                    <div class="authincation-content style-2">
                        <div class="row no-gutters">
                            <div class="col-xl-12 tab-content">
                                <div id="sign-up" class="auth-form tab-pane fade show active  form-validation">
                                    @if (session()->has('error'))
                                        @if(count(session()->get('error')) >0 )
                                            @foreach(session()->get('error') as $error)
                                                <p class="mb-4 text-muted op-7 fw-normal text-center error">{{$error}}</p>
                                            @endforeach
                                        @endif
                                    @endif
                                    <form class="login-validation needs-validation" novalidate action="{{ url('admin-post') }}" method="POST" name="login-validation" id="login-validation">
                                        @csrf
                                        <div class="text-center mb-4">
                                            <img src="{{ env('APP_URL').'public/logo.png' }}">
                                            <h3 class="text-center mb-2 text-black">Sign In</h3>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label mb-2 fs-15 label-color font-w500">Email address</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="hello@example.com">
                                            <span class="error" id="email_error">@if($errors->has('email')) {{ $errors->first('email') }} @endif</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label mb-2 fs-15 label-color font-w500">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="************">
                                            <span class="error" id="password_error">@if($errors->has('password')) {{ $errors->first('password') }} @endif</span>
                                        </div>
                                        <button class="btn btn-block btn-primary" id="login-submit" type="submit">Sign In</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ env('APP_URL').'public/admin_asset/vendor/global/global.min.js' }}"></script>
        <script src="{{ env('APP_URL').'public/admin_asset/js/custom.min.js' }}"></script>
        <script src="{{ env('APP_URL').'public/admin_asset/js/dlabnav-init.js' }}"></script>
        <script src="{{ env('APP_URL').'public/admin_asset/js/jquery.validate.min.js' }}"></script>
        <script src="{{ env('APP_URL').'public/admin_asset/js/additional-methods.min.js' }}"></script>
        <script>
            $(document).ready(function(){
                $(document).on("click","#login-submit",function() {
                    $("#login-validation").validate({
                        rules: {
                            email: { required: true, email: true, minlength: 3, maxlength: 50},
                            password: { required: true, minlength: 6, maxlength: 18 },
                        },
                        messages: {
                            email: { required: "Email is required", email: "Email is Invalid", minlength: "Your email must be at least 3 characters long", maxlength: "Your email must be at least 50 characters long" },
                            password: { required: "Password is required", minlength: "Your password must be at least 6 characters long", maxlength: "Your email must be at least 18 characters long" },
                        },
                        errorPlacement: function(error, element) {
                            if (element.attr("name") == "email" ) {
                                $("#email_error").text(error[0].innerText);
                            } else if (element.attr("name") == "password" ) {
                                $("#password_error").text(error[0].innerText);
                            }
                        },
                        focusInvalid: true,
                        invalidHandler: function () {
                            $(this).find(":input.error:first").focus();
                        }
                    });
                    if ($("form#login-validation").valid()) {
                        $("form#login-validation").submit();
                    }
                });
                window.setTimeout(function() {
                    $(".error").text('');
                }, 7000);
            });
        </script>
    </body>
</html>