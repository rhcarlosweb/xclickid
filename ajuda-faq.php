<?php $pageTitle = 'Ajuda & FAQ'; ?>
<?php include '_header.php'; ?>

<main>
    <section class="pt-32 pb-8 relative z-10">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-semibold tracking-tight text-white mb-3">Ajuda & FAQ</h1>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
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
