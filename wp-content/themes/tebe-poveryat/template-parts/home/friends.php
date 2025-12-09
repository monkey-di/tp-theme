<?php
/**
 * Friends / Partners Section
 * Mobile First with Desktop version.
 * Dynamic content from friend CPT
 */

// Get friends
$friends_query = new WP_Query(array(
	'post_type'      => 'friend',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
	'post_status'    => 'publish',
));

?>
<section class="friends-section w-full bg-surface relative overflow-hidden py-12 lg:py-24">
    <div class="friends__container container mx-auto px-4 relative z-20 flex flex-col items-center">

        <h2 class="friends__title text-primary text-[32px] lg:text-[64px] font-ura uppercase text-center mb-8">
            Наши друзья
        </h2>

        <?php if ( $friends_query->have_posts() ) : ?>
            <div class="friends__slider-area w-full flex items-center lg:justify-between lg:gap-x-4 lg:mt-10">
                <button type="button" class="friends-prev hidden lg:block cursor-pointer hover:opacity-70 transition">
                    <img src="<?php echo get_theme_file_uri('assets/images/arrow-prev.svg'); ?>" alt="Previous" />
                </button>

                <div class="swiper-container-wrapper w-full lg:max-w-[1169px]">
                    <div class="friends__slider swiper">
                        <div class="swiper-wrapper items-stretch">
                            <?php
                            // First loop
                            while ( $friends_query->have_posts() ) : $friends_query->the_post();
                            ?>
                                <div class="swiper-slide">
                                    <div class="friends__card h-full flex flex-col gap-6">
                                        <div class="friends__card-image-wrap relative rounded-[20px] overflow-hidden">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail( 'full', array(
                                                    'class' => 'w-full h-auto object-cover aspect-[853/1280]',
                                                    'alt' => get_the_title()
                                                ) ); ?>
                                            <?php endif; ?>
                                            <div class="absolute left-4 bottom-4 text-white">
                                                <h3 class="text-[40px] font-extrabold font-akrobat uppercase leading-none"><?php the_title(); ?></h3>
                                                <p class="text-[16px] font-geologica leading-[1.5]"><?php echo get_the_excerpt(); ?></p>
                                            </div>
                                        </div>
                                        <p class="friends__card-quote text-[23px] font-light font-geologica leading-[1.5] text-contrast">
                                            <?php echo get_the_content(); ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endwhile; ?>

                            <?php
                            // Second loop for seamless looping
                            $friends_query->rewind_posts();
                            while ( $friends_query->have_posts() ) : $friends_query->the_post();
                            ?>
                                <div class="swiper-slide">
                                    <div class="friends__card h-full flex flex-col gap-6">
                                        <div class="friends__card-image-wrap relative rounded-[20px] overflow-hidden">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail( 'full', array(
                                                    'class' => 'w-full h-auto object-cover aspect-[853/1280]',
                                                    'alt' => get_the_title()
                                                ) ); ?>
                                            <?php endif; ?>
                                            <div class="absolute left-4 bottom-4 text-white">
                                                <h3 class="text-[40px] font-extrabold font-akrobat uppercase leading-none"><?php the_title(); ?></h3>
                                                <p class="text-[16px] font-geologica leading-[1.5]"><?php echo get_the_excerpt(); ?></p>
                                            </div>
                                        </div>
                                        <p class="friends__card-quote text-[23px] font-light font-geologica leading-[1.5] text-contrast">
                                            <?php echo get_the_content(); ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>

                <button type="button" class="friends-next hidden lg:block cursor-pointer hover:opacity-70 transition">
                    <img src="<?php echo get_theme_file_uri('assets/images/arrow-next.svg'); ?>" alt="Next" />
                </button>
            </div>

            <div class="friends__mobile-progress w-full mt-8 lg:hidden">
                 <?php get_template_part('template-parts/components/slider-progress', null, [
                    'track_color' => 'bg-black/20',
                    'bar_color' => 'bg-secondary'
                ]); ?>
            </div>
        <?php endif; ?>

    </div>
</section>
