<?php
/**
 * Title: Приветствие пользователя
 * Slug: tebe-poveryat/welcome-user
 * Categories: banner, text
 * Description: Показывает приветствие с именем пользователя или гостя.
 */

$current_user = wp_get_current_user();
$username = $current_user->exists() ? $current_user->display_name : 'Гость';
$date = date_i18n( 'j F Y' );
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-color has-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading -->
            <h2 class="wp-block-heading">Привет, <?php echo esc_html( $username ); ?>! 👋</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
             <p>Сегодня <?php echo esc_html( $date ); ?>. Рады видеть вас на сайте.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
             <?php if ( ! $current_user->exists() ) : ?>
                <!-- wp:button {"className":"is-style-outline"} -->
                <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( wp_login_url() ); ?>">Войти на сайт</a></div>
                <!-- /wp:button -->
             <?php else : ?>
                <!-- wp:paragraph -->
                <p>Ваш email: <?php echo esc_html( $current_user->user_email ); ?></p>
                <!-- /wp:paragraph -->
             <?php endif; ?>
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
