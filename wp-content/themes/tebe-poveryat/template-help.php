<?php
/*
    Template Name: Help Page
    Template Post Type: page
    Post Type: page
 */

get_header();
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
<main class="site-main">
    <div class="page-head" style="background:<?=$pagehead_bg_color?>">
        <div class="page-head-wrapper container" style="background:<?=$pagehead_bg_image?>">
            <div class="page-head-col">
                <div class="page-head-title">
                    <?=$pagehead_title?>
                </div>
                <div class="page-head-picture">
                    <img src="<?=$pagehead_pic?>">
                </div>
            </div>
            <div class="page-head-col">
                <div class="page-head-description">
                    <?=$pagehead_description?>
                </div>
            </div>
        </div>
    </div>
    <?php
        get_template_part( 'template-parts/home/donation' );
    ?>
</main>
<?php
get_footer();
