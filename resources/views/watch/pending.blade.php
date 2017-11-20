@extends('layouts.app-light')


@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-block">
                    <h1 class="card-title">{{ $event->title }}</h1>
                    <hr>
                    <div class="body-d">
                        <iframe width="700" height="480" src="{{ ($event->link_status == \App\Event::LINK_ENABLED) ? $event->link : "https://www.youtube.com/embed/rS7tolYitis"  }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-block">
                    <h1 class="card-title">Guest Involvement</h1>
                    <hr>

                </div>
            </div>
        </div>
    </div>
@endsection