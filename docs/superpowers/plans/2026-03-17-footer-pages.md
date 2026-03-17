# Footer Internal Pages Implementation Plan

> **For agentic workers:** REQUIRED: Use superpowers:subagent-driven-development (if subagents available) or superpowers:executing-plans to implement this plan. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Create 7 internal footer pages and shared PHP includes extracted from `index.php`, keeping the same visual identity.

**Architecture:** Extract navbar and footer from `index.php` into `_header.php` / `_footer.php`. Each new page is a standalone `.php` file. No framework, no router. All JS remains in external files (`assets/js/main.js`, `assets/js/lenis-setup.js`) included via `_footer.php`.

**Tech Stack:** PHP 8.4, HTML5, Tailwind CSS (CDN + tailwind.config inline), Lucide Icons (CDN), Google Fonts Inter, Lenis smooth scroll, Vanilla JS

**Spec:** `docs/superpowers/specs/2026-03-17-footer-pages-design.md`

**Dev URL:** `https://xclickid.ddev.site/` (or run `ddev start` if not running)

---

## File Structure

| File | Action | Responsibility |
|---|---|---|
| `_header.php` | Create | `<!DOCTYPE html>` through `</nav>` — dynamic `$pageTitle`, updated anchor links |
| `_footer.php` | Create | `<footer>` through `</html>` — updated hrefs, WhatsApp link, remove Integração API |
| `index.php` | Modify | Replace extracted nav/footer sections with includes |
| `sobre-nos.php` | Create | Sobre Nós page |
| `confianca-seguranca.php` | Create | Confiança e Segurança page |
| `contato.php` | Create | Entre em Contato page |
| `ajuda-faq.php` | Create | Ajuda / FAQ page with accordion JS |
| `aviso-legal.php` | Create | Aviso Legal page |
| `privacidade.php` | Create | Política de Privacidade page |
| `termos-usuarios.php` | Create | T&C para Usuários page |

---

## Chunk 1: Shared Includes + index.php Refactor

---

### Task 1: Create `_header.php`

**Files:**
- Create: `_header.php`

This file contains everything from `<!DOCTYPE html>` through `</nav>` (lines 1–134 of `index.php`). Three types of changes from the original:

1. Line 6 title becomes dynamic via `$pageTitle`
2. Navbar anchor links get `index.php#` prefix
3. CTA button hrefs updated

- [ ] **Step 1: Create `_header.php`**

Copy lines 1–134 of `index.php` verbatim, then apply these edits:

**Edit 1 — dynamic title (replace line 6):**
```html
    <title><?= htmlspecialchars($pageTitle ?? 'XClickID - Valide seus usuários em segundos!') ?></title>
```

**Edit 2 — desktop nav anchor links (replace lines 79–82, text stays same, only hrefs change):**
```html
                <a href="index.php#overview" class="hover:text-white transition-colors">Visão Geral</a>
                <a href="index.php#methods" class="hover:text-white transition-colors">Métodos</a>
                <a href="index.php#compliance" class="hover:text-white transition-colors">Segurança</a>
                <a href="index.php#business" class="hover:text-white transition-colors">Como Funciona</a>
```

**Edit 3 — navbar CTA button:** On line 86, change only the `href` attribute from `"#"` to `"contato.php"`. All other attributes and inner HTML (the `<span>` elements and `<i>` icon) stay unchanged.

**Edit 4 — mobile menu anchor links:** On lines 111, 114, 117, 120, change only the `href` attributes from anchors to `index.php#anchor`. Text stays as-is ("Visão Geral", "Métodos", "Segurança", "Como Funciona"):
- `href="#overview"` → `href="index.php#overview"`
- `href="#methods"` → `href="index.php#methods"`
- `href="#compliance"` → `href="index.php#compliance"`
- `href="#business"` → `href="index.php#business"`

**Edit 5 — mobile menu CTA:** On line 126, change only the `href` attribute from `"#"` to `"contato.php"`. All inner HTML (`<span>`, `<i>`, shimmer `<div>`) stays unchanged.

- [ ] **Step 2: Lint**

```bash
php -l _header.php
```
Expected: `No syntax errors detected in _header.php`

---

### Task 2: Create `_footer.php`

**Files:**
- Create: `_footer.php`

This file contains lines 587–737 of `index.php` (from `<!-- Footer -->` through `</html>`). Apply these link updates:

- [ ] **Step 1: Create `_footer.php`**

Copy lines 587–737 of `index.php` verbatim, then apply these edits to the footer columns:

**Column "A Empresa" — replace the 3 `<li>` links:**
```html
<li><a href="sobre-nos.php" class="hover:text-blue-500 transition-colors">Sobre Nós</a></li>
<li><a href="confianca-seguranca.php" class="hover:text-blue-500 transition-colors">Confiança e Segurança</a></li>
<li><a href="contato.php" class="hover:text-blue-500 transition-colors">Entre em contato</a></li>
```

**Column "Suporte" — replace the 3 `<li>` links:**
```html
<li><a href="https://wa.me/5511999999999" class="hover:text-blue-500 transition-colors">Falar com nossos especialistas</a></li>
<li><a href="ajuda-faq.php" class="hover:text-blue-500 transition-colors">Ajuda / FAQ</a></li>
<li><a href="index.php#methods" class="hover:text-blue-500 transition-colors">Métodos de Verificação</a></li>
```

