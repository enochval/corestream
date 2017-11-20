@extends('layouts.app-light')

@section('breadcrumb-title')
    Event Summary
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/events/display') }}">Events</a></li>
    <li class="breadcrumb-item active">Event Summary</li>
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
            <form method="POST" action="{{ route('pay', $event->id) }}" accept-charset="UTF-8" {{--class="form-inline"--}} role="form">
            <div class="">
                @if($event_host_id != auth()->id())
                    @if(\App\BookedEvent::isBooked($event->id))
                        <button class="btn btn-red"><span class="btn-label"><i class="mdi mdi-check"></i></span>Booked</button>
                        @if($event->event_type == \App\Event::PAID_EVENT && !\App\BookedEvent::hasPaidBooked($event->id))
                            <input type="hidden" name="email" value="{{ auth()->user()->email }}"> {{-- required --}}
                            <input type="hidden" name="first_name" value="{{ auth()->user()->full_name }}">
                            <input type="hidden" id="amount" name="amount" value="{{ $event->amount * \App\Payment::KOBO }}"> {{-- required in kobo --}}
                            <input type="hidden" id="amount" name="callback_url" value="{{ url('/payment/book/callback') }}">
                            <input type="hidden" name="reference" value="{{ \Unicodeveloper\Paystack\Facades\Paystack::genTranxRef() }}"> {{-- required --}}
                            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                            {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}
                            <button type="submit" value="Pay Now!" class="btn btn-red btn-outline-red"><span class="btn-label"><i class=" mdi mdi-cash-multiple"></i></span>Pay Now</button>

                        @endif
                    @else
                        <a href="{{ route('event.booked', $event->id) }}" class="btn btn-red btn-outline-red" id="book-alert"><span class="btn-label"><i class=" mdi mdi-calendar-multiple-check"></i></span>Book</a>
                    @endif
                @endif

                @if($event_host_id == auth()->id() || $event_host_id != auth()->id())
                    @if($event->event_type == \App\Event::PAID_EVENT && \App\BookedEvent::hasPaidBooked($event->id) || $event_host_id == auth()->id())
                        <a href="{{ route('watch.event', $event->id) }}" class="btn btn-red btn-outline-red"><span class="btn-label"><i class=" mdi mdi-television"></i></span>Watch</a>
                    @elseif($event->event_type == \App\Event::FREE_EVENT)
                        <a href="{{ route('watch.event', $event->id) }}" class="btn btn-red btn-outline-red"><span class="btn-label"><i class=" mdi mdi-television"></i></span>Watch</a>
                    @endif
                @endif

                @if($event_host_id == auth()->id())
                    <a href="{{ route('event.general.edit', $event->id) }}" class="btn btn-red btn-outline-red"><span class="btn-label"><i class="mdi mdi-table-edit"></i></span>Edit</a>
                @endif
                <div class="pull-right">
                    <a href="{{ url('events/display') }}" class="btn btn-secondary {{--btn-outline-secondary--}} waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-keyboard-return"></i></span>Back</a>
                </div>
            </div>
            </form>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-block text-center">
                    <div class="card-title text-center">
                        <h1>{{$event->title}}</h1>
                    </div>
                    <hr>
                    <div>
                        <h5>Description:</h5>
                        <p>{{$event->description}}</p>
                        <h5>Category:</h5>
                        <p>{{$event->category->name}}</p>
                        <h5>Date and Time:</h5>
                        <p>{{$event->event_date_time}}</p>
                        <h5>Event Type:</h5>
                        <p>
                            @if($event->event_type == \App\Event::PAID_EVENT)
                                PAID
                            @elseif($event->event_type == \App\Event::FREE_EVENT)
                                FREE
                            @endif
                        </p>
                        @if($event->event_type == \App\Event::PAID_EVENT)
                            <h5>Amount:</h5>
                            <p>&#8358; {{$event->amount}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection