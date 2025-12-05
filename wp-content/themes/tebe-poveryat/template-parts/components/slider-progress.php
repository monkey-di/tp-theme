<?php
/**
 * Slider Progress Bar Component
 *
 * @param array $args {
 *     @type string $track_color Tailwind class for track background. Default 'bg-white/20'.
 *     @type string $bar_color   Tailwind class for bar background. Default 'bg-secondary'.
 *     @type string $class       Additional classes.
 * }
 */

$track_color = $args['track_color'] ?? 'bg-white/20';
$bar_color   = $args['bar_color'] ?? 'bg-secondary';
$class       = $args['class'] ?? '';
?>

<div class="slider-progress w-full h-0.5 overflow-hidden rounded-sm <?php echo esc_attr( $track_color . ' ' . $class ); ?>">
    <div class="slider-progress-bar w-[104px] h-0.5 rounded-sm <?php echo esc_attr( $bar_color ); ?>"></div>
</div>
