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
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const videoContainer = document.getElementById('videoContainer');
        const playButton = document.getElementById('playButton');
        const videoPlayer = document.getElementById('videoPlayer');
        const videoThumbnail = document.getElementById('videoThumbnail');

        // Источник видео
        const videoUrl = '<?php echo $file; ?>';

        // Обработчик клика по кнопке воспроизведения
        playButton.addEventListener('click', function() {
            // Загружаем видео в iframe
            videoPlayer.src = videoUrl;

            // Класс для переключения видимости
            videoContainer.classList.add('video-started');

            // Фокус на видео для управления с клавиатуры
            videoPlayer.focus();
        });

        // Запуск при клике на превью
        videoThumbnail.addEventListener('click', function() {
            playButton.click();
        });

        // Зпуск при нажатии пробела или Enter на контейнере
        videoContainer.addEventListener('keydown', function(e) {
            if (e.code === 'Space' || e.code === 'Enter') {
                e.preventDefault();
                playButton.click();
            }
        });

        // tabindex для доступности
        videoContainer.setAttribute('tabindex', '0');
        videoContainer.setAttribute('role', 'button');
        videoContainer.setAttribute('aria-label', 'Воспроизвести видео');
    });
</script>
<style>
    .video-container {
        position: relative;
        max-width: 1170px;
        margin: 0 auto;
        cursor: pointer;
    }

    .video-thumbnail {
        width: 100%;
        height: auto;
        display: block;
        transition: opacity 0.3s;
    }

    .play-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80px;
        height: 80px;
        background: rgba(254, 241, 236, 0.3);
        border-radius: 50%;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .play-button:hover {
        background: rgba(255, 0, 0, 1);
        transform: translate(-50%, -50%) scale(1.1);
    }

    .play-button::after {
        content: "";
        display: block;
        width: 0;
        height: 0;
        border-left: 20px solid white;
        border-top: 12px solid transparent;
        border-bottom: 12px solid transparent;
        margin-left: 5px;
    }

    .video-iframe {
        width: 100%;
        height: 450px;
        border: none;
        display: none;
    }

    .video-placeholder {
        position: relative;
    }
    .video-placeholder img{
        border-radius: 20px;
    }
    /* Скрыть элементы после запуска видео */
    .video-started .video-placeholder {
        display: none;
    }

    .video-started .video-iframe {
        display: block;
    }
</style>