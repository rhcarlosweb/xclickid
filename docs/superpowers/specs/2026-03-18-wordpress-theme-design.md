# XClickID — WordPress Classic Theme Design

**Date:** 2026-03-18
**Status:** Approved

---

## Overview

Convert the existing XClickID PHP marketing site into a classic WordPress theme named `xclickid`. The theme preserves all existing visual design, animations, and content while adopting WordPress best practices: template hierarchy, `get_template_part()`, ACF-driven content, and a proper `@wordpress/scripts` build pipeline with Tailwind CSS v4.

---

## 1. Theme File Structure

```
xclickid/
├── style.css                          # Theme header only — no styles
├── functions.php                      # Enqueues, ACF filters, theme supports, menus
├── index.php                          # WP required fallback
├── front-page.php                     # Homepage
├── page.php                           # Default page template (WP editor content)
├── page-sobre-nos.php
├── page-confianca-seguranca.php
├── page-contato.php
├── page-ajuda-faq.php
├── header.php                         # wp_head(), nav, mobile menu
├── footer.php                         # footer content, wp_footer()
├── template-parts/
│   ├── global/
│   │   ├── nav.php
│   │   ├── mobile-menu.php
│   │   ├── footer-content.php
│   │   └── widget.php
│   ├── home/
│   │   ├── hero.php
│   │   ├── marquee.php
│   │   ├── network.php
│   │   ├── steps.php
│   │   ├── methods.php
│   │   ├── values.php
│   │   └── trust.php
│   └── pages/
│       ├── sobre-nos.php
│       ├── confianca-seguranca.php
│       ├── contato.php
│       └── faq.php
├── acf-json/
│   ├── group_home.json
│   ├── group_sobre_nos.json
│   ├── group_confianca_seguranca.json
│   ├── group_contato.json
│   └── group_faq.json
├── assets/
│   ├── src/
│   │   ├── js/
│   │   │   ├── main.js                # Webpack entry — imports all modules
│   │   │   ├── icons.js
│   │   │   ├── lenis.js
│   │   │   ├── navbar.js
│   │   │   ├── mouse-tracking.js
│   │   │   ├── hero-card.js
│   │   │   ├── mobile-menu.js
│   │   │   ├── scroll-animations.js
│   │   │   └── widget.js
│   │   └── scss/
│   │       └── main.scss              # Tailwind v4 directives + custom styles
│   └── build/                         # Compiled output (gitignored)
│       ├── main.js
│       └── main.css
├── webpack.config.js
├── postcss.config.js
├── bs-config.cjs
└── package.json
```

---

## 2. Build Pipeline

### Dependencies
Remove existing `sass`, `build:css`, `watch:css` scripts. New `devDependencies`:
- `@wordpress/scripts`
- `tailwindcss` (v4)
- `@tailwindcss/postcss`
- `autoprefixer`
- `browser-sync`, `concurrently` (kept)

### @wordpress/scripts
Custom `webpack.config.js` extends the default config with a single override — entry and output path:

```js
const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const path = require('path');

module.exports = {
  ...defaultConfig,
  entry: { main: './assets/src/js/main.js' },
  output: { ...defaultConfig.output, path: path.resolve(__dirname, 'assets/build') },
};
```

### Tailwind CSS v4
Uses `@tailwindcss/postcss` (not the v3 `tailwindcss` PostCSS plugin). Auto content detection — no `tailwind.config.js` needed.

```js
// postcss.config.js
module.exports = { plugins: { '@tailwindcss/postcss': {}, autoprefixer: {} } };
```

```scss
// assets/src/scss/main.scss
@import "tailwindcss";

@theme {
  --color-primary: #3B82F6;
  --color-bg: #050505;
  /* all custom design tokens */
}

/* existing custom styles below */
```

`main.js` must import the SCSS file to trigger CSS emission by webpack:

```js
// assets/src/js/main.js — first line
import '../scss/main.scss';
```

### npm scripts

| Script | Command |
|---|---|
| `build` | `wp-scripts build` |
| `start` | `wp-scripts start` |
| `dev` | `concurrently "pnpm start" "browser-sync start --config bs-config.cjs"` |

### BrowserSync
`bs-config.cjs` lives inside the theme directory (`wp-content/themes/xclickid/`). Proxy unchanged (DDEV). Watches updated to `assets/build/**` and `./**/*.php` (relative to the theme root).

### CDN Libraries
GSAP, Lenis, and Lucide Icons remain as CDN `<script>` tags in `header.php`. They attach to `window` before the bundled script runs. The `lenis` npm package is removed from `dependencies` — CDN only. Webpack externals prevent attempting to bundle them:

