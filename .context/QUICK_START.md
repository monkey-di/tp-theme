# QUICK START GUIDE - Tebe Poveryat Theme

## First Time Setup

### 1. Install Dependencies
```bash
cd wp-content/themes/tebe-poveryat
npm install
```

### 2. Start Development
```bash
npm run dev
```
This starts watch mode - CSS will recompile on file changes.

### 3. Local Development Environment
Option A: Using Docker
```bash
cd ..  # Go to project root
docker-compose up
# Access: http://localhost:8080
```

Option B: Using existing WordPress installation
- Copy theme folder to wp-content/themes/
- Activate in WordPress admin

---

## Common Tasks

### Working with Styles
1. Modify `src/input.css` (source file)
2. Ensure `npm run dev` is running
3. CSS auto-compiles to `assets/css/output.css`
4. Refresh browser to see changes

### Adding New Section
1. Create new PHP file in `template-parts/home/`
2. Use mobile-first approach (start with base styles)
3. Add responsive classes (md:, lg:)
4. Add section call to `front-page.php`

Example:
```php
<?php get_template_part('template-parts/home/new-section'); ?>
```

### Using Components
```php
<?php get_template_part('template-parts/components/button', null, [
    'text' => 'Click Me',
    'style' => 'primary',
    'url' => '/page',
    'size' => 'md'
]); ?>
```

### Modifying Sliders
- Edit `assets/js/sliders.js`
- Adjust `slidesPerView` in breakpoints for desktop
- Test on multiple screen sizes

### Updating Colors
1. Edit `src/input.css` - @theme section
2. Update `theme.json` - color palette
3. Run `npm run build` to recompile

---

## File Locations

| Purpose | Location |
|---------|----------|
| Source CSS | `src/input.css` |
| Compiled CSS | `assets/css/output.css` |
| Mobile Menu | `parts/mobile-menu-overlay.html` |
| Main JS | `assets/js/main.js` |
| Sliders JS | `assets/js/sliders.js` |
| Header | `header.php` |
| Footer | `footer.php` |
| Homepage | `front-page.php` |
| Sections | `template-parts/home/` |
| Components | `template-parts/components/` |

---

## Tailwind Breakpoints

- **Mobile** (320px+): No prefix
- **Tablet** (768px+): `md:`
- **Desktop** (1024px+): `lg:`
- **Large** (1280px+): `xl:`

Example:
```html
<div class="w-full md:w-1/2 lg:w-1/3">
  Content
</div>
```

---

## Component Arguments Reference

### Button
```php
<?php get_template_part('template-parts/components/button', null, [
    'text' => 'Button Text',           // Required
    'url' => '/page',                  // Optional (link) or omit (button)
    'style' => 'primary',              // primary, secondary, white, outline-primary, outline-white, form-submit
    'size' => 'md',                    // sm, md, lg
    'state' => 'default',              // default, disabled
    'class' => 'extra-classes',        // Additional CSS
    'submit' => false                  // true if type="submit"
]); ?>
```

### Link More
```php
<?php get_template_part('template-parts/components/link-more', null, [
    'text' => 'Learn More',
    'url' => '/page',
    'style' => 'hero'
]); ?>
```

### Input with Button
```php
<?php get_template_part('template-parts/components/input-with-button', null, [
    'type' => 'email',
    'name' => 'subscribe',
    'placeholder' => 'your@email.com',
    'button_text' => 'Subscribe',
    'submit' => true,
    'state' => 'default'
]); ?>
```

### Slider Navigation
```php
<?php get_template_part('template-parts/components/slider-navigation', null, [
    'prev_class' => 'hero-prev',
    'next_class' => 'hero-next',
    'color' => 'text-primary'
]); ?>
```

### Slider Progress
```php
<?php get_template_part('template-parts/components/slider-progress', null, [
    'track_color' => 'bg-white',
    'bar_color' => 'bg-secondary'
]); ?>
```

---

## Color Palette

| Name | Hex | Usage |
|------|-----|-------|
| Primary | #6063a6 | Main brand, headers |
| Secondary | #d98b99 | Accents, buttons |
| Base | #fef1ec | Background, light |
| Contrast | #1e1e1e | Text, dark |
| Teal | #1c5358 | Accent |
| Sky | #6bbad9 | Accent |
| Peach | #f2c995 | Accent |

Use with Tailwind:
```html
<div class="bg-primary text-white">
  Styled element
</div>
```

---

## Typography

### Heading Scales
- `h1` / `.h1` - Ura Bum Bum SP, 73px, uppercase
- `h2` / `.h2` - Ura Bum Bum SP, 32px, uppercase
- `h3-h6` / `.h3-h6` - Akrobat Bold, various sizes
- `body` / `p` - Geologica Light, 16px

### Font Families
```html
<h1 class="font-ura">Ura Bum Bum SP</h1>
<h3 class="font-akrobat">Akrobat</h3>
<p class="font-geologica">Geologica (default)</p>
```

---

## Build Commands

```bash
npm run dev        # Watch mode (recompile on changes)
npm run build      # Production build (minified)
npm run copy-assets # Copy Swiper library
```

---

## Common Issues & Solutions

### CSS Not Updating?
- Ensure `npm run dev` is running
- Check terminal for errors
- Clear browser cache (Ctrl+Shift+Del)
- Hard refresh (Ctrl+F5)

### Sliders Not Working?
- Check HTML has correct slider classes
- Verify Swiper is loaded (check Network tab)
- Check browser console for JS errors
- Verify slider selector matches JS config

### Mobile Menu Stuck?
- Check z-index is z-50 or higher
- Try pressing ESC key
- Check console for JavaScript errors

### Images Not Loading?
- Figma images are temporary
- Use local assets instead
- Check image paths in HTML

---

## Build & Deploy

### Local Build
```bash
npm run build
```
This creates production-ready assets.

### What to Commit
```
✓ src/input.css
✓ template-parts/
✓ assets/js/
✓ header.php, footer.php, front-page.php
✓ functions.php, theme.json, package.json
✗ node_modules/ (add to .gitignore)
✗ assets/css/output.css (auto-generated)
```

### Deployment
1. Run `npm install` on production
2. Run `npm run build`
3. Deploy theme folder
4. Activate in WordPress admin

---

## Testing Checklist

- [ ] Mobile layout (320px+)
- [ ] Tablet layout (768px+)
- [ ] Desktop layout (1024px+)
- [ ] Mobile menu opens/closes
- [ ] Sliders auto-rotate
- [ ] Navigation arrows work
- [ ] All buttons are clickable
- [ ] Colors match design
- [ ] Fonts load correctly
- [ ] No console errors

---

## Useful Resources

- Tailwind CSS: https://tailwindcss.com/docs
- Swiper.js: https://swiperjs.com/
- WordPress Theme Handbook: https://developer.wordpress.org/themes/
- Theme colors: See `src/input.css` @theme section

---

## Need Help?

Check these files:
- `.context/CONTEXT.md` - Project overview
- `.context/TODO.md` - Current tasks
- `.context/CODEBASE_ANALYSIS.md` - Detailed analysis
- `.context/PROJECT_STRUCTURE.txt` - Directory structure
- `.context/TECHNOLOGY_STACK.txt` - Tech details

