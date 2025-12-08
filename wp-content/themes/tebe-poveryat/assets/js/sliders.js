/**
 * Sliders Initialization using Swiper.js
 */
document.addEventListener('DOMContentLoaded', () => {
    // Hero Slider
    if (document.querySelector('.hero__slider')) {
        const heroSliderProgress = document.querySelector('.hero__slider-controls .slider-progress'); // Updated selector
        const heroSwiper = new Swiper('.hero__slider', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            speed: 800,
            pagination: {
                el: heroSliderProgress,
                type: 'progressbar',
            },
            navigation: {
                nextEl: '.hero-next',
                prevEl: '.hero-prev',
            },
            on: {
                init: function () {
                    if(heroSliderProgress) heroSliderProgress.style.opacity = 1;
                },
            }
        });
    }

    // Friends Slider
    if (document.querySelector('.friends__slider')) {
        const quoteEl = document.getElementById('friends-quote');
        const friendsSliderProgress = document.querySelector('.friends__mobile-progress .slider-progress');
        const friendsSwiper = new Swiper('.friends__slider', {
            loop: true,
            speed: 850,
            
            // Mobile settings
            slidesPerView: 1,
            spaceBetween: 16,
            
            // Desktop settings
            breakpoints: {
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                    centeredSlides: true,
                }
            },
            pagination: {
                el: friendsSliderProgress,
                type: 'progressbar',
            },
            navigation: {
                nextEl: '.friends-next',
                prevEl: '.friends-prev',
            },
            on: {
                init: function (swiper) {
                    if (quoteEl && swiper.slides[swiper.activeIndex]) {
                        const activeSlide = swiper.slides[swiper.activeIndex];
                        if(activeSlide.dataset.quote) {
                            quoteEl.textContent = activeSlide.dataset.quote;
                        }
                    }
                },
                slideChange: function (swiper) {
                    if (quoteEl && swiper.slides[swiper.activeIndex]) {
                        const activeSlide = swiper.slides[swiper.activeIndex];
                         if(activeSlide.dataset.quote) {
                            quoteEl.textContent = activeSlide.dataset.quote;
                        }
                    }
                },
            }
        });
    }

    // Media Slider
    if (document.querySelector('.media__slider')) {
        const mediaSliderProgress = document.querySelector('.media__progress .slider-progress');
        const mediaSwiper = new Swiper('.media__slider', {
            loop: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false,
            },
            speed: 600,
            slidesPerView: 'auto', 
            spaceBetween: 16,      
            centeredSlides: true,  
            pagination: {
                el: mediaSliderProgress,
                type: 'progressbar',
            },
            navigation: {
                nextEl: '.media-next',
                prevEl: '.media-prev',
            },
            on: {
                init: function () {
                    if(mediaSliderProgress) mediaSliderProgress.style.opacity = 1;
                },
            }
        });
    }

    // Materials Slider
    if (document.querySelector('.materials__slider')) {
        const materialsSliderProgress = document.querySelector('.materials__progress .slider-progress');
        const materialsSwiper = new Swiper('.materials__slider', {
            loop: true,
            autoplay: {
                delay: 5800,
                disableOnInteraction: false,
            },
            speed: 700,
            pagination: {
                el: materialsSliderProgress,
                type: 'progressbar',
            },
            navigation: {
                nextEl: '.materials-next',
                prevEl: '.materials-prev',
            },
            on: {
                init: function () {
                    if(materialsSliderProgress) materialsSliderProgress.style.opacity = 1;
                },
            }
        });
    }

    // Histories Slider
    if (document.querySelector('.histories__slider')) {
        const historiesSliderProgress = document.querySelector('.histories__progress .slider-progress');
        const historiesSwiper = new Swiper('.histories__slider', {
            loop: true,
            autoplay: {
                delay: 6200,
                disableOnInteraction: false,
            },
            speed: 850,
            pagination: {
                el: historiesSliderProgress,
                type: 'progressbar',
            },
            navigation: {
                nextEl: '.histories-next',
                prevEl: '.histories-prev',
            },
            on: {
                init: function () {
                    if(historiesSliderProgress) historiesSliderProgress.style.opacity = 1;
                },
            }
        });
    }

    // Team Slider
    if (document.querySelector('.team__slider')) {
        const teamSliderProgress = document.querySelector('.team__progress .slider-progress');
        const teamSwiper = new Swiper('.team__slider', {
            loop: true,
            autoplay: {
                delay: 6500,
                disableOnInteraction: false,
            },
            speed: 900,
            pagination: {
                el: teamSliderProgress,
                type: 'progressbar',
            },
            navigation: {
                nextEl: '.team-next',
                prevEl: '.team-prev',
            },
            on: {
                init: function () {
                    if(teamSliderProgress) teamSliderProgress.style.opacity = 1;
                },
            }
        });
    }

    console.log('Sliders JS loaded');
});
