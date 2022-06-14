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
            <img class="img-responsive" src="{{ $post->photo ? $post->photo->file : null }}" alt="">

            <hr>

            <!-- Post Content -->
            <p>{!!  $post->body !!} </p>
            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->

            <hr>

            <div id="disqus_thread"></div>
{{--            TODO disqus pravi masu gresaka ali sve radi kako treba!!!--}}
            <script>
                /**
                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                /*
                var disqus_config = function () {
                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                */
                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://codehacking-4nxzfnzzw4.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            <script id="dsq-count-scr" src="//codehacking-4nxzfnzzw4.disqus.com/count.js" async></script>

    @endsection

    @section('scripts')

    @endsection
