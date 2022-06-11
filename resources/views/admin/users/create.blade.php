@extends('layouts.admin')

    @section('content')
        <h1>Create Users</h1>
        @include('includes.form-error')
            {!! Form::open(['method'=>'Post', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}

                    <br><br>

                    <div class="form-group">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::email('email', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('role_id', 'Role:') !!}
                        {!! Form::select('role_id', [''=>'Choose Options'] + $roles, null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('is_active', 'Status:') !!}
                        {!! Form::select('is_active', array('Not Active', 'Active'), 0, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('photo_id', 'Photo:') !!}
                        {!! Form::file('photo_id', ['class'=>'form-control']) !!}
                    </div>


                    <div class="form-group">
                        {!! Form::label('password', 'Password:') !!}
                        {!! Form::password('password', ['class'=>'form-control']) !!}
                    </div>




                </div>
                <br>
                    {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
                    {!! Form::reset('Reset', ['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
    @endsection
