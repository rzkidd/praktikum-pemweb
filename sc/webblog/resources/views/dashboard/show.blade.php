@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mt-3">
        <div class="col-md-6">
            <div class="d-flex mb-2">
                <a href="/dashboard" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
                <a href="/dashboard/{{ $post->id }}/edit" class="btn btn-warning ms-3"><i class="bi bi-pencil-square"></i> Edit</a>
                <form action="/dashboard/{{ $post->id }}/delete" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger ms-3" onclick="confirm('Are you sure?')"><i class="bi bi-trash"></i> Delete</button>
                </form>
            </div>
            
            <h2>{{ $post->title }}</h2>
            <p>By : {{ $post->author->name }}</p>
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="post image" width="100%">
            @else
                <img src="{{ asset('img/default-image.jpg') }}" alt="post" width="100%">
            @endif
            <p class="mt-3">{!! $post->body !!}</p>
        </div>
    </div>
@endsection