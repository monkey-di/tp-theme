<?php
/**
 * Demo Content Importer
 *
 * Импортирует текущий статический контент в CPT
 *
 * Использование:
 * 1. Через WP-CLI: wp eval-file inc/demo-content/import-demo-content.php
 * 2. Через админку: добавить временный пункт меню и вызвать функцию
 *
 * @package tebe-poveryat
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main import function
 */
function tp_import_demo_content() {
	$results = array(
		'main_slides' => tp_import_main_slides(),
		'friends'     => tp_import_friends(),
		'media'       => tp_import_media(),
		'materials'   => tp_import_materials(),
		'team'        => tp_import_team(),
		'histories'   => tp_import_histories(),
	);

	return $results;
}

/**
 * Import Main Slider Slides
 */
function tp_import_main_slides() {
	$slides = array(
		array(
			'title'   => 'Тебе поверят',
			'content' => 'Оказываем бесплатную психологическую и юридическую помощь пережившим сексуализированное насилие в детстве. Занимаемся профилактикой насилия, чтобы защитить детей и сделать общество безопаснее.',
			'image'   => 'hero.webp',
		),
		array(
			'title'   => 'Тебе поверят',
			'content' => 'Оказываем бесплатную психологическую и юридическую помощь пережившим сексуализированное насилие в детстве. Занимаемся профилактикой насилия, чтобы защитить детей и сделать общество безопаснее.',
			'image'   => 'hero.webp',
		),
		array(
			'title'   => 'Тебе поверят',
			'content' => 'Оказываем бесплатную психологическую и юридическую помощь пережившим сексуализированное насилие в детстве. Занимаемся профилактикой насилия, чтобы защитить детей и сделать общество безопаснее.',
			'image'   => 'hero.webp',
		),
	);

	$imported = array();

	foreach ( $slides as $index => $slide ) {
		$post_id = wp_insert_post( array(
			'post_type'    => 'main_slide',
			'post_title'   => $slide['title'],
			'post_content' => $slide['content'],
			'post_status'  => 'publish',
			'menu_order'   => $index + 1,
		) );

		if ( ! is_wp_error( $post_id ) ) {
			// Set featured image
			$image_path = get_template_directory() . '/assets/' . $slide['image'];
			if ( file_exists( $image_path ) ) {
				$attach_id = tp_insert_attachment( $image_path, $post_id );
				set_post_thumbnail( $post_id, $attach_id );
			}
			$imported[] = $post_id;
		}
	}

	return $imported;
}

/**
 * Import Friends
 */
function tp_import_friends() {
	$friends = array(
		array(
			'name'  => 'Аглая Тарасова',
			'role'  => 'актриса',
			'quote' => 'Это одна из самых табуированных тем в нашем обществе. Про неё важно говорить как можно чаще.',
			'image' => 'aglaia-tarasova.jpg',
		),
		array(
			'name'  => 'Константин Хабенский',
			'role'  => 'актёр',
			'quote' => 'Важно создавать безопасное пространство, где дети могут говорить и быть услышанными.',
			'image' => 'konstantin-khabensky.jpg',
		),
		array(
			'name'  => 'Юрий Шевчук',
			'role'  => 'артист',
			'quote' => 'Творчество – это способ говорить о сложном, достучаться до сердец.',
			'image' => 'yuri-shevchuk.jpg',
		),
	);

	$imported = array();

	foreach ( $friends as $index => $friend ) {
		$post_id = wp_insert_post( array(
			'post_type'    => 'friend',
			'post_title'   => $friend['name'],
			'post_content' => $friend['quote'],
			'post_status'  => 'publish',
			'menu_order'   => $index + 1,
		) );

		if ( ! is_wp_error( $post_id ) ) {
			// Set featured image
			$image_path = get_template_directory() . '/assets/images/' . $friend['image'];
			if ( file_exists( $image_path ) ) {
				$attach_id = tp_insert_attachment( $image_path, $post_id );
				set_post_thumbnail( $post_id, $attach_id );
			}
			$imported[] = $post_id;
		}
	}

	return $imported;
}

/**
 * Import Media (СМИ)
 */
