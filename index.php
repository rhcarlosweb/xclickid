<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XclickID - Verificação de Idade</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body class="relative min-h-screen selection:bg-blue-500/30 selection:text-blue-200">

    <!-- Brilho Ambiente Dinâmico acompanhando o rato -->
    <div id="ambient-glow" class="pointer-events-none fixed inset-0 z-0 transition-opacity duration-300" style="background: radial-gradient(600px circle at 0px 0px, rgba(59, 130, 246, 0.06), transparent 40%);"></div>

    <!-- Navbar -->
    <nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-300 bg-transparent py-6">
        <div class="max-w-7xl mx-auto px-6 md:px-12 flex justify-between items-center">
            <div class="flex items-center gap-2 cursor-pointer group">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white font-bold text-xl group-hover:shadow-[0_0_20px_rgba(59,130,246,0.4)] transition-all">
                    X
                </div>
                <span class="text-xl font-bold tracking-tight text-white">
                    Xclick<span class="text-blue-500">ID</span>
                </span>
            </div>
            
            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-zinc-400">
                <a href="#overview" class="hover:text-white transition-colors">Visão Geral</a>
                <a href="#methods" class="hover:text-white transition-colors">Métodos de Verificação</a>
                <a href="#compliance" class="hover:text-white transition-colors">LGPD & Segurança</a>
                <a href="#business" class="hover:text-white transition-colors">Para Empresas</a>
            </div>

            <div class="flex items-center gap-4">
                <button class="hidden md:block text-sm font-medium hover:text-white transition-colors">
                    Login
                </button>
                <button class="bg-white text-black px-5 py-2.5 rounded-full text-sm font-bold hover:bg-blue-500 hover:text-white transition-all duration-300 flex items-center gap-2 group">
                    Comece Agora
                    <i data-lucide="arrow-up-right" class="w-4 h-4 group-hover:rotate-45 transition-transform"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="overview" class="relative min-h-screen flex items-center pt-24 pb-12 overflow-hidden z-10">
        <!-- Background Blobs -->
        <div class="absolute top-1/4 right-0 w-[800px] h-[800px] bg-blue-600/10 rounded-full blur-[120px] -z-10 pointer-events-none translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-purple-900/10 rounded-full blur-[100px] -z-10 pointer-events-none -translate-x-1/2"></div>
        
        <div class="max-w-7xl mx-auto px-6 md:px-12 w-full grid lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 flex flex-col items-start">
                <div class="fade-in up delay-100 inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-blue-500/30 bg-blue-500/10 text-blue-400 text-xs font-semibold tracking-wide uppercase mb-6">
                    <i data-lucide="shield-check" class="w-4 h-4 text-blue-500"></i>
                    Proteção +18 e Confiança Digital
                </div>
                
                <h1 class="fade-in up delay-200 text-5xl md:text-6xl lg:text-7xl font-bold tracking-tighter leading-[1.05] text-white mb-8">
                    Verificação de Idade.<br />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">
                        Conformidade Absoluta.
                    </span>
                </h1>
                
                <p class="fade-in up delay-300 text-lg md:text-xl text-zinc-400 max-w-2xl mb-10 leading-relaxed">
                    O XclickID permite que as plataformas verifiquem a idade dos seus utilizadores (+18) de forma segura, respeitando totalmente a privacidade. Uma solução 100% aderente à LGPD para proteger o seu negócio e os seus clientes.
                </p>
                
                <div class="fade-in up delay-400 flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                    <button class="bg-blue-500 text-white px-8 py-4 rounded-full font-bold hover:bg-blue-600 transition-all duration-300 flex items-center justify-center gap-2 group shadow-[0_0_30px_rgba(59,130,246,0.3)] hover:shadow-[0_0_40px_rgba(59,130,246,0.5)]">
                        Integrar no meu site
                        <i data-lucide="chevron-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                    </button>
                    <a href="#methods" class="glass-panel text-white px-8 py-4 rounded-full font-bold hover:bg-white/10 transition-all duration-300 flex items-center justify-center gap-2">
                        Ver Métodos
                    </a>
                </div>
            </div>

            <!-- Hero Visual - Identidade Simulada -->
            <div class="lg:col-span-5 relative hidden lg:block pl-10">
                <div class="fade-in left delay-500 relative w-full aspect-[4/5] rounded-3xl glass-panel p-6 border border-white/10 overflow-hidden group">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-600 to-blue-400"></div>
                    
                    <div class="flex items-center justify-between mb-8">
                        <i data-lucide="fingerprint" class="w-8 h-8 text-blue-500"></i>
                        <div class="px-3 py-1 rounded-full bg-green-500/10 text-green-400 text-xs font-medium flex items-center gap-1.5 border border-green-500/20">
                            <i data-lucide="check-circle-2" class="w-3 h-3"></i> Status: Verificado
                        </div>
                    </div>
                    
                    <div class="space-y-6 relative z-10">
                        <div class="flex justify-center mb-8">
                            <div class="relative">
                                <div class="w-32 h-32 rounded-full border-2 border-dashed border-blue-500/50 flex items-center justify-center p-2">
                                    <div class="w-full h-full rounded-full bg-zinc-800 overflow-hidden flex items-center justify-center relative">
                                        <i data-lucide="user-check" class="w-12 h-12 text-zinc-500"></i>
                                        <!-- Animação da linha do scanner -->
                                        <div class="absolute top-0 left-0 w-full h-1 bg-blue-500 shadow-[0_0_10px_#3b82f6] animate-scanner"></div>
                                    </div>
                                </div>
                                <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center border-4 border-[#050505]">
                                    <i data-lucide="check-circle-2" class="w-5 h-5 text-black"></i>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <div class="flex justify-between items-center p-3 rounded-lg bg-white/5 border border-white/5">
                                <span class="text-zinc-400 text-sm">Idade Estimada</span>
                                <span class="text-white font-medium text-sm">Acima de 18 (Confiança 99%)</span>
                            </div>
                            <div class="flex justify-between items-center p-3 rounded-lg bg-white/5 border border-white/5">
                                <span class="text-zinc-400 text-sm">Liveness Check</span>
                                <span class="text-green-400 font-medium text-sm">Aprovado</span>
                            </div>
                            <div class="flex justify-between items-center p-3 rounded-lg bg-white/5 border border-white/5">
                                <span class="text-zinc-400 text-sm">Privacidade</span>
                                <span class="text-blue-400 font-medium text-sm">Dados Encriptados</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Glow effect on hover -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-blue-500/20 rounded-full blur-[80px] -z-10 group-hover:bg-blue-500/30 transition-colors duration-500"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Marquee Section -->
    <section class="py-8 border-y border-white/5 bg-black/50 backdrop-blur-sm overflow-hidden z-10 relative">
        <div class="whitespace-nowrap flex items-center opacity-60">
            <div class="animate-marquee flex items-center gap-16 text-xl md:text-2xl font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-zinc-500 to-zinc-700 uppercase">
                <span>Conformidade com a LGPD</span><span class="text-blue-500">•</span>
                <span>Zero Retenção de Dados</span><span class="text-blue-500">•</span>
                <span>Segurança Institucional</span><span class="text-blue-500">•</span>
                <span>Integração Global</span><span class="text-blue-500">•</span>
                <span>Experiência sem Fricção</span><span class="text-blue-500">•</span>
                <!-- Duplicado para criar o loop infinito -->
                <span>Conformidade com a LGPD</span><span class="text-blue-500">•</span>
                <span>Zero Retenção de Dados</span><span class="text-blue-500">•</span>
                <span>Segurança Institucional</span><span class="text-blue-500">•</span>
                <span>Integração Global</span><span class="text-blue-500">•</span>
                <span>Experiência sem Fricção</span><span class="text-blue-500">•</span>
            </div>
        </div>
    </section>

    <!-- Quick Steps Section -->
    <section id="business" class="py-24 relative z-10 bg-gradient-to-b from-[#050505] to-zinc-950">
        <div class="max-w-7xl mx-auto px-6 md:px-12 text-center">
            <div class="fade-in up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Comece em <span class="text-blue-500">3 Passos Rápidos</span></h2>
                <p class="text-zinc-400 max-w-2xl mx-auto mb-16">A nossa plataforma self-service permite criar widgets de verificação de idade com a sua marca instantaneamente.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6 relative">
                <!-- Linha conectora -->
                <div class="hidden md:block absolute top-1/2 left-[15%] right-[15%] h-0.5 bg-gradient-to-r from-transparent via-blue-500/30 to-transparent -translate-y-1/2 -z-10"></div>

                <!-- Step 1 -->
                <div class="fade-in up glass-panel p-10 rounded-2xl border border-white/5 hover:border-blue-500/40 transition-all duration-300 flex flex-col items-center text-center group bg-black/40">
                    <div class="w-20 h-20 rounded-full bg-[#050505] border border-white/10 flex items-center justify-center text-blue-500 mb-6 group-hover:scale-110 group-hover:bg-blue-500/10 transition-all duration-500 shadow-[0_0_15px_rgba(59,130,246,0.1)]">
                        <i data-lucide="code-2" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">1. Registe-se</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed">Crie a sua conta corporativa em segundos e aceda ao painel de controlo.</p>
                </div>

                <!-- Step 2 -->
                <div class="fade-in up delay-100 glass-panel p-10 rounded-2xl border border-white/5 hover:border-blue-500/40 transition-all duration-300 flex flex-col items-center text-center group bg-black/40">
                    <div class="w-20 h-20 rounded-full bg-[#050505] border border-white/10 flex items-center justify-center text-blue-500 mb-6 group-hover:scale-110 group-hover:bg-blue-500/10 transition-all duration-500 shadow-[0_0_15px_rgba(59,130,246,0.1)]">
                        <i data-lucide="settings" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">2. Configure o seu Site</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed">Personalize os métodos de verificação e a aparência do seu widget.</p>
                </div>

                <!-- Step 3 -->
                <div class="fade-in up delay-200 glass-panel p-10 rounded-2xl border border-white/5 hover:border-blue-500/40 transition-all duration-300 flex flex-col items-center text-center group bg-black/40">
                    <div class="w-20 h-20 rounded-full bg-[#050505] border border-white/10 flex items-center justify-center text-blue-500 mb-6 group-hover:scale-110 group-hover:bg-blue-500/10 transition-all duration-500 shadow-[0_0_15px_rgba(59,130,246,0.1)]">
                        <i data-lucide="rocket" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">3. Implemente o Script</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed">Cole uma única linha de código no cabeçalho da sua página web.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Verification Methods Grid -->
    <section id="methods" class="py-32 relative z-10">
        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <div class="fade-in up mb-20 text-center md:text-left md:w-2/3">
                <h2 class="text-4xl md:text-5xl font-bold tracking-tight text-white mb-6">
                    Métodos de <span class="text-blue-500">Verificação.</span>
                </h2>
                <p class="text-zinc-400 text-lg">
                    Oferecemos múltiplas opções para o utilizador final confirmar a sua idade (+18). Cada método é desenhado para maximizar a conversão enquanto garante conformidade legal rigorosa.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Method 1 -->
                <div class="fade-in up group h-full p-8 rounded-2xl glass-panel hover:bg-white/[0.04] border border-white/5 hover:border-blue-500/30 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute top-6 right-6 px-3 py-1 rounded-full bg-blue-500/10 text-blue-400 text-xs font-semibold uppercase border border-blue-500/20">
                        Mais Rápido
                    </div>
                    <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-zinc-800 to-zinc-900 border border-white/10 text-blue-400 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:border-blue-500/50 transition-all duration-500">
                        <i data-lucide="scan-face" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-blue-500 transition-colors">
                        Selfie (Estimativa por IA)
                    </h3>
                    <p class="text-zinc-400 leading-relaxed">
                        Utiliza inteligência artificial avançada para estimar a idade exata do utilizador em segundos. Rápido, sem atrito e sem necessidade de documentos na maioria dos casos.
                    </p>
                </div>

                <!-- Method 2 -->
                <div class="fade-in up delay-100 group h-full p-8 rounded-2xl glass-panel hover:bg-white/[0.04] border border-white/5 hover:border-blue-500/30 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute top-6 right-6 px-3 py-1 rounded-full bg-blue-500/10 text-blue-400 text-xs font-semibold uppercase border border-blue-500/20">
                        Maior Precisão
                    </div>
                    <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-zinc-800 to-zinc-900 border border-white/10 text-blue-400 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:border-blue-500/50 transition-all duration-500">
                        <i data-lucide="file-check-2" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-blue-500 transition-colors">
                        Documento + Selfie
                    </h3>
                    <p class="text-zinc-400 leading-relaxed">
                        Combina uma selfie ao vivo com um documento oficial com foto (Cartão de Cidadão, Passaporte) para verificação com altíssimo nível de garantia.
                    </p>
                </div>

                <!-- Method 3 -->
                <div class="fade-in up delay-200 group h-full p-8 rounded-2xl glass-panel hover:bg-white/[0.04] border border-white/5 hover:border-blue-500/30 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute top-6 right-6 px-3 py-1 rounded-full bg-blue-500/10 text-blue-400 text-xs font-semibold uppercase border border-blue-500/20">
                        Prático
                    </div>
                    <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-zinc-800 to-zinc-900 border border-white/10 text-blue-400 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:border-blue-500/50 transition-all duration-500">
                        <i data-lucide="credit-card" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-blue-500 transition-colors">
                        Cartão de Crédito
                    </h3>
                    <p class="text-zinc-400 leading-relaxed">
                        Autorização via cartão de crédito para confirmar que o utilizador é maior de idade. Nenhuma cobrança real é efetuada e nenhum dado do cartão é guardado.
                    </p>
                </div>

                <!-- Method 4 -->
                <div class="fade-in up delay-300 group h-full p-8 rounded-2xl glass-panel hover:bg-white/[0.04] border border-white/5 hover:border-blue-500/30 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute top-6 right-6 px-3 py-1 rounded-full bg-blue-500/10 text-blue-400 text-xs font-semibold uppercase border border-blue-500/20">
                        Seguro
                    </div>
                    <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-zinc-800 to-zinc-900 border border-white/10 text-blue-400 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:border-blue-500/50 transition-all duration-500">
                        <i data-lucide="smartphone" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-blue-500 transition-colors">
                        Identidade Digital (App)
                    </h3>
                    <p class="text-zinc-400 leading-relaxed">
                        Integração fluida com aplicações de identidade digital governamentais e de terceiros para comprovação oficial sem partilha extra de dados.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose XclickID / Core Values -->
    <section id="compliance" class="py-24 relative z-10 bg-zinc-900/30 border-y border-white/5">
        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <div class="fade-in up text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Por que escolher o XclickID?</h2>
                <p class="text-zinc-400">Princípios fundamentais que protegem a sua marca e os seus utilizadores.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="fade-in up text-center">
                    <div class="w-14 h-14 mx-auto rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center mb-4 border border-blue-500/20">
                        <i data-lucide="globe-2" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">Cobertura Global</h4>
                    <p class="text-sm text-zinc-400 leading-relaxed">A nossa solução atende necessidades automatizadas para manter o seu negócio em conformidade em qualquer lugar.</p>
                </div>
                
                <div class="fade-in up delay-100 text-center">
                    <div class="w-14 h-14 mx-auto rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center mb-4 border border-blue-500/20">
                        <i data-lucide="lock" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">Privacy & LGPD First</h4>
                    <p class="text-sm text-zinc-400 leading-relaxed">Não partilhamos informações pessoais com os sites. Zero retenção de dados sensíveis após a verificação.</p>
                </div>

                <div class="fade-in up delay-200 text-center">
                    <div class="w-14 h-14 mx-auto rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center mb-4 border border-blue-500/20">
                        <i data-lucide="zap" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">Solução Automatizada</h4>
                    <p class="text-sm text-zinc-400 leading-relaxed">Processamento instantâneo a operar 24/7 sem necessidade de intervenção manual da sua equipa.</p>
                </div>

                <div class="fade-in up delay-300 text-center">
                    <div class="w-14 h-14 mx-auto rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center mb-4 border border-blue-500/20">
                        <i data-lucide="shield-check" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">Integridade da Marca</h4>
                    <p class="text-sm text-zinc-400 leading-relaxed">Cumpra obrigações legais de proteção de menores e demonstre que é uma empresa confiável.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust & Safety Showcase -->
    <section class="py-32 relative z-10 overflow-hidden">
        <div class="absolute inset-0 bg-blue-600/5"></div>
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-full max-w-4xl h-64 bg-blue-500/20 blur-[100px] pointer-events-none rounded-t-full"></div>
        
        <div class="max-w-5xl mx-auto px-6 text-center relative z-10">
            <div class="fade-in up">
                <div class="inline-block mb-6">
                   <!-- Mantivemos o verde para o "Visto" de segurança (sucesso/aprovado) -->
                   <i data-lucide="shield-check" class="w-16 h-16 text-green-500 mx-auto"></i>
                </div>
                <h2 class="text-4xl md:text-6xl font-bold tracking-tight text-white mb-8">
                    A sua privacidade está <br />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">totalmente protegida.</span>
                </h2>
                <p class="text-xl text-zinc-400 mb-12 max-w-2xl mx-auto">
                    Com o XclickID, o utilizador final verifica a idade uma única vez. A partir daí, o acesso aos sites parceiros ocorre de forma imediata e sem atrito, mantendo 100% de privacidade.
                </p>
                
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-3xl mx-auto mb-16">
                    <div class="glass-panel p-6 rounded-xl border-t-4 border-t-blue-500 text-center">
                        <h4 class="font-bold text-white text-lg mb-2">1. Verifique</h4>
                        <p class="text-xs text-zinc-400">Verifique a idade gratuitamente com métodos rápidos.</p>
                    </div>
                    <div class="glass-panel p-6 rounded-xl border-t-4 border-t-blue-400 text-center">
                        <h4 class="font-bold text-white text-lg mb-2">2. Crie</h4>
                        <p class="text-xs text-zinc-400">A sua conta anónima serve como passaporte (+18).</p>
                    </div>
                    <div class="glass-panel p-6 rounded-xl border-t-4 border-t-green-500 text-center">
                        <h4 class="font-bold text-white text-lg mb-2">3. Aceda</h4>
                        <p class="text-xs text-zinc-400">Aproveite o conteúdo desejado com privacidade total.</p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-white text-black px-10 py-4 rounded-full font-bold hover:bg-blue-500 hover:text-white transition-all duration-300 shadow-[0_0_20px_rgba(255,255,255,0.1)] hover:shadow-[0_0_40px_rgba(59,130,246,0.4)]">
                        Quero usar no meu site
                    </button>
                    <button class="glass-panel text-white px-10 py-4 rounded-full font-bold hover:bg-white/5 transition-all duration-300">
                        Ler Política de Segurança
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="pt-24 pb-12 border-t border-white/10 relative z-10 bg-[#020202]">
        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-12 mb-20">
                <div class="col-span-2 lg:col-span-2">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-8 h-8 rounded-lg bg-blue-500 flex items-center justify-center text-white font-bold text-xl">
                            X
                        </div>
                        <span class="text-2xl font-bold tracking-tight text-white">
                            Xclick<span class="text-blue-500">ID</span>
                        </span>
                    </div>
                    <p class="text-zinc-500 max-w-sm mb-8">
                        A solução definitiva e automatizada para verificação de idade online, garantindo conformidade com leis e total privacidade aos utilizadores.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" aria-label="Twitter" class="w-10 h-10 rounded-full glass-panel flex items-center justify-center hover:bg-blue-500 hover:text-white hover:border-blue-500 transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                        </a>
                        <a href="#" aria-label="LinkedIn" class="w-10 h-10 rounded-full glass-panel flex items-center justify-center hover:bg-blue-500 hover:text-white hover:border-blue-500 transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd"/></svg>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-bold text-white mb-6 uppercase text-sm tracking-wider">A Empresa</h4>
                    <ul class="space-y-4 text-zinc-500 text-sm">
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Sobre Nós</a></li>
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Confiança e Segurança</a></li>
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Contacte-nos</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white mb-6 uppercase text-sm tracking-wider">Utilizadores</h4>
                    <ul class="space-y-4 text-zinc-500 text-sm">
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Minha Conta</a></li>
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Ajuda / FAQ</a></li>
                        <li><a href="#methods" class="hover:text-blue-500 transition-colors">Métodos de Verificação</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white mb-6 uppercase text-sm tracking-wider">Negócios & Legal</h4>
                    <ul class="space-y-4 text-zinc-500 text-sm">
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Integração API</a></li>
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Aviso Legal</a></li>
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Política de Privacidade</a></li>
                        <li><a href="#" class="hover:text-blue-500 transition-colors">T&C para Utilizadores</a></li>
                    </ul>
                </div>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center pt-8 border-t border-white/10 text-zinc-600 text-sm">
                <p>© 2026 XclickID, Inc. Todos os direitos reservados.</p>
                <div class="flex items-center gap-2 mt-4 md:mt-0">
                    <span class="w-2 h-2 rounded-full bg-green-500"></span>
                    <span>Plataforma 100% Operacional</span>
                </div>
            </div>
        </div>
        
        <!-- Background Text Gigante -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden pointer-events-none select-none flex justify-center opacity-[0.02]">
            <span class="text-[15vw] font-black tracking-tighter leading-none whitespace-nowrap">
                XCLICKID
            </span>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>