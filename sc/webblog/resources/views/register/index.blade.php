@extends('layouts.login')

@section('container')
    <div class="row">
        <div class="col-md-3 mx-auto mt-3 bg-body rounded shadow">
            @if (session()->has('registerError'))
                <div class="alert alert-danger ">{{ session('registerError') }}</div>
            @endif
            <form action="/register" method="post" class="mt-4 ">
                @csrf
                <input type="text" placeholder="Name" id="name" name="name" class="form-control mb-3" required value="{{ old('name') }}">
                <input type="text" placeholder="Username" id="username" name="username" class="form-control mb-3 @error('username')
                    is-invalid
                @enderror" value="{{ old('username') }}" required>
                @error('username')
                    <div class="invalid-feedback mb-3">{{ $message }}</div>
                @enderror
                <input type="password" name="password" id="password" placeholder="Password" class="form-control mb-3 @error('password')
                    is-invalid
                @enderror" required>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="form-control mb-3 @error('password_confirmation')
                    is-invalid
                @enderror" required>
                <button type="submit" class="btn btn-dark w-100 mb-3">Register</button>
                <div class="d-flex align-items-center mb-3">
                    <span class="mx-auto">Already have an account?</span>
                </div>
                <a href="/login" class="btn btn-success mb-3 w-100">Login</a>
            </form>
        </div>
    </div>
@endsection