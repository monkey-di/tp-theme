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

        // Функция для оборачивания availableslot в slots-content
        function wrapAvailableSlots() {
            // Ищем все блоки .slots
            const slotsBlocks = document.querySelectorAll('.slots');

            slotsBlocks.forEach(slotsBlock => {
                // Проверяем, не обернуты ли уже слоты
                if (!slotsBlock.querySelector('.slots-content')) {
                    // Находим все .availableslot внутри текущего .slots
                    const availableSlots = slotsBlock.querySelectorAll('.availableslot');

                    if (availableSlots.length > 0) {
                        // Создаем контейнер .slots-content
                        const slotsContent = document.createElement('div');
                        slotsContent.className = 'slots-content';

                        // Находим элемент после которого нужно вставить .slots-content
                        // Это будет либо <br>, либо <span>, если <br> нет
                        let insertAfterElement = slotsBlock.querySelector('br');
                        if (!insertAfterElement) {
                            insertAfterElement = slotsBlock.querySelector('span');
                        }

                        // Если нашли элемент, после которого нужно вставить
                        if (insertAfterElement) {
                            // Вставляем slots-content после найденного элемента
                            insertAfterElement.parentNode.insertBefore(slotsContent, insertAfterElement.nextSibling);
                        } else {
                            // Если не нашли, вставляем в начало
                            slotsBlock.insertBefore(slotsContent, slotsBlock.firstChild);
                        }

                        // Перемещаем все .availableslot в slotsContent
                        availableSlots.forEach(slot => {
                            slotsContent.appendChild(slot);
                        });

                        console.log('.availableslot обернуты в .slots-content');
                    }
                }
            });

            return slotsBlocks.length > 0;
        }

        // Функция для добавления элементов в .slotsCalendar
        function decorateSlotsCalendar() {
            // Ищем все блоки .slotsCalendar
            const calendarBlocks = document.querySelectorAll('.slotsCalendar');

            calendarBlocks.forEach(block => {
                // Проверяем, не добавлен ли уже closer
                if (!block.querySelector('.closer')) {
                    // Создаем closer
                    const closer = document.createElement('div');
                    closer.className = 'closer';
                    closer.innerHTML = '';

                    // Добавляем closer в начало блока
                    block.insertBefore(closer, block.firstChild);

                    console.log('Closer добавлен в .slotsCalendar');

                    // Можно добавить обработчик клика на closer
                    closer.addEventListener('click', function(e) {
                        e.stopPropagation();
                        console.log('Клик по closer');
                        // Добавьте здесь свою логику закрытия
                        // Например: block.style.display = 'none';
                    });
                }

                // Проверяем, не добавлена ли уже кнопка
                if (!block.querySelector('.select-button')) {
                    // Создаем блок с кнопкой
                    const selectButton = document.createElement('div');
                    selectButton.className = 'select-button';

                    // Создаем span с текстом
                    const span = document.createElement('span');
                    span.textContent = 'Выбрать';

                    // Добавляем span в блок
                    selectButton.appendChild(span);

                    // Добавляем блок в конец .slotsCalendar
                    block.appendChild(selectButton);

                    console.log('Кнопка "Выбрать" добавлена в .slotsCalendar');

                    // Можно добавить обработчик клика на кнопку
                    selectButton.addEventListener('click', function(e) {
                        e.stopPropagation();
                        console.log('Клик по кнопке "Выбрать"');
                        // Добавьте здесь свою логику
                    });
                }
            });

            return calendarBlocks.length > 0;
        }

        // наблюдатель за изменениями DOM
        const observer = new MutationObserver(function(mutations) {
            let changesMade = false;

            // Проверяем, нужно ли реструктурировать форму
            if (document.querySelector('.pb0.pbreak') && !document.querySelector('.pb0.pbreak .anketa-col')) {
                if (restructureForm()) changesMade = true;
            }

            // Проверка на появление элементов
            mutations.forEach(function(mutation) {
                // Проверяем добавленные ноды
                if (mutation.addedNodes && mutation.addedNodes.length > 0) {
                    for (let node of mutation.addedNodes) {
                        // Проверяем, является ли узел или содержит ли .slotsCalendar
                        if ((node.nodeType === 1 && node.classList && node.classList.contains('slotsCalendar')) ||
                            (node.querySelector && node.querySelector('.slotsCalendar'))) {
                            // Даем время на полную загрузку/рендеринг
                            setTimeout(() => {
                                decorateSlotsCalendar();
                                wrapAvailableSlots();
                            }, 100);
                            changesMade = true;
                            break;
                        }

                        // Проверяем, является ли узел или содержит ли .slots
                        if ((node.nodeType === 1 && node.classList && node.classList.contains('slots')) ||
                            (node.querySelector && node.querySelector('.slots'))) {
                            setTimeout(() => wrapAvailableSlots(), 100);
                            changesMade = true;
                        }
                    }
                }

                // Проверяем изменения в поддереве
                if (mutation.type === 'childList' && mutation.target) {
                    // Проверяем, появился ли .slotsCalendar внутри измененного элемента
                    if (mutation.target.querySelector && mutation.target.querySelector('.slotsCalendar')) {
                        setTimeout(() => {
                            decorateSlotsCalendar();
                            wrapAvailableSlots();
                        }, 50);
                        changesMade = true;
                    }

                    // Проверяем, появился ли .slots внутри измененного элемента
                    if (mutation.target.querySelector && mutation.target.querySelector('.slots')) {
                        setTimeout(() => wrapAvailableSlots(), 50);
                        changesMade = true;
                    }

                    // Проверка для поля textarea
                    const target = mutation.target.querySelector('#field_1-6, #fieldname8_1');
                    if (target && document.getElementById('fieldname8_1')) {
                        setTimeout(() => replaceInputWithTextarea(), 50);
                        changesMade = true;
                    }
                }
            });

            // Также запускаем проверку для уже существующих элементов
            if (!changesMade) {
                setTimeout(() => {
                    decorateSlotsCalendar();
                    wrapAvailableSlots();
                    replaceInputWithTextarea();
                }, 100);
            }
        });

        // Старт наблюдения
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });

        // Начальная проверка при загрузке страницы
        function initialCheck() {
            restructureForm();
            replaceInputWithTextarea();
            decorateSlotsCalendar();
            wrapAvailableSlots();
        }

        // Запускаем начальную проверку
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initialCheck);
        } else {
            initialCheck();
        }
    </script>
<?php
get_footer();
