# Codebase Analysis Summary

## Project at a Glance

**Tebe Poveryat WordPress Theme** - A custom theme for an NGO providing psychological and legal support to survivors of childhood sexual abuse.

- **Status:** Mobile version complete, Desktop adaptation in progress
- **Type:** Classic WordPress PHP theme (not block-based)
- **Build:** npm + Tailwind CSS v4
- **Repository:** https://github.com/monkey-di/tp-theme

---

## Key Files to Know

### Must-Know Files
- **front-page.php** → Homepage entry point (loads all 10 sections)
- **header.php** → Site header, logo, mobile menu button
- **footer.php** → Site footer, includes mobile menu overlay
- **src/input.css** → Tailwind source (EDIT THIS for CSS)
- **assets/css/output.css** → Compiled CSS (AUTO-GENERATED, don't edit)
- **assets/js/sliders.js** → Swiper carousel initialization
- **functions.php** → Asset enqueueing and theme setup

### Important Directories
- **template-parts/home/** → 10 homepage sections (mobile-first)
- **template-parts/components/** → 5 reusable UI components
- **src/** → Source CSS with Tailwind configuration
- **assets/js/** → JavaScript files
- **parts/** → Mobile menu HTML overlay

---

## Quick Start (5 Minutes)

```bash
# 1. Navigate to theme
cd wp-content/themes/tebe-poveryat

# 2. Install dependencies
npm install

# 3. Start development (ALWAYS run this)
npm run dev

# 4. Make changes to CSS or templates
# 5. Refresh browser to see changes

# 6. Build for production
npm run build
```

**Critical:** Always have `npm run dev` running when editing CSS/Tailwind classes.

---

## Technology Stack

| Layer | Tech | Version |
|-------|------|---------|
| CSS | Tailwind CSS | v4.0.0-alpha.14 |
| Carousels | Swiper.js | v11.0.0 |
| JavaScript | Vanilla JS | - |
| Backend | WordPress | 6.x+ |
| PHP | - | 7.4+ |
| Build Tool | npm | - |

---

## Color System

**7 Theme Colors** defined in `src/input.css` @theme:

```
#6063a6  Primary (Purple)
#d98b99  Secondary (Pink)
#fef1ec  Base (Light Beige)
#1e1e1e  Contrast (Near Black)
#1c5358  Teal
#6bbad9  Sky Blue
#f2c995  Peach
```

Colors also defined in `theme.json` for WordPress block editor.

---

## Responsive Breakpoints

Mobile-first approach: start with base styles, add larger screen overrides.

| Screen | Size | Prefix | Example |
|--------|------|--------|---------|
| Mobile | 320px+ | (none) | `w-full` |
| Tablet | 768px+ | `md:` | `md:w-1/2` |
| Desktop | 1024px+ | `lg:` | `lg:w-1/3` |

---

## Homepage Structure

10 Sections (all mobile-first):

1. **Hero** - 3-slide carousel with Swiper
2. **Donation** - CTA section
3. **About** - About + stats grid
4. **About Part 2** - Extended content
5. **Projects** - Static grid
6. **Friends** - Partners carousel
7. **Media** - Gallery carousel
8. **Materials** - Materials carousel
9. **Histories** - Testimonies carousel
10. **Team** - Team carousel

**6 Sliders use Swiper.js:** Hero, Friends, Media, Materials, Histories, Team
- Each has auto-rotation, navigation arrows, progress bars
- Configured in `assets/js/sliders.js`

---

## Component System

5 Reusable Components in `template-parts/components/`:

### 1. button.php
Versatile button/link with styles: primary, secondary, white, outline-*, form-submit

### 2. link-more.php
Learn More link with arrow icon

### 3. input-with-button.php
Email subscription input with button

### 4. slider-navigation.php
Prev/Next arrows for sliders

### 5. slider-progress.php
Progress bar for sliders

**Usage Pattern:**
```php
<?php get_template_part('template-parts/components/button', null, [
    'text' => 'Click Me',
    'style' => 'primary',
    'url' => '/page'
]); ?>
```

---

## Development Workflow

### 1. Start Dev Server
```bash
npm run dev  # Watch mode, recompiles on changes
```

### 2. Edit CSS
- File: `src/input.css`
- Changes auto-compile to `assets/css/output.css`
- Refresh browser to see changes

### 3. Edit PHP Templates
- Directory: `template-parts/`
- WordPress auto-loads changes
- Refresh browser to see changes

### 4. Edit JavaScript
- Files: `assets/js/main.js`, `assets/js/sliders.js`
- Changes take effect on refresh (no compilation needed)

### 5. Build for Production
```bash
npm run build  # Creates minified output.css
```

---

## Special Features

### Mobile Menu
- **Trigger:** `.js-open-mobile-menu` button in header
- **File:** `parts/mobile-menu-overlay.html` (loaded in footer.php)
- **Animation:** Slides in from right (Tailwind translate-x)
- **Close:** ESC key or close button
- **State:** Body scroll locked when open

### Sliders
- **Library:** Swiper.js v11
- **Count:** 6 sliders (Hero, Friends, Media, Materials, Histories, Team)
- **Features:** Loop, autoplay, arrows, progress bars
- **Responsive:** Different slidesPerView on tablet/desktop
- **Config File:** `assets/js/sliders.js`

### Typography
- **Body:** Geologica (Google Fonts)
- **Headers (h1-h2):** Ura Bum Bum SP (display/decorative)
- **Headers (h3-h6), UI:** Akrobat (bold, uppercase)

---

## Current Project Status

### COMPLETED
✓ Mobile design (320px+) - all sections
✓ Swiper sliders - configured and working
✓ Mobile menu - implemented
✓ Component system - 5 components extracted
✓ Typography system - hierarchies defined
✓ Color palette - 7 theme colors configured
✓ Figma assets - integrated

### IN PROGRESS
- Desktop adaptation (adding md:, lg:, xl: classes)
- Slider breakpoint adjustments for tablets/desktop

### NOT IMPLEMENTED
- PHP form handlers
- Single post template
- Archive/category pages
- 404 page
- Dynamic WordPress menus
- SEO enhancements

---

## Important Constraints & Notes

### Tailwind v4 Alpha
- Using pre-release version (potential breaking changes)
- Configuration via @theme (not config.js)
- Monitor updates for migrations

### Asset URLs
- Current: Images from Figma API (`https://www.figma.com/api/mcp/asset/...`)
- Action needed: Migrate to local assets for production

### Mobile Menu
- HTML overlay, not dynamic WP menu
- Requires manual updates to menu items
- Fully customizable design

### No Plugin Dependencies
- All functionality in theme files
- No ACF, post types, or complex WP features
- Standard database tables

---

## Critical Commands

```bash
npm run dev      # Start watch mode (MUST run before editing CSS)
npm run build    # Production build (minified)
npm run copy-assets  # Copy Swiper from npm to vendor
```

---

## Documentation Structure

| File | Purpose |
|------|---------|
| **QUICK_START.md** | Getting started, common tasks |
| **PROJECT_STRUCTURE.txt** | Directory organization, file purposes |
| **TECHNOLOGY_STACK.txt** | Tech details, architecture decisions |
| **CONTEXT.md** | Current status, next steps |
| **TODO.md** | Task tracking |
| **SUMMARY.md** | This file - overview |

---

## For Developers Joining Project

1. Read **QUICK_START.md** first
2. Run installation commands
3. Start `npm run dev`
4. Make changes following mobile-first approach
5. Test on multiple screen sizes
6. Refer to **PROJECT_STRUCTURE.txt** for file locations
7. Check **TECHNOLOGY_STACK.txt** for technical details

---

## Key Takeaways

✓ **Mobile-first** responsive design  
✓ **npm run dev** required for CSS editing  
✓ **Component system** for UI reusability  
✓ **6 Swiper sliders** on homepage  
✓ **7 theme colors** defined in @theme  
✓ **No plugins** - all in theme files  
✓ **Figma API** assets need local migration  
✓ **Desktop adaptation** in progress  

---

**Generated:** 2025-12-08  
**Project:** Tebe Poveryat WordPress Theme  
**Repository:** https://github.com/monkey-di/tp-theme
