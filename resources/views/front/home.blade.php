@extends('layouts.blog-home')

    @section('content')
        @foreach($posts as $post)
            <!-- Blog Post -->
            @if($posts)
                <div>
                <h2>
                    <a href="#">{{ $post->title }}</a>
                </h2>
                <p class="lead">
                    by {{ $post->user->name }}
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>
                <hr>
                <img class="img-responsive" src="{{ $post->getPhoto() }}" alt="">
                <hr>
                <a class="btn btn-primary" href="{{ route('posts.home', $post->slug) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
            @endif
            <hr>
        @endforeach
        <!-- Pager -->
        <ul class="pager">
            {{ $posts->links() }}
        </ul>
    @endsection
