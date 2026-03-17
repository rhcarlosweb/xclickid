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
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('glass-panel', 'py-4');
                navbar.classList.remove('bg-transparent', 'py-6');
            } else {
                navbar.classList.add('bg-transparent', 'py-6');
                navbar.classList.remove('glass-panel', 'py-4');
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
})();
