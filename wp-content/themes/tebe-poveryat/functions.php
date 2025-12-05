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
function tebe_poveryat_scripts_styles() {
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
		wp_get_theme()->get( 'Version' ) // Используем версию темы для кеша пока что
	);

	// Подключение скриптов
	wp_enqueue_script(
		'tebe-poveryat-slider',
		get_theme_file_uri( '/assets/js/slider.js' ),
		[], 
		wp_get_theme()->get( 'Version' ),
		true 
	);

	    // Main Script
	    wp_enqueue_script( 'tp-main', get_template_directory_uri() . '/assets/js/main.js', [], '1.0.0', true );
	
	        // Swiper (Local)
	        wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css', [], '11.0.0' );
	        wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', [], '11.0.0', true );
	    
	        // Sliders Init
	        wp_enqueue_script( 'tp-sliders', get_template_directory_uri() . '/assets/js/sliders.js', ['swiper-js'], '1.0.0', true );
	    }
	    add_action( 'wp_enqueue_scripts', 'tebe_poveryat_scripts' );/**
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
