/**
 * Sliders Initialization using Swiper.js
 */
document.addEventListener('DOMContentLoaded', () => {
    // Hero Slider
    if (document.querySelector('.hero__container')) {
        const heroSliderProgress = document.querySelector('.hero__slider-progress .slider-progress-bar');
        const heroSwiper = new Swiper('.hero__container', {
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
            on: {
                init: function () {
                    heroSliderProgress.style.opacity = 1;
                },
            }
        });
    }

    // Friends Slider
    if (document.querySelector('.friends__slider')) {
        const friendsSliderProgress = document.querySelector('.friends__progress .slider-progress-bar');
        const friendsSwiper = new Swiper('.friends__slider', {
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            speed: 800,
            pagination: {
                el: friendsSliderProgress,
                type: 'progressbar',
            },
            on: {
                init: function () {
                    friendsSliderProgress.style.opacity = 1;
                },
            }
        });
    }

    // Media Slider
    if (document.querySelector('.media__slider')) {
        const mediaSliderProgress = document.querySelector('.media__progress .slider-progress-bar');
        const mediaSwiper = new Swiper('.media__slider', {
            loop: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false,
            },
            speed: 600,
            slidesPerView: 'auto', // Show as many as fit
            spaceBetween: 16,      // Gap between slides
            centeredSlides: true,  // Center the active slide
            pagination: {
                el: mediaSliderProgress,
                type: 'progressbar',
            },
            on: {
                init: function () {
                    mediaSliderProgress.style.opacity = 1;
                },
            }
        });
    }

    // Materials Slider
    if (document.querySelector('.materials__slider')) {
        const materialsSliderProgress = document.querySelector('.materials__progress .slider-progress-bar');
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
            on: {
                init: function () {
                    materialsSliderProgress.style.opacity = 1;
                },
            }
        });
    }

    // Histories Slider
    if (document.querySelector('.histories__slider')) {
        const historiesSliderProgress = document.querySelector('.histories__progress .slider-progress-bar');
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
            on: {
                init: function () {
                    historiesSliderProgress.style.opacity = 1;
                },
            }
        });
    }

    // Team Slider
    if (document.querySelector('.team__slider')) {
        const teamSliderProgress = document.querySelector('.team__progress .slider-progress-bar');
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
            on: {
                init: function () {
                    teamSliderProgress.style.opacity = 1;
                },
            }
        });
    }

    // Projects Slider
    if (document.querySelector('.projects__container.swiper')) { // Targeting the Swiper container directly
        const projectsSliderProgress = document.querySelector('.projects__slider-progress .slider-progress-bar');
        const projectsSwiper = new Swiper('.projects__container.swiper', {
            loop: true,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
            },
            speed: 800,
            pagination: {
                el: projectsSliderProgress,
                type: 'progressbar',
            },
            on: {
                init: function () {
                    projectsSliderProgress.style.opacity = 1;
                },
            }
        });
    }

    console.log('Sliders JS loaded');
});