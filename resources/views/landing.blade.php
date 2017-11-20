<!DOCTYPE html>
<html lang="en">
<head>
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
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/images/icon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <title>CORE STREAM</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Lucrative Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>

    <link href="{{ asset('land/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('land/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />

    <script type="text/javascript" src="{{ asset('land/js/jquery-2.1.4.min.js') }}"></script>

    <link href="{{ asset('land/css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all" />

    <link href="{{ asset('land/css/font-awesome.css') }}" rel="stylesheet">

    <link href="//fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>

<body>

<div class="header">
    <div class="container">
        <div class="head">
            <nav class="nav1">
                <ul class="headerM">
                    <li><b>+(234) 817 195 3994</b></li>
                    <li><b>|</b></li>
                    <li><a href="{{ url('login') }}"><b>Sign in</b></a></li>
                    <li><b>|</b></li>
                    <li><a href="{{ url('package') }}" class="host"><b>HOST</b></a></li>
                </ul>
            </nav>
        </div>
    </div>

</div>
<!-- //header -->

<script src="{{ asset('land/js/jquery.magnific-popup.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

    });
</script>
<!-- banner -->

<div class="banner">
    <div class="container">
        <h2  style="position:absolute;  left: 400px; margin-top: 2em;">  COMING TO YOU LIVE</h2>
        <p style="position:absolute;  left:300px; margin-top: 7em; font-size: 20px;">The best platform to watch all of your favourite life events with just a click of a button</p>


        <div class="learnBu" style="position: absolute; bottom: 12em; left: 550px">
            <ul>
                <li style="list-style-type: none;"><a href="{{ url('/') }}" ><b>GET STARTED<span class="span glyphicon glyphicon-chevron-down"></span></b></a></li>

            </ul>
        </div>
    </div>
</div>
<div class="navbar2">
    <div class="container">
        <div class="nav2">
            <a href="{{ url('/') }}"><img src="{{ url('land/images/logo1.png') }}" class="img-responsive logo" alt="logo"/></a>
            <nav>
                <ul class="col-md-offset-4">
                    <li><a href="{{ url('events/display') }}"><b>WATCH</b></a></li>
                    <li><a href="#"><b>HOW IT WORKS</b></a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="line"></div>

<script>
    $(document).ready(function() {

        $(window).scroll(function () {

            if ($(window).scrollTop() > 550) {
                $('.navbar2').addClass('navbar-fixed-top');
            }

            if ($(window).scrollTop() < 551) {
                $('.navbar2').removeClass('navbar-fixed-top');
            }
        });
    });
</script>

<div class="banner-bottom">
    <div class="container">
        <div class="row" align="center">
            <h1 style="font-size: 50px;">Share Your Moment</h1>
        </div>

        <div class="row" style="padding: 2em 0 0 0; background-color: #FFFFFF;">
            <div class="col-md-3" align="center">
                <img src="{{ url('land/images/scheme.png') }}" class= "img-circle" align="center" alt="Anytime Anywhere" style="height: 50%; width:50%;" />

                <p class="icons">
                    ,dnflsn.fsdfuisfkjnskldjlaiofi fhuisdfsjfhuisf djfhlsflkfuihs
                </p>
            </div>

            <div class="col-md-3" align="center">
                <img src="{{ url('land/images/check-mark-button.png') }}" class="img-circle" alt="Reliable" align="center" style="height: 50%; width:50%;" />

                <p class="icons">
                    kdgfoeruhwgf lfytbvfkyfgs lkaub;eufye kdyftwk,ehgeyf hdgtfh
                </p>
            </div>

            <div class="col-md-3" align="center">
            <img src="{{ url('land/images/connection.png') }}" class="img-responsive img-circle con" align="center" alt="Connection" style="height: 50%; width:50%;"/>

            <p class="icons">
                mdnfhsbv.sk hfgysfeh ksdtfgwbky skdyfehwberuy eydftwygebfgwugf
            </p>
        </div>

        <div class="col-md-3" align="center">
            <img src="{{ url('land/images/broadcast.png') }}" class="img-circle" align="center" alt="Broadcast Solution" style="height: 50%; width:50%;"/>

            <p class="icons">
                ,jhufsikj lycvb ldsygfv sjdgysd lsdygsl jjdygsjgali kdysdl
            </p>
        </div>

    </div>

    <div class="clearfix"></div>

