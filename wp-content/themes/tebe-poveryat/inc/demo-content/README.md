# Demo Content Importer

Скрипт для импорта демо-контента из статических шаблонов в Custom Post Types.

## Что импортируется

### 1. Main Slider (Главный слайдер)
- 3 одинаковых слайда
- Заголовок: "Тебе поверят"
- Описание организации
- Изображение: hero.webp

### 2. Friends (Друзья)
- Аглая Тарасова (актриса)
- Константин Хабенский (актёр)
- Юрий Шевчук (артист)

### 3. Media (СМИ о нас)
- 6 логотипов СМИ с ссылками на статьи
- Snob, Новый Очаг, Forbes, Нож, и др.

### 4. Materials (Полезные материалы)
- 2 материала:
  - "ИИ и психотерапия: новый помощник или иллюзия близости?"
  - "Влияние социальных сетей на самооценку подростков"

### 5. Team (Команда)
- 3 специалиста:
  - Ксения Шашунова (Координаторка детско-родительского направления)
  - Ирина Смирнова (Психолог-консультант)
  - Алексей Волков (Юридический консультант)

### 6. Histories (Истории)
- 3 истории переживших:
  - Татьяна Цветкова
  - Мария Иванова
  - Елена Петрова

## Способы запуска

### Вариант 1: Через WP-CLI (Рекомендуется)

```bash
cd /path/to/wordpress
wp eval-file wp-content/themes/tebe-poveryat/inc/demo-content/import-demo-content.php
```

Или с выводом результатов:

```bash
wp eval-file wp-content/themes/tebe-poveryat/inc/demo-content/import-demo-content.php << 'EOF'
echo "Running demo import...\n";
$results = tp_import_demo_content();
foreach ($results as $type => $ids) {
    echo "$type: " . count($ids) . " items imported\n";
}
EOF
```

### Вариант 2: Через админ-панель WordPress

1. Откройте файл `import-demo-content.php`
2. Раскомментируйте секцию `Admin menu item for manual import` (строки 267-305)
3. Зайдите в админку WordPress
4. Перейдите в `Инструменты → Импорт демо-контента`
5. Нажмите кнопку "Запустить импорт"
6. После успешного импорта закомментируйте секцию обратно

### Вариант 3: Добавить кнопку в Customizer

```php
// Добавить в functions.php временно
add_action('admin_bar_menu', function($wp_admin_bar) {
    if (!current_user_can('manage_options')) return;

    $wp_admin_bar->add_node([
        'id'    => 'tp_demo_import',
        'title' => 'Import Demo',
        'href'  => admin_url('tools.php?page=tp-demo-import'),
    ]);
}, 100);
```

## Важные примечания

1. **Запускайте только один раз!** Повторный запуск создаст дубликаты записей.
2. **Проверьте наличие изображений:** Убедитесь, что все файлы изображений существуют в каталогах `assets/` и `assets/images/`.
3. **Figma API изображения:** Некоторые изображения (team, histories, media logos) загружаются с Figma API и могут быть недоступны. Замените их на локальные файлы перед импортом.
4. **Очистка:** Если нужно удалить импортированные записи, используйте WP-CLI:

```bash
# Удалить все main_slide
wp post delete $(wp post list --post_type=main_slide --format=ids) --force

# Удалить все friend
wp post delete $(wp post list --post_type=friend --format=ids) --force

# И так далее для других типов
```

## После импорта

После успешного импорта вам нужно:

1. **Обновить permalink структуру:**
   - Зайдите в `Настройки → Постоянные ссылки`
   - Нажмите "Сохранить изменения" (для сброса rewrite rules)

2. **Заменить Figma изображения на локальные:**
   - Для Team members
   - Для Histories
   - Для Media logos

3. **Обновить шаблоны** для работы с динамическими данными вместо статических

4. **Проверить правильность отображения** всех секций на главной странице

## Структура импортируемых данных

```
main_slide
├── post_title: Заголовок слайда
├── post_content: Описание
├── menu_order: Порядок отображения
└── featured_image: Изображение слайда

friend
├── post_title: Имя друга
├── post_content: Цитата
├── menu_order: Порядок
└── featured_image: Фото

media_item
├── post_title: Название СМИ
├── menu_order: Порядок
├── _media_url (meta): URL статьи
└── featured_image: Логотип

material
├── post_title: Заголовок материала
├── post_content: Полный текст
├── post_excerpt: Анонс
├── menu_order: Порядок
└── featured_image: Иллюстрация

team_member
├── post_title: Имя специалиста
├── post_content: Биография
├── menu_order: Порядок
├── _team_position (meta): Должность
└── featured_image: Фото

history
├── post_title: Имя
├── post_content: Полная история
├── post_excerpt: Краткий анонс
├── menu_order: Порядок
└── featured_image: Фото
```

## Дальнейшая работа

После импорта демо-контента:
1. Обновите шаблоны для загрузки данных из CPT
2. Настройте WP_Query для каждого слайдера
3. Добавьте редактирование контента через админку
4. Миграция изображений с Figma на локальное хранение
