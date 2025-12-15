<?php
/**
 * Slider Navigation Arrows Component (Desktop only)
 *
 * @param array $args {
 *     @type string $prev_class  Unique class for Prev button selector.
 *     @type string $next_class  Unique class for Next button selector.
 *     @type string $color       Tailwind text color class. Default 'text-primary'.
 *     @type string $class       Additional wrapper classes.
 *     @type string $arrow_prev  Custom prev arrow image filename. Default 'arrow-prev.svg'.
 *     @type string $arrow_next  Custom next arrow image filename. Default 'arrow-next.svg'.
 *     @type string $img_class   Custom image classes. Default 'w-[58px] h-[58px]'.
 *     @type string $justify     Justify class: 'justify-center', 'justify-between', etc. Default 'justify-between'.
 * }
 */

$prev_class = $args['prev_class'] ?? 'swiper-button-prev-custom';
$next_class = $args['next_class'] ?? 'swiper-button-next-custom';
$color      = $args['color'] ?? 'text-primary';
$extra_class = $args['class'] ?? '';
$arrow_prev = $args['arrow_prev'] ?? 'arrow-prev.svg';
$arrow_next = $args['arrow_next'] ?? 'arrow-next.svg';
$img_class  = $args['img_class'] ?? 'w-[58px] h-[58px]';
$justify    = $args['justify'] ?? 'justify-between';
?>

<div class="slider-navigation hidden xl:flex gap-4 items-center  <?php echo esc_attr( $justify ); ?> <?php echo esc_attr( $extra_class ); ?>">
    <!-- Prev Button -->
    <button type="button" class="<?php echo esc_attr( $prev_class ); ?> cursor-pointer hover:opacity-70 transition">
        <img src="<?php echo get_theme_file_uri('assets/images/' . $arrow_prev); ?>" alt="Previous" class="<?php echo esc_attr( $img_class ); ?>" />
    </button>

    <!-- Next Button -->
    <button type="button" class="<?php echo esc_attr( $next_class ); ?> cursor-pointer hover:opacity-70 transition">
        <img src="<?php echo get_theme_file_uri('assets/images/' . $arrow_next); ?>" alt="Next" class="<?php echo esc_attr( $img_class ); ?>" />
    </button>
</div>
