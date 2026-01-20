<?php
/**
 * Шаблон блока "Блок слайдер + текст"
 * Работает в редакторе (админке) и на фронтенде
 */
$slider = '';
$text = '';
if(function_exists('get_field')) {
    $slider = get_field('slider');
    $text = get_field('slider-text');
}

$has_data = !empty($slider) || !empty($text);

if ($has_data) { ?>
    <div class="block-slider-text container">
        <div class="block-slider-text_slider">
            <?php
            if( have_rows('slider') ){ ?>
                <div class="block-slider-text_slider-inner">
                    <?php while ( have_rows('slider') ) {
                        the_row();?>
                        <div class="block-slider-text_slider-inner-item">
                            <img src="<?php the_sub_field('sub_field_name'); ?>">
                        </div>
                    <? } ?>
                </div>
            <?php } ?>
        </div>
        <div class="block-slider-text_text">
            <?php if($text){?>
                <?php echo wp_kses_post($text); ?>
            <?php } ?>
        </div>
    </div>
<?php }
