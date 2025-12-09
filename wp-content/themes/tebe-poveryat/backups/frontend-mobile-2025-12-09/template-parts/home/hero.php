<?php
/**
 * Hero Section
 * Mobile First.
 */
?>
<section class="hero-section">
    <!-- Desktop Background Decorative Ellipses -->
    <div class="hero__bg-ellipse hero__bg-ellipse--large"></div>
    <div class="hero__bg-ellipse hero__bg-ellipse--top-left"></div>
    <div class="hero__bg-ellipse hero__bg-ellipse--bottom-right"></div>
    <div class="hero__bg-ellipse hero__bg-ellipse--top-left-small"></div>
    <div class="hero__bg-ellipse hero__bg-ellipse--bottom-right-small"></div>

    <div class="hero__container">

        <!-- Swiper Container -->
        <div class="hero__slider swiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <!-- Titles Section with Image (relative container for absolute image positioning) -->
                    <div class="hero__titles-section">
                        <!-- Main Title Part 1 -->
                        <h1 class="hero__title-part1">Тебе</h1>

                        <!-- Main Title Part 2 -->
                        <h1 class="hero__title-part2">поверят</h1>

                        <!-- Decorative Image (absolute positioned inside titles-section) -->
                        <div class="hero__image-wrapper">
                            <img class="hero__decor-image" src="<?php echo get_theme_file_uri('assets/hero.webp'); ?>" alt="Декоративное изображение" />
                        </div>
                    </div>

                    <!-- Subtitle -->
                    <h2 class="hero__subtitle">Мы — некоммерческая благотворительная организация</h2>

                    <!-- Description -->
                    <div class="hero__description">
                        <p>Оказываем бесплатную психологическую и юридическую помощь пережившим сексуализированное насилие в детстве. Занимаемся профилактикой насилия, чтобы защитить детей и сделать общество безопаснее.</p>
                    </div>

                    <!-- Learn More Button/Link -->
                    <div class="hero__learn-more">
                        <?php get_template_part('template-parts/components/link-more', null, [
                            'text' => 'Узнать больше о нас',
                            'url' => '#',
                            'style' => 'hero'
                        ]); ?>
                    </div>
                </div>

                <!-- Slide 2 (Identical) -->
                <div class="swiper-slide">
                    <div class="hero__titles-section">
                        <h1 class="hero__title-part1">Тебе</h1>
                        <h1 class="hero__title-part2">поверят</h1>
                        <div class="hero__image-wrapper">
                            <img class="hero__decor-image" src="<?php echo get_theme_file_uri('assets/hero.webp'); ?>" alt="Декоративное изображение" />
                        </div>
                    </div>
                    <h2 class="hero__subtitle">Мы — некоммерческая благотворительная организация</h2>
                    <div class="hero__description">
                        <p>Оказываем бесплатную психологическую и юридическую помощь пережившим сексуализированное насилие в детстве. Занимаемся профилактикой насилия, чтобы защитить детей и сделать общество безопаснее.</p>
                    </div>
                    <div class="hero__learn-more">
                        <?php get_template_part('template-parts/components/link-more', null, [
                            'text' => 'Узнать больше о нас',
                            'url' => '#',
                            'style' => 'hero'
                        ]); ?>
                    </div>
                </div>

                <!-- Slide 3 (Identical) -->
                <div class="swiper-slide">
                    <div class="hero__titles-section">
                        <h1 class="hero__title-part1">Тебе</h1>
                        <h1 class="hero__title-part2">поверят</h1>
                        <div class="hero__image-wrapper">
                            <img class="hero__decor-image" src="<?php echo get_theme_file_uri('assets/hero.webp'); ?>" alt="Декоративное изображение" />
                        </div>
                    </div>
                    <h2 class="hero__subtitle">Мы — некоммерческая благотворительная организация</h2>
                    <div class="hero__description">
                        <p>Оказываем бесплатную психологическую и юридическую помощь пережившим сексуализированное насилие в детстве. Занимаемся профилактикой насилия, чтобы защитить детей и сделать общество безопаснее.</p>
                    </div>
                    <div class="hero__learn-more">
                        <?php get_template_part('template-parts/components/link-more', null, [
                            'text' => 'Узнать больше о нас',
                            'url' => '#',
                            'style' => 'hero'
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Controls -->
        <div class="hero__slider-controls">
            <!-- Mobile Progress -->
            <div>
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
