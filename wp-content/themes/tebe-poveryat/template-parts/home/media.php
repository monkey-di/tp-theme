<?php
/**
 * Media About Us Section
 * Mobile First.
 */

?>
<section class="media-section w-full bg-teal relative overflow-hidden z-10 mt-[-40px] mb-[-40px] lg:mt-[-80px] lg:mb-[-80px] pt-[80px] lg:pt-[160px] pb-[80px] lg:pb-[160px]">
    <div class="hidden lg:block absolute inset-0 z-0 pointer-events-none px-[96px]">
        <img src="<?php
        echo get_template_directory_uri(); ?>/assets/images/bg2.png" alt="" class="w-full h-full"/>

    </div>

    <div class="absolute inset-0 z-0 pointer-events-none px-0 lg:px-[96px] lg:hidden block">
        <img src="<?php
        echo get_template_directory_uri(); ?>/assets/images/fon2.png" alt=""
             class="w-full h-full object-cover object-bottom lg:object-center"/>
    </div>

    <!-- Background Decor -->
    <div class="media-section__decor absolute inset-0 z-0 opacity-20 pointer-events-none">
        <div class="absolute bottom-[-0.93%] flex items-center justify-center left-[-308px] top-[3.01%] w-[688.41px]">
            <div class="flex-none h-[325.078px] rotate-[180deg] w-[688.41px]">
                <div class="opacity-[0.45] relative size-full">
                    <img src="<?php echo get_theme_file_uri('assets/images/media-decor-1.svg'); ?>" alt=""
                         class="block max-w-none size-full"/>
                </div>
            </div>
        </div>
        <div class="absolute bottom-[-0.13%] flex items-center justify-center left-[-72.91%] right-[10.22%] top-0">
            <div className="flex-none h-[332.434px] rotate-[180deg] scale-y-[-100%] w-[618.207px]">
                <div class="opacity-[0.45] relative size-full">
                    <img src="<?php echo get_theme_file_uri('assets/images/media-decor-2.svg'); ?>" alt=""
                         class="block max-w-none size-full"/>
                </div>
            </div>
        </div>
    </div>

    <div class="media__container container mx-auto px-4 relative z-20 flex flex-col gap-8 lg:gap-12 lg:my-20">

        <!-- Title -->
        <h2 class="media__title text-center text-white text-[32px] lg:text-[64px] font-normal font-ura uppercase leading-[1.1] lg:leading-[0.95]">
            Сми о нас
        </h2>

        <!-- Slider Cards -->
        <div class="media__slider swiper w-full min-w-0">
            <div class="swiper-wrapper">
                <?php
                $media_posts = get_posts(array(
                        'post_type' => 'media_item',
                        'posts_per_page' => -1,
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                        'post_status' => 'publish',
                ));

                if (!empty($media_posts)) {
                    // Duplicate posts to ensure smooth infinite loop if there are few items
                    // We want at least enough items to cover 2x the max view count (6) => 12 items
                    $original_posts = $media_posts;
                    while (count($media_posts) < 12) {
                        $media_posts = array_merge($media_posts, $original_posts);
                    }

                    foreach ($media_posts as $post) :
                        setup_postdata($post);
                        $media_url = get_post_meta(get_the_ID(), '_media_url', true);
                        $logo_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

                        if (!$logo_url) {
                            continue;
                        }
                        ?>
                        <div class="media__card swiper-slide h-[87px] p-5 bg-white rounded-[20px] flex justify-center items-center">
                            <div class="w-[150px] h-[47px] relative flex items-center justify-center">
                                <?php
                                if ($media_url) : ?>
                                    <a href="<?php
                                    echo esc_url($media_url); ?>" target="_blank" rel="noopener noreferrer"
                                       class="w-full h-full flex items-center justify-center">
                                        <img src="<?php
                                        echo esc_url($logo_url); ?>" alt="<?php
                                        echo esc_attr(get_the_title()); ?>" class="w-full h-full object-contain"/>
                                    </a>
                                <?php
                                else : ?>
                                    <img src="<?php
                                    echo esc_url($logo_url); ?>" alt="<?php
                                    echo esc_attr(get_the_title()); ?>" class="w-full h-full object-contain"/>
                                <?php
                                endif; ?>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    wp_reset_postdata();
                }
                ?>
            </div>
        </div>

        <!-- Slider Controls -->
        <div class="media__controls w-full">
            <!-- Mobile Progress -->
            <div class="media__progress w-full lg:hidden py-4">
                <?php
                get_template_part('template-parts/components/slider-progress', null, [
                        'track_color' => '!bg-white/20',

                        'is_white' => true
                ]); ?>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex w-full">
                <?php
                get_template_part('template-parts/components/slider-navigation', null, [
                        'prev_class' => 'media-prev',
                        'next_class' => 'media-next',
                        'color' => 'text-white',
                        'img_class' => 'w-[40px] h-[40px]',
                        'arrow_prev' => 'arrow-prev-white.svg',
                        'arrow_next' => 'arrow-next-white.svg',
                        'justify' => 'justify-center'
                ]); ?>
            </div>
        </div>

    </div>
</section>
