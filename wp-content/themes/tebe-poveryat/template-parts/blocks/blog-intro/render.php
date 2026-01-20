<?php
$text = get_field('text');
$image = get_field('image');
?>
<div class="blog-intro-block">
    <?php if($text){?>
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