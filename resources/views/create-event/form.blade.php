@extends('layouts.app-light')

@section('breadcrumb-title')
    Create Event
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/package') }}">Select Package</a></li>
    <li class="breadcrumb-item active">Create Event</li>
@endsection

@section('breadcrumb-main')
    @include('partials.breadcrumb')
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block wizard-content ">
                <h4 class="card-title">Host Event</h4>
                <h6 class="card-subtitle">Fill the form to create your event</h6>

                {!! Form::open(['route' => 'event.store', 'method' => 'POST', 'files' => true, 'class' => 'tab-wizard vertical wizard-circle']) !!}
                    <!-- Step 1 -->
                    <h6>Category</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-8 mt-5 pb-5">
                                <div class="form-group row mt-3">
                                    {!! Form::label('category_id', 'Select Category', ['class'=>'control-label text-right col-md-3']) !!}
                                    <div class="col-md-9">
                                        {!! Form::select('category_id', $category, null, ['placeholder'=>'Select Category', 'tabindex'=>'1', 'class'=>'form-control custom-select']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Step 2 -->
                    <h6>Event Info</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-8 mt-4">
                                <div class="form-group row">
                                    {!! Form::label('title', 'Event Title', ['class'=>'control-label text-right col-md-3']) !!}
                                    <div class="col-md-9">
                                        {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Enter the title of your event']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 mt-4">
                                <div class="form-group row">
                                    {!! Form::label('description', 'Description', ['class'=>'control-label text-right col-md-3']) !!}
                                    <div class="col-md-9">
                                        {!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Enter the title of your event', 'rows'=>'5', 'cols'=>'']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 mt-4">
                                <div class="form-group row">
                                    {!! Form::label('event_type', 'Event type', ['class'=>'control-label text-right col-md-3']) !!}
                                    <div class="col-md-9">
                                        <div class="radio-list">

                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="event_type" value="{{ \App\Event::FREE_EVENT }}" onclick="document.getElementById('paid').style.display = 'none'" checked>
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Free</span>
                                            </label>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="event_type" value="{{ \App\Event::PAID_EVENT }}" onclick="document.getElementById('paid').style.display = 'block'">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Paid</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="package_id" value="{{ $id }}">

                            <div class="col-md-8 mt-4" id="paid">
                                <div class="form-group row">
                                    {!! Form::label('amount', 'Event Amount', ['class'=>'control-label text-right col-md-3']) !!}
                                    <div class="col-md-9">
                                        {!! Form::number('amount', null, ['class'=>'form-control', 'placeholder'=>'Enter amount to view enter']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Step 3 -->
                    <h6>Schedule</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-8 mt-5 pb-5">
                                <div class="form-group row">
                                    {!! Form::label('event_date_time', 'Date & Time', ['class'=>'control-label text-right col-md-3']) !!}
                                    <div class="col-md-9">
                                        {!! Form::text('event_date_time', null, ['id'=>'date-format', 'class'=>'form-control', 'placeholder'=>'Day DD MM YYYY - HH:MM']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Step 4 -->
                    <h6>Uploads</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    {!! Form::label('image', 'Upload Image', ['class'=>'control-label text-right col-md-3']) !!}
                                    <div class="col-md-9">
                                        {!! Form::file('image', ['id'=>'input-file-now-custom-2', 'class'=>'dropify', 'data-height'=>'350']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection