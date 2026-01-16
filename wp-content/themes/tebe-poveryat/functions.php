<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tebe-poveryat
 * @since 1.0.0
 */

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 *
 * @return void
 */
function tebe_poveryat_scripts() {
	// Основной стиль темы (метаданные)
	wp_enqueue_style(
		'tebe-poveryat-style',
		get_stylesheet_uri(),
		[],
		wp_get_theme()->get( 'Version' )
	);

	// Tailwind Compiled CSS
	wp_enqueue_style(
		'tebe-poveryat-tailwind',
		get_theme_file_uri( '/assets/css/output.css' ),
		['tebe-poveryat-style'],
		wp_get_theme()->get( 'Version' )
	);

    // Main Script (Mobile Menu, etc.)
    wp_enqueue_script( 'tp-main', get_template_directory_uri() . '/assets/js/main.js', [], '1.0.0', true );

    // Swiper (Local)
    wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css', [], '11.0.0' );
    wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', [], '11.0.0', true );

    // Sliders Initialization
    wp_enqueue_script( 'tp-sliders', get_template_directory_uri() . '/assets/js/sliders.js', ['swiper-js'], '1.0.0', true );

    // Subscribe Form Validation
    wp_enqueue_script( 'tp-subscribe-form', get_template_directory_uri() . '/assets/js/subscribe-form.js', [], '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'tebe_poveryat_scripts' );

/**
 * Enqueue Google Fonts.
 */
function tebe_poveryat_fonts() {
    wp_enqueue_style( 
        'tebe-poveryat-google-fonts', 
        'https://fonts.googleapis.com/css2?family=Geologica:wght@100..900&display=swap', 
        [], 
        null 
    );
}
add_action( 'wp_enqueue_scripts', 'tebe_poveryat_fonts' );

/**
 * Add theme support.
 */
function tebe_poveryat_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'tebe_poveryat_setup' );

/**
 * Include Language Manager
 */
require_once get_template_directory() . '/inc/language-manager.php';

/**
 * Include Custom Post Types
 */
require_once get_template_directory() . '/inc/post-types/register-post-types.php';

/**
 * Include Meta Boxes
 */
require_once get_template_directory() . '/inc/meta-boxes/meta-boxes.php';

/**
 * Enable SVG uploads
 */
function tp_enable_svg_upload( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'tp_enable_svg_upload' );

/**
 * Fix SVG thumbnail display in media library
 */
function tp_fix_svg_thumb_display( $response, $attachment, $meta ) {
	if ( $response['type'] === 'image' && $response['subtype'] === 'svg+xml' && class_exists( 'SimpleXMLElement' ) ) {
		try {
			$path = get_attached_file( $attachment->ID );
			if ( @file_exists( $path ) ) {
				$svg = simplexml_load_file( $path );
				if ( false !== $svg ) {
					$src = $response['url'];
					$width = (int) $svg['width'];
					$height = (int) $svg['height'];

					// If SVG does not have width/height attributes, try viewBox
					if ( ! $width || ! $height ) {
						$viewbox = explode( ' ', $svg['viewBox'] );
						$width = isset( $viewbox[2] ) ? (int) $viewbox[2] : 0;
						$height = isset( $viewbox[3] ) ? (int) $viewbox[3] : 0;
					}

					// Use default dimensions if still not found
					if ( ! $width ) $width = 200;
					if ( ! $height ) $height = 200;

					$response['image'] = compact( 'src', 'width', 'height' );
					$response['thumb'] = compact( 'src', 'width', 'height' );

					// Add full size
					$response['sizes']['full'] = array(
						'height'        => $height,
						'width'         => $width,
						'url'           => $src,
						'orientation'   => $height > $width ? 'portrait' : 'landscape',
					);
				}
			}
		} catch ( Exception $e ) {
			// Silence
		}
	}

	return $response;
}
add_filter( 'wp_prepare_attachment_for_js', 'tp_fix_svg_thumb_display', 10, 3 );

/**
 * Fix SVG display in post editor (Featured Image metabox)
 */
function tp_fix_svg_admin_thumbnail( $html, $post_id, $post_thumbnail_id ) {
	$mime_type = get_post_mime_type( $post_thumbnail_id );
	if ( $mime_type === 'image/svg+xml' ) {
		$image_url = wp_get_attachment_url( $post_thumbnail_id );
		if ( $image_url ) {
			$html = '<img src="' . esc_url( $image_url ) . '" style="max-width: 100%; height: auto;" />';
		}
	}
	return $html;
}
add_filter( 'admin_post_thumbnail_html', 'tp_fix_svg_admin_thumbnail', 10, 3 );

/**
 * Include Demo Content Importer (temporary - remove after import)
 */
require_once get_template_directory() . '/inc/demo-content/import-demo-content.php';

// Шорткод для AJAX-подгрузки кастомных постов
add_shortcode('ajax_custom_posts', function($atts) {
    $atts = shortcode_atts([
            'post_type' => 'blog', // для блога
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
                <option value="menu_order">По порядку меню</option>
            </select>
        </div>

        <!-- Контейнер для постов -->
        <div class="custom-posts-wrapper">
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
            'post_type' => 'blog',
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
        case 'menu_order':
            $query_args['orderby'] = 'menu_order';
            $query_args['order'] = 'ASC';
            break;
        default: // date_desc
            $query_args['orderby'] = 'date';
            $query_args['order'] = 'DESC';
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
        $output = '<p>Записи не найдены</p>';
    }

    wp_reset_postdata();
    return $output;
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