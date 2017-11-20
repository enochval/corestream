@extends('layouts.auth')

@section('content')
    <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-block">
                @if($errors->any())
                    @foreach($errors->all() as $err)
                        <div class="alert alert-danger alert-go">
                            <strong>{{$err}}</strong><br>
                        </div>
                    @endforeach
                @endif
                <form class="form-horizontal form-material" id="loginform" action="{{ url('/login') }}" method="post">

                    {{ csrf_field() }}

                    <h3 class="box-title m-b-20">Sign In</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name="email" placeholder="email"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" name="password" placeholder="Password"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div> <a href="{{ url('password/reset') }}" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social">
                                <a href="{{ route('facebook.login') }}" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                                <a href="{{ route('twitter.login') }}" class="btn btn-twitter" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-twitter"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Don't have an account? <a href="{{ route('register') }}" class="text-info m-l-5"><b>Sign Up</b></a></p>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
