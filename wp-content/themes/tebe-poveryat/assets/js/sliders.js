/**
 * Sliders Initialization using Swiper.js
 */
document.addEventListener('DOMContentLoaded', () => {
    // Hero Slider
    if (document.querySelector('.hero__slider')) {
        const heroSliderProgress = document.querySelector('.hero__slider-controls .slider-progress'); // Updated selector
        const heroSwiper = new Swiper('.hero__slider', {
            loop: true,
            // autoplay: {
            //     delay: 5000,
            //     disableOnInteraction: false,
            // },
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
        const friendsSliderProgress = document.querySelector('.friends__mobile-progress .slider-progress');
        const friendsSwiper = new Swiper('.friends__slider', {
            loop: true,
            speed: 700,

            // Mobile settings
            slidesPerView: 1,
            spaceBetween: 16,

            // Tablet and Desktop settings
            breakpoints: {
                768: {
                    slidesPerView: 'auto',
                    slidesPerGroup: 1,
                    centeredSlides: true,
                    spaceBetween: 24
                },
                1280: {
                    slidesPerView: 3,
                    slidesPerGroup: 1,
                    centeredSlides: true,
                    spaceBetween: 76
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
                init: function () {
                    // Initialize Quote
                    const activeSlide = this.slides[this.activeIndex];
                    if (activeSlide) {
                         const quoteEl = activeSlide.querySelector('.friends__slide-quote');
                         const outputEl = document.querySelector('.friends__quote-output');
                         if (quoteEl && outputEl) {
                             outputEl.innerHTML = quoteEl.innerHTML;
                         }
                    }

                    // Add transitions
                    this.slides.forEach(slide => {
                        const imageWrap = slide.querySelector('.friends__card-image-wrap');
                        if (imageWrap) imageWrap.style.transition = 'filter 700ms ease-in-out';
                    });
                },
                slideChange: function () {
                     const outputEl = document.querySelector('.friends__quote-output');
                     if (!outputEl) return;
                     
                     // Fade out
                     outputEl.style.opacity = '0';
                     
                     setTimeout(() => {
                         const activeSlide = this.slides[this.activeIndex];
                         if (activeSlide) {
                             const quoteEl = activeSlide.querySelector('.friends__slide-quote');
                             if (quoteEl) {
                                 outputEl.innerHTML = quoteEl.innerHTML;
                             }
                         }
                         // Fade in
                         outputEl.style.opacity = '1';
                     }, 300);
                }
            }
        });
    }

    // Media Slider
    if (document.querySelector('.media__slider')) {
        const mediaSliderProgress = document.querySelector('.media__progress .slider-progress');
        const mediaSwiper = new Swiper('.media__slider', {
            loop: true,
            speed: 600,
            slidesPerView: 1.5,
            spaceBetween: 16,
            grabCursor: true,
            observer: true,
            observeParents: true,
            breakpoints: {
                640: {
                    slidesPerView: 2.5,
                    spaceBetween: 16
                },
                768: {
                    slidesPerView: 3.5,
                    spaceBetween: 24
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 24
                },
                1280: {
                    slidesPerView: 6,
                    spaceBetween: 24
                }
            },
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
            speed: 700,
            slidesPerView: 1,
            spaceBetween: 16,
            breakpoints: {
                768: {
                    slidesPerView: 'auto',
                    slidesPerGroup: 1,
                    centeredSlides: true,
                    spaceBetween: 24
                },
                1280: {
                    slidesPerView: 1,
                    centeredSlides: false,
                    spaceBetween: 16
                }
            },
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
            // autoplay: {
            //     delay: 6200,
            //     disableOnInteraction: false,
            // },
            speed: 850,
            slidesPerView: 1,
            spaceBetween: 0,
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
            // autoplay: {
            //     delay: 6500,
            //     disableOnInteraction: false,
            // },
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
