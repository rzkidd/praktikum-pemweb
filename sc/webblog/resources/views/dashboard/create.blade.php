@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-md-6 mx-auto mt-3">
        <h3 class="mb-3">Create a Post</h3>
        <form action="/dashboard/create" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>
            <div>
                <label for="body" class="form-label">Body</label>
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body" ></trix-editor>
            </div>
            <div>
                <label for="image" class="form-label">Image</label>
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