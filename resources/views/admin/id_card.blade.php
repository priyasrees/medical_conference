<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ID Card</title>
        <style>
            @media (min-width: 992px) {
            .col-lg-12 {
            flex: 0 0 auto;
            width: 100%;
            }
            }
            .me-2 {
            margin-right: 0.5rem !important;
            }
            li {
            list-style: none;
            }
            ul {
            padding: 0;
            margin: 0;
            }
            *, *::before, *::after {
            box-sizing: border-box;
            }
            ul {
            display: block;
            list-style-type: disc;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            padding-inline-start: 40px;
            unicode-bidi: isolate;
            }
            .me-2 {
            margin-right: 0.5rem !important;
            }
            li {
            list-style: none;
            }
            .icon-box {
            width: 48px;
            height: 48px;
            line-height: 45px;
            text-align: center;
            position: relative;
            display: inline-block;
            border-radius: 100%;
            -webkit-transition: all 0.8s;
            -ms-transition: all 0.8s;
            transition: all 0.8s;
            }
            .bg-secondary {
            --bs-bg-opacity: 1;
            background-color: #AD0E60 !important;
            }
            img, svg {
            vertical-align: middle;
            }
            img {
            overflow-clip-margin: content-box;
            overflow: clip;
            }
            a {
            color: #A098AE;
            text-decoration: none;
            }
            .student-details {
            display: flex;
            align-items: center;
            }
            @media only screen and (max-width: 100rem) {
            .student-details {
            margin-bottom: 10px;
            }
            }
            * {
            outline: none;
            padding: 0;
            }
            .mt-2 {
            margin-top: 0.5rem !important;
            }
            .row {
            --bs-gutter-x: 30px;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-1* var(--bs-gutter-y));
            margin-right: calc(-.5* var(--bs-gutter-x));
            margin-left: calc(-.5* var(--bs-gutter-x));
            }
            .mb-0 {
            margin-bottom: 0 !important;
            }
            h1, .h1, .h1, h2, .h2, .h2, h3, .h3, .h3, h4, .h4, .h4, h5, .h5, .h5, h6, .h6, .h6 {
            line-height: 1.5;
            color: #3d3d3d;
            }
            .font-w600 {
            font-weight: 600;
            }
            .text-primary {
            color: var(--primary) !important;
            }
            .text-primary {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-primary-rgb), var(--bs-text-opacity)) !important;
            }
            .card {
            margin-bottom: 1.875rem;
            background-color: #ffffff;
            transition: all .5s ease-in-out;
            position: relative;
            border: 0rem solid transparent;
            border-radius: 0.375rem;
            height: calc(100% - 30px);
            }
            .h-auto {
            height: auto !important;
            }
            .card {
            --bs-card-spacer-y: 1rem;
            --bs-card-spacer-x: 1rem;
            --bs-card-title-spacer-y: 0.5rem;
            --bs-card-border-width: 1px;
            --bs-card-border-color: var(--bs-border-color-translucent);
            --bs-card-border-radius: 0.625rem;
            --bs-card-box-shadow: ;
            --bs-card-inner-border-radius: calc(0.625rem - 1px);
            --bs-card-cap-padding-y: 0.5rem;
            --bs-card-cap-padding-x: 1rem;
            --bs-card-cap-bg: rgba(0, 0, 0, 0.03);
            --bs-card-cap-color: ;
            --bs-card-height: ;
            --bs-card-color: ;
            --bs-card-bg: #fff;
            --bs-card-img-overlay-padding: 1rem;
            --bs-card-group-margin: 15px;
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            height: var(--bs-card-height);
            word-wrap: break-word;
            background-color: var(--bs-card-bg);
            background-clip: border-box;
            border: var(--bs-card-border-width) solid var(--bs-card-border-color);
            border-radius: var(--bs-card-border-radius);
            }
            .card-header {
            border-color: #dddddd;
            position: relative;
            background: transparent;
            padding: 1.5rem 1.875rem 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 0.375rem 0.375rem 0px 0px !important;
            }
            .card-header {
            padding: var(--bs-card-cap-padding-y) var(--bs-card-cap-padding-x);
            margin-bottom: 0;
            color: var(--bs-card-cap-color);
            background-color: var(--bs-card-cap-bg);
            border-bottom: var(--bs-card-border-width) solid var(--bs-card-border-color);
            }
            div, span, ol, ul {
            scrollbar-width: thin;
            }
            .user-bg {
            height: 140px;
            background-color: var(--primary);
            border-radius: 0.375rem 0.375rem 0 0;
            position: relative;
            }
            .w-100 {
            width: 100% !important;
            }
            .card-body {
            padding: 1.875rem;
            }
            .card-body {
            flex: 1 1 auto;
            padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x);
            color: var(--bs-card-color);
            }
            .justify-content-center {
            justify-content: center !important;
            }
            .d-flex {
            display: flex !important;
            }
            .user {
            cursor: pointer;
            }
            .user {
            margin-top: -100px;
            }
            .user .user-media {
            margin-bottom: 20px;
            }
            .text-center {
            text-align: center !important;
            }
            .user .user-media .avatar {
            border: 8px solid #fff;
            }
            .avatar.avatar-xxl {
            width: 9.375rem;
            height: 9.375rem;
            }
            .avatar {
            width: 3rem;
            height: 3rem;
            object-fit: cover;
            border-radius: 100%;
            position: relative;
            display: inline-block;
            }
            img, svg {
            vertical-align: middle;
            }
        </style>
    </head>
    <body>
        <div class="card h-auto">
            <div class="card-header p-0">
                <div class="user-bg w-100">
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <div class="user">
                        <div class="user-media text-center">
                            <img src="https://rhinocon2025chennai.com/admin/images/avatar/8.jpg" alt="" class="avatar avatar-xxl">
                        </div>
                        <div class="text-center">
                            <h2 class="mb-0">Maria Historia</h2>
                            <h5 class="text-primary font-w600">ID - 123456</h5>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <ul class="student-details">
                            <li class="me-2">
                                <a class="icon-box bg-secondary">
                                <img src="https://rhinocon2025chennai.com/admin/images/profile.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <span>Member Type:</span>
                                <h5 class="mb-0">AIRS Member</h5>
                            </li>
                        </ul>
                        <ul class="student-details">
                            <li class="me-2">
                                <a class="icon-box bg-secondary">
                                <img src="https://rhinocon2025chennai.com/admin/images/svg/location.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <span>City:</span>
                                <h5 class="mb-0">Coimbatore</h5>
                            </li>
                        </ul>
                        <ul class="student-details">
                            <li class="me-2">
                                <a class="icon-box bg-secondary">
                                <img src="https://rhinocon2025chennai.com/admin/images/svg/phone.svg" alt="">
                                </a>
                            </li>
                            <li>
                                <span>Phone:</span>
                                <h5 class="mb-0">+12 345 6789 0</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>