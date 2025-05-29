<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: rgba(15, 15, 15, 0.8); border: 1px solid #8F00FF;">
                    <div class="card-header" style="border-bottom: 1px solid #8F00FF;">
                        <h3 class="mb-0" style="color: #00F6FF;">Register</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label" style="color: #00F6FF;">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                    style="background-color: rgba(255,255,255,0.1); color: white; border-color: #8F00FF;">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label" style="color: #00F6FF;">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    style="background-color: rgba(255,255,255,0.1); color: white; border-color: #8F00FF;">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label" style="color: #00F6FF;">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password"
                                    style="background-color: rgba(255,255,255,0.1); color: white; border-color: #8F00FF;">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password-confirm" class="form-label" style="color: #00F6FF;">Confirm
                                    Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    style="background-color: rgba(255,255,255,0.1); color: white; border-color: #8F00FF;">
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn" style="background-color: #8F00FF; color: white;">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection