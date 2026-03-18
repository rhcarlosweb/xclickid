<?php $pageTitle = 'XClickID - Valide seus usuários em segundos!'; ?>
<?php include '_header.php'; ?>


    <!-- Hero Section -->
    <section id="overview" class="relative min-h-screen flex items-center pt-24 pb-12 overflow-hidden z-10">
        <!-- Background Blobs -->
        <div class="absolute top-1/4 right-0 w-[800px] h-[800px] bg-blue-600/10 rounded-full blur-[120px] -z-10 pointer-events-none translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-purple-900/10 rounded-full blur-[100px] -z-10 pointer-events-none -translate-x-1/2"></div>
        
        <div class="max-w-7xl mx-auto px-6 md:px-12 w-full grid lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 flex flex-col items-start">
                <div class="fade-in up delay-100 inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-blue-500/30 bg-blue-500/10 text-blue-400 text-xs font-semibold tracking-wide uppercase mb-6">
                    <i data-lucide="network" class="w-4 h-4 text-blue-500"></i>
                    Infraestrutura de Identidade Distribuída
                </div>
                
                <h1 class="fade-in up delay-200 text-5xl md:text-6xl lg:text-7xl font-bold tracking-tighter leading-[1.05] text-white mb-8">
                    Valide usuários <br />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">
                        antes mesmo de chegarem.
                    </span>
                </h1>
                
                <p class="fade-in up delay-300 text-lg md:text-xl text-zinc-400 max-w-2xl mb-10 leading-relaxed">
                    Reduza fricção, aumente a conversão e opere com uma <span class="text-white font-medium">base de usuários já validada</span> em nossa rede global de identidade.
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

            <!-- Hero Visual - Advanced 3D Identity Vault -->
            <div class="lg:col-span-5 relative hidden lg:block pl-10 hero-visual-container">
                <!-- Decorative Elements -->
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute -bottom-12 -left-12 w-40 h-40 bg-purple-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: -2s;"></div>

                <!-- Main Card -->
                <div id="heroCard" class="fade-in left delay-500 relative w-full aspect-[4/5] rounded-3xl glass-panel p-8 border border-white/10 overflow-hidden group hero-card-3d shadow-[0_30px_100px_rgba(0,0,0,0.5)]">
                    <!-- Internal Light Streak -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-blue-500/5 to-transparent pointer-events-none"></div>
                    
                    <div class="flex items-center justify-between mb-10 relative z-10">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-blue-500/20 flex items-center justify-center border border-blue-500/30">
                                <i data-lucide="fingerprint" class="w-6 h-6 text-blue-400"></i>
                            </div>
                            <span class="text-white font-bold text-lg tracking-tight">XClick<span class="text-blue-500">ID</span></span>
                        </div>
                        <div class="px-3 py-1.5 rounded-full bg-green-500/10 text-green-400 text-[10px] font-black uppercase tracking-widest flex items-center gap-2 border border-green-500/20">
                            <div class="w-1.5 h-1.5 rounded-full bg-green-500 shadow-[0_0_8px_#22c55e]"></div>
                            Verificado
                        </div>
                    </div>
                    
                    <div class="space-y-10 relative z-10">
                        <div class="flex justify-center">
                            <div class="relative group/user">
                                <div class="w-40 h-40 rounded-full border border-white/10 flex items-center justify-center p-3 relative">
                                    <!-- Rotating outer rings -->
                                    <div class="absolute inset-0 border-2 border-dashed border-blue-500/20 rounded-full animate-[spin_10s_linear_infinite]"></div>
                                    <div class="absolute inset-2 border border-blue-400/10 rounded-full animate-[spin_15s_linear_infinite_reverse]"></div>
                                    
                                    <div class="w-full h-full rounded-full bg-zinc-900 overflow-hidden flex items-center justify-center relative shadow-inner">
                                        <i data-lucide="user" class="w-16 h-16 text-zinc-700 group-hover/user:text-blue-500/50 transition-colors duration-500"></i>
                                        
                                        <!-- Interactive Scanning Line -->
                                        <div class="scan-beam"></div>
                                        
                                        <!-- Simulated Point Cloud Overlay (SVG) -->
                                        <svg class="absolute inset-0 w-full h-full opacity-20 pointer-events-none" viewBox="0 0 100 100">
                                            <circle cx="50" cy="30" r="1" fill="white" />
                                            <circle cx="40" cy="45" r="1" fill="white" />
                                            <circle cx="60" cy="45" r="1" fill="white" />
                                            <circle cx="50" cy="60" r="1" fill="white" />
                                            <path d="M40,45 Q50,40 60,45" stroke="white" fill="none" stroke-width="0.5" />
                                        </svg>
                                    </div>
                                </div>
                                
                                <!-- Status Badge -->
                                <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-blue-500 rounded-2xl flex items-center justify-center border-4 border-[#050505] shadow-lg group-hover/user:scale-110 transition-transform">
                                    <i data-lucide="shield-check" class="w-5 h-5 text-white"></i>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-3">
                            <div class="group/item flex justify-between items-center p-4 rounded-2xl bg-white/5 border border-white/5 hover:bg-white/10 hover:border-white/10 transition-all cursor-default">
                                <div class="flex items-center gap-3">
                                    <i data-lucide="user-check" class="w-4 h-4 text-yellow-500"></i>
                                    <span class="text-zinc-400 text-xs font-medium tracking-wide">Idade Estimada</span>
                                </div>
                                <span class="text-white font-bold text-sm">Acima de 18 (99%)</span>
                            </div>
                            <div class="group/item flex justify-between items-center p-4 rounded-2xl bg-white/5 border border-white/5 hover:bg-white/10 hover:border-white/10 transition-all cursor-default">
                                <div class="flex items-center gap-3">
                                    <i data-lucide="scan-face" class="w-4 h-4 text-green-500"></i>
                                    <span class="text-zinc-400 text-xs font-medium tracking-wide">Liveness Check</span>
                                </div>
                                <span class="text-green-400 font-bold text-sm uppercase tracking-tighter">Aprovado</span>
                            </div>
                            <div class="group/item flex justify-between items-center p-4 rounded-2xl bg-white/5 border border-white/5 hover:bg-white/10 hover:border-white/10 transition-all cursor-default">
                                <div class="flex items-center gap-3">
                                    <i data-lucide="lock" class="w-4 h-4 text-blue-500"></i>
                                    <span class="text-zinc-400 text-xs font-medium tracking-wide">Privacidade</span>
                                </div>
                                <span class="text-blue-400 font-bold text-sm uppercase tracking-tighter">Dados Encriptados</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Dynamic Background Glow -->
                    <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-blue-600/20 rounded-full blur-[100px] -z-10 group-hover:bg-blue-600/30 transition-colors duration-700"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Marquee Section -->
    <section class="py-8 border-y border-white/5 bg-black/50 backdrop-blur-sm overflow-hidden z-10 relative">
        <div class="whitespace-nowrap flex items-center opacity-60">
            <div class="animate-marquee flex items-center gap-16 text-xl md:text-2xl font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-zinc-500 to-zinc-700 uppercase">
                <span>Validação Antecipada</span><span class="text-blue-500">•</span>
                <span>Base Já Preparada</span><span class="text-blue-500">•</span>
                <span>Menor Custo por Aquisição</span><span class="text-blue-500">•</span>
                <span>Tecnologia 100% Proprietária</span><span class="text-blue-500">•</span>
                <span>Identidade Distribuída</span><span class="text-blue-500">•</span>
                <!-- Duplicado para criar o loop infinito -->
                <span>Validação Antecipada</span><span class="text-blue-500">•</span>
                <span>Base Já Preparada</span><span class="text-blue-500">•</span>
                <span>Menor Custo por Aquisição</span><span class="text-blue-500">•</span>
                <span>Tecnologia 100% Proprietária</span><span class="text-blue-500">•</span>
                <span>Identidade Distribuída</span><span class="text-blue-500">•</span>
            </div>
        </div>
    </section>

    <!-- Network Concept Section -->
    <section class="py-24 relative z-10 bg-black">
        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="fade-in up">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-8 tracking-tight">
                        Se o usuário já passou pela nossa rede, <br />
                        <span class="text-blue-500 text-3xl md:text-4xl">ele já está validado.</span>
                    </h2>
                    <p class="text-zinc-400 text-lg leading-relaxed mb-6">
                        A maioria das plataformas valida o usuário apenas quando ele tenta entrar. <span class="text-white">Nós fazemos isso antes.</span>
                    </p>
                    <p class="text-zinc-500 leading-relaxed mb-8">
                        O XClick ID é uma camada de identidade integrada a um ecossistema com alto volume de usuários ativos. Quando um usuário passa por qualquer ponto da nossa rede, ele é processado. Na próxima interação, ele já está pronto para converter.
                    </p>
                    <div class="flex items-center gap-4 text-blue-400 font-bold uppercase text-xs tracking-widest">
                        <span class="w-12 h-px bg-blue-500"></span>
                        Vantagem Competitiva Real
                    </div>
                </div>
                <div class="relative flex justify-center h-[350px] md:h-[500px]" style="perspective: 1000px;">
                    <!-- Refined Visual representation -->
                    <div class="network-container w-full max-w-sm md:max-w-lg">
                        <!-- Background Glows -->
                        <div class="absolute inset-0 bg-blue-600/5 rounded-full blur-[100px] animate-pulse"></div>
                        
                        <!-- Orbits with Nodes (Borders are hidden via CSS) -->
                        <div class="network-orbit orbit-1">
                            <div class="network-node" style="top: 0; left: 50%; transform: translateX(-50%);"></div>
                        </div>
                        <div class="network-orbit orbit-2">
                            <div class="network-node" style="top: 50%; left: 0%; transform: translateY(-50%);"></div>
                        </div>
                        <div class="network-orbit orbit-3">
                            <div class="network-node" style="top: 20%; left: 20%;"></div>
                        </div>
                        <div class="network-orbit orbit-1" style="animation-delay: -10s; animation-direction: reverse;">
                            <div class="network-node" style="bottom: 0; left: 50%; transform: translateX(-50%); background: #60a5fa;"></div>
                        </div>

                        <div class="network-orbit orbit-2" style="animation-delay: -5s;">
                            <div class="network-node" style="top: 50%; left: 100%; transform: translateY(-50%); background: #60a5fa;"></div>
                        </div>
                        <div class="network-orbit orbit-3" style="animation-delay: -15s; animation-direction: reverse;">
                            <div class="network-node" style="top: 80%; left: 80%;"></div>
                        </div>

                        <!-- Central Core -->
                        <div class="central-core">
                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.277158 2.65761C1.09488 1.72631 1.93532 0.84044 2.84391 0C3.91149 0.636009 4.88822 1.45374 5.86495 2.20332C7.52311 3.47534 9.18128 4.72464 10.8395 5.97394C11.112 6.2238 11.4982 6.33737 11.8162 6.08751C14.5646 4.13406 17.1768 1.95346 19.9253 0C20.9474 0.795011 21.7652 1.81718 22.651 2.74848C22.969 3.04377 22.5602 3.40719 22.4012 3.67977C18.9258 8.29083 15.3824 12.8792 11.907 17.4902C11.7253 17.8083 11.1802 17.8537 10.953 17.5811C7.45497 12.97 3.97964 8.35898 0.458873 3.77063C0.231726 3.45263 -0.0635607 2.99833 0.277158 2.65761Z" fill="#F2F2F2"/>
                        <path d="M4.95649 13.2881C5.18364 13.0155 5.36536 12.6975 5.66065 12.493C6.09222 12.5158 6.25123 12.9701 6.50109 13.2653C7.56868 14.7872 8.81798 16.1728 9.81742 17.7628C7.95483 19.2393 6.00136 20.5794 4.16148 22.0786C3.79805 22.3512 3.45733 22.6692 3.04847 22.8509C2.73046 22.8736 2.54875 22.5556 2.3216 22.3966C1.57202 21.6016 0.686149 20.9656 0.00471095 20.1252C-0.0407183 19.8299 0.254573 19.6027 0.368146 19.3756C1.89002 17.3313 3.45733 15.3324 4.95649 13.2881Z" fill="#F2F2F2"/>
                        <path d="M16.4953 13.1063C16.6998 12.9019 16.9269 12.4249 17.2903 12.6293C17.8128 13.1518 18.1989 13.765 18.6532 14.3329C20.0161 16.2182 21.5153 17.99 22.8327 19.9207C22.015 20.8747 21.1972 21.806 20.2887 22.6692C20.0388 22.9872 19.6072 22.8055 19.3574 22.5783C17.6311 21.2382 15.882 19.9207 14.1557 18.6033C13.7696 18.308 13.4289 17.9672 13.0881 17.5811C14.2239 16.1047 15.3823 14.6055 16.4953 13.1063Z" fill="#F2F2F2"/>
                        </svg>
                            <!-- Constant Pulse Ring -->
                            <div class="absolute inset-[-10px] md:inset-[-15px] border border-blue-500/40 rounded-[20px] md:rounded-[30px] animate-[ping_3s_linear_infinite]"></div>
                        </div>

                        <!-- Connection Lines SVG (Background) -->
                        <svg class="network-lines" viewBox="0 0 500 500">
                            <path d="M250,250 L50,250" />
                            <path d="M250,250 L450,250" />
                            <path d="M250,250 L250,50" />
                            <path d="M250,250 L250,450" />
                            <path d="M250,250 L100,100" />
                            <path d="M250,250 L400,400" />
                            
                            <!-- Animated Pulse Dots on Lines -->
                            <circle r="2" class="pulse">
                                <animateMotion dur="3s" repeatCount="indefinite" path="M250,250 L50,250" />
                            </circle>
                            <circle r="2" class="pulse">
                                <animateMotion dur="5s" repeatCount="indefinite" path="M250,250 L450,250" />
                            </circle>
                            <circle r="2" class="pulse">
                                <animateMotion dur="4s" repeatCount="indefinite" path="M250,250 L250,50" />
                            </circle>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Steps Section -->
    <section id="business" class="py-24 relative z-10 bg-gradient-to-b from-[#050505] to-zinc-950">
        <div class="max-w-7xl mx-auto px-6 md:px-12 text-center">
            <div class="fade-in up">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Multiplicador de <span class="text-blue-500">Performance</span></h2>
                <p class="text-zinc-400 max-w-2xl mx-auto mb-16">O XClickID não é um custo, é uma camada de inteligência integrada ao seu ecossistema digital.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6 relative">
                <!-- Linha conectora -->
                <div class="hidden md:block absolute top-1/2 left-[15%] right-[15%] h-0.5 bg-gradient-to-r from-transparent via-blue-500/30 to-transparent -translate-y-1/2 -z-10"></div>

                <!-- Step 1 -->
                <div class="fade-in up glass-panel p-10 rounded-2xl border border-white/5 hover:border-blue-500/40 transition-all duration-300 flex flex-col items-center text-center group bg-black/40">
                    <div class="w-20 h-20 rounded-full bg-[#050505] border border-white/10 flex items-center justify-center text-blue-500 mb-6 group-hover:scale-110 group-hover:bg-blue-500/10 transition-all duration-500 shadow-[0_0_15px_rgba(59,130,246,0.1)]">
                        <i data-lucide="message-square" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">1. Fale com um Especialista</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed">Entre em contato com nosso time para alinhar a melhor estratégia de integração para sua operação.</p>
                </div>

                <!-- Step 2 -->
                <div class="fade-in up delay-100 glass-panel p-10 rounded-2xl border border-white/5 hover:border-blue-500/40 transition-all duration-300 flex flex-col items-center text-center group bg-black/40">
                    <div class="w-20 h-20 rounded-full bg-[#050505] border border-white/10 flex items-center justify-center text-blue-500 mb-6 group-hover:scale-110 group-hover:bg-blue-500/10 transition-all duration-500 shadow-[0_0_15px_rgba(59,130,246,0.1)]">
                        <i data-lucide="settings" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">2. Configure seu Site</h3>
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
                    A Inteligência por trás da <span class="text-blue-500">Invisibilidade.</span>
                </h2>
                <p class="text-zinc-400 text-lg">
                    Nosso ecossistema utiliza múltiplos sinais para validar a identidade de forma inteligente. O usuário só interage quando estritamente necessário, garantindo uma experiência contínua e segura.
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
                        XClick Biometrics (Liveness)
                    </h3>
                    <p class="text-zinc-400 leading-relaxed">
                        Sistema próprio de biometria facial com liveness detection. Garante que o usuário é real e está presente no momento da validação.
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
                        Combina uma selfie ao vivo com um documento oficial com foto (RG, CNH, Passaporte) para verificação com altíssimo nível de garantia.
                    </p>
                </div>

                <!-- Method 3 -->
                <div class="fade-in up delay-200 group h-full p-8 rounded-2xl glass-panel hover:bg-white/[0.04] border border-white/5 hover:border-blue-500/30 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute top-6 right-6 px-3 py-1 rounded-full bg-blue-500/10 text-blue-400 text-xs font-semibold uppercase border border-blue-500/20">
                        Inteligente
                    </div>
                    <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-zinc-800 to-zinc-900 border border-white/10 text-blue-400 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:border-blue-500/50 transition-all duration-500">
                        <i data-lucide="brain-circuit" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-blue-500 transition-colors">
                        Inteligência Comportamental
                    </h3>
                    <p class="text-zinc-400 leading-relaxed">
                        Análise avançada de padrões para validar a identidade de forma invisível, garantindo segurança sem impactar a experiência de navegação.
                    </p>
                </div>

                <!-- Method 4 -->
                <div class="fade-in up delay-300 group h-full p-8 rounded-2xl glass-panel hover:bg-white/[0.04] border border-white/5 hover:border-blue-500/30 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute top-6 right-6 px-3 py-1 rounded-full bg-blue-500/10 text-blue-400 text-xs font-semibold uppercase border border-blue-500/20">
                        Essencial
                    </div>
                    <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-zinc-800 to-zinc-900 border border-white/10 text-blue-400 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:border-blue-500/50 transition-all duration-500">
                        <i data-lucide="database" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-blue-500 transition-colors">
                        Verificação de CPF & Bases
                    </h3>
                    <p class="text-zinc-400 leading-relaxed">
                        Cruzamento instantâneo com bases oficiais e privadas para garantir a veracidade dos dados fornecidos em tempo recorde.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose XClickID / Core Values -->
    <section id="compliance" class="py-24 relative z-10 bg-zinc-900/30 border-y border-white/5">
        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <div class="fade-in up text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">A Evolução da Identidade</h2>
                <p class="text-zinc-400">O XClick ID transforma validação em vantagem competitiva para sua operação digital.</p>
            </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="fade-in up text-center">
                    <div class="w-14 h-14 mx-auto rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center mb-4 border border-blue-500/20">
                        <i data-lucide="trending-up" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">Aumento de Conversão</h4>
                    <p class="text-sm text-zinc-400 leading-relaxed">Impacto direto no funil de acesso através da redução drástica de fricção na entrada do usuário.</p>
                </div>
                
                <div class="fade-in up delay-100 text-center">
                    <div class="w-14 h-14 mx-auto rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center mb-4 border border-blue-500/20">
                        <i data-lucide="shield-check" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">Conformidade Legal</h4>
                    <p class="text-sm text-zinc-400 leading-relaxed">A solução definitiva para adequar seu site +18 às exigências legais de verificação de idade.</p>
                </div>

                <div class="fade-in up delay-200 text-center">
                    <div class="w-14 h-14 mx-auto rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center mb-4 border border-blue-500/20">
                        <i data-lucide="user-check-2" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">Usuários Preparados</h4>
                    <p class="text-sm text-zinc-400 leading-relaxed">Opere com uma base que já passou pelo processo de validação em nossa rede.</p>
                </div>

                <div class="fade-in up delay-300 text-center">
                    <div class="w-14 h-14 mx-auto rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center mb-4 border border-blue-500/20">
                        <i data-lucide="dollar-sign" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">Redução de CAC</h4>
                    <p class="text-sm text-zinc-400 leading-relaxed">Otimize seu custo por aquisição ao converter mais tráfego com menos etapas manuais.</p>
                </div>

                <div class="fade-in up delay-400 text-center">
                    <div class="w-14 h-14 mx-auto rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center mb-4 border border-blue-500/20">
                        <i data-lucide="binary" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">100% Proprietário</h4>
                    <p class="text-sm text-zinc-400 leading-relaxed">Biometria, CPF e comportamento em uma estrutura única desenvolvida internamente.</p>
                </div>

                <div class="fade-in up delay-500 text-center">
                    <div class="w-14 h-14 mx-auto rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center mb-4 border border-blue-500/20">
                        <i data-lucide="lock" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">Segurança Ativa</h4>
                    <p class="text-sm text-zinc-400 leading-relaxed">Conformidade e proteção de dados operando como vantagem competitiva real.</p>
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
                <h2 class="text-4xl md:text-6xl font-black tracking-tight text-white mb-8 text-center mx-auto">
                    Privacidade e Segurança <br />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">como Estratégia de Crescimento.</span>
                </h2>
                <p class="text-xl text-zinc-400 mb-12 max-w-2xl mx-auto text-center">
                    Operamos com segurança máxima e conformidade com as melhores práticas de proteção de dados, garantindo que sua empresa cresça sobre uma base sólida e confiável.
                </p>
                
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-3xl mx-auto mb-16">
                    <div class="glass-panel p-6 rounded-xl border-t-4 border-t-blue-500 text-center">
                        <h4 class="font-bold text-white text-lg mb-2">100% Proprietário</h4>
                        <p class="text-xs text-zinc-400">Tecnologia desenvolvida internamente, sem dependência de terceiros.</p>
                    </div>
                    <div class="glass-panel p-6 rounded-xl border-t-4 border-t-blue-400 text-center">
                        <h4 class="font-bold text-white text-lg mb-2">Rede Integrada</h4>
                        <p class="text-xs text-zinc-400">Validou uma vez em nossa rede? O usuário não repete o processo.</p>
                    </div>
                    <div class="glass-panel p-6 rounded-xl border-t-4 border-t-green-500 text-center">
                        <h4 class="font-bold text-white text-lg mb-2">Performance Real</h4>
                        <p class="text-xs text-zinc-400">Não somos um custo, somos um multiplicador de performance para seu negócio.</p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="" class="bg-white text-black px-10 py-4 rounded-full font-bold hover:bg-blue-500 hover:text-white transition-all duration-300 shadow-[0_0_20px_rgba(255,255,255,0.1)] hover:shadow-[0_0_40px_rgba(59,130,246,0.4)]">
                        Falar com nossos especialistas
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php include '_footer.php'; ?>
