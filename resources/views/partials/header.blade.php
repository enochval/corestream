<header class="topbar">
    <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">
                <!-- Logo icon -->
                <b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    {{--<img src="{{ url('assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="{{ url('assets/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" />--}}
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span>
                         <!-- dark Logo text -->
                         <img src="{{ url('land/images/logo1.png') }}" height="50px" alt="homepage" class="dark-logo" />
                    <!-- Light Logo text -->
                         <img src="{{ url('assets/images/logo-light-text.png') }}" class="light-logo" alt="homepage" /></span> </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item hidden-sm-down search-box">
                    <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                </li>
                <!-- ============================================================== -->
                <!-- Messages -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-view-grid"></i></a>
                    <div class="dropdown-menu scale-up-left">
                        <ul class="mega-dropdown-menu row">
                            <li class="col-lg-3 col-xlg-2 m-b-30">
                                <h4 class="m-b-20">CAROUSEL</h4>
                                <!-- CAROUSEL -->
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <div class="container"> <img class="d-block img-fluid" src="../assets/images/big/img1.jpg" alt="First slide"></div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="container"><img class="d-block img-fluid" src="../assets/images/big/img2.jpg" alt="Second slide"></div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="container"><img class="d-block img-fluid" src="../assets/images/big/img3.jpg" alt="Third slide"></div>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                </div>
                                <!-- End CAROUSEL -->
                            </li>
                            <li class="col-lg-3 m-b-30">
                                <h4 class="m-b-20">ACCORDION</h4>
                                <!-- Accordian -->
                                <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingOne">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Collapsible Group Item #1
                                                </a>
                                            </h5> </div>
                                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="card-block"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingTwo">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Collapsible Group Item #2
                                                </a>
                                            </h5> </div>
                                        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="card-block"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingThree">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Collapsible Group Item #3
                                                </a>
                                            </h5> </div>
                                        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="card-block"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-3  m-b-30">
                                <h4 class="m-b-20">CONTACT US</h4>
                                <!-- Contact -->
                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Enter email"> </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </form>
                            </li>
                            <li class="col-lg-3 col-xlg-4 m-b-30">
                                <h4 class="m-b-20">List style</h4>
                                <!-- List style -->
                                <ul class="list-style-none">
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">

                @if(auth()->guest())
                    <li class="nav-item dropdown">
                        <ul>
                            <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-red btn-outline-red w3-tiny mt-4"><span class="btn-label"><i class="mdi mdi-login"></i> </span> REGISTER / LOG IN</button>
                        </ul>
                    </li>
                @elseif(!auth()->guest())
                    <li class="nav-item dropdown">
                        <ul>
                            <a href="{{ url('/logout') }}" class="btn btn-red btn-outline-red w3-tiny mt-4"><span class="btn-label"><i class="mdi mdi-logout"></i> </span> LOGOUT</a>
                        </ul>
                    </li>
                @endif


                <div id="id01" class="w3-modal">

                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                        <div class="w3-center"><br>
                            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                            <h1><strong>Log in with your account</strong></h1>

                            <div class="mt-5">
                                <p>
                                    <a href="{{ route('twitter.login') }}" class="bt-connect bt-twitter">
                                        <span>Connect with Twitter</span>
                                        <i class="ico-svg mdi mdi-twitter"></i>
                                    </a>
                                </p>
                            </div>

                            <div class="mt-3">
                                <p>
                                    <a href="{{ route('facebook.login') }}" class="bt-connect bt-facebook">
                                        <span>Connect with Facebook</span>
                                        <i class="mdi mdi-facebook ml-5"></i>
                                    </a>
                                </p>
                            </div>

                            <div class="mt-3 ">
                                <p>
                                    <a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='none'; document.getElementById('id03').style.display='block';" class="bt-connect bt-email">
                                        <span>Log in with your e-mail</span>
                                        <i class="ico-svg mdi mdi-email"></i>
                                    </a>
                                </p>
                            </div>

                            <p class="mt-5 heading-small pb-lg-5">
                                Not a member yet? <a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='none'; document.getElementById('id04').style.display='block';">Register now</a>
                            </p>

                        </div>

                    </div>

                </div>



                <div id="id04" class="w3-modal">

                    <div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:600px">

                        <div class="w3-center"><br>
                            <span onclick="document.getElementById('id04').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                            <h1><strong>Create your account</strong></h1>

                            <div class="mt-5">
                                <p>
                                    <a href="{{ route('twitter.login') }}" class="bt-connect bt-twitter">
                                        <span>Connect with Twitter</span>
                                        <i class="ico-svg mdi mdi-twitter"></i>
                                    </a>
                                </p>
                            </div>

                            <div class="mt-3">
                                <p>
                                    <a href="{{ route('facebook.login') }}" class="bt-connect bt-facebook">
                                        <span>Connect with Facebook</span>
                                        <i class="mdi mdi-facebook ml-5"></i>
                                    </a>
                                </p>
                            </div>

                            <div class="mt-3 ">
                                <p>
                                    <a href="javascript:void(0)" onclick="document.getElementById('id04').style.display='none'; document.getElementById('id02').style.display='block';" class="bt-connect bt-email">
                                        <span>Sign Up with your e-mail</span>
                                        <i class="ico-svg mdi mdi-email"></i>
                                    </a>
                                </p>
                            </div>

                            <p class="mt-5 heading-small pb-lg-5">
                                Are you a member? <a href="javascript:void(0)" onclick="document.getElementById('id04').style.display='none'; document.getElementById('id01').style.display='block';">Login now</a>
                            </p>

                        </div>

                    </div>

                </div>



                <div id="id02" class="w3-modal">

                    <div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:600px">

                        <div class="w3-center"><br>
                            <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                            <h1><strong>Create your account</strong></h1>

                            <form action="{{ url('/register') }}" method="POST">

                                {{ csrf_field() }}

                                <div class="mt-5">
                                    <label class="tip-form">
                                        <input name="full_name" class="text-input" placeholder="Full Name" type="text">
                                    </label>
                                </div>

                                <div class="mt-3">
                                    <label class="tip-form">
                                        <input name="email" class="text-input" placeholder="Email" type="text">
                                    </label>
                                </div>

                                <div class="mt-3">
                                    <label class="tip-form">
                                        <input name="password" class="text-input" placeholder="Password" type="password">
                                    </label>
                                </div>

                                <div class="mt-3">
                                    <label class="tip-form">
                                        <input name="password_confirmation" class="text-input" placeholder="Repeat Password" type="password">
                                    </label>
                                </div>

                                <div class="mt-3 w3-center pb-2">
                                    <button type="submit" class="btn btn-rounded btn-lg btn-danger">
                                        <span class="bt-email">CREATE ACCOUNT!</span>
                                    </button>
                                </div>

                                <input type="hidden" name="_target_path" value="{{ url('/') }}">

                            </form>

                            <p class="mt-5 heading-small pb-lg-5">
                                Are you a member? <a href="javascript:void(0)" onclick="document.getElementById('id02').style.display='none';document.getElementById('id01').style.display='block';">Login now</a>
                            </p>

                        </div>

                    </div>

                </div>


                <div id="id03" class="w3-modal">

                    <div class="w3-modal-content w3-card-4 w3-animate-opacity" style="max-width:600px">

                        <div class="w3-center"><br>
                            <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                            <h1><strong>Login with your e-mail</strong></h1>

                            <form action="{{ url('/login') }}" method="POST">

                                {{ csrf_field() }}

                            <div class="mt-5">
                                <label class="tip-form">
                                    <input name="email" class="text-input" placeholder="Email" type="text" required>
                                </label>
                            </div>

                            <div class="mt-3">
                                <label class="tip-form">
                                    <input name="password" class="text-input" placeholder="Password" type="password" required>
                                </label>
                            </div>

                            <div class="mt-3">
                                <input id="remember_me" name="_remember_me" type="checkbox">
                                <label for="remember">Keep me logged in</label>
                            </div>

                            <div class="mt-3 w3-center">
                                <button type="submit" class="btn btn-rounded btn-lg btn-danger">
                                    <span class="bt-email">LOGIN NOW!</span>
                                </button>
                            </div>

                            <input type="hidden" name="_target_path" value="{{ url('/') }}">

                            </form>

                            <div class="mt-3">
                                <p>
                                    <strong><a class="link-2" href="{{ url('/forgot-password') }}">Forgot your password?</a></strong>
                                </p>
                            </div>

                            <p class="mt-5 heading-small pb-lg-5">
                                Not a member yet? <a href="javascript:void(0)" onclick="document.getElementById('id03').style.display='none';document.getElementById('id04').style.display='block'">Register now</a>
                            </p>

                        </div>
                    </div>

                </div>
            </ul>
        </div>
    </nav>
</header>
