<?php

// ==================== СОБСТВЕННЫЙ СЧЕТЧИК ПРОСМОТРОВ ====================

// Функция для получения количества просмотров
function get_post_views($post_id) {
    $count = get_post_meta($post_id, 'post_views_count', true);
    return $count ? $count : 0;
}

// Функция для увеличения счетчика просмотров
function set_post_views($post_id) {
    $count = get_post_views($post_id);
    $count++;
    update_post_meta($post_id, 'post_views_count', $count);
}

// Подсчет просмотров при загрузке поста
add_action('wp_head', 'track_post_views');
function track_post_views() {
    if (is_single() && !is_user_logged_in()) {
        global $post;
        set_post_views($post->ID);
    }
}

// Добавляем колонку просмотров в админке
add_filter('manage_posts_columns', 'add_views_column');
function add_views_column($columns) {
    $columns['post_views'] = 'Просмотры';
    return $columns;
}

add_action('manage_posts_custom_column', 'display_views_column', 10, 2);
function display_views_column($column, $post_id) {
    if ($column === 'post_views') {
        echo get_post_views($post_id);
    }
}

// ==================== AJAX КОД ДЛЯ КАСТОМНЫХ ПОСТОВ ====================

// Шорткод для AJAX-подгрузки кастомных постов
add_shortcode('ajax_custom_posts', function($atts) {
    $atts = shortcode_atts([
            'post_type' => 'blog_item',
            'posts_per_page' => 3,
            'sort' => 'date_desc',
            'taxonomy' => '',
            'term' => '',
            'meta_key' => '',
            'meta_value' => ''
    ], $atts);

    ob_start();
    ?>
    <div class="ajax-custom-posts-container"
         data-post-type="<?php echo esc_attr($atts['post_type']); ?>"
         data-perpage="<?php echo esc_attr($atts['posts_per_page']); ?>"
         data-sort="<?php echo esc_attr($atts['sort']); ?>"
         data-taxonomy="<?php echo esc_attr($atts['taxonomy']); ?>"
         data-term="<?php echo esc_attr($atts['term']); ?>"
         data-meta-key="<?php echo esc_attr($atts['meta_key']); ?>"
         data-meta-value="<?php echo esc_attr($atts['meta_value']); ?>"
         data-paged="1">

        <!-- Сортировка -->
        <div class="posts-sort">
            <select class="sort-select">
                <option value="date_desc" <?php selected($atts['sort'], 'date_desc'); ?>>Сначала свежие</option>
                <option value="date_asc" <?php selected($atts['sort'], 'date_asc'); ?>>Сначала старые</option>
                <option value="popular" <?php selected($atts['sort'], 'popular'); ?>>Сначала популярные</option>
            </select>
        </div>

        <!-- Контейнер для постов -->
        <div class="bloglist-wrapper container">
            <?php echo load_ajax_custom_posts($atts); ?>
        </div>

        <!-- Кнопка загрузки -->
        <div class="load-more-container">
            <button class="load-more-btn" style="display: none;">
                Показать ещё
                <span class="spinner" style="display: none;">Загрузка...</span>
            </button>
        </div>
    </div>
    <?php
    return ob_get_clean();
});

// Функция загрузки кастомных постов
function load_ajax_custom_posts($args = []) {
    $defaults = [
            'paged' => 1,
            'post_type' => 'blog_item',
            'posts_per_page' => 3,
            'sort' => 'date_desc',
            'taxonomy' => '',
            'term' => '',
            'meta_key' => '',
            'meta_value' => ''
    ];

    $args = wp_parse_args($args, $defaults);
    $query_args = [
            'post_type' => $args['post_type'],
            'post_status' => 'publish',
            'posts_per_page' => $args['posts_per_page'],
            'paged' => $args['paged'],
            'meta_query' => []
    ];

    // Таксономия
    if (!empty($args['taxonomy']) && !empty($args['term'])) {
        $query_args['tax_query'] = [
                [
                        'taxonomy' => $args['taxonomy'],
                        'field' => 'slug',
                        'terms' => $args['term'],
                ]
        ];
    }

    // Мета-запрос для фильтрации
    if (!empty($args['meta_key']) && !empty($args['meta_value'])) {
        $query_args['meta_query'][] = [
                'key' => $args['meta_key'],
                'value' => $args['meta_value'],
                'compare' => '='
        ];
    }

    // Сортировка
    switch($args['sort']) {
        case 'date_asc':
            $query_args['orderby'] = 'date';
            $query_args['order'] = 'ASC';
            break;
        case 'popular':
            // Сортировка по нашему счетчику просмотров
            $query_args['meta_key'] = 'post_views_count';
            $query_args['orderby'] = 'meta_value_num';
            $query_args['order'] = 'DESC';
            // Добавляем условие для включения постов без счетчика
            $query_args['meta_query'][] = [
                    'key' => 'post_views_count',
                    'compare' => 'EXISTS'
            ];
            break;
        default: // date_desc
            $query_args['orderby'] = 'date';
            $query_args['order'] = 'DESC';
    }

    // Если есть несколько meta_query, настраиваем отношение
    if (count($query_args['meta_query']) > 1) {
        $query_args['meta_query']['relation'] = 'AND';
    } elseif (count($query_args['meta_query']) === 0) {
        unset($query_args['meta_query']);
    }

    $query = new WP_Query($query_args);

    $output = '';

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $output .= get_custom_post_html($args['post_type']);
        }

        // Проверка на наличие следующих постов
        $has_more = $query->max_num_pages > $args['paged'];
        $output .= '<script type="application/json" class="posts-data">' .
                json_encode(['has_more' => $has_more]) .
                '</script>';
    } else {
        $output = '<p class="no-posts-found">Записи не найдены</p>';
    }

    wp_reset_postdata();
    return $output;
}