**Column "Negócios & Legal" — remove the "Integração API" `<li>` entirely and update the remaining 3:**
```html
<li><a href="aviso-legal.php" class="hover:text-blue-500 transition-colors">Aviso Legal</a></li>
<li><a href="privacidade.php" class="hover:text-blue-500 transition-colors">Política de Privacidade</a></li>
<li><a href="termos-usuarios.php" class="hover:text-blue-500 transition-colors">T&C para Usuários</a></li>
```

After editing, verify the file ends with:
```html
    <script src="assets/js/lenis-setup.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
```

- [ ] **Step 2: Lint**

```bash
php -l _footer.php
```
Expected: `No syntax errors detected in _footer.php`

---

### Task 3: Refactor `index.php`

**Files:**
- Modify: `index.php`

- [ ] **Step 1: Add `$pageTitle` at top and replace extracted sections**

Replace lines 1–134 with:
```php
<?php $pageTitle = 'XClickID - Valide seus usuários em segundos!'; ?>
<?php include '_header.php'; ?>
```

Replace lines 587–737 with:
```php
<?php include '_footer.php'; ?>
```

The middle content sections (Hero, Marquee, Network Concept, For Businesses, Verification Methods, Compliance, CTA) remain in `index.php` untouched.

- [ ] **Step 2: Lint**

```bash
php -l index.php
```
Expected: `No syntax errors detected in index.php`

- [ ] **Step 3: Visual verification**

Open `https://xclickid.ddev.site/` in browser. Check:
- Page renders identically to before
- Navbar links work (Visão Geral, Métodos, Segurança, Para Empresas scroll to sections)
- Footer links for Sobre Nós, Política de Privacidade etc. are no longer `#`
- "Falar com nossos especialistas" in footer links to WhatsApp

- [ ] **Step 4: Commit**

```bash
git add _header.php _footer.php index.php
git commit -m "refactor: extract shared header and footer into PHP includes"
```

---

## Chunk 2: Legal Pages

---

### Task 4: Aviso Legal

**Files:**
- Create: `aviso-legal.php`

- [ ] **Step 1: Create `aviso-legal.php`**

```php
<?php $pageTitle = 'Aviso Legal'; ?>
<?php include '_header.php'; ?>

<main>
    <section class="pt-32 pb-16 relative z-10">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-black tracking-tight text-white mb-4">Aviso Legal</h1>
            <p class="text-xl text-zinc-400">Informações legais sobre o uso deste site.</p>
        </div>
    </section>

    <section class="py-16 relative z-10">
        <div class="max-w-3xl mx-auto px-6">
            <div class="space-y-10 text-zinc-400 leading-relaxed">

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">1. Identificação da Empresa</h2>
                    <p>XClickID, Inc. é uma empresa de tecnologia especializada em infraestrutura de verificação de identidade digital. Operamos sob as leis da República Federativa do Brasil e estamos comprometidos com a conformidade às normas vigentes.</p>
                    <p class="mt-3">Para entrar em contato: <a href="mailto:contato@xclickid.com" class="text-blue-400 hover:text-blue-300 transition-colors">contato@xclickid.com</a></p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">2. Condições de Uso do Site</h2>
                    <p>O acesso e uso deste site estão sujeitos às condições aqui estabelecidas. Ao navegar neste site, você concorda com os presentes termos. Reservamo-nos o direito de modificar estas condições a qualquer momento, sendo as alterações efetivas imediatamente após sua publicação.</p>
                    <p class="mt-3">O uso deste site para fins ilícitos, prejudiciais ou contrários às boas práticas é expressamente proibido. A XClickID não se responsabiliza por danos decorrentes do uso indevido do site.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">3. Propriedade Intelectual</h2>
                    <p>Todos os conteúdos presentes neste site — incluindo textos, imagens, logotipos, ícones, software e demais elementos — são propriedade exclusiva da XClickID ou de seus licenciantes, protegidos pelas leis brasileiras e internacionais de direitos autorais e propriedade intelectual.</p>
                    <p class="mt-3">É vedada a reprodução, distribuição, transmissão ou qualquer forma de utilização desses conteúdos sem autorização prévia e expressa da XClickID.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">4. Isenção de Responsabilidade</h2>
                    <p>As informações contidas neste site são fornecidas "no estado em que se encontram", sem garantias de qualquer natureza, expressas ou implícitas. A XClickID não garante a precisão, integridade ou atualidade das informações e não se responsabiliza por eventuais erros ou omissões.</p>
                    <p class="mt-3">A XClickID não se responsabiliza por danos diretos, indiretos, incidentais ou consequentes decorrentes do uso ou da impossibilidade de uso deste site.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">5. Lei Aplicável e Foro</h2>
                    <p>Este Aviso Legal é regido pelas leis da República Federativa do Brasil. Fica eleito o foro da comarca de São Paulo, Estado de São Paulo, para dirimir quaisquer controvérsias decorrentes deste instrumento, com renúncia expressa a qualquer outro foro.</p>
                    <p class="mt-3 text-zinc-500 text-sm">Última atualização: março de 2026.</p>
                </div>

            </div>
        </div>
    </section>
</main>

<?php include '_footer.php'; ?>
```

- [ ] **Step 2: Lint**

```bash
php -l aviso-legal.php
```

- [ ] **Step 3: Visual check**

Open `https://xclickid.ddev.site/aviso-legal.php`. Verify: hero renders, text is readable, navbar and footer are present and identical to index.php.

---

### Task 5: Política de Privacidade

**Files:**
- Create: `privacidade.php`

- [ ] **Step 1: Create `privacidade.php`**

