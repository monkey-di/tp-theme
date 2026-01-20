<?php
$text = get_field('text');
$image = get_field('image');
?>
<div class="blog-intro-block">
    <?php if($text){?>
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
    <?php } ?>

    <?php if($image){ ?>
        <div class="blog-intro-block-image">
            <img src="<?php echo $image; ?>">
        </div>
    <?php } ?>
</div>