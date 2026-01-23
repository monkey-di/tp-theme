<?php
/**
 * Шаблон блока "Спойлеры FaQ"
 * Работает в редакторе (админке) и на фронтенде
 */
$faq_bg_color = get_field('faq-bg-color');
$faq_bg_img = get_field('faq-bg-img');
?>
<div class="faq-spoiler" style="background-color:<?php echo $faq_bg_color; ?>;background-image:<?php echo $faq_bg_img; ?>">
<div class="faq-spoiler-content">
    <h2>Частые вопросы <br>и ответы</h2>
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
