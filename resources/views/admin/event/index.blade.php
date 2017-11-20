@extends('layouts.app-light')

@section('breadcrumb-title')
    Events
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Events</li>
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

                    <div class="row m-t-40">

                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <div class="card card-inverse card-info">
                                <div class="box bg-info text-center">
                                    <h1 class="font-light text-white">{{ count($hosted) }}</h1>
                                    <h6 class="text-white">Event Hosted</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <div class="card card-primary card-inverse">
                                <div class="box text-center">
                                    <h1 class="font-light text-white">1,738</h1>
                                    <h6 class="text-white">Event Booked</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <div class="card card-inverse card-success">
                                <div class="box text-center">
                                    <h1 class="font-light text-white">1100</h1>
                                    <h6 class="text-white">Event Viewed</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <div class="card card-inverse card-dark">
                                <div class="box text-center">
                                    <h1 class="font-light text-white">964</h1>
                                    <h6 class="text-white">Event Running</h6>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card">
                        <div class="card-block">
                            <h6 class="card-subtitle">Event Management</h6>
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-bordered contact-list">
                                    <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Date $ Time</th>
                                        <th>Amount</th>
                                        <th>Event Status</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($hosted as $i => $host)
                                        <tr>
                                            <td>{{ $host->event->user->full_name }}</td>
                                            <td>
                                                <div>{{ $host->event->title }}</div>
                                            </td>
                                            <td>
                                                @if($host->event->event_type == \App\Event::FREE_EVENT)
                                                    FREE
                                                @elseif($host->event->event_type == \App\Event::PAID_EVENT)
                                                    PAID
                                                @endif
                                            </td>
                                            <td>{{ $host->event->event_date_time }}</td>
                                            <td>
                                                @if($host->event->event_type == \App\Event::PAID_EVENT)
                                                    {{ $host->event->amount }}
                                                @else
                                                    NILL
                                                @endif
                                            </td>
                                            <td id="status{{$host->event->id}}">
                                                @if($host->event->event_status == \App\Event::EVENT_PENDING)
                                                    <span class="label label-warning">Pending</span>
                                                @elseif($host->event->event_status == \App\Event::EVENT_APPROVED)
                                                    <span class="label label-success">Approved</span>
                                                @elseif($host->event->event_status == \App\Event::EVENT_CANCELED)
                                                    <span class="label label-danger">Declined</span>
                                                @endif
                                            </td>
                                            <td>NOT PAID</td>
                                            <td>
                                                <a href="{{ route('manage.event', $host->event->id) }}" class="btn btn-sm btn-outline-red" data-toggle="tooltip" data-original-title="Manage Event"><i class="ti-settings" aria-hidden="true"></i></a>
                                                <button onclick="approve({{$host->event->id}})" class="btn btn-sm btn-outline-red ld-ext-right running" data-toggle="tooltip" data-original-title="Approve Event"><i class="ti-check" aria-hidden="true"></i></button>
                                                <button onclick="decline({{$host->event->id}})" class="btn btn-sm btn-outline-red" data-toggle="tooltip" data-original-title="Decline Event"><i class="ti-close" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection