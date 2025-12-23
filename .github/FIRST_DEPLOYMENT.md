# ✅ Чек-лист: Первый деплой

Выполни эти шаги для успешного первого развертывания:

## Шаг 1: Подготовка SSH ключа

```bash
# Проверь что у тебя есть SSH ключ
ls ~/.ssh/id_ed25519 ~/.ssh/id_rsa

# Если нет - создай новый
ssh-keygen -t ed25519 -C "your_email@example.com"
```

## Шаг 2: Добавление SSH ключа на сервер

```bash
# Скопируй публичный ключ на сервер
ssh-copy-id -i ~/.ssh/id_ed25519 abrobe14_monkey@tebe-poveryat.realeasystudio.site

# Проверь доступ
ssh abrobe14_monkey@tebe-poveryat.realeasystudio.site "whoami"
```

Должен вывести: `abrobe14_monkey`

## Шаг 3: Получение приватного ключа для GitHub

Скопируй полное содержимое приватного SSH ключа. Выбери один из вариантов:

**Вариант 1: ed25519 (быстрее, меньше размер)**
```bash
cat ~/.ssh/id_ed25519
```

**Вариант 2: RSA (стандартный, совместимость)**
```bash
cat ~/.ssh/id_rsa
```

**⚠️ ВАЖНО**: Скопируй **ПОЛНОЕ** содержимое ключа от первой строки `-----BEGIN OPENSSH PRIVATE KEY-----` до последней строки `-----END OPENSSH PRIVATE KEY-----` включительно!

## Шаг 4: Добавление GitHub Secrets

В репозитории перейди: **Settings → Secrets and variables → Actions → New repository secret**

Добавь эти 4 секрета:

### Secret 1: `DEPLOY_SSH_KEY`
- **Value**: Скопируй полное содержимое приватного ключа из Шага 3

### Secret 2: `DEPLOY_HOST`
- **Value**: `tebe-poveryat.realeasystudio.site`

### Secret 3: `DEPLOY_USER`
- **Value**: `abrobe14_monkey`

### Secret 4: `DEPLOY_PATH`
- **Value**: `/home/a/abrobe14/tebe-poveryat.realeasystudio.site/public_html/wp-content/themes/tebe-poveryat`

## Шаг 5: Проверка конфигурации

```bash
# Проверь что SSH ключ правильно добавлен на сервере
ssh -i ~/.ssh/id_ed25519 abrobe14_monkey@tebe-poveryat.realeasystudio.site "test -f ~/.ssh/authorized_keys && echo 'OK' || echo 'FAILED'"

# Должен вывести: OK
```

## Шаг 6: Первый деплой

### Вариант А: Автоматический (через GitHub Actions)

1. Сделай коммит и push в ветку `master`:
```bash
git add .
git commit -m "feat: Add GitHub Actions deployment"
git push origin master
```

2. Перейди в репозиторий → **Actions**
3. Выбери workflow **"Deploy Theme to Server"**
4. Смотри лог выполнения

### Вариант Б: Локальный скрипт (быстрее для теста)

Linux/macOS:
```bash
chmod +x deploy.sh
./deploy.sh
```

Windows (Git Bash):
```bash
chmod +x deploy.sh
./deploy.sh
```

Windows (cmd.exe):
```cmd
deploy.bat
```

## Шаг 7: Проверка результатов

```bash
# Проверь что файлы загружены на сервер
ssh abrobe14_monkey@tebe-poveryat.realeasystudio.site \
  "ls -la /home/a/abrobe14/tebe-poveryat.realeasystudio.site/public_html/wp-content/themes/tebe-poveryat/"

# Должны быть видны: footer.php, header.php, front-page.php, assets/, и т.д.
# НЕ должны быть: node_modules/, src/, package.json
```

## Шаг 8: Проверка в браузере

1. Перейди на сайт: https://tebe-poveryat.realeasystudio.site
2. Нажми F12 (Developer Tools) → **Network**
3. Перезагрузи страницу (Ctrl+R или Cmd+R)
4. Смотри что CSS загружается без ошибок
5. Проверь что стили применились корректно

## Шаг 9: Очистка кэша WordPress

Если стили не обновились в браузере:

```bash
# Очисти кэш на сервере
ssh abrobe14_monkey@tebe-poveryat.realeasystudio.site \
  "rm -rf /home/a/abrobe14/tebe-poveryat.realeasystudio.site/public_html/wp-content/cache/*"

# Очисти кэш браузера
# Ctrl+Shift+Delete (Windows/Linux) или Cmd+Shift+Delete (macOS)
# Выбери "All time" и нажми "Clear data"
```

## Проблемы?

Если что-то не работает, проверь:

1. **SSH доступ не работает**
   ```bash
   ssh -v abrobe14_monkey@tebe-poveryat.realeasystudio.site "whoami"
   # Это покажет детальный лог подключения
   ```

2. **Файлы не загружены**
   - Проверь лог в GitHub Actions (если использовал GitHub Actions)
   - Проверь размер файла: `ssh ... "du -sh /path/to/theme/"`

3. **CSS не загружается**
   - Проверь что `assets/css/output.css` существует на сервере
   - Проверь права доступа: `ssh ... "ls -la /path/to/theme/assets/css/"`

4. **Старые стили всё ещё видны**
   - Очисти кэш WordPress (см. Шаг 9)
   - Очисти кэш браузера (Ctrl+Shift+Delete)
   - Попробуй в Incognito Mode (Ctrl+Shift+N)

---

**Успешно?** Отлично! 🎉 Теперь каждый push в `master` будет автоматически деплоить тему.

**Дальше**: Читай [`DEPLOYMENT.md`](../DEPLOYMENT.md) для обычного использования.
