@extends('layouts.main')

@section('container')
    <div class="container">
        <h3 class="mt-3">My Posts</h3>

        @if (session()->has('success'))     
            <div class="alert alert-success my-3">{{ session('success') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Title</td>
                    <td>Image</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->image }}" height="100px">
                        @else
                            <img src="{{ asset('img/default-image.jpg') }}" alt="default image" height="100px">
                        @endif
                        </td>
                        <td>
                            <a href="/dashboard/{{ $post->id }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                            <a href="/dashboard/{{ $post->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                            <form action="/dashboard/{{ $post->id }}/delete" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection