# Quick Start: Language System

## For Site Users

### How to Switch Language
1. **Desktop:** Click RU or ENG button in the top-right corner of header
2. **Mobile:** Language switcher available in navigation menu
3. **Direct URL:**
   - Add `?lang=en` to switch to English
   - Add `?lang=ru` to switch to Russian

**Example:** `https://tebe-poveryat.local/?lang=en`

### What's Translated
- ✅ Header navigation menu
- ✅ Footer links and buttons
- ✅ Donation button
- ✅ Subscribe form
- ✅ Copyright text
- ✅ Hero section (3 slides in English)

### What's Not Yet Translated
- Other main sections (coming soon)
- Content from custom post types

---

## For Developers

### Quick Code Reference

#### Check if English version
```php
if (tp_is_english()) {
    echo "This is English version";
}
```

#### Get translated text
```php
echo tp_get_text('header.donate', 'Хочу помочь', 'Donate');
```

#### Get language switcher URL
```php
<a href="<?php echo tp_get_language_url('en'); ?>">Switch to English</a>
```

#### Get current language code
```php
$lang = tp_get_current_language(); // Returns 'ru' or 'en'
```

### Adding New Translations

1. Edit: `wp-content/themes/tebe-poveryat/inc/language-manager.php`

2. Find function: `tp_get_translations()`

3. Add your translation:
```php
'my_section.my_text' => [
    'ru' => 'Русский текст',
    'en' => 'English text',
],
```

4. Use in template:
```php
echo tp_get_text('my_section.my_text', 'fallback_ru', 'fallback_en');
```

### Creating English Sections

1. Copy Russian section template
2. Rename to add `-en` suffix
3. Translate all text content
4. Update `front-page.php` to use conditional loading

Example:
```php
// In front-page.php
if (tp_is_english()) {
    get_template_part('template-parts/home/section-en');
} else {
    get_template_part('template-parts/home/section');
}
```

### Available Functions

| Function | Returns | Example |
|----------|---------|---------|
| `tp_get_current_language()` | 'ru' or 'en' | `tp_get_current_language()` |
| `tp_is_english()` | boolean | `if (tp_is_english()) { ... }` |
| `tp_get_text($key, $ru, $en)` | string | `echo tp_get_text('key', 'РУ', 'EN');` |
| `tp_get_language_url($lang)` | URL string | `<a href="<?php echo tp_get_language_url('en'); ?>">` |
| `tp_get_translations()` | array | Internal - returns all translations |

---

## File Locations

| Purpose | File |
|---------|------|
| Language logic | `inc/language-manager.php` |
| Header navigation | `header.php` (updated) |
| Footer content | `footer.php` (updated) |
| Main page logic | `front-page.php` (updated) |
| English hero | `template-parts/home/hero-en.php` (new) |
| Russian hero | `template-parts/home/hero.php` (updated) |

---

## Testing Checklist

- [ ] Visit site in Russian (default)
- [ ] Click ENG button → all text translates
- [ ] Click RU button → back to Russian
- [ ] Refresh page → language persists
- [ ] Visit `/?lang=en` → loads in English
- [ ] Visit `/?lang=ru` → loads in Russian
- [ ] Hero carousel works in both languages
- [ ] Footer links display correctly in both languages

---

## Troubleshooting

### Language switcher not working
- Check that `language-manager.php` is included in `functions.php` (line 77)
- Clear browser cache
- Test with `/?lang=en` parameter

### Sessions not persisting
- Ensure PHP sessions are enabled on server
- Check WordPress is not preventing session use

### Translations not appearing
- Verify key matches exactly in `tp_get_translations()`
- Check for typos in function call
- Ensure function is called before output buffering ends

---

## Notes

- Language preference stored in **PHP sessions** (not cookies)
- Default language: **Russian**
- URL parameters (`?lang=en`) can override session preference
- All header and footer text is now translatable
- Hero section has full English implementation
- Other sections available in Russian only (for now)
