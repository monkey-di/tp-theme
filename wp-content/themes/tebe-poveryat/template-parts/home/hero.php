<?php
/**
 * Hero Section
 * Mobile First.
 */
?>
<section class="hero-section hero w-full bg-base min-h-[594px] relative overflow-hidden py-12 px-4">
    <div class="hero__container container mx-auto flex flex-col justify-start items-start h-full swiper">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide flex flex-col justify-start items-start h-full">
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
                    <?php get_template_part('template-parts/components/link-more', null, [
                        'text' => 'Узнать больше о нас',
                        'url' => '#',
                        'style' => 'hero'
                    ]); ?>
                </div>
            </div>

            <!-- Slide 2 (Duplicate for now) -->
            <div class="swiper-slide flex flex-col justify-start items-start h-full">
                <!-- Main Title Part 1 -->
                <h1 class="hero__title-part1 text-primary text-[73px] font-normal font-ura uppercase leading-[69.35px] mt-4">Тебе 2</h1>
                <!-- Main Title Part 2 -->
                <h1 class="hero__title-part2 text-primary text-[73px] font-normal font-ura uppercase leading-[69.35px] mt-4">поверят 2</h1>
                <!-- Decorative Image -->
                <img class="hero__decor-image size-[98.73px] absolute top-[38px] right-4 origin-top-left rotate-[10deg] outline outline-[6px] outline-offset-[-3px] outline-secondary" src="https://placehold.co/99x99" alt="Декоративное изображение" />
                <!-- Subtitle -->
                <h2 class="hero__subtitle text-contrast text-4xl font-extrabold font-akrobat leading-9 mt-6">Вторая некоммерческая организация</h2>
                <!-- Description -->
                <div class="hero__description mt-6">
                    <p class="text-contrast text-base font-light font-geologica leading-6">Описание второго слайда: Это демонстрационный текст для второго слайда.</p>
                </div>
                <!-- Learn More Button/Link -->
                <div class="hero__learn-more mt-10">
                    <?php get_template_part('template-parts/components/link-more', null, [
                        'text' => 'Узнать больше 2',
                        'url' => '#',
                        'style' => 'hero'
                    ]); ?>
                </div>
            </div>

            <!-- Slide 3 (Duplicate for now) -->
            <div class="swiper-slide flex flex-col justify-start items-start h-full">
                <!-- Main Title Part 1 -->
                <h1 class="hero__title-part1 text-primary text-[73px] font-normal font-ura uppercase leading-[69.35px] mt-4">Тебе 3</h1>
                <!-- Main Title Part 2 -->
                <h1 class="hero__title-part2 text-primary text-[73px] font-normal font-ura uppercase leading-[69.35px] mt-4">поверят 3</h1>
                <!-- Decorative Image -->
                <img class="hero__decor-image size-[98.73px] absolute top-[38px] right-4 origin-top-left rotate-[10deg] outline outline-[6px] outline-offset-[-3px] outline-secondary" src="https://placehold.co/99x99" alt="Декоративное изображение" />
                <!-- Subtitle -->
                <h2 class="hero__subtitle text-contrast text-4xl font-extrabold font-akrobat leading-9 mt-6">Третья некоммерческая организация</h2>
                <!-- Description -->
                <div class="hero__description mt-6">
                    <p class="text-contrast text-base font-light font-geologica leading-6">Описание третьего слайда: Это демонстрационный текст для третьего слайда.</p>
                </div>
                <!-- Learn More Button/Link -->
                <div class="hero__learn-more mt-10">
                    <?php get_template_part('template-parts/components/link-more', null, [
                        'text' => 'Узнать больше 3',
                        'url' => '#',
                        'style' => 'hero'
                    ]); ?>
                </div>
            </div>
        </div>

        <!-- Slider Progress Indicator -->
        <div class="hero__slider-progress mt-auto mb-4 w-full">
            <?php get_template_part('template-parts/components/slider-progress', null, [
                'track_color' => 'bg-white',
                'bar_color' => 'bg-secondary'
            ]); ?>
        </div>
    </div>
</section>