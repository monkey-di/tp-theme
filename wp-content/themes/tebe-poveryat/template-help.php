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
<style>
    .page-template-template-help .header{
        background-color: <?php echo $pagehead_bg_color; ?>
    }
</style>
<main class="site-main">
    <div class="page-head z-20 bg-surface relative [border-radius:0_0_50%_50%_/_0_0_40px_40px] lg:[border-radius:0_0_50%_50%_/_0_0_80px_80px]" style="background:<?=$pagehead_bg_color?>">
        <div class="page-head-wrapper container mx-auto" style="background-image:url(<?=$pagehead_bg_image?>)">
            <div class="page-head-col">
                <h1 class="page-head-title">
                    <?=$pagehead_title?>
                </h1>
                <div class="page-head-description text-p">
                    <?=$pagehead_description?>
                </div>
                <div class="page-head-btn">
                    <a class="head-button" href="#anketa">Обратиться за помощью</a>
                </div>
            </div>
            <div class="page-head-col">
                <div class="page-head-picture">
                    <img src="<?=$pagehead_pic?>">
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
