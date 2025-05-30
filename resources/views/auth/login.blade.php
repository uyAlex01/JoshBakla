<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: rgba(15, 15, 15, 0.8); border: 1px solid #8F00FF;">
                    <div class="card-header" style="border-bottom: 1px solid #8F00FF;">
                        <h3 class="mb-0" style="color: #00F6FF;">Login</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label" style="color: #00F6FF;">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                    style="background-color: rgba(255,255,255,0.1); color: white; border-color: #8F00FF;">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span><!-- resources/views/auth/login.blade.php -->
                                    <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content"
                                                style="background-color: rgba(15, 15, 15, 0.8); border: 1px solid #8F00FF;">
                                                <div class="modal-header" style="border-bottom: 1px solid #8F00FF;">
                                                    <h3 class="mb-0" style="color: #00F6FF;">Login</h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close" style="filter: invert(1);"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{ route('login') }}">
                                                        @csrf

                                                        <div class="mb-3">
                                                            <label for="email" class="form-label"
                                                                style="color: #00F6FF;">Email</label>
                                                            <input id="email" type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" value="{{ old('email') }}" required
                                                                autocomplete="email" autofocus
                                                                style="background-color: rgba(255,255,255,0.1); color: white; border-color: #8F00FF;">
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="password" class="form-label"
                                                                style="color: #00F6FF;">Password</label>
                                                            <div class="input-group">
                                                                <input id="password" type="password"
                                                                    class="form-control @error('password') is-invalid @enderror"
                                                                    name="password" required autocomplete="current-password"
                                                                    style="background-color: rgba(255,255,255,0.1); color: white; border-color: #8F00FF;">
                                                                <button class="btn btn-outline-secondary" type="button"
                                                                    onclick="togglePasswordVisibility()"
                                                                    style="border-color: #8F00FF; color: #00F6FF;">
                                                                    <i class="bi bi-eye" id="eye-icon"></i>
                                                                    <i class="bi bi-eye-slash d-none" id="eye-off-icon"></i>
                                                                </button>
                                                            </div>
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3 form-check">
                                                            <input class="form-check-input" type="checkbox" name="remember"
                                                                id="remember">
                                                            <label class="form-check-label" for="remember"
                                                                style="color: #00F6FF;">
                                                                Remember Me
                                                            </label>
                                                        </div>

                                                        <div class="d-grid gap-2">
                                                            <button type="submit" class="btn"
                                                                style="background-color: #8F00FF; color: white;">
                                                                Login
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        function togglePasswordVisibility() {
                                            const passwordInput = document.getElementById('password');
                                            const eyeIcon = document.getElementById('eye-icon');
                                            const eyeOffIcon = document.getElementById('eye-off-icon');

                                            if (passwordInput.type === 'password') {
                                                passwordInput.type = 'text';
                                                eyeIcon.classList.add('d-none');
                                                eyeOffIcon.classList.remove('d-none');
                                            } else {
                                                passwordInput.type = 'password';
                                                eyeIcon.classList.remove('d-none');
                                                eyeOffIcon.classList.add('d-none');
                                            }
                                        }
                                    </script>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label" style="color: #00F6FF;">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password"
                                    style="background-color: rgba(255,255,255,0.1); color: white; border-color: #8F00FF;">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember" style="color: #00F6FF;">
                                    Remember Me
                                </label>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn" style="background-color: #8F00FF; color: white;">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            const eyeOffIcon = document.getElementById('eye-off-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeOffIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeOffIcon.classList.add('hidden');
            }
        }
    </script>
@endsection