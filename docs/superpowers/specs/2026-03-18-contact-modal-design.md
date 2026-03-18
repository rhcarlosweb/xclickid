# Contact Modal & Admin Dashboard — Design Spec

**Date:** 2026-03-18
**Project:** XClickID
**Status:** Approved

---

## Overview

Add a contact form that appears in two contexts: as a modal triggered from multiple points across the site, and inline on the `contato.php` page (replacing the current contact info card). Submissions from both contexts use the same backend endpoint. Data is stored in a secure local JSON file. An admin dashboard at a hidden URL allows the admin to view, delete, and export all contacts as CSV.

---

## 1. Contact Modal

### Trigger Points

The modal is opened by any element with `data-open-modal="contact"`. Initial placements:

- Nav button "Falar com especialistas" (`_header.php`)
- Relevant CTA buttons in page bodies
- Relevant links in `_footer.php`

### HTML Structure

A single `<div id="contact-modal">` appended before `</body>` in `_header.php`. Contains:

- Dark overlay (`bg-black/70 backdrop-blur-sm`) covering full viewport
- Modal card: `bg-[#0a0a0a] border border-white/5 rounded-2xl` with glass styling
- Close button (×) top-right
- Hidden `<input type="hidden" name="csrf_token">` populated by JS from a meta tag
- Form with fields (see below)

### Form Fields

| Field    | Type    | Required | Notes                                      |
|----------|---------|----------|--------------------------------------------|
| Nome     | text    | yes      | min 2 chars                               |
| E-mail   | email   | yes      | standard format validation                |
| Telefone | tel     | yes      | accepts any format                        |
| Sites    | repeater| yes      | min 1 URL input; max 10; "+" adds row; "×" removes |

### Repeater Logic

- Minimum 1 URL input visible by default, maximum 10
- "Adicionar site" button appends a new input row via JS (cloneNode)
- Each row (except the first) has a remove button
- URL inputs validated client-side: must start with `http://` or `https://`
- If any URL is invalid on submit, all are flagged and submission is blocked

### Submission Flow

1. Client-side validation runs on submit (border turns red on error)
2. Valid form sends `fetch()` POST to `save-contato.php` with JSON body + `X-CSRF-Token` header
3. Submit button shows spinner during request
4. On success: form replaced with success message, modal auto-closes after 3s
5. On error: inline error message shown below form, button re-enabled

### CSRF Protection

- `_header.php` generates a CSRF token per session: `$_SESSION['csrf_token'] = bin2hex(random_bytes(32))`
- Token emitted in a `<meta name="csrf-token">` tag in `<head>`
- JS reads this meta tag and sends token in `X-CSRF-Token` request header on every `fetch()` call
- `save-contato.php` and `admin-action.php` both verify `$_SERVER['HTTP_X_CSRF_TOKEN'] === $_SESSION['csrf_token']` before processing

### Visual Style

Consistent with site: dark background `#050505`, primary blue `#3B82F6` for focus states and CTA button, white/5 borders, Inter font, rounded-2xl card, same glass-morphism aesthetic.

---

## 1b. Inline Form on contato.php

The same form fields and validation are rendered inline on `contato.php` — no modal wrapper, no overlay, no close button.

### Layout Changes to contato.php

The current "Informações de Contato" glass-panel card is modified:

- **Remove:** "Localização" row (map-pin icon + "São Paulo, SP — Brasil")
- **Remove:** "Horário de Atendimento" row (clock icon + "Segunda a Sexta, 9h às 18h")
- **Remove:** the "Estou interessado" mailto button at the bottom of the card
- **Keep:** "E-mail" row (mail icon + `contato@xclickid.com`)
- **Add:** below the e-mail row, a new `<section>` or second card containing the inline contact form

### Inline Form Rendering

The form HTML is extracted into a shared PHP partial `_contact-form.php` that renders the fields (Nome, E-mail, Telefone, Sites repeater) and the submit button. This partial is:

