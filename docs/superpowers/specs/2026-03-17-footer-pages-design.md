# Design: Páginas Internas do Rodapé — XClickID

**Data:** 2026-03-17
**Estado:** Aprovado

---

## Contexto

O site XClickID (`index.php`) é uma landing page single-file com navbar e footer. O footer lista links para páginas internas que ainda não existem. Este documento define a criação dessas páginas.

O site usa **português do Brasil (PT-BR)** — "usuários", "Entre em contato", "você".

---

## Decisões de Design

### Arquitetura
- **Arquivos separados** — cada página é um arquivo `.php` independente
- **Includes compartilhados** — `_header.php` e `_footer.php` extraídos do `index.php`; todas as páginas os incluem via `<?php include '_header.php'; ?>`
- **Stack:** PHP puro, Tailwind CSS (CDN), Lucide Icons, Google Fonts Inter (mesma tag `<link>` do `index.php`)
- **Sem framework, sem router**

### Navbar nas páginas internas
Os links âncora da navbar (ex: `#overview`, `#methods`) serão atualizados para apontar para `index.php#overview`, `index.php#methods`, etc. Logo, o link "Início" da navbar aponta para `index.php`. Comportamento consistente em todas as páginas.

### Alterações ao Footer

| Link atual | Ação |
|---|---|
| Sobre Nós | → `sobre-nos.php` |
| Confiança e Segurança | → `confianca-seguranca.php` |
| Entre em contato | → `contato.php` |
| Falar com nossos especialistas | → link direto `https://wa.me/NUMERO` (substituir pelo número WhatsApp Business da XClickID) |
| Ajuda / FAQ | → `ajuda-faq.php` |
| Métodos de Verificação | → mantém `index.php#methods` |
| Integração API | → **removido** do footer (sem redirect, sem página) |
| Aviso Legal | → `aviso-legal.php` |
| Política de Privacidade | → `privacidade.php` |
| T&C para Usuários | → `termos-usuarios.php` |

---

## Arquivos a Criar/Modificar

```
_header.php                 — navbar extraída do index.php (links âncora → index.php#anchor)
_footer.php                 — footer extraído do index.php (links atualizados)
sobre-nos.php               — Sobre Nós
confianca-seguranca.php     — Confiança e Segurança
contato.php                 — Entre em Contato
ajuda-faq.php               — Ajuda / FAQ
aviso-legal.php             — Aviso Legal
privacidade.php             — Política de Privacidade
termos-usuarios.php         — T&C para Usuários
index.php                   — refatorado para usar _header.php e _footer.php
```

---

## Layout Padrão das Páginas Internas

```php
<?php include '_header.php'; ?>

<main>
    <!-- Hero -->
    <section class="pt-32 pb-16 relative z-10">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-black tracking-tight text-white mb-4">
                Título da Página
            </h1>
            <p class="text-xl text-zinc-400">Subtítulo.</p>
        </div>
    </section>

    <!-- Conteúdo principal -->
    <section class="py-16 relative z-10">
        <div class="max-w-3xl mx-auto px-6">
            <!-- conteúdo específico da página -->
        </div>
    </section>
</main>

<?php include '_footer.php'; ?>
```

**Visual:** fundo `#050505`, tipografia Inter, títulos em `text-white`, corpo em `text-zinc-400`, acentos `text-blue-400`. Cards com classe `glass-panel` (já definida em `assets/css/main.css`). Sem estados hover customizados nos cards.

---

## Conteúdo por Página

### Sobre Nós (`sobre-nos.php`)

**Hero:** "Sobre a XClickID" / "Conheça a empresa por trás da verificação de identidade digital mais eficiente do Brasil."

- **Nossa Missão** (~80 palavras): verificar identidades digitais com precisão, privacidade e zero fricção para o usuário
- **Nossa História** (~100 palavras): fundada para resolver o problema de verificação de idade em plataformas digitais de alto tráfego, crescemos com tecnologia 100% proprietária
- **Nossos Valores** — grid 3 colunas (ícone Lucide + título + 2 linhas):
  - Confiança (`shield-check`) — Segurança real, não teatro de segurança
  - Privacidade (`lock`) — Dados protegidos, conformidade LGPD
  - Inovação (`zap`) — Tecnologia proprietária em constante evolução

### Confiança e Segurança (`confianca-seguranca.php`)

**Hero:** "Confiança e Segurança" / "Sua operação protegida com tecnologia proprietária e conformidade total."

