import './bootstrap';

/* ---------------------------------------------------------------------------
 * GASCORP front-end behaviours
 *
 * Livewire owns all interactive state (navigation, filters, forms, counters).
 * This file adds the passive presentation layer only: the hero slideshow,
 * scroll-reveal observation, count-up tweening, the marquee and hash-anchor
 * scrolling after wire:navigate transitions. Everything re-binds on
 * livewire:navigated so the effects survive page transitions.
 * ------------------------------------------------------------------------- */

const prefersReducedMotion = () =>
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

const offsetForStickyHeader = () => {
    const header = document.querySelector('[data-site-header]');
    return header ? header.getBoundingClientRect().height + 12 : 0;
};

/* --- Hero slideshow ------------------------------------------------------ */

let heroSwiper = null;

const initHeroSwiper = () => {
    heroSwiper?.destroy(true, true);
    heroSwiper = null;

    const el = document.querySelector('.hero-swiper');

    if (!el || !window.Swiper) {
        return;
    }

    heroSwiper = new window.Swiper(el, {
        loop: true,
        speed: 900,
        effect: 'fade',
        fadeEffect: { crossFade: true },
        autoplay: {
            delay: 6500,
            disableOnInteraction: false,
        },
        pagination: {
            el: el.querySelector('.swiper-pagination'),
            clickable: true,
        },
        navigation: {
            nextEl: el.querySelector('.swiper-button-next'),
            prevEl: el.querySelector('.swiper-button-prev'),
        },
    });
};

/* --- Scroll reveal ------------------------------------------------------ */

let revealObserver = null;

const revealAll = (root = document) => {
    root.querySelectorAll('[data-reveal]:not([data-reveal="in"])').forEach((el) => {
        el.dataset.reveal = 'in';
    });
};

const initReveal = () => {
    const targets = document.querySelectorAll('[data-reveal]:not([data-reveal="in"])');

    if (!targets.length) {
        return;
    }

    if (prefersReducedMotion() || !('IntersectionObserver' in window)) {
        revealAll();
        return;
    }

    revealObserver?.disconnect();
    revealObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.dataset.reveal = 'in';
                    revealObserver.unobserve(entry.target);
                }
            });
        },
        { rootMargin: '0px 0px -7% 0px', threshold: 0.08 }
    );

    targets.forEach((el) => revealObserver.observe(el));
};

/* --- Count-up figures --------------------------------------------------- */

const easeOutCubic = (t) => 1 - Math.pow(1 - t, 3);

const formatFigure = (value, decimals, pad, prefix, suffix) => {
    let rendered;

    if (decimals > 0) {
        rendered = value.toFixed(decimals);
    } else {
        rendered = String(Math.round(value));
        if (pad > 0) {
            rendered = rendered.padStart(pad, '0');
        }
    }

    return `${prefix}${rendered}${suffix}`;
};

const tweenFigure = (el) => {
    if (el.dataset.counterDone === 'true') {
        return;
    }

    const target = parseFloat(el.dataset.counterTarget || '0');
    const decimals = parseInt(el.dataset.counterDecimals || '0', 10);
    const pad = parseInt(el.dataset.counterPad || '0', 10);
    const prefix = el.dataset.counterPrefix || '';
    const suffix = el.dataset.counterSuffix || '';
    const final = el.dataset.counterFinal || formatFigure(target, decimals, pad, prefix, suffix);

    el.dataset.counterDone = 'true';

    if (prefersReducedMotion()) {
        el.textContent = final;
        return;
    }

    const duration = 1500;
    const start = performance.now();

    const frame = (now) => {
        const progress = Math.min((now - start) / duration, 1);
        el.textContent = formatFigure(target * easeOutCubic(progress), decimals, pad, prefix, suffix);

        if (progress < 1) {
            requestAnimationFrame(frame);
        } else {
            el.textContent = final;
        }
    };

    requestAnimationFrame(frame);
};

let counterObserver = null;

