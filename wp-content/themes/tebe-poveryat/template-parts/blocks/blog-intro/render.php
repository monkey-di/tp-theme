<?php
// УСИЛЕННАЯ ДИАГНОСТИКА
echo '<div style="background:#fff3cd; padding:15px; border:3px solid #ffc107; margin:10px 0;">';
echo '<h3 style="margin-top:0;">🔍 ДИАГНОСТИКА БЛОКА ACF 2</h3>';

// 1. Базовый контекст
echo '<strong>Контекст:</strong><br>';
echo 'ID текущего поста: ' . get_the_ID() . '<br>';
echo 'Имя блока: ' . ($block['name'] ?? 'не определено') . '<br>';

// 2. Проверка ВСЕХ метаполей поста
$post_meta = get_post_meta(get_the_ID());
echo '<hr><strong>Все метаполя этого поста (первые 20):</strong><br>';
$counter = 0;
foreach($post_meta as $key => $value) {
    if(strpos($key, 'blog') !== false || strpos($key, 'text') !== false || strpos($key, 'image') !== false) {
        echo "• <code>$key</code> => " . print_r($value[0], true) . '<br>';
        $counter++;
    }
    if($counter > 20) break;
}

// 3. Специфичные проверки полей блока
echo '<hr><strong>Целевые поля блока:</strong><br>';
$text = get_field('text');
$image = get_field('image');

echo 'Поле "text": ' . (!empty($text) ? 'ЕСТЬ данные (' . strlen($text) . ' символов)' : '<span style="color:red">ПУСТО</span>') . '<br>';
echo 'Поле "image": ' . (!empty($image) ? 'ЕСТЬ данные (' . $image . ')' : '<span style="color:red">ПУСТО</span>') . '<br>';

// 4. Альтернативные способы получения данных
echo '<hr><strong>Альтернативные проверки:</strong><br>';
$fields = get_fields();
echo 'get_fields() вернул: ';
if(empty($fields)) {
    echo '<span style="color:red">ПУСТОЙ массив</span>';
} else {
    echo '<pre>' . print_r($fields, true) . '</pre>';
}

// 5. Проверка через прямой запрос к базе
echo '<hr><strong>Данные в базе (прямой запрос):</strong><br>';
global $wpdb;
$block_data = $wpdb->get_results($wpdb->prepare(
    "SELECT meta_key, meta_value FROM {$wpdb->postmeta} WHERE post_id = %d AND meta_key LIKE '%%_blog_intro_%%'",
    get_the_ID()
));
if(empty($block_data)) {
    echo 'Нет записей с ключами, содержащими "_blog_intro_"';
} else {
    foreach($block_data as $row) {
        echo "• {$row->meta_key} => {$row->meta_value}<br>";
    }
}

echo '</div>'; // Конец блока диагностики

// ОСНОВНОЙ ВЫВОД (оставьте ваш оригинальный код ниже)
?>
<div class="blog-intro-block">
    000test234
    <?php if($text): ?>
        <div class="post-meta">
            <time>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg">
                <span><?php echo get_the_date(); ?></span>
            </time>
        </div>
        <h1 class="blog-single-title">
            <?php the_title(); ?>
        </h1>
        <div class="blog-intro-block-text">
            <?php echo wp_kses_post($text); ?>
        </div>
    <?php endif; ?>

    <?php if($image): ?>
        <div class="blog-intro-block-image">
            <img src="<?php echo esc_url($image); ?>">
        </div>
    <?php endif; ?>
</div>