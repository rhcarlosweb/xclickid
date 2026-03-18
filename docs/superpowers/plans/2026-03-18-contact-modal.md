# Contact Modal & Admin Dashboard Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Add a contact form (modal + inline on contato.php), secure JSON storage, and a protected admin dashboard with view/delete/export.

**Architecture:** Shared PHP partial `_contact-form.php` renders the form fields in both contexts (modal in `_header.php`, inline in `contato.php`). Three new PHP backend files handle saving contacts, admin auth/dashboard, and admin actions. All data lives in `data/contacts.json`, blocked from public access via `.htaccess`.

**Tech Stack:** PHP 8.4 (vanilla), JavaScript (vanilla ES6+ IIFE), Tailwind CSS CDN, DDEV local dev (`https://xclickid.ddev.site`)

**Spec:** `docs/superpowers/specs/2026-03-18-contact-modal-design.md`

> **Important — DDEV uses nginx-fpm, not Apache.** `.htaccess` files are silently ignored in the local dev environment. All `.htaccess` rules in this plan are for Apache production only. For the local DDEV environment: (1) the 301 redirect exclusions are irrelevant since nginx ignores `.htaccess`; (2) the `data/.htaccess` Deny rule does not protect the `data/` directory locally — add a DDEV nginx override (see Task 1 Step 4) to protect it. All verification steps must account for this difference.

---

## File Map

| File | Action | Responsibility |
|------|--------|---------------|
| `data/.htaccess` | Create | Block all public HTTP access to `data/` |
| `data/contacts.json` | Auto-created | Persistent contact store |
| `data/login_attempts.json` | Auto-created | Brute-force IP tracking |
| `.htaccess` | Modify | Exclude backend .php files from 301 redirect rule |
| `.gitignore` | Modify | Exclude PII files from git |
| `_contact-form.php` | Create | Shared form partial (fields + submit + success/error states) |
| `save-contato.php` | Create | AJAX endpoint: validate + flock-write contact |
| `admin-action.php` | Create | POST endpoint: delete contact or export CSV |
| `painel-contatos.php` | Create | Login form + session-protected dashboard |
| `_header.php` | Modify | Add session/CSRF, modal markup, update nav triggers |
| `_footer.php` | Modify | Add `data-open-modal` to relevant links |
| `contato.php` | Modify | Remove location/hours rows, add inline form |
| `assets/js/main.js` | Modify | Modal open/close, repeater, form submit AJAX |

---

## Task 1: Infrastructure — .htaccess exclusions, data directory, .gitignore

**Files:**
- Modify: `.htaccess` (lines 11–13)
- Create: `data/.htaccess`
- Modify: `.gitignore`

- [ ] **Step 1: Update root `.htaccess` to exclude backend PHP files from the 301 redirect**

Replace the redirect block (currently lines 11–13) with:

```apache
# Redirect existing .php URLs to clean URLs
# (backend endpoints excluded — 301 converts POST to GET, breaking them)
RewriteCond %{THE_REQUEST} \s/+(.+?)\.php[\s?] [NC]
RewriteCond %{THE_REQUEST} !/save-contato\.php [NC]
RewriteCond %{THE_REQUEST} !/admin-action\.php [NC]
RewriteCond %{THE_REQUEST} !/painel-contatos\.php [NC]
RewriteRule ^ /%1 [R=301,L]
```

- [ ] **Step 2: Create `data/.htaccess`**

```apache
Order deny,allow
Deny from all
```

- [ ] **Step 3: Update `.gitignore` — append PII files**

Add to the end of `.gitignore`:

```
# Contact data (PII — never commit)
data/contacts.json
data/login_attempts.json
```

- [ ] **Step 4: Add DDEV nginx override to protect `data/` locally**

Create `.ddev/nginx-site.conf` (or append to it if it exists):

```nginx
location ^~ /data/ {
    deny all;
    return 403;
}
```

Then restart DDEV:

```bash
ddev restart
```

- [ ] **Step 5: Verify data directory is protected (works in both Apache and nginx)**

```bash
curl -s -o /dev/null -w "%{http_code}" https://xclickid.ddev.site/data/contacts.json
```

Expected: `403`.

