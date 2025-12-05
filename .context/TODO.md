# Задачи проекта Tebe Poveryat (Theme)

## 🎨 Дизайн и Верстка (Главная)
- [x] **Header:** Mobile version + Burger Menu layout.
- [x] **Mobile Menu Overlay:** Layout ready.
- [x] **Hero:** Mobile layout.
- [x] **Donation:** Mobile layout (Form).
- [x] **About Us (Part 1 & 2):** Mobile layout.
- [x] **Projects (Campaign):** Mobile layout.
- [x] **Friends:** Mobile layout (Slider card).
- [x] **Media (Social):** Mobile layout (Slider card).
- [x] **Materials:** Mobile layout (Card).
- [x] **Histories:** Mobile layout (Card).
- [x] **Team:** Mobile layout (Card).
- [x] **Footer:** Mobile layout.

## 🛠 Рефакторинг и Компоненты (UI Kit)
- [ ] **UI Kit Refactoring:** Выделить повторяющиеся элементы в `template-parts/components/`:
    - [ ] `button-primary.php` (Синяя кнопка)
    - [ ] `button-outline.php` (Прозрачная с обводкой)
    - [ ] `link-read-more.php` (Ссылка "Читать далее" с иконкой и подчеркиванием)
    - [ ] `section-title.php` (Заголовки Ura Bum Bum SP)
    - [ ] `slider-controls.php` (Индикатор прогресса)
- [ ] **Адаптив:** Добавить классы `md:`, `lg:`, `xl:` для всех секций (сейчас всё mobile-first).

## ⚡ Функционал (JS/PHP)
- [x] **Мобильное меню (JS):** Базовая логика открытия/закрытия реализована.
- [ ] **Слайдеры (JS):** Подключить Swiper.js и инициализировать слайдеры в секциях:
    - Hero
    - Friends
    - Media
    - Materials
    - Histories
    - Team
- [ ] **Формы (PHP):** Обработка отправки формы донатов и подписки (интеграция с плагином или API).

## 📄 Другие страницы
- [ ] **Single Post (`single.php`):** Шаблон для отдельной новости/статьи.
- [ ] **Page (`page.php`):** Шаблон для текстовых страниц.
- [ ] **404 (`404.php`):** Страница ошибки.

## 🏗 Инфраструктура
- [x] Tailwind CSS v4 Setup.
- [x] Fonts connected (Geologica, Akrobat, Ura Bum Bum SP).
- [x] Classic Theme Structure migration (`front-page.php`, `template-parts/`).