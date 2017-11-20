@extends('layouts.app-light')

@section('breadcrumb-title')
    My Events
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item active">My Events</li>
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
                    <h4 class="card-title">Manage Event</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#hosted" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Hosted</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#booked" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Booked</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#viewed" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Viewed</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="hosted" role="tabpanel">
                                    <div class="p-20">
                                        <div class="table-responsive">
                                            <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                                <thead>
                                                <tr>
                                                    <th>ID #</th>
                                                    <th>Title</th>
                                                    <th>Type</th>
                                                    <th>Date $ Time</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Category</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($hosted as $i => $host)
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>
                                                        <div><img src="{{ $host->event->image->image_path }}" alt="user" class="img-circle" /> {{ $host->event->title }}</div>
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
                                                    <td><span class="label label-warning">Pending</span> </td>
                                                    <td>{{ $host->event->category->name }}</td>
                                                    <td>
                                                        <a href="{{ route('event.details', $host->event->id) }}" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Manage Event"><i class="ti-settings" aria-hidden="true"></i></a>
                                                        <a href="#" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Cancel"><i class="ti-close" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>

                                                @endforeach

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td colspan="2">
                                                        <a href="{{ url('package') }}" class="btn btn-red btn-outline-red"><span class="btn-label"><i class="mdi mdi-microphone-variant"></i> </span> Host New Event</a>
                                                    </td>
                                                    <td colspan="6">
                                                        <div class="text-right">
                                                            <ul class="pagination"> </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane  p-20" id="booked" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                            <thead>
                                            <tr>
                                                <th>ID #</th>
                                                <th>Title</th>
                                                <th>Type</th>
                                                <th>Date $ Time</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($booked as $i => $book)
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>
                                                        <div><img src="{{ $book->event->image->image_path }}" alt="user" class="img-circle" /> {{ $book->event->title }}</div>
                                                    </td>
                                                    <td>
                                                        @if($book->event->event_type == \App\Event::FREE_EVENT)
                                                            FREE
                                                        @elseif($book->event->event_type == \App\Event::PAID_EVENT)
                                                            PAID
                                                        @endif
                                                    </td>
                                                    <td>{{ $book->event->event_date_time }}</td>
                                                    <td>
                                                        @if($book->event->event_type == \App\Event::PAID_EVENT)
                                                            {{ $book->event->amount }}
                                                        @else
                                                            NILL
                                                        @endif
                                                    </td>
                                                    <td><span class="label label-warning">Pending</span> </td>
                                                    <td>{{ $book->event->category->name }}</td>
                                                    <td>
                                                        <a href="{{ route('event.details', $book->event->id) }}" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="View Event"><i class="ti-book" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>

                                            @endforeach

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="2">
                                                    <a href="{{ url('events/display') }}" class="btn btn-red btn-outline-red"><span class="btn-label"><i class="mdi mdi-calendar-plus"></i> </span> Book New Event</a>
                                                </td>
                                                <td colspan="6">
                                                    <div class="text-right">
                                                        <ul class="pagination"> </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane p-20" id="viewed" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                            <thead>
                                            <tr>
                                                <th>ID #</th>
                                                <th>Title</th>
                                                <th>Type</th>
                                                <th>Date $ Time</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="2">
                                                    <a href="#" type="button" class="btn btn-red btn-outline-red">Book New Event</a>                                                   </td>
                                                <td colspan="6">
                                                    <div class="text-right">
                                                        <ul class="pagination"> </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection