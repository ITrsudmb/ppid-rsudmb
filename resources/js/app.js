import 'bootstrap';
// resources/js/app.js
document.addEventListener('DOMContentLoaded', function () {
    // Select navbar and hero
    const nav = document.querySelector('nav.navbar');
    const hero = document.querySelector('#hero-banner'); // optional
    const htmlEl = document.documentElement;

    if (!nav) return; // stop if navbar not found

    const CHECK_SCROLL_Y = 50; // px threshold for navbar effect

    // Scroll effect: shadow, blur, background color
    function onScroll() {
        const y = window.scrollY || window.pageYOffset;
        if (y > CHECK_SCROLL_Y) {
            nav.classList.add('backdrop-blur-sm', 'shadow-lg');
            nav.style.backgroundColor = getComputedStyle(document.documentElement)
                .getPropertyValue('--brand-green') || '#0d8a53';
        } else {
            nav.classList.remove('backdrop-blur-sm', 'shadow-lg');
            nav.style.backgroundColor = hero ? 'transparent' :
                getComputedStyle(document.documentElement).getPropertyValue('--brand-green') || '#0d8a53';
        }
    }

    // Initial check
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    // Dark mode toggle
    const darkToggle = document.querySelector('#dark-mode-toggle');
    if (darkToggle) {
        darkToggle.addEventListener('click', () => {
            htmlEl.classList.toggle('dark');
            localStorage.setItem('site-dark', htmlEl.classList.contains('dark') ? '1' : '0');
        });

        // Restore dark mode from localStorage
        if (localStorage.getItem('site-dark') === '1') htmlEl.classList.add('dark');
    }

    // Mobile: close menu on link click (for Alpine mobile menu)
    document.querySelectorAll('[x-data] a').forEach(link => {
        link.addEventListener('click', () => {
            const parent = link.closest('[x-data]');
            if (parent && parent.__x) {
                // close Alpine menu
                if (parent.__x.$data.open) parent.__x.$data.open = false;
            }
        });
    });
});
