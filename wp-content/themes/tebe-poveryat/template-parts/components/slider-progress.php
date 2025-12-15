<?php
/**
 * Slider Progress Bar Component
 *
 * @param array $args {
 * @type string $track_color Tailwind class for track background. Default 'bg-white'.
 * @type string $bar_color Tailwind class for bar background. Default 'bg-secondary'.
 * @type string $class Additional classes.
 * }
 */

$track_color = $args['track_color'] ?? '!bg-white';
$bar_color = $args['bar_color'] ?? '!bg-secondary';
$class = $args['class'] ?? '';
$is_white = $args['is_white'] ?? false;
?>

<!-- 
  Swiper Pagination Container.
  Swiper will inject <span class="swiper-pagination-progressbar-fill"></span> inside this div.
  We override Swiper's default absolute positioning to keep it in flow (!relative).
  We override Swiper's default background to make the track white (!bg-white).
-->
<div class="slider-progress relative w-full h-[2px] overflow-hidden rounded-[4px] <?php
echo esc_attr($track_color . ' ' . $class); ?>
    [&.swiper-pagination-progressbar]:!relative 
    [&.swiper-pagination-progressbar]:<?php echo $track_color; ?>
    <?php
echo $is_white ? '[&_.swiper-pagination-progressbar-fill]:!bg-white' : '[&_.swiper-pagination-progressbar-fill]:!bg-secondary';
?>
    [&_.swiper-pagination-progressbar-fill]:block 
    [&_.swiper-pagination-progressbar-fill]:h-full 
    [&_.swiper-pagination-progressbar-fill]:rounded-[4px]"

>
</div>