(function () {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    const glow = document.getElementById('ambient-glow');
    if (glow) {
        window.addEventListener('mousemove', (e) => {
            glow.style.background = `radial-gradient(600px circle at ${e.clientX}px ${e.clientY}px, rgba(59, 130, 246, 0.06), transparent 40%)`;
        });
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
        });
    }

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

    // XClickID Widget Logic
    const xcHash = document.getElementById('xc-hash');
    const xcIp = document.getElementById('xc-ip');
    const xcCountry = document.getElementById('xc-country');

    // Network Visual Parallax
    const networkContainer = document.querySelector('.network-container');
    if (networkContainer) {
        window.addEventListener('mousemove', (e) => {
            const x = (window.innerWidth / 2 - e.clientX) / 50;
            const y = (window.innerHeight / 2 - e.clientY) / 50;
            networkContainer.style.transform = `rotateY(${x}deg) rotateX(${y}deg)`;
        });
    }

    if (xcHash) {
        const randomHash = Math.random().toString(16).substring(2, 6) + '...' + Math.random().toString(16).substring(2, 6);
        xcHash.textContent = randomHash.toUpperCase();
    }

    if (xcIp || xcCountry) {
        // Simulating data loading
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
