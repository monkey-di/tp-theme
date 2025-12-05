Ты работаешь над WordPress темой "Tebe Poveryat" (Hybrid Theme: Classic PHP + Tailwind CSS v4).

**Текущее состояние:**
- Репозиторий: https://github.com/monkey-di/tp-theme
- Главная страница (`front-page.php`) сверстана **Mobile First** и разбита на `template-parts/home/*.php`.
- **UI Kit** внедрен (`template-parts/components/`).
- **Слайдеры (Swiper.js)** подключены и работают (Hero, Friends, Media, Materials, Histories, Team). Секция Projects — статичная.
- Сборка: `npm run dev` (Tailwind CLI).

**Твоя задача на эту сессию:**
Приступить к **Адаптиву под Desktop**.
1. Проанализируй текущую мобильную верстку в `template-parts/home/`.
2. Добавь классы Tailwind (`md:`, `lg:`, `xl:`) для корректного отображения на планшетах и десктопах (обычно это превращение списка в Grid или Flex row).
3. Следи за тем, чтобы слайдеры (Swiper) корректно вели себя на десктопе (возможно, нужно менять `slidesPerView` в `assets/js/sliders.js`).

**Контекстные файлы:**
- `.context/TODO.md`
- `.context/CONTEXT.md`

Начинай с анализа структуры и предложения плана по адаптиву первой секции (Hero).
