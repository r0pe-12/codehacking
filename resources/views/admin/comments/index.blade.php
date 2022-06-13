@extends('layouts.admin')

    @section('content')
        <h1>All Comments</h1>
        @if(session('comment-status'))
            <hr>
            <div class="alert alert-success">
                {{ session('comment-status') }}
            </div>
        @elseif(session('comment-deleted'))
            <hr>
            <div class="alert alert-success">
                {{ session('comment-deleted') }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Owner Name</th>
                            <th>Owner Email</th>
                            <th>Owner Photo</th>
                            <th>Post</th>
                            <th>Body</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Options</th>
                            <th>DELETE</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td bgcolor="{{ $comment->is_active ? 'green' : 'red' }}">{{ $comment->id }}</td>
                                    <td>{{ $comment->user->name }}</td>
                                    <td><a href="mailto:{{$comment->user->email}}">{{ $comment->user->email }}</a></td>
                                    <td><a href="{{ route('users.edit', $comment->user) }}">
                                            <img src="{{ $comment->user->photo ? $comment->user->photo->file : 'https://via.placeholder.com/900x900.png/280137?text=NO%20PHOTO' }}" alt="" width="100px" class="img img-rounded">
                                        </a></td>
                                    <td><a href="{{ route('posts.edit', $comment->post) }}">{{ $comment->post->title }}</a></td>
                                    <td>{{ $comment->body }}</td>
                                    <td>{{ $comment->created_at->diffForHumans() }}</td>
                                    <td>{{ $comment->updated_at->diffForHumans() }}</td>
                                    <td>
                                        @if(!$comment->is_active)
                                            {!! Form::open(['method'=>'PUT', 'action'=>['PostCommentsController@update', $comment]]) !!}
                                                    {!! Form::submit('Approve', ['class'=>'btn btn-primary']) !!}
                                            {!! Form::close() !!}
                                        @else
                                            {!! Form::open(['method'=>'PUT', 'action'=>['PostCommentsController@update', $comment]]) !!}
                                                    {!! Form::submit('Un-Approve', ['class'=>'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment]]) !!}
                                                {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td><a href="{{ route('replies.show', $comment) }}"><button class="btn btn-outline">View Replies</button></a></td>
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
