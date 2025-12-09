# Frontend Backup - Mobile Version
**Дата создания:** 2025-12-09
**Статус:** Полная мобильная вёрстка ✅

## Описание
Полный бекап фронтенда темы после завершения мобильной вёрстки главной страницы перед началом backend разработки.

## Содержимое

### Основные файлы
- `front-page.php` - Главная страница (загружает все секции)
- `header.php` - Шапка сайта
- `footer.php` - Подвал сайта
- `functions.php` - Функции темы

### Шаблоны
- `template-parts/home/` - 10 секций главной страницы:
  - hero.php (слайдер с 3 слайдами)
  - donation.php
  - about.php
  - about-part-2.php
  - projects.php
  - friends.php (слайдер партнёров)
  - media.php (слайдер медиа)
  - materials.php (слайдер материалов)
  - histories.php (слайдер историй)
  - team.php (слайдер команды)

- `template-parts/components/` - UI Kit компоненты:
  - button.php
  - link-more.php
  - input-with-button.php
  - slider-navigation.php
  - slider-progress.php

### Стили и ресурсы
- `src/input.css` - Исходный Tailwind CSS с @theme конфигурацией
- `assets/` - Скомпилированные стили, скрипты и медиа-файлы
  - `css/output.css` - Скомпилированный CSS
  - `js/main.js` - Мобильное меню
  - `js/sliders.js` - Инициализация Swiper слайдеров
  - `images/` - Все изображения
  - `vendor/swiper/` - Библиотека Swiper.js

## Технические детали

### Адаптивность
- ✅ Mobile (320px+) - полностью реализовано
- ⏳ Desktop (768px+, 1024px+) - в планах

### Swiper слайдеры (6 штук)
1. Hero - 3 слайда с автоплеем
2. Friends - карусель партнёров
3. Media - карусель медиа
4. Materials - карусель материалов
5. Histories - карусель историй
6. Team - карусель команды

### CSS Framework
- Tailwind CSS v4.0.0-alpha.14
- 7 кастомных цветов темы
- 3 шрифта: Geologica, Akrobat, Ura Bum Bum SP

## Восстановление
Для восстановления этой версии:
```bash
cp -r backups/frontend-mobile-2025-12-09/* ./
npm install
npm run dev
```

## Примечания
- Все ассеты загружаются из Figma API (потребуется миграция на локальные файлы)
- Мобильное меню - статический HTML оверлей
- Статические данные в слайдерах (потребуется замена на CPT)