function tp_import_media() {
	$media_items = array(
		array(
			'name' => 'Snob',
			'url'  => 'https://snob.ru/example-article',
		),
		array(
			'name' => 'Новый Очаг',
			'url'  => 'https://novochag.ru/example-article',
		),
		array(
			'name' => 'Forbes',
			'url'  => 'https://forbes.ru/example-article',
		),
		array(
			'name' => 'Нож',
			'url'  => 'https://knife.media/example-article',
		),
		array(
			'name' => 'Медиа 5',
			'url'  => 'https://example.com/article-5',
		),
		array(
			'name' => 'Такие Дела',
			'url'  => 'https://takiedela.ru/example-article',
		),
	);

	$imported = array();

	foreach ( $media_items as $index => $media ) {
		$post_id = wp_insert_post( array(
			'post_type'   => 'media_item',
			'post_title'  => $media['name'],
			'post_status' => 'publish',
			'menu_order'  => $index + 1,
		) );

		if ( ! is_wp_error( $post_id ) ) {
			// Save URL as meta
			update_post_meta( $post_id, '_media_url', $media['url'] );
			$imported[] = $post_id;
		}
	}

	return $imported;
}

/**
 * Import Materials
 */
function tp_import_materials() {
	$materials = array(
		array(
			'title'   => 'ИИ и психотерапия: новый помощник или иллюзия близости?',
			'excerpt' => 'ИИ, включая ChatGPT, активно используется для оказания психологической поддержки. Хотя он предоставляет доступность и анонимность, риски ошибок и отсутствие эмпатии поднимают вопросы о его роли в сфере ментального здоровья.',
			'content' => 'ИИ, включая ChatGPT, активно используется для оказания психологической поддержки. Хотя он предоставляет доступность и анонимность, риски ошибок и отсутствие эмпатии поднимают вопросы о его роли в сфере ментального здоровья. Мы собрали мнения коллег из секторов благотворительности и технологий.',
			'image'   => '1.png',
		),
		array(
			'title'   => 'Влияние социальных сетей на самооценку подростков',
			'excerpt' => 'Исследование о том, как лайки и комментарии формируют восприятие себя.',
			'content' => 'Исследование о том, как лайки и комментарии формируют восприятие себя. Советы психологов для родителей и педагогов.',
			'image'   => '1.png',
		),
	);

	$imported = array();

	foreach ( $materials as $index => $material ) {
		$post_id = wp_insert_post( array(
			'post_type'    => 'material',
			'post_title'   => $material['title'],
			'post_content' => $material['content'],
			'post_excerpt' => $material['excerpt'],
			'post_status'  => 'publish',
			'menu_order'   => $index + 1,
		) );

		if ( ! is_wp_error( $post_id ) ) {
			// Set featured image
			$image_path = get_template_directory() . '/assets/images/' . $material['image'];
			if ( file_exists( $image_path ) ) {
				$attach_id = tp_insert_attachment( $image_path, $post_id );
				set_post_thumbnail( $post_id, $attach_id );
			}
			$imported[] = $post_id;
		}
	}

	return $imported;
}

/**
 * Import Team Members
 */
function tp_import_team() {
	$team_members = array(
		array(
			'name'     => 'Ксения Шашунова',
			'position' => 'Координаторка детско-родительского направления',
			'bio'      => '«Я руковожу направлением работы, куда обращаются за помощью, поддержкой и информацией подростки или родители, чьи дети подверглись сексуализированному насилию. Моя главная задача — поддержка и развитие команды психологов этого направления, организация обучения и регулярных супервизий и интервизий. Также я принимаю заявки от подростков, распределяю их между специалистами: мне важно быть на связи в случае, если ситуация срочная, подключать к работе юристов или другие организации. Кроме того, я рассказываю о нашей работе с детьми в СМИ, чтобы было больше информации о проблеме сексуализированного насилия над детьми в разных аспектах»',
		),
		array(
			'name'     => 'Ирина Смирнова',
			'position' => 'Психолог-консультант',
			'bio'      => 'Ирина работает с детьми и подростками, помогая им справиться с травмами и восстановить доверие к миру.',
		),
		array(
			'name'     => 'Алексей Волков',
			'position' => 'Юридический консультант',
			'bio'      => 'Алексей оказывает правовую поддержку и консультирует по вопросам защиты прав детей.',
		),
	);

	$imported = array();

	foreach ( $team_members as $index => $member ) {
		$post_id = wp_insert_post( array(
			'post_type'    => 'team_member',
			'post_title'   => $member['name'],
			'post_content' => $member['bio'],
			'post_status'  => 'publish',
			'menu_order'   => $index + 1,
		) );

		if ( ! is_wp_error( $post_id ) ) {
			// Save position as meta
			update_post_meta( $post_id, '_team_position', $member['position'] );
			$imported[] = $post_id;
		}
	}

	return $imported;
}

