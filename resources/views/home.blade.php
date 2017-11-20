@extends('layouts.app-light')

@section('banner')

    @include('partials.banner')

@endsection

@section('upcoming')

    @include('partials.upcoming')

@endsection

@section('content')

<div class="container">

    @include('partials.trending')

</div>
@endsection
