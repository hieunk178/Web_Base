(() => {
    const swiper = new Swiper('.product-related__slider .swiper', {
        loop: true,
        autoplay: {
            delay: 5000,
        },
        navigation: {
            nextEl: '.product-related__slider .swiper-button-next',
            prevEl: '.product-related__slider .swiper-button-prev',
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
                spaceBetween: 16,
            },
            576: {
                slidesPerView: 2,
                spaceBetween: 16,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 4,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 24,
            }
        },
    });
})();

(() => {
    const swiper = new Swiper('.home-page__slider.swiper', {
        loop: true,
        autoplay: {
            delay: 5000,
        },
        navigation: {
            nextEl: '.home-page__slider .swiper-button-next',
            prevEl: '.home-page__slider .swiper-button-prev',
        },
    });
})();

(() => {
    const swiper = new Swiper('.product-latest__slider .swiper', {
        loop: true,
        autoplay: {
            delay: 5000,
        },
        navigation: {
            nextEl: '.product-latest__slider .swiper-button-next',
            prevEl: '.product-latest__slider .swiper-button-prev',
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
                spaceBetween: 16,
            },
            576: {
                slidesPerView: 2,
                spaceBetween: 16,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 4,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 24,
            }
        },
    });
})();

(() => {
    const swiper = new Swiper('.brand__slider .swiper', {
        loop: true,
        autoplay: {
            delay: 5000,
        },
        navigation: {
            nextEl: '.brand__slider .swiper-button-next',
            prevEl: '.brand__slider .swiper-button-prev',
        },
        slidesPerView: 2,
        breakpoints: {
            320: {
                slidesPerView: 2,
                spaceBetween: 16,
            },
            576: {
                slidesPerView: 3,
                spaceBetween: 16,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 24,
            },
            1200: {
                slidesPerView: 6,
                spaceBetween: 24,
            }
        },
    });
})();
