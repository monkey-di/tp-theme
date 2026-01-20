<?php
/**
 * Шаблон блока "Блок видео на всю ширину"
 */
$url = '';
$image = '';
if(function_exists('get_field')) {
    $url = get_field('url');
    $image = get_field('image');
}
?>
<div class="fullvideo-block">
    <?php echo $url; ?>
    <?php echo $image; ?>
</div>
