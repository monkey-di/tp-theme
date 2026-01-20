<?php
// Функция для подсчета просмотров постов
function set_post_views($post_id) {
    $count_key = 'views_count';
    $count = get_post_meta($post_id, $count_key, true);

    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}

// Функция для получения количества просмотров
function get_post_views($post_id) {
    $count_key = 'views_count';
    $count = get_post_meta($post_id, $count_key, true);

    if ($count == '') {
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
        return 0;
    }
    return $count;
}
// Шорткод для AJAX-подгрузки кастомных постов
add_shortcode('ajax_custom_posts', function($atts) {
    $atts = shortcode_atts([
            'post_type' => 'blog_item',
            'posts_per_page' => 3,
            'sort' => 'date_desc',
            'taxonomy' => '',
            'term' => '',
            'filter_meta_key' => '',
            'filter_meta_value' => ''
    ], $atts);

    ob_start();
    ?>
    <div class="ajax-custom-posts-container"
         data-post-type="<?php echo esc_attr($atts['post_type']); ?>"
         data-perpage="<?php echo esc_attr($atts['posts_per_page']); ?>"
         data-sort="<?php echo esc_attr($atts['sort']); ?>"
         data-taxonomy="<?php echo esc_attr($atts['taxonomy']); ?>"
         data-term="<?php echo esc_attr($atts['term']); ?>"
         data-filter-meta-key="<?php echo esc_attr($atts['filter_meta_key']); ?>"
         data-filter-meta-value="<?php echo esc_attr($atts['filter_meta_value']); ?>">

    <!-- Сортировка -->
    <div class="posts-sort">
        <select class="sort-select">
            <option value="date_desc">Сначала свежие</option>
            <option value="date_asc">Сначала старые</option>
            <option value="popular">Сначала популярные</option>
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
            <span class="spinner"></span>
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
            'filter_meta_key' => '',
            'filter_meta_value' => ''
    ];

    $args = wp_parse_args($args, $defaults);
    $query_args = [
            'post_type' => $args['post_type'],
            'post_status' => 'publish',
            'posts_per_page' => $args['posts_per_page'],
            'paged' => $args['paged'],
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

    // Мета-запрос для фильтрации (переименован)
    if (!empty($args['filter_meta_key']) && !empty($args['filter_meta_value'])) {
        $query_args['meta_query'][] = [
                'key' => $args['filter_meta_key'],
                'value' => $args['filter_meta_value'],
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
            // Добавляем отдельный мета-запрос для сортировки по популярности
            $query_args['meta_query'][] = [
                    'key' => 'views_count',
                    'compare' => 'EXISTS', // Используем EXISTS вместо конкретного значения
                    'type' => 'NUMERIC'
            ];
            $query_args['orderby'] = [
                    'views_count' => 'DESC'
            ];
            break;
        default: // date_desc
            $query_args['orderby'] = 'date';
            $query_args['order'] = 'DESC';
    }

    // Если есть несколько мета-запросов, добавляем отношение
    if (isset($query_args['meta_query']) && count($query_args['meta_query']) > 1) {
        $query_args['meta_query']['relation'] = 'AND';
    }

    $query = new WP_Query($query_args);

    // ДЕБАГ: логирование запроса
    error_log('AJAX Posts Query Args: ' . print_r($query_args, true));
    error_log('AJAX Posts Found: ' . $query->found_posts);

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
        $output = '<p>Записи не найдены</p>';
    }

    wp_reset_postdata();
    return $output;
}

// Вывод
function track_post_views() {
    if (is_single()) {
        global $post;
        if ($post) {
            set_post_views($post->ID);
        }
    }
}
add_action('wp_head', 'track_post_views');
function get_custom_post_html($post_type = 'blog_item') {
    ob_start();
    $post_id = get_the_ID();
    $views_count = get_post_views($post_id);
    ?>
    <article class="blog-item">
        <div class="post-thumbnail">
            <?php if (has_post_thumbnail()) { ?>
                <?php the_post_thumbnail('full'); ?>
            <?php } else { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nophoto.png">
            <?php } ?>
        </div>
        <div class="post-content">
            <div class="post-meta">
                <time>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg">
                    <span><?php echo get_the_date(); ?></span>
                </time>
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
    check_ajax_referer('ajax_nonce', 'nonce');

    $paged = intval($_POST['paged']) + 1;
    $post_type = sanitize_text_field($_POST['post_type']);
    $sort = sanitize_text_field($_POST['sort']);
    $per_page = intval($_POST['per_page']);
    $taxonomy = sanitize_text_field($_POST['taxonomy']);
    $term = sanitize_text_field($_POST['term']);
    $filter_meta_key = sanitize_text_field($_POST['filter_meta_key']);
    $filter_meta_value = sanitize_text_field($_POST['filter_meta_value']);

    $args = [
            'paged' => $paged,
            'post_type' => $post_type,
            'sort' => $sort,
            'posts_per_page' => $per_page,
            'taxonomy' => $taxonomy,
            'term' => $term,
            'filter_meta_key' => $filter_meta_key,
            'filter_meta_value' => $filter_meta_value
    ];

    wp_send_json_success([
            'html' => load_ajax_custom_posts($args),
            'paged' => $paged,
            'has_more' => has_more_custom_posts($args)
    ]);
}

// Функция проверки наличия дополнительных кастомных постов
function has_more_custom_posts($args) {
    $query_args = [
            'post_type' => $args['post_type'],
            'post_status' => 'publish',
            'posts_per_page' => $args['posts_per_page'],
            'paged' => $args['paged'] + 1,
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
    if (!empty($args['filter_meta_key']) && !empty($args['filter_meta_value'])) {
        $query_args['meta_query'][] = [
                'key' => $args['filter_meta_key'],
                'value' => $args['filter_meta_value'],
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
            $query_args['meta_query'][] = [
                    'key' => 'views_count',
                    'compare' => 'EXISTS',
                    'type' => 'NUMERIC'
            ];
            $query_args['orderby'] = [
                    'views_count' => 'DESC'
            ];
            break;
        default:
            $query_args['orderby'] = 'date';
            $query_args['order'] = 'DESC';
    }

    // Если несколько мета-запросов, добавляем отношение
    if (isset($query_args['meta_query']) && count($query_args['meta_query']) > 1) {
        $query_args['meta_query']['relation'] = 'AND';
    }

    $query = new WP_Query($query_args);
    $has_more = $query->have_posts();
    wp_reset_postdata();

    return $has_more;
}

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
});

// Шаблон для записей
add_filter( 'template_include', 'blog_item_template' );
function blog_item_template( $template ) {
    global $post;
    if ( $post->post_type == 'blog_item') {
        $new_template = '/wp-content/themes/tebe-poveryat/single-blog_item.php';
        if ( file_exists( $new_template ) ) {
            return $new_template;
        }
    }
    return $template;
}