<?php
/**
 * Шаблон блока "Блок слайдер + текст"
 */
$slider = '';
$text = '';
if(function_exists('get_field')) {
    $slider = get_field('slider');
    $text = get_field('slider-text');
}

$has_data = !empty($slider) || !empty($text);

if ($has_data) { ?>
    <div class="block-slider-text">
        <div class="block-slider-text_slider block-slider-text-col">
            <?php if( have_rows('slider') ) { ?>
                <div class="block-slider-text_slider-inner swiper">
                    <div class="swiper-wrapper">
                        <?php while ( have_rows('slider') ) {
                            the_row(); ?>
                            <div class="block-slider-text_slider-inner-item swiper-slide">
                                <img src="<?php the_sub_field('slider-image'); ?>" alt="">
                            </div>
                        <?php } ?>
                    </div>
                    <!-- навигация -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            <?php } ?>
        </div>

        <div class="block-slider-text_text block-slider-text-col">
            <?php if($text) { ?>
                <?php echo wp_kses_post($text); ?>
            <?php } ?>
        </div>
    </div>
<?php } ?>