const initCounters = () => {
    // Figures already tweened keep their data-counter-done flag and the trigger
    // attributes are only rendered while the server-side component is unstarted,
    // so a Livewire morph cannot restart an animation mid-flight.
    const counters = document.querySelectorAll('[data-counter]:not([data-counter-done])');

    if (!counters.length) {
        return;
    }

    if (!('IntersectionObserver' in window)) {
        counters.forEach((el) => {
            el.textContent = el.dataset.counterFinal || el.textContent;
        });
        return;
    }

    counterObserver?.disconnect();
    counterObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    tweenFigure(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.4 }
    );

    counters.forEach((el) => counterObserver.observe(el));
};

/* --- Marquee ------------------------------------------------------------ */

const initTickers = () => {
    document.querySelectorAll('[data-ticker]').forEach((ticker) => {
        if (ticker.dataset.tickerReady === 'true') {
            return;
        }

        const track = ticker.querySelector('[data-ticker-track]');

        if (!track) {
            return;
        }

        const clone = track.cloneNode(true);
        clone.setAttribute('aria-hidden', 'true');
        clone.removeAttribute('data-ticker-track');
        ticker.appendChild(clone);
        ticker.dataset.tickerReady = 'true';
    });
};

/* --- Launch countdown ---------------------------------------------------- */

/**
 * Livewire renders an authoritative deadline plus the server's own clock; we
 * tick the display locally from that anchor so a live countdown needs no
 * polling requests and stays correct on devices with a skewed clock.
 */
let countdownTimer = null;

const initCountdowns = () => {
    const blocks = document.querySelectorAll('[data-countdown]');

    if (!blocks.length) {
        window.clearInterval(countdownTimer);
        countdownTimer = null;
        return;
    }

    const anchors = Array.from(blocks).map((block) => {
        const target = parseInt(block.dataset.countdownTarget || '0', 10);
        const server = parseInt(block.dataset.countdownServer || '0', 10);

        return {
            units: {
                days: block.querySelector('[data-countdown-unit="days"]'),
                hours: block.querySelector('[data-countdown-unit="hours"]'),
                minutes: block.querySelector('[data-countdown-unit="minutes"]'),
                seconds: block.querySelector('[data-countdown-unit="seconds"]'),
            },
            // Offset between the server clock and this device's clock.
            skew: server - Date.now(),
            target,
        };
    });

    const pad = (value, length) => String(value).padStart(length, '0');

    const tick = () => {
        const now = Date.now();

        anchors.forEach(({ units, skew, target }) => {
            const remaining = Math.max(0, Math.floor((target - (now + skew)) / 1000));

            if (units.days) units.days.textContent = pad(Math.floor(remaining / 86400), 3);
            if (units.hours) units.hours.textContent = pad(Math.floor((remaining % 86400) / 3600), 2);
            if (units.minutes) units.minutes.textContent = pad(Math.floor((remaining % 3600) / 60), 2);
            if (units.seconds) units.seconds.textContent = pad(remaining % 60, 2);
        });
    };

    tick();

    window.clearInterval(countdownTimer);
    countdownTimer = window.setInterval(tick, 1000);
};

/* --- Hash anchors ------------------------------------------------------- */

/**
 * wire:navigate restores the scroll position on the new page, which fights the
 * browser's hash jump. Re-apply the anchor scroll once the transition settles.
 */
const scrollToHash = () => {
    const hash = window.location.hash;

    if (!hash || hash.length < 2) {
        return;
    }

    let target = null;

    try {
        target = document.getElementById(decodeURIComponent(hash.slice(1)));
    } catch (error) {
        target = null;
    }

    if (!target) {
        return;
    }

    const top = target.getBoundingClientRect().top + window.scrollY - offsetForStickyHeader();

    window.scrollTo({
        top,
        behavior: prefersReducedMotion() ? 'auto' : 'smooth',
    });
};

/* --- Boot --------------------------------------------------------------- */

const boot = () => {
    initHeroSwiper();
    initReveal();
    initCounters();
    initTickers();
    initCountdowns();
};

document.addEventListener('DOMContentLoaded', boot);
document.addEventListener('livewire:navigated', () => {
    boot();
    // Let the new page lay out before resolving the anchor.
    window.requestAnimationFrame(() => window.setTimeout(scrollToHash, 60));
});
window.addEventListener('load', boot);
window.addEventListener('hashchange', scrollToHash);
