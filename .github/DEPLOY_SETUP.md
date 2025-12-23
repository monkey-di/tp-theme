# Настройка автоматического деплоя

## 1. GitHub Secrets

Перейди в **Settings → Secrets and variables → Actions** и добавь следующие секреты:

### `DEPLOY_SSH_KEY`
Приватный SSH ключ для доступа на сервер. Копировать полное содержимое ключа (от `-----BEGIN` до `-----END`).

Можно получить командой:
```bash
cat ~/.ssh/id_ed25519
# или
cat ~/.ssh/id_rsa
```

### `DEPLOY_HOST`
```
tebe-poveryat.realeasystudio.site
```

### `DEPLOY_USER`
```
abrobe14_monkey
```

### `DEPLOY_PATH`
```
/home/a/abrobe14/tebe-poveryat.realeasystudio.site/public_html/wp-content/themes/tebe-poveryat
```

## 2. Как работает деплой

Workflow в `.github/workflows/deploy.yml` автоматически:

1. **Триггер**: При push в ветку `master` (или ручной запуск через `workflow_dispatch`)
2. **Build**:
   - Установка Node.js
   - `npm install && npm run build` в директории темы
3. **Deploy**:
   - Копирование файлов через `rsync` по SSH
   - Исключаются: `node_modules/`, `.git/`, `src/`, `package.json`, `package-lock.json`
4. **Cleanup**: Очистка кэша WordPress на сервере

## 3. Мониторинг деплоя

1. Перейди в **Actions** в репозитории GitHub
2. Выбери workflow **"Deploy Theme to Server"**
3. Смотри лог выполнения

## 4. Чек-лист перед первым деплоем

- [x] SSH ключ добавлен в GitHub Secrets
- [x] Все 4 секрета заполнены корректно
- [x] SSH доступ проверен на сервере
- [x] npm команды работают локально

## 5. Troubleshooting

### "Connection refused"
- Проверь SSH доступ: `ssh -i ~/.ssh/id_ed25519 abrobe14_monkey@tebe-poveryat.realeasystudio.site`
- Убедись что ключ добавлен на сервере в `~/.ssh/authorized_keys`

### "rsync: command not found"
- На сервере нужен `rsync`. Используй SSH команды вместо `rsync`

### "Permission denied" при записи
- Проверь права доступа папки на сервере: `chmod 755 /path/to/theme`

## 6. Альтернативный способ (без workflow)

Если нужен быстрый деплой вручную:
```bash
# Из корня проекта
cd wp-content/themes/tebe-poveryat
npm run build
rsync -avz --delete \
  --exclude=node_modules \
  --exclude=.git \
  --exclude=src \
  --exclude=package.json \
  --exclude=package-lock.json \
  ./ abrobe14_monkey@tebe-poveryat.realeasystudio.site:/home/a/abrobe14/tebe-poveryat.realeasystudio.site/public_html/wp-content/themes/tebe-poveryat/
```