- Included inside the modal (`_header.php`) wrapped in the modal card
- Included directly in `contato.php` inside a glass-panel card

This avoids duplication of the form markup. The `action` in both contexts is `save-contato.php` via `fetch()`.

The inline form on `contato.php` has the same success/error feedback behavior as the modal version (inline state change, no page reload), but instead of auto-closing, it shows a persistent success message.

### Modified Files (addition)

```
_contact-form.php          ← new shared partial: form fields only (no modal chrome)
contato.php                ← remove location + hours rows; include inline form partial
```

---

## 2. Data Storage

### File Location

```
data/
  contacts.json    ← created automatically on first submission
  .htaccess        ← Deny from all
```

The `data/` directory is blocked from public access via `.htaccess`:

```apache
Order deny,allow
Deny from all
```

`data/contacts.json` is listed in `.gitignore` to prevent committing PII.

### JSON Structure

```json
[
  {
    "id": "550e8400-e29b-41d4-a716-446655440000",
    "created_at": "2026-03-18T14:32:00-03:00",
    "name": "João Silva",
    "email": "joao@empresa.com",
    "phone": "+55 11 99999-9999",
    "sites": [
      "https://meusite.com.br",
      "https://loja.empresa.com"
    ]
  }
]
```

### Write Safety

All file writes (save, delete) use `fopen()` + `flock(LOCK_EX)` to prevent data corruption from concurrent requests. This applies to both `save-contato.php` and `admin-action.php`. UUID v4 is generated via PHP's `random_bytes()`.

### Server-side URL Validation

`save-contato.php` validates each URL with `filter_var($url, FILTER_VALIDATE_URL)` and verifies the scheme is `http` or `https`. Maximum 10 URLs per submission. If any URL fails validation, the entire submission is rejected with a `400` response and a descriptive error message.

---

## 3. Admin Authentication

### Access URL

`/painel-contatos.php` — not linked anywhere in the public site.

### Credentials

- **User:** `edgar@onlinetizando.com`
- **Password hash:** pre-computed with `password_hash('R98oU1N(L2}Z', PASSWORD_BCRYPT)` and stored as a PHP constant inside `painel-contatos.php`. The plain text password never appears in the code.

```php
// In painel-contatos.php
define('ADMIN_EMAIL', 'edgar@onlinetizando.com');
define('ADMIN_HASH', '$2y$12$...'); // generated once and hardcoded
```

### Session Management

- `session_start()` + `session_regenerate_id(true)` after successful login
- Session timeout: 2 hours of inactivity (checked via `$_SESSION['last_activity']`)
- Logout destroys session and redirects to login form

### Brute Force Protection

File-based rate limiting (survives server restarts and cookie clearing):
- Attempt log stored in `data/login_attempts.json` (also blocked by `.htaccess`)
- Counter keyed by IP address + timestamp
- After 5 failures from the same IP: 15-minute lockout
- `data/login_attempts.json` also listed in `.gitignore`
- Error messages are generic ("Credenciais inválidas") — no hint which field is wrong

---

## 4. Admin Dashboard

### Layout

Reuses site visual identity: dark theme, Tailwind CDN, Inter font, glass-morphism cards, blue accents. Fully responsive.

**Header bar:**
- XClickID logo + "Painel de Contatos" title
- Total contact count badge
- "Exportar CSV" button (HTML `<form method="POST">` targeting `admin-action.php`)
- "Sair" button

### Contacts Table

Columns: Data/Hora | Nome | E-mail | Telefone | Sites | Ações

- Ordered by `created_at` descending (newest first)
- Sites column: each URL as a clickable `<a>` link (truncated if long)
- Pagination: 20 contacts per page with prev/next controls (`?page=N`)
- Empty state: friendly message when no contacts exist

### Delete

