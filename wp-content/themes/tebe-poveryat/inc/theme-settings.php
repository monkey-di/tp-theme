<?php
/**
 * Theme Settings Page
 * For editing static homepage sections
 *
 * @package tebe-poveryat
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add theme settings page to admin menu
 */
function tp_add_theme_settings_page() {
	add_menu_page(
		'Настройки главной',
		'Главная страница',
		'manage_options',
		'tp-homepage-settings',
		'tp_render_settings_page',
		'dashicons-admin-home',
		3
	);
}
add_action( 'admin_menu', 'tp_add_theme_settings_page' );

/**
 * Register settings
 */
function tp_register_settings() {
	// Donation section
	register_setting( 'tp_homepage_settings', 'tp_donation_title' );

	// About section
	register_setting( 'tp_homepage_settings', 'tp_about_title' );
	register_setting( 'tp_homepage_settings', 'tp_about_description' );
	register_setting( 'tp_homepage_settings', 'tp_about_stat1_number' );
	register_setting( 'tp_homepage_settings', 'tp_about_stat1_text' );
	register_setting( 'tp_homepage_settings', 'tp_about_stat2_number' );
	register_setting( 'tp_homepage_settings', 'tp_about_stat2_text' );
	register_setting( 'tp_homepage_settings', 'tp_about_stat3_number' );
	register_setting( 'tp_homepage_settings', 'tp_about_stat3_text' );
	register_setting( 'tp_homepage_settings', 'tp_about_stat4_number' );
	register_setting( 'tp_homepage_settings', 'tp_about_stat4_text' );

	// About Part 2 section
	register_setting( 'tp_homepage_settings', 'tp_about2_title' );
	register_setting( 'tp_homepage_settings', 'tp_about2_subtitle' );
	register_setting( 'tp_homepage_settings', 'tp_about2_description' );
}
add_action( 'admin_init', 'tp_register_settings' );

/**
 * Render settings page
 */
function tp_render_settings_page() {
	?>
	<div class="wrap">
		<h1>Настройки главной страницы</h1>
		<p>Редактирование статических секций главной страницы</p>

		<form method="post" action="options.php">
			<?php settings_fields( 'tp_homepage_settings' ); ?>
			<?php do_settings_sections( 'tp_homepage_settings' ); ?>

			<!-- Donation Section -->
			<div class="card" style="max-width: 800px; margin-bottom: 20px;">
				<h2>Кампания (Donation)</h2>
				<table class="form-table">
					<tr>
						<th scope="row">
							<label for="tp_donation_title">Заголовок</label>
						</th>
						<td>
							<input
								type="text"
								id="tp_donation_title"
								name="tp_donation_title"
								value="<?php echo esc_attr( get_option( 'tp_donation_title', 'Поддержите нас' ) ); ?>"
								class="regular-text"
							/>
						</td>
					</tr>
				</table>
			</div>

			<!-- About Section -->
			<div class="card" style="max-width: 800px; margin-bottom: 20px;">
				<h2>О нас (About)</h2>
				<table class="form-table">
					<tr>
						<th scope="row">
							<label for="tp_about_title">Заголовок</label>
						</th>
						<td>
							<input
								type="text"
								id="tp_about_title"
								name="tp_about_title"
								value="<?php echo esc_attr( get_option( 'tp_about_title', 'О нас' ) ); ?>"
								class="regular-text"
							/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="tp_about_description">Описание</label>
						</th>
						<td>
							<textarea
								id="tp_about_description"
								name="tp_about_description"
								rows="5"
								class="large-text"
							><?php echo esc_textarea( get_option( 'tp_about_description', 'Мы оказываем бесплатную психологическую и юридическую поддержку...' ) ); ?></textarea>
						</td>
					</tr>
				</table>

				<h3>Статистика</h3>
				<table class="form-table">
					<tr>
						<th scope="row">Блок 1</th>
						<td>
							<input type="text" name="tp_about_stat1_number" value="<?php echo esc_attr( get_option( 'tp_about_stat1_number', '2 000+' ) ); ?>" placeholder="2 000+" class="small-text" />
							<input type="text" name="tp_about_stat1_text" value="<?php echo esc_attr( get_option( 'tp_about_stat1_text', 'обращений' ) ); ?>" placeholder="обращений" class="regular-text" />
						</td>
					</tr>
					<tr>
						<th scope="row">Блок 2</th>
						<td>
							<input type="text" name="tp_about_stat2_number" value="<?php echo esc_attr( get_option( 'tp_about_stat2_number', '10' ) ); ?>" placeholder="10" class="small-text" />
							<input type="text" name="tp_about_stat2_text" value="<?php echo esc_attr( get_option( 'tp_about_stat2_text', 'лет работы' ) ); ?>" placeholder="лет работы" class="regular-text" />
						</td>
					</tr>
					<tr>
						<th scope="row">Блок 3</th>
						<td>
							<input type="text" name="tp_about_stat3_number" value="<?php echo esc_attr( get_option( 'tp_about_stat3_number', '50+' ) ); ?>" placeholder="50+" class="small-text" />
							<input type="text" name="tp_about_stat3_text" value="<?php echo esc_attr( get_option( 'tp_about_stat3_text', 'специалистов' ) ); ?>" placeholder="специалистов" class="regular-text" />
						</td>
					</tr>
					<tr>
						<th scope="row">Блок 4</th>
						<td>
							<input type="text" name="tp_about_stat4_number" value="<?php echo esc_attr( get_option( 'tp_about_stat4_number', '100%' ) ); ?>" placeholder="100%" class="small-text" />
							<input type="text" name="tp_about_stat4_text" value="<?php echo esc_attr( get_option( 'tp_about_stat4_text', 'бесплатно' ) ); ?>" placeholder="бесплатно" class="regular-text" />
						</td>
					</tr>
				</table>
			</div>

			<!-- About Part 2 Section -->
			<div class="card" style="max-width: 800px; margin-bottom: 20px;">
				<h2>О нас часть 2 (About Part 2)</h2>
				<table class="form-table">
					<tr>
						<th scope="row">
							<label for="tp_about2_title">Заголовок</label>
						</th>
						<td>
							<input
								type="text"
								id="tp_about2_title"
								name="tp_about2_title"
								value="<?php echo esc_attr( get_option( 'tp_about2_title', 'Наша миссия' ) ); ?>"
								class="regular-text"
							/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="tp_about2_subtitle">Подзаголовок</label>
						</th>
						<td>
							<input
								type="text"
								id="tp_about2_subtitle"
								name="tp_about2_subtitle"
								value="<?php echo esc_attr( get_option( 'tp_about2_subtitle', 'Мы работаем для...' ) ); ?>"
								class="regular-text"
							/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="tp_about2_description">Описание</label>
						</th>
						<td>
							<textarea
								id="tp_about2_description"
								name="tp_about2_description"
								rows="5"
								class="large-text"
							><?php echo esc_textarea( get_option( 'tp_about2_description', 'Описание о нашей миссии...' ) ); ?></textarea>
						</td>
					</tr>
				</table>
			</div>

			<?php submit_button( 'Сохранить настройки' ); ?>
		</form>
	</div>
	<?php
}
