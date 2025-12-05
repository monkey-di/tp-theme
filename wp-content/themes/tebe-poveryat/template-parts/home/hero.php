<?php
/**
 * Hero Section
 * Mobile First.
 */
?>
<section class="hero-section hero w-full bg-base min-h-[594px] relative overflow-hidden py-12 px-4">
    <div class="hero__container container mx-auto flex flex-col justify-start items-start h-full">
        
        <!-- Main Title Part 1 -->
        <h1 class="hero__title-part1 text-primary text-[73px] font-normal font-ura uppercase leading-[69.35px] mt-4">Тебе</h1>
        
        <!-- Main Title Part 2 -->
        <h1 class="hero__title-part2 text-primary text-[73px] font-normal font-ura uppercase leading-[69.35px] mt-4">поверят</h1>

        <!-- Decorative Image -->
        <img class="hero__decor-image size-[98.73px] absolute top-[38px] right-4 origin-top-left rotate-[10deg] outline outline-[6px] outline-offset-[-3px] outline-secondary" src="https://placehold.co/99x99" alt="Декоративное изображение" />

        <!-- Subtitle -->
        <h2 class="hero__subtitle text-contrast text-4xl font-extrabold font-akrobat leading-9 mt-6">Мы — некоммерческая благотворительная организация</h2>
        
        <!-- Description -->
        <div class="hero__description mt-6">
            <p class="text-contrast text-base font-light font-geologica leading-6">Оказываем бесплатную психологическую и юридическую помощь пережившим сексуализированное насилие в детстве. Занимаемся профилактикой насилия, чтобы защитить детей и сделать общество безопаснее.</p>
        </div>

        <!-- Learn More Button/Link -->
        <div class="hero__learn-more mt-10">
            <a href="#" class="hero__learn-more-link inline-flex justify-start items-center gap-3 no-underline">
                <div class="hero__learn-more-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 3V15H16.175L12.575 18.575L14 20L20 14L13.975 7.975L12.575 9.4L16.175 13H7V3H5Z" fill="var(--wp--preset--color--primary)"/>
                    </svg>
                </div>
                <span class="text-primary text-xl font-bold font-akrobat leading-5">Узнать больше о нас</span>
            </a>
            <div class="hero__learn-more-underline self-stretch h-0 outline outline-2 outline-offset-[-1px] outline-primary mt-1"></div>
        </div>

        <!-- Slider Progress Indicator -->
        <div class="hero__slider-progress w-full h-0.5 bg-white overflow-hidden mt-auto mb-4">
            <div class="hero__slider-progress-fill w-[104px] h-0.5 bg-secondary rounded-sm"></div>
        </div>
    </div>
</section>