<?php
/**
 * Download Figma Assets Locally
 *
 * Скачивает все изображения из Figma API в локальные файлы
 *
 * Использование:
 * 1. Через WP-CLI: wp eval-file wp-content/themes/tebe-poveryat/inc/demo-content/download-figma-assets.php
 * 2. Через админку: добавить временный пункт меню
 *
 * @package tebe-poveryat
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Download single Figma asset
 */
function tp_download_figma_asset( $figma_url, $local_filename ) {
	$upload_dir = get_template_directory() . '/assets/images/';
	$local_path = $upload_dir . $local_filename;

	// Check if file already exists
	if ( file_exists( $local_path ) ) {
		return array(
			'success' => true,
			'message' => 'File already exists',
			'path'    => $local_path,
		);
	}

	// Download file
	$response = wp_remote_get( $figma_url, array(
		'timeout' => 30,
	) );

	if ( is_wp_error( $response ) ) {
		return array(
			'success' => false,
			'message' => $response->get_error_message(),
		);
	}

	$body = wp_remote_retrieve_body( $response );

	if ( empty( $body ) ) {
		return array(
			'success' => false,
			'message' => 'Empty response body',
		);
	}

	// Save file
	$saved = file_put_contents( $local_path, $body );

	if ( $saved === false ) {
		return array(
			'success' => false,
			'message' => 'Failed to save file',
		);
	}

	return array(
		'success' => true,
		'message' => 'Downloaded successfully',
		'path'    => $local_path,
		'size'    => $saved,
	);
}

/**
 * Download all Figma assets
 */
function tp_download_all_figma_assets() {
	$assets = array(
		// Waves (декоративные волны для секций)
		array(
			'url'  => 'https://www.figma.com/api/mcp/asset/a78f4794-1aec-424a-84e6-29b30a1deec8',
			'name' => 'wave-donation.svg',
			'type' => 'decoration',
		),
		array(
			'url'  => 'https://www.figma.com/api/mcp/asset/a3ffcfd2-6447-443d-af83-5edaaddb8c2d',
			'name' => 'wave-team.svg',
			'type' => 'decoration',
		),
		array(
			'url'  => 'https://www.figma.com/api/mcp/asset/caf0a422-764c-4079-aa5c-076f0e81e0b0',
			'name' => 'wave-media.svg',
			'type' => 'decoration',
		),
		array(
			'url'  => 'https://www.figma.com/api/mcp/asset/5b123c0f-8fc7-432b-a8ff-d1c8d69cf037',
			'name' => 'wave-histories.svg',
			'type' => 'decoration',
		),

		// Decorations (декоративные элементы фона)
		array(
			'url'  => 'https://www.figma.com/api/mcp/asset/aafc4d3a-a165-4a31-94b6-14585f99ac59',
			'name' => 'decor-media-1.svg',
			'type' => 'decoration',
		),
		array(
			'url'  => 'https://www.figma.com/api/mcp/asset/a3ed1268-469b-463b-830a-12704d0610ad',
			'name' => 'decor-media-2.svg',
			'type' => 'decoration',
		),
		array(
			'url'  => 'https://www.figma.com/api/mcp/asset/ca24a85b-aec7-44bb-9747-9b67a42f16c0',
			'name' => 'decor-histories-1.svg',
			'type' => 'decoration',
		),
		array(
			'url'  => 'https://www.figma.com/api/mcp/asset/8a7b47e0-5554-4a01-99f4-964c295223ba',
			'name' => 'decor-histories-2.svg',
			'type' => 'decoration',
		),

		// Team member photos
		array(
			'url'  => 'https://www.figma.com/api/mcp/asset/eff26b4d-5d3f-4d3c-85da-268de874818f',
			'name' => 'team-default.jpg',
			'type' => 'team',
		),

		// History photos
		array(
			'url'  => 'https://www.figma.com/api/mcp/asset/314b9643-f36f-4b57-bdbc-8214ec397710',
			'name' => 'history-default.jpg',
			'type' => 'history',
		),

		// Media logos
		array(
			'url'  => 'https://www.figma.com/api/mcp/asset/bb8e6aa8-be2d-41be-b175-19f783772020',
			'name' => 'media-logo-snob.svg',
			'type' => 'media',
		),
		array(
			'url'  => 'https://www.figma.com/api/mcp/asset/1d546a68-ada4-4eea-8861-555d2af57034',
			'name' => 'media-logo-novochag.svg',
			'type' => 'media',
		),
		array(
			'url'  => 'https://www.figma.com/api/mcp/asset/79d2f1dd-2c7a-4ef0-8100-b05bed435e8d',
			'name' => 'media-logo-forbes.svg',
			'type' => 'media',
		),
		array(
			'url'  => 'https://www.figma.com/api/mcp/asset/693f1a7e-d9ef-4e7e-ba85-06fccfb08798',
			'name' => 'media-logo-knife.svg',
			'type' => 'media',
		),
		array(
			'url'  => 'https://www.figma.com/api/mcp/asset/3dfc2e48-e6a0-42ce-aebe-3ec4b2c16dbf',
			'name' => 'media-logo-5.svg',
			'type' => 'media',
		),
		array(
			'url'  => 'https://www.figma.com/api/mcp/asset/99cbb63b-f7f3-4918-9402-0aff2d465402',
			'name' => 'media-logo-takiedela.svg',
			'type' => 'media',
		),

		// Link arrow
		array(
			'url'  => 'https://www.figma.com/api/mcp/asset/951c45f8-d506-4d92-b9f0-86b6802b524c',
			'name' => 'arrow-link-more.svg',
			'type' => 'decoration',
		),
	);

	$results = array(
		'success' => array(),
		'failed'  => array(),
		'skipped' => array(),
	);

	foreach ( $assets as $asset ) {
		echo "Downloading {$asset['name']}...\n";
		$result = tp_download_figma_asset( $asset['url'], $asset['name'] );

		if ( $result['success'] ) {
			if ( $result['message'] === 'File already exists' ) {
				$results['skipped'][] = $asset['name'];
				echo "  ✓ Skipped (already exists)\n";
			} else {
				$results['success'][] = array(
					'name' => $asset['name'],
					'type' => $asset['type'],
					'size' => $result['size'],
				);
				echo "  ✓ Success (" . size_format( $result['size'] ) . ")\n";
			}
		} else {
			$results['failed'][] = array(
				'name'    => $asset['name'],
				'message' => $result['message'],
			);
			echo "  ✗ Failed: {$result['message']}\n";
		}
	}

	return $results;
}

