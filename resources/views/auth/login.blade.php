<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>
        CoreStream | Login
    </title>
    <meta name="description" content="streaming company in nigeria">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->
    <!--begin::Base Styles -->
    <link href="{{ asset('auth/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('auth/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->
    <!-- begin::favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/images/icon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/images/icon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/images/icon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/images/icon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/images/icon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/images/icon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/images/icon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/images/icon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/icon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/images/icon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/icon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/images/icon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/icon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/icon/manifest.json') }}">
    <!-- end::favicon -->
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-login m-login--singin  m-login--5" id="m_login" style="background-image: url({{ url('auth/app/media/img//bg/bg-3.jpg') }})/*url('auth/app/media/img//bg/bg-3.jpg')*/;">
        <div class="m-login__wrapper-1 m-portlet-full-height">
            <div class="m-login__wrapper-1-1">
                <div class="m-login__contanier">
                    <div class="m-login__content">
                        <div class="m-login__logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ url('land/images/logo1.png') }}" height="80px">
                            </a>
                        </div>
                        <div class="m-login__title">
                            <h3>
                                JOIN OUR GREAT CORESTREAM COMMUNITY GET FREE ACCOUNT
                            </h3>
                        </div>
                        <div class="m-login__desc">
                            Amazing Stuff is Lorem Here.Grownng Team
                        </div>
                        <div class="m-login__form-action">
                            <button type="button" id="m_login_signup" class="btn btn-outline-danger m-btn--pill">
                                Get An Account
                            </button>
                        </div>

                        <div class="m-login__form-action">
                            <a href="{{ route('facebook.login') }}" class="btn btn-facebook m-btn m-btn--pill">
                                Facebook
                            </a>

                            <a href="{{ route('twitter.login') }}" class="btn btn-twitter m-btn m-btn--pill">
                                Twitter
                            </a>
                        </div>
                    </div>
                </div>
                <div class="m-login__border">
                    <div></div>
                </div>
            </div>
        </div>
        <div class="m-login__wrapper-2 m-portlet-full-height">
            <div class="m-login__contanier">
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title">
                            Login To Your Account
                        </h3>
                    </div>
                    <form class="m-login__form m-form" action="">
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="Username" name="username" autocomplete="off">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="Password" placeholder="Password" name="password">
                        </div>
                        <div class="row m-login__form-sub">
                            <div class="col m--align-left">
                                <label class="m-checkbox m-checkbox--danger">
                                    <input type="checkbox" name="remember">
                                    Remember me
                                    <span></span>
                                </label>
                            </div>
                            <div class="col m--align-right">
                                <a href="javascript:;" id="m_login_forget_password" class="m-link">
                                    Forget Password ?
                                </a>
                            </div>
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_signin_submit" class="btn btn-danger m-btn m-btn--pill m-btn--custom m-btn--air">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>
                <div class="m-login__signup">
                    <div class="m-login__head">
                        <h3 class="m-login__title">
                            Sign Up
                        </h3>
                        <div class="m-login__desc">
                            Enter your details to create your account:
                        </div>
                    </div>
                    <form class="m-login__form m-form" action="">
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="Fullname" name="fullname">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="Email" name="email" autocomplete="off">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="password" placeholder="Password" name="password">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" name="rpassword">
                        </div>
                        <div class="m-login__form-sub">
                            <label class="m-checkbox m-checkbox--danger">
                                <input type="checkbox" name="agree">
                                I Agree the
                                <a href="#" class="m-link m-link--danger">
                                    terms and conditions
                                </a>
                                .
                                <span></span>
                            </label>
                            <span class="m-form__help"></span>
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_signup_submit" class="btn btn-danger m-btn m-btn--pill m-btn--custom m-btn--air">
                                Sign Up
                            </button>
                            <button id="m_login_signup_cancel" class="btn btn-outline-danger m-btn m-btn--pill m-btn--custom">
                                Back
                            </button>
                        </div>
                    </form>
                </div>
                <div class="m-login__forget-password">
                    <div class="m-login__head">
                        <h3 class="m-login__title">
                            Forgotten Password ?
                        </h3>
                        <div class="m-login__desc">
                            Enter your email to reset your password:
                        </div>
                    </div>
                    <form class="m-login__form m-form" action="">
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_forget_password_submit" class="btn btn-danger m-btn m-btn--pill m-btn--custom m-btn--air">
                                Request
                            </button>
                            <button id="m_login_forget_password_cancel" class="btn btn-outline-danger m-btn m-btn--pill m-btn--custom ">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Page -->
<!--begin::Base Scripts -->
<script src="{{ asset('auth/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('auth/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Snippets -->
<script src="{{ asset('auth/snippets/pages/user/login.js') }}" type="text/javascript"></script>
<!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>
