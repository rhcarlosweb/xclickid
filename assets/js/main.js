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

    // ===================== CONTACT MODAL =====================

    const contactModal        = document.getElementById('contact-modal');
    const contactModalClose   = document.getElementById('contact-modal-close');
    const contactModalOverlay = document.getElementById('contact-modal-overlay');

    const openContactModal = () => {
        if (!contactModal) return;
        contactModal.classList.remove('hidden');
        contactModal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    };

    const closeContactModal = () => {
        if (!contactModal) return;
        contactModal.classList.add('hidden');
        contactModal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    };

    document.querySelectorAll('[data-open-modal="contact"]').forEach(el => {
        el.addEventListener('click', e => { e.preventDefault(); openContactModal(); });
    });

    if (contactModalClose)   contactModalClose.addEventListener('click', closeContactModal);
    if (contactModalOverlay) contactModalOverlay.addEventListener('click', closeContactModal);

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeContactModal();
    });

    // ===================== CONTACT FORMS (modal + inline) =====================

    const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const MAX_SITES  = 10;

    document.querySelectorAll('.contact-form').forEach(form => {
        const isModal     = form.id === 'contact-form-modal';
        const sitesList   = form.querySelector('.contact-sites-list');
        const addSiteBtn  = form.querySelector('.contact-add-site');
        const formBody    = form.querySelector('.contact-form-body');
        const successEl   = form.querySelector('.contact-success');
        const errorEl     = form.querySelector('.contact-error');
        const submitBtn   = form.querySelector('.contact-submit');
        const submitText  = form.querySelector('.contact-submit-text');

        // Repeater: add site row
        if (addSiteBtn && sitesList) {
            addSiteBtn.addEventListener('click', () => {
                const rows = sitesList.querySelectorAll('.contact-site-row');
                if (rows.length >= MAX_SITES) return;

                const newRow = rows[0].cloneNode(true);
                const input  = newRow.querySelector('input');
                input.value  = '';
                input.classList.remove('border-red-500');

                const removeBtn = document.createElement('button');
                removeBtn.type      = 'button';
                removeBtn.className = 'flex-shrink-0 w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-zinc-500 hover:text-red-400 hover:bg-red-400/10 transition-colors';
                removeBtn.setAttribute('aria-label', 'Remover site');
                removeBtn.innerHTML = '<i data-lucide="x" class="w-4 h-4"></i>';
                removeBtn.addEventListener('click', () => {
                    newRow.remove();
                    if (typeof lucide !== 'undefined') lucide.createIcons();
                });
                newRow.appendChild(removeBtn);

                sitesList.appendChild(newRow);
                if (typeof lucide !== 'undefined') lucide.createIcons();
            });
        }

        // Form submission
        form.addEventListener('submit', async e => {
            e.preventDefault();

            const nameEl    = form.querySelector('[name="name"]');
            const emailEl   = form.querySelector('[name="email"]');
            const phoneEl   = form.querySelector('[name="phone"]');
            const siteInputs = form.querySelectorAll('[name="sites[]"]');

            // Reset validation state
            form.querySelectorAll('.contact-field').forEach(f => f.classList.remove('border-red-500'));
            if (errorEl) { errorEl.classList.add('hidden'); errorEl.textContent = ''; }

            let valid = true;

            if (!nameEl.value.trim() || nameEl.value.trim().length < 2) {
                nameEl.classList.add('border-red-500'); valid = false;
            }
            if (!emailEl.value.trim() || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailEl.value.trim())) {
                emailEl.classList.add('border-red-500'); valid = false;
            }
            if (!phoneEl.value.trim()) {
                phoneEl.classList.add('border-red-500'); valid = false;
            }
            siteInputs.forEach(input => {
                if (!input.value.trim() || !/^https?:\/\/.+/.test(input.value.trim())) {
                    input.classList.add('border-red-500'); valid = false;
                }
            });

            if (!valid) {
                if (errorEl) {
                    errorEl.classList.remove('hidden');
                    errorEl.textContent = 'Por favor, corrija os campos destacados.';
                }
                return;
            }

            // Disable submit
            if (submitBtn)  submitBtn.disabled = true;
            if (submitText) submitText.textContent = 'Enviando...';

            try {
                const res = await fetch('/save-contato.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': CSRF_TOKEN
                    },
                    body: JSON.stringify({
                        name:  nameEl.value.trim(),
                        email: emailEl.value.trim(),
                        phone: phoneEl.value.trim(),
                        sites: Array.from(siteInputs).map(i => i.value.trim())
                    })
                });

                const data = await res.json();

                if (res.ok) {
                    // Show success state
                    if (formBody)  formBody.classList.add('hidden');
                    if (successEl) {
                        successEl.classList.remove('hidden');
                        if (typeof lucide !== 'undefined') lucide.createIcons();
                    }
                    // Auto-close modal after 3s; inline form stays open showing success
                    if (isModal) setTimeout(closeContactModal, 3000);
                } else {
                    if (errorEl) {
                        errorEl.classList.remove('hidden');
                        errorEl.textContent = data.error || 'Erro ao enviar. Tente novamente.';
                    }
                    if (submitBtn)  submitBtn.disabled = false;
                    if (submitText) submitText.textContent = 'Enviar mensagem';
                }
            } catch {
                if (errorEl) {
                    errorEl.classList.remove('hidden');
                    errorEl.textContent = 'Erro de conexão. Tente novamente.';
                }
                if (submitBtn)  submitBtn.disabled = false;
                if (submitText) submitText.textContent = 'Enviar mensagem';
            }
        });
    });

    // ==================== /CONTACT FORMS ====================
})();
