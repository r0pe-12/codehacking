@extends('layouts.admin')

    @section('content')
        <h1>Edit User: {{ $user->name }}</h1>
        @include('includes.form-error')

        <div class="row">
            <div class="col-sm-3">
                <img src="{{ $user->photo ? $user->photo->file : 'https://via.placeholder.com/900x900.png/280137?text=NO%20PHOTO' }}" alt=""  class="img img-responsive img-rounded">
            </div>

            <div class="col-sm-9">
                {!! Form::model($user, ['method'=>'PUT', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
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
                            {!! Form::select('is_active', array('Not Active', 'Active'), null, ['class'=>'form-control']) !!}
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
                    {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-6']) !!}
                    {!! Form::reset('Reset', ['class'=>'btn btn-danger col-sm-6']) !!}
                {!! Form::close() !!}
                <hr>
                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user]]) !!}
                        {!! Form::submit('DELETE USER', ['class'=>'btn btn-danger col-sm-12']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    @endsection
