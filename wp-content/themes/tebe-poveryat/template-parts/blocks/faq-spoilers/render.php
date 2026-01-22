<?php
/**
 * Шаблон блока "Спойлеры FaQ"
 * Работает в редакторе (админке) и на фронтенде
 */
?>
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
