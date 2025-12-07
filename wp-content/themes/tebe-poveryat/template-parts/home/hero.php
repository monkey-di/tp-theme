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
                <div class="swiper-slide flex flex-col justify-start items-start h-full relative">
                    <!-- Main Title Part 1 -->
                    <h1 class="hero__title-part1 text-primary text-[56px] font-normal font-ura uppercase leading-[0.85] mt-8 z-10">Тебе</h1>
                    
                    <!-- Main Title Part 2 -->
                    <h1 class="hero__title-part2 text-primary text-[56px] font-normal font-ura uppercase leading-[0.85] -mt-2 z-10">поверят</h1>

                    <!-- Decorative Image -->
                    <img class="hero__decor-image w-[80px] h-[80px] absolute top-[20px] right-[20px] origin-top-left rotate-[10deg] outline outline-[4px] outline-offset-[-2px] outline-secondary z-0" src="https://www.figma.com/api/mcp/asset/b340971d-eb72-4eb3-88f4-0b125aaa4649" alt="Декоративное изображение" />

                    <!-- Subtitle -->
                    <h2 class="hero__subtitle text-contrast text-[28px] font-extrabold font-akrobat leading-tight mt-6 z-10">Мы — некоммерческая благотворительная организация</h2>
                    
                    <!-- Description -->
                    <div class="hero__description mt-4 z-10">
                        <p class="text-contrast text-base font-light font-geologica leading-6">Оказываем бесплатную психологическую и юридическую помощь пережившим сексуализированное насилие в детстве. Занимаемся профилактикой насилия, чтобы защитить детей и сделать общество безопаснее.</p>
                    </div>

                    <!-- Learn More Button/Link -->
                    <div class="hero__learn-more mt-8 z-10">
                        <?php get_template_part('template-parts/components/link-more', null, [
                            'text' => 'Узнать больше о нас',
                            'url' => '#',
                            'style' => 'hero'
                        ]); ?>
                    </div>
                </div>

                <!-- Slide 2 (Duplicate) -->
                <div class="swiper-slide flex flex-col justify-start items-start h-full relative">
                    <h1 class="hero__title-part1 text-primary text-[56px] font-normal font-ura uppercase leading-[0.85] mt-8 z-10">Тебе 2</h1>
                    <h1 class="hero__title-part2 text-primary text-[56px] font-normal font-ura uppercase leading-[0.85] -mt-2 z-10">поверят 2</h1>
                    <img class="hero__decor-image w-[80px] h-[80px] absolute top-[20px] right-[20px] origin-top-left rotate-[10deg] outline outline-[4px] outline-offset-[-2px] outline-secondary z-0" src="https://www.figma.com/api/mcp/asset/b340971d-eb72-4eb3-88f4-0b125aaa4649" alt="Декоративное изображение" />
                    <h2 class="hero__subtitle text-contrast text-[28px] font-extrabold font-akrobat leading-tight mt-6 z-10">Вторая некоммерческая благотворительная организация</h2>
                    <div class="hero__description mt-4 z-10">
                        <p class="text-contrast text-base font-light font-geologica leading-6">Описание второго слайда.</p>
                    </div>
                    <div class="hero__learn-more mt-8 z-10">
                        <?php get_template_part('template-parts/components/link-more', null, [
                            'text' => 'Узнать больше 2',
                            'url' => '#',
                            'style' => 'hero'
                        ]); ?>
                    </div>
                </div>

                <!-- Slide 3 (Duplicate) -->
                <div class="swiper-slide flex flex-col justify-start items-start h-full relative">
                    <h1 class="hero__title-part1 text-primary text-[56px] font-normal font-ura uppercase leading-[0.85] mt-8 z-10">Тебе 3</h1>
                    <h1 class="hero__title-part2 text-primary text-[56px] font-normal font-ura uppercase leading-[0.85] -mt-2 z-10">поверят 3</h1>
                    <img class="hero__decor-image w-[80px] h-[80px] absolute top-[20px] right-[20px] origin-top-left rotate-[10deg] outline outline-[4px] outline-offset-[-2px] outline-secondary z-0" src="https://www.figma.com/api/mcp/asset/b340971d-eb72-4eb3-88f4-0b125aaa4649" alt="Декоративное изображение" />
                    <h2 class="hero__subtitle text-contrast text-[28px] font-extrabold font-akrobat leading-tight mt-6 z-10">Третья некоммерческая благотворительная организация</h2>
                    <div class="hero__description mt-4 z-10">
                        <p class="text-contrast text-base font-light font-geologica leading-6">Описание третьего слайда.</p>
                    </div>
                    <div class="hero__learn-more mt-8 z-10">
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