</div>
</div>

<div class="every">
    <div class="container">
        <h1  style="margin-top: 2em; color: #FFFFFF;  text-align: center; font-size: 3em; top: -2em; position: relative"><b>Every Moment Matters</b></h1>
        <p style="font-size: 2.0em; color: #FFFFFF; position: relative; top:-3em;">Let us help you capture and share those important ground-breaking moments</p>
    </div>
</div>

<div class="offer" style="padding: 1em;">
    <div class="offerHeader">
        <h1 align="center"></h1>
    </div>
    <div>
        <div class="row" style="padding: 1em 0">
            <div class="col-md-2">
            </div>
            <div class="col-md-1 iconDiv" align="center;">
                <img src="{{ url('land/images/wedding.png') }}" class="img-responsive iconImg" alt="Wedding"/>
                <p class="icons">
                    Wedding
                </p>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-1 iconDiv" align="center">
                <img src="{{ url('land/images/worship.pngimages/worship.png') }}" class="img-responsive iconImg" alt="Worship"/>
                <p class="icons">
                    Worship
                </p>
            </div>
            <div class="col-md-1">
            </div>

            <div class="col-md-1 iconDiv" align="center;">
                <img src="{{ url('land/images/conference.png') }}" class="img-responsive iconImg" alt="Conference"/>
                <p class="icons">
                    Conference
                </p>
            </div>
            <div class="col-md-1">
            </div>

            <div class="col-md-1 iconDiv" align="center;">
                <img src="{{ url('land/images/music.png') }}" class="img-responsive iconImg" alt="Music"/>
                <p class="icons">
                    Concert
                </p>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-1 iconDiv" align="center;">
                <img src="{{ url('land/images/sports.png') }}" class="img-responsive iconImg" alt="Sports"/>
                <p class="icons">
                    Sports
                </p>
            </div>

            <div class="col-md-1">
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>

<div class="LearnMore">
    <div class="learn">
        <div class="learnM">
            <h1>Want more details about Corestream?</h1>
        </div>
        <div class="learnBu">
            <ul>
                <li><a href="#"><b>LEARN MORE<span class="span glyphicon glyphicon-chevron-down"></span></b></a></li>
            </ul>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.learnBu').mouseenter(function(){
            $('.span').animate({paddingTop: '0.9em'})
        })

    })
</script>

<script src="{{ asset('land/js/waypoints.min.js') }}"></script>
<script src="{{ asset('land/js/counterup.min.js') }}"></script>
<script>
    jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 20,
            time: 1000
        });
    });
</script>

<div class="footer">
    <div class="container">
        <div class="landingFooter row">
            <div class="footerWatch col-md-3">
                <h3><b>Events</b></h3>
                <p>Wedding</p>
                <p>Birthday</p>
                <p>Anniversary</p>
                <p>Concert</p>
                <p>Conference</p>
                <p>Worship</p>
                <p>Sports</p>
                <p>Education</p>
                <p>Co-operate Events</p>
                <p></p>
            </div>
            <div class="col-md-3 footerWatch">
                <h3><b>Contact Us</b></h3>
                <p>08171953994</p>
                <p>info@corestream.com</p>
                <p>No 1 Ogudu road. Adeokuta, Oyo.</p>
            </div>
            <div class="col-md-3 footerWatch">
                <h3><b>About Us</b></h3>
                <p>what is Corestream</p>
            </div>
            <div class="col-md-3 footerWatch w3ls_copyright_right">
                <h3><b>Social media</b></h3>
                <ul>
                    <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="w3_agile_pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="w3_agile_instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="copyright">
    <div class="container">
        <div class="w3ls_copyright_left">
            <p>© 2017 Handcrafted with love by the <a href="https://touchcoreltd.com/">Touchcore</a> Team</p>
            <p><a href="https://touchcoreltd.com/contact/">CONTACT THE TEAM</a></p>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('land/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('land/js/easing.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>

<script src="{{ asset('land/js/bootstrap.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $().UItoTop({ easingType: 'easeOutQuart' });
    });
</script>

</body>
</html>