- 6 cards `glass-panel` em grid 2 colunas:
  - Criptografia End-to-End (`shield`) — dados em trânsito e em repouso
  - Conformidade LGPD (`file-check`) — adequação completa à Lei 13.709/2018
  - Infraestrutura Resiliente (`server`) — alta disponibilidade, uptime 99.9%
  - Tecnologia 100% Proprietária (`binary`) — sem dependência de terceiros
  - Auditoria Contínua (`search`) — monitoramento e testes de segurança regulares
  - Proteção de Dados do Usuário (`user-check`) — minimização e anonimização de dados

### Entre em Contato (`contato.php`)

**Hero:** "Entre em Contato" / "Estamos aqui para ajudar você e sua empresa."

- Grid 2 colunas:
  - **Informações de Contato:** email (contato@xclickid.com.br), endereço (Brasil), horário (Seg–Sex, 9h–18h)
  - **Card WhatsApp destacado** (`glass-panel`, borda azul): botão "Falar pelo WhatsApp" linkando para `https://wa.me/NUMERO`

### Ajuda / FAQ (`ajuda-faq.php`)

**Hero:** "Ajuda & FAQ" / "Respostas para as dúvidas mais comuns sobre a plataforma."

**8 perguntas:**
1. O que é a XClickID? — plataforma de verificação de identidade digital para operações de alto tráfego
2. Como funciona a verificação de identidade? — biometria + CPF + análise comportamental
3. Os dados do usuário ficam armazenados? — por quanto tempo e com qual finalidade
4. A XClickID é compatível com a LGPD? — conformidade total, detalhes
5. Como integrar a XClickID ao meu site? — link para contato comercial
6. Quanto tempo leva a verificação? — tempo médio em segundos
7. O usuário precisa se verificar mais de uma vez? — rede compartilhada, verificação única
8. Como entro em contato com o suporte? — email e WhatsApp

### Aviso Legal (`aviso-legal.php`)

**Hero:** "Aviso Legal" / "Informações legais sobre o uso deste site."

5 seções numeradas (~400 palavras total):
1. Identificação da Empresa
2. Condições de Uso do Site
3. Propriedade Intelectual
4. Isenção de Responsabilidade
5. Lei Aplicável e Foro

### Política de Privacidade (`privacidade.php`)

**Hero:** "Política de Privacidade" / "Como coletamos, usamos e protegemos seus dados."

8 seções numeradas (~600 palavras total):
1. Quais dados coletamos
2. Como usamos os dados
3. Retenção de dados
4. Compartilhamento com terceiros
5. Direitos do titular (LGPD)
6. Cookies e rastreamento
7. Segurança dos dados
8. Contato com o DPO (dpo@xclickid.com.br)

### T&C para Usuários (`termos-usuarios.php`)

**Hero:** "Termos e Condições" / "Condições de uso da plataforma XClickID."

7 seções numeradas (~500 palavras total):
1. Aceitação dos Termos
2. Uso da Plataforma
3. Obrigações do Usuário
4. Propriedade Intelectual
5. Limitações de Responsabilidade
6. Rescisão
7. Foro — São Paulo/SP, Brasil

---

## FAQ — Estrutura do Accordion

**HTML por item:**
```html
<div class="faq-item glass-panel rounded-xl overflow-hidden">
    <button class="faq-trigger w-full flex justify-between items-center px-6 py-4 text-left">
        <span class="font-semibold text-white">Pergunta?</span>
        <i data-lucide="plus" class="w-5 h-5 text-blue-400 faq-icon transition-transform duration-300"></i>
    </button>
    <div class="faq-answer px-6 overflow-hidden" style="max-height: 0; transition: max-height 0.3s ease;">
        <p class="text-zinc-400 pb-4">Resposta.</p>
    </div>
</div>
```

**JS (inline no final do body de `ajuda-faq.php`):**
- Click em `.faq-trigger` → define `max-height` do `.faq-answer` para `scrollHeight` (abrir) ou `0` (fechar)
- Fecha o item anteriormente aberto antes de abrir o novo
- Adiciona/remove classe `rotate-45` no `.faq-icon` (ícone `plus` vira X ao rodar 45°)
- Chama `lucide.createIcons()` antes de registrar os eventos

---

## Sequência de Implementação

1. Extrair `_header.php` e `_footer.php` do `index.php`; refatorar `index.php` para usar includes
2. Criar páginas legais: `aviso-legal.php`, `privacidade.php`, `termos-usuarios.php`
3. Criar `sobre-nos.php` e `confianca-seguranca.php`
4. Criar `contato.php`
5. Criar `ajuda-faq.php` (com accordion JS)
6. Atualizar links no `_footer.php` (hrefs finais, link WhatsApp, remover Integração API)
