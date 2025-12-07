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
                <div class="swiper-slide flex flex-col justify-start items-start h-full relative">
                    <!-- Main Title Part 1 -->
                    <h1 class="hero__title-part1 text-primary text-[73px] font-normal font-ura uppercase leading-[0.95] mt-12 z-10 relative">Тебе</h1>
                    
                    <!-- Main Title Part 2 -->
                    <h1 class="hero__title-part2 text-primary text-[73px] font-normal font-ura uppercase leading-[0.95] -mt-2 z-10 relative">поверят</h1>

                    <!-- Decorative Image -->
                    <div class="absolute top-[38px] left-[calc(50%+19px)] z-0">
                        <img class="hero__decor-image w-[99px] h-[99px] object-cover" src="<?php echo get_theme_file_uri('assets/hero.webp'); ?>" alt="Декоративное изображение" />
                    </div>

                    <!-- Subtitle -->
                    <h2 class="hero__subtitle text-contrast text-[36px] font-extrabold font-akrobat leading-none mt-8 z-10 relative">Мы — некоммерческая благотворительная организация</h2>
                    
                    <!-- Description -->
                    <div class="hero__description mt-6 z-10 relative">
                        <p class="text-[#19232e] text-[16px] font-light font-geologica leading-[1.5]">Оказываем бесплатную психологическую и юридическую помощь пережившим сексуализированное насилие в детстве. Занимаемся профилактикой насилия, чтобы защитить детей и сделать общество безопаснее.</p>
                    </div>

                    <!-- Learn More Button/Link -->
                    <div class="hero__learn-more mt-10 z-10 relative">
                        <?php get_template_part('template-parts/components/link-more', null, [
                            'text' => 'Узнать больше о нас',
                            'url' => '#',
                            'style' => 'hero' // Ensure 'hero' style corresponds to Akrobat Bold 20px in component
                        ]); ?>
                    </div>
                </div>

                <!-- Slide 2 (Duplicate) -->
                <div class="swiper-slide flex flex-col justify-start items-start h-full relative">
                    <div class="absolute top-[38px] left-[calc(50%+19px)] z-0">
                        <img class="hero__decor-image w-[99px] h-[99px] object-cover" src="<?php echo get_theme_file_uri('assets/hero.webp'); ?>" alt="Декоративное изображение" />
                    </div>
                    <h1 class="hero__title-part1 text-primary text-[73px] font-normal font-ura uppercase leading-[0.95] mt-12 z-10 relative">Тебе 2</h1>
                    <h1 class="hero__title-part2 text-primary text-[73px] font-normal font-ura uppercase leading-[0.95] -mt-2 z-10 relative">поверят 2</h1>
                    <h2 class="hero__subtitle text-contrast text-[36px] font-extrabold font-akrobat leading-none mt-8 z-10 relative">Вторая некоммерческая благотворительная организация</h2>
                    <div class="hero__description mt-6 z-10 relative">
                        <p class="text-[#19232e] text-[16px] font-light font-geologica leading-[1.5]">Описание второго слайда.</p>
                    </div>
                    <div class="hero__learn-more mt-10 z-10 relative">
                        <?php get_template_part('template-parts/components/link-more', null, [
                            'text' => 'Узнать больше 2',
                            'url' => '#',
                            'style' => 'hero'
                        ]); ?>
                    </div>
                </div>

                <!-- Slide 3 (Duplicate) -->
                <div class="swiper-slide flex flex-col justify-start items-start h-full relative">
                    <div class="absolute top-[38px] left-[calc(50%+19px)] z-0">
                        <img class="hero__decor-image w-[99px] h-[99px] object-cover" src="<?php echo get_theme_file_uri('assets/hero.webp'); ?>" alt="Декоративное изображение" />
                    </div>
                    <h1 class="hero__title-part1 text-primary text-[73px] font-normal font-ura uppercase leading-[0.95] mt-12 z-10 relative">Тебе 3</h1>
                    <h1 class="hero__title-part2 text-primary text-[73px] font-normal font-ura uppercase leading-[0.95] -mt-2 z-10 relative">поверят 3</h1>
                    <h2 class="hero__subtitle text-contrast text-[36px] font-extrabold font-akrobat leading-none mt-8 z-10 relative">Третья некоммерческая благотворительная организация</h2>
                    <div class="hero__description mt-6 z-10 relative">
                        <p class="text-[#19232e] text-[16px] font-light font-geologica leading-[1.5]">Описание третьего слайда.</p>
                    </div>
                    <div class="hero__learn-more mt-10 z-10 relative">
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