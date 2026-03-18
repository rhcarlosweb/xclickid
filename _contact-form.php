<?php
// Usage: optionally set $formId before including this file.
// Modal:  $formId = 'contact-form-modal';
// Inline: $formId = 'contact-form-inline';
$formId = $formId ?? 'contact-form';
$formIdEsc = htmlspecialchars($formId, ENT_QUOTES, 'UTF-8');
?>
<form id="<?= $formIdEsc ?>" class="contact-form" novalidate>

    <div class="contact-form-body space-y-5">

        <!-- Nome -->
        <div>
            <label class="block text-sm text-zinc-400 mb-1.5" for="<?= $formIdEsc ?>-name">Nome</label>
            <input type="text" id="<?= $formIdEsc ?>-name" name="name"
                   class="contact-field w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-zinc-600 focus:outline-none focus:border-blue-500 transition-colors text-sm"
                   placeholder="Seu nome completo">
        </div>

        <!-- E-mail -->
        <div>
            <label class="block text-sm text-zinc-400 mb-1.5" for="<?= $formIdEsc ?>-email">E-mail</label>
            <input type="email" id="<?= $formIdEsc ?>-email" name="email"
                   class="contact-field w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-zinc-600 focus:outline-none focus:border-blue-500 transition-colors text-sm"
                   placeholder="seu@email.com">
        </div>

        <!-- Telefone -->
        <div>
            <label class="block text-sm text-zinc-400 mb-1.5" for="<?= $formIdEsc ?>-phone">Telefone</label>
            <input type="tel" id="<?= $formIdEsc ?>-phone" name="phone"
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
