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

<div class="slider-navigation hidden md:flex gap-4 <?php echo esc_attr( $extra_class ); ?>">
    <!-- Prev Button -->
    <button type="button" class="<?php echo esc_attr( $prev_class ); ?> w-12 h-12 rounded-full border border-current flex items-center justify-center hover:opacity-70 transition <?php echo esc_attr( $color ); ?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>

    <!-- Next Button -->
    <button type="button" class="<?php echo esc_attr( $next_class ); ?> w-12 h-12 rounded-full border border-current flex items-center justify-center hover:opacity-70 transition <?php echo esc_attr( $color ); ?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>
</div>
