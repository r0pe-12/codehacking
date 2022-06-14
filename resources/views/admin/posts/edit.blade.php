@extends('layouts.admin')

    @section('content')
        <h1>Edit Post</h1>
        @include('includes.tinymce')
        @include('includes.form-error')
        <div class="row">
            <div class="col-sm-3">
                <a href="{{ route('posts.edit', $post) }}">
                    <img src="{{ $post->photo ? $post->photo->file : 'https://via.placeholder.com/900x900.png/280137?text=NO%20PHOTO' }}" alt="" class="img img-responsive img-rounded">
                </a>
            </div>
            <div class="col-sm-9">
                {!! Form::model($post, ['method'=>'PUT', 'action'=>['AdminPostsController@update', $post], 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Category:') !!}
                    {!! Form::select('category_id', [''=>'Select Category'] + $categories, null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('photo_id', 'Photo:') !!}
                    {!! Form::file('photo_id', ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Body:') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>5]) !!}
                </div>

                <br>
                {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-6']) !!}
                {!! Form::close() !!}

                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post]]) !!}
                    {!! Form::submit('DELETE Post', ['class'=>'btn btn-danger col-sm-6']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    @endsection
