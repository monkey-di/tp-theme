<?php
/*
    Template Name: Blog Page
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
<main class="site-main blog-page">
    <div class="page-head z-20 bg-surface relative [border-radius:0_0_50%_50%_/_0_0_40px_40px] lg:[border-radius:0_0_50%_50%_/_0_0_80px_80px]"<?php if($pagehead_bg_color != ''){?> style="background:<?=$pagehead_bg_color?>" <?php } ?>>
        <div class="page-head-wrapper container mx-auto"
            <?php if($pagehead_bg_image != ''){?>
                style="background-image:url(<?=$pagehead_bg_image?>)"
            <?php } ?>
        >
            <div class="page-head-col">
                <h1 class="page-head-title">
                    <?=$pagehead_title?>
                </h1>
                <?php if($pagehead_description != ''){?>
                    <div class="page-head-description text-p">
                        <?=$pagehead_description?>
                    </div>
                <?php } ?>
            </div>
            <div class="page-head-col">
                <div class="page-head-picture">
                    <img src="<?=$pagehead_pic?>">
                </div>
                <div class="page-head-btn">
                    <a href="#">Обратиться за помощью</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bloglist-content container">

    </div>
</main>
<?php
get_footer();