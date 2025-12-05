#!/bin/bash

# Определяем путь к теме
THEME_PATH="./wp-content/themes/tebe-poveryat"

echo "🚀 Запуск сборки Tailwind CSS для темы..."

# Переходим в папку темы и запускаем build
if [ -d "$THEME_PATH" ]; then
    cd "$THEME_PATH" || exit
    npm run build
    echo "✅ Сборка завершена!"
else
    echo "❌ Ошибка: Папка темы не найдена по пути $THEME_PATH"
fi
