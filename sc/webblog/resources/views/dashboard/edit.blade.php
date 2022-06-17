@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-md-6 mx-auto mt-3">
        <h3 class="mb-3">Edit a Post</h3>
        <form action="/dashboard/{{ $post->id }}/edit" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
            </div>
            <div>
                <label for="body" class="form-label">Body</label>
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body" ></trix-editor>
            </div>
            <div>
                <label for="image" class="form-label">Image</label>
                @if ($post->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="" height="100px">
                    </div>
                @endif
                <input type="file" id="image" name="image" class="form-control @error('image')
                    is-invalid
                @enderror ">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div>File type : .jpg, .jpeg, .png</div>
                <div>Max : 5 Mb</div>
            </div>
            <input type="submit" class="btn btn-dark mt-3">
        </form>
    </div>
</div>
@endsection