- [ ] **Step 6: Verify backend endpoints are NOT redirected (nginx ignores .htaccess, so this just verifies the file doesn't exist yet)**

```bash
curl -s -o /dev/null -w "%{http_code}" -X POST https://xclickid.ddev.site/save-contato.php
```

Expected: `404` (file not created yet) — NOT `301`.

- [ ] **Step 5: Commit**

```bash
git add .htaccess data/.htaccess .gitignore
git commit -m "feat: add data directory protection and exclude backend endpoints from redirect"
```

---

## Task 2: Shared form partial — `_contact-form.php`

**Files:**
- Create: `_contact-form.php`

This partial renders the form fields. It uses a `$formId` PHP variable (default: `'contact-form'`) so both the modal instance and the inline instance can have distinct HTML IDs on the same page.

- [ ] **Step 1: Create `_contact-form.php`**

```php
<?php
// Usage: optionally set $formId before including this file.
// Modal:  $formId = 'contact-form-modal';
// Inline: $formId = 'contact-form-inline';
$formId = $formId ?? 'contact-form';
?>
<form id="<?= htmlspecialchars($formId) ?>" class="contact-form" novalidate>

    <div class="contact-form-body space-y-5">

        <!-- Nome -->
        <div>
            <label class="block text-sm text-zinc-400 mb-1.5" for="<?= $formId ?>-name">Nome</label>
            <input type="text" id="<?= $formId ?>-name" name="name"
                   class="contact-field w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-zinc-600 focus:outline-none focus:border-blue-500 transition-colors text-sm"
                   placeholder="Seu nome completo">
        </div>

        <!-- E-mail -->
        <div>
            <label class="block text-sm text-zinc-400 mb-1.5" for="<?= $formId ?>-email">E-mail</label>
            <input type="email" id="<?= $formId ?>-email" name="email"
                   class="contact-field w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-zinc-600 focus:outline-none focus:border-blue-500 transition-colors text-sm"
                   placeholder="seu@email.com">
        </div>

        <!-- Telefone -->
        <div>
            <label class="block text-sm text-zinc-400 mb-1.5" for="<?= $formId ?>-phone">Telefone</label>
            <input type="tel" id="<?= $formId ?>-phone" name="phone"
                   class="contact-field w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-zinc-600 focus:outline-none focus:border-blue-500 transition-colors text-sm"
                   placeholder="+55 11 99999-9999">
        </div>

        <!-- Sites (repeater) -->
        <div>
            <label class="block text-sm text-zinc-400 mb-1.5">Sites</label>
            <div class="contact-sites-list space-y-2">
                <div class="contact-site-row flex items-center gap-2">
                    <input type="url" name="sites[]"
                           class="contact-field contact-site-input flex-1 bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-zinc-600 focus:outline-none focus:border-blue-500 transition-colors text-sm"
                           placeholder="https://meusite.com.br">
                </div>
            </div>
            <button type="button" class="contact-add-site mt-2 text-blue-400 hover:text-blue-300 text-xs flex items-center gap-1.5 transition-colors">
                <i data-lucide="plus-circle" class="w-3.5 h-3.5"></i> Adicionar site
            </button>
        </div>

        <!-- Error message -->
        <p class="contact-error hidden text-red-400 text-sm"></p>

        <!-- Submit -->
        <button type="submit" class="contact-submit w-full bg-blue-500 hover:bg-blue-600 disabled:opacity-50 text-white font-bold rounded-full py-3 px-6 text-sm transition-colors flex items-center justify-center gap-2">
            <i data-lucide="send" class="w-4 h-4"></i>
            <span class="contact-submit-text">Enviar mensagem</span>
        </button>

    </div><!-- /.contact-form-body -->

    <!-- Success state (hidden initially) -->
    <div class="contact-success hidden text-center py-6">
        <div class="w-14 h-14 rounded-full bg-green-500/10 border border-green-500/20 flex items-center justify-center mx-auto mb-4">
            <i data-lucide="check-circle" class="w-7 h-7 text-green-400"></i>
        </div>
        <p class="text-white font-semibold text-lg mb-1">Mensagem enviada!</p>
        <p class="text-zinc-400 text-sm">Em breve entraremos em contato.</p>
    </div>

</form>
```

- [ ] **Step 2: Verify partial is valid PHP (no syntax errors)**

```bash
php -l _contact-form.php
```

Expected: `No syntax errors detected`

- [ ] **Step 3: Commit**

```bash
git add _contact-form.php
git commit -m "feat: add shared contact form partial"
```

---

## Task 3: CSRF token setup in `_header.php`

**Files:**
- Modify: `_header.php` (add PHP block at the very top, before `<!DOCTYPE html>`)

- [ ] **Step 1: Add session start and CSRF token generation at the top of `_header.php`**

Insert as the **first thing** in `_header.php` (before `<!DOCTYPE html>`):

```php
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
```

- [ ] **Step 2: Add CSRF meta tag inside `<head>`, after `<meta charset="UTF-8">`**

```html
<meta name="csrf-token" content="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
```

- [ ] **Step 3: Verify**

Load `https://xclickid.ddev.site` in a browser, view page source, and confirm:
```html
<meta name="csrf-token" content="[64-char hex string]">
```
is present in `<head>`.

- [ ] **Step 4: Commit**

```bash
git add _header.php
git commit -m "feat: add session start and CSRF meta token to header"
```

---

## Task 4: `save-contato.php` — contact save endpoint

**Files:**
- Create: `save-contato.php`

- [ ] **Step 1: Create `save-contato.php`**

```php
<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header('Content-Type: application/json; charset=utf-8');

// Only POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido']);
    exit;
}

// CSRF check
$token = $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
if (empty($token) || empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $token)) {
    http_response_code(403);
    echo json_encode(['error' => 'Token inválido']);
    exit;
}

// Parse JSON body
$body = json_decode(file_get_contents('php://input'), true);
if (!is_array($body)) {
    http_response_code(400);
    echo json_encode(['error' => 'Corpo da requisição inválido']);
    exit;
}

// Validate
$name  = trim((string)($body['name']  ?? ''));
$email = trim((string)($body['email'] ?? ''));
$phone = trim((string)($body['phone'] ?? ''));
$sites = $body['sites'] ?? [];

$errors = [];

if (strlen($name) < 2) {
    $errors[] = 'Nome deve ter ao menos 2 caracteres';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'E-mail inválido';
}
if (empty($phone)) {
    $errors[] = 'Telefone obrigatório';
}
if (!is_array($sites) || count($sites) === 0) {
    $errors[] = 'Informe ao menos um site';
} elseif (count($sites) > 10) {
    $errors[] = 'Máximo de 10 sites permitidos';
} else {
    foreach ($sites as $url) {
        $url = trim((string)$url);
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $errors[] = 'URL inválida: ' . htmlspecialchars($url);
            break;
        }
        $scheme = parse_url($url, PHP_URL_SCHEME);
        if (!in_array($scheme, ['http', 'https'], true)) {
            $errors[] = 'URLs devem usar http ou https';
            break;
        }
    }
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['error' => implode('. ', $errors)]);
    exit;
}

// Sanitize sites
$sites = array_map(fn($u) => trim((string)$u), $sites);

// UUID v4
function generate_uuid_v4(): string {
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

$contact = [
    'id'         => generate_uuid_v4(),
    'created_at' => date('c'),
    'name'       => $name,
    'email'      => $email,
    'phone'      => $phone,
    'sites'      => $sites,
];

// Write to JSON with exclusive lock
$dataDir = __DIR__ . '/data';
$file    = $dataDir . '/contacts.json';

if (!is_dir($dataDir)) {
    mkdir($dataDir, 0755, true);
}

$fp = fopen($file, 'c+');
if (!$fp) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro interno ao salvar']);
    exit;
}

flock($fp, LOCK_EX);
$size     = filesize($file) ?: 0;
$content  = $size > 0 ? fread($fp, $size) : '[]';
$contacts = json_decode($content, true);
if (!is_array($contacts)) {
    $contacts = [];
}
$contacts[] = $contact;
rewind($fp);
ftruncate($fp, 0);
fwrite($fp, json_encode($contacts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
flock($fp, LOCK_UN);
fclose($fp);

http_response_code(201);
echo json_encode(['success' => true]);
```

- [ ] **Step 2: Verify syntax**

```bash
php -l save-contato.php
```

Expected: `No syntax errors detected`

- [ ] **Step 3: Test CSRF rejection (no token)**

```bash
curl -s -X POST https://xclickid.ddev.site/save-contato.php \
  -H "Content-Type: application/json" \
  -d '{"name":"Test","email":"t@t.com","phone":"11999","sites":["https://test.com"]}'
```

Expected: `{"error":"Token inválido"}` with HTTP 403

- [ ] **Step 4: Commit**

```bash
git add save-contato.php
git commit -m "feat: add save-contato.php AJAX endpoint"
```

---

## Task 5: Contact modal markup in `_header.php`

**Files:**
- Modify: `_header.php`

- [ ] **Step 1: Change the nav CTA button (desktop) from a link to a modal trigger**

Current (`_header.php` line ~94):
```html
<a href="contato.php" class="bg-white text-black px-4 md:px-5 py-2 md:py-2.5 rounded-full text-xs md:text-sm font-bold hover:bg-blue-500 hover:text-white transition-all duration-300 flex items-center gap-2 group whitespace-nowrap">
    <span class="hidden xs:inline">Falar com especialistas</span>
    <span class="xs:hidden">Contato</span>
    <i data-lucide="arrow-up-right" class="w-3.5 h-3.5 md:w-4 md:h-4 group-hover:rotate-45 transition-transform"></i>
</a>
```

Replace with:
```html
<button type="button" data-open-modal="contact" class="bg-white text-black px-4 md:px-5 py-2 md:py-2.5 rounded-full text-xs md:text-sm font-bold hover:bg-blue-500 hover:text-white transition-all duration-300 flex items-center gap-2 group whitespace-nowrap">
    <span class="hidden xs:inline">Falar com especialistas</span>
    <span class="xs:hidden">Contato</span>
    <i data-lucide="arrow-up-right" class="w-3.5 h-3.5 md:w-4 md:h-4 group-hover:rotate-45 transition-transform"></i>
</button>
```

- [ ] **Step 2: Change the mobile menu "Falar com Especialistas" link to a modal trigger**

Current (`_header.php` line ~149):
```html
<a href="contato.php" class="bg-white text-black w-full py-4 rounded-full font-bold text-center block hover:bg-blue-500 hover:text-white transition-all">
    Falar com Especialistas
</a>
```

Replace with:
```html
<button type="button" data-open-modal="contact" class="bg-white text-black w-full py-4 rounded-full font-bold text-center block hover:bg-blue-500 hover:text-white transition-all">
    Falar com Especialistas
</button>
```

- [ ] **Step 3: Add modal HTML at the very end of `_header.php`, after the mobile menu `</div>` and before the closing of the file**

Append this to the end of `_header.php` (it becomes part of the `<body>` that all pages share):

```html

    <!-- ===================== CONTACT MODAL ===================== -->
    <div id="contact-modal" class="fixed inset-0 z-[200] flex items-center justify-center p-4 hidden" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="contact-modal-title">
        <!-- Overlay -->
        <div id="contact-modal-overlay" class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>
        <!-- Card -->
        <div class="relative w-full max-w-md bg-[#0a0a0a] border border-white/5 rounded-2xl p-8 shadow-2xl max-h-[90vh] overflow-y-auto">
            <!-- Close -->
            <button id="contact-modal-close" type="button" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white/5 flex items-center justify-center text-zinc-400 hover:text-white hover:bg-white/10 transition-colors" aria-label="Fechar modal">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
            <h2 id="contact-modal-title" class="text-xl font-bold text-white mb-1">Fale com um especialista</h2>
            <p class="text-zinc-400 text-sm mb-6">Preencha seus dados e entraremos em contato.</p>
            <?php $formId = 'contact-form-modal'; include __DIR__ . '/_contact-form.php'; ?>
        </div>
    </div>
    <!-- ==================== /CONTACT MODAL ==================== -->
```

- [ ] **Step 4: Verify**

Load `https://xclickid.ddev.site` in browser. In DevTools console:
```js
document.getElementById('contact-modal')
```
Expected: returns the modal div element (not null).

Check that the nav "Falar com especialistas" button no longer navigates to `contato.php`.

- [ ] **Step 5: Commit**

```bash
git add _header.php
git commit -m "feat: add contact modal to header and update nav triggers"
```

---

## Task 6: Footer triggers — `_footer.php`

**Files:**
- Modify: `_footer.php`

- [ ] **Step 1: Change "Entre em contato" footer link to modal trigger**

Current (`_footer.php` line ~33):
```html
<li><a href="contato.php" class="hover:text-blue-500 transition-colors">Entre em contato</a></li>
```

Replace with:
```html
<li><button type="button" data-open-modal="contact" class="hover:text-blue-500 transition-colors text-left">Entre em contato</button></li>
```

- [ ] **Step 2: Change "Falar com nossos especialistas" to modal trigger**

Current (`_footer.php` line ~40):
```html
<li><a href="https://wa.me/5511999999999" class="hover:text-blue-500 transition-colors">Falar com nossos especialistas</a></li>
```

Replace with:
```html
<li><button type="button" data-open-modal="contact" class="hover:text-blue-500 transition-colors text-left">Falar com nossos especialistas</button></li>
```

- [ ] **Step 3: Verify**

Load any page with the footer. Click both footer links — both should open the contact modal.

- [ ] **Step 4: Commit**

```bash
git add _footer.php
git commit -m "feat: update footer links to open contact modal"
```

---

## Task 7: `contato.php` — inline form

**Files:**
- Modify: `contato.php`

- [ ] **Step 1: Remove the "Localização" row (lines 30–38 in the original file)**

Remove this block from the glass-panel card:
```html
<div class="flex items-start gap-4">
    <div class="w-9 h-9 rounded-full bg-blue-500/10 text-blue-400 flex items-center justify-center flex-shrink-0 border border-blue-500/20">
        <i data-lucide="map-pin" class="w-4 h-4"></i>
    </div>
    <div>
        <p class="text-sm text-zinc-500 mb-1">Localização</p>
        <p class="text-white">São Paulo, SP — Brasil</p>
    </div>
</div>
```

- [ ] **Step 2: Remove the "Horário de Atendimento" row (lines 40–48)**

Remove this block:
```html
<div class="flex items-start gap-4">
    <div class="w-9 h-9 rounded-full bg-blue-500/10 text-blue-400 flex items-center justify-center flex-shrink-0 border border-blue-500/20">
        <i data-lucide="clock" class="w-4 h-4"></i>
    </div>
    <div>
        <p class="text-sm text-zinc-500 mb-1">Horário de Atendimento</p>
        <p class="text-white">Segunda a Sexta, 9h às 18h</p>
    </div>
</div>
```

- [ ] **Step 3: Remove the "Estou interessado" button block (lines 50–59)**

Remove:
```html
<div class="pt-2">
    <a
        href="mailto:contato@xclickid.com?subject=..."
        class="bg-blue-500 text-white px-6 py-3 rounded-full font-bold text-sm inline-flex items-center justify-center gap-2 hover:bg-blue-600 transition-colors w-full"
    >
        <i data-lucide="sparkles" class="w-4 h-4"></i>
        Estou interessado
    </a>
</div>
```

- [ ] **Step 4: Add inline form as a second card below the info card**

After the closing `</div>` of the glass-panel info card and before the closing `</div>` of the grid, add:

```html
<!-- Inline Contact Form -->
<div class="glass-panel p-8 rounded-xl">
    <h2 class="text-xl font-bold text-white mb-1">Envie uma mensagem</h2>
    <p class="text-zinc-400 text-sm mb-6">Preencha seus dados e entraremos em contato.</p>
    <?php $formId = 'contact-form-inline'; include __DIR__ . '/_contact-form.php'; ?>
</div>
```

- [ ] **Step 5: Verify**

Load `https://xclickid.ddev.site/contato` in browser:
- Verify only the email row is shown in the info card (no location, no hours, no button)
- Verify the form appears below it

- [ ] **Step 6: Commit**

```bash
git add contato.php
git commit -m "feat: update contato.php — remove location/hours, add inline contact form"
```

---

## Task 8: JS — modal, repeater, form submit in `main.js`

**Files:**
- Modify: `assets/js/main.js` (add contact form section at the end of the IIFE, before the closing `})();`)

- [ ] **Step 1: Add the contact form JS block at the end of the IIFE in `main.js`**

Inside the `(function () { ... })();` block, add this section just before the final `})();`:

```js
    // ===================== CONTACT MODAL =====================

    const contactModal        = document.getElementById('contact-modal');
    const contactModalClose   = document.getElementById('contact-modal-close');
    const contactModalOverlay = document.getElementById('contact-modal-overlay');

    const openContactModal = () => {
        if (!contactModal) return;
        contactModal.classList.remove('hidden');
        contactModal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    };

    const closeContactModal = () => {
        if (!contactModal) return;
        contactModal.classList.add('hidden');
        contactModal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    };

    document.querySelectorAll('[data-open-modal="contact"]').forEach(el => {
        el.addEventListener('click', e => { e.preventDefault(); openContactModal(); });
    });

    if (contactModalClose)   contactModalClose.addEventListener('click', closeContactModal);
    if (contactModalOverlay) contactModalOverlay.addEventListener('click', closeContactModal);

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeContactModal();
    });

    // ===================== CONTACT FORMS (modal + inline) =====================

    const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const MAX_SITES  = 10;

    document.querySelectorAll('.contact-form').forEach(form => {
        const isModal     = form.id === 'contact-form-modal';
        const sitesList   = form.querySelector('.contact-sites-list');
        const addSiteBtn  = form.querySelector('.contact-add-site');
        const formBody    = form.querySelector('.contact-form-body');
        const successEl   = form.querySelector('.contact-success');
        const errorEl     = form.querySelector('.contact-error');
        const submitBtn   = form.querySelector('.contact-submit');
        const submitText  = form.querySelector('.contact-submit-text');

        // Repeater: add site row
        if (addSiteBtn && sitesList) {
            addSiteBtn.addEventListener('click', () => {
                const rows = sitesList.querySelectorAll('.contact-site-row');
                if (rows.length >= MAX_SITES) return;

                const newRow = rows[0].cloneNode(true);
                const input  = newRow.querySelector('input');
                input.value  = '';
                input.classList.remove('border-red-500');

                const removeBtn = document.createElement('button');
                removeBtn.type      = 'button';
                removeBtn.className = 'flex-shrink-0 w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-zinc-500 hover:text-red-400 hover:bg-red-400/10 transition-colors';
                removeBtn.setAttribute('aria-label', 'Remover site');
                removeBtn.innerHTML = '<i data-lucide="x" class="w-4 h-4"></i>';
                removeBtn.addEventListener('click', () => {
                    newRow.remove();
                    if (typeof lucide !== 'undefined') lucide.createIcons();
                });
                newRow.appendChild(removeBtn);

                sitesList.appendChild(newRow);
                if (typeof lucide !== 'undefined') lucide.createIcons();
            });
        }

        // Form submission
        form.addEventListener('submit', async e => {
            e.preventDefault();

            const nameEl    = form.querySelector('[name="name"]');
            const emailEl   = form.querySelector('[name="email"]');
            const phoneEl   = form.querySelector('[name="phone"]');
            const siteInputs = form.querySelectorAll('[name="sites[]"]');

            // Reset validation state
            form.querySelectorAll('.contact-field').forEach(f => f.classList.remove('border-red-500'));
            if (errorEl) { errorEl.classList.add('hidden'); errorEl.textContent = ''; }

            let valid = true;

            if (!nameEl.value.trim() || nameEl.value.trim().length < 2) {
                nameEl.classList.add('border-red-500'); valid = false;
            }
            if (!emailEl.value.trim() || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailEl.value.trim())) {
                emailEl.classList.add('border-red-500'); valid = false;
            }
            if (!phoneEl.value.trim()) {
                phoneEl.classList.add('border-red-500'); valid = false;
            }
            siteInputs.forEach(input => {
                if (!input.value.trim() || !/^https?:\/\/.+/.test(input.value.trim())) {
                    input.classList.add('border-red-500'); valid = false;
                }
            });

            if (!valid) {
                if (errorEl) {
                    errorEl.classList.remove('hidden');
                    errorEl.textContent = 'Por favor, corrija os campos destacados.';
                }
                return;
            }

            // Disable submit
            if (submitBtn)  submitBtn.disabled = true;
            if (submitText) submitText.textContent = 'Enviando...';

            try {
                const res = await fetch('/save-contato.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': CSRF_TOKEN
                    },
                    body: JSON.stringify({
                        name:  nameEl.value.trim(),
                        email: emailEl.value.trim(),
                        phone: phoneEl.value.trim(),
                        sites: Array.from(siteInputs).map(i => i.value.trim())
                    })
                });

                const data = await res.json();

                if (res.ok) {
                    // Show success state
                    if (formBody)  formBody.classList.add('hidden');
                    if (successEl) {
                        successEl.classList.remove('hidden');
                        if (typeof lucide !== 'undefined') lucide.createIcons();
                    }
                    // Auto-close modal after 3s; inline form stays open showing success
                    if (isModal) setTimeout(closeContactModal, 3000);
                } else {
                    if (errorEl) {
                        errorEl.classList.remove('hidden');
                        errorEl.textContent = data.error || 'Erro ao enviar. Tente novamente.';
                    }
                    if (submitBtn)  submitBtn.disabled = false;
                    if (submitText) submitText.textContent = 'Enviar mensagem';
                }
            } catch {
                if (errorEl) {
                    errorEl.classList.remove('hidden');
                    errorEl.textContent = 'Erro de conexão. Tente novamente.';
                }
                if (submitBtn)  submitBtn.disabled = false;
                if (submitText) submitText.textContent = 'Enviar mensagem';
            }
        });
    });

    // ==================== /CONTACT FORMS ====================
```

- [ ] **Step 2: Verify JS syntax (no errors in browser console)**

Open `https://xclickid.ddev.site` in browser. Open DevTools → Console. Confirm zero errors.

- [ ] **Step 3: Manual test — modal open/close**

1. Click "Falar com especialistas" in nav → modal opens
2. Click overlay → modal closes
3. Reopen modal → press ESC → modal closes
4. Reopen modal → click × button → modal closes

- [ ] **Step 4: Manual test — repeater**

1. Open modal
2. Click "Adicionar site" 9 times → 10 URL inputs visible
3. Click "Adicionar site" again → nothing happens (max reached)
4. Click × on a row → row removed

- [ ] **Step 5: Manual test — form submit**

1. Submit empty form → all fields turn red, error message appears
2. Fill only name → submit → email/phone/site highlighted
3. Enter `not-a-url` in site field → site field highlighted
4. Fill all valid → submit → spinner appears → success state shows → modal closes in 3s
5. Check `data/contacts.json` — verify new entry saved correctly

- [ ] **Step 6: Commit**

```bash
git add assets/js/main.js
git commit -m "feat: add contact modal JS — open/close, repeater, AJAX form submit"
```

---

## Task 9: Admin panel — `painel-contatos.php` + `admin-action.php`

**Files:**
- Create: `painel-contatos.php`
- Create: `admin-action.php`

### Step 9a: Generate the bcrypt hash

- [ ] **Step 1: Generate the admin password hash (run once, do NOT commit the plaintext password)**

```bash
php -r "echo password_hash(getenv('ADMIN_PASS'), PASSWORD_BCRYPT, ['cost' => 12]) . PHP_EOL;"
```

Run it like this (password never touches the shell history as a literal argument):

```bash
ADMIN_PASS='R98oU1N(L2}Z' php -r "echo password_hash(getenv('ADMIN_PASS'), PASSWORD_BCRYPT, ['cost' => 12]) . PHP_EOL;"
```

Copy the output (starts with `$2y$12$...`). You will embed **only the hash** in `painel-contatos.php` as `ADMIN_HASH`. The plaintext password must never appear in any committed PHP source file.

### Step 9b: Create `painel-contatos.php`

- [ ] **Step 2: Create `painel-contatos.php`**

Replace `PASTE_HASH_HERE` with the hash from Step 1.

```php
<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ── Credentials ──────────────────────────────────────────────────────────────
define('ADMIN_EMAIL', 'edgar@onlinetizando.com');
define('ADMIN_HASH',  'PASTE_HASH_HERE'); // generated with password_hash()

// ── Config ────────────────────────────────────────────────────────────────────
define('DATA_DIR',           __DIR__ . '/data');
define('CONTACTS_FILE',      DATA_DIR . '/contacts.json');
define('ATTEMPTS_FILE',      DATA_DIR . '/login_attempts.json');
define('SESSION_TIMEOUT',    7200);   // 2 hours
define('MAX_ATTEMPTS',       5);
define('LOCKOUT_SECONDS',    900);    // 15 minutes
define('PER_PAGE',           20);

// ── Helpers ───────────────────────────────────────────────────────────────────
function read_json(string $file): array {
    if (!file_exists($file)) return [];
    $content = file_get_contents($file);
    return json_decode($content ?: '[]', true) ?: [];
}

function write_json(string $file, array $data): void {
    if (!is_dir(DATA_DIR)) mkdir(DATA_DIR, 0755, true);
    $fp = fopen($file, 'c+');
    if (!$fp) return;
    flock($fp, LOCK_EX);
    rewind($fp);
    ftruncate($fp, 0);
    fwrite($fp, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    flock($fp, LOCK_UN);
    fclose($fp);
}

function get_client_ip(): string {
    return $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
}

function is_locked_out(): bool {
    $attempts = read_json(ATTEMPTS_FILE);
    $ip       = get_client_ip();
    if (!isset($attempts[$ip])) return false;
    $entry = $attempts[$ip];
    if ($entry['count'] < MAX_ATTEMPTS) return false;
    if (time() - $entry['last'] < LOCKOUT_SECONDS) return true;
    // Lockout expired — reset
    unset($attempts[$ip]);
    write_json(ATTEMPTS_FILE, $attempts);
    return false;
}

function record_failed_attempt(): void {
    $attempts = read_json(ATTEMPTS_FILE);
    $ip       = get_client_ip();
    if (!isset($attempts[$ip])) {
        $attempts[$ip] = ['count' => 0, 'last' => 0];
    }
    $attempts[$ip]['count']++;
    $attempts[$ip]['last'] = time();
    write_json(ATTEMPTS_FILE, $attempts);
}

function clear_attempts(): void {
    $attempts = read_json(ATTEMPTS_FILE);
    $ip       = get_client_ip();
    unset($attempts[$ip]);
    write_json(ATTEMPTS_FILE, $attempts);
}

function check_session_timeout(): void {
    if (isset($_SESSION['admin'])) {
        if (time() - ($_SESSION['last_activity'] ?? 0) > SESSION_TIMEOUT) {
            session_destroy();
            header('Location: painel-contatos.php?timeout=1');
            exit;
        }
        $_SESSION['last_activity'] = time();
    }
}

// ── Init CSRF for this page ───────────────────────────────────────────────────
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// ── Check session timeout ─────────────────────────────────────────────────────
check_session_timeout();

// ── Logout ────────────────────────────────────────────────────────────────────
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: painel-contatos.php');
    exit;
}

// ── Login POST ────────────────────────────────────────────────────────────────
$loginError = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_SESSION['admin'])) {
    if (is_locked_out()) {
        $loginError = 'Muitas tentativas. Aguarde 15 minutos.';
    } else {
        $inputEmail = trim($_POST['email'] ?? '');
        $inputPass  = $_POST['password'] ?? '';
        if ($inputEmail === ADMIN_EMAIL && password_verify($inputPass, ADMIN_HASH)) {
            session_regenerate_id(true);
            $_SESSION['admin']         = true;
            $_SESSION['last_activity'] = time();
            clear_attempts();
            header('Location: painel-contatos.php');
            exit;
        } else {
            record_failed_attempt();
            $loginError = 'Credenciais inválidas.';
        }
    }
}

// ── Pagination ────────────────────────────────────────────────────────────────
$page     = max(1, (int)($_GET['page'] ?? 1));
$allContacts = array_reverse(read_json(CONTACTS_FILE)); // newest first
$total    = count($allContacts);
$pages    = max(1, (int)ceil($total / PER_PAGE));
$page     = min($page, $pages);
$offset   = ($page - 1) * PER_PAGE;
$contacts = array_slice($allContacts, $offset, PER_PAGE);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Contatos — XClickID</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>body { font-family: 'Inter', sans-serif; background: #050505; color: #fff; }</style>
</head>
<body class="min-h-screen">

<?php if (!isset($_SESSION['admin'])): ?>
<!-- ═══════════════════════════ LOGIN FORM ═══════════════════════════ -->
<div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-sm">
        <div class="text-center mb-8">
            <p class="text-zinc-500 text-sm uppercase tracking-widest font-semibold mb-4">Administrador</p>
            <h1 class="text-2xl font-bold text-white">Painel de Contatos</h1>
        </div>
        <?php if ($loginError): ?>
            <div class="bg-red-500/10 border border-red-500/20 text-red-400 text-sm rounded-xl px-4 py-3 mb-4">
                <?= htmlspecialchars($loginError) ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['timeout'])): ?>
            <div class="bg-yellow-500/10 border border-yellow-500/20 text-yellow-400 text-sm rounded-xl px-4 py-3 mb-4">
                Sessão expirada. Faça login novamente.
            </div>
        <?php endif; ?>
        <form method="POST" class="bg-white/[0.03] border border-white/5 rounded-2xl p-6 space-y-4">
            <div>
                <label class="block text-sm text-zinc-400 mb-1.5">E-mail</label>
                <input type="email" name="email" required autocomplete="username"
                       class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-blue-500 transition-colors"
                       placeholder="admin@email.com">
            </div>
            <div>
                <label class="block text-sm text-zinc-400 mb-1.5">Senha</label>
                <input type="password" name="password" required autocomplete="current-password"
                       class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-blue-500 transition-colors"
                       placeholder="••••••••••••">
            </div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-full py-3 text-sm transition-colors">
                Entrar
            </button>
        </form>
    </div>
</div>

<?php else: ?>
<!-- ═══════════════════════════ DASHBOARD ═══════════════════════════ -->

<!-- Header bar -->
<header class="border-b border-white/5 bg-[#0a0a0a] sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <span class="text-white font-bold text-lg">Painel de Contatos</span>
            <span class="bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs font-semibold px-2.5 py-1 rounded-full">
                <?= $total ?> contato<?= $total !== 1 ? 's' : '' ?>
            </span>
        </div>
        <div class="flex items-center gap-3">
            <!-- Export CSV -->
            <form method="POST" action="admin-action.php">
                <input type="hidden" name="action" value="export">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                <button type="submit" class="flex items-center gap-2 bg-white/5 hover:bg-white/10 border border-white/10 text-white text-sm font-medium px-4 py-2 rounded-full transition-colors">
                    <i data-lucide="download" class="w-4 h-4"></i> Exportar CSV
                </button>
            </form>
            <!-- Logout -->
            <a href="painel-contatos.php?logout=1" class="flex items-center gap-2 text-zinc-400 hover:text-white text-sm transition-colors">
                <i data-lucide="log-out" class="w-4 h-4"></i> Sair
            </a>
        </div>
    </div>
</header>

<main class="max-w-7xl mx-auto px-6 py-8">

    <?php if (empty($contacts) && $page === 1): ?>
    <!-- Empty state -->
    <div class="text-center py-24">
        <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center mx-auto mb-4">
            <i data-lucide="inbox" class="w-8 h-8 text-zinc-600"></i>
        </div>
        <p class="text-white font-semibold mb-1">Nenhum contato ainda</p>
        <p class="text-zinc-500 text-sm">Os formulários preenchidos aparecerão aqui.</p>
    </div>

    <?php else: ?>
    <!-- Table -->
    <div class="bg-white/[0.02] border border-white/5 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-white/5 text-zinc-500 text-xs uppercase tracking-wider">
                        <th class="text-left px-6 py-4 font-medium">Data</th>
                        <th class="text-left px-6 py-4 font-medium">Nome</th>
                        <th class="text-left px-6 py-4 font-medium">E-mail</th>
                        <th class="text-left px-6 py-4 font-medium">Telefone</th>
                        <th class="text-left px-6 py-4 font-medium">Sites</th>
                        <th class="text-left px-6 py-4 font-medium">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    <?php foreach ($contacts as $c): ?>
                    <tr class="hover:bg-white/[0.02] transition-colors">
                        <td class="px-6 py-4 text-zinc-400 whitespace-nowrap">
                            <?= htmlspecialchars(date('d/m/Y H:i', strtotime($c['created_at']))) ?>
                        </td>
                        <td class="px-6 py-4 text-white font-medium">
                            <?= htmlspecialchars($c['name']) ?>
                        </td>
                        <td class="px-6 py-4 text-zinc-300">
                            <?= htmlspecialchars($c['email']) ?>
                        </td>
                        <td class="px-6 py-4 text-zinc-300 whitespace-nowrap">
                            <?= htmlspecialchars($c['phone']) ?>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-1">
                                <?php foreach ((array)$c['sites'] as $url): ?>
                                    <a href="<?= htmlspecialchars($url) ?>" target="_blank" rel="noopener noreferrer"
                                       class="text-blue-400 hover:text-blue-300 transition-colors truncate max-w-[200px] block"
                                       title="<?= htmlspecialchars($url) ?>">
                                        <?= htmlspecialchars($url) ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <form method="POST" action="admin-action.php" class="inline delete-form">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($c['id']) ?>">
                                <input type="hidden" name="page" value="<?= $page ?>">
                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                                <button type="submit"
                                        class="text-zinc-500 hover:text-red-400 transition-colors flex items-center gap-1.5 text-xs">
                                    <i data-lucide="trash-2" class="w-3.5 h-3.5"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <?php if ($pages > 1): ?>
    <div class="flex items-center justify-between mt-6">
        <p class="text-zinc-500 text-sm">
            Mostrando <?= $offset + 1 ?>–<?= min($offset + PER_PAGE, $total) ?> de <?= $total ?>
        </p>
        <div class="flex items-center gap-2">
            <?php if ($page > 1): ?>
                <a href="?page=<?= $page - 1 ?>" class="px-4 py-2 rounded-full bg-white/5 hover:bg-white/10 text-white text-sm transition-colors">← Anterior</a>
            <?php endif; ?>
            <?php if ($page < $pages): ?>
                <a href="?page=<?= $page + 1 ?>" class="px-4 py-2 rounded-full bg-white/5 hover:bg-white/10 text-white text-sm transition-colors">Próximo →</a>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php endif; ?>
</main>

<?php endif; ?>

<script>
if (typeof lucide !== 'undefined') lucide.createIcons();

// Confirm before delete
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', e => {
        if (!confirm('Excluir este contato? Esta ação não pode ser desfeita.')) {
            e.preventDefault();
        }
    });
});
</script>

</body>
</html>
```

- [ ] **Step 3: Verify PHP syntax**

```bash
php -l painel-contatos.php
```

Expected: `No syntax errors detected`

### Step 9c: Create `admin-action.php`

- [ ] **Step 4: Create `admin-action.php`**

```php
<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Must be logged in
if (!isset($_SESSION['admin'])) {
    header('Location: painel-contatos.php');
    exit;
}

// Must be POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: painel-contatos.php');
    exit;
}

// CSRF check (from POST body — plain HTML form submissions)
$token = $_POST['csrf_token'] ?? '';
if (empty($token) || empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $token)) {
    http_response_code(403);
    echo 'Token inválido';
    exit;
}

define('DATA_DIR',      __DIR__ . '/data');
define('CONTACTS_FILE', DATA_DIR . '/contacts.json');

function read_contacts(): array {
    if (!file_exists(CONTACTS_FILE)) return [];
    return json_decode(file_get_contents(CONTACTS_FILE) ?: '[]', true) ?: [];
}

function write_contacts(array $contacts): void {
    if (!is_dir(DATA_DIR)) mkdir(DATA_DIR, 0755, true);
    $fp = fopen(CONTACTS_FILE, 'c+');
    if (!$fp) return;
    flock($fp, LOCK_EX);
    rewind($fp);
    ftruncate($fp, 0);
    fwrite($fp, json_encode($contacts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    flock($fp, LOCK_UN);
    fclose($fp);
}

$action = $_POST['action'] ?? '';

// ── DELETE ────────────────────────────────────────────────────────────────────
if ($action === 'delete') {
    $id       = trim($_POST['id'] ?? '');
    $page     = max(1, (int)($_POST['page'] ?? 1));
    $contacts = read_contacts();
    $contacts = array_values(array_filter($contacts, fn($c) => $c['id'] !== $id));
    write_contacts($contacts);
    header('Location: painel-contatos.php?page=' . $page);
    exit;
}

// ── EXPORT CSV ────────────────────────────────────────────────────────────────
if ($action === 'export') {
    $contacts = array_reverse(read_contacts()); // newest first
    $date     = date('Y-m-d');

    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename="contatos-' . $date . '.csv"');
    header('Cache-Control: no-cache, no-store, must-revalidate');

    $out = fopen('php://output', 'w');
    // BOM for Excel UTF-8 compatibility
    fputs($out, "\xEF\xBB\xBF");
    fputcsv($out, ['ID', 'Data', 'Nome', 'E-mail', 'Telefone', 'Sites']);

    foreach ($contacts as $c) {
        fputcsv($out, [
            $c['id'],
            $c['created_at'],
            $c['name'],
            $c['email'],
            $c['phone'],
            implode(' | ', (array)$c['sites'])
        ]);
    }

    fclose($out);
    exit;
}

// Unknown action
header('Location: painel-contatos.php');
exit;
```

- [ ] **Step 5: Verify PHP syntax**

```bash
php -l admin-action.php
```

Expected: `No syntax errors detected`

- [ ] **Step 6: Commit**

```bash
git add painel-contatos.php admin-action.php
git commit -m "feat: add admin panel — login, dashboard, delete, CSV export"
```

---

## Task 10: End-to-end verification

- [ ] **Step 1: Full contact modal flow**

1. Open `https://xclickid.ddev.site` in a browser
2. Click "Falar com especialistas" in nav → modal opens
3. Submit a complete, valid form
4. Verify success message appears → modal auto-closes in 3s
5. Check `data/contacts.json` contains the new entry

- [ ] **Step 2: Inline form on contato.php**

1. Open `https://xclickid.ddev.site/contato`
2. Verify: only e-mail row in the info card (no location, no hours, no button)
3. Verify: form appears below
4. Submit a valid form → success message stays (no auto-close)

- [ ] **Step 3: Admin login and dashboard**

1. Open `https://xclickid.ddev.site/painel-contatos`
2. Login with `edgar@onlinetizando.com` / `R98oU1N(L2}Z`
3. Verify dashboard loads with contacts in the table
4. Test brute-force protection: enter wrong password 5 times → lockout message appears

- [ ] **Step 4: Admin delete**

1. In the dashboard, click "Excluir" on a contact → browser `confirm()` appears
2. Confirm → row disappears, page reloads on same page number

- [ ] **Step 5: Admin export CSV**

1. Click "Exportar CSV"
2. File downloads as `contatos-YYYY-MM-DD.csv`
3. Open in a spreadsheet — verify all columns, UTF-8 encoding, and pipe-separated sites

- [ ] **Step 6: Footer trigger test**

1. Load any page with a footer
2. Click "Entre em contato" → modal opens
3. Click "Falar com nossos especialistas" → modal opens

- [ ] **Step 7: Final commit**

```bash
git add .
git commit -m "feat: contact modal and admin dashboard — complete implementation"
```
