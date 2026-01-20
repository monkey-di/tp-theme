<?php
/**
 * Шаблон блока "Блок видео на всю ширину"
 */
$file = '';
$image = '';
if(function_exists('get_field')) {
    $file = get_field('url');
    $image = get_field('image');
}
?>
<div class="full-video-block">
    <div class="video-container" data-provider="html5" data-sources='[{"src": "<?php echo $file; ?>">", "type": "video/mp4"}, {"src": "<?php echo $file; ?>", "type": "video/webm"}]'>
        <div class="video-placeholder">
            <img src=" <img src="<?php echo $image; ?>">" alt="Preview">
            <button class="play-button"></button>
        </div>
    </div>
</div>
