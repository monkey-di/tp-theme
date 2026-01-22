<?php
/**
 * Шаблон блока "Спойлеры FaQ"
 * Работает в редакторе (админке) и на фронтенде
 */
$faq = '';
if(function_exists('get_field')) {
    $faq = get_field('faq-content');
}
print_r($faq);
?>

<?php
