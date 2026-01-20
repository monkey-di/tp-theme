<?php
// Простейший пример
$title = get_field('заголовок');
$text = get_field('текст');
?>

<div class="blog-intro-block">
    <?php if($title): ?>
        <h2><?php echo esc_html($title); ?></h2>
    <?php endif; ?>

    <?php if($text): ?>
        <div class="intro-text"><?php echo wp_kses_post($text); ?></div>
    <?php endif; ?>
</div>