```php
<?php $pageTitle = 'Política de Privacidade'; ?>
<?php include '_header.php'; ?>

<main>
    <section class="pt-32 pb-16 relative z-10">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-black tracking-tight text-white mb-4">Política de Privacidade</h1>
            <p class="text-xl text-zinc-400">Como coletamos, usamos e protegemos seus dados.</p>
        </div>
    </section>

    <section class="py-16 relative z-10">
        <div class="max-w-3xl mx-auto px-6">
            <div class="space-y-10 text-zinc-400 leading-relaxed">

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">1. Dados que Coletamos</h2>
                    <p>A XClickID coleta dados necessários para a prestação dos serviços de verificação de identidade digital. Os dados coletados podem incluir: dados de identificação (nome, CPF, data de nascimento), dados biométricos (imagem facial para verificação), dados de acesso (endereço IP, dispositivo, navegador), e dados de uso da plataforma.</p>
                    <p class="mt-3">A coleta ocorre com o consentimento expresso do titular, conforme previsto na Lei Geral de Proteção de Dados (LGPD — Lei 13.709/2018).</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">2. Como Usamos os Dados</h2>
                    <p>Os dados coletados são utilizados exclusivamente para:</p>
                    <ul class="list-disc list-inside mt-3 space-y-2 text-zinc-400">
                        <li>Verificar a identidade e a maioridade do usuário;</li>
                        <li>Prevenir fraudes e atividades ilícitas;</li>
                        <li>Cumprir obrigações legais e regulatórias;</li>
                        <li>Melhorar a precisão e a experiência dos nossos serviços.</li>
                    </ul>
                    <p class="mt-3">Não utilizamos os dados para fins de marketing sem consentimento explícito.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">3. Retenção de Dados</h2>
                    <p>Os dados são retidos pelo tempo necessário para a finalidade para a qual foram coletados, observados os prazos mínimos legais. Dados biométricos são tratados de forma anonimizada após a conclusão do processo de verificação, conforme as diretrizes da LGPD.</p>
                    <p class="mt-3">O titular pode solicitar a exclusão de seus dados a qualquer momento, respeitadas as obrigações legais de retenção.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">4. Compartilhamento com Terceiros</h2>
                    <p>A XClickID não vende, aluga nem compartilha dados pessoais com terceiros para fins comerciais. O compartilhamento ocorre somente:</p>
                    <ul class="list-disc list-inside mt-3 space-y-2 text-zinc-400">
                        <li>Com empresas parceiras que integram a nossa rede de verificação, sob acordos de confidencialidade;</li>
                        <li>Com autoridades públicas, quando exigido por lei ou ordem judicial;</li>
                        <li>Com prestadores de serviços tecnológicos que atuam em nosso nome, sob contrato.</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">5. Direitos do Titular (LGPD)</h2>
                    <p>Conforme a LGPD, você tem direito a:</p>
                    <ul class="list-disc list-inside mt-3 space-y-2 text-zinc-400">
                        <li>Confirmar a existência de tratamento dos seus dados;</li>
                        <li>Acessar seus dados;</li>
                        <li>Corrigir dados incompletos, inexatos ou desatualizados;</li>
                        <li>Solicitar a anonimização, bloqueio ou eliminação de dados desnecessários;</li>
                        <li>Revogar o consentimento a qualquer momento;</li>
                        <li>Ser informado sobre com quem seus dados foram compartilhados.</li>
                    </ul>
                    <p class="mt-3">Para exercer esses direitos, entre em contato: <a href="mailto:contato@xclickid.com" class="text-blue-400 hover:text-blue-300 transition-colors">contato@xclickid.com</a></p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">6. Cookies e Rastreamento</h2>
                    <p>Utilizamos cookies essenciais para o funcionamento da plataforma e cookies analíticos para entender o uso do site. Você pode gerenciar as preferências de cookies nas configurações do seu navegador. A recusa de cookies essenciais pode impactar o funcionamento de algumas funcionalidades.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">7. Segurança dos Dados</h2>
                    <p>Adotamos medidas técnicas e organizacionais rigorosas para proteger seus dados contra acesso não autorizado, perda, alteração ou divulgação indevida. Isso inclui criptografia em trânsito e em repouso, controles de acesso baseados em função, e monitoramento contínuo de segurança.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">8. Contato com o Encarregado (DPO)</h2>
                    <p>O Encarregado de Proteção de Dados da XClickID pode ser contactado pelo e-mail: <a href="mailto:contato@xclickid.com" class="text-blue-400 hover:text-blue-300 transition-colors">contato@xclickid.com</a></p>
                    <p class="mt-3 text-zinc-500 text-sm">Última atualização: março de 2026.</p>
                </div>

            </div>
        </div>
    </section>
</main>

<?php include '_footer.php'; ?>
```

- [ ] **Step 2: Lint and visual check**

```bash
php -l privacidade.php
```
Open `https://xclickid.ddev.site/privacidade.php`.

---

### Task 6: T&C para Usuários

**Files:**
- Create: `termos-usuarios.php`

- [ ] **Step 1: Create `termos-usuarios.php`**

