@extends('layouts.app-light')

@section('breadcrumb-title')
    Events
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item active">Events</li>
@endsection

@section('breadcrumb-main')
    @include('partials.breadcrumb')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-block">
                    <h2 class="card-title text-center">Available Events</h2>
                    <hr>
                    <!-- Nav tabs -->
                    <div class="vtabs">
                        <ul class="nav nav-tabs tabs-vertical" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#allCategories" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">All Categories</span> </a> </li>
                            @foreach($categories as $category)
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#{{ $category->name }}" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">{{ $category->name }}</span></a> </li>
                            @endforeach


                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="allCategories" role="tabpanel">
                                @foreach($events as $event)
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 image-popups2">
                                                    <a href="{{ url($event->image->image_path) }}" data-effect="{{ $image_class[rand(0, 5)] }}"><img src="{{ url($event->image->image_path) }}" class="img-responsive img" /></a>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <h4 class="card-title">{{ $event->title }}</h4>
                                                        <h6 class="card-subtitle mb-2 text-muted">{{ $event->event_date_time }}</h6>
                                                        <p class="card-text">{{ $event->description }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <div>
                                                        @if($event->event_type == \App\Event::FREE_EVENT)
                                                            <h6 class="label label-red"><i class="mdi mdi-emoticon-happy"></i> FREE</h6>
                                                        @elseif($event->event_type == \App\Event::PAID_EVENT)
                                                            <h6 class="label label-red">{{--<i class="--}}{{--mdi mdi-cash-multiple--}}{{--"></i>--}} &#8358; {{ $event->amount }}</h6>
                                                        @endif
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('event.details', $event->id)}}" class="btn btn-red btn-outline-red"><span class="btn-label"><i class=" mdi mdi-calendar-multiple-check"></i></span> View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                    {{ $events->links() }}
                            </div>



                            @foreach($categories as $category)
                                <div class="tab-pane p-20" id="{{ $category->name }}" role="tabpanel">

                                    @foreach(\App\Event::eventByCategory($category->id) as $event)
                                        <div class="card">
                                            <div class="card-block">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 image-popups2">
                                                        <a href="{{ url($event->image->image_path) }}" data-effect="{{ $image_class[rand(0, 5)] }}"><img src="{{ url($event->image->image_path) }}" class="img-responsive img" /></a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div>
                                                            <h4 class="card-title">{{ $event->title }}</h4>
                                                            <h6 class="card-subtitle mb-2 text-muted">{{ $event->event_date_time }}</h6>
                                                            <p class="card-text">{{ $event->description }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div>
                                                            <div>
                                                                @if($event->event_type == \App\Event::FREE_EVENT)
                                                                    <h6 class="label label-red"><i class="mdi mdi-emoticon-happy"></i> FREE</h6>
                                                                @elseif($event->event_type == \App\Event::PAID_EVENT)
                                                                    <h6 class="label label-red"><i class="mdi mdi-cash-multiple"></i> &#8358; {{ $event->amount }}</h6>
                                                                @endif
                                                            </div>
                                                            <div {{--style="text-align: center"--}}>
                                                                <a href="{{ route('event.details', $event->id)}}" class="btn btn-red btn-outline-red"><span class="btn-label"><i class=" mdi mdi-calendar-multiple-check"></i></span> View</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{ \App\Event::eventByCategory($category->id)->links() }}

                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-block">
                    <h2 class="card-title text-center">Ads</h2>
                    <hr>
                </div>
            </div>
        </div>

    </div>

@endsection