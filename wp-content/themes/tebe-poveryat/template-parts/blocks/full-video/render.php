<?php
/**
 * Шаблон блока "Блок видео на всю ширину"
 */
$file = '';
$image = '';
if(function_exists('get_field')) {
    $file = get_field('file');
    $image = get_field('image');
}
?>
test video
<?php print_r($file); ?>
<div class="full-video-block">
    <div class="video-container" data-provider="html5" data-sources='[{"src": "<?php echo $file; ?>", "type": "video/mp4"}, {"src": "<?php echo $file; ?>", "type": "video/webm"}]'>
        <div class="video-placeholder">
            <img src="<?php echo $image; ?>">
            <button class="play-button"></button>
        </div>
    </div>
</div>