```php
<?php $pageTitle = 'Termos e Condições'; ?>
<?php include '_header.php'; ?>

<main>
    <section class="pt-32 pb-16 relative z-10">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-black tracking-tight text-white mb-4">Termos e Condições</h1>
            <p class="text-xl text-zinc-400">Condições de uso da plataforma XClickID.</p>
        </div>
    </section>

    <section class="py-16 relative z-10">
        <div class="max-w-3xl mx-auto px-6">
            <div class="space-y-10 text-zinc-400 leading-relaxed">

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">1. Aceitação dos Termos</h2>
                    <p>Ao acessar ou utilizar a plataforma XClickID, você declara ter lido, compreendido e concordado com estes Termos e Condições de Uso. Caso não concorde com qualquer disposição, não utilize a plataforma.</p>
                    <p class="mt-3">A XClickID reserva-se o direito de alterar estes Termos a qualquer momento. As alterações entram em vigor na data de publicação e o uso continuado da plataforma implica na aceitação das novas condições.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">2. Uso da Plataforma</h2>
                    <p>A plataforma XClickID oferece serviços de verificação de identidade digital, incluindo verificação de maioridade, validação biométrica e consulta à rede de identidades verificadas. O acesso é concedido exclusivamente para os fins expressamente previstos nestes Termos.</p>
                    <p class="mt-3">É vedado utilizar a plataforma para:</p>
                    <ul class="list-disc list-inside mt-3 space-y-2">
                        <li>Atividades ilegais ou que violem direitos de terceiros;</li>
                        <li>Tentativas de burlar os mecanismos de verificação;</li>
                        <li>Coleta não autorizada de dados de terceiros;</li>
                        <li>Qualquer forma de engenharia reversa do sistema.</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">3. Obrigações do Usuário</h2>
                    <p>O usuário compromete-se a:</p>
                    <ul class="list-disc list-inside mt-3 space-y-2">
                        <li>Fornecer informações verdadeiras, precisas e atualizadas;</li>
                        <li>Manter a confidencialidade de suas credenciais de acesso;</li>
                        <li>Notificar imediatamente a XClickID em caso de uso não autorizado de sua conta;</li>
                        <li>Utilizar a plataforma em conformidade com a legislação aplicável.</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">4. Propriedade Intelectual</h2>
                    <p>Todo o conteúdo da plataforma XClickID — incluindo software, algoritmos, interfaces, marcas, logotipos e documentação — é propriedade exclusiva da XClickID ou de seus licenciantes, protegido pelas leis de propriedade intelectual vigentes no Brasil.</p>
                    <p class="mt-3">O uso da plataforma não confere ao usuário qualquer direito de propriedade sobre esses elementos.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">5. Limitações de Responsabilidade</h2>
                    <p>A XClickID não se responsabiliza por:</p>
                    <ul class="list-disc list-inside mt-3 space-y-2">
                        <li>Danos decorrentes do uso indevido da plataforma pelo usuário;</li>
                        <li>Falhas de conectividade ou indisponibilidade temporária do serviço;</li>
                        <li>Decisões tomadas por terceiros com base nos resultados de verificação;</li>
                        <li>Danos indiretos, incidentais ou consequentes de qualquer natureza.</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">6. Rescisão</h2>
                    <p>A XClickID pode suspender ou encerrar o acesso do usuário à plataforma a qualquer momento, sem aviso prévio, em caso de violação destes Termos ou por determinação legal. O usuário pode encerrar sua conta a qualquer momento mediante solicitação formal ao suporte.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white mb-4">7. Lei Aplicável e Foro</h2>
                    <p>Estes Termos são regidos pelas leis da República Federativa do Brasil. Fica eleito o foro da comarca de São Paulo, Estado de São Paulo, para dirimir quaisquer controvérsias, com renúncia a qualquer outro foro, por mais privilegiado que seja.</p>
                    <p class="mt-3 text-zinc-500 text-sm">Última atualização: março de 2026.</p>
                </div>

            </div>
        </div>
    </section>
</main>

<?php include '_footer.php'; ?>
```

- [ ] **Step 2: Lint and visual check**

```bash
php -l termos-usuarios.php
```
Open `https://xclickid.ddev.site/termos-usuarios.php`.

- [ ] **Step 3: Commit legal pages**

```bash
git add aviso-legal.php privacidade.php termos-usuarios.php
git commit -m "feat: add legal pages (aviso legal, privacidade, termos)"
```

---

## Chunk 3: Content Pages

---

### Task 7: Sobre Nós

**Files:**
- Create: `sobre-nos.php`

- [ ] **Step 1: Create `sobre-nos.php`**

