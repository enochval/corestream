@extends('layouts.app-light')

@section('breadcrumb-title')
    Edit Role
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/roles') }}">Roles</a></li>
    <li class="breadcrumb-item active">Edit Role</li>
@endsection

@section('breadcrumb-main')
    @include('partials.breadcrumb')
@endsection

@section('content')
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
    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]], ['class'=>'form-horizontal']) !!}
    <div class="row">
        <div class="col-10 col-md-offset-4">
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {!! Form::text('display_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <strong>Description:</strong>
                            {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>
                            @foreach($permission as $value)
                                {{--<label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                    {{ $value->display_name }}</label>--}}

                                <input type="checkbox" id="md_checkbox_{{$value->id}}" name="permission[]" class="filled-in chk-col-red" value="{{ $value->id, in_array($value->id, $rolePermissions) ? true : false }}">
                                <label for="md_checkbox_{{$value->id}}">{{ $value->display_name }}</label>
                                <br/>
                            @endforeach
                        </div>
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-lg btn-rounded btn-secondary pull-right" data-toggle="tooltip" data-original-title="Update Role">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection