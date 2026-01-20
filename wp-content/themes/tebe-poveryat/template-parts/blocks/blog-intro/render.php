<?php
// Простейший пример
$title = get_field('text');
$text = get_field('image');

// ВРЕМЕННЫЙ КОД ДЛЯ ОТЛАДКИ - УДАЛИТЬ ПОСЛЕ
echo '<pre style="background:#f1f1f1;padding:10px;border:1px solid red;">';
echo 'ДАННЫЕ ДЛЯ ОТЛАДКИ (ID поста: ' . get_the_ID() . '):<br>';
echo 'Заголовок: ' . htmlspecialchars($title) . '<br>';
echo 'Текст: ' . htmlspecialchars($text);
echo '</pre>';
// КОНЕЦ ВРЕМЕННОГО КОДА
?>

<div class="blog-intro-block">
    <?php if($title): ?>
        <h2><?php echo esc_html($title); ?></h2>
    <?php endif; ?>

    <?php if($text): ?>
        <div class="intro-text"><?php echo wp_kses_post($text); ?></div>
    <?php endif; ?>
</div>