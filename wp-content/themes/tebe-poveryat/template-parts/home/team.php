<?php
/**
 * Team Section
 * Mobile First.
 */
?>
<section class="team-section w-full bg-surface px-4 relative overflow-hidden z-20 pt-12 lg:pt-32 pb-12 lg:pb-32 [border-radius:50%_50%_0_0_/_40px_40px_0_0] lg:[border-radius:50%_50%_0_0_/_80px_80px_0_0]">
    
    <div class="team__container container mx-auto px-4 relative z-20 mt-8 mb-8 flex flex-col gap-8">
        
        <!-- Title -->
        <h2 class="team__title text-primary text-[32px] lg:text-[64px] font-normal font-ura uppercase leading-[1.1] lg:leading-[0.95] mb-2 text=left lg:text-center">
            Наши специалисты
        </h2>

        <!-- Slider with Navigation (Desktop) -->
        <div class="team__slider-area w-full flex items-center lg:justify-between lg:gap-x-4">

            <button type="button" class="team-prev hidden lg:block cursor-pointer hover:opacity-70 transition flex-shrink-0">
                <img src="<?php echo get_theme_file_uri('assets/images/arrow-prev.svg'); ?>" alt="Previous" class="w-[56px] h-[56px]" />
            </button>

            <div class="swiper-container-wrapper w-full lg:flex-1 lg:min-w-0">
                <div class="team__slider swiper">
            <div class="swiper-wrapper">
                <?php
                $team_query = new WP_Query(array(
                    'post_type'      => 'team_member',
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                    'post_status'    => 'publish',
                ));

                if ( $team_query->have_posts() ) :
                    while ( $team_query->have_posts() ) : $team_query->the_post();
                        $position = get_post_meta( get_the_ID(), '_team_position', true );
                        $photo_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                        $name = get_the_title();
                        $name_mobile = str_replace( ' ', '<br>', $name ); // Имя с <br> для мобильного
                        ?>
                        <div class="swiper-slide">
                            <div class="team__card w-full lg:max-w-[1105px] lg:ml-auto flex flex-col lg:flex-row gap-6 lg:gap-0 rounded-[20px] overflow-hidden">
                                <!-- Image Container -->
                                <?php if ( $photo_url ) : ?>
                                <div class="team__card-image relative w-full lg:w-[358px] lg:min-w-[358px] h-[636px] lg:h-auto flex-shrink-0 rounded-[20px] overflow-hidden">
                                    <img class="w-full h-full object-cover rounded-[20px]" src="<?php echo esc_url( $photo_url ); ?>" alt="<?php echo esc_attr( $name ); ?>" />
                                    <!-- Overlay for mobile only -->
                                    <div class="absolute inset-0 bg-black/20 pointer-events-none lg:hidden"></div>
                                    <!-- Name & Role Overlay - Mobile only -->
                                    <div class="absolute left-0 bottom-0 w-full p-[16px] lg:hidden">
                                        <h3 class="text-white text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                            <?php echo $name_mobile; ?>
                                        </h3>
                                        <?php if ( $position ) : ?>
                                        <p class="text-white text-[16px] font-normal font-geologica leading-[1.5]">
                                            <?php echo esc_html( $position ); ?>
                                        </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <!-- Content -->
                                <div class="team__card-content w-full px-4 py-6 lg:p-6 lg:pl-10 flex flex-col gap-1 lg:flex-1">
                                    <!-- Name & Role - Desktop only -->
                                    <div class="hidden lg:flex lg:flex-col lg:gap-1 ">
                                        <h3 class="text-contrast text-[40px] font-extrabold font-akrobat uppercase leading-none">
                                            <?php echo esc_html( $name ); ?>
                                        </h3>
                                        <?php if ( $position ) : ?>
                                        <p class="text-contrast text-[20px] font-light font-geologica leading-[1.5]">
                                            <?php echo esc_html( $position ); ?>
                                        </p>
                                        <?php endif; ?>
                                    </div>
                                    <!-- Description -->
                                    <?php if ( get_the_content() ) : ?>
                                    <div class="mt-[26px]">
                                        <p class="text-contrast text-[16px] lg:text-[23px] font-light font-geologica leading-[1.5] max-w-[630px] line-clamp-6 xl:line-clamp-none">
                                            <?php echo get_the_content(); ?>
                                        </p>
                                    </div>
                                    <?php endif; ?>
                                    <!-- Read More (Mobile Only) -->
                                    <div class="team__card-read-more lg:hidden">
                                        <?php get_template_part('template-parts/components/link-more', null, [
                                            'text' => 'Читать далее',
                                            'url' => '#',
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

            <button type="button" class="team-next hidden lg:block cursor-pointer hover:opacity-70 transition flex-shrink-0">
                <img src="<?php echo get_theme_file_uri('assets/images/arrow-next.svg'); ?>" alt="Next" class="w-[56px] h-[56px]" />
            </button>

        </div> <!-- End slider-area -->

        <!-- Progress Bar (Mobile Only) -->
        <div class="team__progress w-full lg:hidden">
            <?php get_template_part('template-parts/components/slider-progress', null, [
                'track_color' => '!bg-white',
                'bar_color' => 'bg-secondary'
            ]); ?>
        </div>

    </div>
</section>