@extends('layouts.app-light')

@section('content')

    <div class="tab-content tabcontent-border">
        <div class="tab-pane active" id="home8" role="tabpanel">
            <div class="card event-card ribbon-wrapper fish">
                <div class="ribbon ribbon-default ribbon-bookmark">Ayo Weds Ayo</div>
                <div class="panel panel-default">
                    <div class="row">
                        <div class="ribbon-wrapper-right-bottom card panel-content col-md-9 ">
                            <p>Description: The magical couple of 2050 will be celegration their italian theme wedding at canada in lewisham shopping center </p>
                            <p>Category: Wedding</p>
                            <p>Date: 2050/05/17</p>
                            <p>Time: 13:55</p>
                            <p>Event type: Paid</p>
                        </div>
                        <img class="card-img-top img-responsive event-image panel-heading col-md-3 img-rounded" src="{{ url('assets/images/myimages/ayowedsayo.jpg')}}" alt="Card image cap">
                    </div>
                </div>
            </div>
        </div>

@endsection