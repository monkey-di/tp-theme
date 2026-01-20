<?php

// Шорткод для AJAX-подгрузки кастомных постов
add_shortcode('ajax_custom_posts', function($atts) {
    $atts = shortcode_atts([
            'post_type' => 'blog_item', // для блога
            'posts_per_page' => 3,
            'sort' => 'date_desc',
            'taxonomy' => '', // Таксономия
            'term' => '', // Термин
            'meta_key' => '', // Мета-ключ для сортировки
            'meta_value' => '' // Мета-значение для фильтра
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
            'meta_key' => '',
            'meta_value' => ''
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

    // Мета-запрос
    if (!empty($args['meta_key']) && !empty($args['meta_value'])) {
        $query_args['meta_query'] = [
                [
                        'key' => $args['meta_key'],
                        'value' => $args['meta_value'],
                        'compare' => '='
                ]
        ];
    }

    // Сортировка
    switch($args['sort']) {
        case 'date_asc':
            $query_args['orderby'] = 'date';
            $query_args['order'] = 'ASC';
            break;
        case 'popular':
            $query_args['meta_key'] = 'views_count';
            $query_args['orderby'] = 'meta_value_num';
            $query_args['order'] = 'DESC';
            break;
        default: // date_desc
            $query_args['orderby'] = 'date';
            $query_args['order'] = 'DESC';
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
        // ДЕБАГ:
        $output = '<p>Записи не найдены</p>';
        $output .= '<div style="display:none;" class="debug-info">';
        $output .= 'Post Type: ' . $args['post_type'] . '<br>';
        $output .= 'Query Args: ' . print_r($query_args, true) . '<br>';
        $output .= 'Found Posts: ' . $query->found_posts;
        $output .= '</div>';
    }

    wp_reset_postdata();
    return $output;
}

// Вывод
function get_custom_post_html($post_type = 'blog_item') {
    ob_start();
    ?>
    <article class="blog-item">
        <div class="post-thumbnail">
            <?php if (has_post_thumbnail()) {?>
                <?php the_post_thumbnail('full'); ?>
            <?php } else { ?>
                <img src="/wp-content/themes/tebe-poveryat/assets/images/nophoto.png">
            <?php } ?>
        </div>
        <div class="post-content">
            <div class="post-meta">
                <time>
                    <img src="/wp-content/themes/tebe-poveryat/assets/images/calendar.svg">
                    <span>
                        <?php echo get_the_date(); ?>
                    </span>
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
    $meta_key = sanitize_text_field($_POST['meta_key']);
    $meta_value = sanitize_text_field($_POST['meta_value']);

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

    // Мета-запрос
    if (!empty($args['meta_key']) && !empty($args['meta_value'])) {
        $query_args['meta_query'] = [
                [
                        'key' => $args['meta_key'],
                        'value' => $args['meta_value'],
                        'compare' => '='
                ]
        ];
    }

    // Сортировка
    switch($args['sort']) {
        case 'popular':
            $query_args['meta_key'] = 'views_count';
            $query_args['orderby'] = 'meta_value_num';
            $query_args['order'] = 'DESC';
            break;
        default:
            $query_args['orderby'] = 'date';
            $query_args['order'] = 'DESC';
    }

    $query = new WP_Query($query_args);
    $has_more = $query->have_posts();
    wp_reset_postdata();

    return $has_more;
}

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script('ajax-custom-posts',
            get_template_directory_uri() . '/assets/js/ajax-posts.js', // Исправлено: get_template_directory_uri()
            ['jquery'],
            null,
            true
    );

    wp_localize_script('ajax-custom-posts', 'ajax_object', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('ajax_nonce')
    ]);
});
