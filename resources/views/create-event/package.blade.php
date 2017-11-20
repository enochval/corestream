@extends('layouts.app-light')


@section('breadcrumb-title')
    Select Package
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item active">Select Package</li>
@endsection

@section('breadcrumb-main')
    @include('partials.breadcrumb')
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            @include('flash::message')
            <div class="card">
                <div class="card-block">
                    <div class="row pricing-plan">
                        @foreach($packages as $package)
                           @if($package->popular)
                                <div class="col-md-3 col-xs-12 col-sm-6 no-padding">
                                    <div class="pricing-box featured-plan">
                                        <div class="pricing-body">
                                            <div class="pricing-header">
                                                <h4 class="price-lable text-white bg-danger"> Popular</h4>
                                                <h4 class="text-center">{{ $package->name }}</h4>
                                                <h2 class="text-center"><span class="price-sign">&#8358;</span>{{ $package->amount }}</h2>
                                                <p class="uppercase">per month</p>
                                            </div>
                                            <div class="price-table-content">
                                                @foreach($package->services as $service)
                                                    <div class="price-row"><i class="icon-user"></i> {{ $service->name }}</div>
                                                @endforeach
                                                <div class="price-row">
                                                    <a href="{{ url('event/create/'.$package->id) }}" class="btn btn-lg btn-red btn-outline-red waves-effect waves-red m-t-20">Select</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           @else
                                <div class="col-md-3 col-xs-12 col-sm-6 no-padding">
                                <div class="pricing-box">
                                    <div class="pricing-body b-l">
                                        <div class="pricing-header">
                                            <h4 class="text-center">{{ $package->name }}</h4>
                                            <h2 class="text-center"><span class="price-sign">&#8358;</span>{{ $package->amount }}</h2>
                                            <p class="uppercase">{{ $package->period }}</p>
                                        </div>
                                        <div class="price-table-content">
                                            @foreach($package->services as $service)
                                                <div class="price-row"><i class="icon-user"></i> {{ $service->name }}</div>
                                            @endforeach

                                            <div class="price-row">
                                                <a href="{{ url('event/create/'.$package->id) }}" class="btn btn-red waves-effect waves-light m-t-20">Select</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection