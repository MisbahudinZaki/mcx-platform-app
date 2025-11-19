document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.auth-banner-swiper', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        speed: 1200,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        }
    });
});