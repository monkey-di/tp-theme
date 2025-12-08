<?php
/**
 * Slider Navigation Arrows Component (Desktop only)
 *
 * @param array $args {
 *     @type string $prev_class  Unique class for Prev button selector.
 *     @type string $next_class  Unique class for Next button selector.
 *     @type string $color       Tailwind text color class. Default 'text-primary'.
 *     @type string $class       Additional wrapper classes.
 * }
 */

$prev_class = $args['prev_class'] ?? 'swiper-button-prev-custom';
$next_class = $args['next_class'] ?? 'swiper-button-next-custom';
$color      = $args['color'] ?? 'text-primary';
$extra_class = $args['class'] ?? '';
?>

<div class="slider-navigation flex justify-between w-full <?php echo esc_attr( $extra_class ); ?>">
    <!-- Prev Button -->
    <button type="button" class="<?php echo esc_attr( $prev_class ); ?>">
        <img src="<?php echo get_theme_file_uri('assets/images/arrow-prev.svg'); ?>" alt="Previous" />
    </button>

    <!-- Next Button -->
    <button type="button" class="<?php echo esc_attr( $next_class ); ?>">
        <img src="<?php echo get_theme_file_uri('assets/images/arrow-next.svg'); ?>" alt="Next" />
    </button>
</div>