// Uncomment to add admin menu item
/*
function tp_figma_download_admin_menu() {
	add_management_page(
		'Скачать Figma ассеты',
		'Скачать Figma ассеты',
		'manage_options',
		'tp-figma-download',
		'tp_figma_download_page'
	);
}
add_action( 'admin_menu', 'tp_figma_download_admin_menu' );

function tp_figma_download_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_POST['tp_download_figma'] ) && check_admin_referer( 'tp_download_figma' ) ) {
		$results = tp_download_all_figma_assets();

		echo '<div class="notice notice-success"><p>Скачивание завершено!</p>';
		echo '<ul>';
		echo '<li>Успешно: ' . count( $results['success'] ) . '</li>';
		echo '<li>Пропущено: ' . count( $results['skipped'] ) . '</li>';
		echo '<li>Ошибок: ' . count( $results['failed'] ) . '</li>';
		echo '</ul></div>';

		if ( ! empty( $results['failed'] ) ) {
			echo '<div class="notice notice-error"><p>Ошибки:</p><ul>';
			foreach ( $results['failed'] as $failed ) {
				echo '<li>' . esc_html( $failed['name'] ) . ': ' . esc_html( $failed['message'] ) . '</li>';
			}
			echo '</ul></div>';
		}
	}

	?>
	<div class="wrap">
		<h1>Скачать Figma ассеты</h1>
		<p>Скачивает все изображения из Figma API и сохраняет их локально в assets/images/</p>
		<form method="post">
			<?php wp_nonce_field( 'tp_download_figma' ); ?>
			<p>
				<button type="submit" name="tp_download_figma" class="button button-primary">
					Скачать все ассеты
				</button>
			</p>
		</form>
	</div>
	<?php
}
*/

// Для запуска через WP-CLI:
// wp eval-file wp-content/themes/tebe-poveryat/inc/demo-content/download-figma-assets.php
if ( defined( 'WP_CLI' ) && WP_CLI ) {
	WP_CLI::line( 'Starting Figma assets download...' );
	$results = tp_download_all_figma_assets();
	WP_CLI::success( 'Download complete!' );
	WP_CLI::line( 'Success: ' . count( $results['success'] ) );
	WP_CLI::line( 'Skipped: ' . count( $results['skipped'] ) );
	WP_CLI::line( 'Failed: ' . count( $results['failed'] ) );
}
