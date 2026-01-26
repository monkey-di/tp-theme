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
    console.log('test444');
    document.addEventListener('DOMContentLoaded', function() {
        // Находим родительский контейнер
        const parentContainer = document.querySelector('.pb0.pbreak');
        if (!parentContainer) {
            console.error('Родительский контейнер не найден');
        } else {
            // Создаем первый новый контейнер
            const col1Container = document.createElement('div');
            col1Container.className = 'anketa-col anketa-col-1';

            // Создаем второй новый контейнер
            const col2Container = document.createElement('div');
            col2Container.className = 'anketa-col anketa-col-2';

            // Собираем все элементы с классом calendar-col-1
            const calendarCol1Elements = Array.from(parentContainer.querySelectorAll('.calendar-col-1'));

            // Собираем элементы для второго контейнера
            const calendarCol2Element = parentContainer.querySelector('.calendar-col-2');
            const captchaElement = parentContainer.querySelector('.captcha');
            const buttonElement = parentContainer.querySelector('.pbSubmit');

            // Перемещаем элементы calendar-col-1 в первый контейнер
            calendarCol1Elements.forEach(element => {
                col1Container.appendChild(element);
            });

            // Перемещаем элементы во второй контейнер, если они существуют
            if (calendarCol2Element) col2Container.appendChild(calendarCol2Element);
            if (captchaElement) col2Container.appendChild(captchaElement);
            if (buttonElement) col2Container.appendChild(buttonElement);

            // Очищаем родительский контейнер
            parentContainer.innerHTML = '';

            // Добавляем новые контейнеры в родительский элемент
            parentContainer.appendChild(col1Container);
            parentContainer.appendChild(col2Container);
        }
    });
</script>
<?php
get_footer();
