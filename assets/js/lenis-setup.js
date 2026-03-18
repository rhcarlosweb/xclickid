/**
 * Lenis Smooth Scroll — driven by GSAP ticker
 */
(function () {
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        gestureDirection: 'vertical',
        smooth: true,
        mouseMultiplier: 1,
        smoothTouch: false,
        touchMultiplier: 2,
        infinite: false,
    });

    // Drive Lenis with GSAP ticker for seamless integration
    if (typeof gsap !== 'undefined') {
        gsap.ticker.add((time) => lenis.raf(time * 1000));
        gsap.ticker.lagSmoothing(0);
    } else {
        (function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        })(0);
    }

    window.lenis = lenis;

    // GSAP smooth scroll for hash anchor links (index page sections)
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
        const onIndex = path === '/' || path.endsWith('/index.php') || path.endsWith('/index');
        const targetsIndex = pagePart === ''
            || pagePart === '/'
            || pagePart === 'index.php'
            || pagePart.endsWith('/index.php')
            || pagePart.endsWith('/index');

        if (onIndex && targetsIndex) {
            const target = document.getElementById(hash);
            if (!target) return;
            e.preventDefault();
            lenis.scrollTo(target, {
                offset: -80,
                duration: 1.4,
                easing: (t) => t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2,
            });
        }
    }, false);
})();
