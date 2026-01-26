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

        // Функция для оборачивания availableslot и htmlUsed в slots-content
        function wrapSlotsContent() {
            // Ищем все блоки .slots
            const slotsBlocks = document.querySelectorAll('.slots:not(.processed)');

            slotsBlocks.forEach(slotsBlock => {
                // Помечаем блок как обработанный
                slotsBlock.classList.add('processed');

                // Находим все .availableslot и .htmlUsed внутри текущего .slots
                const slotsToWrap = slotsBlock.querySelectorAll('.availableslot, .htmlUsed');

                if (slotsToWrap.length > 0) {
                    // Создаем контейнер .slots-content
                    const slotsContent = document.createElement('div');
                    slotsContent.className = 'slots-content';

                    // Сначала собираем все элементы в DocumentFragment
                    const fragment = document.createDocumentFragment();
                    slotsToWrap.forEach(slot => {
                        fragment.appendChild(slot.cloneNode(true));
                    });

                    // Добавляем все элементы в slots-content
                    slotsContent.appendChild(fragment);

                    // Находим элемент после которого нужно вставить .slots-content
                    let insertAfterElement = slotsBlock.querySelector('br');
                    if (!insertAfterElement) {
                        insertAfterElement = slotsBlock.querySelector('span');
                    }

                    // Временное отключение анимаций
                    const originalTransition = slotsBlock.style.transition;
                    slotsBlock.style.transition = 'none';

                    // Если нашли элемент, после которого нужно вставить
                    if (insertAfterElement) {
                        // Вставляем slots-content после найденного элемента
                        insertAfterElement.parentNode.insertBefore(slotsContent, insertAfterElement.nextSibling);
                    } else {
                        // Если не нашли, вставляем в начало
                        slotsBlock.insertBefore(slotsContent, slotsBlock.firstChild);
                    }

                    // Удаляем оригинальные элементы
                    slotsToWrap.forEach(slot => slot.remove());

                    // Восстанавливаем transition
                    requestAnimationFrame(() => {
                        slotsBlock.style.transition = originalTransition;
                    });

                    console.log('.availableslot и .htmlUsed обернуты в .slots-content');
                }
            });

            return slotsBlocks.length > 0;
        }

        // Функция для добавления элементов в .slotsCalendar
        function decorateSlotsCalendar() {
            // Ищем все блоки .slotsCalendar
            const calendarBlocks = document.querySelectorAll('.slotsCalendar:not(.decorated)');

            calendarBlocks.forEach(block => {
                // Помечаем блок как обработанный
                block.classList.add('decorated');

                // Временное отключение анимаций
                const originalTransition = block.style.transition;
                block.style.transition = 'none';

                // Создаем closer
                const closer = document.createElement('div');
                closer.className = 'closer';
                closer.innerHTML = '&times;'; // добавляем крестик

                // Создаем блок с кнопкой
                const selectButton = document.createElement('div');
                selectButton.className = 'select-button';
                const span = document.createElement('span');
                span.textContent = 'Выбрать';
                selectButton.appendChild(span);

                // Добавляем оба элемента в DocumentFragment
                const fragment = document.createDocumentFragment();
                fragment.appendChild(closer);
                fragment.appendChild(selectButton);

                // Добавляем элементы в блок
                block.insertBefore(closer, block.firstChild);
                block.appendChild(selectButton);

                // Восстанавливаем transition
                requestAnimationFrame(() => {
                    block.style.transition = originalTransition;
                });

                console.log('Элементы добавлены в .slotsCalendar');

                // Обработчики событий
                closer.addEventListener('click', function(e) {
                    e.stopPropagation();
                    console.log('Клик по closer');
                });

                selectButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    console.log('Клик по кнопке "Выбрать"');
                });
            });

            return calendarBlocks.length > 0;
        }

        // Функция для добавления календарной легенды в блок .ui-widget
        function addCalendarLegend() {
            // Ищем блок .ui-widget
            const uiWidgets = document.querySelectorAll('.ui-widget:not(.legend-added)');

            uiWidgets.forEach(uiWidget => {
                // Помечаем блок как обработанный
                uiWidget.classList.add('legend-added');

                // Создаем контейнер для легенды
                const calendarLegend = document.createElement('div');
                calendarLegend.className = 'calendar-legend';

                // Создаем три элемента легенды
                const legendItems = [
                    { markerClass: '', text: 'Есть свободное время' },
                    { markerClass: '', text: 'Нет свободного времени' },
                    { markerClass: '', text: 'Сегодня' }
                ];

                // Создаем элементы легенды
                legendItems.forEach(item => {
                    const legendItem = document.createElement('div');
                    legendItem.className = 'calendar-legend-item';

                    // Маркер
                    const marker = document.createElement('div');
                    marker.className = 'calendar-legend-item-marker';

                    // Линия (разделитель) с символом "—"
                    const line = document.createElement('div');
                    line.className = 'calendar-legend-item-line';
                    line.innerHTML = '—';

                    // Текст
                    const text = document.createElement('div');
                    text.className = 'calendar-legend-item-text';
                    text.textContent = item.text;

                    // Собираем элемент
                    legendItem.appendChild(marker);
                    legendItem.appendChild(document.createTextNode(' '));
                    legendItem.appendChild(line);
                    legendItem.appendChild(document.createTextNode(' '));
                    legendItem.appendChild(text);

                    // Добавляем элемент в легенду
                    calendarLegend.appendChild(legendItem);
                });

                // Добавляем легенду в .ui-widget
                uiWidget.appendChild(calendarLegend);
                console.log('Календарная легенда добавлена в .ui-widget');

                // Добавляем CSS стили для легенды (если их еще нет)
                if (!document.querySelector('style[data-calendar-legend]')) {
                    const style = document.createElement('style');
                    style.setAttribute('data-calendar-legend', 'true');
                    style.textContent = `
                    .calendar-legend {
                        margin-top: 20px;
                        padding: 15px;
                        background: #f9f9f9;
                        border-radius: 8px;
                        border: 1px solid #e0e0e0;
                        display: flex;
                        flex-wrap: wrap;
                        gap: 15px;
                        justify-content: center;
                        opacity: 0;
                        animation: fadeIn 0.3s ease forwards;
                    }

                    .calendar-legend-item {
                        display: flex;
                        align-items: center;
                        gap: 8px;
                        font-size: 14px;
                        color: #333;
                    }

                    .calendar-legend-item-marker {
                        width: 12px;
                        height: 12px;
                        border-radius: 50%;
                        background: #4CAF50; /* Зеленый для свободного времени */
                    }

                    .calendar-legend-item:nth-child(1) .calendar-legend-item-marker {
                        background: #4CAF50; /* Свободное время */
                    }

                    .calendar-legend-item:nth-child(2) .calendar-legend-item-marker {
                        background: #F44336; /* Нет свободного времени */
                    }

                    .calendar-legend-item:nth-child(3) .calendar-legend-item-marker {
                        background: #2196F3; /* Сегодня */
                    }

                    .calendar-legend-item-line {
                        color: #999;
                        font-size: 16px;
                        line-height: 1;
                    }

                    .calendar-legend-item-text {
                        white-space: nowrap;
                    }

                    @keyframes fadeIn {
                        from { opacity: 0; transform: translateY(10px); }
                        to { opacity: 1; transform: translateY(0); }
                    }

                    /* Анимации для плавных изменений */
                    .slotsCalendar, .slots, .slots-content {
                        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                    }

                    .closer, .select-button {
                        transition: all 0.2s ease;
                    }
                `;
                    document.head.appendChild(style);
                }
            });

            return uiWidgets.length > 0;
        }

        // Оптимизированный наблюдатель за изменениями DOM
        const observer = new MutationObserver(function(mutations) {
            let needsCalendarLegend = false;
            let needsSlotsCalendar = false;
            let needsSlotsContent = false;
            let needsTextarea = false;

            // Быстрая проверка мутаций
            mutations.forEach(function(mutation) {
                // Проверяем добавленные ноды
                if (mutation.addedNodes && mutation.addedNodes.length > 0) {
                    for (let node of mutation.addedNodes) {
                        if (node.nodeType === 1) {
                            // Проверяем классы напрямую
                            if (node.classList && (
                                node.classList.contains('ui-widget') ||
                                node.querySelector?.('.ui-widget')
                            )) {
                                needsCalendarLegend = true;
                            }

                            if (node.classList && (
                                node.classList.contains('slotsCalendar') ||
                                node.querySelector?.('.slotsCalendar')
                            )) {
                                needsSlotsCalendar = true;
                            }

                            if (node.classList && (
                                node.classList.contains('slots') ||
                                node.querySelector?.('.slots')
                            )) {
                                needsSlotsContent = true;
                            }
                        }
                    }
                }
            });

            // Отложенное выполнение с requestAnimationFrame для синхронизации с рендерингом
            requestAnimationFrame(() => {
                if (needsCalendarLegend) addCalendarLegend();
                if (needsSlotsCalendar) {
                    decorateSlotsCalendar();
                    wrapSlotsContent();
                }
                if (needsSlotsContent) wrapSlotsContent();

                // Проверка для реструктуризации формы
                if (document.querySelector('.pb0.pbreak') && !document.querySelector('.pb0.pbreak .anketa-col')) {
                    requestAnimationFrame(() => restructureForm());
                }

                // Проверка для замены textarea
                if (document.getElementById('fieldname8_1') &&
                    document.getElementById('fieldname8_1').tagName === 'INPUT') {
                    requestAnimationFrame(() => replaceInputWithTextarea());
                }
            });
        });

        // Старт наблюдения
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });

        // Начальная проверка при загрузке страницы
        function initialCheck() {
            // Используем requestAnimationFrame для плавного старта
            requestAnimationFrame(() => {
                restructureForm();
                replaceInputWithTextarea();
                decorateSlotsCalendar();
                wrapSlotsContent();
                addCalendarLegend();
            });
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
