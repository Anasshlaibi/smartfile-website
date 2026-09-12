import './bootstrap';

/**
 * SmartFilms Prod — Premium Cinematic Motion & Analytics Engine
 */
document.addEventListener('DOMContentLoaded', () => {
    const isReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // =========================================================================
    // 1. HERO SEQUENCED LAYERED REVEAL (Exact Timings: 0ms -> 200ms -> 350ms -> 450ms -> 650ms -> 800ms -> 950ms -> 1200ms)
    // =========================================================================
    const initHeroAnimation = () => {
        const revealImmediately = () => {
            document.querySelectorAll('.hero-eyebrow-target, .hero-h1-line1, .hero-h1-line2, .hero-serif-accent, .hero-copy, .hero-cta-target, .hero-scroll-target, .reveal-line, .reveal-fade-up, .reveal-scale-up').forEach(el => {
                el.classList.add('revealed');
                el.style.opacity = '1';
                el.style.transform = 'none';
            });
        };

        if (isReducedMotion) {
            revealImmediately();
            return;
        }

        // 0ms: Hero video/poster visible by default

        // 200ms: Eyebrow & Badges appear
        setTimeout(() => {
            document.querySelectorAll('.hero-eyebrow-target').forEach(el => {
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            });
        }, 200);

        // 350ms: Headline line 1 reveals (L'IMPACT)
        setTimeout(() => {
            const line1 = document.querySelector('.hero-h1-line1');
            if (line1) line1.classList.add('revealed');
        }, 350);

        // 450ms: Headline line 2 reveals (CINÉMATOGRAPHIQUE)
        setTimeout(() => {
            const line2 = document.querySelector('.hero-h1-line2');
            if (line2) line2.classList.add('revealed');
        }, 450);

        // 650ms: Serif accent reveals (au service des grandes marques)
        setTimeout(() => {
            const serifAccent = document.querySelector('.hero-serif-accent');
            if (serifAccent) serifAccent.classList.add('revealed');
        }, 650);

        // 800ms: Supporting copy fades in
        setTimeout(() => {
            const heroCopy = document.querySelector('.hero-copy');
            if (heroCopy) heroCopy.classList.add('revealed');
        }, 800);

        // 950ms: CTA enters
        setTimeout(() => {
            const cta = document.querySelector('.hero-cta-target');
            if (cta) {
                cta.style.opacity = '1';
                cta.style.transform = 'translateY(0)';
            }
        }, 950);

        // 1200ms: Scroll indicator appears
        setTimeout(() => {
            const scrollIndicator = document.querySelector('.hero-scroll-target');
            if (scrollIndicator) {
                scrollIndicator.style.opacity = '1';
                scrollIndicator.style.transform = 'translateY(0)';
            }
        }, 1200);
    };

    initHeroAnimation();

    // =========================================================================
    // 2. INTERSECTION OBSERVER FOR SECTION REVEALS (HEADINGS, LINES, CARDS)
    // =========================================================================
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -10% 0px',
        threshold: 0.12
    };

    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.reveal-line, .reveal-fade-up, .reveal-left, .reveal-right, .reveal-scale-up').forEach(el => {
        if (isReducedMotion) {
            el.classList.add('revealed');
            el.style.opacity = '1';
            el.style.transform = 'none';
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
