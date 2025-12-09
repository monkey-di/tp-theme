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
 * Копирует файл из темы в uploads и создаёт attachment
 */
function tp_insert_attachment( $file_path, $parent_post_id = 0 ) {
	// Проверяем существование файла
	if ( ! file_exists( $file_path ) ) {
		return false;
	}

	// Читаем файл
	$file_data = file_get_contents( $file_path );
	$filename  = basename( $file_path );

	// Копируем в uploads через WordPress API
	$upload = wp_upload_bits( $filename, null, $file_data );

	if ( $upload['error'] ) {
		return false;
	}

	// Определяем MIME тип
	$wp_filetype = wp_check_filetype( $filename, null );

	// Создаём attachment
	$attachment = array(
		'post_mime_type' => $wp_filetype['type'],
		'post_title'     => preg_replace( '/\.[^.]+$/', '', $filename ),
		'post_content'   => '',
		'post_status'    => 'inherit',
	);

	// Вставляем attachment в БД
	$attach_id = wp_insert_attachment( $attachment, $upload['file'], $parent_post_id );

	if ( is_wp_error( $attach_id ) ) {
		return false;
	}

	// Генерируем метаданные (thumbnails)
	require_once ABSPATH . 'wp-admin/includes/image.php';
	$attach_data = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
	wp_update_attachment_metadata( $attach_id, $attach_data );

	return $attach_id;
}

/**
 * Get current post counts for all CPT
 */
function tp_get_current_counts() {
	$post_types = array( 'main_slide', 'friend', 'media_item', 'material', 'team_member', 'history' );
	$counts = array();

	foreach ( $post_types as $post_type ) {
		$counts[ $post_type ] = wp_count_posts( $post_type )->publish;
	}

	return $counts;
}

/**
 * Delete all demo content posts
 */
function tp_delete_all_demo_content() {
	$post_types = array( 'main_slide', 'friend', 'media_item', 'material', 'team_member', 'history' );
	$deleted = array();

	foreach ( $post_types as $post_type ) {
		$posts = get_posts( array(
			'post_type'      => $post_type,
			'posts_per_page' => -1,
			'post_status'    => 'any',
		) );

		$count = 0;
		foreach ( $posts as $post ) {
			// Удаляем связанные изображения
			$thumbnail_id = get_post_thumbnail_id( $post->ID );
			if ( $thumbnail_id ) {
				wp_delete_attachment( $thumbnail_id, true );
			}

			// Удаляем пост
			wp_delete_post( $post->ID, true );
			$count++;
		}

		$deleted[ $post_type ] = $count;
	}

	return $deleted;
}

/**
 * Admin menu item for manual import
 */
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

	// Handle delete action
	if ( isset( $_POST['tp_delete_demo'] ) && check_admin_referer( 'tp_delete_demo' ) ) {
		$deleted = tp_delete_all_demo_content();
		echo '<div class="notice notice-warning"><p>Записи удалены!</p>';
		echo '<ul>';
		foreach ( $deleted as $type => $count ) {
			if ( $count > 0 ) {
				echo '<li>' . esc_html( $type ) . ': ' . $count . ' записей удалено</li>';
			}
		}
		echo '</ul></div>';
	}

	// Handle import action
	if ( isset( $_POST['tp_import_demo'] ) && check_admin_referer( 'tp_import_demo' ) ) {
		$results = tp_import_demo_content();
		echo '<div class="notice notice-success"><p>Импорт завершён!</p>';
		echo '<ul>';
		foreach ( $results as $type => $ids ) {
			echo '<li>' . esc_html( $type ) . ': ' . count( $ids ) . ' записей импортировано</li>';
		}
		echo '</ul></div>';
	}

	// Get current counts
	$counts = tp_get_current_counts();
	$total = array_sum( $counts );

	?>
	<div class="wrap">
		<h1>Импорт демо-контента</h1>

		<!-- Current Status -->
		<div class="card" style="max-width: 600px; margin-bottom: 20px;">
			<h2>Текущее состояние базы данных</h2>
			<table class="widefat">
				<thead>
					<tr>
						<th>Тип записи</th>
						<th>Количество</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Главный слайдер</td>
						<td><strong><?php echo $counts['main_slide']; ?></strong></td>
					</tr>
					<tr>
						<td>Друзья</td>
						<td><strong><?php echo $counts['friend']; ?></strong></td>
					</tr>
					<tr>
						<td>СМИ о нас</td>
						<td><strong><?php echo $counts['media_item']; ?></strong></td>
					</tr>
					<tr>
						<td>Материалы</td>
						<td><strong><?php echo $counts['material']; ?></strong></td>
					</tr>
					<tr>
						<td>Команда</td>
						<td><strong><?php echo $counts['team_member']; ?></strong></td>
					</tr>
					<tr>
						<td>Истории</td>
						<td><strong><?php echo $counts['history']; ?></strong></td>
					</tr>
					<tr style="background: #f0f0f1;">
						<td><strong>ВСЕГО:</strong></td>
						<td><strong><?php echo $total; ?></strong></td>
					</tr>
				</tbody>
			</table>
		</div>

		<!-- Delete Form -->
		<?php if ( $total > 0 ) : ?>
		<div class="card" style="max-width: 600px; margin-bottom: 20px; border-left: 4px solid #d63638;">
			<h2>Удалить все записи</h2>
			<p>Удалит все импортированные записи и связанные изображения из базы данных.</p>
			<p><strong>Внимание:</strong> Это действие необратимо!</p>
			<form method="post" onsubmit="return confirm('Вы уверены? Все демо-записи и изображения будут удалены без возможности восстановления!');">
				<?php wp_nonce_field( 'tp_delete_demo' ); ?>
				<p>
					<button type="submit" name="tp_delete_demo" class="button button-secondary">
						🗑️ Удалить все записи (<?php echo $total; ?>)
					</button>
				</p>
			</form>
		</div>
		<?php endif; ?>

		<!-- Import Form -->
		<div class="card" style="max-width: 600px;">
			<h2>Импортировать демо-контент</h2>
			<p>Импортирует статические данные из шаблонов в Custom Post Types.</p>
			<?php if ( $total > 0 ) : ?>
				<p><strong>⚠️ Предупреждение:</strong> В базе уже есть записи. Рекомендуется сначала удалить старые записи, чтобы избежать дубликатов.</p>
			<?php endif; ?>
			<form method="post">
				<?php wp_nonce_field( 'tp_import_demo' ); ?>
				<p>
					<button type="submit" name="tp_import_demo" class="button button-primary">
						▶️ Запустить импорт
					</button>
				</p>
			</form>
		</div>
	</div>
	<?php
}


// Для импорта через WP-CLI:
// wp eval-file wp-content/themes/tebe-poveryat/inc/demo-content/import-demo-content.php
// echo "Running demo import...\n";
// $results = tp_import_demo_content();
// print_r($results);
