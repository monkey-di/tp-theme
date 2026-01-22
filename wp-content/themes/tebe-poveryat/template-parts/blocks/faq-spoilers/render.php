<?php
/**
 * Шаблон блока "Спойлеры FaQ"
 * Работает в редакторе (админке) и на фронтенде
 */
?>
<?php
if( have_rows('faq-content') ){
    while ( have_rows('faq-content') ) {
        the_row();
        the_sub_field('faq-question');
        the_sub_field('faq-answer');
    }
}
?>
<?php
