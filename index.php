<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XClickID - Verificação Invisível</title>
    
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
    <nav id="navbar" class="fixed border border-transparent top-0 w-full z-50 transition-all duration-300 bg-transparent py-6">
        <div class="max-w-7xl mx-auto px-6 md:px-12 flex justify-between items-center">
            <div class="flex items-center gap-2 cursor-pointer group">
            <svg width="179" height="42" viewBox="0 0 179 42" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M84.3428 10.178C85.7057 9.51927 87.5002 10.7913 87.2503 12.3132C87.4093 14.2666 84.4564 15.0844 83.457 13.4716C82.5257 12.3813 83.1162 10.7231 84.3428 10.178Z" fill="white"/>
            <path d="M72.7121 7.01124C73.8251 6.98853 74.9381 6.9431 76.0511 7.05667C76.0511 18.1414 76.0739 29.2261 76.0284 40.3108C74.9381 40.3108 73.8478 40.3109 72.7575 40.3336C72.7121 39.6748 72.6667 38.9934 72.6894 38.3347C72.7121 27.886 72.6667 17.46 72.7121 7.01124Z" fill="white"/>
            <path d="M117.823 7.0113C118.936 6.98858 120.027 6.98858 121.14 7.0113C121.253 18.1187 121.185 29.2262 121.162 40.3336C120.027 40.3563 118.914 40.3563 117.778 40.3336C117.778 29.2262 117.733 18.1187 117.823 7.0113Z" fill="white"/>
            <path d="M51.1331 20.5946C53.3365 18.9137 56.1077 18.0279 58.8788 18.096C61.4002 18.0052 63.9669 18.3004 66.2611 19.4135C67.3968 20.0268 66.8744 21.5032 66.9425 22.5254C64.8982 21.8666 62.922 20.7309 60.7187 20.8218C58.2201 20.6401 55.5398 21.0035 53.5636 22.6617C51.5647 24.1835 50.6334 26.7503 50.6107 29.2262C50.5426 31.6566 51.2694 34.2461 53.1093 35.927C55.1991 37.9032 58.2428 38.4256 61.0367 38.153C63.2173 38.0622 65.1708 36.9719 67.1924 36.2904C67.1469 37.2672 67.5785 38.4937 66.8062 39.266C63.7852 40.8561 60.2417 41.1968 56.8799 40.8334C54.2223 40.3336 51.5647 39.266 49.793 37.1536C47.408 34.5187 46.8628 30.7253 47.3171 27.2954C47.6805 24.6833 49.0207 22.2074 51.1331 20.5946Z" fill="white"/>
            <path d="M99.6062 18.8456C101.878 17.9597 104.354 18.0733 106.739 18.1869C108.329 18.3686 109.919 18.7774 111.395 19.4589C112.508 20.0722 111.963 21.5486 112.054 22.5708C110.032 21.8893 108.056 20.799 105.853 20.8672C103.422 20.7082 100.833 21.0262 98.8793 22.5708C96.676 24.1381 95.6538 26.9093 95.722 29.5669C95.6766 31.9746 96.517 34.5187 98.4023 36.1087C100.878 38.3347 104.49 38.5846 107.624 37.9713C109.283 37.676 110.736 36.7901 112.326 36.2904C112.258 37.3126 112.758 38.7436 111.713 39.4023C108.874 40.7652 105.648 41.174 102.514 40.9015C98.6522 40.4699 94.7225 38.2666 93.2234 34.5187C92.2239 32.4062 92.2239 30.0212 92.3602 27.727C92.7009 23.6611 95.722 20.0267 99.6062 18.8456Z" fill="white"/>
            <path d="M83.0585 18.9592C84.0125 18.4594 85.3073 18.8456 86.4203 18.7547C86.4203 25.9325 86.443 33.1104 86.4203 40.2882C85.2846 40.3109 84.1488 40.3563 83.0131 40.2427C83.0358 33.1558 82.945 26.0461 83.0585 18.9592Z" fill="white"/>
            <path d="M130.68 20.4811C131.293 19.9132 131.747 19.1863 132.474 18.7775C133.792 18.7093 135.109 18.732 136.427 18.8002C135.291 20.5038 133.701 21.8439 132.338 23.3658C130.407 25.3193 128.636 27.4317 126.659 29.3398C127.363 30.5209 128.499 31.3159 129.453 32.27C131.498 34.2688 133.655 36.1541 135.677 38.153C136.336 38.8572 137.222 39.3569 137.653 40.2655C136.29 40.3109 134.905 40.4245 133.542 40.2428C130.748 37.6987 128.022 35.0866 125.296 32.4744C124.229 31.5431 123.184 30.5663 122.207 29.5215C124.933 26.4096 127.909 23.5475 130.68 20.4811Z" fill="white"/>
            <path d="M9.65632 12.0085C10.474 11.0772 11.3145 10.1913 12.2231 9.35089C13.2907 9.9869 14.2674 10.8046 15.2441 11.5542C16.9023 12.8262 18.5604 14.0755 20.2186 15.3248C20.4912 15.5747 20.8773 15.6883 21.1953 15.4384C23.9438 13.4849 26.556 11.3043 29.3045 9.35089C30.3266 10.1459 31.1443 11.1681 32.0302 12.0994C32.3482 12.3947 31.9393 12.7581 31.7803 13.0307C28.305 17.6417 24.7615 22.2301 21.2862 26.8411C21.1045 27.1591 20.5593 27.2046 20.3322 26.932C16.8341 22.3209 13.3588 17.7099 9.83803 13.1215C9.61089 12.8035 9.3156 12.3492 9.65632 12.0085Z" fill="#F2F2F2"/>
            <path d="M14.3355 22.6389C14.5627 22.3664 14.7444 22.0484 15.0397 21.8439C15.4713 21.8666 15.6303 22.3209 15.8801 22.6162C16.9477 24.1381 18.197 25.5237 19.1965 27.1137C17.3339 28.5902 15.3804 29.9303 13.5405 31.4295C13.1771 31.7021 12.8364 32.0201 12.4275 32.2018C12.1095 32.2245 11.9278 31.9065 11.7006 31.7475C10.9511 30.9525 10.0652 30.3165 9.38374 29.476C9.33831 29.1808 9.6336 28.9536 9.74718 28.7264C11.2691 26.6821 12.8364 24.6833 14.3355 22.6389Z" fill="#F2F2F2"/>
            <path d="M25.8745 22.4572C26.079 22.2528 26.3061 21.7758 26.6696 21.9802C27.192 22.5026 27.5781 23.1159 28.0324 23.6838C29.3953 25.5691 30.8945 27.3409 32.2119 29.2716C31.3942 30.2256 30.5765 31.1569 29.6679 32.0201C29.418 32.3381 28.9865 32.1564 28.7366 31.9292C27.0103 30.589 25.2612 29.2716 23.5349 27.9541C23.1488 27.6589 22.8081 27.3181 22.4674 26.932C23.6031 25.4555 24.7615 23.9564 25.8745 22.4572Z" fill="#F2F2F2"/>
            <path d="M2.9328 0.196892C4.81811 0.128748 6.70342 0.015172 8.61145 0.0378867C17.6291 0.0378867 26.6468 0.0151776 35.6645 0.0151776C36.9593 0.0378922 38.3449 -0.166548 39.5487 0.446747C40.7753 1.10547 41.6385 2.49106 41.5249 3.89937C41.5476 15.2112 41.5249 26.5004 41.5703 37.8123C41.6839 39.743 39.9803 41.651 38.0269 41.5602C30.3493 41.5829 22.6718 41.5602 14.9943 41.5829C13.4269 41.7419 11.8596 41.5375 10.315 41.5829C9.11117 41.5148 7.9073 41.7646 6.70342 41.6056C5.38597 41.492 4.04581 41.6965 2.75108 41.492C1.68349 41.1513 0.706765 40.3336 0.320617 39.2433C-0.0882463 38.0849 0.0480371 36.8583 0.0253225 35.6544C0.0253225 25.0694 0.00261345 14.4844 0.00261345 3.89937C-0.0655304 2.17306 1.20649 0.492182 2.9328 0.196892ZM9.65632 12.0085C9.33832 12.3492 9.61089 12.8262 9.86075 13.1215C13.3815 17.7099 16.8568 22.3209 20.3549 26.932C20.582 27.2046 21.1272 27.1818 21.3089 26.8411C24.7842 22.2301 28.305 17.6417 31.8031 13.0306C31.9621 12.7581 32.3709 12.3946 32.0529 12.0994C31.167 11.1681 30.3493 10.1459 29.3272 9.35088C26.556 11.3043 23.9665 13.4849 21.2181 15.4384C20.9228 15.6882 20.5139 15.5747 20.2413 15.3248C18.5832 14.0755 16.925 12.8262 15.2668 11.5542C14.2674 10.8046 13.3134 9.98688 12.2458 9.35088C11.3145 10.1686 10.4513 11.0772 9.65632 12.0085ZM14.3355 22.6389C12.8364 24.6833 11.2691 26.6594 9.74718 28.7037C9.61089 28.9536 9.33831 29.158 9.38374 29.4533C10.0652 30.2937 10.9511 30.9525 11.7006 31.7248C11.9278 31.8838 12.1095 32.2245 12.4275 32.1791C12.8364 31.9973 13.1771 31.6793 13.5405 31.4068C15.4031 29.9303 17.3339 28.5674 19.1965 27.091C18.2197 25.501 16.9477 24.1154 15.8801 22.5935C15.6303 22.3209 15.4713 21.8666 15.0397 21.8212C14.7444 22.0711 14.5627 22.3664 14.3355 22.6389ZM25.8745 22.4572C24.7388 23.9564 23.6031 25.4555 22.4901 26.9547C22.8081 27.3181 23.1488 27.6816 23.5577 27.9769C25.284 29.2943 27.033 30.6117 28.7593 31.9519C29.0092 32.1791 29.4407 32.3608 29.6906 32.0428C30.5992 31.1796 31.4169 30.2483 32.2346 29.2943C30.9172 27.3636 29.418 25.5918 28.0552 23.7065C27.6009 23.1386 27.2147 22.5026 26.6923 22.0029C26.3061 21.7758 26.079 22.2528 25.8745 22.4572Z" fill="#3A7EEE"/>
            <path d="M143.238 40V10.8612H148.742V40H143.238Z" fill="white"/>
            <path d="M154.808 40V10.8612H164.238C164.467 10.8612 164.939 10.8679 165.654 10.8814C166.369 10.8949 167.057 10.9421 167.718 11.0231C170.066 11.3064 172.055 12.1225 173.688 13.4715C175.32 14.8205 176.561 16.5338 177.411 18.6113C178.261 20.6888 178.686 22.9619 178.686 25.4306C178.686 27.8993 178.261 30.1724 177.411 32.2499C176.561 34.3274 175.32 36.0406 173.688 37.3896C172.055 38.7387 170.066 39.5548 167.718 39.8381C167.057 39.9191 166.369 39.9663 165.654 39.9798C164.939 39.9933 164.467 40 164.238 40H154.808ZM160.393 34.8198H164.238C164.602 34.8198 165.094 34.813 165.715 34.7995C166.335 34.7725 166.895 34.7118 167.394 34.6174C168.663 34.3611 169.695 33.7675 170.49 32.8367C171.3 31.9059 171.893 30.7862 172.271 29.4776C172.662 28.1691 172.858 26.8201 172.858 25.4306C172.858 23.9736 172.656 22.5909 172.251 21.2824C171.86 19.9738 171.259 18.8676 170.45 17.9638C169.641 17.0599 168.622 16.4866 167.394 16.2438C166.895 16.1358 166.335 16.0751 165.715 16.0616C165.094 16.0482 164.602 16.0414 164.238 16.0414H160.393V34.8198Z" fill="white"/>
            </svg>
            </div>
            
            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-zinc-400">
                <a href="#overview" class="hover:text-white transition-colors">Visão Geral</a>
                <a href="#methods" class="hover:text-white transition-colors">Métodos de Verificação</a>
                <a href="#compliance" class="hover:text-white transition-colors">LGPD & Segurança</a>
                <a href="#business" class="hover:text-white transition-colors">Para Empresas</a>
            </div>

            <div class="flex items-center gap-4">
                <button class="hidden md:block text-sm font-medium hover:text-white transition-colors">
                    Falar com especialistas
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
                <div class="relative flex justify-center">
                    <!-- Visual representation of the network -->
                    <div class="w-full max-w-md aspect-square relative flex items-center justify-center">
                        <div class="absolute inset-0 bg-blue-600/10 rounded-full blur-[100px] animate-pulse"></div>
                        <div class="relative w-full h-full border border-white/5 rounded-full flex items-center justify-center">
                             <div class="w-3/4 h-3/4 border border-blue-500/20 rounded-full flex items-center justify-center animate-[spin_20s_linear_infinite]">
                                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-4 h-4 bg-blue-500 rounded-full shadow-[0_0_15px_#3b82f6]"></div>
                                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-3 h-3 bg-zinc-700 rounded-full"></div>
                                <div class="absolute left-0 top-1/2 -translate-y-1/2 w-3 h-3 bg-zinc-700 rounded-full"></div>
                                <div class="absolute right-0 top-1/2 -translate-y-1/2 w-3 h-3 bg-zinc-700 rounded-full"></div>
                             </div>
                             <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-24 h-24 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center shadow-2xl">
                                    <i data-lucide="shield-check" class="w-12 h-12 text-white"></i>
                                </div>
                             </div>
                        </div>
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
                    A Inteligência por trás da <span class="text-blue-500">Invisibilidade.</span>
                </h2>
                <p class="text-zinc-400 text-lg">
                    O nosso ecossistema utiliza múltiplos sinais para validar a identidade de forma inteligente. O utilizador só interage quando estritamente necessário, garantindo uma experiência contínua e segura.
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
                        Combina uma selfie ao vivo com um documento oficial com foto (Cartão de Cidadão, Passaporte) para verificação com altíssimo nível de garantia.
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
                    <p class="text-sm text-zinc-400 leading-relaxed">Impacto direto no funil de vendas através da redução drástica de fricção no checkout.</p>
                </div>
                
                <div class="fade-in up delay-100 text-center">
                    <div class="w-14 h-14 mx-auto rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center mb-4 border border-blue-500/20">
                        <i data-lucide="user-minus" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-bold text-white mb-2">Redução de Abandono</h4>
                    <p class="text-sm text-zinc-400 leading-relaxed">Elimine as barreiras que fazem o usuário desistir da compra no momento da validação.</p>
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
                    <button class="bg-white text-black px-10 py-4 rounded-full font-bold hover:bg-blue-500 hover:text-white transition-all duration-300 shadow-[0_0_20px_rgba(255,255,255,0.1)] hover:shadow-[0_0_40px_rgba(59,130,246,0.4)]">
                        Falar com especialistas
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
                    <svg width="179" height="42" viewBox="0 0 179 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M84.3428 10.178C85.7057 9.51927 87.5002 10.7913 87.2503 12.3132C87.4093 14.2666 84.4564 15.0844 83.457 13.4716C82.5257 12.3813 83.1162 10.7231 84.3428 10.178Z" fill="white"/>
                        <path d="M72.7121 7.01124C73.8251 6.98853 74.9381 6.9431 76.0511 7.05667C76.0511 18.1414 76.0739 29.2261 76.0284 40.3108C74.9381 40.3108 73.8478 40.3109 72.7575 40.3336C72.7121 39.6748 72.6667 38.9934 72.6894 38.3347C72.7121 27.886 72.6667 17.46 72.7121 7.01124Z" fill="white"/>
                        <path d="M117.823 7.0113C118.936 6.98858 120.027 6.98858 121.14 7.0113C121.253 18.1187 121.185 29.2262 121.162 40.3336C120.027 40.3563 118.914 40.3563 117.778 40.3336C117.778 29.2262 117.733 18.1187 117.823 7.0113Z" fill="white"/>
                        <path d="M51.1331 20.5946C53.3365 18.9137 56.1077 18.0279 58.8788 18.096C61.4002 18.0052 63.9669 18.3004 66.2611 19.4135C67.3968 20.0268 66.8744 21.5032 66.9425 22.5254C64.8982 21.8666 62.922 20.7309 60.7187 20.8218C58.2201 20.6401 55.5398 21.0035 53.5636 22.6617C51.5647 24.1835 50.6334 26.7503 50.6107 29.2262C50.5426 31.6566 51.2694 34.2461 53.1093 35.927C55.1991 37.9032 58.2428 38.4256 61.0367 38.153C63.2173 38.0622 65.1708 36.9719 67.1924 36.2904C67.1469 37.2672 67.5785 38.4937 66.8062 39.266C63.7852 40.8561 60.2417 41.1968 56.8799 40.8334C54.2223 40.3336 51.5647 39.266 49.793 37.1536C47.408 34.5187 46.8628 30.7253 47.3171 27.2954C47.6805 24.6833 49.0207 22.2074 51.1331 20.5946Z" fill="white"/>
                        <path d="M99.6062 18.8456C101.878 17.9597 104.354 18.0733 106.739 18.1869C108.329 18.3686 109.919 18.7774 111.395 19.4589C112.508 20.0722 111.963 21.5486 112.054 22.5708C110.032 21.8893 108.056 20.799 105.853 20.8672C103.422 20.7082 100.833 21.0262 98.8793 22.5708C96.676 24.1381 95.6538 26.9093 95.722 29.5669C95.6766 31.9746 96.517 34.5187 98.4023 36.1087C100.878 38.3347 104.49 38.5846 107.624 37.9713C109.283 37.676 110.736 36.7901 112.326 36.2904C112.258 37.3126 112.758 38.7436 111.713 39.4023C108.874 40.7652 105.648 41.174 102.514 40.9015C98.6522 40.4699 94.7225 38.2666 93.2234 34.5187C92.2239 32.4062 92.2239 30.0212 92.3602 27.727C92.7009 23.6611 95.722 20.0267 99.6062 18.8456Z" fill="white"/>
                        <path d="M83.0585 18.9592C84.0125 18.4594 85.3073 18.8456 86.4203 18.7547C86.4203 25.9325 86.443 33.1104 86.4203 40.2882C85.2846 40.3109 84.1488 40.3563 83.0131 40.2427C83.0358 33.1558 82.945 26.0461 83.0585 18.9592Z" fill="white"/>
                        <path d="M130.68 20.4811C131.293 19.9132 131.747 19.1863 132.474 18.7775C133.792 18.7093 135.109 18.732 136.427 18.8002C135.291 20.5038 133.701 21.8439 132.338 23.3658C130.407 25.3193 128.636 27.4317 126.659 29.3398C127.363 30.5209 128.499 31.3159 129.453 32.27C131.498 34.2688 133.655 36.1541 135.677 38.153C136.336 38.8572 137.222 39.3569 137.653 40.2655C136.29 40.3109 134.905 40.4245 133.542 40.2428C130.748 37.6987 128.022 35.0866 125.296 32.4744C124.229 31.5431 123.184 30.5663 122.207 29.5215C124.933 26.4096 127.909 23.5475 130.68 20.4811Z" fill="white"/>
                        <path d="M9.65632 12.0085C10.474 11.0772 11.3145 10.1913 12.2231 9.35089C13.2907 9.9869 14.2674 10.8046 15.2441 11.5542C16.9023 12.8262 18.5604 14.0755 20.2186 15.3248C20.4912 15.5747 20.8773 15.6883 21.1953 15.4384C23.9438 13.4849 26.556 11.3043 29.3045 9.35089C30.3266 10.1459 31.1443 11.1681 32.0302 12.0994C32.3482 12.3947 31.9393 12.7581 31.7803 13.0307C28.305 17.6417 24.7615 22.2301 21.2862 26.8411C21.1045 27.1591 20.5593 27.2046 20.3322 26.932C16.8341 22.3209 13.3588 17.7099 9.83803 13.1215C9.61089 12.8035 9.3156 12.3492 9.65632 12.0085Z" fill="#F2F2F2"/>
                        <path d="M14.3355 22.6389C14.5627 22.3664 14.7444 22.0484 15.0397 21.8439C15.4713 21.8666 15.6303 22.3209 15.8801 22.6162C16.9477 24.1381 18.197 25.5237 19.1965 27.1137C17.3339 28.5902 15.3804 29.9303 13.5405 31.4295C13.1771 31.7021 12.8364 32.0201 12.4275 32.2018C12.1095 32.2245 11.9278 31.9065 11.7006 31.7475C10.9511 30.9525 10.0652 30.3165 9.38374 29.476C9.33831 29.1808 9.6336 28.9536 9.74718 28.7264C11.2691 26.6821 12.8364 24.6833 14.3355 22.6389Z" fill="#F2F2F2"/>
                        <path d="M25.8745 22.4572C26.079 22.2528 26.3061 21.7758 26.6696 21.9802C27.192 22.5026 27.5781 23.1159 28.0324 23.6838C29.3953 25.5691 30.8945 27.3409 32.2119 29.2716C31.3942 30.2256 30.5765 31.1569 29.6679 32.0201C29.418 32.3381 28.9865 32.1564 28.7366 31.9292C27.0103 30.589 25.2612 29.2716 23.5349 27.9541C23.1488 27.6589 22.8081 27.3181 22.4674 26.932C23.6031 25.4555 24.7615 23.9564 25.8745 22.4572Z" fill="#F2F2F2"/>
                        <path d="M2.9328 0.196892C4.81811 0.128748 6.70342 0.015172 8.61145 0.0378867C17.6291 0.0378867 26.6468 0.0151776 35.6645 0.0151776C36.9593 0.0378922 38.3449 -0.166548 39.5487 0.446747C40.7753 1.10547 41.6385 2.49106 41.5249 3.89937C41.5476 15.2112 41.5249 26.5004 41.5703 37.8123C41.6839 39.743 39.9803 41.651 38.0269 41.5602C30.3493 41.5829 22.6718 41.5602 14.9943 41.5829C13.4269 41.7419 11.8596 41.5375 10.315 41.5829C9.11117 41.5148 7.9073 41.7646 6.70342 41.6056C5.38597 41.492 4.04581 41.6965 2.75108 41.492C1.68349 41.1513 0.706765 40.3336 0.320617 39.2433C-0.0882463 38.0849 0.0480371 36.8583 0.0253225 35.6544C0.0253225 25.0694 0.00261345 14.4844 0.00261345 3.89937C-0.0655304 2.17306 1.20649 0.492182 2.9328 0.196892ZM9.65632 12.0085C9.33832 12.3492 9.61089 12.8262 9.86075 13.1215C13.3815 17.7099 16.8568 22.3209 20.3549 26.932C20.582 27.2046 21.1272 27.1818 21.3089 26.8411C24.7842 22.2301 28.305 17.6417 31.8031 13.0306C31.9621 12.7581 32.3709 12.3946 32.0529 12.0994C31.167 11.1681 30.3493 10.1459 29.3272 9.35088C26.556 11.3043 23.9665 13.4849 21.2181 15.4384C20.9228 15.6882 20.5139 15.5747 20.2413 15.3248C18.5832 14.0755 16.925 12.8262 15.2668 11.5542C14.2674 10.8046 13.3134 9.98688 12.2458 9.35088C11.3145 10.1686 10.4513 11.0772 9.65632 12.0085ZM14.3355 22.6389C12.8364 24.6833 11.2691 26.6594 9.74718 28.7037C9.61089 28.9536 9.33831 29.158 9.38374 29.4533C10.0652 30.2937 10.9511 30.9525 11.7006 31.7248C11.9278 31.8838 12.1095 32.2245 12.4275 32.1791C12.8364 31.9973 13.1771 31.6793 13.5405 31.4068C15.4031 29.9303 17.3339 28.5674 19.1965 27.091C18.2197 25.501 16.9477 24.1154 15.8801 22.5935C15.6303 22.3209 15.4713 21.8666 15.0397 21.8212C14.7444 22.0711 14.5627 22.3664 14.3355 22.6389ZM25.8745 22.4572C24.7388 23.9564 23.6031 25.4555 22.4901 26.9547C22.8081 27.3181 23.1488 27.6816 23.5577 27.9769C25.284 29.2943 27.033 30.6117 28.7593 31.9519C29.0092 32.1791 29.4407 32.3608 29.6906 32.0428C30.5992 31.1796 31.4169 30.2483 32.2346 29.2943C30.9172 27.3636 29.418 25.5918 28.0552 23.7065C27.6009 23.1386 27.2147 22.5026 26.6923 22.0029C26.3061 21.7758 26.079 22.2528 25.8745 22.4572Z" fill="#3A7EEE"/>
                        <path d="M143.238 40V10.8612H148.742V40H143.238Z" fill="white"/>
                        <path d="M154.808 40V10.8612H164.238C164.467 10.8612 164.939 10.8679 165.654 10.8814C166.369 10.8949 167.057 10.9421 167.718 11.0231C170.066 11.3064 172.055 12.1225 173.688 13.4715C175.32 14.8205 176.561 16.5338 177.411 18.6113C178.261 20.6888 178.686 22.9619 178.686 25.4306C178.686 27.8993 178.261 30.1724 177.411 32.2499C176.561 34.3274 175.32 36.0406 173.688 37.3896C172.055 38.7387 170.066 39.5548 167.718 39.8381C167.057 39.9191 166.369 39.9663 165.654 39.9798C164.939 39.9933 164.467 40 164.238 40H154.808ZM160.393 34.8198H164.238C164.602 34.8198 165.094 34.813 165.715 34.7995C166.335 34.7725 166.895 34.7118 167.394 34.6174C168.663 34.3611 169.695 33.7675 170.49 32.8367C171.3 31.9059 171.893 30.7862 172.271 29.4776C172.662 28.1691 172.858 26.8201 172.858 25.4306C172.858 23.9736 172.656 22.5909 172.251 21.2824C171.86 19.9738 171.259 18.8676 170.45 17.9638C169.641 17.0599 168.622 16.4866 167.394 16.2438C166.895 16.1358 166.335 16.0751 165.715 16.0616C165.094 16.0482 164.602 16.0414 164.238 16.0414H160.393V34.8198Z" fill="white"/>
                    </svg>
                    </div>
                    <p class="text-zinc-500 max-w-sm mb-8">
                        Infraestrutura de verificação inteligente para operações digitais de alta escala. Tecnologia 100% proprietária focada em performance e conformidade.
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
                    <h4 class="font-bold text-white mb-6 uppercase text-sm tracking-wider">Suporte</h4>
                    <ul class="space-y-4 text-zinc-500 text-sm">
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Falar com especialistas</a></li>
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
                <p>© 2026 XClickID, Inc. Todos os direitos reservados.</p>
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