```js
externals: { gsap: 'gsap', lenis: 'Lenis', lucide: 'lucide' }
```

JS modules do **not** `import` these libraries — they are used as globals (`window.gsap`, `new Lenis(...)`, `lucide.createIcons()`). The externals entry ensures webpack does not try to resolve them if any import statement exists.

---

## 3. JavaScript Modules

All modules are **extracted from the existing `main.js` and `lenis-setup.js`** — no new logic is added. Each file has one responsibility and is imported in `main.js`.

| File | Responsibility |
|---|---|
| `icons.js` | `lucide.createIcons()` |
| `lenis.js` | Lenis init, GSAP ticker integration, hash anchor smooth scroll |
| `navbar.js` | Scroll detection → adds `glass-panel` to nav at 50px |
| `mouse-tracking.js` | RAF loop, mouse position tracking, network parallax |
| `hero-card.js` | 3D tilt on mousemove, radial glow effect, hover scale via GSAP |
| `mobile-menu.js` | Toggle overlay, staggered item fade-in |
| `scroll-animations.js` | IntersectionObserver fade-in on scroll |
| `widget.js` | Session hash, IP fetch, verification badge render |

---

## 4. style.css Theme Header

```css
/*
Theme Name: XClickID
Theme URI: https://xclickid.com
Author: XClickID
Author URI: https://xclickid.com
Description: Identity verification platform theme
Version: 1.0.0
Text Domain: xclickid
*/
```

No styles are written in this file. All styles come from `assets/build/main.css`.

---

## 5. WordPress Integration

### functions.php responsibilities
- `add_theme_support()` — `title-tag`, `post-thumbnails`
- `register_nav_menus()` — primary and footer menus
- `wp_enqueue_scripts()` — enqueue `assets/build/main.js` and `assets/build/main.css`
- ACF load/save JSON path filters

### ACF JSON filters
```php
add_filter('acf/settings/load_json', function($paths) {
    $paths[] = get_template_directory() . '/acf-json';
    return $paths;
});

add_filter('acf/settings/save_json', function() {
    return get_template_directory() . '/acf-json';
});
```

### Template hierarchy
- `front-page.php` — Homepage, calls `get_template_part()` for each home section
- `page.php` — Default editor template; wraps `the_content()` with site header/footer
- `page-{slug}.php` — Custom templates for non-editor pages, call template-parts
- Legal pages (`aviso-legal`, `privacidade`, `termos-usuarios`) — no `page-{slug}.php` file; fall through to `page.php`

### widget.php inclusion
`template-parts/global/widget.php` is included in `footer.php` **before** the `wp_footer()` call, so it renders inside `<body>` before WordPress closes out the page.

---

## 6. ACF Field Groups

| JSON file | ACF Location Rule | Key fields |
|---|---|---|
| `group_home.json` | `Page Type == Front Page` | hero (headline, subheadline, ctas), marquee items (repeater), network (headline, desc), steps (repeater), methods (repeater), values (repeater), trust items (repeater) |
| `group_sobre_nos.json` | `Page == sobre-nos` (by slug) | hero headline/text, mission text, values repeater (icon, title, desc) |
| `group_confianca_seguranca.json` | `Page == confianca-seguranca` (by slug) | hero headline/text, sections repeater |
| `group_contato.json` | `Page == contato` (by slug) | email, location, whatsapp |
| `group_faq.json` | `Page == ajuda-faq` (by slug) | items repeater (question, answer) |

Homepage uses `Page Type == Front Page`. All other pages use `Page == [slug]`. The `page-{slug}.php` template files do **not** need a `Template Name:` header — WordPress matches them automatically via slug.

Legal pages (`aviso-legal`, `privacidade`, `termos-usuarios`) have no `page-{slug}.php` file and no ACF group — WordPress falls through to `page.php`, and content is managed entirely via the WordPress block editor.

---

## 7. Default Page Template (`page.php`)

Wraps the WordPress editor content with the site's visual shell (dark background, header, footer). Suitable for legal/text-heavy pages created by editors without developer involvement.

```php
<?php get_header(); ?>
<main class="min-h-screen bg-[#050505] text-white pt-32 pb-20">
  <div class="max-w-4xl mx-auto px-6">
    <h1 class="text-4xl font-bold mb-8"><?php the_title(); ?></h1>
    <div class="prose prose-invert max-w-none">
      <?php the_content(); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>
```

---

## 8. Out of Scope

- No custom Gutenberg blocks
- No WooCommerce or CPT registration
- No child theme
- No multisite support
