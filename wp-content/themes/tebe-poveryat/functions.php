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
 * Include Custom Post Types
 */
require_once get_template_directory() . '/inc/post-types/register-post-types.php';

/**
 * Include Meta Boxes
 */
require_once get_template_directory() . '/inc/meta-boxes/meta-boxes.php';