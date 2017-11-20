@extends('layouts.app-light')

@section('breadcrumb-title')
    Role Management
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Roles</li>
@endsection

@section('breadcrumb-main')
    @include('partials.breadcrumb')
@endsection

@section('content')
    <div class="modal fade" id="create_role"  role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('roles.store') }}" method="POST" class="form-horizontal">

                    {{ csrf_field() }}

                    <div class="modal-header">
                        <h4 class="modal-title">Create New Role</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="card card-block">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-right control-label col-form-label">Name*</label>
                            <div class="col-sm-7">
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="display_name" class="col-sm-3 text-right control-label col-form-label">Display Name*</label>
                            <div class="col-sm-7">
                                {!! Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 text-right control-label col-form-label">Description*</label>
                            <div class="col-sm-7">
                                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="permission" class="col-sm-3 text-right control-label col-form-label">Permission*</label>
                            <div class="col-sm-7">
                                @foreach($permission as $value)
                                    {{--<label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->display_name }}</label>--}}

                                    <input type="checkbox" id="md_checkbox_{{$value->id}}" name="permission[]" class="filled-in chk-col-red">
                                    <label for="md_checkbox_{{$value->id}}">{{ $value->display_name }}</label>
                                    <br/>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-inverse btn-outline-inverse" data-dismiss="modal"><span class="btn-label"><i class="mdi mdi-close"></i> </span> Close</button>
                        <button type="submit" class="btn btn-red btn-outline-red"><span class="btn-label"><i class="mdi mdi-security"></i> </span> Create Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <div class="pull-right mb-3">
                        {{--@permission('role-create')--}}
                        <button type="button" class="btn btn-red btn-outline-red" data-toggle="modal" data-target="#create_role"><span class="btn-label"><i class="mdi mdi-security"></i> </span> Create New Role </button>
                        {{--@endpermission--}}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->display_name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>
                                       {{-- @permission('role-edit')--}}
                                        <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-sm btn-outline-red" data-toggle="tooltip" data-original-title="Edit Role"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        {{--@endpermission--}}
                                        {{--@permission('role-delete')--}}
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline', 'onclick'=>'']) !!}
                                        <button type="submit" class="btn btn-sm btn-outline-red" data-toggle="tooltip" data-original-title="Delete Role"><i class="fa fa-close" aria-hidden="true"></i></button>
                                        {{--{!! Form::button('type'=>'submit', 'classs'=>'fa fa-close', ['class' => 'btn btn-danger', 'data-toggle'=>'tooltip', 'data-original-title'=>'Delete Role']) !!}--}}
                                        {!! Form::close() !!}
                                        {{--@endpermission--}}
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

    {!! $roles->render() !!}
@endsection