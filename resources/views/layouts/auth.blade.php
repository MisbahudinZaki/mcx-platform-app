<!DOCTYPE html>
<html lang="en">
<head>
    <x-head/>
</head>
<body class="auth-body">

    {{-- Banner Swiper --}}
    <div class="auth-banner-container">
        <div class="swiper auth-banner-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/banner-1.png') }}" alt="Banner 1" class="banner-bg">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/banner-2.png') }}" alt="Banner 2" class="banner-bg">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/images/banner-3.png') }}" alt="Banner 3" class="banner-bg">
                </div>
            </div>
        </div>
        <div class="banner-overlay"></div>
    </div>

    {{-- Konten login --}}
    <main class="auth-content">
        @yield('content')
    </main>

    <x-script/>
</body>
</html>
