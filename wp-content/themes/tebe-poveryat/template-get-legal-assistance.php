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
    function restructureForm() {
        const parentContainer = document.querySelector('.pb0.pbreak');
        if (!parentContainer) return false;

        // Проверка на новую структуру
        if (parentContainer.querySelector('.anketa-col')) {
            return true;
        }

        // контейнеры
        const col1 = document.createElement('div');
        col1.className = 'anketa-col anketa-col-1';

        const col2 = document.createElement('div');
        col2.className = 'anketa-col anketa-col-2';

        // сбор элементов контейнера
        const calendarCol1Elements = Array.from(parentContainer.querySelectorAll('.calendar-col-1'));
        const calendarCol2Element = parentContainer.querySelector('.calendar-col-2');
        const captchaElement = parentContainer.querySelector('.captcha');
        const buttonElement = parentContainer.querySelector('.pbSubmit');

        // Перемещение элементов
        calendarCol1Elements.forEach(element => {
            col1.appendChild(element);
        });

        if (calendarCol2Element) col2.appendChild(calendarCol2Element);
        if (captchaElement) col2.appendChild(captchaElement);
        if (buttonElement) col2.appendChild(buttonElement);

        // очистка и добавление контейнеров
        parentContainer.innerHTML = '';
        parentContainer.appendChild(col1);
        parentContainer.appendChild(col2);

        console.log('Форма реструктурирована');
        return true;
    }

    // Функция для замены input на textarea
    function replaceInputWithTextarea() {
        const input = document.getElementById('fieldname8_1');

        if (input && input.tagName === 'INPUT' && input.type === 'text') {
            // Создание textarea
            const textarea = document.createElement('textarea');

            // Копия атрибутов
            const attrs = ['id', 'name', 'class', 'placeholder', 'value',
                'disabled', 'readonly', 'required', 'maxlength',
                'autocomplete', 'tabindex', 'title'];

            attrs.forEach(attr => {
                if (attr === 'value') {
                    textarea.value = input.value;
                } else if (attr === 'class') {
                    textarea.className = input.className;
                } else if (input.hasAttribute(attr)) {
                    textarea.setAttribute(attr, input.getAttribute(attr));
                }
            });

            // Добавить атрибуты для textarea
            textarea.setAttribute('rows', '4');
            textarea.style.minHeight = '100px';
            textarea.style.resize = 'vertical';

            // Замена элемента
            input.parentNode.replaceChild(textarea, input);
            console.log('Input заменен на textarea');
            return true;
        }

        return false;
    }

    // наблюдатель за изменениями DOM
    const observer = new MutationObserver(function(mutations) {
        // Проверяем, нужно ли реструктурировать форму
        if (document.querySelector('.pb0.pbreak') && !document.querySelector('.pb0.pbreak .anketa-col')) {
            restructureForm();
        }

        // Проверка, появился инпут для замены на textarea
        mutations.forEach(function(mutation) {
            if (mutation.addedNodes && mutation.addedNodes.length > 0) {
                // появился элемент
                for (let node of mutation.addedNodes) {
                    // Проверка узла
                    if (node.id === 'field_1-6') {
                        //  Время на загрузку контента
                        setTimeout(() => replaceInputWithTextarea(), 100);
                        return;
                    }

                    // Проверка внутри узла
                    if (node.querySelector) {
                        const target = node.querySelector('#field_1-6, #fieldname8_1');
                        if (target) {
                            setTimeout(() => replaceInputWithTextarea(), 100);
                            return;
                        }
                    }
                }
            }

            // проверка при изменениях внутри существующих элементов
            if (mutation.type === 'childList' && mutation.target) {
                const target = mutation.target.querySelector('#field_1-6, #fieldname8_1');
                if (target && document.getElementById('fieldname8_1')) {
                    setTimeout(() => replaceInputWithTextarea(), 50);
                }
            }
        });
    });

    // Старт наблюдения
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });

    // Проверка на случай, если элементы уже загружены
    if (document.querySelector('.pb0.pbreak')) {
        restructureForm();
    }

    if (document.getElementById('fieldname8_1')) {
        replaceInputWithTextarea();
    } else {
        console.log('Ожидание появления поля...');
    }
</script>
<?php
get_footer();
