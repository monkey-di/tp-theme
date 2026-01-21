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
test video 2
<?php print_r($file); ?>
<div class="full-video-block">

<div class="video-container" id="videoContainer">
    <!-- Заглушка с превью и кнопкой -->
    <div class="video-placeholder">
        <img src="<?php echo $image; ?>"
             alt="Превью видео"
             class="video-thumbnail"
             id="videoThumbnail">
        <button class="play-button" id="playButton"></button>
    </div>

    <!-- Контейнер для встроенного видео -->
    <iframe class="video-iframe"
            id="videoPlayer"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
    </iframe>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const videoContainer = document.getElementById('videoContainer');
        const playButton = document.getElementById('playButton');
        const videoPlayer = document.getElementById('videoPlayer');
        const videoThumbnail = document.getElementById('videoThumbnail');

        // Замените этот URL на ваш YouTube/Vimeo или другой источник
        const videoUrl = '<?php echo $file; ?>';

        // Обработчик клика по кнопке воспроизведения
        playButton.addEventListener('click', function() {
            // Загружаем видео в iframe
            videoPlayer.src = videoUrl;

            // Добавляем класс для переключения видимости
            videoContainer.classList.add('video-started');

            // Опционально: фокус на видео для управления с клавиатуры
            videoPlayer.focus();
        });

        // Опционально: запуск при клике на превью
        videoThumbnail.addEventListener('click', function() {
            playButton.click();
        });

        // Опционально: запуск при нажатии пробела или Enter на контейнере
        videoContainer.addEventListener('keydown', function(e) {
            if (e.code === 'Space' || e.code === 'Enter') {
                e.preventDefault();
                playButton.click();
            }
        });

        // Устанавливаем tabindex для доступности
        videoContainer.setAttribute('tabindex', '0');
        videoContainer.setAttribute('role', 'button');
        videoContainer.setAttribute('aria-label', 'Воспроизвести видео');
    });
</script>
</div>