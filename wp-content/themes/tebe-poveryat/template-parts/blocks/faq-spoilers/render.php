<?php
/**
 * Шаблон блока "Спойлеры FaQ"
 * Работает в редакторе (админке) и на фронтенде
 */
?>
<?php
if ( tp_is_english() ) {
    $pagehead_title = get_field('headpage-title_en'); // ACF заголовок
    $pagehead_description = get_field('headpage-description_en');  // ACF подпись
} else{
    $pagehead_title = get_field('headpage-title'); // ACF заголовок
    $pagehead_description = get_field('headpage-description');  // ACF подпись
}
$pagehead_bg_color = get_field('headpage-background-color');  // ACF Цвет фона
$pagehead_bg_image = get_field('headpage-background');  // ACF фоновое изображение
$pagehead_pic = get_field('headpage-pic');  // ACF картинка
?>
    <style>
        .page-template-template-help .header{
            background-color: <?php echo $pagehead_bg_color; ?>
        }
    </style>
<div class="faq-spoiler">
<div class="faq-spoiler-content">
    <?php
    if( have_rows('faq-content') ){
        while ( have_rows('faq-content') ) {
            the_row(); ?>
            <details>
                <summary><?php wp_kses_post(the_sub_field('faq-question'));?></summary>
                <div class="faq-details-content"><?php wp_kses_post(the_sub_field('faq-answer'));?></div>
            </details>
       <?php }
    }
    ?>
    </div>
</div>
<?php