```php
<?php $pageTitle = 'Sobre Nós'; ?>
<?php include '_header.php'; ?>

<main>
    <section class="pt-32 pb-16 relative z-10">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-black tracking-tight text-white mb-4">Sobre a XClickID</h1>
            <p class="text-xl text-zinc-400">Conheça a empresa por trás da verificação de identidade digital mais eficiente do Brasil.</p>
        </div>
    </section>

    <section class="py-16 relative z-10">
        <div class="max-w-3xl mx-auto px-6 space-y-16">

            <!-- Nossa Missão -->
            <div>
                <h2 class="text-2xl font-bold text-white mb-4">Nossa Missão</h2>
                <p class="text-zinc-400 leading-relaxed text-lg">Existimos para tornar a verificação de identidade digital simples, precisa e respeitosa com a privacidade do usuário. Acreditamos que conformidade legal e experiência do usuário não são opostos — e provamos isso todos os dias, com tecnologia 100% proprietária e uma rede que cresce a cada verificação realizada.</p>
            </div>

            <!-- Nossa História -->
            <div>
                <h2 class="text-2xl font-bold text-white mb-4">Nossa História</h2>
                <p class="text-zinc-400 leading-relaxed text-lg">A XClickID nasceu da necessidade real do mercado digital: como verificar a identidade de usuários em plataformas de alto tráfego sem criar barreiras que custam conversão? Nossa equipe de engenharia e segurança construiu do zero uma infraestrutura de verificação que combina biometria facial, CPF e análise comportamental em um processo que dura segundos — não minutos. Hoje, integramos dezenas de operações digitais e nossa rede de identidades verificadas cresce exponencialmente.</p>
            </div>

            <!-- Valores -->
            <div>
                <h2 class="text-2xl font-bold text-white mb-8">Nossos Valores</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <div class="glass-panel p-6 rounded-xl text-center">
                        <div class="w-12 h-12 mx-auto rounded-full bg-blue-500/10 text-blue-400 flex items-center justify-center mb-4 border border-blue-500/20">
                            <i data-lucide="shield-check" class="w-6 h-6"></i>
                        </div>
                        <h3 class="font-bold text-white mb-2">Confiança</h3>
                        <p class="text-sm text-zinc-400">Segurança real, não teatro de segurança. Cada verificação é uma promessa cumprida.</p>
                    </div>

                    <div class="glass-panel p-6 rounded-xl text-center">
                        <div class="w-12 h-12 mx-auto rounded-full bg-blue-500/10 text-blue-400 flex items-center justify-center mb-4 border border-blue-500/20">
                            <i data-lucide="lock" class="w-6 h-6"></i>
                        </div>
                        <h3 class="font-bold text-white mb-2">Privacidade</h3>
                        <p class="text-sm text-zinc-400">Dados protegidos por padrão. Conformidade com LGPD como princípio, não como obrigação.</p>
                    </div>

                    <div class="glass-panel p-6 rounded-xl text-center">
                        <div class="w-12 h-12 mx-auto rounded-full bg-blue-500/10 text-blue-400 flex items-center justify-center mb-4 border border-blue-500/20">
                            <i data-lucide="zap" class="w-6 h-6"></i>
                        </div>
                        <h3 class="font-bold text-white mb-2">Inovação</h3>
                        <p class="text-sm text-zinc-400">Tecnologia proprietária em constante evolução. Resolvemos problemas que outros ainda não viram.</p>
                    </div>

                </div>
            </div>

        </div>
    </section>
</main>

<?php include '_footer.php'; ?>
```

- [ ] **Step 2: Lint**

```bash
php -l sobre-nos.php
```

---

### Task 8: Confiança e Segurança

**Files:**
- Create: `confianca-seguranca.php`

- [ ] **Step 1: Create `confianca-seguranca.php`**

```php
<?php $pageTitle = 'Confiança e Segurança'; ?>
<?php include '_header.php'; ?>

<main>
    <section class="pt-32 pb-16 relative z-10">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-black tracking-tight text-white mb-4">Confiança e Segurança</h1>
            <p class="text-xl text-zinc-400">Sua operação protegida com tecnologia proprietária e conformidade total.</p>
        </div>
    </section>

    <section class="py-16 relative z-10">
        <div class="max-w-4xl mx-auto px-6">

            <p class="text-zinc-400 text-lg leading-relaxed mb-12 text-center max-w-2xl mx-auto">
                Segurança não é um diferencial para a XClickID — é a fundação de tudo que construímos. Cada camada da nossa infraestrutura foi projetada para proteger dados, prevenir fraudes e garantir conformidade com as regulações mais rigorosas.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="glass-panel p-6 rounded-xl">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-blue-500/10 text-blue-400 flex items-center justify-center flex-shrink-0 border border-blue-500/20">
                            <i data-lucide="shield" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-white mb-2">Criptografia End-to-End</h3>
                            <p class="text-sm text-zinc-400">Todos os dados em trânsito e em repouso são protegidos com criptografia de nível militar. Nenhuma informação sensível trafega sem proteção.</p>
                        </div>
                    </div>
                </div>

                <div class="glass-panel p-6 rounded-xl">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-blue-500/10 text-blue-400 flex items-center justify-center flex-shrink-0 border border-blue-500/20">
                            <i data-lucide="file-check" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-white mb-2">Conformidade LGPD</h3>
                            <p class="text-sm text-zinc-400">Adequação completa à Lei 13.709/2018. Nossos processos foram desenvolvidos com privacidade por design, garantindo que cada tratamento de dado tem base legal.</p>
                        </div>
                    </div>
                </div>

                <div class="glass-panel p-6 rounded-xl">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-blue-500/10 text-blue-400 flex items-center justify-center flex-shrink-0 border border-blue-500/20">
                            <i data-lucide="server" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-white mb-2">Infraestrutura Resiliente</h3>
                            <p class="text-sm text-zinc-400">Alta disponibilidade com uptime de 99.9%. Arquitetura redundante que garante continuidade operacional mesmo em cenários de falha parcial.</p>
                        </div>
                    </div>
                </div>

                <div class="glass-panel p-6 rounded-xl">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-blue-500/10 text-blue-400 flex items-center justify-center flex-shrink-0 border border-blue-500/20">
                            <i data-lucide="binary" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-white mb-2">Tecnologia 100% Proprietária</h3>
                            <p class="text-sm text-zinc-400">Nenhuma dependência de SDKs de terceiros para as funções críticas. Controlamos toda a cadeia de verificação, do algoritmo ao resultado.</p>
                        </div>
                    </div>
                </div>

                <div class="glass-panel p-6 rounded-xl">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-blue-500/10 text-blue-400 flex items-center justify-center flex-shrink-0 border border-blue-500/20">
                            <i data-lucide="search" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-white mb-2">Auditoria Contínua</h3>
                            <p class="text-sm text-zinc-400">Monitoramento em tempo real e testes de segurança regulares. Identificamos e corrigimos vulnerabilidades antes que se tornem riscos.</p>
                        </div>
                    </div>
                </div>

                <div class="glass-panel p-6 rounded-xl">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-blue-500/10 text-blue-400 flex items-center justify-center flex-shrink-0 border border-blue-500/20">
                            <i data-lucide="user-check" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-white mb-2">Proteção de Dados do Usuário</h3>
                            <p class="text-sm text-zinc-400">Minimização e anonimização de dados após a verificação. O usuário é dono da sua identidade — nós apenas a verificamos.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

<?php include '_footer.php'; ?>
```

