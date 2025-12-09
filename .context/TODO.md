# Задачи проекта Tebe Poveryat (Theme)

## 📊 ТЕКУЩИЙ ЭТАП: Backend Development
> Frontend (Mobile): ✅ Завершён | Backend: 🔄 В процессе

---

## 🎨 Дизайн и Верстка (Главная)
> Статус: **Mobile Version Completed** ✅. Desktop adaptation pending.

- [x] **Header:** Assets synced. Mobile ready.
- [x] **Hero:** Assets synced. Mobile ready.
- [x] **Donation:** Assets synced. Mobile ready.
- [x] **About Us:** Assets synced. Mobile ready.
- [x] **Projects:** Assets synced. Mobile ready.
- [x] **Friends:** Assets synced. Mobile ready.
- [x] **Media:** Assets synced. Mobile ready.
- [x] **Materials:** Assets synced. Mobile ready.
- [x] **Histories:** Assets synced. Mobile ready.
- [x] **Team:** Assets synced. Mobile ready.
- [x] **Footer:** Assets synced. Mobile ready.

## 🛠 Рефакторинг и Компоненты (UI Kit)
- [x] **UI Kit Extraction:**
    - [x] `button.php`
    - [x] `link-more.php`
    - [x] `input-with-button.php`
    - [x] `slider-progress.php`
    - [x] `slider-navigation.php`
- [ ] **Адаптив (Desktop):** Пройтись по всем файлам в `template-parts/home/` и добавить стили `md:`, `lg:` (Grid, Flex changes).

## ⚙️ Backend Development (В ПРОЦЕССЕ)
> **Начато:** 2025-12-09

### Инфраструктура
- [x] **Бекап фронтенда:** Сохранена текущая версия вёрстки.
- [x] **Docker конфигурация:** Добавлен volume для кастомных плагинов.

### Формы и обработчики
- [ ] **Email subscription:** PHP handler для формы подписки.
- [ ] **AJAX handlers:** Асинхронная обработка форм.
- [ ] **Validation:** Серверная валидация данных.
- [ ] **Security:** Nonce, sanitization, escape.

### Custom Post Types & Taxonomies
- [ ] **CPT: Projects** (Проекты)
- [ ] **CPT: Media** (Медиа)
- [ ] **CPT: Materials** (Материалы)
- [ ] **CPT: Histories** (Истории)
- [ ] **CPT: Team Members** (Команда)
- [ ] **CPT: Friends** (Партнёры)

### Dynamic Content
- [ ] **Slider data from CPT:** Замена статических слайдов на динамические.
- [ ] **WordPress menus:** Замена статического меню в header.
- [ ] **Widget areas:** Создание областей виджетов.

## 📄 Другие страницы
- [ ] **Single Post (`single.php`):** Шаблон поста.
- [ ] **Page (`page.php`):** Текстовая страница.
- [ ] **404 (`404.php`):** Ошибка.
- [ ] **Archive templates:** Архивы для CPT.

## 🏗 Инфраструктура
- [x] Git initialized.
- [x] Figma assets integration.
- [x] Docker environment configured.