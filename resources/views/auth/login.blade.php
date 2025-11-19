@extends('layouts.auth')

@section('content')

<div class="hero-container">
    <div class="row row-cols-xl-2 row-cols-md-2 row-cols-1 g-3">
        <div class="col col-xl-8 col-md-6">
            <div class="auth-title-container">
                <div class="d-flex flex-column gap-1">
                    <h1>Mandiri Cross-border Exchange</h1>
                    <p>Streamline trade finance distribution, monitor real-time liquidity across your global network, and discover new cross-border opportunities—all from one unified platform.</p>
                </div>
                <div class="swiper-pagination banner-pagination"></div>
            </div>
        </div>

        <div class="col col-xl-4 col-md-6">
            <div class="auth-card">
                <div class="auth-logocontainer">
                    <img src="{{ asset('./assets/images/logo.png') }}" alt="Login Logo" class="login-logo">
                </div>

                <div class="auth-form-container">
                    <div class="auth-title">
                        <h2>Welcome Back!</h2>
                        <p>Access your account for control of transaction with real-time monitoring and insights.</p>
                    </div>

                    <form action="{{ route('login.process') }}" method="POST" class="auth-form">
                        @csrf

                        <div class="d-flex flex-column gap-2">
                            <label for="username">Username</label>
                            <input type="text" name="username" placeholder="Input your Username" id="username" required>
                        </div>

                        <div class="d-flex flex-column gap-2 position-relative password-wrapper">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Input your Password" id="password" required>
                            <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
                        </div>

                        <button type="submit" class="btn btn-login w-100 btn-accent" id="loginBtn" disabled>Login</button>
                    </form>

                    <p>Can't access your account? <a href="#" class="link-wrapper">Recovery Account<a/></p>
                </div>

                <div class="auth-footer">
                    <p>2025 PT Bank Mandiri (Persero) Tbk</p>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('modal'))
    <x-modal id="loginFailedModal" :show="true">
        <x-slot name="header">
            <h3>{{ session('modal.title') ?? 'Login Failed' }}</h3>
        </x-slot>

        <p>{{ session('modal.message') ?? 'Please make sure your username or password is correct.' }}</p>

        <x-slot name="footer">
            <button id="closeLoginFailedModalBtn" class="btn btn-accent-primary">
                {{ session('modal.button') ?? 'OK' }}
            </button>
        </x-slot>
    </x-modal>
@endif

@endsection