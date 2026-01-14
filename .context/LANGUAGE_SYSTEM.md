# Language System Documentation

## Overview
The theme now supports Russian and English language versions with a functional language switcher in the header.

## How It Works

### 1. Language Management Module (`inc/language-manager.php`)
- Handles language detection and switching via URL parameters
- Stores language preference in PHP sessions
- Provides helper functions for getting translated text

### 2. Key Functions

#### `tp_get_current_language()`
Returns the current language ('ru' or 'en'). Checks:
1. URL parameter `?lang=en` or `?lang=ru`
2. Session storage
3. Defaults to 'ru' (Russian)

#### `tp_is_english()`
Boolean check - returns true if current language is English.

#### `tp_get_text($key, $default_ru, $default_en)`
Gets translated text based on current language:
```php
echo tp_get_text('header.donate', 'Хочу помочь', 'Donate');
```

#### `tp_get_translations()`
Returns array of all available translations. Add new translations here.

#### `tp_get_language_url($lang)`
Generates URL to switch language:
```php
<a href="<?php echo tp_get_language_url('en'); ?>">ENG</a>
```

## Updated Files

### Header (`header.php`)
- Navigation menu items now support both languages
- "Donate" button text is dynamic
- Language switcher buttons are now functional links
- Active language button has `--active` class

### Footer (`footer.php`)
- All text content supports both languages:
  - Navigation links (Projects, Reports, About Us, Details)
  - Email and copyright
  - Subscription form text
  - Legal document links
  - Consent checkbox text

### Main Template (`front-page.php`)
- Loads Russian version: full site with all sections
- Loads English version: only hero section (placeholder for future sections)

### Hero Section (`template-parts/home/hero.php`)
- Title supports both languages (dynamic)
- "Learn More" button supports both languages

### English Hero Section (`template-parts/home/hero-en.php`)
- NEW: Static English hero with 3 slides
- Provides sample English content

## Adding Translations

1. Open `inc/language-manager.php`
2. Find `tp_get_translations()` function
3. Add new key-value pair:
```php
'section.key' => [
    'ru' => 'Русский текст',
    'en' => 'English text',
],
```

4. Use in templates:
```php
echo tp_get_text('section.key', 'fallback_ru', 'fallback_en');
```

## Language Switching

Users can switch language in two ways:

### Method 1: Header Switcher
Click RU/ENG buttons in header (desktop). Language preference is stored in session.

### Method 2: Direct URL
Add `?lang=en` or `?lang=ru` to any page:
```
https://example.com/?lang=en
https://example.com/?lang=ru
```

## Current Status

### ✅ Implemented
- Language switching system
- Header with translated navigation
- Footer with translated content
- English hero section (3 slides)
- Session-based language persistence

### 🔄 Partial
- Main page has full Russian version
- English version shows hero only

### ❌ Not Yet Implemented
- English versions of other sections:
  - Donation section
  - About section
  - Projects section
  - Friends carousel
  - Media carousel
  - Materials carousel
  - Histories carousel
  - Team section

## Next Steps

To add English versions for remaining sections:

1. Create `template-parts/home/[section]-en.php` files
2. Add English text to `tp_get_translations()`
3. Update `front-page.php` to load English section templates when needed

Example:
```php
// In front-page.php
if ( tp_is_english() ) {
    get_template_part( 'template-parts/home/donation-en' );
} else {
    get_template_part( 'template-parts/home/donation' );
}
```

## Testing

1. Visit homepage: `/` (default Russian)
2. Click "ENG" button in header → page switches to English
3. Click "RU" button → back to Russian
4. Navigate away and come back → language preference persists
5. Test with URL: `/?lang=en` and `/?lang=ru`
