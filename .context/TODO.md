# Задачи проекта Tebe Poveryat (Theme)

## 🎨 Дизайн и Верстка (Главная)
> Статус: **Прототипы (Mobile First Draft)**. Требуется доработка деталей, логики и адаптива.

- [x] **Header:** Structure ready. Needs logic for Burger & transparent/sticky states.
- [x] **Mobile Menu Overlay:** Layout ready. Needs JS logic & polish.
- [x] **Hero:** Mobile layout draft. Needs: Slider logic (Swiper), pixel-perfect check.
- [x] **Donation:** Mobile layout draft. Needs: Form logic, custom select input, pixel-perfect.
- [x] **About Us (Part 1 & 2):** Mobile layout draft. Needs: correct icons, maybe slider logic for stats?
- [x] **Projects (Campaign):** Mobile layout draft. Needs: Slider logic? (if dynamic).
- [x] **Friends:** Mobile layout draft. Needs: Slider logic (Swiper).
- [x] **Media (Social):** Mobile layout draft. Needs: Slider logic (Swiper), real logos.
- [x] **Materials:** Mobile layout draft. Needs: Slider logic, real content query.
- [x] **Histories:** Mobile layout draft. Needs: Slider logic (Swiper).
- [x] **Team:** Mobile layout draft. Needs: Slider logic (Swiper).
- [x] **Footer:** Mobile layout draft. Needs: Form logic.

## 🛠 Рефакторинг и Компоненты (UI Kit)
- [ ] **UI Kit Extraction:** Выделить повторяющиеся элементы из текущих шаблонов в `template-parts/components/`:
    - [ ] `button.php` (Primary, Secondary, Outline)
    - [ ] `link-arrow.php` (Ссылка "Читать далее" с иконкой)
    - [ ] `section-heading.php` (Заголовки Ura Bum Bum SP)
    - [ ] `slider-progress.php` (Индикатор прогресса)
    - [ ] `card-wrapper.php` (Обертка карточки)
- [ ] **Адаптив (Desktop):** Пройтись по всем секциям и добавить `md:`, `lg:` стили.

## ⚡ Функционал (JS/PHP)
- [~] **Мобильное меню (JS):** Базовая логика есть. Нужно: блокировка скролла, анимация иконки бургера.
- [ ] **Слайдеры (JS):** Подключить **Swiper.js** и оживить секции: Hero, Friends, Media, Materials, Histories, Team.
- [ ] **Формы:** PHP-обработчики для донатов и подписки.

## 🏗 Инфраструктура
- [x] Tailwind CSS v4 Setup.
- [x] Fonts connected.
- [x] Classic Theme Structure.
- [x] Git repo initialized.
