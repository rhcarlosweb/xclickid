# Contact Modal & Admin Dashboard — Design Spec

**Date:** 2026-03-18
**Project:** XClickID
**Status:** Approved

---

## Overview

Add a contact modal to the site so visitors can submit their name, e-mail, phone, and website URLs. Submissions are stored in a secure local JSON file. An admin dashboard at a hidden URL allows the admin to view, delete, and export all contacts as CSV.

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
- Form with fields (see below)

### Form Fields

| Field    | Type    | Required | Notes                                      |
|----------|---------|----------|--------------------------------------------|
| Nome     | text    | yes      | min 2 chars                               |
| E-mail   | email   | yes      | standard format validation                |
| Telefone | tel     | yes      | accepts any format                        |
| Sites    | repeater| yes      | min 1 URL input; "+" adds row; "×" removes |

### Repeater Logic

- Minimum 1 URL input visible by default
- "Adicionar site" button appends a new input row via JS (cloneNode)
- Each row (except the first) has a remove button
- URL inputs are validated as valid URLs client-side

### Submission Flow

1. Client-side validation runs on submit (border turns red on error)
2. Valid form sends `fetch()` POST to `save-contato.php` with JSON body
3. Submit button shows spinner during request
4. On success: form replaced with success message, modal auto-closes after 3s
5. On error: inline error message shown below form, button re-enabled

### Visual Style

Consistent with site: dark background `#050505`, primary blue `#3B82F6` for focus states and CTA button, white/5 borders, Inter font, rounded-2xl card, same glass-morphism aesthetic.

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

`save-contato.php` uses `fopen()` + `flock(LOCK_EX)` before writing to prevent data corruption from concurrent requests. UUID v4 is generated via PHP's `random_bytes()`.

---

## 3. Admin Authentication

### Access URL

`/painel-contatos.php` — not linked anywhere in the public site.

### Credentials

- **User:** `edgar@onlinetizando.com`
- **Password:** stored as `password_hash()` (bcrypt) — never plain text in source

### Session Management

- `session_start()` + `session_regenerate_id(true)` after successful login
- Session timeout: 2 hours of inactivity (checked via `$_SESSION['last_activity']`)
- Logout destroys session and redirects to login form

### Brute Force Protection

Simple session-based rate limiting:
- Counter incremented per failed attempt
- After 5 failures: 15-minute lockout enforced via `$_SESSION['lockout_until']`
- Error messages are generic ("Credenciais inválidas") — no hint which field is wrong

---

## 4. Admin Dashboard

### Layout

Reuses site visual identity: dark theme, Tailwind CDN, Inter font, glass-morphism cards, blue accents. Fully responsive.

**Header bar:**
- XClickID logo + "Painel de Contatos" title
- Total contact count badge
- "Exportar CSV" button
- "Sair" button

### Contacts Table

Columns: Data/Hora | Nome | E-mail | Telefone | Sites | Ações

- Ordered by `created_at` descending (newest first)
- Sites column: each URL as a clickable `<a>` link (truncated if long)
- Pagination: 20 contacts per page with prev/next controls
- Empty state: friendly message when no contacts exist

### Delete

- Each row has a "Excluir" button
- Triggers browser `confirm()` dialog
- On confirm: POST to `admin-action.php` with `action=delete&id={uuid}`
- PHP removes the entry from the JSON array and rewrites the file
- Page reloads to reflect change

### Export CSV

- "Exportar CSV" button POSTs to `admin-action.php?action=export`
- PHP reads all contacts and outputs with headers:
  ```
  Content-Type: text/csv
  Content-Disposition: attachment; filename="contatos-YYYY-MM-DD.csv"
  ```
- Columns: ID, Data, Nome, E-mail, Telefone, Sites (pipe-separated if multiple)

---

## 5. Files Created / Modified

### New Files

```
data/.htaccess             ← blocks public access to data directory
data/contacts.json         ← auto-created on first submission
save-contato.php           ← AJAX endpoint: validates and saves contact
admin-action.php           ← AJAX/POST endpoint: delete and export
painel-contatos.php        ← login form + dashboard (session-protected)
```

### Modified Files

```
_header.php                ← modal markup + open trigger on nav CTA button
_footer.php                ← data-open-modal="contact" on relevant links
assets/js/main.js          ← modal open/close, repeater logic, AJAX submit
```

### No new dependencies

All implementation uses PHP vanilla + JS vanilla + Tailwind CDN already loaded.

---

## 6. Security Checklist

- [ ] `data/.htaccess` blocks direct file access
- [ ] PHP server-side validation before writing to JSON (sanitize all fields)
- [ ] `password_hash()` / `password_verify()` for admin credentials
- [ ] `session_regenerate_id()` after login
- [ ] CSRF token on the contact form and admin actions
- [ ] Rate limiting on login (5 attempts → 15 min lockout)
- [ ] `flock(LOCK_EX)` on JSON write
- [ ] All output in dashboard escaped with `htmlspecialchars()`
