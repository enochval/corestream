@extends('layouts.app-light')

@section('breadcrumb-title')
    Event Summary
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/package') }}">Select Package</a></li>
    <li class="breadcrumb-item"><a href="{{ route('event.edit', $event->id) }}">Edit Event</a></li>
    <li class="breadcrumb-item active">Event Summary</li>
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
                <h4 class="card-title">Event Details</h4>
                <div class="row">
                    <div id="image-popups" class="col-lg-4 col-md-3">
                        <a href="{{ url($event->image->image_path) }}" data-effect="{{ \App\Event::IMAGE_CLASS[rand(0, 5)] }}"><img src="{{ url($event->image->image_path) }}" class="img-responsive img-fluid" /></a>
                    </div>
                    <div class="col-lg-8 col-md-9">
                        <div id="slimtest1">
                            <div class="row">
                                <div class="col-3">
                                    <h4>Event Title:</h4>
                                </div>
                                <div class="col-6">
                                    <small>{{ $event->title }}</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h4>Description:</h4>
                                </div>
                                <div class="col-6">
                                    <small>{{ $event->description }}</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h4>Date & Time:</h4>
                                </div>
                                <div class="col-6">
                                    <small>{{ $event->event_date_time }}</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h4>Event Type:</h4>
                                </div>
                                <div class="col-6">
                                    <small>
                                        @if($event->event_type == \App\Event::FREE_EVENT)
                                            <i>FREE</i>
                                        @elseif($event->event_type == \App\Event::PAID_EVENT)
                                            <i>PAID</i>
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h4>Category:</h4>
                                </div>
                                <div class="col-6">
                                    <small>{{ $event->category->name }}</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="offset-md-6 col-md-4">

                                    <a href="{{ route('event.invoice', $event->id) }}" class="btn btn-danger"><i class="fa fa-check"></i> Proceed</a>
                                    <a href="{{ route('event.edit', $event->id) }}" class="btn btn-inverse"><i class="fa fa-pencil"></i> Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>

@endsection