- [ ] **Step 2: Lint**

```bash
php -l confianca-seguranca.php
```

---

### Task 9: Entre em Contato

**Files:**
- Create: `contato.php`

- [ ] **Step 1: Create `contato.php`**

```php
<?php $pageTitle = 'Entre em Contato'; ?>
<?php include '_header.php'; ?>

<main>
    <section class="pt-32 pb-16 relative z-10">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-black tracking-tight text-white mb-4">Entre em Contato</h1>
            <p class="text-xl text-zinc-400">Estamos aqui para ajudar você e sua empresa.</p>
        </div>
    </section>

    <section class="py-16 relative z-10">
        <div class="max-w-3xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Informações de Contato -->
                <div class="glass-panel p-8 rounded-xl space-y-6">
                    <h2 class="text-xl font-bold text-white">Informações de Contato</h2>

                    <div class="flex items-start gap-4">
                        <div class="w-9 h-9 rounded-full bg-blue-500/10 text-blue-400 flex items-center justify-center flex-shrink-0 border border-blue-500/20">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <p class="text-sm text-zinc-500 mb-1">E-mail</p>
                            <a href="mailto:contato@xclickid.com" class="text-white hover:text-blue-400 transition-colors">contato@xclickid.com</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-9 h-9 rounded-full bg-blue-500/10 text-blue-400 flex items-center justify-center flex-shrink-0 border border-blue-500/20">
                            <i data-lucide="map-pin" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <p class="text-sm text-zinc-500 mb-1">Localização</p>
                            <p class="text-white">São Paulo, SP — Brasil</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-9 h-9 rounded-full bg-blue-500/10 text-blue-400 flex items-center justify-center flex-shrink-0 border border-blue-500/20">
                            <i data-lucide="clock" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <p class="text-sm text-zinc-500 mb-1">Horário de Atendimento</p>
                            <p class="text-white">Segunda a Sexta, 9h às 18h</p>
                        </div>
                    </div>
                </div>

                <!-- WhatsApp CTA -->
                <div class="glass-panel p-8 rounded-xl border border-blue-500/20 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-full bg-green-500/10 text-green-400 flex items-center justify-center mb-4 border border-green-500/20">
                            <i data-lucide="message-circle" class="w-6 h-6"></i>
                        </div>
                        <h2 class="text-xl font-bold text-white mb-2">Fale pelo WhatsApp</h2>
                        <p class="text-zinc-400 text-sm">Atendimento direto com nossa equipe. Resposta rápida para dúvidas técnicas e comerciais.</p>
                    </div>
                    <a href="https://wa.me/5511999999999" target="_blank" rel="noopener noreferrer"
                       class="mt-6 bg-green-600 hover:bg-green-500 text-white px-6 py-3 rounded-full font-bold text-sm flex items-center justify-center gap-2 transition-colors">
                        <i data-lucide="message-circle" class="w-4 h-4"></i>
                        Iniciar conversa no WhatsApp
                    </a>
                </div>

            </div>
        </div>
    </section>
</main>

<?php include '_footer.php'; ?>
```

- [ ] **Step 2: Lint**

```bash
php -l contato.php
```

- [ ] **Step 3: Commit content pages**

```bash
git add sobre-nos.php confianca-seguranca.php contato.php
git commit -m "feat: add content pages (sobre nos, confianca, contato)"
```

---

## Chunk 4: FAQ Page

---

### Task 10: Ajuda / FAQ

**Files:**
- Create: `ajuda-faq.php`

- [ ] **Step 1: Create `ajuda-faq.php`**

