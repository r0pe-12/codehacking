@extends('layouts.admin')

    @section('content')
        <h1>Posts</h1>
        @include('includes.flash-sessions')
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Owner</th>
                            <th>Category</th>
                            <th>Photo</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>DELETE</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td><a href="{{ route('users.edit', $post->user) }}">
                                        {{ $post->user->name }}
                                        </a></td>
                                    <td>{{ $post->category ? $post->category->name : 'No category' }}</td>
                                    <td><a href="{{ route('posts.edit', $post) }}">
                                            <img src="{{ $post->photo ? $post->photo->file : 'https://via.placeholder.com/900x900.png/280137?text=NO%20PHOTO' }}" alt="" width="100px" class="img img-rounded">
                                        </a></td>
                                    <td><a href="{{ route('posts.home', $post) }}" target="_blank">{{ $post->title }}</a></td>
                                    <td>{{ $post->body }}</td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post]]) !!}
                                            {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td><a href="{{ route('comments.show', $post) }}"><button class="btn btn-info">View Comments</button></a></td>
                                </tr>
                            @endforeach
                        </tbody>
{{--                        <tfoot>--}}
{{--                        <tr>--}}
{{--                            <th>Id</th>--}}
{{--                            <th>Username</th>--}}
{{--                            <th>Name</th>--}}
{{--                            <th>Avatar</th>--}}
{{--                            <th>Email</th>--}}
{{--                            <th>Created At</th>--}}
{{--                            <th>Updated At</th>--}}
{{--                            <th>DELETE</th>--}}
{{--                        </tr>--}}
{{--                        </tfoot>--}}
                    </table>
                </div>
            </div>
        </div>
{{--        --}}{{--laravel paginator--}}
{{--        <div class="d-flex">--}}
{{--            <div class="mx-auto">--}}
{{--                {{->links()}}--}}
{{--            </div>--}}
{{--        </div>--}}
    @endsection
