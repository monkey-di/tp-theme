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
        .page-template-template-get-legal-assistance .header{
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
                    <div class="page-head-btn">
                        <a class="head-button" href="#anketa">Заполнить анкету</a>
                    </div>
                </div>
                <div class="page-head-col">
                    <div class="page-head-picture">
                        <img src="<?=$pagehead_pic?>">
                    </div>
                    <div class="page-head-btn">
                        <a class="head-button" href="#">Обратиться за помощью</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        the_content();
        ?>
    </main>
    <script>
        // Переменные для хранения выбранной даты и времени
        let selectedDateValue = '';
        let selectedTimeValue = '';
        let selectionObserver = null;
        let dateInputObserver = null;

        // Константы для ключей sessionStorage
        const STORAGE_KEYS = {
            DATE: 'selectedDateValue',
            TIME: 'selectedTimeValue',
            HAS_SUCCESS: 'hasSuccessRedirect'
        };

        // Функция для сохранения данных в sessionStorage
        function saveToSessionStorage() {
            try {
                if (selectedDateValue) {
                    sessionStorage.setItem(STORAGE_KEYS.DATE, selectedDateValue);
                }
                if (selectedTimeValue) {
                    sessionStorage.setItem(STORAGE_KEYS.TIME, selectedTimeValue);
                }
                console.log('Данные сохранены в sessionStorage:', { selectedDateValue, selectedTimeValue });
            } catch (e) {
                console.error('Ошибка при сохранении в sessionStorage:', e);
            }
        }

        // Функция для загрузки данных из sessionStorage
        function loadFromSessionStorage() {
            try {
                const savedDate = sessionStorage.getItem(STORAGE_KEYS.DATE);
                const savedTime = sessionStorage.getItem(STORAGE_KEYS.TIME);

                if (savedDate) {
                    selectedDateValue = savedDate;
                    console.log('Дата загружена из sessionStorage:', selectedDateValue);
                }
                if (savedTime) {
                    selectedTimeValue = savedTime;
                    console.log('Время загружено из sessionStorage:', selectedTimeValue);
                }

                return { savedDate, savedTime };
            } catch (e) {
                console.error('Ошибка при загрузке из sessionStorage:', e);
                return { savedDate: null, savedTime: null };
            }
        }

        // Функция для очистки данных из sessionStorage
        function clearSessionStorage() {
            try {
                sessionStorage.removeItem(STORAGE_KEYS.DATE);
                sessionStorage.removeItem(STORAGE_KEYS.TIME);
                sessionStorage.removeItem(STORAGE_KEYS.HAS_SUCCESS);
                console.log('sessionStorage очищен');
            } catch (e) {
                console.error('Ошибка при очистке sessionStorage:', e);
            }
        }

        // Функция для обработки отправки формы (перехват отправки)
        function setupFormSubmitHandler() {
            // Ищем основную кнопку отправки формы
            const mainSubmitButton = document.querySelector('.pbSubmit:not(.select-button .pbSubmit)');
            if (mainSubmitButton) {
                mainSubmitButton.addEventListener('click', function(e) {
                    console.log('Клик по основной кнопке отправки, сохраняем данные в sessionStorage');
                    saveToSessionStorage();
                    // Добавляем флаг, что была отправка формы
                    sessionStorage.setItem(STORAGE_KEYS.HAS_SUCCESS, 'true');
                });
            }

            // Также перехватываем клик по кнопке в select-button
            const selectSubmitButton = document.querySelector('.select-button .pbSubmit');
            if (selectSubmitButton) {
                selectSubmitButton.addEventListener('click', function(e) {
                    console.log('Клик по кнопке отправки в select-button, сохраняем данные в sessionStorage');
                    saveToSessionStorage();
                    // Добавляем флаг, что была отправка формы
                    sessionStorage.setItem(STORAGE_KEYS.HAS_SUCCESS, 'true');
                });
            }

            // Также можем перехватить саму отправку формы
            const form = document.getElementById('cp_appbooking_pform_1');
            if (form) {
                const originalSubmit = form.onsubmit;
                form.onsubmit = function(e) {
                    console.log('Форма отправляется, сохраняем данные в sessionStorage');
                    saveToSessionStorage();
                    sessionStorage.setItem(STORAGE_KEYS.HAS_SUCCESS, 'true');

                    // Вызываем оригинальный обработчик, если он есть
                    if (originalSubmit) {
                        return originalSubmit.call(this, e);
                    }
                };
            }
        }

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

        // Функция для замены input на textarea и добавления класса required
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
                        // Сохраняем существующие классы и добавляем required
                        textarea.className = input.className + ' required';
                    } else if (input.hasAttribute(attr)) {
                        textarea.setAttribute(attr, input.getAttribute(attr));
                    }
                });

                // Добавить атрибуты для textarea
                textarea.setAttribute('rows', '4');
                textarea.style.minHeight = '217px';
                textarea.style.resize = 'vertical';

                // Добавляем атрибут required если его нет
                if (!textarea.hasAttribute('required')) {
                    textarea.setAttribute('required', 'required');
                }

                // Замена элемента
                input.parentNode.replaceChild(textarea, input);
                console.log('Input заменен на textarea с классом required');
                return true;
            }

            // Если textarea уже существует, добавляем ему класс required
            const existingTextarea = document.getElementById('fieldname8_1');
            if (existingTextarea && existingTextarea.tagName === 'TEXTAREA') {
                if (!existingTextarea.classList.contains('required')) {
                    existingTextarea.classList.add('required');
                    if (!existingTextarea.hasAttribute('required')) {
                        existingTextarea.setAttribute('required', 'required');
                    }
                    console.log('Класс required добавлен к существующему textarea');
                }
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

        // Функция для проверки всех обязательных полей
        function validateAllRequiredFields() {
            const requiredFields = document.querySelectorAll('.required');
            let allValid = true;

            requiredFields.forEach(field => {
                // Пропускаем скрытые поля
                if (field.type === 'hidden') {
                    return;
                }

                const isValid = validateRequiredField(field);
                if (!isValid) {
                    allValid = false;
                }
            });

            return allValid;
        }

        // Функция для обновления выбранной даты из .slots span
        function updateSelectedDate() {
            const slotsCalendar = document.querySelector('.slotsCalendarfieldname1_1');
            if (slotsCalendar) {
                const slotsContainer = slotsCalendar.querySelector('.slots');
                if (slotsContainer) {
                    const dateSpan = slotsContainer.querySelector('span');
                    if (dateSpan) {
                        selectedDateValue = dateSpan.textContent.trim();
                        console.log('Дата обновлена:', selectedDateValue);

                        // Сохраняем в sessionStorage при каждом изменении
                        saveToSessionStorage();

                        // Обновление поля ввода даты
                        updateDateInputFieldFromSelectedDate();
                        return true;
                    }
                }
            }
            return false;
        }

        // Новая функция для обновления поля ввода даты из selectedDateValue
        function updateDateInputFieldFromSelectedDate() {
            const dateInput = document.getElementById('dateInputField');
            if (!dateInput || !selectedDateValue) return;

            // Форматирование даты для поля ввода (уже в правильном формате dd.mm.yyyy)
            // selectedDateValue уже содержит дату в формате "25.02.2026"
            dateInput.value = selectedDateValue;
            console.log('Поле ввода даты обновлено из selectedDateValue:', selectedDateValue);
        }

        // Функция для обновления выбранного времени при изменении
        function updateSelectedTime() {
            const slotsCalendar = document.querySelector('.slotsCalendarfieldname1_1');
            if (slotsCalendar) {
                // Ищем .currentSelection a
                const currentSelection = slotsCalendar.querySelector('.currentSelection a');
                if (currentSelection) {
                    selectedTimeValue = currentSelection.textContent.trim();
                    console.log('Время обновлено (currentSelection):', selectedTimeValue);

                    // Сохраняем в sessionStorage при каждом изменении
                    saveToSessionStorage();

                    return true;
                }

                // Или .choosen a
                const choosenSelection = slotsCalendar.querySelector('.choosen a');
                if (choosenSelection) {
                    selectedTimeValue = choosenSelection.textContent.trim();
                    console.log('Время обновлено (choosen):', selectedTimeValue);

                    // Сохраняем в sessionStorage при каждом изменении
                    saveToSessionStorage();

                    return true;
                }
            }
            return false;
        }

        // Наблюдатель за появлением .slots span и изменением .currentSelection
        function startSelectionObservation() {
            if (selectionObserver) {
                selectionObserver.disconnect();
            }

            selectionObserver = new MutationObserver(function(mutations) {
                let dateUpdated = false;
                let timeUpdated = false;

                mutations.forEach(function(mutation) {
                    // Проверяем добавление .slots span
                    if (mutation.addedNodes && mutation.addedNodes.length > 0) {
                        for (let node of mutation.addedNodes) {
                            if (node.nodeType === 1 && node.classList && node.classList.contains('slots')) {
                                setTimeout(() => {
                                    updateSelectedDate();
                                }, 100);
                                dateUpdated = true;
                            }

                            if (node.nodeType === 1 && node.classList &&
                                (node.classList.contains('currentSelection') || node.classList.contains('choosen'))) {
                                setTimeout(() => {
                                    updateSelectedTime();
                                }, 100);
                                timeUpdated = true;
                            }

                            if (node.querySelector &&
                                (node.querySelector('.slots') || node.querySelector('.currentSelection') || node.querySelector('.choosen'))) {
                                setTimeout(() => {
                                    updateSelectedDate();
                                    updateSelectedTime();
                                }, 100);
                                dateUpdated = true;
                                timeUpdated = true;
                            }
                        }
                    }

                    // Проверяем изменения атрибутов
                    if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                        const target = mutation.target;
                        if (target.classList &&
                            (target.classList.contains('currentSelection') || target.classList.contains('choosen') ||
                                target.classList.contains('availableslot') || target.classList.contains('htmlUsed'))) {
                            setTimeout(() => {
                                updateSelectedTime();
                            }, 100);
                            timeUpdated = true;
                        }
                    }
                });

                // Также обновляем дату при любых изменениях в .slotsCalendarfieldname1_1
                if (!dateUpdated) {
                    updateSelectedDate();
                }
                if (!timeUpdated) {
                    updateSelectedTime();
                }
            });

            // Начинаем наблюдение
            const slotsCalendar = document.querySelector('.slotsCalendarfieldname1_1');
            if (slotsCalendar) {
                selectionObserver.observe(slotsCalendar, {
                    childList: true,
                    subtree: true,
                    attributes: true,
                    attributeFilter: ['class']
                });
                console.log('Наблюдение за выбором даты и времени начато');

                // Обновляем начальные значения
                updateSelectedDate();
                updateSelectedTime();
            }
        }

        // Функция для получения текущих выбранных даты и времени
        function getSelectedDateTime() {
            // Перед возвратом убедимся, что поле ввода даты синхронизировано
            if (selectedDateValue) {
                const dateInput = document.getElementById('dateInputField');
                if (dateInput && !dateInput.value) {
                    dateInput.value = selectedDateValue;
                }
            }

            return {
                selectedDate: selectedDateValue,
                selectedTime: selectedTimeValue
            };
        }

        // Функция для добавления обязательных чекбоксов в .anketa-col-1
        function addRequiredCheckboxes() {
            const anketaCol1 = document.querySelector('.anketa-col-1');
            if (!anketaCol1) return false;

            // Проверяем, не добавлены ли уже чекбоксы
            const existingCheckboxes = anketaCol1.querySelectorAll('[data-checkbox="personal-data"], [data-checkbox="offer"]');
            if (existingCheckboxes.length > 0) {
                return true;
            }

            // Создаем первый чекбокс (обработка персональных данных)
            const checkbox1Container = document.createElement('div');
            checkbox1Container.className = 'fieldscheck';
            checkbox1Container.setAttribute('data-checkbox', 'personal-data');

            const checkbox1Label = document.createElement('label');

            const checkbox1Input = document.createElement('input');
            checkbox1Input.type = 'checkbox';
            checkbox1Input.className = 'required';
            checkbox1Input.required = true;
            checkbox1Input.name = 'personal_data_agreement';

            const checkbox1Text = document.createTextNode(' Я соглашаюсь на обработку моих персональных данных');

            checkbox1Label.appendChild(checkbox1Input);
            checkbox1Label.appendChild(checkbox1Text);

            const dfield1 = document.createElement('div');
            dfield1.className = 'dfield';
            dfield1.appendChild(checkbox1Label);

            const clearer1 = document.createElement('div');
            clearer1.className = 'clearer';

            checkbox1Container.appendChild(dfield1);
            checkbox1Container.appendChild(clearer1);

            // Создаем второй чекбокс (условия оферты)
            const checkbox2Container = document.createElement('div');
            checkbox2Container.className = 'fieldscheck';
            checkbox2Container.setAttribute('data-checkbox', 'offer');

            const checkbox2Label = document.createElement('label');

            const checkbox2Input = document.createElement('input');
            checkbox2Input.type = 'checkbox';
            checkbox2Input.className = 'required';
            checkbox2Input.required = true;
            checkbox2Input.name = 'offer_agreement';

            const checkbox2Text = document.createTextNode(' Я соглашаюсь с условиями оферты');

            checkbox2Label.appendChild(checkbox2Input);
            checkbox2Label.appendChild(checkbox2Text);

            const dfield2 = document.createElement('div');
            dfield2.className = 'dfield';
            dfield2.appendChild(checkbox2Label);

            const clearer2 = document.createElement('div');
            clearer2.className = 'clearer';

            checkbox2Container.appendChild(dfield2);
            checkbox2Container.appendChild(clearer2);

            // Добавляем чекбоксы в конец .anketa-col-1
            anketaCol1.appendChild(checkbox1Container);
            anketaCol1.appendChild(checkbox2Container);

            console.log('Обязательные чекбоксы добавлены в .anketa-col-1');
            return true;
        }

        // Функция для добавления текстового поля даты в .anketa-col-2
        function addDateInputField() {
            const anketaCol2 = document.querySelector('.anketa-col-2');
            if (!anketaCol2) return false;

            // Проверяем, не добавлено ли уже поле
            if (anketaCol2.querySelector('#dateInputField')) {
                return true;
            }

            // Создаем контейнер для поля ввода даты
            const dateInputContainer = document.createElement('div');
            dateInputContainer.className = 'fields';

            // Создаем label
            const label = document.createElement('label');
            label.setAttribute('for', 'dateInputField');
            label.textContent = 'Дата:';

            // Создаем dfield
            const dfield = document.createElement('div');
            dfield.className = 'dfield';

            // Создаем input для даты
            const dateInput = document.createElement('input');
            dateInput.type = 'text';
            dateInput.id = 'dateInputField';
            dateInput.name = 'dateInputField';
            dateInput.className = 'field large';
            dateInput.placeholder = 'дд.мм.гггг';
            dateInput.pattern = '\\d{2}\\.\\d{2}\\.\\d{4}';
            dateInput.title = 'Введите дату в формате дд.мм.гггг';

            // Добавляем маску ввода
            dateInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/[^\d]/g, '');
                if (value.length >= 2 && value.length < 4) {
                    value = value.substring(0, 2) + '.' + value.substring(2);
                } else if (value.length >= 4 && value.length < 6) {
                    value = value.substring(0, 2) + '.' + value.substring(2, 4) + '.' + value.substring(4);
                } else if (value.length >= 6) {
                    value = value.substring(0, 2) + '.' + value.substring(2, 4) + '.' + value.substring(4, 8);
                }
                e.target.value = value;
            });

            // Обработчик изменения даты вручную - обновляем календарь
            dateInput.addEventListener('change', function(e) {
                const value = e.target.value;
                // Проверяем формат даты
                const regex = /^(\d{2})\.(\d{2})\.(\d{4})$/;
                const match = value.match(regex);
                if (match) {
                    const day = match[1];
                    const month = match[2];
                    const year = match[3];

                    // Обновляем selectedDateValue
                    selectedDateValue = value;

                    // Ищем соответствующую дату в календаре и выбираем ее
                    selectDateInCalendar(day, month, year);
                } else {
                    console.log('Неверный формат даты');
                }
            });

            dfield.appendChild(dateInput);

            // Создаем span для ошибок
            const uhSpan = document.createElement('span');
            uhSpan.className = 'uh';

            dateInputContainer.appendChild(label);
            dateInputContainer.appendChild(dfield);
            dateInputContainer.appendChild(uhSpan);

            // Создаем clearer
            const clearer = document.createElement('div');
            clearer.className = 'clearer';
            dateInputContainer.appendChild(clearer);

            // Добавляем поле в начало .anketa-col-2
            anketaCol2.insertBefore(dateInputContainer, anketaCol2.firstChild);

            console.log('Поле ввода даты добавлено в начало .anketa-col-2');
            return true;
        }

        // Функция для поиска даты в календаре по классу
        function findDateElementInCalendar(dateStr) {
            const calendar = document.querySelector('.fieldCalendarfieldname1_1');
            if (!calendar) return null;

            // Ищем элемент с классом, содержащим дату (например, "2026-02-20")
            // Дата может быть в классе как "2026-02-20", так и "d2026-02-20"
            const dateElement = calendar.querySelector(`[class*="${dateStr}"]`);

            if (!dateElement) {
                // Также пробуем найти по data-date (только день)
                const day = dateStr.split('-')[2];
                const elements = calendar.querySelectorAll(`[data-date="${day}"]`);

                for (let element of elements) {
                    // Проверяем, что у родительского элемента есть класс с датой
                    const parent = element.closest('td');
                    if (parent && parent.className.includes(dateStr)) {
                        return parent;
                    }
                }
            }

            return dateElement;
        }

        // Функция для выбора даты в календаре
        function selectDateInCalendar(day, month, year) {
            const calendar = document.querySelector('.fieldCalendarfieldname1_1');
            if (!calendar) return false;

            // Формируем дату в формате yyyy-mm-dd
            const dateStr = `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`;

            // Ищем элемент с соответствующей датой
            const dateElement = findDateElementInCalendar(dateStr);

            if (dateElement) {
                // Удаляем класс ui-state-active у всех элементов
                const allActiveElements = calendar.querySelectorAll('.ui-state-active');
                allActiveElements.forEach(el => {
                    el.classList.remove('ui-state-active');
                });

                // Добавляем класс ui-state-active к выбранному элементу
                const linkElement = dateElement.querySelector('a');
                if (linkElement) {
                    linkElement.classList.add('ui-state-active');
                }

                // Кликаем по элементу для выбора даты
                dateElement.click();
                console.log('Дата выбрана в календаре:', dateStr);

                // Обновляем selectedDateValue
                selectedDateValue = `${day.padStart(2, '0')}.${month.padStart(2, '0')}.${year}`;

                // Сохраняем в sessionStorage
                saveToSessionStorage();

                // Также обновляем поле ввода даты
                updateDateInputFieldFromSelectedDate();

                return true;
            } else {
                console.log('Дата не найдена в текущем месяце:', dateStr);

                // Пробуем переключить месяц
                return trySwitchCalendarMonth(day, month, year);
            }
        }

        // Функция для переключения месяца в календаре
        function trySwitchCalendarMonth(day, month, year) {
            const calendar = document.querySelector('.fieldCalendarfieldname1_1');
            if (!calendar) return false;

            // Получаем текущий месяц и год из календаря
            const monthElement = calendar.querySelector('.ui-datepicker-month');
            const yearElement = calendar.querySelector('.ui-datepicker-year');

            if (!monthElement || !yearElement) return false;

            const currentMonth = monthElement.textContent;
            const currentYear = yearElement.textContent;

            // Преобразуем названия месяцев в номера (нумерация с 0)
            const monthNames = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
                'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
            const monthNamesGenitive = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня',
                'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];

            let currentMonthIndex = monthNames.findIndex(m => m === currentMonth);
            if (currentMonthIndex === -1) {
                currentMonthIndex = monthNamesGenitive.findIndex(m => m === currentMonth);
            }

            // Целевой месяц (месяцы в JavaScript начинаются с 0, поэтому month-1)
            const targetMonthIndex = parseInt(month) - 1;
            const targetYear = parseInt(year);

            if (currentMonthIndex === -1) {
                console.log('Не удалось определить текущий месяц');
                return false;
            }

            // Вычисляем разницу в месяцах
            const currentTotalMonths = parseInt(currentYear) * 12 + currentMonthIndex;
            const targetTotalMonths = targetYear * 12 + targetMonthIndex;
            const monthDiff = targetTotalMonths - currentTotalMonths;

            console.log(`Разница в месяцах: ${monthDiff} (текущий: ${currentMonthIndex+1}.${currentYear}, целевой: ${month}.${year})`);

            // Определяем, нужно ли переключать месяц
            if (monthDiff === 0) {
                // Месяц совпадает, но дата не найдена - возможно, дата неактивна или скрыта
                console.log('Месяц совпадает, но дата не найдена');
                return false;
            }

            // Определяем направление переключения
            const isForward = monthDiff > 0;
            const buttonClass = isForward ? '.ui-datepicker-next' : '.ui-datepicker-prev';
            const switchButton = calendar.querySelector(buttonClass);

            if (!switchButton) {
                console.log('Кнопка переключения месяца не найдена');
                return false;
            }

            // Кликаем по кнопке нужное количество раз
            let attempts = Math.abs(monthDiff);
            let success = false;

            const switchMonth = function(remainingAttempts) {
                if (remainingAttempts <= 0) {
                    // После всех переключений пробуем найти дату
                    setTimeout(function() {
                        const dateStr = `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`;
                        const dateElement = findDateElementInCalendar(dateStr);

                        if (dateElement) {
                            // Удаляем класс ui-state-active у всех элементов
                            const allActiveElements = calendar.querySelectorAll('.ui-state-active');
                            allActiveElements.forEach(el => {
                                el.classList.remove('ui-state-active');
                            });

                            // Добавляем класс ui-state-active к выбранному элементу
                            const linkElement = dateElement.querySelector('a');
                            if (linkElement) {
                                linkElement.classList.add('ui-state-active');
                            }

                            // Кликаем по элементу для выбора даты
                            dateElement.click();
                            console.log('Дата выбрана в календаре после переключения месяца:', dateStr);

                            // Обновляем selectedDateValue
                            selectedDateValue = `${day.padStart(2, '0')}.${month.padStart(2, '0')}.${year}`;

                            // Сохраняем в sessionStorage
                            saveToSessionStorage();

                            // Также обновляем поле ввода даты
                            updateDateInputFieldFromSelectedDate();

                            success = true;
                        } else {
                            console.log('Дата не найдена даже после переключения месяца');
                            success = false;
                        }
                    }, 500); // Даем время на обновление календаря
                    return;
                }

                // Кликаем по кнопке переключения
                switchButton.click();
                console.log(`Переключение месяца (осталось попыток: ${remainingAttempts - 1})`);

                // Ждем и продолжаем
                setTimeout(function() {
                    switchMonth(remainingAttempts - 1);
                }, 500);
            };

            // Начинаем переключение
            switchMonth(attempts);

            // Возвращаем успех (хотя операция асинхронная)
            return true;
        }

        // Функция для обновления поля ввода даты при выборе даты в календаре
        function updateDateInputFromCalendar() {
            const dateInput = document.getElementById('dateInputField');
            if (!dateInput) return;

            // Ищем активную дату в календаре
            const activeDateElement = document.querySelector('.fieldCalendarfieldname1_1 .ui-state-active');
            if (activeDateElement) {
                // Находим родительскую ячейку (td)
                const tdElement = activeDateElement.closest('td');
                if (tdElement) {
                    // Ищем класс с датой в формате yyyy-mm-dd
                    const classList = Array.from(tdElement.classList);
                    const dateClass = classList.find(cls => cls.match(/^\d{4}-\d{2}-\d{2}$/) || cls.match(/^d\d{4}-\d{2}-\d{2}$/));

                    if (dateClass) {
                        // Убираем префикс 'd' если есть
                        const dateStr = dateClass.replace(/^d/, '');
                        // Преобразуем из формата yyyy-mm-dd в dd.mm.yyyy
                        const parts = dateStr.split('-');
                        if (parts.length === 3) {
                            selectedDateValue = `${parts[2]}.${parts[1]}.${parts[0]}`;
                            dateInput.value = selectedDateValue;

                            // Сохраняем в sessionStorage
                            saveToSessionStorage();

                            console.log('Поле ввода даты обновлено из календаря:', selectedDateValue);
                            return;
                        }
                    }
                }

                // Альтернативный способ: получаем дату из атрибутов
                const month = tdElement ? tdElement.getAttribute('data-month') : null;
                const year = tdElement ? tdElement.getAttribute('data-year') : null;
                const day = activeDateElement.getAttribute('data-date');

                if (month !== null && year !== null && day !== null) {
                    // Месяцы в JavaScript начинаются с 0, добавляем 1
                    const monthNum = parseInt(month) + 1;
                    selectedDateValue = `${day.padStart(2, '0')}.${monthNum.toString().padStart(2, '0')}.${year}`;
                    dateInput.value = selectedDateValue;

                    // Сохраняем в sessionStorage
                    saveToSessionStorage();

                    console.log('Поле ввода даты обновлено из календаря (через атрибуты):', selectedDateValue);
                    return;
                }
            } else {
                // Если активной даты нет, проверяем текущий день (today)
                const todayElement = document.querySelector('.fieldCalendarfieldname1_1 .ui-datepicker-today');
                if (todayElement) {
                    // Получаем дату из атрибутов data-*
                    const month = todayElement.getAttribute('data-month');
                    const year = todayElement.getAttribute('data-year');
                    const dayElement = todayElement.querySelector('a');

                    if (dayElement && month !== null && year !== null) {
                        const day = dayElement.getAttribute('data-date') || dayElement.textContent.trim();
                        // Месяцы в JavaScript начинаются с 0, добавляем 1
                        const monthNum = parseInt(month) + 1;
                        selectedDateValue = `${day.padStart(2, '0')}.${monthNum.toString().padStart(2, '0')}.${year}`;
                        dateInput.value = selectedDateValue;

                        // Сохраняем в sessionStorage
                        saveToSessionStorage();

                        console.log('Поле ввода даты обновлено (сегодня):', selectedDateValue);
                        return;
                    }
                } else {
                    // Если нет активной даты и нет today, оставляем поле пустым
                    dateInput.value = '';
                    selectedDateValue = '';

                    // Сохраняем в sessionStorage
                    saveToSessionStorage();

                    console.log('Нет активной даты в календаре, поле очищено');
                }
            }
        }

        // Наблюдатель за кликами в календаре (вместо наблюдения за классами)
        function startDateInputObservation() {
            if (dateInputObserver) {
                dateInputObserver.disconnect();
            }

            dateInputObserver = new MutationObserver(function(mutations) {
                // При любых изменениях в календаре проверяем активную дату
                setTimeout(() => updateDateInputFromCalendar(), 50);
            });

            // Начинаем наблюдение за календарем
            const calendar = document.querySelector('.fieldCalendarfieldname1_1');
            if (calendar) {
                // Добавляем обработчик клика для календаря (делегирование событий)
                calendar.addEventListener('click', function(e) {
                    // Проверяем, кликнули ли по элементу с датой
                    const target = e.target;
                    if (target.tagName === 'A' && target.closest('.fieldCalendarfieldname1_1')) {
                        // Даем время на обновление классов
                        setTimeout(() => updateDateInputFromCalendar(), 100);
                    }
                });

                dateInputObserver.observe(calendar, {
                    childList: true,
                    subtree: true,
                    attributes: true
                });
                console.log('Наблюдение за календарем для поля ввода даты начато');

                // Обновляем поле ввода начальным значением
                setTimeout(() => updateDateInputFromCalendar(), 200);
            }
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
                callButton.textContent = 'Отправить заявку';
                callButton.disabled = false; // Кнопка всегда активна

                // Добавляем кнопку в конец блока .anketa-col-2
                anketaCol2.appendChild(callButton);

                console.log('Кнопка "Отправить заявку" добавлена');
            }

            // Обработчик клика для кнопки
            callButton.addEventListener('click', function(e) {
                e.stopPropagation();
                console.log('Клик по кнопке "Отправить заявку"');

                // Проверяем все обязательные поля
                const allValid = validateAllRequiredFields();

                if (allValid) {
                    // Если все поля заполнены, показываем блок .slotsCalendarfieldname1_1
                    const slotsCalendar = document.querySelector('.slotsCalendarfieldname1_1');
                    if (slotsCalendar) {
                        slotsCalendar.style.display = 'block';
                        console.log('Блок .slotsCalendarfieldname1_1 показан');
                    }
                } else {
                    console.log('Не все обязательные поля заполнены');
                    // Прокручиваем к первой ошибке
                    const firstError = document.querySelector('.cpefb_error.message');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });

            return true;
        }

        // Функция для добавления стилей для кнопки вызова
        function addCallButtonStyles() {
            // Проверяем, не добавлены ли уже стили
            if (document.querySelector('style[data-call-button]')) return;

            const style = document.createElement('style');
            style.setAttribute('data-call-button', 'true');
            style.textContent = ``;

            document.head.appendChild(style);
            console.log('Стили для кнопки вызова добавлены');
        }

        // Функция для проверки и инициализации календаря
        function initSlotsCalendar() {
            const slotsCalendar = document.querySelector('.slotsCalendarfieldname1_1');
            if (slotsCalendar) {
                // Убедимся, что календарь скрыт по умолчанию
                if (slotsCalendar.style.display !== 'none') {
                    slotsCalendar.style.display = 'none';
                    console.log('Блок .slotsCalendarfieldname1_1 скрыт по умолчанию');
                }

                // Проверяем, не добавлены ли уже элементы
                if (!slotsCalendar.querySelector('.closer')) {
                    decorateSlotsCalendar();
                }

                // Запускаем наблюдение за выбором даты и времени
                startSelectionObservation();
            }
        }

        // Функция для добавления классов к блоку .ahb_m4
        function addClassesToAhbM4() {
            const ahbM4Elements = document.querySelectorAll('.ahb_m4');

            ahbM4Elements.forEach(element => {
                // Проверяем, не добавлены ли уже классы
                if (!element.classList.contains('z-20') ||
                    !element.classList.contains('bg-surface') ||
                    !element.classList.contains('relative')) {

                    // Добавляем все необходимые классы
                    element.classList.add(
                        'z-20',
                        'bg-surface',
                        'relative',
                        '[border-radius:0_0_50%_50%_/_0_0_40px_40px]',
                        'lg:[border-radius:0_0_50%_50%_/_0_0_80px_80px]'
                    );

                    console.log('Классы добавлены к элементу .ahb_m4');
                }
            });

            return ahbM4Elements.length > 0;
        }

        // Функция для создания и показа модального окна с корректными данными
        function createAndShowModal(message) {
            // Проверяем, не существует ли уже модальное окно
            if (document.getElementById('successModal')) {
                console.log('Модальное окно уже существует');
                return;
            }

            console.log('Создаем модальное окно с сообщением:', message);

            // Создаем модальное окно
            const modal = document.createElement('div');
            modal.id = 'successModal';
            modal.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 10000;
            display: flex;
            justify-content: center;
            align-items: center;
        `;

            // Создаем содержимое модального окна
            const modalContent = document.createElement('div');
            modalContent.style.cssText = `
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        `;

            // Добавляем заголовок
            const title = document.createElement('h3');
            title.textContent = 'Запись успешно отправлена!';
            title.style.cssText = `
            margin: 0 0 20px 0;
            text-align: center;
            color: #333;
        `;
            modalContent.appendChild(title);

            // Добавляем сообщение
            const messageElement = document.createElement('p');
            messageElement.textContent = message;
            messageElement.style.cssText = `
            font-size: 16px;
            line-height: 1.5;
            color: #555;
            margin-bottom: 25px;
            text-align: center;
        `;
            modalContent.appendChild(messageElement);

            // Добавляем кнопку закрытия
            const closeButton = document.createElement('button');
            closeButton.textContent = 'Закрыть';
            closeButton.style.cssText = `
            display: block;
            margin: 0 auto;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        `;

            // Обработчик закрытия модального окна
            closeButton.addEventListener('click', function() {
                const modal = document.getElementById('successModal');
                if (modal) {
                    document.body.removeChild(modal);
                    console.log('Модальное окно закрыто');
                }
            });

            // Также закрываем по клику на фон
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    document.body.removeChild(modal);
                    console.log('Модальное окно закрыто по клику на фон');
                }
            });

            modalContent.appendChild(closeButton);
            modal.appendChild(modalContent);

            // Добавляем модальное окно в body
            document.body.appendChild(modal);

            console.log('Модальное окно показано');
        }

        // Функция для формирования корректного сообщения
        function getSuccessMessage() {
            let message = 'Вы записаны на юридическую консультацию';

            // Добавляем дату, если она есть
            if (selectedDateValue) {
                message += ` ${selectedDateValue}`;

                // Добавляем время, если оно есть
                if (selectedTimeValue) {
                    message += ` в ${selectedTimeValue}`;
                }
            } else {
                message += '.';
            }

            return message;
        }

        // Основная функция для проверки и показа модального окна
        function checkAndShowSuccessModal() {
            // Проверяем sessionStorage на наличие данных об успешной отправке
            const hasSuccessRedirect = sessionStorage.getItem(STORAGE_KEYS.HAS_SUCCESS) === 'true';

            // Также проверяем URL на наличие #success
            const hasSuccessHash = window.location.hash === '#success';

            if (hasSuccessRedirect || hasSuccessHash) {
                console.log('Обнаружена успешная отправка формы');

                // Загружаем данные из sessionStorage
                const { savedDate, savedTime } = loadFromSessionStorage();

                // Обновляем переменные из sessionStorage
                if (savedDate) selectedDateValue = savedDate;
                if (savedTime) selectedTimeValue = savedTime;

                // Формируем сообщение
                const message = getSuccessMessage();
                console.log('Показываем модальное окно с данными из sessionStorage:', message);

                // Показываем модальное окно
                createAndShowModal(message);

                // Очищаем sessionStorage после показа
                clearSessionStorage();

                // Убираем hash из URL, если он есть
                if (hasSuccessHash) {
                    history.replaceState(null, null, window.location.pathname);
                }

                return true;
            }

            return false;
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
                                startSelectionObservation();
                            }, 100);
                            changesMade = true;
                        }

                        // Проверяем, является ли узел или содержит ли .slots
                        if ((node.nodeType === 1 && node.classList && node.classList.contains('slots')) ||
                            (node.querySelector && node.querySelector('.slots'))) {
                            setTimeout(() => {
                                wrapSlotsContent();
                                updateSelectedDate();
                            }, 100);
                            changesMade = true;
                        }

                        // Проверяем, является ли узел или содержит ли .anketa-col-1
                        if ((node.nodeType === 1 && node.classList && node.classList.contains('anketa-col-1')) ||
                            (node.querySelector && node.querySelector('.anketa-col-1'))) {
                            setTimeout(() => {
                                addRequiredCheckboxes();
                            }, 100);
                            changesMade = true;
                        }

                        // Проверяем, является ли узел или содержит ли .anketa-col-2
                        if ((node.nodeType === 1 && node.classList && node.classList.contains('anketa-col-2')) ||
                            (node.querySelector && node.querySelector('.anketa-col-2'))) {
                            setTimeout(() => {
                                addCallButtonStyles();
                                addCallButton();
                                addDateInputField();
                                startDateInputObservation();
                            }, 100);
                            changesMade = true;
                        }

                        // Проверяем, является ли узел или содержит ли .slotsCalendarfieldname1_1
                        if ((node.nodeType === 1 && node.classList && node.classList.contains('slotsCalendarfieldname1_1')) ||
                            (node.querySelector && node.querySelector('.slotsCalendarfieldname1_1'))) {
                            setTimeout(() => {
                                initSlotsCalendar();
                                startSelectionObservation();
                            }, 100);
                            changesMade = true;
                        }

                        // Проверяем, является ли узел или содержит ли .ahb_m4
                        if ((node.nodeType === 1 && node.classList && node.classList.contains('ahb_m4')) ||
                            (node.querySelector && node.querySelector('.ahb_m4'))) {
                            setTimeout(() => addClassesToAhbM4(), 100);
                            changesMade = true;
                        }

                        // Проверяем, является ли узел или содержит ли .fieldCalendarfieldname1_1
                        if ((node.nodeType === 1 && node.classList && node.classList.contains('fieldCalendarfieldname1_1')) ||
                            (node.querySelector && node.querySelector('.fieldCalendarfieldname1_1'))) {
                            setTimeout(() => {
                                startDateInputObservation();
                                updateDateInputFromCalendar();
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
                            startSelectionObservation();
                        }, 50);
                        changesMade = true;
                    }

                    // Проверяем, появился ли .slots внутри измененного элемента
                    if (mutation.target.querySelector && mutation.target.querySelector('.slots')) {
                        setTimeout(() => {
                            wrapSlotsContent();
                            updateSelectedDate();
                        }, 50);
                        changesMade = true;
                    }

                    // Проверяем, появился ли .anketa-col-1 внутри измененного элемента
                    if (mutation.target.querySelector && mutation.target.querySelector('.anketa-col-1')) {
                        setTimeout(() => {
                            addRequiredCheckboxes();
                        }, 50);
                        changesMade = true;
                    }

                    // Проверяем, появился ли .anketa-col-2 внутри измененного элемента
                    if (mutation.target.querySelector && mutation.target.querySelector('.anketa-col-2')) {
                        setTimeout(() => {
                            addCallButtonStyles();
                            addCallButton();
                            addDateInputField();
                            startDateInputObservation();
                        }, 50);
                        changesMade = true;
                    }

                    // Проверяем, появился ли .ahb_m4 внутри измененного элемента
                    if (mutation.target.querySelector && mutation.target.querySelector('.ahb_m4')) {
                        setTimeout(() => addClassesToAhbM4(), 50);
                        changesMade = true;
                    }

                    // Проверяем, появился ли .fieldCalendarfieldname1_1 внутри измененного элемента
                    if (mutation.target.querySelector && mutation.target.querySelector('.fieldCalendarfieldname1_1')) {
                        setTimeout(() => {
                            startDateInputObservation();
                            updateDateInputFromCalendar();
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

                        // Обновляем время при изменении слотов
                        setTimeout(() => updateSelectedTime(), 50);
                    }

                    // Проверка для поля textarea
                    const target = mutation.target.querySelector('#field_1-6, #fieldname8_1');
                    if (target && document.getElementById('fieldname8_1')) {
                        setTimeout(() => replaceInputWithTextarea(), 50);
                        changesMade = true;
                    }
                }

                // Отслеживаем изменения классов для выбора времени
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    const target = mutation.target;
                    if (target.classList &&
                        (target.classList.contains('currentSelection') || target.classList.contains('choosen') ||
                            target.classList.contains('availableslot') || target.classList.contains('htmlUsed'))) {
                        setTimeout(() => updateSelectedTime(), 50);
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
                    addCallButtonStyles();
                    addCallButton();
                    initSlotsCalendar();
                    startSelectionObservation();
                    updateSelectedDate();
                    updateSelectedTime();
                    addClassesToAhbM4();
                    addRequiredCheckboxes();
                    addDateInputField();
                    startDateInputObservation();
                    updateDateInputFromCalendar();
                    setupFormSubmitHandler();
                }, 100);
            }
        });

        // Старт наблюдения
        observer.observe(document.body, {
            childList: true,
            subtree: true,
            attributes: true,
            attributeFilter: ['class']
        });

        // Начальная проверка при загрузке страницы
        function initialCheck() {
            // Сначала загружаем данные из sessionStorage
            loadFromSessionStorage();

            restructureForm();
            replaceInputWithTextarea();
            decorateSlotsCalendar();
            wrapSlotsContent();
            addCalendarLegend();
            addCallButtonStyles();
            addCallButton();
            initSlotsCalendar();

            // Запускаем наблюдение за выбором даты и времени
            startSelectionObservation();

            // Обновляем начальные значения
            updateSelectedDate();
            updateSelectedTime();

            // Добавляем классы к .ahb_m4
            addClassesToAhbM4();

            // Добавляем обязательные чекбоксы
            addRequiredCheckboxes();

            // Добавляем поле ввода даты
            addDateInputField();
            startDateInputObservation();
            updateDateInputFromCalendar();

            // Синхронизируем поле ввода даты с selectedDateValue
            if (selectedDateValue) {
                updateDateInputFieldFromSelectedDate();
            }

            // Настраиваем обработчик отправки формы
            setupFormSubmitHandler();

            // Проверяем и показываем модальное окно, если нужно
            checkAndShowSuccessModal();
        }

        // Запускаем начальную проверку
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initialCheck);
        } else {
            initialCheck();
        }

        // Слушатель hashchange
        window.addEventListener('hashchange', function() {
            if (window.location.hash === '#success') {
                console.log('Обнаружен #success через hashchange');
                checkAndShowSuccessModal();
            }
        });
        console.log('000001111');
    </script>
<?php
    get_template_part( 'template-parts/home/donation' );
?>
<?php
get_footer();
