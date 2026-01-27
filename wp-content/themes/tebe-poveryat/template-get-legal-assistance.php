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

                let selectButton = block.querySelector('.select-button');
                if (!selectButton) {
                    // Создаем блок с кнопками
                    selectButton = document.createElement('div');
                    selectButton.className = 'select-button';

                    // Создаем span с текстом "Выбрать"
                    const span = document.createElement('span');
                    span.textContent = 'Выбрать';

                    // Создаем кнопку "Отправить запрос"
                    const submitButton = document.createElement('button');
                    submitButton.type = 'button';
                    submitButton.className = 'pbSubmit';
                    submitButton.textContent = 'Отправить запрос';

                    // Добавляем элементы в блок
                    selectButton.appendChild(span);
                    selectButton.appendChild(submitButton);

                    // Добавляем блок в конец .slotsCalendar
                    block.appendChild(selectButton);

                    console.log('Блок .select-button создан с двумя кнопками');

                    // Обработчик клика на span "Выбрать"
                    span.addEventListener('click', function(e) {
                        e.stopPropagation();
                        console.log('Клик по span "Выбрать"');

                        // Находим и скрываем блок .slotsCalendarfieldname1_1
                        const targetBlock = document.querySelector('.slotsCalendarfieldname1_1');
                        if (targetBlock) {
                            targetBlock.style.display = 'none';
                            console.log('Блок .slotsCalendarfieldname1_1 скрыт через span');
                        }
                    });

                    // Обработчик клика на кнопку "Отправить запрос"
                    submitButton.addEventListener('click', function(e) {
                        e.stopPropagation();
                        console.log('Клик по кнопке "Отправить запрос" в .select-button');

                        // Ищем основную кнопку отправки в форме
                        const mainSubmitButton = document.querySelector('.pbSubmit:not(.select-button .pbSubmit)');
                        if (mainSubmitButton) {
                            console.log('Вызываем клик на основной кнопке отправки');
                            mainSubmitButton.click();
                        }
                    });

                } else {
                    // Если .select-button уже существует, проверяем наличие кнопки "Отправить запрос"
                    if (!selectButton.querySelector('.pbSubmit')) {
                        // Создаем кнопку "Отправить запрос"
                        const submitButton = document.createElement('button');
                        submitButton.type = 'button';
                        submitButton.className = 'pbSubmit';
                        submitButton.textContent = 'Отправить запрос';

                        // Добавляем кнопку в существующий блок .select-button
                        selectButton.appendChild(submitButton);

                        console.log('Кнопка "Отправить запрос" добавлена в существующий .select-button');

                        // Обработчик для новой кнопки
                        submitButton.addEventListener('click', function(e) {
                            e.stopPropagation();
                            console.log('Клик по кнопке "Отправить запрос" в .select-button');

                            // Ищем основную кнопку отправки в форме
                            const mainSubmitButton = document.querySelector('.pbSubmit:not(.select-button .pbSubmit)');
                            if (mainSubmitButton) {
                                console.log('Вызываем клик на основной кнопке отправки');
                                mainSubmitButton.click();
                            }
                        });
                    }
                }
            });

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

        // Функция для проверки одного обязательного поля
        function validateRequiredField(field) {
            let isValid = true;

            // Пропускаем скрытые поля
            if (field.type === 'hidden') {
                return true;
            }

            // Проверяем текстовые поля и textarea
            if ((field.tagName === 'INPUT' && field.type === 'text') ||
                field.tagName === 'TEXTAREA' ||
                field.tagName === 'SELECT') {
                if (!field.value || field.value.trim() === '') {
                    isValid = false;
                }
            }

            // Для checkbox проверяем checked
            if (field.type === 'checkbox') {
                if (!field.checked) {
                    isValid = false;
                }
            }

            // Для радио-кнопок проверяем хотя бы одну выбранную
            if (field.type === 'radio') {
                const name = field.name;
                const group = document.querySelectorAll(`[name="${name}"]`);
                let groupChecked = false;

                group.forEach(item => {
                    if (item.checked) {
                        groupChecked = true;
                    }
                });

                if (!groupChecked) {
                    isValid = false;
                }
            }

            // Показываем или скрываем ошибку
            const errorId = field.id + '-error';
            let errorElement = document.getElementById(errorId);

            if (!isValid) {
                if (!errorElement) {
                    // Создаем элемент ошибки
                    errorElement = document.createElement('div');
                    errorElement.id = errorId;
                    errorElement.className = 'cpefb_error message';
                    errorElement.textContent = 'Обязательное поле';
                    errorElement.style.color = '#ff0000';
                    errorElement.style.fontSize = '12px';
                    errorElement.style.marginTop = '5px';

                    // Вставляем ошибку после поля
                    const fieldContainer = field.closest('.fields') || field.parentNode;
                    fieldContainer.appendChild(errorElement);

                    // Добавляем красную рамку полю
                    field.style.borderColor = '#ff0000';
                } else {
                    errorElement.style.display = 'block';
                    field.style.borderColor = '#ff0000';
                }
            } else if (errorElement) {
                errorElement.style.display = 'none';
                field.style.borderColor = '';
            }

            return isValid;
        }

        // Функция для проверки всех обязательных полей в .anketa-col-1
        function checkRequiredFieldsFilled() {
            const requiredFields = document.querySelectorAll('.anketa-col-1 .required');
            let allFilled = true;

            requiredFields.forEach(field => {
                // Пропускаем скрытые поля
                if (field.type === 'hidden') {
                    return;
                }

                const isValid = validateRequiredField(field);
                if (!isValid) {
                    allFilled = false;
                }
            });

            return allFilled;
        }

        // Функция для добавления кнопки "КНОПКА ВЫЗОВА"
        function addCallButton() {
            const anketaCol2 = document.querySelector('.anketa-col-2');
            if (!anketaCol2) return false;

            // Проверяем, не добавлена ли уже кнопка
            let callButton = anketaCol2.querySelector('.call-button');

            if (!callButton) {
                // Создаем кнопку
                callButton = document.createElement('button');
                callButton.type = 'button';
                callButton.className = 'call-button';
                callButton.textContent = 'КНОПКА ВЫЗОВА';
                callButton.disabled = true; // По умолчанию неактивна

                // Добавляем кнопку в конец блока .anketa-col-2
                anketaCol2.appendChild(callButton);

                console.log('Кнопка "КНОПКА ВЫЗОВА" добавлена');
            }

            // Обработчик клика для кнопки
            callButton.addEventListener('click', function(e) {
                e.stopPropagation();
                console.log('Клик по кнопке "КНОПКА ВЫЗОВА"');

                // Показываем блок .slotsCalendarfieldname1_1
                const slotsCalendar = document.querySelector('.slotsCalendarfieldname1_1');
                if (slotsCalendar) {
                    slotsCalendar.style.display = 'block';
                    console.log('Блок .slotsCalendarfieldname1_1 показан');
                }
            });

            // Проверяем состояние полей и обновляем кнопку
            updateCallButtonState(callButton);

            // Добавляем обработчики для полей в .anketa-col-1
            setupRequiredFieldsListeners(callButton);

            return true;
        }

        // Функция для обновления состояния кнопки вызова
        function updateCallButtonState(callButton) {
            if (!callButton) return;

            const allFilled = checkRequiredFieldsFilled();
            callButton.disabled = !allFilled;

            // Добавляем/удаляем класс для визуальной обратной связи
            if (allFilled) {
                callButton.classList.remove('disabled');
                callButton.classList.add('enabled');
            } else {
                callButton.classList.add('disabled');
                callButton.classList.remove('enabled');
            }
        }

        // Функция для настройки обработчиков событий на обязательные поля
        function setupRequiredFieldsListeners(callButton) {
            const requiredFields = document.querySelectorAll('.anketa-col-1 .required');

            requiredFields.forEach(field => {
                // Удаляем старые обработчики (если были) и добавляем новые
                const handleFieldChange = function() {
                    validateRequiredField(this);
                    updateCallButtonState(callButton);
                };

                field.removeEventListener('input', handleFieldChange);
                field.removeEventListener('change', handleFieldChange);

                field.addEventListener('input', handleFieldChange);
                field.addEventListener('change', handleFieldChange);

                // Для радио-кнопок добавляем обработчик на все элементы группы
                if (field.type === 'radio') {
                    const name = field.name;
                    const group = document.querySelectorAll(`[name="${name}"]`);

                    group.forEach(radio => {
                        radio.removeEventListener('change', handleFieldChange);
                        radio.addEventListener('change', handleFieldChange);
                    });
                }
            });
        }

        // Функция для поиска и отслеживания изменений в .anketa-col-1
        function monitorAnketaCol1() {
            const anketaCol1 = document.querySelector('.anketa-col-1');
            if (!anketaCol1) return false;

            // Наблюдаем за изменениями внутри .anketa-col-1
            const col1Observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    // Если добавляются/изменяются элементы
                    if (mutation.type === 'childList' || mutation.type === 'attributes') {
                        // Обновляем кнопку вызова
                        const callButton = document.querySelector('.call-button');
                        if (callButton) {
                            updateCallButtonState(callButton);
                            // Переустанавливаем обработчики на случай новых полей
                            setupRequiredFieldsListeners(callButton);
                        }
                    }
                });
            });

            // Начинаем наблюдение
            col1Observer.observe(anketaCol1, {
                childList: true,
                subtree: true,
                attributes: true,
                attributeFilter: ['value', 'checked']
            });

            console.log('Наблюдение за .anketa-col-1 начато');
            return true;
        }

        // Функция для добавления стилей для кнопки вызова
        function addCallButtonStyles() {
            // Проверяем, не добавлены ли уже стили
            if (document.querySelector('style[data-call-button]')) return;

            const style = document.createElement('style');
            style.setAttribute('data-call-button', 'true');
            style.textContent = `
            .call-button {
                display: block;
                width: 100%;
                max-width: 300px;
                margin: 20px auto 10px;
                padding: 12px 24px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
                transition: all 0.3s ease;
                text-align: center;
            }

            .call-button:hover:not(:disabled) {
                background-color: #45a049;
                transform: translateY(-2px);
                box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            }

            .call-button:disabled {
                background-color: #cccccc;
                cursor: not-allowed;
                opacity: 0.6;
            }

            .call-button.disabled {
                background-color: #cccccc;
                cursor: not-allowed;
                opacity: 0.6;
            }

            .call-button.enabled {
                background-color: #4CAF50;
                cursor: pointer;
                opacity: 1;
            }

            .call-button:active:not(:disabled) {
                transform: translateY(0);
                box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            }

            .cpefb_error.message {
                color: #ff0000;
                font-size: 12px;
                margin-top: 5px;
                display: block;
            }

            .required.error {
                border-color: #ff0000 !important;
            }
        `;

            document.head.appendChild(style);
            console.log('Стили для кнопки вызова добавлены');
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

                        // Проверяем, является ли узел или содержит ли .anketa-col-1
                        if ((node.nodeType === 1 && node.classList && node.classList.contains('anketa-col-1')) ||
                            (node.querySelector && node.querySelector('.anketa-col-1'))) {
                            setTimeout(() => {
                                // Обновляем кнопку вызова и начинаем мониторинг
                                const callButton = document.querySelector('.call-button');
                                if (callButton) {
                                    updateCallButtonState(callButton);
                                    setupRequiredFieldsListeners(callButton);
                                }
                                monitorAnketaCol1();
                            }, 100);
                            changesMade = true;
                        }

                        // Проверяем, является ли узел или содержит ли .anketa-col-2
                        if ((node.nodeType === 1 && node.classList && node.classList.contains('anketa-col-2')) ||
                            (node.querySelector && node.querySelector('.anketa-col-2'))) {
                            setTimeout(() => {
                                addCallButtonStyles();
                                addCallButton();
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

                    // Проверяем, появился ли .anketa-col-1 или .anketa-col-2 внутри измененного элемента
                    if (mutation.target.querySelector && mutation.target.querySelector('.anketa-col-1')) {
                        setTimeout(() => {
                            const callButton = document.querySelector('.call-button');
                            if (callButton) {
                                updateCallButtonState(callButton);
                                setupRequiredFieldsListeners(callButton);
                            }
                            monitorAnketaCol1();
                        }, 50);
                        changesMade = true;
                    }

                    if (mutation.target.querySelector && mutation.target.querySelector('.anketa-col-2')) {
                        setTimeout(() => {
                            addCallButtonStyles();
                            addCallButton();
                        }, 50);
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
                }

                // Проверяем изменения атрибутов (например, value, checked)
                if (mutation.type === 'attributes' && mutation.target) {
                    // Если изменяется обязательное поле в .anketa-col-1
                    if (mutation.target.classList && mutation.target.classList.contains('required') &&
                        mutation.target.closest('.anketa-col-1')) {
                        const callButton = document.querySelector('.call-button');
                        if (callButton) {
                            validateRequiredField(mutation.target);
                            updateCallButtonState(callButton);
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
                    addCallButtonStyles();
                    addCallButton();
                    monitorAnketaCol1();

                    // Проверяем все обязательные поля при загрузке
                    const callButton = document.querySelector('.call-button');
                    if (callButton) {
                        checkRequiredFieldsFilled();
                        updateCallButtonState(callButton);
                    }
                }, 100);
            }
        });

        // Старт наблюдения
        observer.observe(document.body, {
            childList: true,
            subtree: true,
            attributes: true,
            attributeFilter: ['value', 'checked']
        });

        // Начальная проверка при загрузке страницы
        function initialCheck() {
            restructureForm();
            replaceInputWithTextarea();
            decorateSlotsCalendar();
            wrapSlotsContent();
            addCalendarLegend();
            addCallButtonStyles();
            addCallButton();
            monitorAnketaCol1();

            // Проверяем все обязательные поля при загрузке
            const callButton = document.querySelector('.call-button');
            if (callButton) {
                checkRequiredFieldsFilled();
                updateCallButtonState(callButton);
            }
        }

        // Запускаем начальную проверку
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initialCheck);
        } else {
            initialCheck();
        }
        console.log('test button');
    </script>
<?php
get_footer();
