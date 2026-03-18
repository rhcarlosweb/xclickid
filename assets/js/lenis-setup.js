/**
 * Lenis Smooth Scroll Configuration
 */
(function () {
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        direction: 'vertical', // vertical, horizontal
        gestureDirection: 'vertical', // vertical, horizontal, both
        smooth: true,
        mouseMultiplier: 1,
        smoothTouch: false,
        touchMultiplier: 2,
        infinite: false,
    });

    // Get scroll value
    lenis.on('scroll', (e) => {
        // ... any additional scroll events
    });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }

    requestAnimationFrame(raf);

    // Make lenis globally accessible if needed
    window.lenis = lenis;

    // Smooth scroll for anchor links on the index page
    document.addEventListener('click', function (e) {
        const link = e.target.closest('a[href]');
        if (!link) return;

        const href = link.getAttribute('href');
        if (!href || !href.includes('#')) return;

        const hashIndex = href.indexOf('#');
        const pagePart = href.slice(0, hashIndex);
        const hash = href.slice(hashIndex + 1);
        if (!hash) return;

        const path = window.location.pathname;
        const onIndex = path === '/' || /\/(index(\.php)?)?$/.test(path);
        const targetsIndex = pagePart === '' || pagePart === '/' || /\/(index(\.php)?)?$/.test(pagePart);

        if (onIndex && targetsIndex) {
            const target = document.getElementById(hash);
            if (!target) return;
            e.preventDefault();
            lenis.scrollTo(target, { offset: -80, duration: 1.2 });
        }
    }, false);
})();
