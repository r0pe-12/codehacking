@extends('layouts.blog-post')

    @section('content')

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{ $post->title }}</h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#">{{ $post->user->name }}</a>
            </p>

            <hr>

            <!-- Date/Time -->
{{--            <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at->format('F d, Y  g:i A') }}</p>--}}
            <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>
            @if(session('comment-message'))
                <hr>
                <div class="alert alert-success">
                    {{ session('comment-message') }}
                </div>
            @endif
            <hr>

            <!-- Preview Image -->
            <img class="img-responsive" src="{{ $post->photo->file }}" alt="">

            <hr>

            <!-- Post Content -->
            <p>{{ $post->body }}</p>
            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            @if(Auth::check())
                <div class="well">
                <h4>Leave a Comment:</h4>
                {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

                    <div class="form-group">
                        {!! Form::hidden('post_id', $post->id, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
                    </div>
                    <br>
                        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
            @endif

            <hr>

            <!-- Posted Comments -->

            @if($comments)
                @foreach($comments as $comment)
                    <!-- Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object img-responsive img-rounded" src="{{ $comment->user->photo->file }}" alt="" width="64px">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"> {{ $comment->user->name }}
                                <small>{{ $comment->created_at->diffForHumans() }}</small>
                            </h4>
                            {{ $comment->body }}

                            <div class="row">
                                <div class="comment-reply-container">
                                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                                    <div class="comment-reply col-sm-10">
                                        {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@store']) !!}
                                        <div class="form-group">
                                            {!! Form::hidden('comment_id', $comment->id, ['class'=>'form-control']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3, 'placeholder'=>'Reply']) !!}
                                        </div>
                                        <br>
                                        {!! Form::submit('Sumbit Reply', ['class'=>'btn btn-primary']) !!}
                                        {!! Form::close() !!}
                                    </div>
                            </div>

                            </div>
                            @if($replies = $comment->replies->where('is_active', '=' , 1))
                                @foreach($replies as $reply)
                                    <!-- Nested Comment -->
                                    <div class="nested-comment media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-rounded" src="{{ $reply->user->photo->file }}" alt="" width="64px">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{ $reply->user->name }}
                                                <small>{{ $reply->created_at->diffForHumans() }}</small>
                                            </h4>
                                            {{ $reply->body }}
                                        </div>
                                        <br>
                                    </div>
                                    <!-- End Nested Comment -->
                                @endforeach
                            @endif

                        </div>
                    </div>
                @endforeach
            @endif

    @endsection

    @section('scripts')

        <script>
            $(".comment-reply-container .toggle-reply").click(function () {
                $(this).nextAll().slideToggle('slow', 'swing');
            })
        </script>
    @endsection