// Вывод HTML поста
function get_custom_post_html($post_type = 'blog_item') {
    ob_start();
    $views = get_post_views(get_the_ID());
    ?>
    <article class="blog-item">
        <div class="post-thumbnail">
            <?php if (has_post_thumbnail()) {?>
                <?php the_post_thumbnail('full'); ?>
            <?php } else { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nophoto.png" alt="<?php the_title(); ?>">
            <?php } ?>
        </div>
        <div class="post-content">
            <div class="post-meta">
                <time>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg" alt="Дата">
                    <span><?php echo get_the_date(); ?></span>
                </time>
                <div class="post-views">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/eye.svg" alt="Просмотры">
                    <span><?php echo $views; ?></span>
                </div>
            </div>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="post-excerpt">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </article>
    <?php
    return ob_get_clean();
}

// AJAX загрузка кастомных постов
add_action('wp_ajax_load_more_custom_posts', 'ajax_load_more_custom_posts');
add_action('wp_ajax_nopriv_load_more_custom_posts', 'ajax_load_more_custom_posts');

function ajax_load_more_custom_posts() {
    // Проверка nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'ajax_nonce')) {
        wp_die('Ошибка безопасности');
    }

    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
    $post_type = isset($_POST['post_type']) ? sanitize_text_field($_POST['post_type']) : 'blog_item';
    $sort = isset($_POST['sort']) ? sanitize_text_field($_POST['sort']) : 'date_desc';
    $per_page = isset($_POST['per_page']) ? intval($_POST['per_page']) : 3;
    $taxonomy = isset($_POST['taxonomy']) ? sanitize_text_field($_POST['taxonomy']) : '';
    $term = isset($_POST['term']) ? sanitize_text_field($_POST['term']) : '';
    $meta_key = isset($_POST['meta_key']) ? sanitize_text_field($_POST['meta_key']) : '';
    $meta_value = isset($_POST['meta_value']) ? sanitize_text_field($_POST['meta_value']) : '';

    $args = [
            'paged' => $paged,
            'post_type' => $post_type,
            'sort' => $sort,
            'posts_per_page' => $per_page,
            'taxonomy' => $taxonomy,
            'term' => $term,
            'meta_key' => $meta_key,
            'meta_value' => $meta_value
    ];

    $html = load_ajax_custom_posts($args);

    // Проверяем, есть ли еще посты
    $next_args = $args;
    $next_args['paged'] = $paged + 1;
    $next_query = new WP_Query([
            'post_type' => $next_args['post_type'],
            'posts_per_page' => 1,
            'paged' => $next_args['paged'],
            'fields' => 'ids'
    ]);

    $has_more = $next_query->have_posts();
    wp_reset_postdata();

    wp_send_json_success([
            'html' => $html,
            'paged' => $paged,
            'has_more' => $has_more
    ]);
}

// Добавляем стили и скрипты
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script('ajax-custom-posts',
            get_template_directory_uri() . '/assets/js/ajax-posts.js',
            ['jquery'],
            null,
            true
    );

    wp_localize_script('ajax-custom-posts', 'ajax_object', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('ajax_nonce')
    ]);

    // Стили для счетчика просмотров
    wp_add_inline_style('style', '
        .post-views {
            display: inline-flex;
            align-items: center;
            margin-left: 15px;
        }
        .post-views img {
            width: 16px;
            height: 16px;
            margin-right: 5px;
        }
        .load-more-btn.loading {
            opacity: 0.7;
            cursor: not-allowed;
        }
        .load-more-btn .spinner {
            margin-left: 10px;
            display: inline-block;
        }
    ');
});