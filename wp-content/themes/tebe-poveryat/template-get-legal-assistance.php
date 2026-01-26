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
        let isProcessing = false;
        let originalSubmitButton = null;
        let clonedSubmitButton = null;

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
            const buttonElement = document.querySelector('.cp_subbtn, #cp_subbtn_1, .pbSubmit');

            // Перемещение элементов
            calendarCol1Elements.forEach(element => {
                col1.appendChild(element);
            });

            if (calendarCol2Element) col2.appendChild(calendarCol2Element);
            if (captchaElement) col2.appendChild(captchaElement);
            if (buttonElement && buttonElement.parentNode !== col2) {
                col2.appendChild(buttonElement);
            }

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
                textarea.style.minHeight = '217px';
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
            const slotsBlocks = document.querySelectorAll('.slots');

            slotsBlocks.forEach(slotsBlock => {
                // Проверяем, не обернуты ли уже слоты
                if (!slotsBlock.querySelector('.slots-content')) {
                    // Находим все .availableslot и .htmlUsed внутри текущего .slots
                    const slotsToWrap = slotsBlock.querySelectorAll('.availableslot, .htmlUsed');

                    if (slotsToWrap.length > 0) {
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

                        // Перемещаем все найденные элементы в slotsContent
                        slotsToWrap.forEach(slot => {
                            // Проверяем, что элемент еще не находится внутри другого slots-content
                            // (на случай, если уже обернуты в другом месте)
                            if (!slot.closest('.slots-content')) {
                                slotsContent.appendChild(slot);
                            }
                        });

                        console.log('.availableslot и .htmlUsed обернуты в .slots-content');
                    }
                } else {
                    // Если slots-content уже существует, проверяем, не появились ли новые элементы вне его
                    const slotsContent = slotsBlock.querySelector('.slots-content');
                    const slotsToWrap = slotsBlock.querySelectorAll('.availableslot:not(.slots-content .availableslot), .htmlUsed:not(.slots-content .htmlUsed)');

                    if (slotsToWrap.length > 0) {
                        slotsToWrap.forEach(slot => {
                            if (!slot.closest('.slots-content')) {
                                slotsContent.appendChild(slot);
                                console.log('Новый слот добавлен в существующий .slots-content');
                            }
                        });
                    }
                }
            });

            return slotsBlocks.length > 0;
        }

        // Функция для поиска кнопки отправки
        function findSubmitButton() {
            // Пытаемся найти кнопку по разным селекторам
            return document.querySelector('.cp_subbtn') ||
                document.querySelector('#cp_subbtn_1') ||
                document.querySelector('.pbSubmit') ||
                document.querySelector('[class*="subbtn"]') ||
                document.querySelector('[id*="subbtn"]');
        }

        // Функция для сохранения оригинальной кнопки
        function saveOriginalButton() {
            originalSubmitButton = findSubmitButton();
            if (originalSubmitButton) {
                // Сохраняем оригинальную кнопку в памяти
                console.log('Оригинальная кнопка сохранена:', originalSubmitButton);

                // Клонируем кнопку для использования в select-button
                clonedSubmitButton = originalSubmitButton.cloneNode(true);
                clonedSubmitButton.classList.add('cloned-cp-subbtn');

                // Сохраняем оригинальные обработчики событий
                const originalOnClick = originalSubmitButton.onclick;
                if (originalOnClick) {
                    clonedSubmitButton.onclick = originalOnClick;
                }

                // Добавляем обработчик клика, который вызывает клик по оригинальной кнопке
                clonedSubmitButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log('Клик по клонированной кнопке');

                    if (originalSubmitButton && originalSubmitButton.isConnected) {
                        originalSubmitButton.click();
                    } else {
                        console.log('Оригинальная кнопка не найдена, пытаемся найти заново');
                        const newOriginalButton = findSubmitButton();
                        if (newOriginalButton) {
                            originalSubmitButton = newOriginalButton;
                            originalSubmitButton.click();
                        }
                    }
                });

                // Настраиваем стили клонированной кнопки
                clonedSubmitButton.style.display = 'block';
                clonedSubmitButton.style.marginTop = '10px';
                clonedSubmitButton.style.marginLeft = 'auto';
                clonedSubmitButton.style.marginRight = 'auto';
                clonedSubmitButton.style.width = 'fit-content';

                console.log('Клонированная кнопка создана');
            }
            return originalSubmitButton;
        }

        // Функция для создания или обновления блока .select-button
        function createOrUpdateSelectButton() {
            if (isProcessing) return false;
            isProcessing = true;

            try {
                const slotsCalendar = document.querySelector('.slotsCalendar');
                if (!slotsCalendar) {
                    console.log('Блок .slotsCalendar не найден');
                    return false;
                }

                // Проверяем, есть ли уже блок .select-button
                let selectButton = slotsCalendar.querySelector('.select-button');

                if (!selectButton) {
                    // Создаем блок .select-button
                    selectButton = document.createElement('div');
                    selectButton.className = 'select-button';

                    // Создаем span с текстом "Выбрать"
                    const chooseSpan = document.createElement('span');
                    chooseSpan.textContent = 'Выбрать';

                    // Обработчик для span "Выбрать"
                    chooseSpan.addEventListener('click', function(e) {
                        e.stopPropagation();
                        console.log('Клик по span "Выбрать"');

                        // Находим и скрываем блок .slotsCalendarfieldname1_1
                        const targetBlock = document.querySelector('.slotsCalendarfieldname1_1');
                        if (targetBlock) {
                            targetBlock.style.display = 'none';
                            console.log('Блок .slotsCalendarfieldname1_1 скрыт через span');
                        }
                    });

                    // Добавляем span в блок
                    selectButton.appendChild(chooseSpan);

                    // Добавляем перенос строки
                    selectButton.appendChild(document.createElement('br'));

                    console.log('Блок .select-button создан');

                    // Добавляем блок .select-button в .slotsCalendar
                    slotsCalendar.appendChild(selectButton);
                }

                // Проверяем и обновляем кнопку отправки
                updateSubmitButtonInSelectButton(selectButton);

                return true;
            } finally {
                isProcessing = false;
            }
        }

        // Функция для обновления кнопки отправки в .select-button
        function updateSubmitButtonInSelectButton(selectButton) {
            // Сохраняем оригинальную кнопку, если еще не сохранена
            if (!originalSubmitButton) {
                saveOriginalButton();
            }

            // Удаляем старую клонированную кнопку, если есть
            const oldClonedButton = selectButton.querySelector('.cloned-cp-subbtn, .cp_subbtn, #cp_subbtn_1, .pbSubmit');
            if (oldClonedButton) {
                oldClonedButton.remove();
            }

            // Проверяем, есть ли у нас клонированная кнопка
            if (clonedSubmitButton) {
                // Вставляем клонированную кнопку в .select-button
                selectButton.appendChild(clonedSubmitButton);
                console.log('Клонированная кнопка добавлена в .select-button');
            } else {
                // Пытаемся найти оригинальную кнопку и создать клон
                saveOriginalButton();
                if (clonedSubmitButton) {
                    selectButton.appendChild(clonedSubmitButton);
                    console.log('Клонированная кнопка создана и добавлена в .select-button');
                } else {
                    console.log('Не удалось создать клонированную кнопку');
                }
            }
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

                    // Обработчик клика на closer для скрытия .slotsCalendarfieldname1_1
                    closer.addEventListener('click', function(e) {
                        e.stopPropagation();
                        console.log('Клик по closer');

                        // Находим и скрываем блок .slotsCalendarfieldname1_1
                        const targetBlock = document.querySelector('.slotsCalendarfieldname1_1');
                        if (targetBlock) {
                            targetBlock.style.display = 'none';
                            console.log('Блок .slotsCalendarfieldname1_1 скрыт');
                        }
                    });
                }
            });

            // Создаем или обновляем блок .select-button
            createOrUpdateSelectButton();

            return calendarBlocks.length > 0;
        }

        // Функция для добавления календарной легенды в блок .ui-widget
        function addCalendarLegend() {
            // Ищем блок .ui-widget
            const uiWidgets = document.querySelectorAll('.ui-widget');

            uiWidgets.forEach(uiWidget => {
                // Проверяем, не добавлена ли уже легенда
                if (!uiWidget.querySelector('.calendar-legend')) {
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
                        line.innerHTML = '—'; // добавляем символ тире

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
                }
            });

            return uiWidgets.length > 0;
        }

        // Функция для защиты от частых вызовов (debounce)
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Дебаунсированная версия функции для обновления select-button
        const debouncedUpdateSelectButton = debounce(function() {
            createOrUpdateSelectButton();
        }, 300);

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
                        // Проверяем, является ли узел или содержит ли .ui-widget
                        if ((node.nodeType === 1 && node.classList && node.classList.contains('ui-widget')) ||
                            (node.querySelector && node.querySelector('.ui-widget'))) {
                            setTimeout(() => addCalendarLegend(), 100);
                            changesMade = true;
                        }

                        // Проверяем, является ли узел или содержит ли .slotsCalendar
                        if ((node.nodeType === 1 && node.classList && node.classList.contains('slotsCalendar')) ||
                            (node.querySelector && node.querySelector('.slotsCalendar'))) {
                            // Даем время на полную загрузку/рендеринг
                            setTimeout(() => {
                                decorateSlotsCalendar();
                                wrapSlotsContent();
                            }, 100);
                            changesMade = true;
                        }

                        // Проверяем, является ли узел или содержит ли .slots
                        if ((node.nodeType === 1 && node.classList && node.classList.contains('slots')) ||
                            (node.querySelector && node.querySelector('.slots'))) {
                            setTimeout(() => wrapSlotsContent(), 100);
                            changesMade = true;
                        }

                        // Проверяем, появилась ли кнопка отправки
                        if ((node.nodeType === 1 && node.classList &&
                                (node.classList.contains('cp_subbtn') || node.classList.contains('pbSubmit'))) ||
                            (node.querySelector &&
                                (node.querySelector('.cp_subbtn') || node.querySelector('#cp_subbtn_1') || node.querySelector('.pbSubmit')))) {
                            setTimeout(() => debouncedUpdateSelectButton(), 100);
                            changesMade = true;
                        }
                    }
                }

                // Проверяем изменения в поддереве
                if (mutation.type === 'childList' && mutation.target) {
                    // Проверяем, появился ли .ui-widget внутри измененного элемента
                    if (mutation.target.querySelector && mutation.target.querySelector('.ui-widget')) {
                        setTimeout(() => addCalendarLegend(), 50);
                        changesMade = true;
                    }

                    // Проверяем, появился ли .slotsCalendar внутри измененного элемента
                    if (mutation.target.querySelector && mutation.target.querySelector('.slotsCalendar')) {
                        setTimeout(() => {
                            decorateSlotsCalendar();
                            wrapSlotsContent();
                        }, 50);
                        changesMade = true;
                    }

                    // Проверяем, появился ли .slots внутри измененного элемента
                    if (mutation.target.querySelector && mutation.target.querySelector('.slots')) {
                        setTimeout(() => wrapSlotsContent(), 50);
                        changesMade = true;
                    }

                    // Проверяем, появились ли новые .availableslot или .htmlUsed
                    if (mutation.target.querySelector &&
                        (mutation.target.querySelector('.availableslot') || mutation.target.querySelector('.htmlUsed'))) {
                        // Если изменения произошли внутри .slots, но не внутри .slots-content
                        const inSlots = mutation.target.closest('.slots');
                        if (inSlots && !mutation.target.closest('.slots-content')) {
                            setTimeout(() => wrapSlotsContent(), 50);
                            changesMade = true;
                        }
                    }

                    // Проверка для поля textarea
                    const target = mutation.target.querySelector('#field_1-6, #fieldname8_1');
                    if (target && document.getElementById('fieldname8_1')) {
                        setTimeout(() => replaceInputWithTextarea(), 50);
                        changesMade = true;
                    }

                    // Проверка для кнопки отправки
                    if (mutation.target.querySelector &&
                        (mutation.target.querySelector('.cp_subbtn') ||
                            mutation.target.querySelector('#cp_subbtn_1') ||
                            mutation.target.querySelector('.pbSubmit') ||
                            mutation.target.querySelector('[class*="subbtn"]') ||
                            mutation.target.querySelector('[id*="subbtn"]'))) {
                        setTimeout(() => debouncedUpdateSelectButton(), 50);
                        changesMade = true;
                    }

                    // Проверяем, не был ли удален select-button
                    if (mutation.removedNodes && mutation.removedNodes.length > 0) {
                        for (let node of mutation.removedNodes) {
                            if (node.nodeType === 1 && node.classList && node.classList.contains('select-button')) {
                                setTimeout(() => debouncedUpdateSelectButton(), 100);
                                changesMade = true;
                            }
                        }
                    }
                }
            });

            // Также запускаем проверку для уже существующих элементов
            if (!changesMade) {
                setTimeout(() => {
                    addCalendarLegend();
                    decorateSlotsCalendar();
                    wrapSlotsContent();
                    replaceInputWithTextarea();
                    debouncedUpdateSelectButton();
                }, 100);
            }
        });

        // Отслеживаем клики по датам и временам для обновления кнопки
        document.addEventListener('click', function(e) {
            const target = e.target;

            // Проверяем, кликнули ли по дате в календаре
            if (target.closest('.ui-datepicker-calendar a') ||
                target.closest('.availableslot a') ||
                target.closest('.ui-state-default')) {
                console.log('Клик по дате/времени, обновляем select-button');
                setTimeout(() => debouncedUpdateSelectButton(), 300);
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
            wrapSlotsContent();
            addCalendarLegend();
            saveOriginalButton(); // Сохраняем оригинальную кнопку
            createOrUpdateSelectButton();
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
