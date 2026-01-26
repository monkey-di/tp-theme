<?php
/*
    Template Name: Get Legal Assistance Page
    Template Post Type: page
    Post Type: page
 */

get_header();
?>
<?php
if ( tp_is_english() ) {
    $pagehead_title = get_field('headpage-title_en'); // ACF заголовок
    $pagehead_description = get_field('headpage-description_en');  // ACF подпись
} else{
    $pagehead_title = get_field('headpage-title'); // ACF заголовок
    $pagehead_description = get_field('headpage-description');  // ACF подпись
}
$pagehead_bg_color = get_field('headpage-background-color');  // ACF Цвет фона
$pagehead_bg_image = get_field('headpage-background');  // ACF фоновое изображение
$pagehead_pic = get_field('headpage-pic');  // ACF картинка
?>
    <style>
        .page-template-template-help .header{
            background-color: <?php echo $pagehead_bg_color; ?>
        }
    </style>
    <main class="site-main">
        <div class="page-head z-20 bg-surface relative [border-radius:0_0_50%_50%_/_0_0_40px_40px] lg:[border-radius:0_0_50%_50%_/_0_0_80px_80px]" style="background:<?=$pagehead_bg_color?>">
            <div class="page-head-wrapper container mx-auto" style="background-image:url(<?=$pagehead_bg_image?>)">
                <div class="page-head-col">
                    <h1 class="page-head-title">
                        <?=$pagehead_title?>
                    </h1>
                    <div class="page-head-description text-p">
                        <?=$pagehead_description?>
                    </div>
                </div>
                <div class="page-head-col">
                    <div class="page-head-picture">
                        <img src="<?=$pagehead_pic?>">
                    </div>
                </div>
            </div>
        </div>
        <?php
        the_content();
        ?>
    </main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pb0 = document.querySelector('.pb0');
        if (!pb0) return;

        // контейнеры для колонок
        const formFieldsContainer = document.createElement('div');
        formFieldsContainer.className = 'form-fields-container';

        const calendarButtonContainer = document.createElement('div');
        calendarButtonContainer.className = 'calendar-button-container';

        // первые 6 полей
        const fieldsGrid = document.createElement('div');
        fieldsGrid.className = 'fields-grid';

        // Сбор элементов
        const allFields = Array.from(pb0.children);
        const messageField = document.getElementById('field_1-6');
        const calendarField = document.getElementById('field_1-7');
        const captcha = document.querySelector('.captcha');
        const submitButton = document.querySelector('.pbSubmit');

        // первые 6 полей в сетку
        for (let i = 0; i < 6; i++) {
            if (allFields[i] && allFields[i].classList.contains('fields')) {
                fieldsGrid.appendChild(allFields[i].cloneNode(true));
            }
        }

        // Сетка полей и поле сообщения в первую колонку
        formFieldsContainer.appendChild(fieldsGrid);
        if (messageField) {
            formFieldsContainer.appendChild(messageField.cloneNode(true));
        }

        // календарь и кнопку во вторую колонку
        if (calendarField) {
            calendarButtonContainer.appendChild(calendarField.cloneNode(true));
        }
        if (submitButton) {
            calendarButtonContainer.appendChild(submitButton.cloneNode(true));
        }

        // исходный контейнер и добавляем новые колонки
        pb0.innerHTML = '';
        pb0.appendChild(formFieldsContainer);
        pb0.appendChild(calendarButtonContainer);

        // captcha внизу
        if (captcha) {
            pb0.appendChild(captcha.cloneNode(true));
        }
    });
</script>
<?php
get_footer();
