# Design: Páginas Internas do Rodapé — XClickID

**Data:** 2026-03-17
**Estado:** Aprovado

---

## Contexto

O site XClickID (`index.php`) é uma landing page single-file com navbar e footer. O footer lista links para páginas internas que ainda não existem. Este documento define a criação dessas páginas.

---

## Decisões de Design

### Arquitetura
- **Ficheiros separados** — cada página é um ficheiro `.php` independente
- **Includes partilhados** — `_header.php` e `_footer.php` extraídos do `index.php`; todas as páginas incluem estes ficheiros
- **Stack:** PHP puro, Tailwind CSS (CDN), Lucide Icons, Google Fonts (Inter)
- **Sem framework, sem router**

### Alterações ao Rodapé
- **Falar com especialistas** → link direto para WhatsApp (sem página própria)
- **Integração API** → removido do menu do rodapé
- Todos os outros links apontam para os ficheiros `.php` correspondentes

---

## Ficheiros a Criar

```
_header.php                   — navbar extraída do index.php
_footer.php                   — footer extraído do index.php
sobre-nos.php                 — Sobre Nós
confianca-seguranca.php       — Confiança e Segurança
contacte-nos.php              — Contacte-nos
ajuda-faq.php                 — Ajuda / FAQ
aviso-legal.php               — Aviso Legal
privacidade.php               — Política de Privacidade
termos-utilizadores.php       — T&C para Utilizadores
```

O `index.php` é refatorado para incluir `_header.php` e `_footer.php`.

---

## Layout Padrão das Páginas Internas

```html
<?php include '_header.php'; ?>

<main>
  <!-- Hero: título + subtítulo, fundo escuro, gradiente sutil -->
  <!-- Conteúdo: coluna centrada max-w ~800px, tipografia branca/cinza -->
</main>

<?php include '_footer.php'; ?>
```

Visual consistente com o site principal: fundo `#050505`, tipografia Inter, acentos em azul (`#3B82F6`), glassmorphism onde adequado.

---

## Conteúdo por Página

Todo o conteúdo é gerado com base na identidade da XClickID (plataforma de verificação de identidade digital, mercado PT/BR). Textos em português europeu.

| Página | Formato | Conteúdo |
|---|---|---|
| **Sobre Nós** | Texto narrativo + valores | Missão, visão, história da empresa, valores (confiança, privacidade, inovação) |
| **Confiança e Segurança** | Cards com ícones + texto | Certificações, protocolos de segurança, compliance LGPD/RGPD, infraestrutura |
| **Contacte-nos** | Info de contacto estática | Email, localização, horário de atendimento, link WhatsApp |
| **Ajuda / FAQ** | Accordion interativo | 8-10 perguntas frequentes sobre verificação de identidade, conta, integração |
| **Aviso Legal** | Documento com secções numeradas | Identificação da empresa, termos de uso do site, propriedade intelectual |
| **Política de Privacidade** | Documento com secções numeradas | Dados recolhidos, finalidade, retenção, direitos do titular, RGPD |
| **T&C para Utilizadores** | Documento com secções numeradas | Condições de uso da plataforma, obrigações do utilizador, limitações de responsabilidade |

---

## Comportamento do FAQ

O accordion usa JavaScript vanilla (sem dependências externas). Comportamento:
- Uma pergunta abre de cada vez (fechar a anterior ao abrir nova)
- Animação de altura com CSS transition
- Ícone rotaciona (+ → ×) ao expandir

---

## Sequência de Implementação

1. Extrair `_header.php` e `_footer.php` do `index.php`; refatorar `index.php`
2. Criar páginas legais (Aviso Legal, Privacidade, T&C) — estrutura simples
3. Criar Sobre Nós e Confiança e Segurança
4. Criar Contacte-nos
5. Criar Ajuda/FAQ (com accordion JS)
6. Atualizar links no `_footer.php`
