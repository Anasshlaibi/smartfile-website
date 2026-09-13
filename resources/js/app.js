import './bootstrap';

/**
 * SmartFilms Prod — Awwwards-Tier Motion & Scroll Animation Engine
 */
document.addEventListener('DOMContentLoaded', () => {
    const isReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // =========================================================================
    // 1. HERO SEQUENTIAL LAYERED CINEMATIC ENTRANCE
    // =========================================================================
    const initHeroAnimation = () => {
        const eyebrow = document.querySelector('.hero-eyebrow');
        const serif = document.querySelector('.hero-serif');
        const line1 = document.querySelector('.hero-title-line1');
        const line2 = document.querySelector('.hero-title-line2');
        const desc = document.querySelector('.hero-desc');
        const cta = document.querySelector('.hero-cta');

        if (isReducedMotion) {
            [eyebrow, serif, line1, line2, desc, cta].forEach(el => {
                if (el) el.classList.add('revealed');
            });
            document.querySelectorAll('.reveal-line, .reveal-fade-up, .reveal-left, .reveal-right, .reveal-scale-up').forEach(el => {
                el.classList.add('revealed');
            });
            return;
        }

        // 150ms: Eyebrow / Tag
        setTimeout(() => {
            if (eyebrow) eyebrow.classList.add('revealed');
        }, 150);

        // 250ms: "agence de" (Serif Italic)
        setTimeout(() => {
            if (serif) serif.classList.add('revealed');
        }, 250);

        // 350ms: "PRODUCTION"
        setTimeout(() => {
            if (line1) line1.classList.add('revealed');
        }, 350);

        // 450ms: "AUDIOVISUELLE"
        setTimeout(() => {
            if (line2) line2.classList.add('revealed');
        }, 450);

        // 700ms: Supporting description
        setTimeout(() => {
            if (desc) desc.classList.add('revealed');
        }, 700);

        // 850ms: Primary CTA button
        setTimeout(() => {
            if (cta) cta.classList.add('revealed');
        }, 850);
    };

    initHeroAnimation();

    // =========================================================================
    // 2. NAVBAR SCROLL PROGRESSIVE TRANSITION (Threshold ~60px)
    // =========================================================================
    const headerEl = document.getElementById('mainHeader');
    if (headerEl) {
        let isScrolled = false;
        const handleScroll = () => {
            const shouldScroll = window.scrollY > 60;
            if (shouldScroll !== isScrolled) {
                isScrolled = shouldScroll;
                if (isScrolled) {
                    headerEl.classList.add('is-scrolled', 'scrolled');
                } else {
                    headerEl.classList.remove('is-scrolled', 'scrolled');
                }
            }
        };

        window.addEventListener('scroll', handleScroll, { passive: true });
        handleScroll(); // Initial check on load/refresh
    }

    // =========================================================================
    // 3. INTERSECTION OBSERVER FOR SECTION REVEALS
    // =========================================================================
    const revealElements = document.querySelectorAll('.reveal-line, .reveal-fade-up, .reveal-left, .reveal-right, .reveal-scale-up');
    
    if ('IntersectionObserver' in window && !isReducedMotion) {
        const observerOptions = {
            root: null,
            rootMargin: '0px 0px -40px 0px',
            threshold: 0.1
        };

        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        revealElements.forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight - 50 && rect.bottom > 0) {
                el.classList.add('revealed');
            } else {
                revealObserver.observe(el);
            }
        });
    } else {
        revealElements.forEach(el => el.classList.add('revealed'));
    }

    // =========================================================================
    // 4. ANALYTICS EVENT TRACKING HELPER
    // =========================================================================
    window.trackEvent = (eventName, params = {}) => {
        try {
            if (typeof gtag === 'function') {
                gtag('event', eventName, params);
            }
            if (window.dataLayer && Array.isArray(window.dataLayer)) {
                window.dataLayer.push({ event: eventName, ...params });
            }
        } catch (e) {
            // silent catch
        }
    };

    // Track Outbound Conversion Clicks
    document.querySelectorAll('a[href^="https://wa.me/"]').forEach(btn => {
        btn.addEventListener('click', () => {
            window.trackEvent('whatsapp_click', { location: btn.getAttribute('data-location') || 'floating_button' });
        });
    });

    document.querySelectorAll('a[href^="tel:"]').forEach(btn => {
        btn.addEventListener('click', () => {
            window.trackEvent('phone_click', { phone: btn.getAttribute('href') });
        });
    });
});
