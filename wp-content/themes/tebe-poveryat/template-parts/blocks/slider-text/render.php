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
            Слайдер
        </div>
        <div class="block-slider-text_text">
            Текст
        </div>
    </div>
<?php }
