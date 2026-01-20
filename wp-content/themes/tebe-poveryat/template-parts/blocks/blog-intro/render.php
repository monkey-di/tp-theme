<?php
/**
 * Шаблон блока "Интро блога"
 * Работает в редакторе (админке) и на фронтенде
 */

// 1. Безопасное получение данных (работает в любом контексте)
$text = '';
$image = '';

// Пробуем получить данные стандартным способом ACF
if(function_exists('get_field')) {
    $text = get_field('text');
    $image = get_field('image');
}

// 2. ДИАГНОСТИКА, которая покажет ГДЕ мы находимся
$is_admin = is_admin(); // Проверяем, в админке ли мы
$context = $is_admin ? 'РЕДАКТОР WordPress' : 'ФРОНТЕНД сайта';
$has_data = !empty($text) || !empty($image);

// 3. Вывод диагностической информации (только если нет данных)
if(!$has_data):
    ?>
    <div class="blog-intro-debug" style="
        background: <?php echo $is_admin ? '#fff3cd' : '#d1ecf1'; ?>;
        border: 2px solid <?php echo $is_admin ? '#ffc107' : '#0c5460'; ?>;
        padding: 15px;
        margin: 10px 0;
        border-radius: 5px;
        ">
        <strong>🔍 [<?php echo $context; ?>] Блок "Интро блога": ДАННЫХ НЕТ</strong><br>

        <?php if($is_admin): ?>
            <!-- Сообщение для АДМИНКИ -->
            <span style="color: #856404;">
            ✏️ Заполните поля "text" и "image" в панели ACF справа →<br>
            💾 Затем нажмите <strong>"Обновить"</strong> чтобы сохранить данные.
        </span>

            <!-- Тестовые данные для быстрой проверки -->
            <div style="margin-top: 10px; font-size: 0.9em;">
                <button type="button" onclick="
                document.querySelector('[data-name=\'text\'] input').value='Тестовый текст';
                document.querySelector('[data-name=\'image\'] input').value='https://example.com/test.jpg';
                console.log('Тестовые данные заполнены');
            " style="background:#28a745; color:white; border:none; padding:5px 10px; cursor:pointer;">
                    Заполнить тестовыми данными
                </button>
            </div>
        <?php else: ?>
            <!-- Сообщение для ФРОНТЕНДА -->
            <span style="color: #0c5460;">
            ⚠️ Данные блока не найдены в базе.<br>
            📌 Причина: Поля не были сохранены при обновлении записи.<br>
            🔧 Проверьте: 1) Консоль браузера на ошибки, 2) Кэширующие плагины.
        </span>

            <!-- Информация для разработчика -->
            <div style="margin-top: 10px; font-size: 0.8em; background: white; padding: 10px;">
                <strong>Техническая информация:</strong><br>
                Post ID: <?php echo get_the_ID(); ?><br>
                <?php
                // Прямой запрос к базе данных
                global $wpdb;
                $block_data = $wpdb->get_results($wpdb->prepare(
                    "SELECT meta_key FROM {$wpdb->postmeta} WHERE post_id = %d AND meta_key LIKE '%%text%%' LIMIT 5",
                    get_the_ID()
                ));
                echo 'Найдено записей с "text": ' . count($block_data);
                ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

    <!-- 4. ОСНОВНОЙ ВЫВОД блока (если данные есть) -->
<?php if($has_data): ?>
    <div class="blog-intro-block">
        <!-- Ваш существующий HTML код -->
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
<?php endif; ?>