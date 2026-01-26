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
    console.log('test666');

    function restructureForm() {
        const parentContainer = document.querySelector('.pb0.pbreak');
        if (!parentContainer) return false;

        // Проверяем, была ли уже применена реструктуризация
        if (parentContainer.querySelector('.anketa-col')) {
            return true;
        }

        // Создаем контейнеры
        const col1 = document.createElement('div');
        col1.className = 'anketa-col anketa-col-1';

        const col2 = document.createElement('div');
        col2.className = 'anketa-col anketa-col-2';

        // Собираем элементы
        const calendarCol1Elements = Array.from(parentContainer.querySelectorAll('.calendar-col-1'));
        const calendarCol2Element = parentContainer.querySelector('.calendar-col-2');
        const captchaElement = parentContainer.querySelector('.captcha');
        const buttonElement = parentContainer.querySelector('.pbSubmit');

        // Перемещаем элементы
        calendarCol1Elements.forEach(element => {
            col1.appendChild(element);
        });

        if (calendarCol2Element) col2.appendChild(calendarCol2Element);
        if (captchaElement) col2.appendChild(captchaElement);
        if (buttonElement) col2.appendChild(buttonElement);

        // Очищаем и добавляем новые контейнеры
        parentContainer.innerHTML = '';
        parentContainer.appendChild(col1);
        parentContainer.appendChild(col2);

        console.log('Форма реструктурирована');
        return true;
    }

    // Используем MutationObserver для отслеживания появления элемента
    const observer = new MutationObserver((mutations, obs) => {
        if (document.querySelector('.pb0.pbreak')) {
            restructureForm();
            // Можно отключить observer после выполнения
            // obs.disconnect();
        }
    });

    // Начинаем наблюдение
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });

    // Также проверяем сразу на случай, если элемент уже загружен
    if (document.querySelector('.pb0.pbreak')) {
        restructureForm();
    }

    // Функция для замены input на textarea в конкретном блоке
    function convertInputToTextarea() {
        // Находим контейнер с id "field_1-6"
        const fieldContainer = document.getElementById('field_1-6');

        if (!fieldContainer) {
            console.error('Контейнер с id "field_1-6" не найден');
            return;
        }

        // Находим input внутри .dfield
        const input = fieldContainer.querySelector('.dfield input[type="text"]');

        if (!input) {
            console.error('Input не найден внутри .dfield');
            return;
        }

        // Создаем textarea элемент
        const textarea = document.createElement('textarea');

        // Копируем основные атрибуты
        textarea.id = input.id;
        textarea.name = input.name;
        textarea.className = input.className;
        textarea.value = input.value;
        textarea.placeholder = input.placeholder;

        // Копируем все атрибуты кроме type
        Array.from(input.attributes).forEach(attr => {
            if (attr.name !== 'type' && attr.name !== 'value') {
                textarea.setAttribute(attr.name, attr.value);
            }
        });

        // Устанавливаем дополнительные атрибуты для textarea
        textarea.setAttribute('rows', '4'); // Высота textarea
        textarea.classList.add('textarea-field'); // Добавляем класс для стилизации

        // Заменяем input на textarea
        input.parentNode.replaceChild(textarea, input);

        // Обновляем label (если он привязан к id)
        const label = fieldContainer.querySelector('label[for="' + input.id + '"]');
        if (label) {
            // У label уже установлен for на тот же id, поэтому ничего менять не нужно
            console.log('Label обновлен автоматически');
        }

        console.log('Input успешно заменен на textarea');
        return textarea;
    }

    // Запуск функции
    convertInputToTextarea();
</script>
<?php
get_footer();
