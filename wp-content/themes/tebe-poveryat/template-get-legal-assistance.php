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
    console.log('test111');
    document.addEventListener('DOMContentLoaded', function() {
        // Находим контейнер с полями формы
        const fieldList = document.getElementById('fieldlist_1');
        const pb0 = fieldList.querySelector('.pb0');

        if (!pb0) return;

        // Создаем первую колонку для полей формы
        const anketaCol1 = document.createElement('div');
        anketaCol1.className = 'anketa-col-1 anketa-col';

        // Создаем вторую колонку для календаря, капчи и кнопки
        const anketaCol2 = document.createElement('div');
        anketaCol2.className = 'anketa-col-2 anketa-col';

        // Собираем все calendar-col-1 в первую колонку
        const calendarCol1Fields = pb0.querySelectorAll('.calendar-col-1');
        calendarCol1Fields.forEach(field => {
            anketaCol1.appendChild(field.cloneNode(true));
            field.remove(); // Удаляем оригинальные элементы
        });

        // Собираем calendar-col-2 во вторую колонку
        const calendarCol2 = pb0.querySelector('.calendar-col-2');
        if (calendarCol2) {
            anketaCol2.appendChild(calendarCol2.cloneNode(true));
            calendarCol2.remove();
        }

        // Собираем капчу во вторую колонку
        const captcha = pb0.querySelector('.captcha');
        if (captcha) {
            anketaCol2.appendChild(captcha.cloneNode(true));
            captcha.remove();
        }

        // Собираем кнопку во вторую колонку
        const submitButton = pb0.querySelector('.pbSubmit');
        if (submitButton) {
            anketaCol2.appendChild(submitButton.cloneNode(true));
            submitButton.remove();
        }

        // Очищаем pb0 и добавляем новые колонки
        pb0.innerHTML = '';
        pb0.appendChild(anketaCol1);
        pb0.appendChild(anketaCol2);
        console.log('test');
    });
</script>
<?php
get_footer();
