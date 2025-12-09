<?php
/**
 * Register Custom Post Types
 *
 * @package tebe-poveryat
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Main Slider CPT
 * Используется для главного слайдера на главной странице
 */
function tp_register_main_slider() {
	$labels = array(
		'name'               => 'Главный слайдер',
		'singular_name'      => 'Слайд',
		'menu_name'          => 'Главный слайдер',
		'add_new'            => 'Добавить новый',
		'add_new_item'       => 'Добавить новый слайд',
		'edit_item'          => 'Редактировать слайд',
		'new_item'           => 'Новый слайд',
		'view_item'          => 'Просмотреть слайд',
		'search_items'       => 'Искать слайды',
		'not_found'          => 'Слайды не найдены',
		'not_found_in_trash' => 'В корзине слайдов не найдено',
		'all_items'          => 'Все слайды',
	);

	$args = array(
		'labels'              => $labels,
		'public'              => false,
		'publicly_queryable'  => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => false,
		'capability_type'     => 'post',
		'has_archive'         => false,
		'hierarchical'        => false,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-images-alt2',
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'show_in_rest'        => true,
	);

	register_post_type( 'main_slide', $args );
}
add_action( 'init', 'tp_register_main_slider' );

/**
 * Register Friends CPT
 * Друзья "Тебе поверят" - слайдер партнёров
 */
function tp_register_friends() {
	$labels = array(
		'name'               => 'Друзья',
		'singular_name'      => 'Друг',
		'menu_name'          => 'Друзья',
		'add_new'            => 'Добавить нового',
		'add_new_item'       => 'Добавить нового друга',
		'edit_item'          => 'Редактировать друга',
		'new_item'           => 'Новый друг',
		'view_item'          => 'Просмотреть друга',
		'search_items'       => 'Искать друзей',
		'not_found'          => 'Друзья не найдены',
		'not_found_in_trash' => 'В корзине друзей не найдено',
		'all_items'          => 'Все друзья',
	);

	$args = array(
		'labels'              => $labels,
		'public'              => false,
		'publicly_queryable'  => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => false,
		'capability_type'     => 'post',
		'has_archive'         => false,
		'hierarchical'        => false,
		'menu_position'       => 6,
		'menu_icon'           => 'dashicons-groups',
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'show_in_rest'        => true,
	);

	register_post_type( 'friend', $args );
}
add_action( 'init', 'tp_register_friends' );

/**
 * Register Media CPT
 * СМИ о нас - слайдер логотипов СМИ
 */
function tp_register_media() {
	$labels = array(
		'name'               => 'СМИ о нас',
		'singular_name'      => 'Медиа',
		'menu_name'          => 'СМИ о нас',
		'add_new'            => 'Добавить новое',
		'add_new_item'       => 'Добавить новое медиа',
		'edit_item'          => 'Редактировать медиа',
		'new_item'           => 'Новое медиа',
		'view_item'          => 'Просмотреть медиа',
		'search_items'       => 'Искать медиа',
		'not_found'          => 'Медиа не найдены',
		'not_found_in_trash' => 'В корзине медиа не найдено',
		'all_items'          => 'Все медиа',
	);

	$args = array(
		'labels'              => $labels,
		'public'              => false,
		'publicly_queryable'  => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => false,
		'capability_type'     => 'post',
		'has_archive'         => false,
		'hierarchical'        => false,
		'menu_position'       => 7,
		'menu_icon'           => 'dashicons-megaphone',
		'supports'            => array( 'title', 'thumbnail' ),
		'show_in_rest'        => true,
	);

	register_post_type( 'media_item', $args );
}
add_action( 'init', 'tp_register_media' );

/**
 * Register Materials CPT
 * Полезные материалы - слайдер материалов
 */
function tp_register_materials() {
	$labels = array(
		'name'               => 'Материалы',
		'singular_name'      => 'Материал',
		'menu_name'          => 'Материалы',
		'add_new'            => 'Добавить новый',
		'add_new_item'       => 'Добавить новый материал',
		'edit_item'          => 'Редактировать материал',
		'new_item'           => 'Новый материал',
		'view_item'          => 'Просмотреть материал',
		'search_items'       => 'Искать материалы',
		'not_found'          => 'Материалы не найдены',
		'not_found_in_trash' => 'В корзине материалов не найдено',
		'all_items'          => 'Все материалы',
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => array( 'slug' => 'materials' ),
		'capability_type'     => 'post',
		'has_archive'         => true,
		'hierarchical'        => false,
		'menu_position'       => 8,
		'menu_icon'           => 'dashicons-book-alt',
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest'        => true,
	);

	register_post_type( 'material', $args );
}
add_action( 'init', 'tp_register_materials' );

/**
 * Register Team CPT
 * Наши специалисты - слайдер команды
 */
function tp_register_team() {
	$labels = array(
		'name'               => 'Команда',
		'singular_name'      => 'Участник команды',
		'menu_name'          => 'Команда',
		'add_new'            => 'Добавить нового',
		'add_new_item'       => 'Добавить нового участника',
		'edit_item'          => 'Редактировать участника',
		'new_item'           => 'Новый участник',
		'view_item'          => 'Просмотреть участника',
		'search_items'       => 'Искать участников',
		'not_found'          => 'Участники не найдены',
		'not_found_in_trash' => 'В корзине участников не найдено',
		'all_items'          => 'Все участники',
	);

	$args = array(
		'labels'              => $labels,
		'public'              => false,
		'publicly_queryable'  => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => false,
		'capability_type'     => 'post',
		'has_archive'         => false,
		'hierarchical'        => false,
		'menu_position'       => 9,
		'menu_icon'           => 'dashicons-businessman',
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'show_in_rest'        => true,
	);

	register_post_type( 'team_member', $args );
}
add_action( 'init', 'tp_register_team' );

/**
 * Register Histories CPT
 * Истории переживших - слайдер историй
 */
function tp_register_histories() {
	$labels = array(
		'name'               => 'Истории',
		'singular_name'      => 'История',
		'menu_name'          => 'Истории',
		'add_new'            => 'Добавить новую',
		'add_new_item'       => 'Добавить новую историю',
		'edit_item'          => 'Редактировать историю',
		'new_item'           => 'Новая история',
		'view_item'          => 'Просмотреть историю',
		'search_items'       => 'Искать истории',
		'not_found'          => 'Истории не найдены',
		'not_found_in_trash' => 'В корзине историй не найдено',
		'all_items'          => 'Все истории',
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => array( 'slug' => 'histories' ),
		'capability_type'     => 'post',
		'has_archive'         => true,
		'hierarchical'        => false,
		'menu_position'       => 10,
		'menu_icon'           => 'dashicons-heart',
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest'        => true,
	);

	register_post_type( 'history', $args );
}
add_action( 'init', 'tp_register_histories' );
