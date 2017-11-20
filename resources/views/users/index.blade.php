@extends('layouts.app-light')

@section('breadcrumb-title')
    Users Management
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Users</li>
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

    <div class="modal fade" id="create_user"  role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('users.store') }}" method="POST" class="form-horizontal">

                    {{ csrf_field() }}

                    <div class="modal-header">
                        <h4 class="modal-title">Create New User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                        <div class="card card-block">
                            <div class="form-group row">
                                <label for="full_name" class="col-sm-3 text-right control-label col-form-label">Full Name*</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="full_name" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 text-right control-label col-form-label">Email*</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 text-right control-label col-form-label">Password*</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-3 text-right control-label col-form-label">Re Password*</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="confirm-password" placeholder="Retype Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 text-right control-label col-form-label">Phone*</label>
                                <div class="col-sm-7">
                                    <input type="tel" class="form-control" name="phone" placeholder="Phone">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 text-right control-label col-form-label">Role*</label>
                                <div class="col-sm-7">
                                    {!! Form::select('roles[]', $roles,[], ['class' => 'form-control','multiple']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="billing_address" class="col-sm-3 text-right control-label col-form-label">Billing Address</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" placeholder="Enter billing address..." cols="" rows=""></textarea>
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-inverse" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-red btn-outline-red"><span class="btn-label"><i class="fa fa-user"></i> </span> Create User</button>
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
                    <div class="pull-right margin-tb">
                        <button type="button" class="btn btn-red btn-outline-red" data-toggle="modal" data-target="#create_user"><span class="btn-label"><i class="fa fa-user"></i> </span> Create New User </button>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Roles</th>
                                <th>Billing Address</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $key => $user)
                                @if(!empty($user->id))
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->full_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @if(!empty($user->roles))
                                                @foreach($user->roles as $v)
                                                    <label class="label label-red">{{ $v->display_name }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>{{ $user->billing_address }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-red" data-toggle="modal" data-target="#edit_user{{ $user->id }}">Edit</button>

                                            <div class="modal fade" id="edit_user{{ $user->id }}"  role="dialog">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        {!! Form::model($user, ['method' => 'PATCH', 'route'=>['users.update', $user->id]], ['class'=>'form-horizontal']) !!}
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Create New User</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="card card-block">
                                                                <div class="form-group row">
                                                                    <label for="full_name" class="col-sm-3 text-right control-label col-form-label">Full Name*</label>
                                                                    <div class="col-sm-7">
                                                                        {!! Form::text('full_name', null, ['class'=>'form-control', 'placeholder'=>'Full Name']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="email" class="col-sm-3 text-right control-label col-form-label">Email*</label>
                                                                    <div class="col-sm-7">
                                                                        {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="password" class="col-sm-3 text-right control-label col-form-label">Password*</label>
                                                                    <div class="col-sm-7">
                                                                        {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="confirm-password" class="col-sm-3 text-right control-label col-form-label">Re Password*</label>
                                                                    <div class="col-sm-7">
                                                                        {!! Form::password('confirm-password', ['class'=>'form-control', 'placeholder'=>'Retype Password']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="phone" class="col-sm-3 text-right control-label col-form-label">Phone*</label>
                                                                    <div class="col-sm-7">
                                                                        {!! Form::tel('phone', null, ['class'=>'form-control', 'placeholder'=>'Phone']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="phone" class="col-sm-3 text-right control-label col-form-label">Role*</label>
                                                                    <div class="col-sm-7">
                                                                        {!! Form::select('roles[]', $roles,[], ['class' => 'form-control','multiple']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="billing_address" class="col-sm-3 text-right control-label col-form-label">Billing Address</label>
                                                                    <div class="col-sm-7">
                                                                        {!! Form::textarea('billing_address', null, ['class'=>'form-control', 'placeholder'=>'Enter billing address...', 'cols'=>'', 'rows'=>'']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                {!! Form::submit('Update User', ['class'=>'btn btn-outline-red']) !!}
                                                            </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>

                                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-outline-red']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection