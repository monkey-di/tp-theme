<?php
/**
 * Hero Section
 * Mobile First.
 */
?>
<section class="hero-section hero w-full bg-base min-h-[594px] relative overflow-hidden py-12 px-4">
    <div class="hero__container container mx-auto flex flex-col justify-start items-start h-full">
        
        <!-- Swiper Container -->
        <div class="hero__slider swiper w-full flex-grow">
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
                    <h1 class="hero__title-part1 text-primary text-[73px] font-normal font-ura uppercase leading-[69.35px] mt-4">Тебе 2</h1>
                    <h1 class="hero__title-part2 text-primary text-[73px] font-normal font-ura uppercase leading-[69.35px] mt-4">поверят 2</h1>
                    <img class="hero__decor-image size-[98.73px] absolute top-[38px] right-4 origin-top-left rotate-[10deg] outline outline-[6px] outline-offset-[-3px] outline-secondary" src="https://placehold.co/99x99" alt="Декоративное изображение" />
                    <h2 class="hero__subtitle text-contrast text-4xl font-extrabold font-akrobat leading-9 mt-6">Вторая некоммерческая организация</h2>
                    <div class="hero__description mt-6">
                        <p class="text-contrast text-base font-light font-geologica leading-6">Описание второго слайда.</p>
                    </div>
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
                    <h1 class="hero__title-part1 text-primary text-[73px] font-normal font-ura uppercase leading-[69.35px] mt-4">Тебе 3</h1>
                    <h1 class="hero__title-part2 text-primary text-[73px] font-normal font-ura uppercase leading-[69.35px] mt-4">поверят 3</h1>
                    <img class="hero__decor-image size-[98.73px] absolute top-[38px] right-4 origin-top-left rotate-[10deg] outline outline-[6px] outline-offset-[-3px] outline-secondary" src="https://placehold.co/99x99" alt="Декоративное изображение" />
                    <h2 class="hero__subtitle text-contrast text-4xl font-extrabold font-akrobat leading-9 mt-6">Третья некоммерческая организация</h2>
                    <div class="hero__description mt-6">
                        <p class="text-contrast text-base font-light font-geologica leading-6">Описание третьего слайда.</p>
                    </div>
                    <div class="hero__learn-more mt-10">
                        <?php get_template_part('template-parts/components/link-more', null, [
                            'text' => 'Узнать больше 3',
                            'url' => '#',
                            'style' => 'hero'
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Controls -->
        <div class="hero__slider-controls mt-auto mb-4 w-full flex justify-between items-end z-10">
            <!-- Mobile Progress -->
            <div class="w-full md:hidden">
                <?php get_template_part('template-parts/components/slider-progress', null, [
                    'track_color' => 'bg-white',
                    'bar_color' => 'bg-secondary'
                ]); ?>
            </div>

            <!-- Desktop Navigation -->
            <?php get_template_part('template-parts/components/slider-navigation', null, [
                'prev_class' => 'hero-prev',
                'next_class' => 'hero-next',
                'color'      => 'text-primary'
            ]); ?>
        </div>
    </div>
</section>