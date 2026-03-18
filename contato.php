<?php $pageTitle = 'Entre em Contato'; ?>
<?php include '_header.php'; ?>

<main>
    <section class="pt-32 pb-8 relative z-10">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-semibold tracking-tight text-white mb-3">Entre em Contato</h1>
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
                </div>

                <!-- Inline Contact Form -->
                <div class="glass-panel p-8 rounded-xl">
                    <h2 class="text-xl font-bold text-white mb-1">Envie uma mensagem</h2>
                    <p class="text-zinc-400 text-sm mb-6">Preencha seus dados e entraremos em contato.</p>
                    <?php $formId = 'contact-form-inline'; include __DIR__ . '/_contact-form.php'; ?>
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
