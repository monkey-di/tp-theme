# Развертывание темы Tebe Poveryat

Есть 2 способа развернуть тему на удалённый сервер:

## 1️⃣ Автоматический деплой через GitHub Actions (рекомендуется)

### Первичная настройка (один раз)

Перейди в репозиторий на GitHub → **Settings → Secrets and variables → Actions** → **New repository secret**

Добавь 4 секрета:

| Name | Value |
|------|-------|
| `DEPLOY_SSH_KEY` | **Полное** содержимое файла `~/.ssh/id_ed25519` или `~/.ssh/id_rsa` (от `-----BEGIN OPENSSH PRIVATE KEY-----` до `-----END OPENSSH PRIVATE KEY-----` включительно) |
| `DEPLOY_HOST` | `tebe-poveryat.realeasystudio.site` |
| `DEPLOY_USER` | `abrobe14_monkey` |
| `DEPLOY_PATH` | `/home/a/abrobe14/tebe-poveryat.realeasystudio.site/public_html/wp-content/themes/tebe-poveryat` |

Подробнее в [`.github/DEPLOY_SETUP.md`](./.github/DEPLOY_SETUP.md)

### Автоматический деплой

**При каждом push в ветку `master`** GitHub Actions автоматически:
1. Компилирует CSS (`npm run build`)
2. Загружает файлы на сервер
3. Очищает кэш WordPress

Смотри логи в **Actions** → **Deploy Theme to Server**

### Ручной запуск деплоя

Если нужно запустить вручную без push:
1. Перейди в **Actions**
2. Выбери **Deploy Theme to Server**
3. Нажми **Run workflow**

---

## 2️⃣ Локальный деплой скрипт

### Требования
- `npm` установлен
- SSH доступ на сервер настроен
- `rsync` установлен (Linux/Mac) или Git Bash (Windows)

### Linux / macOS

```bash
chmod +x deploy.sh
./deploy.sh
```

Или с кастомными параметрами:
```bash
./deploy.sh "tebe-poveryat.realeasystudio.site" "abrobe14_monkey" "/path/to/theme"
```

### Windows

```cmd
deploy.bat
```

Или с кастомными параметрами:
```cmd
deploy.bat "tebe-poveryat.realeasystudio.site" "abrobe14_monkey" "/path/to/theme"
```

---

## ⚙️ Процесс деплоя

1. **Компиляция CSS**
   ```bash
   cd wp-content/themes/tebe-poveryat
   npm install
   npm run build
   ```

2. **Синхронизация файлов** через `rsync`
   - Исключаются: `node_modules/`, `.git/`, `src/`, `package.json`, `package-lock.json`
   - Используется флаг `--delete` (удаляет файлы на сервере, которых нет локально)

3. **Очистка кэша**
   - Удаляются: `wp-content/cache/`, `wp-content/upgrade/`

---

## 🔍 Проверка статуса

### GitHub Actions
- Перейди в **Actions** → **Deploy Theme to Server**
- Смотри последний workflow run

### SSH доступ
```bash
ssh abrobe14_monkey@tebe-poveryat.realeasystudio.site "ls -la wp-content/themes/tebe-poveryat"
```

### Проверка файлов на сервере
```bash
ssh abrobe14_monkey@tebe-poveryat.realeasystudio.site "ls -lah wp-content/themes/tebe-poveryat/assets/"
```

---

## 🆘 Решение проблем

### "Connection refused" или "Permission denied"
```bash
# Проверь SSH доступ
ssh abrobe14_monkey@tebe-poveryat.realeasystudio.site "whoami"

# Убедись что ключ добавлен на сервере
ssh abrobe14_monkey@tebe-poveryat.realeasystudio.site "cat ~/.ssh/authorized_keys"
```

### "rsync: command not found"
На Windows используй Git Bash вместо cmd.exe, или установи rsync через:
```bash
choco install rsync  # Если установлен Chocolatey
```

### "npm: command not found" в GitHub Actions
Проверь что Node.js настроен в workflow (он должен быть)

### Файлы не обновились на сервере
1. Проверь что `npm run build` скомпилировал CSS:
   ```bash
   ls -la wp-content/themes/tebe-poveryat/assets/css/output.css
   ```
2. Проверь права доступа на сервере:
   ```bash
   ssh abrobe14_monkey@tebe-poveryat.realeasystudio.site "ls -ld wp-content/themes/tebe-poveryat"
   ```

---

## 📝 Быстрый старт

### Первый раз
1. Добавь 4 GitHub Secrets (см. выше)
2. Сделай `push` в `master` или запусти workflow вручную
3. Смотри логи в **Actions**

### Каждый раз после
Просто сделай `push` в `master` - деплой произойдёт автоматически 🚀

---

## 📋 Чек-лист

- [x] SSH ключ добавлен в GitHub Secrets
- [x] Все 4 секрета заполнены
- [x] SSH доступ проверен
- [x] npm работает локально
- [ ] Первый деплой выполнен успешно
- [ ] Файлы появились на сервере
- [ ] WordPress показывает обновленную тему

---

**Документация**: [`.github/DEPLOY_SETUP.md`](./.github/DEPLOY_SETUP.md)
