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

                    <h2 class="hero__subtitle">We are a non-profit charitable organization.</h2>

                    <div class="hero__description hero__description--eng">
                        <p>1 of 8 children worldwide experiences sexual violence.
                            Together, we can change this — by learning, listening, believing, and supporting </p>
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

                    <h2 class="hero__subtitle">Dedicated to Supporting Survivors</h2>

                    <div class="hero__description hero__description--eng">
                        <p>Our mission is to create a safe space where survivors can seek help, find community, and reclaim their lives with dignity and respect.</p>
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

                    <h2 class="hero__subtitle">Comprehensive Support Services</h2>

                    <div class="hero__description hero__description--eng">
                        <p>From counseling and legal advice to community resources and advocacy, we offer comprehensive support tailored to each survivor's needs.</p>
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
