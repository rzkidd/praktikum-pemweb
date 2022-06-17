@extends('layouts.main')

@section('container')
    <div class="container-fluid p-0">
        <img src="img/jumbotron.jpg" alt="jumbotron" class="jumbotron">
    </div>

    @if ($posts->count())
        <div class="container">
            @foreach ($posts as $post)
            <div class="{{ ($loop->iteration > 2) ? 'hide' : 'show'  }}">
                <article>
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="post image" class="me-5">
                    @else    
                        <img src="{{ asset('img/default-image.jpg') }}" alt="post image" class="me-5">
                    @endif
                    <div class="article ">
                        <a href="/posts/{{ $post->id }}" class="text-decoration-none text-black fs-3" style="font-weight: 600">{{ $post->title }}</a>
                        <p>By: {{ $post->author->name }}</p>
                        <p >
                            {!! substr($post->body, 0, 150) . ' ...' !!}
                        </p>
                        <a href="/posts/{{ $post->id }}">Read more</a>
                    </div>
                    
                </article>
                <div class="line"></div>
            </div>
            @endforeach
            
            <div class="show-more" id="showMore">
                <a href="#article-3" onclick="show()">Show more</a>
            </div>
        </div>
    @else
        <div class="container mt-3 text-center">No post.</div>
    @endif


    <footer class="container-fluid bg-dark">
        <p>&copy 2022</p>
    </footer>

    <script>
        $(document).ready(function(){
            $('.hide').hide();

            $('#navAbout').hover(function(){
                $('#aboutCard').toggle();
            });

            $('#navHome').addClass('active');
        })

        function show(){
            $('.hide').show();
            $('#showMore').hide();
        }
    </script>
@endsection
