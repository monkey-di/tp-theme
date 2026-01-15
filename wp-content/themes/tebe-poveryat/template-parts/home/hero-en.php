<?php
/**
 * English Hero Section
 * Static content version for English homepage
 */
?>
<section class="hero-section bg-surface relative z-[21] [border-radius:0_0_50%_50%_/_0_0_40px_40px] lg:[border-radius:0_0_50%_50%_/_0_0_80px_80px]">

    <div class="absolute inset-0 z-0 pointer-events-none px-0 lg:px-[96px] mob-bg md:hidden block">
        <style>
            .mob-bg {
                background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/Ellipse.png');
                background-repeat: no-repeat;
                background-position: calc(50% - 70px) top;
            }
        </style>
    </div>

    <div class="hero__container">
        <!-- Swiper Container -->
        <div class="hero__slider swiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="hero__titles-section max-w-full hero__titles-section--layered">
                        <h1 class="h1 hero__title-part1 text-left md:text-center">
                            <div class="hidden md:inline xl:hidden">&nbsp;</div>
                            <span class="relative z-0">We Believe</span> <br class="lg:hidden"><span class="relative z-20">you</span>
                        </h1>
                        <div class="hero__image-wrapper hero__image-wrapper--eng">
                            <img class="hero__decor-image" src="<?php echo get_theme_file_uri('assets/images/hero-abstract.png'); ?>" alt="Decorative image"/>
                        </div>
                    </div>

                    <?php block_template_part( 'hero-en-s1-subtitle' ); ?>

                    <div class="hero__description hero__description--eng">
                        <?php block_template_part( 'hero-en-s1-desc' ); ?>
                    </div>


                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="hero__titles-section">
                        <h1 class="h1 hero__title-part1">
                            <div class="hidden md:inline xl:hidden">&nbsp;</div>
                            Our <br class="lg:hidden">Mission
                        </h1>
                        <div class="hero__image-wrapper hero__image-wrapper--eng">
                            <img class="hero__decor-image" src="<?php echo get_theme_file_uri('assets/images/hero-abstract.png'); ?>" alt="Decorative image"/>
                        </div>
                    </div>

                    <?php block_template_part( 'hero-en-s2-subtitle' ); ?>

                    <div class="hero__description hero__description--eng">
                        <?php block_template_part( 'hero-en-s2-desc' ); ?>
                    </div>

                    <div class="hero__learn-more md:flex md:justify-center md:mt-8">
                        <?php get_template_part('template-parts/components/link-more', null, [
                            'text' => 'Learn More About Us',
                            'url' => '#',
                            'style' => 'hero',
                            'class' => 'md:m-auto'
                        ]); ?>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <div class="hero__titles-section">
                        <h1 class="h1 hero__title-part1">
                            <div class="hidden md:inline xl:hidden">&nbsp;</div>
                            How We <br class="lg:hidden">Help
                        </h1>
                        <div class="hero__image-wrapper hero__image-wrapper--eng">
                            <img class="hero__decor-image" src="<?php echo get_theme_file_uri('assets/images/hero-abstract.png'); ?>" alt="Decorative image"/>
                        </div>
                    </div>

                    <?php block_template_part( 'hero-en-s3-subtitle' ); ?>

                    <div class="hero__description hero__description--eng">
                        <?php block_template_part( 'hero-en-s3-desc' ); ?>
                    </div>

                    <div class="hero__learn-more md:flex md:justify-center md:mt-8">
                        <?php get_template_part('template-parts/components/link-more', null, [
                            'text' => 'Learn More About Us',
                            'url' => '#',
                            'style' => 'hero',
                            'class' => 'md:m-auto'
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
                    'track_color' => '!bg-white',
                    'bar_color' => 'bg-secondary'
                ]); ?>
            </div>

            <!-- Desktop Navigation -->
            <?php get_template_part('template-parts/components/slider-navigation', null, [
                'prev_class' => 'hero-prev',
                'next_class' => 'hero-next',
                'color' => 'text-primary'
            ]); ?>
        </div>
    </div>
</section>