/**
 * Import Histories
 */
function tp_import_histories() {
	$histories = array(
		array(
			'name'    => 'Татьяна Цветкова',
			'excerpt' => 'Для маленьких детей весь мир с одной стороны огромный и удивительный. С другой стороны — сужается до родных и близких.',
			'content' => 'Для маленьких детей весь мир с одной стороны огромный и удивительный. С другой стороны — сужается до родных и близких. И их предательство или неадекватное отношение искажает всю картинку, будто разбитое зеркало. Я пережила инцест в детстве. Это разбило моё зеркало мира. Я смотрела в него и себя видела уродливой, ненужной, использованной, разобранной на кусочки.',
		),
		array(
			'name'    => 'Мария Иванова',
			'excerpt' => 'Мой путь к исцелению был долгим, но благодаря поддержке я смогла найти силы жить дальше.',
			'content' => 'Мой путь к исцелению был долгим, но благодаря поддержке я смогла найти силы жить дальше.',
		),
		array(
			'name'    => 'Елена Петрова',
			'excerpt' => 'Никогда не думала, что смогу говорить об этом вслух, но теперь я готова помогать другим.',
			'content' => 'Никогда не думала, что смогу говорить об этом вслух, но теперь я готова помогать другим.',
		),
	);

	$imported = array();

	foreach ( $histories as $index => $history ) {
		$post_id = wp_insert_post( array(
			'post_type'    => 'history',
			'post_title'   => $history['name'],
			'post_content' => $history['content'],
			'post_excerpt' => $history['excerpt'],
			'post_status'  => 'publish',
			'menu_order'   => $index + 1,
		) );

		if ( ! is_wp_error( $post_id ) ) {
			$imported[] = $post_id;
		}
	}

	return $imported;
}

/**
 * Helper function to insert attachment
 */
function tp_insert_attachment( $file_path, $parent_post_id = 0 ) {
	$wp_filetype = wp_check_filetype( basename( $file_path ), null );

	$attachment = array(
		'guid'           => $file_path,
		'post_mime_type' => $wp_filetype['type'],
		'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $file_path ) ),
		'post_content'   => '',
		'post_status'    => 'inherit',
	);

	$attach_id = wp_insert_attachment( $attachment, $file_path, $parent_post_id );

	require_once ABSPATH . 'wp-admin/includes/image.php';
	$attach_data = wp_generate_attachment_metadata( $attach_id, $file_path );
	wp_update_attachment_metadata( $attach_id, $attach_data );

	return $attach_id;
}

/**
 * Admin menu item for manual import
 * Uncomment to add temporary admin menu
 */
/*
function tp_demo_import_admin_menu() {
	add_management_page(
		'Импорт демо-контента',
		'Импорт демо-контента',
		'manage_options',
		'tp-demo-import',
		'tp_demo_import_page'
	);
}
add_action( 'admin_menu', 'tp_demo_import_admin_menu' );

function tp_demo_import_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_POST['tp_import_demo'] ) && check_admin_referer( 'tp_import_demo' ) ) {
		$results = tp_import_demo_content();
		echo '<div class="notice notice-success"><p>Импорт завершён!</p>';
		echo '<ul>';
		foreach ( $results as $type => $ids ) {
			echo '<li>' . esc_html( $type ) . ': ' . count( $ids ) . ' записей</li>';
		}
		echo '</ul></div>';
	}

	?>
	<div class="wrap">
		<h1>Импорт демо-контента</h1>
		<p>Эта функция импортирует все статические данные из текущих шаблонов в Custom Post Types.</p>
		<p><strong>Внимание:</strong> Запускайте импорт только один раз, чтобы избежать дублирования.</p>
		<form method="post">
			<?php wp_nonce_field( 'tp_import_demo' ); ?>
			<p>
				<button type="submit" name="tp_import_demo" class="button button-primary">
					Запустить импорт
				</button>
			</p>
		</form>
	</div>
	<?php
}
*/

// Для импорта через WP-CLI:
// wp eval-file wp-content/themes/tebe-poveryat/inc/demo-content/import-demo-content.php
// echo "Running demo import...\n";
// $results = tp_import_demo_content();
// print_r($results);
