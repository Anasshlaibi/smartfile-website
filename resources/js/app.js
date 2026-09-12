import './bootstrap';

/**
 * SmartFilms Prod — Premium Cinematic Motion & Analytics Engine
 */
document.addEventListener('DOMContentLoaded', () => {
    const isReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // =========================================================================
    // 1. HERO SEQUENCED LAYERED REVEAL (1.2s Sequence)
    // =========================================================================
    const initHeroAnimation = () => {
        if (isReducedMotion) {
            document.querySelectorAll('.hero-badge-init, .reveal-line, .hero-btn-init').forEach(el => {
                el.classList.add('revealed');
            });
            return;
        }

        setTimeout(() => {
            document.querySelectorAll('#hero .hero-badge-init').forEach(el => el.classList.add('revealed'));
        }, 150);

        setTimeout(() => {
            const line1 = document.querySelector('#hero .hero-line-1');
            if (line1) line1.classList.add('revealed');
        }, 320);

        setTimeout(() => {
            const line2 = document.querySelector('#hero .hero-line-2');
            if (line2) line2.classList.add('revealed');
        }, 440);

        setTimeout(() => {
            const serifLine = document.querySelector('#hero .hero-serif');
            if (serifLine) serifLine.classList.add('revealed');
        }, 580);

        setTimeout(() => {
            const heroDesc = document.querySelector('#hero .hero-desc');
            if (heroDesc) heroDesc.classList.add('revealed');
        }, 720);

        setTimeout(() => {
            document.querySelectorAll('#hero .hero-btn-init').forEach(el => el.classList.add('revealed'));
        }, 900);
    };

    initHeroAnimation();

    // =========================================================================
    // 2. INTERSECTION OBSERVER FOR SECTION REVEALS (HEADINGS, LINES, CARDS)
    // =========================================================================
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -12% 0px',
        threshold: 0.15
    };

    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.reveal-line, .reveal-fade-up').forEach(el => {
        if (isReducedMotion) {
            el.classList.add('revealed');
        } else {
            revealObserver.observe(el);
        }
    });

    // =========================================================================
    // 3. ANALYTICS EVENT TRACKING HELPER
    // =========================================================================
    window.trackEvent = (eventName, params = {}) => {
        try {
            if (typeof gtag === 'function') {
                gtag('event', eventName, params);
            }
            if (window.dataLayer && Array.isArray(window.dataLayer)) {
                window.dataLayer.push({ event: eventName, ...params });
            }
            // console.log(`[SmartFilms Analytics] ${eventName}:`, params);
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
