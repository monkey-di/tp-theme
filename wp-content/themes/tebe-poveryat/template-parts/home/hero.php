<?php
/**
 * Hero Section
 * Mobile First.
 * Dynamic content from main_slide CPT
 */

// Get main slider slides
$slides_query = new WP_Query(array(
        'post_type' => 'main_slide',
        'posts_per_page' => 3,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_status' => 'publish',
));
?>
<section class="hero-section bg-surface relative z-20 [border-radius:0_0_50%_50%_/_0_0_40px_40px] lg:[border-radius:0_0_50%_50%_/_0_0_80px_80px]">

    <div class="absolute inset-0 z-0 pointer-events-none px-0 lg:px-[96px] mob-bg md:hidden block">
        <style>
            .mob-bg {
                background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/Ellipse.png');
                background-repeat: no-repeat;
                background-position: calc(50% - 70px) top;
            }
        </style>
<!--        <img src="--><?php
//        echo get_template_directory_uri(); ?><!--/assets/images/Ellipse.png" alt=""-->
<!--             class="w-[297px] h-[308px] "/>-->
    </div>
    <div class="hero__container">

        <!-- Swiper Container -->
        <div class="hero__slider swiper">
            <div class="swiper-wrapper">
                <?php
                if ($slides_query->have_posts()) : ?>
                    <?php
                    while ($slides_query->have_posts()) : $slides_query->the_post(); ?>
                        <div class="swiper-slide">
                            <!-- Titles Section with Image (relative container for absolute image positioning) -->
                            <div class="hero__titles-section">
                                <!-- Main Title Part 1 -->
                                <h1 class="h1 hero__title-part1">Тебе  <br class="lg:hidden">поверят</h1>


                                <!-- Decorative Image (absolute positioned inside titles-section) -->
                                <div class="hero__image-wrapper">
                                    <?php
                                    if (has_post_thumbnail()) : ?>
                                        <?php
                                        the_post_thumbnail(
                                                'full',
                                                array('class' => 'hero__decor-image', 'alt' => get_the_title())
                                        ); ?>
                                    <?php
                                    else : ?>
                                        <img class="hero__decor-image" src="<?php
                                        echo get_theme_file_uri('assets/images/hero-abstract.png'); ?>"
                                             alt="Декоративное изображение"/>
                                    <?php
                                    endif; ?>
                                </div>
                            </div>

                            <!-- Subtitle -->
                            <h2 class="hero__subtitle"><?php
                                echo get_the_excerpt(); ?></h2>

                            <!-- Description -->
                            <div class="hero__description">
                                <?php
                                the_content(); ?>
                            </div>

                            <!-- Learn More Button/Link -->
                            <div class="hero__learn-more">
                                <?php
                                get_template_part('template-parts/components/link-more', null, [
                                        'text' => 'Узнать больше о нас',
                                        'url' => '#',
                                        'style' => 'hero'
                                ]); ?>
                            </div>
                        </div>
                    <?php
                    endwhile; ?>
                    <?php
                    wp_reset_postdata(); ?>
                <?php
                endif; ?>
            </div>
        </div>

        <!-- Slider Controls -->
        <div class="hero__slider-controls">
            <!-- Mobile Progress -->
            <div>
                <?php
                get_template_part('template-parts/components/slider-progress', null, [
                        'track_color' => '!bg-white',
                        'bar_color' => 'bg-secondary'
                ]); ?>
            </div>

            <!-- Desktop Navigation -->
            <?php
            get_template_part('template-parts/components/slider-navigation', null, [
                    'prev_class' => 'hero-prev',
                    'next_class' => 'hero-next',
                    'color' => 'text-primary'
            ]); ?>
        </div>
    </div>
</section>
