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
                console.log('Клик по кнопке "КНОПКА ВЫЗОВА"');

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
            }
        }

        // Функция для получения выбранной даты и времени
        // Функция для получения выбранной даты и времени
        function getSelectedDateTime() {
            let selectedDate = '';
            let selectedTime = '';

            try {
                // Получаем дату из .slots span в блоке slotsCalendarfieldname1_1
                const slotsCalendar = document.querySelector('.slotsCalendarfieldname1_1');
                if (slotsCalendar) {
                    // Ищем блок .slots внутри slotsCalendar
                    const slotsContainer = slotsCalendar.querySelector('.slots');
                    if (slotsContainer) {
                        // Получаем дату из span
                        const dateSpan = slotsContainer.querySelector('span');
                        if (dateSpan) {
                            selectedDate = dateSpan.textContent.trim();
                            console.log('Найдена дата из .slots span:', selectedDate);
                        }
                    }

                    // Получаем время из .currentSelection a
                    const currentSelection = slotsCalendar.querySelector('.currentSelection a');
                    if (currentSelection) {
                        selectedTime = currentSelection.textContent.trim();
                        console.log('Найдено время из .currentSelection a:', selectedTime);
                    } else {
                        // Если нет currentSelection, проверяем .choosen a (возможная опечатка в HTML)
                        const choosenSelection = slotsCalendar.querySelector('.choosen a');
                        if (choosenSelection) {
                            selectedTime = choosenSelection.textContent.trim();
                            console.log('Найдено время из .choosen a:', selectedTime);
                        } else {
                            // Проверяем скрытое поле fieldname1_1
                            const hiddenField = document.getElementById('fieldname1_1');
                            if (hiddenField && hiddenField.value) {
                                // Пытаемся извлечь время из формата "2026-01-27 10:00-11:00"
                                const timeMatch = hiddenField.value.match(/\s(\d{2}:\d{2})/);
                                if (timeMatch) {
                                    selectedTime = timeMatch[1];
                                    console.log('Извлечено время из hidden field:', selectedTime);
                                }
                            }
                        }
                    }
                }
            } catch (error) {
                console.error('Ошибка при получении даты и времени:', error);
            }

            console.log('Итоговые дата и время:', { selectedDate, selectedTime });
            return { selectedDate, selectedTime };
        }

        // Вспомогательная функция для преобразования месяца в число
        function getMonthNumber(monthName) {
            const months = {
                'январь': '01', 'января': '01',
                'февраль': '02', 'февраля': '02',
                'март': '03', 'марта': '03',
                'апрель': '04', 'апреля': '04',
                'май': '05', 'мая': '05',
                'июнь': '06', 'июня': '06',
                'июль': '07', 'июля': '07',
                'август': '08', 'августа': '08',
                'сентябрь': '09', 'сентября': '09',
                'октябрь': '10', 'октября': '10',
                'ноябрь': '11', 'ноября': '11',
                'декабрь': '12', 'декабря': '12'
            };

            // Приводим к нижнему регистру и обрезаем пробелы
            const normalizedMonth = monthName.toLowerCase().trim();
            return months[normalizedMonth] || '01';
        }

        // Функция для проверки URL и показа модального окна (обновленная)
        function checkSuccessUrlAndShowModal() {
            // Проверяем, есть ли в URL hash #success
            if (window.location.hash === '#success') {
                console.log('Обнаружен #success в URL');

                // Даем больше времени для полной загрузки всех элементов
                setTimeout(() => {
                    console.log('Начинаем получение даты и времени...');

                    // Пробуем получить выбранные дату и время
                    const { selectedDate, selectedTime } = getSelectedDateTime();

                    console.log('Полученные данные:', { selectedDate, selectedTime });

                    // Формируем сообщение
                    let message = 'Вы записаны на юридическую консультацию';
                    if (selectedDate && selectedTime) {
                        message += ` ${selectedDate} в ${selectedTime}`;
                    } else if (selectedDate) {
                        message += ` ${selectedDate}`;
                        if (selectedTime) {
                            message += ` в ${selectedTime}`;
                        }
                    } else {
                        message += '.';
                    }

                    console.log('Сообщение для модального окна:', message);

                    // Создаем и показываем модальное окно
                    createAndShowModal(message);
                }, 1500); // Увеличил время ожидания
            }
        }
        // Также обновим initialCheck чтобы он тоже проверял URL
        function initialCheck() {
            restructureForm();
            replaceInputWithTextarea();
            decorateSlotsCalendar();
            wrapSlotsContent();
            addCalendarLegend();
            addCallButtonStyles();
            addCallButton();
            initSlotsCalendar();

            // Проверяем URL и показываем модальное окно, если нужно
            checkSuccessUrlAndShowModal();
        }

        // Функция для создания и показа модального окна
        function createAndShowModal(message) {
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
            z-index: 9999;
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
                document.body.removeChild(modal);
                // Убираем hash из URL без перезагрузки страницы
                history.replaceState(null, null, window.location.pathname);
            });

            modalContent.appendChild(closeButton);
            modal.appendChild(modalContent);

            // Добавляем модальное окно в body
            document.body.appendChild(modal);

            console.log('Модальное окно показано с сообщением:', message);
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

                        // Проверяем, является ли узел или содержит ли .anketa-col-2
                        if ((node.nodeType === 1 && node.classList && node.classList.contains('anketa-col-2')) ||
                            (node.querySelector && node.querySelector('.anketa-col-2'))) {
                            setTimeout(() => {
                                addCallButtonStyles();
                                addCallButton();
                            }, 100);
                            changesMade = true;
                        }

                        // Проверяем, является ли узел или содержит ли .slotsCalendarfieldname1_1
                        if ((node.nodeType === 1 && node.classList && node.classList.contains('slotsCalendarfieldname1_1')) ||
                            (node.querySelector && node.querySelector('.slotsCalendarfieldname1_1'))) {
                            setTimeout(() => {
                                initSlotsCalendar();
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

                    // Проверяем, появился ли .anketa-col-2 внутри измененного элемента
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
            addCallButtonStyles();
            addCallButton();
            initSlotsCalendar();

            // Проверяем URL и показываем модальное окно, если нужно
            checkSuccessUrlAndShowModal();
        }

        // Запускаем начальную проверку
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initialCheck);
        } else {
            initialCheck();
        }
        console.log('test!2');
    </script>
<?php
get_footer();
