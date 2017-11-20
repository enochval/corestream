@extends('layouts.app-light')

@section('breadcrumb-title')
    My Account
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item active">My Account</li>
@endsection

@section('breadcrumb-main')
    @include('partials.breadcrumb')
@endsection

@section('content')

    @include('flash::message')
    @if($errors->any())
        @foreach($errors->all() as $err)
            <div class="alert alert-danger alert-go">
                <strong>{{$err}}</strong><br>
            </div>
        @endforeach
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Personal Info<span class="btn btn-red btn-outline-red pull-right edit"><span class="btn-label"><i class="mdi mdi-pencil"></i> </span> Edit Info</span></h4>
                    <hr>

                    <small class="text-muted">Full Name </small>
                    <h6>{{ $user->full_name }}</h6>

                    <small class="text-muted">Email address </small>
                    <h6>{{ $user->email }}</h6>
                    <small class="text-muted p-t-30 db">Phone</small>
                    <h6>{{ $user->phone }}</h6>
                    <small class="text-muted p-t-30 db">Address</small>
                    <h6>{{ $user->billing_address }}</h6>
                    <div class="map-box">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <small class="text-muted p-t-30 db">Social Profile</small>
                    <br/>
                    <button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button>
                    <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
                    <button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button>
                </div>
            </div>


            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Change Password</h4>
                    <hr>

                    {!! Form::open(['method' => 'PATCH', 'route' => ['auth.change_password']], ['class'=>'form-horizontal']) !!}
                    <div class="form-group row">
                        <label for="current_password" class="col-sm-3 text-right control-label col-form-label">Current Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="current_password" placeholder="Current Password">
                            <p class="help-block"></p>
                            @if($errors->has('current_password'))
                                <p class="help-block">
                                    {{ $errors->first('current_password') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="new_password" class="col-sm-3 text-right control-label col-form-label">New Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="new_password" placeholder="New Password">
                            <p class="help-block"></p>
                            @if($errors->has('new_password'))
                                <p class="help-block">
                                    {{ $errors->first('new_password') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="new_password_confirmation" class="col-sm-3 text-right control-label col-form-label">Re-Enter New Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="new_password_confirmation" placeholder="Re-enter New Password">
                            <p class="help-block"></p>
                            @if($errors->has('new_password_confirmation'))
                                <p class="help-block">
                                    {{ $errors->first('new_password_confirmation') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    {!! Form::submit('Update', ['class' => 'btn btn-red btn-outline-red pull-right']) !!}
                    {!! Form::close() !!}



                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Edit Account Information</h4>
                    <hr>
                    {!! Form::model($user, ['route' => ['profile.update', $user->id], 'method' => 'PATCH', 'class' => '']) !!}

                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control update" id="full_name" name="full_name" value="{{ $user->full_name }}" placeholder="Full Name" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-email"></i></div>
                                <input type="email" class="form-control update" id="email" name="email" value="{{ $user->email }}" placeholder="Enter e-mail" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Phone</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                <input type="tel" class="form-control update" id="phone" name="phone" value="{{ $user->phone }}" placeholder="Enter Phone" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Billing Address</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                <input type="text" class="form-control update" id="billing_address" name="billing_address" value="{{ $user->billing_address }}" placeholder="Enter billing address" disabled>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-red btn-outline-red waves-effect waves-light m-r-10 pull-right"><span class="btn-label"><i class="mdi mdi-update"></i> </span> Update</button>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
