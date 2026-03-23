import './bootstrap';

    const swiper = new Swiper(".hero-swiper", {
        loop: true,
        speed: 1000,
        effect: "fade",
        fadeEffect: {
            crossFade: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        }
    });
$(document).ready(function(){
   $('.menu-toggle').click(function() {
                $('.mobile').slideToggle();
            });
});