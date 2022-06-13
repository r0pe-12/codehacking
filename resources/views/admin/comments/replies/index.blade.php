@extends('layouts.admin')

@section('content')
    @if(count($replies) > 0)
        <h1>All Replies for <a href="{{ route('comments.show', $comment->post) }}">Comment</a></h1>
        @if(session('reply-status'))
            <hr>
            <div class="alert alert-success">
                {{ session('reply-status') }}
            </div>
        @elseif(session('reply-deleted'))
            <hr>
            <div class="alert alert-success">
                {{ session('reply-deleted') }}
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
                            <th>Body</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Options</th>
                            <th>DELETE</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($replies as $reply)
                            <tr>
                                <td bgcolor="{{ $reply->is_active ? 'green' : 'red' }}">{{ $reply->id }}</td>
                                <td>{{ $reply->user->name }}</td>
                                <td><a href="mailto:{{$reply->user->email}}">{{ $reply->user->email }}</a></td>
                                <td><a href="{{ route('users.edit', $reply->user) }}">
                                        <img src="{{ $reply->user->photo ? $reply->user->photo->file : 'https://via.placeholder.com/900x900.png/280137?text=NO%20PHOTO' }}" alt="" width="100px" class="img img-rounded">
                                    </a></td>
                                <td>{{ $reply->body }}</td>
                                <td>{{ $reply->created_at->diffForHumans() }}</td>
                                <td>{{ $reply->updated_at->diffForHumans() }}</td>
                                <td>
                                    @if(!$reply->is_active)
                                        {!! Form::open(['method'=>'PUT', 'action'=>['CommentRepliesController@update', $reply]]) !!}
                                        {!! Form::submit('Approve', ['class'=>'btn btn-primary']) !!}
                                        {!! Form::close() !!}
                                    @else
                                        {!! Form::open(['method'=>'PUT', 'action'=>['CommentRepliesController@update', $reply]]) !!}
                                        {!! Form::submit('Un-Approve', ['class'=>'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                                <td>
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply]]) !!}
                                    {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
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
    @else
        <h1 class="text-center">No replies for this <a href="{{ route('comments.show', $comment->post) }}">Comment</a></h1>
    @endif
@endsection
