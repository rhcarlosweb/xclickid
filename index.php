<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XClickID - Valide seus usuários em segundos!</title>
    
    <!-- Metatags para SEO e Compartilhamento -->
    <meta name="title" content="XClickID | Valide seus usuários em segundos!">
    <meta name="description" content="A infraestrutura de identidade definitiva para conformidade legal. Valide usuários de sites +18 com biometria facial e IA, garantindo segurança jurídica sem fricção.">

    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://xclickid.com/">
    <meta property="og:title" content="XClickID | Valide seus usuários em segundos!">
    <meta property="og:description" content="Adequação total às normas para sites +18. Validação invisível com biometria facial e base de usuários já verificada. Saiba mais!">
    <meta property="og:image" content="https://xclickid.com/assets/img/og-image.jpg"> <!-- Recomenda-se uma imagem de 1200x630px -->
    <meta property="og:site_name" content="XClickID">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://xclickid.com/">
    <meta property="twitter:title" content="XClickID | Valide seus usuários em segundos!">
    <meta property="twitter:description" content="Adequação total às normas para sites +18. Validação invisível com biometria facial e base de usuários já verificada. Saiba mais!">
    <meta property="twitter:image" content="https://xclickid.com/assets/img/og-image.jpg">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    screens: {
                        'xs': '400px',
                    }
                }
            }
        }
    </script>
    
    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Lenis Smooth Scroll -->
    <script src="https://unpkg.com/lenis@1.3.18/dist/lenis.min.js"></script>

    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body class="relative min-h-screen selection:bg-blue-500/30 selection:text-blue-200">

    <!-- Brilho Ambiente Dinâmico acompanhando o mouse -->
    <div id="ambient-glow" class="pointer-events-none fixed inset-0 z-0 transition-opacity duration-300" style="background: radial-gradient(600px circle at 0px 0px, rgba(59, 130, 246, 0.06), transparent 40%);"></div>

    <!-- Navbar -->
    <nav id="navbar" class="fixed border border-transparent top-0 w-full z-50 transition-all duration-300 bg-transparent">
        <div class="max-w-7xl mx-auto px-6 md:px-12 flex justify-between items-center py-4 md:py-6">
            <div class="flex items-center gap-2 cursor-pointer group">
                <svg viewBox="0 0 179 42" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-auto h-7 md:h-10">
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
            
            <div class="hidden lg:flex items-center gap-8 text-sm font-medium text-zinc-400">
                <a href="#overview" class="hover:text-white transition-colors">Visão Geral</a>
                <a href="#methods" class="hover:text-white transition-colors">Métodos</a>
                <a href="#compliance" class="hover:text-white transition-colors">Segurança</a>
                <a href="#business" class="hover:text-white transition-colors">Como Funciona</a>
            </div>

            <div class="flex items-center gap-3 md:gap-4">
                <a href="#" class="bg-white text-black px-4 md:px-5 py-2 md:py-2.5 rounded-full text-xs md:text-sm font-bold hover:bg-blue-500 hover:text-white transition-all duration-300 flex items-center gap-2 group whitespace-nowrap">
                    <span class="hidden xs:inline">Falar com especialistas</span>
                    <span class="xs:hidden">Contato</span>
                    <i data-lucide="arrow-up-right" class="w-3.5 h-3.5 md:w-4 md:h-4 group-hover:rotate-45 transition-transform"></i>
                </a>
                
                <button id="mobile-menu-toggle" class="lg:hidden w-10 h-10 rounded-full glass-panel flex items-center justify-center text-white border border-white/10" aria-label="Menu">
                    <i data-lucide="menu" class="w-5 h-5"></i>
                </button>
            </div>
        </div>

    </nav>

    <!-- Simplified Mobile Menu Overlay -->
    <div id="mobile-menu" class="fixed inset-0 bg-black/95 backdrop-blur-xl z-[100] lg:hidden flex flex-col justify-between p-8 translate-x-full transition-transform duration-500 ease-[cubic-bezier(0.22,1,0.36,1)]">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-2">
                <svg viewBox="0 0 179 42" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-auto h-7 md:h-10">
                    <path d="M84.3428 10.178C85.7057 9.51927 87.5002 10.7913 87.2503 12.3132C87.4093 14.2666 84.4564 15.0844 83.457 13.4716C82.5257 12.3813 83.1162 10.7231 84.3428 10.178Z" fill="white"/>
                    <path d="M72.7121 7.01124C73.8251 6.98853 74.9381 6.9431 76.0511 7.05667C76.0511 18.1414 76.0739 29.2261 76.0284 40.3108C74.9381 40.3108 73.8478 40.3109 72.7575 40.3336C72.7121 39.6748 72.6667 38.9934 72.6894 38.3347C72.7121 27.886 72.6667 17.46 72.7121 7.01124Z" fill="white"/>
                    <path d="M117.823 7.0113C118.936 6.98858 120.027 6.98858 121.14 7.0113C121.253 18.1187 121.185 29.2262 121.162 40.3336C120.027 40.3563 118.914 40.3563 117.778 40.3336C117.778 29.2262 117.733 18.1187 117.823 7.0113Z" fill="white"/>
                    <path d="M51.1331 20.5946C53.3365 18.9137 56.1077 18.0279 58.8788 18.096C61.4002 18.0052 63.9669 18.3004 66.2611 19.4135C67.3968 20.0268 66.8744 21.5032 66.9425 22.5254C64.8982 21.8666 62.922 20.7309 60.7187 20.8218C58.2201 20.6401 55.5398 21.0035 53.5636 22.6617C51.5647 24.1835 50.6334 26.7503 50.6107 29.2262C50.5426 31.6566 51.2694 34.2461 53.1093 35.927C55.1991 37.9032 58.2428 38.4256 61.0367 38.153C63.2173 38.0622 65.1708 36.9719 67.1924 36.2904C67.1469 37.2672 67.5785 38.4937 66.8062 39.266C63.7852 40.8561 60.2417 41.1968 56.8799 40.8334C54.2223 40.3336 51.5647 39.266 49.793 37.1536C47.408 34.5187 46.8628 30.7253 47.3171 27.2954C47.6805 24.6833 49.0207 22.2074 51.1331 20.5946Z" fill="white"/>
                    <path d="M99.6062 18.8456C101.878 17.9597 104.354 18.0733 106.739 18.1869C108.329 18.3686 109.919 18.7774 111.395 19.4589C112.508 20.0722 111.963 21.5486 112.054 22.5708C110.032 21.8893 108.056 20.799 105.853 20.8672C103.422 20.7082 100.833 21.0262 98.8793 22.5708C96.676 24.1381 95.6538 26.9093 95.722 29.5669C95.6766 31.9746 96.517 34.5187 98.4023 36.1087C100.878 38.3347 104.49 38.5846 107.624 37.9713C109.283 37.676 110.736 36.7901 112.326 36.2904C112.258 37.3126 112.758 38.7436 111.713 39.4023C108.874 40.7652 105.648 41.174 102.514 40.9015C98.6522 40.4699 94.7225 38.2666 93.2234 34.5187C92.2239 32.4062 92.2239 30.0212 92.3602 27.727C92.7009 23.6611 95.722 20.0267 99.6062 18.8456Z" fill="white"/>
                    <path d="M83.0585 18.9592C84.0125 18.4594 85.3073 18.8456 86.4203 18.7547C86.4203 25.9325 86.443 33.1104 86.4203 40.2882C85.2846 40.3109 84.1488 40.3563 83.0131 40.2427C83.0358 33.1558 82.945 26.0461 83.0585 18.9592Z" fill="white"/>
                    <path d="M130.68 20.4811C131.293 19.9132 131.747 19.1863 132.474 18.7775C133.792 18.7093 135.109 18.732 136.427 18.8002C135.291 20.5038 133.701 21.8439 132.338 23.3658C130.407 25.3193 128.636 27.4317 126.659 29.3398C127.363 30.5209 128.499 31.3159 129.453 32.27C131.498 34.2688 133.655 36.1541 135.677 38.153C136.336 38.8572 137.222 39.3569 137.653 40.2655C136.29 40.3109 134.905 40.4245 133.542 40.2428C130.748 37.6987 128.022 35.0866 125.296 32.4744C124.229 31.5431 123.184 30.5663 122.207 29.5215C124.933 26.4096 127.909 23.5475 130.68 20.4811Z" fill="white"/>
                    <path d="M9.65632 12.0085C10.474 11.0772 11.3145 10.1913 12.2231 9.35089C13.2907 9.9869 14.2674 10.8046 15.2441 11.5542C16.9023 12.8262 18.5604 14.0755 20.2186 15.3248C20.4912 15.5747 20.8773 15.6883 21.1953 15.4384C23.9438 13.4849 26.556 11.3043 29.3045 9.35089C30.3266 10.1459 31.1443 11.1681 32.0302 12.0994C32.3482 12.3947 31.9393 12.7581 31.7803 13.0307C28.305 17.6417 24.7615 22.2301 21.2862 26.8411C21.1045 27.1591 20.5593 27.2046 20.3322 26.932C16.8341 22.3209 13.3588 17.7099 9.83803 13.1215C9.61089 12.8035 9.3156 12.3492 9.65632 12.0085Z" fill="#F2F2F2"/>
                    <path d="M14.3355 22.6389C14.5627 22.3664 14.7444 22.0484 15.0397 21.8439C15.4713 21.8666 15.6303 22.3209 15.8801 22.6162C16.9477 24.1381 18.197 25.5237 19.1965 27.1137C17.3339 28.5902 15.3804 29.9303 13.5405 31.4295C13.1771 31.7021 12.8364 32.0201 12.4275 32.2018C12.1095 32.2245 11.7006 31.7475C10.9511 30.9525 10.0652 30.3165 9.38374 29.476C9.33831 29.1808 9.6336 28.9536 9.74718 28.7264C11.2691 26.6821 12.8364 24.6833 14.3355 22.6389Z" fill="#F2F2F2"/>
                    <path d="M25.8745 22.4572C26.079 22.2528 26.3061 21.7758 26.6696 21.9802C27.192 22.5026 27.5781 23.1159 28.0324 23.6838C29.3953 25.5691 30.8945 27.3409 32.2119 29.2716C31.3942 30.2256 30.5765 31.1569 29.6679 32.0201C29.418 32.3381 28.9865 32.1564 28.7366 31.9292C27.0103 30.589 25.2612 29.2716 23.5349 27.9541C23.1488 27.6589 22.8081 27.3181 22.4674 26.932C23.6031 25.4555 24.7615 23.9564 25.8745 22.4572Z" fill="#F2F2F2"/>
                    <path d="M2.9328 0.196892C4.81811 0.128748 6.70342 0.015172 8.61145 0.0378867C17.6291 0.0378867 26.6468 0.0151776 35.6645 0.0151776C36.9593 0.0378922 38.3449 -0.166548 39.5487 0.446747C40.7753 1.10547 41.6385 2.49106 41.5249 3.89937C41.5476 15.2112 41.5249 26.5004 41.5703 37.8123C41.6839 39.743 39.9803 41.651 38.0269 41.5602C30.3493 41.5829 22.6718 41.5602 14.9943 41.5829C13.4269 41.7419 11.8596 41.5375 10.315 41.5829C9.11117 41.5148 7.9073 41.7646 6.70342 41.6056C5.38597 41.492 4.04581 41.6965 2.75108 41.492C1.68349 41.1513 0.706765 40.3336 0.320617 39.2433C-0.0882463 38.0849 0.0480371 36.8583 0.0253225 35.6544C0.0253225 25.0694 0.00261345 14.4844 0.00261345 3.89937C-0.0655304 2.17306 1.20649 0.492182 2.9328 0.196892ZM9.65632 12.0085C9.33832 12.3492 9.61089 12.8262 9.86075 13.1215C13.3815 17.7099 16.8568 22.3209 20.3549 26.932C20.582 27.2046 21.1272 27.1818 21.3089 26.8411C24.7842 22.2301 28.305 17.6417 31.8031 13.0306C31.9621 12.7581 32.3709 12.3946 32.0529 12.0994C31.167 11.1681 30.3493 10.1459 29.3272 9.35088C26.556 11.3043 23.9665 13.4849 21.2181 15.4384C20.9228 15.6882 20.5139 15.5747 20.2413 15.3248C18.5832 14.0755 16.925 12.8262 15.2668 11.5542C14.2674 10.8046 13.3134 9.98688 12.2458 9.35088C11.3145 10.1686 10.4513 11.0772 9.65632 12.0085ZM14.3355 22.6389C12.8364 24.6833 11.2691 26.6594 9.74718 28.7037C9.61089 28.9536 9.33831 29.158 9.38374 29.4533C10.0652 30.2937 10.9511 30.9525 11.7006 31.7248C11.9278 31.8838 12.1095 32.2245 12.4275 32.1791C12.8364 31.9973 13.1771 31.6793 13.5405 31.4068C15.4031 29.9303 17.3339 28.5674 19.1965 27.091C18.2197 25.501 16.9477 24.1154 15.8801 22.5935C15.6303 22.3209 15.4713 21.8666 15.0397 21.8212C14.7444 22.0711 14.5627 22.3664 14.3355 22.6389ZM25.8745 22.4572C24.7388 23.9564 23.6031 25.4555 22.4901 26.9547C22.8081 27.3181 23.1488 27.6816 23.5577 27.9769C25.284 29.2943 27.033 30.6117 28.7593 31.9519C29.0092 32.1791 29.4407 32.3608 29.6906 32.0428C30.5992 31.1796 31.4169 30.2483 32.2346 29.2943C30.9172 27.3636 29.418 25.5918 28.0552 23.7065C27.6009 23.1386 27.2147 22.5026 26.6923 22.0029C26.3061 21.7758 26.079 22.2528 25.8745 22.4572Z" fill="#3A7EEE"/>
                    <path d="M143.238 40V10.8612H148.742V40H143.238Z" fill="white"/>
                    <path d="M154.808 40V10.8612H164.238C164.467 10.8612 164.939 10.8679 165.654 10.8814C166.369 10.8949 167.057 10.9421 167.718 11.0231C170.066 11.3064 172.055 12.1225 173.688 13.4715C175.32 14.8205 176.561 16.5338 177.411 18.6113C178.261 20.6888 178.686 22.9619 178.686 25.4306C178.686 27.8993 178.261 30.1724 177.411 32.2499C176.561 34.3274 175.32 36.0406 173.688 37.3896C172.055 38.7387 170.066 39.5548 167.718 39.8381C167.057 39.9191 166.369 39.9663 165.654 39.9798C164.939 39.9933 164.467 40 164.238 40H154.808ZM160.393 34.8198H164.238C164.602 34.8198 165.094 34.813 165.715 34.7995C166.335 34.7725 166.895 34.7118 167.394 34.6174C168.663 34.3611 169.695 33.7675 170.49 32.8367C171.3 31.9059 171.893 30.7862 172.271 29.4776C172.662 28.1691 172.858 26.8201 172.858 25.4306C172.858 23.9736 172.656 22.5909 172.251 21.2824C171.86 19.9738 171.259 18.8676 170.45 17.9638C169.641 17.0599 168.622 16.4866 167.394 16.2438C166.895 16.1358 166.335 16.0751 165.715 16.0616C165.094 16.0482 164.602 16.0414 164.238 16.0414H160.393V34.8198Z" fill="white"/>
                </svg>
            </div>
            <button id="mobile-menu-close" class="w-10 h-10 rounded-full glass-panel flex items-center justify-center text-white border border-white/10">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
        
        <div class="flex flex-col gap-6 text-4xl font-bold tracking-tighter text-white py-12">
            <div class="mobile-link-wrapper">
                <a href="#overview" class="mobile-link">Visão Geral</a>
            </div>
            <div class="mobile-link-wrapper">
                <a href="#methods" class="mobile-link">Métodos</a>
            </div>
            <div class="mobile-link-wrapper">
                <a href="#compliance" class="mobile-link">Segurança</a>
            </div>
            <div class="mobile-link-wrapper">
                <a href="#business" class="mobile-link">Como Funciona</a>
            </div>
        </div>
        
        <div class="mobile-menu-footer pt-8 border-t border-white/5">
            <a href="#" class="bg-white text-black w-full py-4 rounded-full font-bold text-center block hover:bg-blue-500 hover:text-white transition-all">
                Falar com Especialistas
            </a>
        </div>
    </div>

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
                    <div class="network-container w-full max-w-sm md:max-w-lg transition-transform duration-200 ease-out">
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

    <!-- Footer -->
    <footer class="pt-24 pb-12 border-t border-white/10 relative z-10 bg-[#020202]">
        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-12 mb-20">
                <div class="col-span-2 lg:col-span-2">
                    <div class="flex items-center gap-2 mb-6">
                        <svg viewBox="0 0 179 42" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-auto h-8 md:h-10">
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
                </div>
                
                <div>
                    <h4 class="font-bold text-white mb-6 uppercase text-sm tracking-wider">Institucional</h4>
                    <ul class="space-y-4 text-zinc-500 text-sm">
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Sobre Nós</a></li>
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Confiança e Segurança</a></li>
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Entre em contato</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white mb-6 uppercase text-sm tracking-wider">Suporte</h4>
                    <ul class="space-y-4 text-zinc-500 text-sm">
                        <li><a href="#" class="hover:text-blue-500 transition-colors">Falar com nossos especialistas</a></li>
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
                        <li><a href="#" class="hover:text-blue-500 transition-colors">T&C para Usuários</a></li>
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

    <!-- XClickID Verification Seal Example -->
    <div class="xclick-wrapper fixed bottom-8 right-8 z-[1000] group" id="xclickWidget">
        <!-- Tooltip Card -->
        <div class="xclick-card absolute bottom-full right-0 mb-4 w-64 glass-panel p-5 rounded-2xl border border-white/10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 translate-y-2 group-hover:translate-y-0 shadow-2xl">
            <div class="flex items-center justify-between mb-4">
                <div class="flex flex-col">
                    <span class="text-white font-bold text-sm tracking-tight">XClickID</span>
                    <span class="text-[10px] text-zinc-500 uppercase tracking-widest font-semibold">Selo de Identidade</span>
                </div>
                <div class="bg-blue-500/10 text-blue-400 border border-blue-500/20 px-2 py-0.5 rounded text-[10px] font-bold">18+</div>
            </div>

            <div class="space-y-3">
                <div class="flex justify-between items-center text-[11px]">
                    <span class="text-zinc-500">Status</span>
                    <div class="flex items-center gap-1.5">
                        <div class="w-1.5 h-1.5 rounded-full bg-green-500 shadow-[0_0_8px_rgba(34,197,94,0.6)] animate-pulse"></div>
                        <span class="font-bold text-green-400">APROVADO</span>
                    </div>
                </div>

                <!-- Session ID -->
                <div class="flex justify-between items-center text-[11px]">
                    <span class="text-zinc-500">Sessão</span>
                    <span class="font-mono text-zinc-400" id="xc-hash">6c9f...a2e1</span>
                </div>

                <!-- Localização & IP (Compacto) -->
                <div class="flex justify-between items-center border-t border-white/5 pt-3 mt-3 text-[11px]">
                    <span class="text-zinc-500">Origem</span>
                    <div class="text-right">
                        <div class="flex items-center gap-2 justify-end">
                            <span id="xc-country" class="text-white font-medium">--</span>
                            <span class="text-zinc-700">/</span>
                            <span id="xc-ip" class="text-zinc-400 font-mono flex items-center gap-1">
                                <span class="xc-spinner w-2 h-2 border-t-2 border-blue-500 rounded-full animate-spin"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shield Icon -->
        <div class="shield-container cursor-pointer hover:scale-110 transition-transform duration-300 drop-shadow-[0_0_15px_rgba(59,130,246,0.2)]">
            <svg width="40" height="46" viewBox="0 0 32 37" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-10 h-auto">
                <path d="M8.01369 29.4334L15.7697 34.9734L23.5258 29.4334C27.9934 26.2423 30.6447 21.0901 30.6447 15.6V7.34845L15.7697 0.97345L0.894745 7.34845V15.6C0.894745 21.0901 3.54617 26.2423 8.01369 29.4334Z" fill="url(#paint0_linear_widget)" stroke="url(#paint1_linear_widget)" stroke-width="1.78947"/>
                <path d="M29.862 7.6424V15.6004C29.8618 20.9459 27.2802 25.9621 22.9303 29.0692L15.4342 34.4227L7.93814 29.0692C3.58839 25.9621 1.00665 20.9459 1.0065 15.6004V7.6424L15.4342 1.45978L29.862 7.6424Z" stroke="url(#paint2_linear_widget)" stroke-width="0.894737"/>
                <path d="M11.8832 16.9031C12.1259 16.9159 12.2821 17.0551 12.3842 17.1805C12.4338 17.2413 12.4778 17.3076 12.5131 17.3602L12.6118 17.4969L12.6254 17.5145C12.9703 18.0061 13.3439 18.4749 13.7202 18.9598C14.0944 19.442 14.469 19.9379 14.8032 20.4695L14.9223 20.659L14.7475 20.7986C14.134 21.2849 13.5057 21.7488 12.8842 22.2108C12.2615 22.6736 11.6447 23.1351 11.0473 23.6219L11.0395 23.6277L10.8891 23.4276L11.0385 23.6277C10.8308 23.7835 10.5641 24.0277 10.2621 24.1619L10.2221 24.1795L10.1782 24.1824C9.97658 24.1968 9.83033 24.099 9.73773 24.0203C9.69295 23.9823 9.64882 23.938 9.61859 23.909C9.58414 23.8759 9.56139 23.8546 9.54144 23.8406L9.51996 23.826L9.50238 23.8074C9.26567 23.5564 9.00844 23.3309 8.74164 23.0887C8.47862 22.8499 8.20907 22.5975 7.97308 22.3065L7.93109 22.2537L7.92035 22.1873C7.89062 21.9941 7.97752 21.8402 8.04047 21.7469C8.07154 21.7008 8.10941 21.6527 8.13226 21.6219C8.15944 21.5853 8.174 21.5628 8.18207 21.5467L8.19183 21.5272L8.20453 21.5086C9.20896 20.1594 10.2236 18.8668 11.2075 17.5252L11.2123 17.5184L11.2172 17.5125C11.25 17.4732 11.2819 17.431 11.3168 17.3846C11.3506 17.3396 11.3882 17.289 11.4272 17.2401C11.5056 17.1415 11.6019 17.0344 11.728 16.9471L11.7983 16.8983L11.8832 16.9031ZM19.2602 16.9725C19.3478 16.9503 19.4371 16.9551 19.5229 16.9852L19.6069 17.0242L19.6371 17.0408L19.6616 17.0652C19.8447 17.2484 20.0016 17.445 20.1469 17.6375L20.5717 18.201L20.5795 18.2108C21.0226 18.8237 21.4874 19.4182 21.9536 20.0223C22.4185 20.6249 22.8841 21.2354 23.3198 21.8738L23.4272 22.032L23.3032 22.1776C22.7673 22.8027 22.2244 23.4213 21.6196 23.9959L21.6186 23.9949C21.4669 24.1659 21.2645 24.1981 21.0932 24.1639C20.9327 24.1317 20.7881 24.043 20.684 23.952C20.1197 23.5139 19.5519 23.0798 18.9838 22.6473L17.2807 21.3514C17.0105 21.1447 16.7746 20.9091 16.5453 20.6492L16.4096 20.494L16.5356 20.3309C17.2796 19.3637 18.0362 18.3843 18.7631 17.4051L18.7739 17.3904L18.7875 17.3768C18.808 17.3562 18.8312 17.3264 18.8725 17.2742C18.9084 17.2289 18.9573 17.1682 19.0141 17.1151C19.0708 17.0622 19.153 16.9997 19.2602 16.9725ZM21.3627 8.77618C22.0515 9.31192 22.6153 10.0117 23.1752 10.6004H23.1733C23.2616 10.6866 23.3148 10.7924 23.3207 10.9119C23.3263 11.0259 23.2887 11.1256 23.2524 11.1971C23.2157 11.2692 23.1676 11.3353 23.1313 11.3856C23.0899 11.4428 23.0644 11.4777 23.0463 11.5086L23.0385 11.5213L23.0297 11.533C22.4607 12.288 21.889 13.0422 21.3159 13.7957L17.8725 18.3133C17.2997 19.0664 16.7282 19.8197 16.1596 20.574C16.0457 20.7497 15.8519 20.8319 15.6811 20.8475C15.5029 20.8636 15.2848 20.8135 15.143 20.6434L15.1362 20.6346C12.8455 17.6151 10.5714 14.5976 8.26703 11.5945L8.26117 11.5877C8.18838 11.4858 8.07927 11.3285 8.02679 11.1561C7.97059 10.9714 7.97484 10.7418 8.15961 10.5486H8.15863C8.69811 9.93425 9.25419 9.34734 9.85687 8.78986L9.99359 8.6629L10.1547 8.75861C10.8702 9.18491 11.529 9.73589 12.1567 10.2176L13.7836 11.4568L15.4116 12.6844L15.4213 12.6922L15.4301 12.7C15.4921 12.7568 15.5572 12.7887 15.6108 12.7977C15.6577 12.8055 15.7006 12.7977 15.7455 12.7625L15.7553 12.7547C16.6502 12.1186 17.5239 11.4454 18.4018 10.7684C19.2785 10.0923 20.1605 9.4121 21.0649 8.76935L21.2162 8.66193L21.3627 8.77618Z" fill="url(#paint3_linear_widget)" stroke="#4A4A4A" stroke-width="0.5"/>
                <defs>
                    <linearGradient id="paint0_linear_widget" x1="19.5724" y1="-1.71076" x2="9.2829" y2="38.105" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#0F0F0F"/>
                        <stop offset="1" stop-color="#050505"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_widget" x1="30.7566" y1="0.97345" x2="1.23028" y2="34.9735" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#3B82F6"/>
                        <stop offset="1" stop-color="#1D4ED8"/>
                    </linearGradient>
                    <linearGradient id="paint2_linear_widget" x1="30.4211" y1="0.97345" x2="0.894766" y2="34.9735" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#60A5FA"/>
                        <stop offset="1" stop-color="#3B82F6"/>
                    </linearGradient>
                    <linearGradient id="paint3_linear_widget" x1="15.6387" y1="8.97345" x2="15.6387" y2="23.9343" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#8C8C8C"/>
                        <stop offset="0.220268" stop-color="#C4C4C4"/>
                        <stop offset="0.454403" stop-color="#E3E3E3"/>
                        <stop offset="0.841346" stop-color="#F2F2F2"/>
                        <stop offset="0.995192" stop-color="#BEBEBE"/>
                    </linearGradient>
                </defs>
            </svg>
        </div>
    </div>

    <script src="assets/js/lenis-setup.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>