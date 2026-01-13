<?php
/**
 * Materials Section
 * Mobile First.
 */
?>
<section class="materials-section materials w-full bg-surface relative overflow-hidden px-4 z-20 pt-12 lg:pt-32 pb-12 lg:pb-32 [border-radius:50%_/_40px] lg:[border-radius:50%_/_80px]">
    <div class="materials__container container mx-auto flex flex-col gap-6 lg:gap-8">

        <!-- Title -->
        <h2 class="materials__title text-primary text-[32px] lg:text-[64px] font-normal font-ura uppercase leading-[1.1] lg:leading-[0.95] mb-2 text-left sm:text-center">
            Полезные <br class="lg:hidden">материалы
        </h2>

        <!-- Slider with Navigation (Desktop) -->
        <div class="materials__slider-area w-full flex items-center lg:justify-between lg:gap-x-4">

            <button type="button" class="materials-prev hidden xl:block cursor-pointer hover:opacity-70 transition flex-shrink-0">
                <img src="<?php echo get_theme_file_uri('assets/images/arrow-prev.svg'); ?>" alt="Previous" class="w-[56px] h-[56px]" />
            </button>

            <div class="swiper-container-wrapper w-full lg:flex-1 lg:min-w-0">
                <div class="materials__slider swiper">
                    <div class="swiper-wrapper">
                <?php
                $materials_query = new WP_Query(array(
                    'post_type'      => 'material',
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                    'post_status'    => 'publish',
                ));

                if ( $materials_query->have_posts() ) :
                    while ( $materials_query->have_posts() ) : $materials_query->the_post();
                        $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                        ?>
                        <div class="swiper-slide w-[500px] md:w-auto">
                            <div class="materials__card w-full xl:max-w-[1055px] xl:ml-[168px] flex flex-col xl:flex-row gap-6 xl:gap-0">
                                <!-- Illustration -->
                                <?php if ( $thumbnail_url ) : ?>
                                <div class="materials__card-image w-full md:w-[348px] md:h-[348px] xl:w-[453px] xl:h-[453px] xl:min-w-[453px] rounded-[20px] overflow-hidden relative bg-[#fef1ec] flex-shrink-0">
                                    <img src="<?php echo esc_url( $thumbnail_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="w-full h-full object-cover" />
                                </div>
                                <?php endif; ?>

                                <!-- Content -->
                                <div class="materials__card-content flex flex-col justify-start gap-4 md:gap-6 xl:p-12 xl:flex-1">
                                    <h3 class="materials__card-title text-contrast text-4xl md:text-[26px] font-extrabold font-akrobat leading-none md:max-w-full xl:max-w-[400px]">
                                        <?php the_title(); ?>
                                    </h3>
                                    <?php if ( has_excerpt() ) : ?>
                                    <p class="materials__card-description text-contrast text-[16px] md:text-[20px] xl:text-[23px] font-light font-geologica leading-[1.5] md:max-w-full xl:max-w-[400px] 2xl:max-w-full">
                                        <?php echo get_the_excerpt(); ?>
                                    </p>
                                    <?php endif; ?>

                                    <!-- Read Link -->
                                    <div class="materials__card-read-more">
                                        <?php get_template_part('template-parts/components/link-more', null, [
                                            'text' => 'Читать',
                                            'url' => get_permalink(),
                                            'style' => 'default'
                                        ]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
                    </div> <!-- End swiper-wrapper -->
                </div> <!-- End swiper -->
            </div> <!-- End swiper-container-wrapper -->

            <button type="button" class="materials-next hidden xl:block cursor-pointer hover:opacity-70 transition flex-shrink-0">
                <img src="<?php echo get_theme_file_uri('assets/images/arrow-next.svg'); ?>" alt="Next" class="w-[56px] h-[56px]" />
            </button>

        </div> <!-- End slider-area -->

        <!-- Tablet Content Container (Dynamic) -->
        <div class="materials__tablet-content hidden md:block xl:hidden w-full max-w-[720px] mx-auto mt-8 opacity-0 transition-opacity duration-300 flex flex-col gap-6 items-start">
             <!-- Content injected by JS -->
        </div>
        
        <!-- Hidden Safelist for JS-injected classes -->
        <div class="hidden link-more-wrapper inline-flex flex-col justify-start items-start gap-0.5 group cursor-pointer items-center gap-3 no-underline w-6 h-6 transition-transform duration-300 group-hover:translate-x-1 flex-shrink-0 flex text-primary text-[16px] font-normal font-geologica leading-6 h-0 relative shrink-0 w-full absolute bottom-0 left-0 right-0 top-[-2px] block max-w-none size-full"></div>

        <!-- Progress Bar (Mobile Only) -->
        <div class="materials__progress w-full xl:hidden">
            <?php get_template_part('template-parts/components/slider-progress', null, [
                'track_color' => '!bg-white',
                'bar_color' => 'bg-secondary'
            ]); ?>
        </div>

        <!-- View All Button -->
        <div class="materials__view-all w-full mt-4 flex justify-center">
            <a href="#" class="inline-flex justify-center items-center border border-primary rounded-[40px] px-5 py-4 lg:px-[20px] lg:py-[16px] text-[16px] text-primary uppercase font-geologica leading-[1.5] transition-colors hover:bg-primary hover:text-white w-full lg:w-[334px]">
                Смотреть все материалы
            </a>
        </div>

    </div>
</section>