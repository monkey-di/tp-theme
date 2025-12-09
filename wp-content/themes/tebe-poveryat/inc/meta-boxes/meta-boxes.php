<?php
/**
 * Custom Meta Boxes
 *
 * @package tebe-poveryat
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add meta boxes for Media CPT (URL field)
 */
function tp_add_media_meta_boxes() {
	add_meta_box(
		'media_url',
		'Ссылка на статью',
		'tp_media_url_callback',
		'media_item',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'tp_add_media_meta_boxes' );

/**
 * Callback for Media URL meta box
 */
function tp_media_url_callback( $post ) {
	wp_nonce_field( 'tp_save_media_url', 'tp_media_url_nonce' );
	$value = get_post_meta( $post->ID, '_media_url', true );
	echo '<label for="media_url">URL статьи:</label>';
	echo '<input type="url" id="media_url" name="media_url" value="' . esc_attr( $value ) . '" style="width:100%;" placeholder="https://example.com/article" />';
	echo '<p class="description">Полный URL статьи в СМИ. При клике на логотип происходит переход на эту ссылку.</p>';
}

/**
 * Save Media URL meta box data
 */
function tp_save_media_url( $post_id ) {
	if ( ! isset( $_POST['tp_media_url_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['tp_media_url_nonce'], 'tp_save_media_url' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	if ( ! isset( $_POST['media_url'] ) ) {
		return;
	}

	$url = sanitize_url( $_POST['media_url'] );
	update_post_meta( $post_id, '_media_url', $url );
}
add_action( 'save_post_media_item', 'tp_save_media_url' );

/**
 * Add meta boxes for Team CPT (Position/Subtitle field)
 */
function tp_add_team_meta_boxes() {
	add_meta_box(
		'team_position',
		'Должность',
		'tp_team_position_callback',
		'team_member',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'tp_add_team_meta_boxes' );

/**
 * Callback for Team Position meta box
 */
function tp_team_position_callback( $post ) {
	wp_nonce_field( 'tp_save_team_position', 'tp_team_position_nonce' );
	$value = get_post_meta( $post->ID, '_team_position', true );
	echo '<label for="team_position">Должность специалиста:</label>';
	echo '<input type="text" id="team_position" name="team_position" value="' . esc_attr( $value ) . '" style="width:100%;" placeholder="Например: Психолог" />';
	echo '<p class="description">Подзаголовок, отображается под именем в карточке специалиста.</p>';
}

/**
 * Save Team Position meta box data
 */
function tp_save_team_position( $post_id ) {
	if ( ! isset( $_POST['tp_team_position_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['tp_team_position_nonce'], 'tp_save_team_position' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	if ( ! isset( $_POST['team_position'] ) ) {
		return;
	}

	$position = sanitize_text_field( $_POST['team_position'] );
	update_post_meta( $post_id, '_team_position', $position );
}
add_action( 'save_post_team_member', 'tp_save_team_position' );

/**
 * Add custom columns for CPT admin lists
 */

// Main Slider columns
function tp_main_slider_columns( $columns ) {
	$new_columns = array();
	$new_columns['cb'] = $columns['cb'];
	$new_columns['thumbnail'] = 'Изображение';
	$new_columns['title'] = $columns['title'];
	$new_columns['date'] = $columns['date'];
	return $new_columns;
}
add_filter( 'manage_main_slide_posts_columns', 'tp_main_slider_columns' );

function tp_main_slider_column_content( $column, $post_id ) {
	if ( 'thumbnail' === $column ) {
		$thumb = get_the_post_thumbnail( $post_id, array( 80, 80 ) );
		echo $thumb ? $thumb : '—';
	}
}
add_action( 'manage_main_slide_posts_custom_column', 'tp_main_slider_column_content', 10, 2 );

// Friends columns
function tp_friends_columns( $columns ) {
	$new_columns = array();
	$new_columns['cb'] = $columns['cb'];
	$new_columns['thumbnail'] = 'Фото';
	$new_columns['title'] = $columns['title'];
	$new_columns['date'] = $columns['date'];
	return $new_columns;
}
add_filter( 'manage_friend_posts_columns', 'tp_friends_columns' );

function tp_friends_column_content( $column, $post_id ) {
	if ( 'thumbnail' === $column ) {
		$thumb = get_the_post_thumbnail( $post_id, array( 80, 80 ) );
		echo $thumb ? $thumb : '—';
	}
}
add_action( 'manage_friend_posts_custom_column', 'tp_friends_column_content', 10, 2 );

// Media columns
function tp_media_columns( $columns ) {
	$new_columns = array();
	$new_columns['cb'] = $columns['cb'];
	$new_columns['thumbnail'] = 'Логотип';
	$new_columns['title'] = $columns['title'];
	$new_columns['url'] = 'URL статьи';
	$new_columns['date'] = $columns['date'];
	return $new_columns;
}
add_filter( 'manage_media_item_posts_columns', 'tp_media_columns' );

function tp_media_column_content( $column, $post_id ) {
	if ( 'thumbnail' === $column ) {
		$thumbnail_id = get_post_thumbnail_id( $post_id );
		if ( $thumbnail_id ) {
			$image_url = wp_get_attachment_url( $thumbnail_id );
			$mime_type = get_post_mime_type( $thumbnail_id );

			// Special handling for SVG
			if ( $mime_type === 'image/svg+xml' ) {
				echo '<img src="' . esc_url( $image_url ) . '" style="width: 80px; height: auto; max-height: 80px; object-fit: contain;" />';
			} else {
				$thumb = get_the_post_thumbnail( $post_id, array( 80, 80 ) );
				echo $thumb;
			}
		} else {
			echo '—';
		}
	}
	if ( 'url' === $column ) {
		$url = get_post_meta( $post_id, '_media_url', true );
		if ( $url ) {
			echo '<a href="' . esc_url( $url ) . '" target="_blank">' . esc_html( $url ) . '</a>';
		} else {
			echo '—';
		}
	}
}
add_action( 'manage_media_item_posts_custom_column', 'tp_media_column_content', 10, 2 );

// Team columns
function tp_team_columns( $columns ) {
	$new_columns = array();
	$new_columns['cb'] = $columns['cb'];
	$new_columns['thumbnail'] = 'Фото';
	$new_columns['title'] = $columns['title'];
	$new_columns['position'] = 'Должность';
	$new_columns['date'] = $columns['date'];
	return $new_columns;
}
add_filter( 'manage_team_member_posts_columns', 'tp_team_columns' );

function tp_team_column_content( $column, $post_id ) {
	if ( 'thumbnail' === $column ) {
		$thumb = get_the_post_thumbnail( $post_id, array( 80, 80 ) );
		echo $thumb ? $thumb : '—';
	}
	if ( 'position' === $column ) {
		$position = get_post_meta( $post_id, '_team_position', true );
		echo $position ? esc_html( $position ) : '—';
	}
}
add_action( 'manage_team_member_posts_custom_column', 'tp_team_column_content', 10, 2 );