```php
<?php $pageTitle = 'Ajuda & FAQ'; ?>
<?php include '_header.php'; ?>

<main>
    <section class="pt-32 pb-16 relative z-10">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-black tracking-tight text-white mb-4">Ajuda & FAQ</h1>
            <p class="text-xl text-zinc-400">Respostas para as dúvidas mais comuns sobre a plataforma.</p>
        </div>
    </section>

    <section class="py-16 relative z-10">
        <div class="max-w-3xl mx-auto px-6">
            <div class="faq-list space-y-3" id="faq-list">

                <div class="faq-item glass-panel rounded-xl overflow-hidden">
                    <button class="faq-trigger w-full flex justify-between items-center px-6 py-5 text-left gap-4">
                        <span class="font-semibold text-white">O que é a XClickID?</span>
                        <i data-lucide="plus" class="w-5 h-5 text-blue-400 faq-icon flex-shrink-0 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer px-6 overflow-hidden" style="max-height: 0; transition: max-height 0.35s ease;">
                        <p class="text-zinc-400 pb-5">A XClickID é uma plataforma de verificação de identidade digital focada em operações de alto tráfego. Combinamos biometria facial, validação de CPF e análise comportamental em um processo que leva segundos — garantindo conformidade legal sem prejudicar a experiência do usuário.</p>
                    </div>
                </div>

                <div class="faq-item glass-panel rounded-xl overflow-hidden">
                    <button class="faq-trigger w-full flex justify-between items-center px-6 py-5 text-left gap-4">
                        <span class="font-semibold text-white">Como funciona o processo de verificação de identidade?</span>
                        <i data-lucide="plus" class="w-5 h-5 text-blue-400 faq-icon flex-shrink-0 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer px-6 overflow-hidden" style="max-height: 0; transition: max-height 0.35s ease;">
                        <p class="text-zinc-400 pb-5">O processo combina três camadas: validação de CPF em tempo real, verificação biométrica facial via câmera do dispositivo do usuário, e análise comportamental para detecção de fraudes. Tudo isso acontece em segundos, de forma transparente para o usuário final.</p>
                    </div>
                </div>

                <div class="faq-item glass-panel rounded-xl overflow-hidden">
                    <button class="faq-trigger w-full flex justify-between items-center px-6 py-5 text-left gap-4">
                        <span class="font-semibold text-white">Os dados do usuário ficam armazenados após a verificação?</span>
                        <i data-lucide="plus" class="w-5 h-5 text-blue-400 faq-icon flex-shrink-0 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer px-6 overflow-hidden" style="max-height: 0; transition: max-height 0.35s ease;">
                        <p class="text-zinc-400 pb-5">Dados biométricos são processados e anonimizados após a conclusão da verificação, conforme determina a LGPD. O resultado da verificação (aprovado/reprovado) é registrado na nossa rede de identidades, mas os dados sensíveis não são retidos na forma original. Os prazos de retenção seguem as obrigações legais aplicáveis.</p>
                    </div>
                </div>

                <div class="faq-item glass-panel rounded-xl overflow-hidden">
                    <button class="faq-trigger w-full flex justify-between items-center px-6 py-5 text-left gap-4">
                        <span class="font-semibold text-white">A XClickID está em conformidade com a LGPD?</span>
                        <i data-lucide="plus" class="w-5 h-5 text-blue-400 faq-icon flex-shrink-0 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer px-6 overflow-hidden" style="max-height: 0; transition: max-height 0.35s ease;">
                        <p class="text-zinc-400 pb-5">Sim. A XClickID foi desenvolvida com privacidade por design desde o início. Todos os tratamentos de dados possuem base legal definida, os titulares têm seus direitos garantidos (acesso, correção, exclusão), e mantemos um Encarregado de Proteção de Dados (DPO) acessível pelo e-mail contato@xclickid.com.</p>
                    </div>
                </div>

                <div class="faq-item glass-panel rounded-xl overflow-hidden">
                    <button class="faq-trigger w-full flex justify-between items-center px-6 py-5 text-left gap-4">
                        <span class="font-semibold text-white">Quanto tempo leva uma verificação?</span>
                        <i data-lucide="plus" class="w-5 h-5 text-blue-400 faq-icon flex-shrink-0 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer px-6 overflow-hidden" style="max-height: 0; transition: max-height 0.35s ease;">
                        <p class="text-zinc-400 pb-5">Em condições normais de rede, o processo de verificação completo leva entre 3 e 8 segundos. Para usuários que já estão na nossa rede de identidades verificadas, o processo pode ser ainda mais rápido, pois parte das validações já foi realizada anteriormente.</p>
                    </div>
                </div>

                <div class="faq-item glass-panel rounded-xl overflow-hidden">
                    <button class="faq-trigger w-full flex justify-between items-center px-6 py-5 text-left gap-4">
                        <span class="font-semibold text-white">O usuário precisa se verificar em cada site que usa a XClickID?</span>
                        <i data-lucide="plus" class="w-5 h-5 text-blue-400 faq-icon flex-shrink-0 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer px-6 overflow-hidden" style="max-height: 0; transition: max-height 0.35s ease;">
                        <p class="text-zinc-400 pb-5">Não. Essa é uma das principais vantagens da XClickID. Uma vez verificado em qualquer site da nossa rede, o usuário não precisa repetir o processo nas demais plataformas integradas. A identidade verificada é compartilhada de forma segura dentro da rede, eliminando a fricção para o usuário e reduzindo o custo de aquisição para as empresas.</p>
                    </div>
                </div>

                <div class="faq-item glass-panel rounded-xl overflow-hidden">
                    <button class="faq-trigger w-full flex justify-between items-center px-6 py-5 text-left gap-4">
                        <span class="font-semibold text-white">Como integrar a XClickID ao meu site ou aplicativo?</span>
                        <i data-lucide="plus" class="w-5 h-5 text-blue-400 faq-icon flex-shrink-0 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer px-6 overflow-hidden" style="max-height: 0; transition: max-height 0.35s ease;">
                        <p class="text-zinc-400 pb-5">A integração é feita via API REST com documentação completa disponível após contratação. Nossa equipe técnica oferece suporte durante todo o processo de integração. Para começar, entre em contato pelo <a href="https://wa.me/5511999999999" class="text-blue-400 hover:text-blue-300 transition-colors">WhatsApp</a> ou pelo e-mail <a href="mailto:contato@xclickid.com" class="text-blue-400 hover:text-blue-300 transition-colors">contato@xclickid.com</a>.</p>
                    </div>
                </div>

                <div class="faq-item glass-panel rounded-xl overflow-hidden">
                    <button class="faq-trigger w-full flex justify-between items-center px-6 py-5 text-left gap-4">
                        <span class="font-semibold text-white">Como entro em contato com o suporte?</span>
                        <i data-lucide="plus" class="w-5 h-5 text-blue-400 faq-icon flex-shrink-0 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer px-6 overflow-hidden" style="max-height: 0; transition: max-height 0.35s ease;">
                        <p class="text-zinc-400 pb-5">Você pode entrar em contato pelo e-mail <a href="mailto:contato@xclickid.com" class="text-blue-400 hover:text-blue-300 transition-colors">contato@xclickid.com</a> ou diretamente pelo <a href="https://wa.me/5511999999999" class="text-blue-400 hover:text-blue-300 transition-colors">WhatsApp</a>. Nosso horário de atendimento é de segunda a sexta, das 9h às 18h (horário de Brasília).</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

<?php include '_footer.php'; ?>

<script>
(function () {
    // Wait for Lucide to initialize icons first
    lucide.createIcons();

    var items = document.querySelectorAll('.faq-item');
    var openItem = null;

    items.forEach(function (item) {
        var trigger = item.querySelector('.faq-trigger');
        var answer = item.querySelector('.faq-answer');
        var icon = item.querySelector('.faq-icon');

        trigger.addEventListener('click', function () {
            var isOpen = openItem === item;

            // Close previously open item
            if (openItem && openItem !== item) {
                var prevAnswer = openItem.querySelector('.faq-answer');
                var prevIcon = openItem.querySelector('.faq-icon');
                prevAnswer.style.maxHeight = '0';
                prevIcon.classList.remove('rotate-45');
                openItem = null;
            }

            if (isOpen) {
                answer.style.maxHeight = '0';
                icon.classList.remove('rotate-45');
                openItem = null;
            } else {
                answer.style.maxHeight = answer.scrollHeight + 'px';
                icon.classList.add('rotate-45');
                openItem = item;
            }
        });
    });
})();
</script>
```

