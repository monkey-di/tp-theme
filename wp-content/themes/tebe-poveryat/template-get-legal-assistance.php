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
        // Объект для хранения выбранной даты и времени
        const selectedDateTime = {
            date: null,
            time: null,
            updateDisplay: function() {
                const displayBlock = document.getElementById('date-time-display');
                if (!displayBlock) return;

                // Форматируем дату
                let dateStr = this.date;
                if (!dateStr) {
                    const now = new Date();
                    dateStr = `${now.getDate().toString().padStart(2, '0')}.${(now.getMonth() + 1).toString().padStart(2, '0')}.${now.getFullYear()}`;
                }

                // Форматируем время
                const timeStr = this.time || 'не выбрано';

                displayBlock.innerHTML = `
                <div class="date-time-display-title">Выбранное время:</div>
                <div class="date-time-value">${dateStr} ${timeStr}</div>
            `;
            }
        };

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

        // Функция для добавления блока с выбранной датой и временем
        function addDateTimeDisplayBlock() {
            // Проверяем, не добавлен ли уже блок
            if (document.getElementById('date-time-display')) {
                return false;
            }

            // Ищем блок anketa-col-2
            const anketaCol2 = document.querySelector('.anketa-col-2');
            if (!anketaCol2) {
                return false;
            }

            // Создаем блок для отображения даты и времени
            const displayBlock = document.createElement('div');
            displayBlock.id = 'date-time-display';
            displayBlock.className = 'date-time-display';

            // Добавляем стили
            displayBlock.style.cssText = `
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            font-family: Arial, sans-serif;
        `;

            // Добавляем блок в начало anketa-col-2
            if (anketaCol2.firstChild) {
                anketaCol2.insertBefore(displayBlock, anketaCol2.firstChild);
            } else {
                anketaCol2.appendChild(displayBlock);
            }

            // Инициализируем отображение с текущей датой
            selectedDateTime.updateDisplay();

            console.log('Блок отображения даты и времени добавлен');
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

        // Функция для добавления инлайн стиля display:none для блока .slotsCalendarfieldname1_1
      /*  function addInitialHideStyle() {
            const targetBlock = document.querySelector('.slotsCalendarfieldname1_1');
            if (targetBlock && !targetBlock.hasAttribute('data-initial-hide')) {
                targetBlock.setAttribute('data-initial-hide', 'true');
                targetBlock.style.display = 'none';
                console.log('Блоку .slotsCalendarfieldname1_1 добавлен display:none');
            }
            return !!targetBlock;
        }*/

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

                    // Обработчик клика на кнопку "Выбрать" для скрытия .slotsCalendarfieldname1_1
                    selectButton.addEventListener('click', function(e) {
                        e.stopPropagation();
                        console.log('Клик по кнопке "Выбрать"');

                        // Находим и скрываем блок .slotsCalendarfieldname1_1
                        const targetBlock = document.querySelector('.slotsCalendarfieldname1_1');
                        if (targetBlock) {
                            targetBlock.style.display = 'none';
                            console.log('Блок .slotsCalendarfieldname1_1 скрыт');
                        }
                    });

                    // Дополнительный обработчик для span внутри кнопки (на всякий случай)
                    span.addEventListener('click', function(e) {
                        e.stopPropagation();
                        console.log('Клик по span внутри кнопки "Выбрать"');

                        const targetBlock = document.querySelector('.slotsCalendarfieldname1_1');
                        if (targetBlock) {
                            targetBlock.style.display = 'none';
                            console.log('Блок .slotsCalendarfieldname1_1 скрыт через span');
                        }
                    });
                }
            });

            return calendarBlocks.length > 0;
        }

        // Функция для обработки выбора даты из календаря
        function handleDateSelection(dateElement) {
            // Получаем дату из календаря
            // Предполагаем, что дата хранится в тексте или data-атрибутах
            let dateStr = '';

            // Пробуем получить из текста ссылки
            const linkText = dateElement.textContent.trim();

            // Пробуем найти родительский календарь для получения месяца и года
            const calendar = dateElement.closest('.ui-datepicker-calendar');
            if (calendar) {
                const datepicker = calendar.closest('.ui-datepicker');
                if (datepicker) {
                    // Получаем месяц и год из заголовка календаря
                    const monthYearElement = datepicker.querySelector('.ui-datepicker-title');
                    if (monthYearElement) {
                        const monthYearText = monthYearElement.textContent.trim();

                        // Парсим месяц и год (формат может быть разный, например "November 2024")
                        const parts = monthYearText.split(' ');
                        if (parts.length >= 2) {
                            const monthName = parts[0];
                            const year = parts[1];

                            // Преобразуем название месяца в число (0-11)
                            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June',
                                'July', 'August', 'September', 'October', 'November', 'December'];
                            const monthIndex = monthNames.findIndex(m => m.toLowerCase() === monthName.toLowerCase());

                            if (monthIndex !== -1) {
                                const day = parseInt(linkText);
                                if (!isNaN(day)) {
                                    // Форматируем в dd.mm.yyyy
                                    dateStr = `${day.toString().padStart(2, '0')}.${(monthIndex + 1).toString().padStart(2, '0')}.${year}`;
                                    selectedDateTime.date = dateStr;
                                    selectedDateTime.updateDisplay();
                                    console.log('Выбрана дата:', dateStr);
                                }
                            }
                        }
                    }
                }
            }

            // Альтернативный способ: если дата хранится в data-атрибутах
            if (!dateStr) {
                const day = dateElement.getAttribute('data-day');
                const month = dateElement.getAttribute('data-month'); // 0-11
                const year = dateElement.getAttribute('data-year');

                if (day && month && year) {
                    dateStr = `${day.padStart(2, '0')}.${(parseInt(month) + 1).toString().padStart(2, '0')}.${year}`;
                    selectedDateTime.date = dateStr;
                    selectedDateTime.updateDisplay();
                    console.log('Выбрана дата (из data-атрибутов):', dateStr);
                }
            }
        }

        // Функция для добавления обработчиков клика на ссылки календаря
        function attachCalendarDateClickHandlers() {
            // Находим все ссылки в ячейках календаря
            const dateLinks = document.querySelectorAll('.ui-datepicker-calendar td a');

            dateLinks.forEach(link => {
                // Проверяем, не добавлен ли уже обработчик
                if (!link.hasAttribute('data-calendar-date-handler')) {
                    link.setAttribute('data-calendar-date-handler', 'true');

                    link.addEventListener('click', function(e) {
                        e.stopPropagation();
                        console.log('Клик по дате в календаре');

                        // Находим и показываем блок .slotsCalendarfieldname1_1
                        const targetBlock = document.querySelector('.slotsCalendarfieldname1_1');
                        if (targetBlock) {
                            targetBlock.style.display = 'block';
                            console.log('Блок .slotsCalendarfieldname1_1 показан');
                        }

                        // Обрабатываем выбор даты
                        handleDateSelection(link);
                    });
                }
            });

            return dateLinks.length > 0;
        }

        // Функция для добавления обработчиков клика на слоты времени
        function attachTimeSlotHandlers() {
            // Находим все слоты времени
            const timeSlots = document.querySelectorAll('.availableslot, .htmlUsed');

            timeSlots.forEach(slot => {
                // Проверяем, не добавлен ли уже обработчик
                if (!slot.hasAttribute('data-time-slot-handler')) {
                    slot.setAttribute('data-time-slot-handler', 'true');

                    slot.addEventListener('click', function(e) {
                        e.stopPropagation();

                        // Получаем текст времени
                        const timeText = this.textContent.trim();
                        selectedDateTime.time = timeText;
                        selectedDateTime.updateDisplay();

                        console.log('Выбрано время:', timeText);

                        // Убираем выделение у других слотов и выделяем текущий
                        timeSlots.forEach(s => {
                            s.style.backgroundColor = '';
                            s.style.color = '';
                        });

                        // Выделяем выбранный слот
                        this.style.backgroundColor = '#007bff';
                        this.style.color = 'white';
                    });
                }
            });

            return timeSlots.length > 0;
        }

        // Функция для наблюдения за появлением календаря и добавления обработчиков
        function observeCalendarUpdates() {
            // Наблюдаем за изменениями в DOM, особенно за появлением элементов календаря
            const calendarObserver = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.addedNodes && mutation.addedNodes.length > 0) {
                        for (let node of mutation.addedNodes) {
                            // Проверяем, появился ли календарь или его элементы
                            if ((node.nodeType === 1 && node.classList &&
                                    (node.classList.contains('ui-datepicker-calendar') ||
                                        node.classList.contains('ui-datepicker'))) ||
                                (node.querySelector &&
                                    (node.querySelector('.ui-datepicker-calendar') ||
                                        node.querySelector('.ui-datepicker')))) {

                                // Даем время на рендеринг
                                setTimeout(() => {
                                    attachCalendarDateClickHandlers();
                                }, 100);
                            }

                            // Проверяем, появились ли слоты времени
                            if ((node.nodeType === 1 && node.classList &&
                                    (node.classList.contains('availableslot') ||
                                        node.classList.contains('htmlUsed'))) ||
                                (node.querySelector &&
                                    (node.querySelector('.availableslot') ||
                                        node.querySelector('.htmlUsed')))) {

                                setTimeout(() => {
                                    attachTimeSlotHandlers();
                                }, 100);
                            }
                        }
                    }

                    // Проверяем изменения в поддереве
                    if (mutation.type === 'childList' && mutation.target) {
                        if (mutation.target.querySelector &&
                            (mutation.target.querySelector('.ui-datepicker-calendar') ||
                                mutation.target.querySelector('.ui-datepicker'))) {

                            setTimeout(() => {
                                attachCalendarDateClickHandlers();
                            }, 50);
                        }

                        if (mutation.target.querySelector &&
                            (mutation.target.querySelector('.availableslot') ||
                                mutation.target.querySelector('.htmlUsed'))) {

                            setTimeout(() => {
                                attachTimeSlotHandlers();
                            }, 50);
                        }
                    }
                });
            });

            // Начинаем наблюдение
            calendarObserver.observe(document.body, {
                childList: true,
                subtree: true
            });

            return calendarObserver;
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

                    // Добавляем CSS стили для легенды
                    const style = document.createElement('style');

                    // Добавляем стили в head, если их еще нет
                    if (!document.querySelector('style[data-calendar-legend]')) {
                        style.setAttribute('data-calendar-legend', 'true');
                        document.head.appendChild(style);
                    }
                }

                // Также добавляем обработчики на даты календаря
                setTimeout(() => {
                    attachCalendarDateClickHandlers();
                }, 100);
            });

            return uiWidgets.length > 0;
        }

        // наблюдатель за изменениями DOM
        const observer = new MutationObserver(function(mutations) {
            let changesMade = false;

            // Проверяем, нужно ли реструктурировать форму
            if (document.querySelector('.pb0.pbreak') && !document.querySelector('.pb0.pbreak .anketa-col')) {
                if (restructureForm()) changesMade = true;
            }

            // Добавляем блок отображения даты и времени
            if (document.querySelector('.anketa-col-2')) {
                if (addDateTimeDisplayBlock()) changesMade = true;
            }

            // Добавляем начальное скрытие для блока .slotsCalendarfieldname1_1
            if (document.querySelector('.slotsCalendarfieldname1_1')) {
                if (addInitialHideStyle()) changesMade = true;
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

                        // Проверяем, является ли узел или содержит ли .ui-datepicker-calendar
                        if ((node.nodeType === 1 && node.classList &&
                                (node.classList.contains('ui-datepicker-calendar') ||
                                    node.classList.contains('ui-datepicker'))) ||
                            (node.querySelector &&
                                (node.querySelector('.ui-datepicker-calendar') ||
                                    node.querySelector('.ui-datepicker')))) {

                            setTimeout(() => {
                                attachCalendarDateClickHandlers();
                            }, 100);
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

                        // Проверяем, появился ли блок .slotsCalendarfieldname1_1
                        if ((node.nodeType === 1 && node.classList && node.classList.contains('slotsCalendarfieldname1_1')) ||
                            (node.querySelector && node.querySelector('.slotsCalendarfieldname1_1'))) {
                            setTimeout(() => addInitialHideStyle(), 100);
                            changesMade = true;
                        }

                        // Проверяем, появились ли слоты времени
                        if ((node.nodeType === 1 && node.classList &&
                                (node.classList.contains('availableslot') ||
                                    node.classList.contains('htmlUsed'))) ||
                            (node.querySelector &&
                                (node.querySelector('.availableslot') ||
                                    node.querySelector('.htmlUsed')))) {

                            setTimeout(() => {
                                attachTimeSlotHandlers();
                            }, 100);
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

                    // Проверяем, появился ли .ui-datepicker-calendar внутри измененного элемента
                    if (mutation.target.querySelector &&
                        (mutation.target.querySelector('.ui-datepicker-calendar') ||
                            mutation.target.querySelector('.ui-datepicker'))) {

                        setTimeout(() => {
                            attachCalendarDateClickHandlers();
                        }, 50);
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

                        setTimeout(() => attachTimeSlotHandlers(), 50);
                        changesMade = true;
                    }

                    // Проверка для поля textarea
                    const target = mutation.target.querySelector('#field_1-6, #fieldname8_1');
                    if (target && document.getElementById('fieldname8_1')) {
                        setTimeout(() => replaceInputWithTextarea(), 50);
                        changesMade = true;
                    }

                    // Проверяем, появился ли .slotsCalendarfieldname1_1 внутри измененного элемента
                    if (mutation.target.querySelector && mutation.target.querySelector('.slotsCalendarfieldname1_1')) {
                        setTimeout(() => addInitialHideStyle(), 50);
                        changesMade = true;
                    }

                    // Проверяем, появился ли .anketa-col-2
                    if (mutation.target.querySelector && mutation.target.querySelector('.anketa-col-2')) {
                        setTimeout(() => addDateTimeDisplayBlock(), 50);
                        changesMade = true;
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
                    addInitialHideStyle();
                    addDateTimeDisplayBlock();
                    attachCalendarDateClickHandlers();
                    attachTimeSlotHandlers();
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
            wrapSlotsContent();
            addCalendarLegend();
            addInitialHideStyle();
            addDateTimeDisplayBlock();
            attachCalendarDateClickHandlers();
            attachTimeSlotHandlers();
            observeCalendarUpdates();
        }

        // Запускаем начальную проверку
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initialCheck);
        } else {
            initialCheck();
        }
        console.log('222222222222222222');
    </script>
<?php
get_footer();
