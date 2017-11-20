@extends('layouts.app-light')

@section('breadcrumb-title')
    Event Invoice
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/package') }}">Select Package</a></li>
    <li class="breadcrumb-item"><a href="{{ route('event.edit', 27) }}">Edit Event</a></li>
    <li class="breadcrumb-item"><a href="{{ route('event.confirm', 27) }}">Event Summary</a></li>
    <li class="breadcrumb-item active">Event Invoice</li>
@endsection

@section('breadcrumb-main')
    @include('partials.breadcrumb')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-block printableArea">
                <h3><b>EVENT INVOICE</b> <span class="pull-right">#{{ $invoice->id }}</span></h3>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <address>
                                <h3> &nbsp;<b class="text-danger">CORE STREAM ADMIN</b></h3>
                                <p class="text-muted m-l-5">Admiralty Way,
                                    <br/> Lekki Phase 1,
                                    <br/> Lagos
                                </p>
                                    {{--<br/> Bhavnagar - 364002</p>--}}
                            </address>
                        </div>
                        <div class="pull-right text-right">
                            <address>
                                <h3>To,</h3>
                                <h4 class="font-bold">{{ auth()->user()->full_name }}</h4>
                                <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> {{ $invoice->created_at->toFormattedDateString() }}</p>
                                {{--<p><b>Due Date :</b> <i class="fa fa-calendar"></i> 25th Jan 2017</p>--}}
                            </address>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive m-t-40" style="clear: both;">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Description</th>
                                    <th class="text-right">Per Hour</th>
                                    <th class="text-right">Unit Cost</th>
                                    <th class="text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>{{ $event->package->name }}</td>
                                    <td class="text-right">1 </td>
                                    <td class="text-right">&#8358; {{ $event->package->amount }} </td>
                                    <td class="text-right">&#8358; {{ $event->package->amount }} </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('pay', $event->id) }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                            <div class="pull-right m-t-30 text-right">
                                <p>Sub - Total amount: &#8358; {{ $event->package->amount }}  X  <input type="number" id="event-duration" placeholder="Enter Duration" required></p>

                                <hr>
                                <h3><b>Total : &#8358;</b><span id="total"> {{ $event->package->amount }} </span> </h3>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="text-right">

                                    <input type="hidden" name="email" value="{{ auth()->user()->email }}"> {{-- required --}}
                                    <input type="hidden" name="first_name" value="{{ auth()->user()->full_name }}">
                                    <input type="hidden" id="amount" name="amount" value="0"> {{-- required in kobo --}}
                                    {{--<input type="hidden" name="quantity" value="3">--}}
                                    <input type="hidden" name="reference" value="{{ \Unicodeveloper\Paystack\Facades\Paystack::genTranxRef() }}"> {{-- required --}}
                                    <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                                    {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}


                                    <button type="submit" value="Pay Now!" class="btn btn-danger"> <i class="fa fa-check"></i> Proceed to payment</button>
                                    <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection