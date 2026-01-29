<?php
/*
    Template Name: Get Legal Assistance Page
    Template Post Type: page
    Post Type: page
 */
?>


<?php
get_header();
?>
    <script>
        console.log('WTF');
        // === 1. ПОЛНАЯ ИЗОЛЯЦИЯ КЛИКОВ В SLOTS-CONTENT ===
        (function() {
            // Находим контейнер слотов
            const slotsContainer = document.querySelector('.slots-content');
            if (!slotsContainer) {
                console.log('Контейнер .slots-content не найден');
                return;
            }

            // Сохраняем ссылку на оригинальный прототип addEventListener
            const originalAddEventListener = EventTarget.prototype.addEventListener;

            // Переопределяем addEventListener для ВСЕХ элементов ВНУТРИ контейнера
            function hijackEventListenersInsideContainer(container) {
                // Рекурсивно обходим все элементы внутри контейнера
                const allElements = container.querySelectorAll('*');

                allElements.forEach(element => {
                    // "Замораживаем" оригинальный addEventListener для этого элемента
                    element._originalAddEventListener = element.addEventListener;
                    element.addEventListener = function(type, listener, options) {
                        // Блокируем добавление ЛЮБЫХ обработчиков клика
                        if (type === 'click' || type === 'mousedown' || type === 'mouseup') {
                            console.log('🚫 Заблокирован обработчик', type, 'для', element);
                            return; // Не добавляем обработчик
                        }
                        // Для других событий — работаем как обычно
                        return originalAddEventListener.call(this, type, listener, options);
                    };
                });

                // Также перехватываем addEventListener самого контейнера
                container._originalAddEventListener = container.addEventListener;
                container.addEventListener = function(type, listener, options) {
                    if (type === 'click' || type === 'mousedown' || type === 'mouseup') {
                        console.log('🚫 Заблокирован обработчик', type, 'для контейнера');
                        return;
                    }
                    return originalAddEventListener.call(this, type, listener, options);
                };
            }

            // Запускаем изоляцию
            hijackEventListenersInsideContainer(slotsContainer);
            console.log('🛡️ Изоляция .slots-content активирована');

            // === 2. НАШ ОБРАБОТЧИК ДЛЯ ВЫБОРА ВРЕМЕНИ ===
            slotsContainer.addEventListener('click', function(event) {
                // Находим ближайший слот времени
                const slot = event.target.closest('.availableslot, .htmlUsed');
                if (!slot) return;

                console.log('✅ Наш обработчик: клик на слот', slot);

                // 1. Немедленно останавливаем всплытие события
                event.stopImmediatePropagation();
                event.stopPropagation();
                event.preventDefault();

                // 2. Снимаем выделение со всех слотов
                document.querySelectorAll('.currentSelection, .choosen').forEach(el => {
                    el.classList.remove('currentSelection', 'choosen');
                });

                // 3. Добавляем выделение к выбранному слоту
                slot.classList.add('my-selected-time');

                // 4. Получаем текст времени
                const timeText = slot.querySelector('a')?.textContent;
                if (!timeText) return;

                console.log('Выбрано время:', timeText);

                // 5. Обновляем переменные и sessionStorage
                selectedTimeValue = timeText;
                if (selectedDateValue) {
                    saveToSessionStorage();
                }

                // 6. Стабилизируем прокрутку (если нужно)
                stabilizeScroll();
            }, true); // Используем фазу захвата для приоритета
        })();
    </script>
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

        // Флаг для блокировки обработки прокрутки плагином
        let isManualScrollControl = false;
        // Переменная для хранения позиции прокрутки
        let savedScrollPosition = 0;

        // Константы для ключей sessionStorage
        const STORAGE_KEYS = {
            DATE: 'selectedDateValue',
            TIME: 'selectedTimeValue',
            HAS_SUCCESS: 'hasSuccessRedirect'
        };

        // ==================== УЛУЧШЕННАЯ ФУНКЦИЯ СТАБИЛИЗАЦИИ ПРОКРУТКИ ====================
        function stabilizeScroll() {
            isManualScrollControl = true;
            const slotsContent = document.querySelector('.slots-content');

            if (slotsContent) {
                // Сохраняем текущую позицию
                savedScrollPosition = slotsContent.scrollTop;

                // Восстанавливаем позицию немедленно
                slotsContent.scrollTop = savedScrollPosition;

                // Дополнительные попытки восстановления
                setTimeout(() => {
                    slotsContent.scrollTop = savedScrollPosition;
                }, 50);

                setTimeout(() => {
                    slotsContent.scrollTop = savedScrollPosition;
                    isManualScrollControl = false;
                }, 150);
            }
        }

        // ==================== ПЕРЕХВАТ УПРАВЛЕНИЯ ПРОКРУТКОЙ ====================
        function setupScrollControl() {
            const slotsContent = document.querySelector('.slots-content');
            if (!slotsContent) return;

            // Сохраняем оригинальный scrollTop setter/getter
            const originalScrollTop = Object.getOwnPropertyDescriptor(
                Element.prototype,
                'scrollTop'
            );

            // Переопределяем scrollTop для этого элемента
            Object.defineProperty(slotsContent, 'scrollTop', {
                get: function() {
                    if (isManualScrollControl) {
                        return savedScrollPosition;
                    }
                    return originalScrollTop.get.call(this);
                },
                set: function(value) {
                    if (isManualScrollControl) {
                        // Игнорируем попытки плагина изменить прокрутку
                        originalScrollTop.set.call(this, savedScrollPosition);
                        return savedScrollPosition;
                    }
                    return originalScrollTop.set.call(this, value);
                },
                configurable: true
            });

            // Отключаем все возможные анимации прокрутки
            slotsContent.style.scrollBehavior = 'auto';
            slotsContent.style.overflowAnchor = 'none';

            //console.log('Управление прокруткой перехвачено');
        }

        // Функция для валидации email полей
        function validateEmailFields() {
            const email1 = document.getElementById('email_1');
            const email2 = document.getElementById('fieldname7_1');
            let isValid = true;

            if (!email1 || !email2) {
                hideEmailMismatchError();
                return true;
            }

            const email1Value = email1.value.trim();
            const email2Value = email2.value.trim();

            if (email1Value === '' && email2Value === '') {
                hideEmailMismatchError();
                return true;
            }

            if (email1Value !== '' && email2Value !== '') {
                if (email1Value !== email2Value) {
                    showEmailMismatchError();
                    isValid = false;
                } else {
                    hideEmailMismatchError();
                }
            }
            else {
                hideEmailMismatchError();
            }

            return isValid;
        }

        // Функция для показа ошибки несовпадения email
        function showEmailMismatchError() {
            const email2 = document.getElementById('fieldname7_1');
            if (!email2) return;

            const errorId = 'fieldname7_1-email-mismatch';
            let errorElement = document.getElementById(errorId);

            if (!errorElement) {
                errorElement = document.createElement('div');
                errorElement.id = errorId;
                errorElement.className = 'cpefb_error message';
                errorElement.textContent = 'Электронная почта не совпадает';
                errorElement.style.color = '#ff0000';
                errorElement.style.fontSize = '12px';
                errorElement.style.marginTop = '5px';

                const fieldContainer = email2.closest('.fields') || email2.parentNode;
                const existingError = fieldContainer.querySelector('#fieldname7_1-error');
                if (existingError) {
                    fieldContainer.insertBefore(errorElement, existingError);
                } else {
                    fieldContainer.appendChild(errorElement);
                }

                email2.style.borderColor = '#ff0000';
                const email1 = document.getElementById('email_1');
                if (email1) email1.style.borderColor = '#ff0000';
            } else {
                errorElement.style.display = 'block';
                email2.style.borderColor = '#ff0000';
                const email1 = document.getElementById('email_1');
                if (email1) email1.style.borderColor = '#ff0000';
            }
        }

        // Функция для скрытия ошибки несовпадения email
        function hideEmailMismatchError() {
            const errorId = 'fieldname7_1-email-mismatch';
            const errorElement = document.getElementById(errorId);
            const email2 = document.getElementById('fieldname7_1');
            const email1 = document.getElementById('email_1');

            if (errorElement) {
                errorElement.style.display = 'none';
            }

            if (email2) {
                const requiredError = document.getElementById('fieldname7_1-error');
                if (!requiredError || requiredError.style.display === 'none') {
                    email2.style.borderColor = '';
                }
            }

            if (email1) {
                const requiredError = document.getElementById('email_1-error');
                if (!requiredError || requiredError.style.display === 'none') {
                    email1.style.borderColor = '';
                }
            }
        }

        // Обновленная функция для проверки всех обязательных полей (включая email валидацию)
        function validateAllRequiredFields() {
            const requiredFields = document.querySelectorAll('.required');
            let allValid = true;

            requiredFields.forEach(field => {
                if (field.type === 'hidden') {
                    return;
                }

                const isValid = validateRequiredField(field);
                if (!isValid) {
                    allValid = false;
                }
            });

            const emailValid = validateEmailFields();
            if (!emailValid) {
                allValid = false;
            }

            return allValid;
        }

        // Функция для проверки одного обязательного поля
        function validateRequiredField(field) {
            let isValid = true;

            if (field.type === 'hidden') {
                return true;
            }

            if ((field.tagName === 'INPUT' && field.type === 'text') ||
                field.tagName === 'TEXTAREA' ||
                field.tagName === 'SELECT') {
                if (!field.value || field.value.trim() === '') {
                    isValid = false;
                }
            }

            if (field.type === 'checkbox') {
                if (!field.checked) {
                    isValid = false;
                }
            }

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

            const errorId = field.id + '-error';
            let errorElement = document.getElementById(errorId);

            if (!isValid) {
                if (!errorElement) {
                    errorElement = document.createElement('div');
                    errorElement.id = errorId;
                    errorElement.className = 'cpefb_error message';
                    errorElement.textContent = 'Обязательное поле';
                    errorElement.style.color = '#ff0000';
                    errorElement.style.fontSize = '12px';
                    errorElement.style.marginTop = '5px';

                    const fieldContainer = field.closest('.fields') || field.parentNode;
                    fieldContainer.appendChild(errorElement);

                    field.style.borderColor = '#ff0000';
                } else {
                    errorElement.style.display = 'block';
                    field.style.borderColor = '#ff0000';
                }
            } else if (errorElement) {
                errorElement.style.display = 'none';
                field.style.borderColor = '';
            }

            if (field.id === 'email_1' || field.id === 'fieldname7_1') {
                validateEmailFields();
            }

            return isValid;
        }

        // Функция для сохранения данных в sessionStorage
        function saveToSessionStorage() {
            try {
                if (selectedDateValue) {
                    sessionStorage.setItem(STORAGE_KEYS.DATE, selectedDateValue);
                }
                if (selectedTimeValue) {
                    sessionStorage.setItem(STORAGE_KEYS.TIME, selectedTimeValue);
                }
                //console.log('Данные сохранены в sessionStorage:', { selectedDateValue, selectedTimeValue });
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
                    //console.log('Дата загружена из sessionStorage:', selectedDateValue);
                }
                if (savedTime) {
                    selectedTimeValue = savedTime;
                    //console.log('Время загружено из sessionStorage:', selectedTimeValue);
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
                //console.log('sessionStorage очищен');
            } catch (e) {
                console.error('Ошибка при очистке sessionStorage:', e);
            }
        }

        // Функция для обработки отправки формы
        function setupFormSubmitHandler() {
            const mainSubmitButton = document.querySelector('.pbSubmit:not(.select-button .pbSubmit)');
            if (mainSubmitButton) {
                const newMainSubmitButton = mainSubmitButton.cloneNode(true);
                mainSubmitButton.parentNode.replaceChild(newMainSubmitButton, mainSubmitButton);

                newMainSubmitButton.addEventListener('click', function(e) {
                    //console.log('Клик по основной кнопке отправки, проверяем валидацию');

                    const allValid = validateAllRequiredFields();

                    if (allValid) {
                        //console.log('Валидация прошла, сохраняем данные в sessionStorage');
                        saveToSessionStorage();
                        sessionStorage.setItem(STORAGE_KEYS.HAS_SUCCESS, 'true');

                        const form = document.getElementById('cp_appbooking_pform_1');
                        if (form) {
                            form.submit();
                        }
                    } else {
                        //console.log('Валидация не прошла, отправка отменена');
                        e.preventDefault();
                        e.stopPropagation();

                        const firstError = document.querySelector('.cpefb_error.message[style*="display: block"], .cpefb_error.message:not([style*="display: none"])');
                        if (firstError) {
                            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }

                        return false;
                    }
                });
            }

            document.addEventListener('click', function(e) {
                if (e.target && e.target.classList && e.target.classList.contains('pbSubmit') && e.target.closest('.select-button')) {
                    //console.log('Клик по кнопке отправки в select-button, проверяем валидацию');
                    e.preventDefault();
                    e.stopPropagation();

                    const allValid = validateAllRequiredFields();

                    if (allValid) {
                        //console.log('Валидация прошла, сохраняем данные в sessionStorage');
                        saveToSessionStorage();
                        sessionStorage.setItem(STORAGE_KEYS.HAS_SUCCESS, 'true');

                        const mainSubmitButton = document.querySelector('.pbSubmit:not(.select-button .pbSubmit)');
                        if (mainSubmitButton) {
                            mainSubmitButton.click();
                        }
                    } else {
                        //console.log('Валидация не прошла, отправка отменена');

                        const firstError = document.querySelector('.cpefb_error.message[style*="display: block"], .cpefb_error.message:not([style*="display: none"])');
                        if (firstError) {
                            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    }
                }
            });

            const form = document.getElementById('cp_appbooking_pform_1');
            if (form) {
                form.addEventListener('submit', function(e) {
                    //console.log('Событие submit формы, проверяем валидацию');

                    const allValid = validateAllRequiredFields();

                    if (!allValid) {
                        //console.log('Валидация не прошла, отменяем отправку формы');
                        e.preventDefault();
                        e.stopPropagation();

                        const firstError = document.querySelector('.cpefb_error.message[style*="display: block"], .cpefb_error.message:not([style*="display: none"])');
                        if (firstError) {
                            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }

                        return false;
                    } else {
                        //console.log('Валидация прошла, сохраняем данные в sessionStorage');
                        saveToSessionStorage();
                        sessionStorage.setItem(STORAGE_KEYS.HAS_SUCCESS, 'true');
                    }
                });
            }
        }

        // Функция для настройки валидации email полей в реальном времени
        function setupEmailValidation() {
            const email1 = document.getElementById('email_1');
            const email2 = document.getElementById('fieldname7_1');

            if (email1 && email2) {
                email1.addEventListener('input', validateEmailFields);
                email2.addEventListener('input', validateEmailFields);

                email1.addEventListener('blur', validateEmailFields);
                email2.addEventListener('blur', validateEmailFields);

                //console.log('Обработчики валидации email установлены');
            }
        }

        // Функция для скрытия стандартной кнопки плагина
        function hidePluginSubmitButton() {
            const pluginSubmitButtons = document.querySelectorAll('.pbSubmit:not(.call-button)');

            pluginSubmitButtons.forEach(button => {
                if (!button.closest('.select-button') && !button.classList.contains('call-button')) {
                    button.style.display = 'none';
                    button.style.visibility = 'hidden';
                    button.style.opacity = '0';
                    button.style.position = 'absolute';
                    button.style.zIndex = '-1000';
                    //console.log('Стандартная кнопка плагина скрыта');
                }
            });
        }

        function restructureForm() {
            const parentContainer = document.querySelector('.pb0.pbreak');
            if (!parentContainer) return false;

            if (parentContainer.querySelector('.anketa-col')) {
                return true;
            }

            const col1 = document.createElement('div');
            col1.className = 'anketa-col anketa-col-1';

            const col2 = document.createElement('div');
            col2.className = 'anketa-col anketa-col-2';

            const calendarCol1Elements = Array.from(parentContainer.querySelectorAll('.calendar-col-1'));
            const calendarCol2Element = parentContainer.querySelector('.calendar-col-2');
            const captchaElement = parentContainer.querySelector('.captcha');
            const buttonElement = parentContainer.querySelector('.pbSubmit');

            calendarCol1Elements.forEach(element => {
                col1.appendChild(element);
            });

            if (calendarCol2Element) col2.appendChild(calendarCol2Element);
            if (captchaElement) col2.appendChild(captchaElement);
            if (buttonElement) col2.appendChild(buttonElement);

            parentContainer.innerHTML = '';
            parentContainer.appendChild(col1);
            parentContainer.appendChild(col2);

            //console.log('Форма реструктурирована');
            return true;
        }

        // Функция для замены input на textarea и добавления класса required
        function replaceInputWithTextarea() {
            const input = document.getElementById('fieldname8_1');

            if (input && input.tagName === 'INPUT' && input.type === 'text') {
                const textarea = document.createElement('textarea');

                const attrs = ['id', 'name', 'class', 'placeholder', 'value',
                    'disabled', 'readonly', 'required', 'maxlength',
                    'autocomplete', 'tabindex', 'title'];

                attrs.forEach(attr => {
                    if (attr === 'value') {
                        textarea.value = input.value;
                    } else if (attr === 'class') {
                        textarea.className = input.className + ' required';
                    } else if (input.hasAttribute(attr)) {
                        textarea.setAttribute(attr, input.getAttribute(attr));
                    }
                });

                textarea.setAttribute('rows', '4');
                textarea.style.minHeight = '217px';
                textarea.style.resize = 'vertical';

                if (!textarea.hasAttribute('required')) {
                    textarea.setAttribute('required', 'required');
                }

                input.parentNode.replaceChild(textarea, input);
                //console.log('Input заменен на textarea с классом required');
                return true;
            }

            const existingTextarea = document.getElementById('fieldname8_1');
            if (existingTextarea && existingTextarea.tagName === 'TEXTAREA') {
                if (!existingTextarea.classList.contains('required')) {
                    existingTextarea.classList.add('required');
                    if (!existingTextarea.hasAttribute('required')) {
                        existingTextarea.setAttribute('required', 'required');
                    }
                    //console.log('Класс required добавлен к существующему textarea');
                }
                return true;
            }

            return false;
        }

        // Функция для оборачивания availableslot и htmlUsed в slots-content
        function wrapSlotsContent() {
            const slotsBlocks = document.querySelectorAll('.slots');

            slotsBlocks.forEach(slotsBlock => {
                if (!slotsBlock.querySelector('.slots-content')) {
                    const slotsToWrap = slotsBlock.querySelectorAll('.availableslot, .htmlUsed');

                    if (slotsToWrap.length > 0) {
                        const slotsContent = document.createElement('div');
                        slotsContent.className = 'slots-content';

                        let insertAfterElement = slotsBlock.querySelector('br');
                        if (!insertAfterElement) {
                            insertAfterElement = slotsBlock.querySelector('span');
                        }

                        if (insertAfterElement) {
                            insertAfterElement.parentNode.insertBefore(slotsContent, insertAfterElement.nextSibling);
                        } else {
                            slotsBlock.insertBefore(slotsContent, slotsBlock.firstChild);
                        }

                        slotsToWrap.forEach(slot => {
                            if (!slot.closest('.slots-content')) {
                                slotsContent.appendChild(slot);
                            }
                        });

                        //console.log('.availableslot и .htmlUsed обернуты в .slots-content');
                    }
                } else {
                    const slotsContent = slotsBlock.querySelector('.slots-content');
                    const slotsToWrap = slotsBlock.querySelectorAll('.availableslot:not(.slots-content .availableslot), .htmlUsed:not(.slots-content .htmlUsed)');

                    if (slotsToWrap.length > 0) {
                        slotsToWrap.forEach(slot => {
                            if (!slot.closest('.slots-content')) {
                                slotsContent.appendChild(slot);
                                //console.log('Новый слот добавлен в существующий .slots-content');
                            }
                        });
                    }
                }
            });

            return slotsBlocks.length > 0;
        }

        // Функция для добавления элементов в .slotsCalendar
        function decorateSlotsCalendar() {
            const calendarBlocks = document.querySelectorAll('.slotsCalendar');

            calendarBlocks.forEach(block => {
                if (!block.querySelector('.closer')) {
                    const closer = document.createElement('span');
                    closer.className = 'closer';
                    closer.innerHTML = '';

                    block.insertBefore(closer, block.firstChild);

                    //console.log('Closer добавлен в .slotsCalendar');

                    closer.addEventListener('click', function(e) {
                        e.stopPropagation();
                        //console.log('Клик по closer');

                        const targetBlock = document.querySelector('.slotsCalendarfieldname1_1');
                        if (targetBlock) {
                            targetBlock.style.display = 'none';
                            //console.log('Блок .slotsCalendarfieldname1_1 скрыт');
                        }
                    });
                }

                let selectButton = block.querySelector('.select-button');
                if (!selectButton) {
                    selectButton = document.createElement('div');
                    selectButton.className = 'select-button';

                    const span = document.createElement('span');
                    span.textContent = 'Выбрать';

                    const submitButton = document.createElement('button');
                    submitButton.type = 'button';
                    submitButton.className = 'pbSubmit';
                    submitButton.textContent = 'Отправить запрос';

                    selectButton.appendChild(span);
                    selectButton.appendChild(submitButton);

                    block.appendChild(selectButton);

                    //console.log('Блок .select-button создан с двумя кнопками');

                    span.addEventListener('click', function(e) {
                        e.stopPropagation();
                        //console.log('Клик по span "Выбрать"');

                        const targetBlock = document.querySelector('.slotsCalendarfieldname1_1');
                        if (targetBlock) {
                            targetBlock.style.display = 'none';
                            //console.log('Блок .slotsCalendarfieldname1_1 скрыт через span');
                        }
                    });

                } else {
                    if (!selectButton.querySelector('.pbSubmit')) {
                        const submitButton = document.createElement('button');
                        submitButton.type = 'button';
                        submitButton.className = 'pbSubmit';
                        submitButton.textContent = 'Отправить запрос';

                        selectButton.appendChild(submitButton);

                        //console.log('Кнопка "Отправить запрос" добавлена в существующий .select-button');
                    }
                }
            });

            return calendarBlocks.length > 0;
        }

        // Функция для добавления календарной легенды в блок .ui-widget
        function addCalendarLegend() {
            const uiWidgets = document.querySelectorAll('.ui-widget');

            uiWidgets.forEach(uiWidget => {
                if (!uiWidget.querySelector('.calendar-legend')) {
                    const calendarLegend = document.createElement('div');
                    calendarLegend.className = 'calendar-legend';

                    const legendItems = [
                        { markerClass: '', text: 'Есть свободное время' },
                        { markerClass: '', text: 'Нет свободного времени' },
                        { markerClass: '', text: 'Сегодня' }
                    ];

                    legendItems.forEach(item => {
                        const legendItem = document.createElement('div');
                        legendItem.className = 'calendar-legend-item';

                        const marker = document.createElement('div');
                        marker.className = 'calendar-legend-item-marker';

                        const line = document.createElement('div');
                        line.className = 'calendar-legend-item-line';
                        line.innerHTML = '—';

                        const text = document.createElement('div');
                        text.className = 'calendar-legend-item-text';
                        text.textContent = item.text;

                        legendItem.appendChild(marker);
                        legendItem.appendChild(document.createTextNode(' '));
                        legendItem.appendChild(line);
                        legendItem.appendChild(document.createTextNode(' '));
                        legendItem.appendChild(text);

                        calendarLegend.appendChild(legendItem);
                    });

                    uiWidget.appendChild(calendarLegend);
                    //console.log('Календарная легенда добавлена в .ui-widget');
                }
            });

            return uiWidgets.length > 0;
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
                        //console.log('Дата обновлена:', selectedDateValue);

                        saveToSessionStorage();

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

            dateInput.value = selectedDateValue;
            //console.log('Поле ввода даты обновлено из selectedDateValue:', selectedDateValue);
        }

        // Функция для обновления выбранного времени при изменении
        function updateSelectedTime() {
            const slotsCalendar = document.querySelector('.slotsCalendarfieldname1_1');
            if (slotsCalendar) {
                const currentSelection = slotsCalendar.querySelector('.currentSelection a');
                if (currentSelection) {
                    selectedTimeValue = currentSelection.textContent.trim();
                    //console.log('Время обновлено (currentSelection):', selectedTimeValue);

                    saveToSessionStorage();
                    stabilizeScroll();
                    return true;
                }

                const choosenSelection = slotsCalendar.querySelector('.choosen a');
                if (choosenSelection) {
                    selectedTimeValue = choosenSelection.textContent.trim();
                    //console.log('Время обновлено (choosen):', selectedTimeValue);

                    saveToSessionStorage();
                    stabilizeScroll();
                    return true;
                }
            }
            stabilizeScroll();
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

                if (!dateUpdated) {
                    updateSelectedDate();
                }
                if (!timeUpdated) {
                    updateSelectedTime();
                }
            });

            const slotsCalendar = document.querySelector('.slotsCalendarfieldname1_1');
            if (slotsCalendar) {
                selectionObserver.observe(slotsCalendar, {
                    childList: true,
                    subtree: true,
                    attributes: true,
                    attributeFilter: ['class']
                });
                //console.log('Наблюдение за выбором даты и времени начато');

                updateSelectedDate();
                updateSelectedTime();
            }
        }

        // Функция для получения текущих выбранных даты и времени
        function getSelectedDateTime() {
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

        // Функция для инициализации обработчиков чекбоксов
        function initializeCheckboxHandlers() {
            document.querySelectorAll('.donation-form__checkbox-input').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const checkmark = this.nextElementSibling.querySelector('.donation-form__checkbox-icon');
                    if (this.checked) {
                        checkmark.classList.remove('hidden');
                    } else {
                        checkmark.classList.add('hidden');
                    }
                });
            });

            //console.log('Обработчики чекбоксов инициализированы');
        }

        // Функция для добавления обязательных чекбоксов в .anketa-col-1
        function addRequiredCheckboxes() {
            const anketaCol1 = document.querySelector('.anketa-col-1');
            if (!anketaCol1) return false;

            const oldCheckboxes = anketaCol1.querySelectorAll('[data-checkbox="personal-data"], [data-checkbox="offer"]');
            oldCheckboxes.forEach(cb => cb.remove());

            if (anketaCol1.querySelector('.donation-form__checkboxes')) {
                return true;
            }

            const checkboxesContainer = document.createElement('div');
            checkboxesContainer.className = 'donation-form__checkboxes mb-8';
            checkboxesContainer.innerHTML = `
                <label class="donation-form__checkbox-label">
                    <input type="checkbox" required="required" class="required hidden donation-form__checkbox-input" />
                    <span class="donation-form__checkbox-custom">
                        <svg class="donation-form__checkbox-icon hidden w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    </span>
                    <span class="donation-form__checkbox-text">Я соглашаюсь на обработку моих <a href="#">персональных данных</a></span>
                </label>
                <label class="donation-form__checkbox-label">
                    <input type="checkbox" required="required" class="required hidden donation-form__checkbox-input" />
                    <span class="donation-form__checkbox-custom">
                        <svg class="donation-form__checkbox-icon hidden w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    </span>
                    <span class="donation-form__checkbox-text">Я соглашаюсь с <a href="#">условиями оферты</a></span>
                </label>
            `;

            anketaCol1.appendChild(checkboxesContainer);

            //console.log('Новые чекбоксы добавлены в .anketa-col-1');
            return true;
        }

        // Функция для добавления текстового поля даты в .anketa-col-2
        function addDateInputField() {
            const anketaCol2 = document.querySelector('.anketa-col-2');
            if (!anketaCol2) return false;

            if (anketaCol2.querySelector('#dateInputField')) {
                return true;
            }

            const dateInputContainer = document.createElement('div');
            dateInputContainer.className = 'fields';

            const label = document.createElement('label');
            label.setAttribute('for', 'dateInputField');
            label.textContent = 'Дата:';

            const dfield = document.createElement('div');
            dfield.className = 'dfield';

            const dateInput = document.createElement('input');
            dateInput.type = 'text';
            dateInput.id = 'dateInputField';
            dateInput.name = 'dateInputField';
            dateInput.className = 'field large';
            dateInput.placeholder = 'дд.мм.гггг';
            dateInput.pattern = '\\d{2}\\.\\d{2}\\.\\d{4}';
            dateInput.title = 'Введите дату в формате дд.мм.гггг';

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

            dateInput.addEventListener('change', function(e) {
                const value = e.target.value;
                const regex = /^(\d{2})\.(\d{2})\.(\d{4})$/;
                const match = value.match(regex);
                if (match) {
                    const day = match[1];
                    const month = match[2];
                    const year = match[3];

                    selectedDateValue = value;

                    selectDateInCalendar(day, month, year);
                } else {
                    //console.log('Неверный формат даты');
                }
            });

            dfield.appendChild(dateInput);

            const uhSpan = document.createElement('span');
            uhSpan.className = 'uh';

            dateInputContainer.appendChild(label);
            dateInputContainer.appendChild(dfield);
            dateInputContainer.appendChild(uhSpan);

            const clearer = document.createElement('div');
            clearer.className = 'clearer';
            dateInputContainer.appendChild(clearer);

            anketaCol2.insertBefore(dateInputContainer, anketaCol2.firstChild);

            //console.log('Поле ввода даты добавлено в начало .anketa-col-2');
            return true;
        }

        // Функция для поиска даты в календаре по классу
        function findDateElementInCalendar(dateStr) {
            const calendar = document.querySelector('.fieldCalendarfieldname1_1');
            if (!calendar) return null;

            const dateElement = calendar.querySelector(`[class*="${dateStr}"]`);

            if (!dateElement) {
                const day = dateStr.split('-')[2];
                const elements = calendar.querySelectorAll(`[data-date="${day}"]`);

                for (let element of elements) {
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

            const dateStr = `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`;

            const dateElement = findDateElementInCalendar(dateStr);

            if (dateElement) {
                const allActiveElements = calendar.querySelectorAll('.ui-state-active');
                allActiveElements.forEach(el => {
                    el.classList.remove('ui-state-active');
                });

                const linkElement = dateElement.querySelector('a');
                if (linkElement) {
                    linkElement.classList.add('ui-state-active');
                }

                dateElement.click();
                //console.log('Дата выбрана в календаре:', dateStr);

                selectedDateValue = `${day.padStart(2, '0')}.${month.padStart(2, '0')}.${year}`;

                saveToSessionStorage();

                updateDateInputFieldFromSelectedDate();

                return true;
            } else {
                //console.log('Дата не найдена в текущем месяце:', dateStr);

                return trySwitchCalendarMonth(day, month, year);
            }
        }

        // Функция для переключения месяца в календаре
        function trySwitchCalendarMonth(day, month, year) {
            const calendar = document.querySelector('.fieldCalendarfieldname1_1');
            if (!calendar) return false;

            const monthElement = calendar.querySelector('.ui-datepicker-month');
            const yearElement = calendar.querySelector('.ui-datepicker-year');

            if (!monthElement || !yearElement) return false;

            const currentMonth = monthElement.textContent;
            const currentYear = yearElement.textContent;

            const monthNames = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
                'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
            const monthNamesGenitive = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня',
                'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];

            let currentMonthIndex = monthNames.findIndex(m => m === currentMonth);
            if (currentMonthIndex === -1) {
                currentMonthIndex = monthNamesGenitive.findIndex(m => m === currentMonth);
            }

            const targetMonthIndex = parseInt(month) - 1;
            const targetYear = parseInt(year);

            if (currentMonthIndex === -1) {
                //console.log('Не удалось определить текущий месяц');
                return false;
            }

            const currentTotalMonths = parseInt(currentYear) * 12 + currentMonthIndex;
            const targetTotalMonths = targetYear * 12 + targetMonthIndex;
            const monthDiff = targetTotalMonths - currentTotalMonths;

            //console.log(`Разница в месяцах: ${monthDiff} (текущий: ${currentMonthIndex+1}.${currentYear}, целевой: ${month}.${year})`);

            if (monthDiff === 0) {
                //console.log('Месяц совпадает, но дата не найдена');
                return false;
            }

            const isForward = monthDiff > 0;
            const buttonClass = isForward ? '.ui-datepicker-next' : '.ui-datepicker-prev';
            const switchButton = calendar.querySelector(buttonClass);

            if (!switchButton) {
                //console.log('Кнопка переключения месяца не найдена');
                return false;
            }

            let attempts = Math.abs(monthDiff);
            let success = false;

            const switchMonth = function(remainingAttempts) {
                if (remainingAttempts <= 0) {
                    setTimeout(function() {
                        const dateStr = `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`;
                        const dateElement = findDateElementInCalendar(dateStr);

                        if (dateElement) {
                            const allActiveElements = calendar.querySelectorAll('.ui-state-active');
                            allActiveElements.forEach(el => {
                                el.classList.remove('ui-state-active');
                            });

                            const linkElement = dateElement.querySelector('a');
                            if (linkElement) {
                                linkElement.classList.add('ui-state-active');
                            }

                            dateElement.click();
                            //console.log('Дата выбрана в календаре после переключения месяца:', dateStr);

                            selectedDateValue = `${day.padStart(2, '0')}.${month.padStart(2, '0')}.${year}`;

                            saveToSessionStorage();

                            updateDateInputFieldFromSelectedDate();

                            success = true;
                        } else {
                            //console.log('Дата не найдена даже после переключения месяца');
                            success = false;
                        }
                    }, 500);
                    return;
                }

                switchButton.click();
                //console.log(`Переключение месяца (осталось попыток: ${remainingAttempts - 1})`);

                setTimeout(function() {
                    switchMonth(remainingAttempts - 1);
                }, 500);
            };

            switchMonth(attempts);

            return true;
        }

        // Функция для обновления поля ввода даты при выборе даты в календаре
        function updateDateInputFromCalendar() {
            const dateInput = document.getElementById('dateInputField');
            if (!dateInput) return;

            const activeDateElement = document.querySelector('.fieldCalendarfieldname1_1 .ui-state-active');
            if (activeDateElement) {
                const tdElement = activeDateElement.closest('td');
                if (tdElement) {
                    const classList = Array.from(tdElement.classList);
                    const dateClass = classList.find(cls => cls.match(/^\d{4}-\d{2}-\d{2}$/) || cls.match(/^d\d{4}-\d{2}-\d{2}$/));

                    if (dateClass) {
                        const dateStr = dateClass.replace(/^d/, '');
                        const parts = dateStr.split('-');
                        if (parts.length === 3) {
                            selectedDateValue = `${parts[2]}.${parts[1]}.${parts[0]}`;
                            dateInput.value = selectedDateValue;

                            saveToSessionStorage();

                            //console.log('Поле ввода даты обновлено из календаря:', selectedDateValue);
                            return;
                        }
                    }
                }

                const month = tdElement ? tdElement.getAttribute('data-month') : null;
                const year = tdElement ? tdElement.getAttribute('data-year') : null;
                const day = activeDateElement.getAttribute('data-date');

                if (month !== null && year !== null && day !== null) {
                    const monthNum = parseInt(month) + 1;
                    selectedDateValue = `${day.padStart(2, '0')}.${monthNum.toString().padStart(2, '0')}.${year}`;
                    dateInput.value = selectedDateValue;

                    saveToSessionStorage();

                    //console.log('Поле ввода даты обновлено из календаря (через атрибуты):', selectedDateValue);
                    return;
                }
            } else {
                const todayElement = document.querySelector('.fieldCalendarfieldname1_1 .ui-datepicker-today');
                if (todayElement) {
                    const month = todayElement.getAttribute('data-month');
                    const year = todayElement.getAttribute('data-year');
                    const dayElement = todayElement.querySelector('a');

                    if (dayElement && month !== null && year !== null) {
                        const day = dayElement.getAttribute('data-date') || dayElement.textContent.trim();
                        const monthNum = parseInt(month) + 1;
                        selectedDateValue = `${day.padStart(2, '0')}.${monthNum.toString().padStart(2, '0')}.${year}`;
                        dateInput.value = selectedDateValue;

                        saveToSessionStorage();

                        //console.log('Поле ввода даты обновлено (сегодня):', selectedDateValue);
                        return;
                    }
                } else {
                    dateInput.value = '';
                    selectedDateValue = '';

                    saveToSessionStorage();

                    //console.log('Нет активной даты в календаре, поле очищено');
                }
            }
        }

        // Наблюдатель за кликами в календаре (вместо наблюдения за классами)
        function startDateInputObservation() {
            if (dateInputObserver) {
                dateInputObserver.disconnect();
            }

            dateInputObserver = new MutationObserver(function(mutations) {
                setTimeout(() => updateDateInputFromCalendar(), 50);
            });

            const calendar = document.querySelector('.fieldCalendarfieldname1_1');
            if (calendar) {
                calendar.addEventListener('click', function(e) {
                    const target = e.target;
                    if (target.tagName === 'A' && target.closest('.fieldCalendarfieldname1_1')) {
                        setTimeout(() => updateDateInputFromCalendar(), 100);
                    }
                });

                dateInputObserver.observe(calendar, {
                    childList: true,
                    subtree: true,
                    attributes: true
                });
                //console.log('Наблюдение за календарем для поля ввода даты начато');

                setTimeout(() => updateDateInputFromCalendar(), 200);
            }
        }

        // Функция для добавления кнопки "КНОПКА ВЫЗОВА"
        function addCallButton() {
            const anketaCol2 = document.querySelector('.anketa-col-2');
            if (!anketaCol2) return false;

            let callButton = anketaCol2.querySelector('.call-button');

            if (!callButton) {
                callButton = document.createElement('button');
                callButton.type = 'button';
                callButton.className = 'call-button';
                callButton.textContent = 'Отправить заявку';
                callButton.disabled = false;

                anketaCol2.appendChild(callButton);

                //console.log('Кнопка "Отправить заявку" добавлена');
            }

            const originalClickHandler = callButton.onclick;
            callButton.onclick = null;

            callButton.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();

                //console.log('Клик по кнопке "Отправить заявку"');

                const allValid = validateAllRequiredFields();

                if (allValid) {
                    const slotsCalendar = document.querySelector('.slotsCalendarfieldname1_1');
                    if (slotsCalendar) {
                        slotsCalendar.style.display = 'block';
                        //console.log('str1426');
                        //console.log('Блок .slotsCalendarfieldname1_1 показан');

                        setTimeout(() => {
                            if (slotsCalendar.style.display !== 'block') {
                                slotsCalendar.style.display = 'block';
                                //console.log('Восстановлен display блока .slotsCalendarfieldname1_1');
                            }
                        }, 50);
                    }
                } else {
                    //console.log('Не все обязательные поля заполнены');
                    //console.log('str1439');
                    const firstError = document.querySelector('.cpefb_error.message[style*="display: block"], .cpefb_error.message:not([style*="display: none"])');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            }, true);

            return true;
        }

        // Функция для добавления стилей для кнопки вызова
        function addCallButtonStyles() {
            if (document.querySelector('style[data-call-button]')) return;

            const style = document.createElement('style');
            style.setAttribute('data-call-button', 'true');
            style.textContent = ``;

            document.head.appendChild(style);
            //console.log('Стили для кнопки вызова добавлены');
        }

        // Функция для проверки и инициализации календаря
        function initSlotsCalendar() {
            const slotsCalendar = document.querySelector('.slotsCalendarfieldname1_1');
            if (slotsCalendar) {
                if (slotsCalendar.style.display !== 'none') {
                    slotsCalendar.style.display = 'none';
                    //console.log('Блок .slotsCalendarfieldname1_1 скрыт по умолчанию');
                }

                if (!slotsCalendar.querySelector('.closer')) {
                    decorateSlotsCalendar();
                }

                startSelectionObservation();
            }
        }

        // Функция для добавления классов к блоку .ahb_m4
        function addClassesToAhbM4() {
            const ahbM4Elements = document.querySelectorAll('.ahb_m4');

            ahbM4Elements.forEach(element => {
                if (!element.classList.contains('z-20') ||
                    !element.classList.contains('bg-surface') ||
                    !element.classList.contains('relative')) {

                    element.classList.add(
                        'z-20',
                        'bg-surface',
                        'relative',
                        '[border-radius:0_0_50%_50%_/_0_0_40px_40px]',
                        'lg:[border-radius:0_0_50%_50%_/_0_0_80px_80px]'
                    );

                    //console.log('Классы добавлены к элементу .ahb_m4');
                }
            });

            return ahbM4Elements.length > 0;
        }

        // Функция для создания и показа модального окна с корректными данными
        function createAndShowModal(message) {
            if (document.getElementById('successModal') || document.getElementById('supportModal')) {
                //console.log('Модальные окна уже существуют');
                return;
            }

            //console.log('Создаем модальные окна с сообщением:', message);

            const modal1 = document.createElement('div');
            modal1.id = 'successModal';

            const modalContent1 = document.createElement('div');

            const title = document.createElement('h3');
            let msg = 'Вы записаны на юридическую консультацию';
            if (selectedDateValue) {
                msg += ` <span>${selectedDateValue}</span>`;

                if (selectedTimeValue) {
                    msg += ` <span>${selectedTimeValue}</span>`;
                }
            }
            title.innerHTML = msg;
            modalContent1.appendChild(title);

            const messageElement = document.createElement('p');
            messageElement.textContent = message;
            modalContent1.appendChild(messageElement);

            const closeButton = document.createElement('span');
            closeButton.classList.add('closer');
            closeButton.textContent = '';

            closeButton.addEventListener('click', function() {
                const modal1 = document.getElementById('successModal');
                const modal2 = document.getElementById('supportModal');
                if (modal1) {
                    document.body.removeChild(modal1);
                }
                if (modal2) {
                    document.body.removeChild(modal2);
                }
                //console.log('Оба модальных окна закрыты');
            });

            modalContent1.appendChild(closeButton);
            modal1.appendChild(modalContent1);

            const modal2 = document.createElement('div');
            modal2.id = 'supportModal';
            modal2.classList.add('supportModalBlock');

            const modalContent2 = document.createElement('div');

            const supportTitle = document.createElement('h3');
            supportTitle.textContent = 'Поддержите нас';
            modalContent2.appendChild(supportTitle);

            const supportContent = document.createElement('div');
            supportContent.innerHTML = `
        <p>Консультации проводятся благодаря пожертвованиям и мы будем рады любой помощи.</p>
        <p>Ваше участие позволяет нам каждый день поддерживать переживших</p>
        <a href="/help/">Поддержать</a>
    `;
            modalContent2.appendChild(supportContent);

            modal2.appendChild(modalContent2);

            document.body.appendChild(modal1);
            document.body.appendChild(modal2);

            //console.log('Оба модальных окна показаны');
        }

        // Функция для формирования корректного сообщения
        function getSuccessMessage() {
            let message = 'Специалист свяжется с вами для уточнения деталей.';

            return message;
        }

        // Основная функция для проверки и показа модального окна
        function checkAndShowSuccessModal() {
            const hasSuccessRedirect = sessionStorage.getItem(STORAGE_KEYS.HAS_SUCCESS) === 'true';

            const hasSuccessHash = window.location.hash === '#success';

            if (hasSuccessRedirect || hasSuccessHash) {
                //console.log('Обнаружена успешная отправка формы');

                const { savedDate, savedTime } = loadFromSessionStorage();

                if (savedDate) selectedDateValue = savedDate;
                if (savedTime) selectedTimeValue = savedTime;

                const message = getSuccessMessage();
                //console.log('Показываем модальное окно с данными из sessionStorage:', message);

                createAndShowModal(message);

                clearSessionStorage();

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

            if (document.querySelector('.pb0.pbreak') && !document.querySelector('.pb0.pbreak .anketa-col')) {
                if (restructureForm()) changesMade = true;
            }

            if (document.querySelector('.pbSubmit:not(.call-button):not(.select-button .pbSubmit)')) {
                setTimeout(() => hidePluginSubmitButton(), 50);
                changesMade = true;
            }

            mutations.forEach(function(mutation) {
                if (mutation.addedNodes && mutation.addedNodes.length > 0) {
                    for (let node of mutation.addedNodes) {
                        if ((node.nodeType === 1 && node.classList && node.classList.contains('ui-widget')) ||
                            (node.querySelector && node.querySelector('.ui-widget'))) {
                            setTimeout(() => addCalendarLegend(), 100);
                            changesMade = true;
                        }

                        if ((node.nodeType === 1 && node.classList && node.classList.contains('slotsCalendar')) ||
                            (node.querySelector && node.querySelector('.slotsCalendar'))) {
                            setTimeout(() => {
                                decorateSlotsCalendar();
                                wrapSlotsContent();
                                startSelectionObservation();
                                setupScrollControl(); // Добавляем контроль прокрутки
                            }, 100);
                            changesMade = true;
                        }

                        if ((node.nodeType === 1 && node.classList && node.classList.contains('slots')) ||
                            (node.querySelector && node.querySelector('.slots'))) {
                            setTimeout(() => {
                                wrapSlotsContent();
                                updateSelectedDate();
                            }, 100);
                            changesMade = true;
                        }

                        if ((node.nodeType === 1 && node.classList && node.classList.contains('anketa-col-1')) ||
                            (node.querySelector && node.querySelector('.anketa-col-1'))) {
                            setTimeout(() => {
                                addRequiredCheckboxes();
                                initializeCheckboxHandlers();
                            }, 100);
                            changesMade = true;
                        }

                        if ((node.nodeType === 1 && node.classList && node.classList.contains('anketa-col-2')) ||
                            (node.querySelector && node.querySelector('.anketa-col-2'))) {
                            setTimeout(() => {
                                addCallButtonStyles();
                                addCallButton();
                                addDateInputField();
                                startDateInputObservation();
                                hidePluginSubmitButton();
                            }, 100);
                            changesMade = true;
                        }

                        if ((node.nodeType === 1 && node.classList && node.classList.contains('slotsCalendarfieldname1_1')) ||
                            (node.querySelector && node.querySelector('.slotsCalendarfieldname1_1'))) {
                            setTimeout(() => {
                                initSlotsCalendar();
                                startSelectionObservation();
                                setupScrollControl(); // Добавляем контроль прокрутки
                            }, 100);
                            changesMade = true;
                        }

                        if ((node.nodeType === 1 && node.classList && node.classList.contains('ahb_m4')) ||
                            (node.querySelector && node.querySelector('.ahb_m4'))) {
                            setTimeout(() => addClassesToAhbM4(), 100);
                            changesMade = true;
                        }

                        if ((node.nodeType === 1 && node.classList && node.classList.contains('fieldCalendarfieldname1_1')) ||
                            (node.querySelector && node.querySelector('.fieldCalendarfieldname1_1'))) {
                            setTimeout(() => {
                                startDateInputObservation();
                                updateDateInputFromCalendar();
                            }, 100);
                            changesMade = true;
                        }

                        if ((node.nodeType === 1 && node.classList && node.classList.contains('donation-form__checkboxes')) ||
                            (node.querySelector && node.querySelector('.donation-form__checkboxes'))) {
                            setTimeout(() => {
                                initializeCheckboxHandlers();
                            }, 100);
                            changesMade = true;
                        }

                        if ((node.nodeType === 1 && (node.id === 'email_1' || node.id === 'fieldname7_1')) ||
                            (node.querySelector && (node.querySelector('#email_1') || node.querySelector('#fieldname7_1')))) {
                            setTimeout(() => {
                                setupEmailValidation();
                            }, 100);
                            changesMade = true;
                        }

                        if ((node.nodeType === 1 && node.classList && node.classList.contains('pbSubmit') && !node.classList.contains('call-button') && !node.closest('.select-button')) ||
                            (node.querySelector && node.querySelector('.pbSubmit:not(.call-button):not(.select-button .pbSubmit)'))) {
                            setTimeout(() => hidePluginSubmitButton(), 100);
                            changesMade = true;
                        }
                    }
                }

                if (mutation.type === 'childList' && mutation.target) {
                    if (mutation.target.querySelector && mutation.target.querySelector('.ui-widget')) {
                        setTimeout(() => addCalendarLegend(), 50);
                        changesMade = true;
                    }

                    if (mutation.target.querySelector && mutation.target.querySelector('.slotsCalendar')) {
                        setTimeout(() => {
                            decorateSlotsCalendar();
                            wrapSlotsContent();
                            startSelectionObservation();
                            setupScrollControl();
                        }, 50);
                        changesMade = true;
                    }

                    if (mutation.target.querySelector && mutation.target.querySelector('.slots')) {
                        setTimeout(() => {
                            wrapSlotsContent();
                            updateSelectedDate();
                        }, 50);
                        changesMade = true;
                    }

                    if (mutation.target.querySelector && mutation.target.querySelector('.anketa-col-1')) {
                        setTimeout(() => {
                            addRequiredCheckboxes();
                            initializeCheckboxHandlers();
                        }, 50);
                        changesMade = true;
                    }

                    if (mutation.target.querySelector && mutation.target.querySelector('.anketa-col-2')) {
                        setTimeout(() => {
                            addCallButtonStyles();
                            addCallButton();
                            addDateInputField();
                            startDateInputObservation();
                            hidePluginSubmitButton();
                        }, 50);
                        changesMade = true;
                    }

                    if (mutation.target.querySelector && mutation.target.querySelector('.ahb_m4')) {
                        setTimeout(() => addClassesToAhbM4(), 50);
                        changesMade = true;
                    }

                    if (mutation.target.querySelector && mutation.target.querySelector('.fieldCalendarfieldname1_1')) {
                        setTimeout(() => {
                            startDateInputObservation();
                            updateDateInputFromCalendar();
                        }, 50);
                        changesMade = true;
                    }

                    if (mutation.target.querySelector &&
                        (mutation.target.querySelector('.availableslot') || mutation.target.querySelector('.htmlUsed'))) {
                        const inSlots = mutation.target.closest('.slots');
                        if (inSlots && !mutation.target.closest('.slots-content')) {
                            setTimeout(() => wrapSlotsContent(), 50);
                            changesMade = true;
                        }

                        setTimeout(() => updateSelectedTime(), 50);
                    }

                    const target = mutation.target.querySelector('#field_1-6, #fieldname8_1');
                    if (target && document.getElementById('fieldname8_1')) {
                        setTimeout(() => replaceInputWithTextarea(), 50);
                        changesMade = true;
                    }

                    if (mutation.target.querySelector && mutation.target.querySelector('.donation-form__checkboxes')) {
                        setTimeout(() => {
                            initializeCheckboxHandlers();
                        }, 50);
                        changesMade = true;
                    }

                    if (mutation.target.querySelector &&
                        (mutation.target.querySelector('#email_1') || mutation.target.querySelector('#fieldname7_1'))) {
                        setTimeout(() => {
                            setupEmailValidation();
                        }, 50);
                        changesMade = true;
                    }

                    if (mutation.target.querySelector && mutation.target.querySelector('.pbSubmit:not(.call-button):not(.select-button .pbSubmit)')) {
                        setTimeout(() => hidePluginSubmitButton(), 50);
                        changesMade = true;
                    }
                }

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
                    initializeCheckboxHandlers();
                    addDateInputField();
                    startDateInputObservation();
                    updateDateInputFromCalendar();
                    setupFormSubmitHandler();
                    setupEmailValidation();
                    hidePluginSubmitButton();
                    setupScrollControl(); // Добавляем контроль прокрутки
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
            loadFromSessionStorage();

            restructureForm();
            replaceInputWithTextarea();
            decorateSlotsCalendar();
            wrapSlotsContent();
            addCalendarLegend();
            addCallButtonStyles();
            addCallButton();
            initSlotsCalendar();

            hidePluginSubmitButton();

            startSelectionObservation();

            updateSelectedDate();
            updateSelectedTime();

            addClassesToAhbM4();

            addRequiredCheckboxes();

            initializeCheckboxHandlers();

            addDateInputField();
            startDateInputObservation();
            updateDateInputFromCalendar();

            if (selectedDateValue) {
                updateDateInputFieldFromSelectedDate();
            }

            setupFormSubmitHandler();

            setupEmailValidation();

            checkAndShowSuccessModal();

            // Добавляем контроль прокрутки при инициализации
            setTimeout(() => {
                setupScrollControl();
            }, 500);
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
                //console.log('Обнаружен #success через hashchange');
                checkAndShowSuccessModal();
            }
        });

        // ==================== ДОБАВЛЕНИЕ ОБРАБОТЧИКА КЛИКОВ ДЛЯ СТАБИЛИЗАЦИИ ====================
        (function() {
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', addScrollStabilization);
            } else {
                addScrollStabilization();
            }

            function addScrollStabilization() {
                const slotsContent = document.querySelector('.slots-content');
                if (slotsContent) {
                    // Предотвращаем клики, которые могут вызвать скроллинг плагина
                    slotsContent.addEventListener('click', function(e) {
                        if (e.target.closest('.availableslot, .htmlUsed')) {
                            // Включаем ручное управление прокруткой
                            isManualScrollControl = true;
                            savedScrollPosition = slotsContent.scrollTop;

                            setTimeout(() => {
                                slotsContent.scrollTop = savedScrollPosition;
                                isManualScrollControl = false;
                            }, 100);

                            setTimeout(() => {
                                slotsContent.scrollTop = savedScrollPosition;
                            }, 300);
                        }
                    });

                    // Отлавливаем события скролла
                    slotsContent.addEventListener('scroll', function(e) {
                        if (isManualScrollControl) {
                            this.scrollTop = savedScrollPosition;
                        } else {
                            savedScrollPosition = this.scrollTop;
                        }
                    });

                    //console.log('Обработчик кликов для стабилизации прокрутки установлен');
                }
            }
        })();
    </script>
    <script>
        console.log('Обновлённый скрипт. Прокрутка времени: ф-я updateSelectedTime');
    </script>
<?php
    get_template_part( 'template-parts/home/donation' );
?>
<?php
get_footer();