> **Note:** The `<script>` block is placed AFTER `<?php include '_footer.php'; ?>`. Since `_footer.php` closes `</body></html>`, this script tag will appear after the closing tags. To avoid invalid HTML, move the script BEFORE `<?php include '_footer.php'; ?>` and call `lucide.createIcons()` inside `_footer.php` instead of in page-specific scripts — OR restructure `_footer.php` to leave the `</body></html>` open with a hook.
>
> **Simpler fix:** Place the FAQ `<script>` block BEFORE `<?php include '_footer.php'; ?>`. Remove the `lucide.createIcons()` call from inside this script since `_footer.php`'s `assets/js/main.js` already calls it. Only register the FAQ click handlers here.

Revised final block for `ajuda-faq.php` (before the footer include):

```php
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Initialize icons first so Lucide replaces <i> elements with <svg>
    // before we cache references to .faq-icon elements
    lucide.createIcons();

    var items = document.querySelectorAll('.faq-item');
    var openItem = null;

    items.forEach(function (item) {
        var trigger = item.querySelector('.faq-trigger');
        var answer = item.querySelector('.faq-answer');
        var icon = item.querySelector('.faq-icon');

        trigger.addEventListener('click', function () {
            var isOpen = openItem === item;

            if (openItem && openItem !== item) {
                openItem.querySelector('.faq-answer').style.maxHeight = '0';
                openItem.querySelector('.faq-icon').classList.remove('rotate-45');
                openItem = null;
            }

            if (isOpen) {
                answer.style.maxHeight = '0';
                icon.classList.remove('rotate-45');
                openItem = null;
            } else {
                answer.style.maxHeight = answer.scrollHeight + 'px';
                icon.classList.add('rotate-45');
                openItem = item;
            }
        });
    });
});
</script>

<?php include '_footer.php'; ?>
```

- [ ] **Step 2: Lint**

```bash
php -l ajuda-faq.php
```

- [ ] **Step 3: Visual and functional check**

Open `https://xclickid.ddev.site/ajuda-faq.php`. Verify:
- All 8 questions render
- Clicking a question opens the answer with smooth animation
- Clicking again closes it
- Opening a second question closes the first
- Plus icon rotates 45° when open

- [ ] **Step 4: Commit**

```bash
git add sobre-nos.php confianca-seguranca.php contato.php ajuda-faq.php
git commit -m "feat: add FAQ page with accordion"
```

---

### Task 11: Final verification pass

- [ ] **Step 1: Check all pages load**

```bash
for page in index.php sobre-nos.php confianca-seguranca.php contato.php ajuda-faq.php aviso-legal.php privacidade.php termos-usuarios.php; do
    php -l $page && echo "OK: $page"
done
```
Expected: all `OK`.

- [ ] **Step 2: Verify footer links**

Open `https://xclickid.ddev.site/`. Scroll to footer. Verify each link:
- Sobre Nós → `sobre-nos.php` ✓
- Confiança e Segurança → `confianca-seguranca.php` ✓
- Entre em contato → `contato.php` ✓
- Falar com nossos especialistas → WhatsApp URL ✓
- Ajuda / FAQ → `ajuda-faq.php` ✓
- Métodos de Verificação → `index.php#methods` ✓
- Integração API → **not present** ✓
- Aviso Legal → `aviso-legal.php` ✓
- Política de Privacidade → `privacidade.php` ✓
- T&C para Usuários → `termos-usuarios.php` ✓

- [ ] **Step 3: Final commit**

```bash
git add -A
git commit -m "feat: complete footer internal pages"
```
