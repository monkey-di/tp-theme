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
        const tabletContentContainer = document.querySelector('.materials__tablet-content');

    // Materials Slider
    if (document.querySelector('.materials__slider')) {
        const materialsSliderProgress = document.querySelector('.materials__progress .slider-progress');
        const tabletContentContainer = document.querySelector('.materials__tablet-content');

        const updateMaterialsTabletContent = (swiper) => {
            if (!tabletContentContainer) return;
            
            // Fade out
            tabletContentContainer.style.opacity = '0';
            
            setTimeout(() => {
                // Get the active slide (visual)
                const activeSlide = swiper.slides[swiper.activeIndex];
                if (activeSlide) {
                    // Find the content source within the active slide
                    const contentSource = activeSlide.querySelector('.materials__card-content');
                    if (contentSource) {
                        // Copy content to external container
                        tabletContentContainer.innerHTML = contentSource.innerHTML;
                    }
                }
                
                // Fade in
                tabletContentContainer.style.opacity = '1';
            }, 300);
        };

        const materialsSwiper = new Swiper('.materials__slider', {
            loop: true,
            speed: 700,
            slidesPerView: 1,
            spaceBetween: 16,
            breakpoints: {
                768: {
                    slidesPerView: 'auto',
                    centeredSlides: true,
                    spaceBetween: 24,
                    loop: false,
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
                slideChange: function () {
                    if (window.innerWidth >= 768 && window.innerWidth < 1280) {
                        updateMaterialsTabletContent(this);
                    }
                },
                resize: function () {
                    if (window.innerWidth >= 768 && window.innerWidth < 1280) {
                        // On resize, just force an update
                         updateMaterialsTabletContent(this);
                    }
                }
            }
        });

        // Initial content update (fix for missing content on load)
        if (window.innerWidth >= 768 && window.innerWidth < 1280) {
            // Use a slight delay to ensure Swiper is fully ready, but force immediate opacity
            setTimeout(() => {
                const activeSlide = materialsSwiper.slides[materialsSwiper.activeIndex];
                if (activeSlide && tabletContentContainer) {
                    const contentSource = activeSlide.querySelector('.materials__card-content');
                    if (contentSource) {
                        tabletContentContainer.innerHTML = contentSource.innerHTML;
                        tabletContentContainer.style.opacity = '1';
                    }
                }
            }, 50);
        }
    }
    }

    // Histories Slider
    if (document.querySelector('.histories__slider')) {
        const historiesSliderProgress = document.querySelector('.histories__progress .slider-progress');
        const tabletContentContainer = document.querySelector('.histories__tablet-content');

        const updateHistoriesTabletContent = (swiper) => {
            if (!tabletContentContainer) return;

            tabletContentContainer.style.opacity = '0';
            
            setTimeout(() => {
                const activeSlide = swiper.slides[swiper.activeIndex];
                if (activeSlide) {
                    const contentSource = activeSlide.querySelector('.history__content');
                    if (contentSource) {
                         tabletContentContainer.innerHTML = contentSource.innerHTML;
                    }
                }
                tabletContentContainer.style.opacity = '1';
            }, 300);
        };

        const historiesSwiper = new Swiper('.histories__slider', {
            loop: true,
            speed: 850,
            slidesPerView: 1,
            spaceBetween: 0,
            loopedSlides: 6, // Ensure duplicates for auto width
            breakpoints: {
                768: {
                    slidesPerView: 'auto',
                    centeredSlides: true,
                    spaceBetween: 24,
                },
                1280: {
                    slidesPerView: 1,
                    centeredSlides: false,
                    spaceBetween: 0
                }
            },
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
                    
                    if (window.innerWidth >= 768 && window.innerWidth < 1280) {
                        // Force start at first slide
                        this.slideToLoop(0, 0);
                        
                        // Small delay to ensure DOM is ready for content extraction
                        setTimeout(() => {
                            const activeSlide = this.slides[this.activeIndex];
                            if (activeSlide && tabletContentContainer) {
                                 const contentSource = activeSlide.querySelector('.history__content');
                                 if (contentSource) {
                                     tabletContentContainer.innerHTML = contentSource.innerHTML;
                                     tabletContentContainer.style.opacity = '1';
                                 }
                            }
                        }, 50);
                    }
                },
                slideChange: function () {
                    if (window.innerWidth >= 768 && window.innerWidth < 1280) {
                        updateHistoriesTabletContent(this);
                    }
                },
                resize: function () {
                    if (window.innerWidth >= 768 && window.innerWidth < 1280) {
                         const activeSlide = this.slides[this.activeIndex];
                         if (activeSlide && tabletContentContainer) {
                              const contentSource = activeSlide.querySelector('.history__content');
                              if (contentSource) {
                                  tabletContentContainer.innerHTML = contentSource.innerHTML;
                                  tabletContentContainer.style.opacity = '1';
                              }
                         }
                    }
                }
            }
        });

        // Fallback Initial content update (in case init event misses or race condition)
        if (window.innerWidth >= 768 && window.innerWidth < 1280) {
            setTimeout(() => {
                if (historiesSwiper && !historiesSwiper.destroyed) {
                    const activeSlide = historiesSwiper.slides[historiesSwiper.activeIndex];
                    if (activeSlide && tabletContentContainer) {
                        const contentSource = activeSlide.querySelector('.history__content');
                        if (contentSource && tabletContentContainer.innerHTML === '') {
                             tabletContentContainer.innerHTML = contentSource.innerHTML;
                             tabletContentContainer.style.opacity = '1';
                        }
                    }
                }
            }, 200);
        }
    }

    // Team Slider
    if (document.querySelector('.team__slider')) {
        const teamSliderProgress = document.querySelector('.team__progress .slider-progress');
        const tabletContentContainer = document.querySelector('.team__tablet-content');

        const updateTeamTabletContent = (swiper) => {
            if (!tabletContentContainer) return;

            tabletContentContainer.style.opacity = '0';
            
            setTimeout(() => {
                const activeSlide = swiper.slides[swiper.activeIndex];
                if (activeSlide) {
                    const contentSource = activeSlide.querySelector('.team__content');
                    if (contentSource) {
                         tabletContentContainer.innerHTML = contentSource.innerHTML;
                         
                         // Add 'Read More' link dynamically if not present
                         const readMoreHtml = `
                            <div class="team__tablet-read-more mt-2">
                                <div class="link-more-wrapper inline-flex flex-col justify-start items-start gap-0.5 group cursor-pointer">
                                    <a href="#" class="inline-flex justify-start items-center gap-3 no-underline">
                                        <div class="text-primary text-[16px] font-normal font-geologica leading-6">
                                            Читать далее
                                        </div>
                                    </a>
                                    <div class="h-0 relative shrink-0 w-full">
                                        <div class="absolute bottom-0 left-0 right-0 top-[-2px]">
                                            <img alt="" class="block max-w-none size-full" src="/wp-content/themes/tebe-poveryat/assets/images/arrow-link-more.svg" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                         `;
                         tabletContentContainer.insertAdjacentHTML('beforeend', readMoreHtml);
                    }
                }
                tabletContentContainer.style.opacity = '1';
            }, 300);
        };

        const teamSwiper = new Swiper('.team__slider', {
            loop: true,
            speed: 900,
            loopedSlides: 6,
            breakpoints: {
                768: {
                    slidesPerView: 'auto',
                    centeredSlides: true,
                    spaceBetween: 24
                },
                1280: {
                    slidesPerView: 1,
                    centeredSlides: false,
                    spaceBetween: 0
                }
            },
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
                    if (window.innerWidth >= 768 && window.innerWidth < 1280) {
                        this.slideToLoop(0, 0); // Force start at first slide
                        
                        setTimeout(() => {
                            const activeSlide = this.slides[this.activeIndex];
                            if (activeSlide && tabletContentContainer) {
                                 const contentSource = activeSlide.querySelector('.team__content');
                                 if (contentSource) {
                                     tabletContentContainer.innerHTML = contentSource.innerHTML;
                                      // Add 'Read More' link dynamically
                                     const readMoreHtml = `
                                        <div class="team__tablet-read-more mt-2">
                                            <div class="link-more-wrapper inline-flex flex-col justify-start items-start gap-0.5 group cursor-pointer">
                                                <a href="#" class="inline-flex justify-start items-center gap-3 no-underline">
                                                    <div class="text-primary text-[16px] font-normal font-geologica leading-6">
                                                        Читать далее
                                                    </div>
                                                </a>
                                                <div class="h-0 relative shrink-0 w-full">
                                                    <div class="absolute bottom-0 left-0 right-0 top-[-2px]">
                                                        <img alt="" class="block max-w-none size-full" src="/wp-content/themes/tebe-poveryat/assets/images/arrow-link-more.svg" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     `;
                                     tabletContentContainer.insertAdjacentHTML('beforeend', readMoreHtml);
                                     tabletContentContainer.style.opacity = '1';
                                 }
                            }
                        }, 50);
                    }
                },
                slideChange: function () {
                    if (window.innerWidth >= 768 && window.innerWidth < 1280) {
                        updateTeamTabletContent(this);
                    }
                },
                resize: function () {
                    if (window.innerWidth >= 768 && window.innerWidth < 1280) {
                        const activeSlide = this.slides[this.activeIndex];
                        if (activeSlide && tabletContentContainer) {
                             const contentSource = activeSlide.querySelector('.team__content');
                             if (contentSource) {
                                 tabletContentContainer.innerHTML = contentSource.innerHTML;
                                  // Add 'Read More' link dynamically
                                 const readMoreHtml = `
                                    <div class="team__tablet-read-more mt-2">
                                        <div class="link-more-wrapper inline-flex flex-col justify-start items-start gap-0.5 group cursor-pointer">
                                            <a href="#" class="inline-flex justify-start items-center gap-3 no-underline">
                                                <div class="text-primary text-[16px] font-normal font-geologica leading-6">
                                                    Читать далее
                                                </div>
                                            </a>
                                            <div class="h-0 relative shrink-0 w-full">
                                                <div class="absolute bottom-0 left-0 right-0 top-[-2px]">
                                                    <img alt="" class="block max-w-none size-full" src="/wp-content/themes/tebe-poveryat/assets/images/arrow-link-more.svg" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 `;
                                 tabletContentContainer.insertAdjacentHTML('beforeend', readMoreHtml);
                                 tabletContentContainer.style.opacity = '1';
                             }
                        }
                    }
                }
            }
        });
    }

    // Block: Slider Text Slider
    if (document.querySelector('.block-slider-text_slider-inner')) {
        const teamSliderProgress = document.querySelector('.block-slider-text .slider-progress');
        const tabletContentContainer = document.querySelector('.block-slider-text-content');

        const updateTeamTabletContent = (swiper) => {
            if (!tabletContentContainer) return;

            tabletContentContainer.style.opacity = '0';

            setTimeout(() => {
                const activeSlide = swiper.slides[swiper.activeIndex];
                if (activeSlide) {
                    const contentSource = activeSlide.querySelector('.team__content');
                    if (contentSource) {
                        tabletContentContainer.innerHTML = contentSource.innerHTML;

                        // Add 'Read More' link dynamically if not present
                        const readMoreHtml = `
                            <div class="team__tablet-read-more mt-2">
                                <div class="link-more-wrapper inline-flex flex-col justify-start items-start gap-0.5 group cursor-pointer">
                                    <a href="#" class="inline-flex justify-start items-center gap-3 no-underline">
                                        <div class="text-primary text-[16px] font-normal font-geologica leading-6">
                                            Читать далее
                                        </div>
                                    </a>
                                    <div class="h-0 relative shrink-0 w-full">
                                        <div class="absolute bottom-0 left-0 right-0 top-[-2px]">
                                            <img alt="" class="block max-w-none size-full" src="/wp-content/themes/tebe-poveryat/assets/images/arrow-link-more.svg" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                         `;
                        tabletContentContainer.insertAdjacentHTML('beforeend', readMoreHtml);
                    }
                }
                tabletContentContainer.style.opacity = '1';
            }, 300);
        };

        const teamSwiper = new Swiper('.team__slider', {
            loop: true,
            speed: 900,
            loopedSlides: 6,
            breakpoints: {
                768: {
                    slidesPerView: 'auto',
                    centeredSlides: true,
                    spaceBetween: 24
                },
                1280: {
                    slidesPerView: 1,
                    centeredSlides: false,
                    spaceBetween: 0
                }
            },
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
                    if (window.innerWidth >= 768 && window.innerWidth < 1280) {
                        this.slideToLoop(0, 0); // Force start at first slide

                        setTimeout(() => {
                            const activeSlide = this.slides[this.activeIndex];
                            if (activeSlide && tabletContentContainer) {
                                const contentSource = activeSlide.querySelector('.team__content');
                                if (contentSource) {
                                    tabletContentContainer.innerHTML = contentSource.innerHTML;
                                    // Add 'Read More' link dynamically
                                    const readMoreHtml = `
                                        <div class="team__tablet-read-more mt-2">
                                            <div class="link-more-wrapper inline-flex flex-col justify-start items-start gap-0.5 group cursor-pointer">
                                                <a href="#" class="inline-flex justify-start items-center gap-3 no-underline">
                                                    <div class="text-primary text-[16px] font-normal font-geologica leading-6">
                                                        Читать далее
                                                    </div>
                                                </a>
                                                <div class="h-0 relative shrink-0 w-full">
                                                    <div class="absolute bottom-0 left-0 right-0 top-[-2px]">
                                                        <img alt="" class="block max-w-none size-full" src="/wp-content/themes/tebe-poveryat/assets/images/arrow-link-more.svg" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     `;
                                    tabletContentContainer.insertAdjacentHTML('beforeend', readMoreHtml);
                                    tabletContentContainer.style.opacity = '1';
                                }
                            }
                        }, 50);
                    }
                },
                slideChange: function () {
                    if (window.innerWidth >= 768 && window.innerWidth < 1280) {
                        updateTeamTabletContent(this);
                    }
                },
                resize: function () {
                    if (window.innerWidth >= 768 && window.innerWidth < 1280) {
                        const activeSlide = this.slides[this.activeIndex];
                        if (activeSlide && tabletContentContainer) {
                            const contentSource = activeSlide.querySelector('.team__content');
                            if (contentSource) {
                                tabletContentContainer.innerHTML = contentSource.innerHTML;
                                // Add 'Read More' link dynamically
                                const readMoreHtml = `
                                    <div class="team__tablet-read-more mt-2">
                                        <div class="link-more-wrapper inline-flex flex-col justify-start items-start gap-0.5 group cursor-pointer">
                                            <a href="#" class="inline-flex justify-start items-center gap-3 no-underline">
                                                <div class="text-primary text-[16px] font-normal font-geologica leading-6">
                                                    Читать далее
                                                </div>
                                            </a>
                                            <div class="h-0 relative shrink-0 w-full">
                                                <div class="absolute bottom-0 left-0 right-0 top-[-2px]">
                                                    <img alt="" class="block max-w-none size-full" src="/wp-content/themes/tebe-poveryat/assets/images/arrow-link-more.svg" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 `;
                                tabletContentContainer.insertAdjacentHTML('beforeend', readMoreHtml);
                                tabletContentContainer.style.opacity = '1';
                            }
                        }
                    }
                }
            }
        });
    }


});
