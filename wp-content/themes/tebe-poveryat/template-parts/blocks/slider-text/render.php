<?php
/**
 * Шаблон блока "Блок слайдер + текст"
 * Работает в редакторе (админке) и на фронтенде
 */
$text = '';
$image = '';
if(function_exists('get_field')) {
    $text = get_field('text');
    $image = get_field('image');
}

$has_data = !empty($text) || !empty($image);
?><?php
