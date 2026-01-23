<?php
/**
 * Шаблон блока "Спойлеры FaQ"
 * Работает в редакторе (админке) и на фронтенде
 */
$faq_bg_color = get_field('faq-bg-color');
$faq_bg_img = get_field('faq-bg-img');
$faq_title = get_field('faq-title');
?>
<style>
    .faq-spoiler:before{
        background: <?php echo $faq_bg_color; ?>;
    }
</style>
<div class="faq-spoiler z-20 bg-surface relative [border-radius:0_0_50%_50%_/_0_0_40px_40px] lg:[border-radius:0_0_50%_50%_/_0_0_80px_80px]" style="background-color:<?php echo $faq_bg_color; ?>;background-image:url(<?php echo $faq_bg_img; ?>)">
<div class="faq-spoiler-content">
    <h2><?php echo $faq_title;?></h2>
    <?php
    if( have_rows('faq-content') ){
        while ( have_rows('faq-content') ) {
            the_row(); ?>
            <details>
                <summary><span><?php wp_kses_post(the_sub_field('faq-question'));?></span></summary>
                <div class="faq-details-content"><?php wp_kses_post(the_sub_field('faq-answer'));?></div>
            </details>
       <?php }
    }
    ?>
    <?php if(get_field('faq-button-url') || get_field('faq-button-txt')){?>
        <div class="faq-spoiler-button">
            <a href="<?php the_field('faq-button-url');?>">
                <?php the_field('faq-button-txt');?>
            </a>
        </div>
    <?php } ?>
    </div>
</div>
<?php
