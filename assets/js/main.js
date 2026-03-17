(function () {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    const navbar = document.getElementById('navbar');
    const navContainer = navbar ? navbar.querySelector('.max-w-7xl') : null;
    if (navbar && navContainer) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('glass-panel');
                navbar.classList.remove('bg-transparent');
                navContainer.classList.add('py-3');
                navContainer.classList.remove('py-4', 'md:py-6');
            } else {
                navbar.classList.add('bg-transparent');
                navbar.classList.remove('glass-panel');
                navContainer.classList.add('py-4', 'md:py-6');
                navContainer.classList.remove('py-3');
            }
        }, { passive: true });
    }

    // Interactive Elements
    const glow = document.getElementById('ambient-glow');
    const heroCard = document.getElementById('heroCard');
    const networkContainer = document.querySelector('.network-container');

    if (typeof gsap !== 'undefined') {
        // Optimized Setters
        const setHeroX = heroCard ? gsap.quickSetter(heroCard, "rotateX", "deg") : null;
        const setHeroY = heroCard ? gsap.quickSetter(heroCard, "rotateY", "deg") : null;
        const setNetX = networkContainer ? gsap.quickSetter(networkContainer, "rotateY", "deg") : null;
        const setNetY = networkContainer ? gsap.quickSetter(networkContainer, "rotateX", "deg") : null;

        let lastX = window.innerWidth / 2;
        let lastY = window.innerHeight / 2;
        let ticking = false;

        const updateVisuals = () => {
            const centerX = window.innerWidth / 2;
            const centerY = window.innerHeight / 2;

            // 1. Ambient Glow (Highest performance cost if directly on style)
            if (glow) {
                glow.style.setProperty('--mouse-x', `${lastX}px`);
                glow.style.setProperty('--mouse-y', `${lastY}px`);
            }

            // 2. Hero Card Tilt
            if (setHeroX && setHeroY) {
                // Larger division = subtler, more "weighty" feel
                const hRotateX = (lastY - centerY) / 60; 
                const hRotateY = (centerX - lastX) / 60;
                setHeroX(hRotateX);
                setHeroY(hRotateY);
            }

            // 3. Network Parallax
            if (setNetX && setNetY) {
                const nRotateX = (centerX - lastX) / 50;
                const nRotateY = (centerY - lastY) / 50;
                setNetX(nRotateX);
                setNetY(nRotateY);
            }

            ticking = false;
        };

        window.addEventListener('mousemove', (e) => {
            lastX = e.clientX;
            lastY = e.clientY;

            if (!ticking) {
                requestAnimationFrame(updateVisuals);
                ticking = true;
            }
        }, { passive: true });

        // Hero Card Glow logic (internal to card)
        if (heroCard) {
            heroCard.addEventListener('mousemove', (e) => {
                const rect = heroCard.getBoundingClientRect();
                const x = ((e.clientX - rect.left) / rect.width) * 100;
                const y = ((e.clientY - rect.top) / rect.height) * 100;
                heroCard.style.setProperty('--mouse-x', `${x}%`);
                heroCard.style.setProperty('--mouse-y', `${y}%`);
            }, { passive: true });

            heroCard.addEventListener('mouseenter', () => {
                gsap.to(heroCard, {
                    scale: 1.02,
                    duration: 0.4,
                    ease: "power2.out",
                    overwrite: true
                });
            });

            heroCard.addEventListener('mouseleave', () => {
                gsap.to(heroCard, {
                    scale: 1,
                    duration: 0.6,
                    ease: "power2.inOut",
                    overwrite: true
                });
            });
        }
    }

    // Mobile Menu Logic
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileLinks = document.querySelectorAll('.mobile-link');

    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', () => {
            mobileMenu.classList.add('is-active');
            mobileMenu.classList.remove('translate-x-full');
            document.body.style.overflow = 'hidden';
        });
    }

    const closeMobileMenu = () => {
        if (mobileMenu) {
            mobileMenu.classList.remove('is-active');
            mobileMenu.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.style.overflow = '';
            }, 500);
        }
    };

    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', closeMobileMenu);
    }

    mobileLinks.forEach(link => {
        link.addEventListener('click', closeMobileMenu);
    });

    // Fade In Observer
    const observerOptions = {
        root: null,
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px"
    };

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                obs.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.fade-in').forEach((el) => {
        observer.observe(el);
    });

    // XClickID Widget Simulation
    const xcHash = document.getElementById('xc-hash');
    const xcIp = document.getElementById('xc-ip');
    const xcCountry = document.getElementById('xc-country');

    if (xcHash) {
        const randomHash = Math.random().toString(16).substring(2, 6) + '...' + Math.random().toString(16).substring(2, 6);
        xcHash.textContent = randomHash.toUpperCase();
    }

    if (xcIp || xcCountry) {
        setTimeout(() => {
            fetch('https://ipapi.co/json/')
                .then(res => res.json())
                .then(data => {
                    if (xcIp) xcIp.textContent = data.ip;
                    if (xcCountry) xcCountry.textContent = data.country_code;
                })
                .catch(() => {
                    if (xcIp) xcIp.textContent = '187.12.4.9';
                    if (xcCountry) xcCountry.textContent = 'BR';
                });
        }, 1500);
    }
})();
