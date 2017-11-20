@extends('layouts.app-light')

@section('breadcrumb-title')
    Manage Event
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('events') }}">Events</a></li>
    <li class="breadcrumb-item active">Manage Event</li>
@endsection

@section('breadcrumb-main')
    @include('partials.breadcrumb')
@endsection

@section('content')
    <div class="row el-element-overlay">
        <div class="col-md-5">

            <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1" style="height: 355px">
                    <img class="img-responsive" src="{{ url($event->image->image_path) }}" alt="" style="max-width: 100%; height: auto; width: auto\9;" />
                    <div class="el-overlay">
                        <ul class="el-info">
                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="{{ url($event->image->image_path) }}"><i class="icon-magnifier"></i></a></li>
                            <li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
                <div class="">
                    <a href="{{ route('event.booked', $event->id) }}" class="btn btn-red btn-outline-red" id="book-alert"><span class="btn-label"><i class=" mdi mdi-calendar-multiple-check"></i></span>Book</a>
                    <a href="{{ route('watch.event', $event->id) }}" class="btn btn-red btn-outline-red"><span class="btn-label"><i class=" mdi mdi-television"></i></span>Watch</a>
                    <a href="{{ route('event.general.edit', $event->id) }}" class="btn btn-red btn-outline-red"><span class="btn-label"><i class="mdi mdi-table-edit"></i></span>Edit</a>
                    <div class="pull-right">
                        <a href="{{ url('events/display') }}" class="btn btn-secondary waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-keyboard-return"></i></span>Back</a>
                    </div>
                </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table {{--table-bordered--}}">
                            <tr>
                                <th>Title</th>
                                <td>{{ $event->title }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $event->description }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{$event->category->name}}</td>
                            </tr>
                            <tr>
                                <th>Date & Time</th>
                                <td>{{ $event->event_date_time }}</td>
                            </tr>
                            <tr>
                                <th>Event Type</th>
                                @if($event->event_type == \App\Event::PAID_EVENT)
                                    <td>PAID</td>
                                @elseif($event->event_type == \App\Event::FREE_EVENT)
                                    <td>FREE</td>
                                @endif

                            </tr>
                            @if($event->event_type == \App\Event::PAID_EVENT)
                                <tr>
                                    <th>Amount</th>
                                    <td>&#8358; {{ $event->amount }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if($event->event_status == \App\Event::EVENT_PENDING)
                                        <span class="label label-warning">Pending</span>
                                    @elseif($event->event_status == \App\Event::EVENT_APPROVED)
                                        <span class="label label-success">Approved</span>
                                    @elseif($event->event_status == \App\Event::EVENT_CANCELED)
                                        <span class="label label-danger">Declined</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

    <div id="event_url" class="col-md-5">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @include('flash::message')
        <div class="card">
            <div class="card-block">
                <h3 class="card-title">Set Event Video URL</h3>

                {!! Form::model($event, ['route'=>['event.uri', $event->id], 'method'=>'POST']) !!}

                <div class="form-group row">
                    <label for="uri" class="col-sm-3 text-right control-label col-form-label">Event Url*</label>
                    <div class="col-sm-7">
                        {!! Form::text('uri', null, array('placeholder' => 'include http://','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-red btn-sm btn-outline-red"><span class="btn-label"><i class="mdi mdi-update"></i> </span> Update</button>
                </div>

                {!! Form::close() !!}

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Link</th>
                            <th>Status</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($event->link))
                        <tr>
                            <td>{{ $event->link }}</td>
                            @if($event->link_status == \App\Event::LINK_DISABLED)
                                <td class="label label-danger">Disabled</td>
                            @elseif($event->link_status == \App\Event::LINK_ENABLED)
                                <td class="label label-success">Live</td>
                            @endif
                            <td class="text-nowrap">
                                <button class="btn-outline btn btn-pure" href="{{ route('event.golive', $event->id) }}" data-toggle="tooltip" data-original-title="Go Live"> <i class="fa fa-video-camera text-inverse m-r-10"></i> </button>
                                <button href="{{ route('event.disable', $event->id) }}" data-toggle="tooltip" data-original-title="Disable"> <i class="fa fa-close text-danger"></i> </button>
                            </td>
                        </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="guest" class="col-md-7">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Event Guest List</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Task</th>
                            <th>Progress</th>
                            <th>Deadline</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Lunar probe project</td>
                            <td>
                                <div class="progress progress-xs margin-vertical-10 ">
                                    <div class="progress-bar bg-danger" {{--style="width: 35%; height:6px;"--}}></div>
                                </div>
                            </td>
                            <td>May 15, 2015</td>
                            <td class="text-nowrap">
                                <a href="#" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                <a href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Dream successful plan</td>
                            <td>
                                <div class="progress progress-xs margin-vertical-10 ">
                                    <div class="progress-bar bg-warning" style="width: 50%; height:6px;"></div>
                                </div>
                            </td>
                            <td>July 1, 2015</td>
                            <td class="text-nowrap">
                                <a href="#" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                <a href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Office automatization</td>
                            <td>
                                <div class="progress progress-xs margin-vertical-10 ">
                                    <div class="progress-bar bg-success" style="width: 100%; height:6px;"></div>
                                </div>
                            </td>
                            <td>Apr 12, 2015</td>
                            <td class="text-nowrap">
                                <a href="#" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                <a href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                            </td>
                        </tr>
                        <tr>
                            <td>The sun climbing plan</td>
                            <td>
                                <div class="progress progress-xs margin-vertical-10 ">
                                    <div class="progress-bar bg-primary" style="width: 70%; height:6px;"></div>
                                </div>
                            </td>
                            <td>Aug 9, 2015</td>
                            <td class="text-nowrap">
                                <a href="#" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                <a href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Open strategy</td>
                            <td>
                                <div class="progress progress-xs margin-vertical-10 ">
                                    <div class="progress-bar bg-info" style="width: 85%; height:6px;"></div>
                                </div>
                            </td>
                            <td>Apr 2, 2015</td>
                            <td class="text-nowrap">
                                <a href="#" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                <a href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Tantas earum numeris</td>
                            <td>
                                <div class="progress progress-xs margin-vertical-10 ">
                                    <div class="progress-bar bg-inverse" style="width: 50%; height:6px;"></div>
                                </div>
                            </td>
                            <td>July 11, 2015</td>
                            <td class="text-nowrap">
                                <a href="#" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                <a href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-success">Go somewhere</a>
            </div>
        </div>
    </div>

</div>
@endsection