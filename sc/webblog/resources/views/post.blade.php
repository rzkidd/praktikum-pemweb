@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mt-3">
        <div class="col-md-6">
            <a href="/" class="btn btn-secondary mb-2"><i class="bi bi-arrow-left"></i> Back</a>
            <h2>{{ $post->title }}</h2>
            <p>By : {{ $post->author->name }}</p>
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="post image" width="100%">
            @else    
                <img src="{{ asset('img/default-image.jpg') }}" alt="post" width="100%" height="400px">
            @endif
            <p class="mt-3">{!! $post->body !!}</p>
        </div>
    </div>
@endsection