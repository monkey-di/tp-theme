<?php
/**
 * Шаблон блока "Интро блога"
 * Работает в редакторе (админке) и на фронтенде
 */
$text = '';
$image = '';
if(function_exists('get_field')) {
    $faq = get_field('faq-content');
}
print_r($faq);
?>

<?php