- Each row has a "Excluir" button inside a `<form method="POST">` targeting `admin-action.php`
- Form includes hidden fields: `action=delete`, `id={uuid}`, `page={current_page}`, `csrf_token`
- JS `confirm()` intercepts the submit event before the form posts
- PHP removes the entry from the JSON array (with `flock`) and rewrites the file
- Redirect back to `painel-contatos.php?page={current_page}` after delete to preserve pagination state

### admin-action.php CSRF Verification

`admin-action.php` serves both plain HTML form submissions (delete, export) and must verify CSRF from the POST body (`$_POST['csrf_token']`). It does not use the `X-CSRF-Token` header (that is only for `fetch()` AJAX calls from the contact modal). The check is: `$_POST['csrf_token'] === $_SESSION['csrf_token']`.

### Export CSV

- "Exportar CSV" is a `<form method="POST" action="admin-action.php">` with hidden fields: `action=export`, `csrf_token`
- PHP reads all contacts, writes CSV rows, and outputs with headers:
  ```
  Content-Type: text/csv; charset=UTF-8
  Content-Disposition: attachment; filename="contatos-YYYY-MM-DD.csv"
  ```
- Columns: ID, Data, Nome, E-mail, Telefone, Sites (pipe-separated if multiple)
- Browser triggers file download directly from the form POST response

---

## 5. Files Created / Modified

### New Files

```
data/.htaccess             ← blocks public access to data directory
data/contacts.json         ← auto-created on first submission (in .gitignore)
data/login_attempts.json   ← brute force log (in .gitignore)
_contact-form.php          ← shared form partial (fields + submit button, no modal chrome)
save-contato.php           ← AJAX endpoint: validates and saves contact
admin-action.php           ← POST endpoint: delete and export CSV
painel-contatos.php        ← login form + dashboard (session-protected)
```

### Modified Files

```
_header.php                ← CSRF meta tag + modal markup (includes _contact-form.php) + nav CTA trigger
_footer.php                ← data-open-modal="contact" on relevant links
contato.php                ← remove location + hours rows; include _contact-form.php inline
assets/js/main.js          ← modal open/close, repeater logic, AJAX submit (shared logic for both contexts)
.gitignore                 ← add data/contacts.json, data/login_attempts.json
.htaccess                  ← exclude backend PHP files from 301 redirect rule
```

### .htaccess Backend Exclusion

The root `.htaccess` has a rule that issues a `301` redirect for any request matching `*.php` in the URL path, converting POST to GET and breaking all backend endpoints. The three backend files must be excluded from this rule by adding `RewriteCond` exceptions before the redirect line:

```apache
# Redirect existing .php URLs to clean URLs
# (exclude backend endpoints from redirect)
RewriteCond %{THE_REQUEST} \s/+(.+?)\.php[\s?] [NC]
RewriteCond %{THE_REQUEST} !/save-contato\.php [NC]
RewriteCond %{THE_REQUEST} !/admin-action\.php [NC]
RewriteCond %{THE_REQUEST} !/painel-contatos\.php [NC]
RewriteRule ^ /%1 [R=301,L]
```

### No new dependencies

All implementation uses PHP vanilla + JS vanilla + Tailwind CDN already loaded.

---

## 6. Security Checklist

- [ ] `data/.htaccess` blocks direct file access
- [ ] `data/contacts.json` and `data/login_attempts.json` in `.gitignore`
- [ ] PHP server-side validation before writing to JSON (sanitize all fields)
- [ ] `filter_var(FILTER_VALIDATE_URL)` + scheme whitelist for URL fields
- [ ] `password_hash()` / `password_verify()` for admin credentials
- [ ] `session_regenerate_id()` after login
- [ ] CSRF token in `<meta>` tag; verified via `X-CSRF-Token` header on AJAX; verified via POST field on form submissions
- [ ] Rate limiting on login via file-based IP tracking (5 attempts → 15 min lockout)
- [ ] `flock(LOCK_EX)` on all JSON file writes (save, delete)
- [ ] All output in dashboard escaped with `htmlspecialchars()`
- [ ] Pagination state preserved in delete redirects
