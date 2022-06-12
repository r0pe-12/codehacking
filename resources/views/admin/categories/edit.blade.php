@extends('layouts.admin')

    @section('content')
        <h1>Edit Category: {{ $category->name}}</h1>
        <div class="row">
            <div class="col-sm-6">
                @include('includes.form-error')
                @include('includes.flash-sessions')
                {!! Form::model($category, ['method'=>'Put', 'action'=>['AdminCategoriesController@update', $category]]) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name: ') !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>
                    <br>
                        {!! Form::submit('Update Category', ['class'=>'btn btn-primary col-sm-5']) !!}
                {!! Form::close() !!}
                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category]]) !!}
                        {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-5 pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    @endsection
