import './bootstrap';

if (document.querySelector('.hero-swiper') && window.Swiper) {
    const swiper = new Swiper(".hero-swiper", {
        loop: true,
        speed: 1000,
        effect: "fade",
        fadeEffect: {
            crossFade: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('[data-mobile-menu-toggle]');
    const menu = document.querySelector('[data-mobile-menu]');

    if (!toggle || !menu) {
        return;
    }

    toggle.addEventListener('click', () => {
        const isOpen = toggle.getAttribute('aria-expanded') === 'true';
        toggle.setAttribute('aria-expanded', String(!isOpen));
        menu.classList.toggle('hidden', isOpen);
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const appLanding = document.querySelector('.app-landing');
    if (!appLanding) {
        return;
    }

    const menuToggle = appLanding.querySelector('#ham');
    const mobileMenu = appLanding.querySelector('#mob-menu');
    const mobileLinks = appLanding.querySelectorAll('#mob-menu a');

    if (!menuToggle || !mobileMenu) {
        return;
    }

    const closeMenu = () => {
        menuToggle.classList.remove('open');
        mobileMenu.classList.remove('open');
        menuToggle.setAttribute('aria-expanded', 'false');
    };

    menuToggle.addEventListener('click', () => {
        const isOpen = mobileMenu.classList.toggle('open');
        menuToggle.classList.toggle('open', isOpen);
        menuToggle.setAttribute('aria-expanded', String(isOpen));
    });

    mobileLinks.forEach((link) => {
        link.addEventListener('click', closeMenu);
    });

    const launchAtRaw = appLanding.dataset.launchAt;
    const countdownMap = {
        days: appLanding.querySelector('[data-countdown="days"]'),
        hours: appLanding.querySelector('[data-countdown="hours"]'),
        minutes: appLanding.querySelector('[data-countdown="minutes"]'),
        seconds: appLanding.querySelector('[data-countdown="seconds"]'),
    };

    if (launchAtRaw && countdownMap.days && countdownMap.hours && countdownMap.minutes && countdownMap.seconds) {
        const launchAt = new Date(launchAtRaw);

        const updateCountdown = () => {
            const now = new Date();
            let diff = launchAt.getTime() - now.getTime();

            if (diff < 0) {
                diff = 0;
            }

            const dayMs = 1000 * 60 * 60 * 24;
            const hourMs = 1000 * 60 * 60;
            const minuteMs = 1000 * 60;

            const days = Math.floor(diff / dayMs);
            const hours = Math.floor((diff % dayMs) / hourMs);
            const minutes = Math.floor((diff % hourMs) / minuteMs);
            const seconds = Math.floor((diff % minuteMs) / 1000);

            countdownMap.days.textContent = String(days).padStart(3, '0');
            countdownMap.hours.textContent = String(hours).padStart(2, '0');
            countdownMap.minutes.textContent = String(minutes).padStart(2, '0');
            countdownMap.seconds.textContent = String(seconds).padStart(2, '0');
        };

        updateCountdown();
        setInterval(updateCountdown, 1000);
    }

    const animatedStats = appLanding.querySelectorAll('[data-count-target]');

    const animateCounter = (el) => {
        const target = parseFloat(el.dataset.countTarget || '0');
        const decimals = parseInt(el.dataset.countDecimals || '0', 10);
        const prefix = el.dataset.countPrefix || '';
        const suffix = el.dataset.countSuffix || '';
        const pad = parseInt(el.dataset.countPad || '0', 10);
        const duration = 1400;
        const start = performance.now();

        const easeOut = (t) => 1 - Math.pow(1 - t, 3);

        const frame = (timestamp) => {
            const progress = Math.min((timestamp - start) / duration, 1);
            const eased = easeOut(progress);
            const value = target * eased;

            let formatted;
            if (decimals > 0) {
                formatted = value.toFixed(decimals);
            } else {
                formatted = String(Math.round(value));
                if (pad > 0) {
                    formatted = formatted.padStart(pad, '0');
                }
            }

            el.textContent = `${prefix}${formatted}${suffix}`;

            if (progress < 1) {
                requestAnimationFrame(frame);
            } else {
                let done = decimals > 0 ? target.toFixed(decimals) : String(Math.round(target));
                if (decimals === 0 && pad > 0) {
                    done = done.padStart(pad, '0');
                }
                el.textContent = `${prefix}${done}${suffix}`;
            }
        };

        requestAnimationFrame(frame);
    };

    if (animatedStats.length) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.45 });

        animatedStats.forEach((stat) => observer.observe(stat));
    }
});
