# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project: Tebe Poveryat WordPress Theme

Custom WordPress theme for NGO "Tebe Poveryat" providing psychological & legal support. **Status:** Mobile version complete, desktop adaptation in progress.

### Core Technologies
- **CSS:** Tailwind CSS v4.0.0-alpha.14 (via @theme directive in `src/input.css`)
- **Carousels:** Swiper.js v11
- **Backend:** WordPress 6.x + PHP 7.4+
- **Build:** npm + Tailwind CLI

---

## Quick Start

```bash
cd wp-content/themes/tebe-poveryat
npm install
npm run dev    # MUST run in separate terminal before editing CSS
```

### Commands
- `npm run dev` - Watch mode (auto-recompile CSS)
- `npm run build` - Production build (minified)
- `npm run copy-assets` - Copy Swiper library to vendor

---

## Architecture

### Homepage Structure (front-page.php)
Loads 10 mobile-first sections via `template-parts/home/`:
1. Hero (Swiper carousel, 3 slides)
2. Donation (CTA)
3. About (with stats grid)
4. About Part 2
5. Projects (static grid)
6. Friends (Swiper carousel)
7. Media (Swiper carousel)
8. Materials (Swiper carousel)
9. Histories (Swiper carousel)
10. Team (Swiper carousel)

### Component System (template-parts/components/)
- **button.php** - Styles: primary, secondary, white, outline-*, form-submit
- **link-more.php** - Learn More with arrow
- **input-with-button.php** - Email subscription
- **slider-navigation.php** - Carousel arrows
- **slider-progress.php** - Progress bar

### CSS Architecture
- **Source:** `src/input.css` (edit this)
- **Compiled:** `assets/css/output.css` (auto-generated, never edit)
- **Fonts:** Geologica (body), Akrobat (UI), Ura Bum Bum SP (display)
- **7 Theme Colors** defined in @theme: primary (#6063a6), secondary (#d98b99), base (#fef1ec), contrast (#1e1e1e), teal, sky, peach

### Responsive Design
Mobile-first approach. Start with base styles, add breakpoint prefixes:
- Mobile: 320px+ (no prefix)
- Tablet: 768px+ (`md:`)
- Desktop: 1024px+ (`lg:`)
- Large: 1280px+ (`xl:`)

---

## Important Notes

### Critical Constraints
1. **Always run `npm run dev`** before editing Tailwind classes
2. **Never edit `assets/css/output.css`** - it's auto-generated
3. **Mobile-first:** Base styles for mobile, add responsive overrides
4. **No plugin dependencies** - all in theme files
5. **Figma assets:** Currently from API, need local migration for production
6. **Mobile menu:** HTML overlay (not dynamic WordPress menu)

### User Preferences (from GEMINI.md)
- Communicate in Russian
- Exported HTML from design tools is reference only; refactor into clean responsive code
- Use SVG for icons/logo (inline when simple), raster for content photos
- Store contextual files in `.context/` directory (Windows compatible paths, no /tmp)
- Mobile layout still in refinement; not fully complete

---

## File Quick Reference

| File | Purpose |
|------|---------|
| `front-page.php` | Homepage template (loads sections) |
| `src/input.css` | Tailwind source + @theme config |
| `assets/css/output.css` | Compiled CSS (auto-generated) |
| `template-parts/home/` | 10 homepage sections |
| `template-parts/components/` | 5 UI components |
| `assets/js/main.js` | Mobile menu handler |
| `assets/js/sliders.js` | Swiper carousel init |
| `functions.php` | Asset enqueueing |
| `theme.json` | Block editor settings + colors |

---

## Current Project Status

### ✅ COMPLETED
- Mobile design (320px+) for all sections
- 6 Swiper sliders configured
- Mobile menu overlay implemented
- 5 UI components extracted
- Typography hierarchy (3 fonts)
- Color system (7 colors in @theme)
- Figma assets integration

### 🔄 IN PROGRESS
- Desktop adaptation (adding `md:`, `lg:` classes)
- Slider breakpoint adjustments

### ❌ NOT YET IMPLEMENTED
- PHP form handlers
- Single post template
- Archive/category pages
- 404 page
- Dynamic WordPress menus
- SEO enhancements

---

## When Adding New Features

### New Section to Homepage
1. Create `template-parts/home/new-section.php`
2. Use mobile-first approach (base styles for mobile)
3. Add responsive classes: `md:`, `lg:` for desktop
4. Add call to `front-page.php`: `<?php get_template_part('template-parts/home/new-section'); ?>`

### New Component
1. Create `template-parts/components/component-name.php`
2. Accept args array: `$args = get_query_var('args', []);`
3. Extract args and render with Tailwind classes
4. Use in other templates: `<?php get_template_part('template-parts/components/component-name', null, ['key' => 'value']); ?>`

### Color Changes
1. Edit `src/input.css` - @theme section
2. Update `theme.json` - color palette
3. Update components as needed
4. `npm run dev` auto-compiles

---

## Documentation Files

All analysis stored in `.context/`:
- `SUMMARY.md` - Project overview
- `QUICK_START.md` - Setup & common tasks
- `PROJECT_STRUCTURE.txt` - Directory organization
- `TECHNOLOGY_STACK.txt` - Tech details & architecture
- `CONTEXT.md` - Current status (Russian)
- `TODO.md` - Task tracking
- `GEMINI.md` - User preferences & memories

---

## Key Takeaways

✓ Mobile-first responsive design
✓ Tailwind CSS v4 (@theme configuration)
✓ **`npm run dev` required** for CSS editing
✓ Component-based PHP templates
✓ 6 Swiper carousels on homepage
✓ No plugin dependencies
✓ Desktop adaptation in progress

---

**Repository:** https://github.com/monkey-di/tp-theme
**Theme Location:** `wp-content/themes/tebe-poveryat/`
