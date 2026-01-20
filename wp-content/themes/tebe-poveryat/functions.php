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
    wp_enqueue_script( 'tp-sliders', get_template_directory_uri() . '/assets/js/sliders.js', ['swiper-js'], '1.0.3', true );

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

/**
 * Include Blog Listing with sorting and AJAX
 */
require_once get_template_directory() . '/inc/blog-ajax.php';

/**
 * Custom blocks with ACF-fields for Gutenberg editor
 */
require_once get_template_directory() . '/inc/custom-blocks.php';