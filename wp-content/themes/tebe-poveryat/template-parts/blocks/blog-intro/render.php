<?php
/**
 * Шаблон блока "Интро блога"
 * Работает в редакторе (админке) и на фронтенде
 */
$text = '';
$image = '';
if(function_exists('get_field')) {
    $text = get_field('text');
    $image = get_field('intro-image');
}

$has_data = !empty($text) || !empty($image);
?>
<?php if($has_data) { ?>
    <div class="blog-intro-block">
        <!-- Ваш существующий HTML код -->
        <?php if($text){ ?>
            <div class="blog-intro-block-col">
            <div class="post-meta">
                <time>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg">
                    <span><?php echo get_the_date(); ?></span>
                </time>
            </div>
            <h1 class="blog-single-title">
                <?php the_title(); ?>
            </h1>
            <div class="blog-intro-block-text">
                <?php echo wp_kses_post($text); ?>
            </div>
            </div>
        <?php } ?>

        <?php if($image) { ?>
        <div class="blog-intro-block-col">
            <div class="blog-intro-block-image">
                <img src="<?php echo esc_url($image); ?>">
            </div>
        </div>
        <?php } ?>
    </div>
<?php } ?>