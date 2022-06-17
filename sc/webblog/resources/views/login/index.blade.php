@extends('layouts.login')

@section('container')
    <div class="row">
        <div class="col-md-3 mx-auto mt-3 bg-body rounded shadow">
            @if (session()->has('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger mt-3">{{ session('loginError') }}</div>
            @endif

            <form action="/login" method="post" class="mt-4 ">
                @csrf
                <input type="text" placeholder="Username" id="username" name="username" class="form-control mb-3 @error('username')
                    is-invalid
                @enderror" required autofocus>
                @error('username')
                    <div class="invalid-feedback mb-3">{{ $message }}</div>
                @enderror
                <input type="password" name="password" id="password" placeholder="Password" class="form-control mb-3 @error('password')
                    is-invalid
                @enderror" required>
                @error('password')
                    <div class="invalid-feedback mb-3">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-dark w-100 mb-3">Log In</button>
                <div class="d-flex align-items-center mb-3">
                    <div class="line mt-0"></div>
                    <span class="mx-2">or</span>
                    <div class="line mt-0"></div>
                </div>
                <a href="/register" class="btn btn-success mb-3 w-100">Create an Account</a>
            </form>
        </div>
    </div>
@endsection