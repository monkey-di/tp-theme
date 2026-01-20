/**
 * Slider logic (e.g., for Swiper.js initialization)
 */

function initSliders() {
    const sliders = document.querySelectorAll('.hero-slider, .project-slider, .lock-slider-text_slider-inner');
    
    if (sliders.length === 0) return;

    console.log('Sliders found:', sliders.length);
    // Здесь будет код инициализации библиотеки слайдера
}

document.addEventListener('DOMContentLoaded', initSliders);
