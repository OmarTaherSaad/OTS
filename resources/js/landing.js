import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import collapse from '@alpinejs/collapse';

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

window.Alpine = Alpine;
Alpine.plugin(intersect);
Alpine.plugin(collapse);

// Mirror legacy `body.dark-mode` (managed by resources/js/app.js) onto `html.dark`
// so Tailwind v4 `dark:` variants stay in sync with the existing toggle + storage.
const root = document.documentElement;

function syncDarkFromBody() {
    root.classList.toggle('dark', document.body.classList.contains('dark-mode'));
}

// Pre-paint sync from localStorage so first frame matches.
if (localStorage.getItem('theme') === 'dark') {
    root.classList.add('dark');
}

function setupThemeToggle() {
    // Initial sync (after app.js had a chance to apply body.dark-mode).
    syncDarkFromBody();
    const observer = new MutationObserver(syncDarkFromBody);
    observer.observe(document.body, { attributes: true, attributeFilter: ['class'] });

    // Landing-specific toggle button (legacy #theme-toggle is hidden on landing).
    const btn = document.getElementById('theme-toggle-landing');
    if (!btn) return;
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        document.body.classList.toggle('dark-mode');
        const isDark = document.body.classList.contains('dark-mode');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        // MutationObserver above mirrors body.dark-mode -> html.dark automatically.
    });
}

// Landing navbar Alpine component (open/scrolled state + scrollspy + sliding indicator).
Alpine.data('landingNav', () => ({
    open: false,
    scrolled: false,
    active: 'home',
    indicatorStyle: 'opacity: 0;',
    moveIndicator() {
        const track = this.$refs.track;
        if (!track) return;
        const pill = track.querySelector(`[data-section="${this.active}"]`);
        if (!pill) {
            this.indicatorStyle = 'opacity: 0;';
            return;
        }
        const trackRect = track.getBoundingClientRect();
        const pillRect = pill.getBoundingClientRect();
        const x = pillRect.left - trackRect.left;
        this.indicatorStyle = `transform: translateX(${x}px); width: ${pillRect.width}px; opacity: 1;`;
    },
    init() {
        // Scrollspy via IntersectionObserver.
        if ('IntersectionObserver' in window) {
            const ids = ['home', 'about', 'experience', 'service', 'work', 'testimonials', 'pricing', 'contact'];
            const sections = ids.map(id => document.getElementById(id)).filter(Boolean);
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) this.active = entry.target.id;
                });
            }, { rootMargin: '-40% 0px -55% 0px', threshold: 0 });
            sections.forEach(s => observer.observe(s));
        }

        // Sliding indicator: recompute on active change, resize, and after fonts load.
        this.$watch('active', () => this.moveIndicator());
        const recompute = () => this.moveIndicator();
        window.addEventListener('resize', recompute);
        if (document.fonts && document.fonts.ready) {
            document.fonts.ready.then(recompute);
        }
        // Initial paint — wait two RAFs so layout + fonts have settled.
        requestAnimationFrame(() => requestAnimationFrame(recompute));
    },
}));

// Typewriter Alpine component.
Alpine.data('typewriter', (config = {}) => ({
    phrases: config.phrases || ['Senior Software Engineer'],
    text: '',
    phraseIndex: 0,
    charIndex: 0,
    deleting: false,
    typeSpeed: config.typeSpeed || 70,
    deleteSpeed: config.deleteSpeed || 35,
    holdMs: config.holdMs || 1400,
    init() {
        if (prefersReducedMotion) {
            this.text = this.phrases[0];
            return;
        }
        this.tick();
    },
    tick() {
        const current = this.phrases[this.phraseIndex];
        if (!this.deleting) {
            this.charIndex++;
            this.text = current.slice(0, this.charIndex);
            if (this.charIndex >= current.length) {
                this.deleting = true;
                setTimeout(() => this.tick(), this.holdMs);
                return;
            }
            setTimeout(() => this.tick(), this.typeSpeed);
        } else {
            this.charIndex--;
            this.text = current.slice(0, this.charIndex);
            if (this.charIndex <= 0) {
                this.deleting = false;
                this.phraseIndex = (this.phraseIndex + 1) % this.phrases.length;
            }
            setTimeout(() => this.tick(), this.deleteSpeed);
        }
    },
}));

// Hero 3D tilt component.
Alpine.data('heroTilt', () => ({
    onMove(e) {
        if (prefersReducedMotion) return;
        const rect = this.$el.getBoundingClientRect();
        const cx = rect.left + rect.width / 2;
        const cy = rect.top + rect.height / 2;
        const dx = (e.clientX - cx) / rect.width;
        const dy = (e.clientY - cy) / rect.height;
        this.$el.style.setProperty('--tilt-x', `${(-dy * 6).toFixed(2)}deg`);
        this.$el.style.setProperty('--tilt-y', `${(dx * 6).toFixed(2)}deg`);
    },
    onLeave() {
        this.$el.style.setProperty('--tilt-x', '0deg');
        this.$el.style.setProperty('--tilt-y', '0deg');
    },
}));

// Project filter component.
Alpine.data('projectFilter', (categories = []) => ({
    categories: ['All', ...categories],
    active: 'All',
    is(cat) {
        return this.active === 'All' || this.active === cat;
    },
}));

// Pricing toggle.
Alpine.data('pricingToggle', () => ({
    mode: 'project',
    isMonthly() { return this.mode === 'monthly'; },
    multiplier() { return this.mode === 'monthly' ? 0.35 : 1; },
}));

// Testimonials carousel.
Alpine.data('testimonialsScroller', () => ({
    scrollBy(direction) {
        const track = this.$refs.track;
        if (!track) return;
        const card = track.querySelector('[data-card]');
        const step = card ? card.offsetWidth + 24 : 360;
        track.scrollBy({ left: direction * step, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
    },
}));

// Project lightbox.
Alpine.data('lightbox', () => ({
    open: false,
    src: '',
    title: '',
    show(src, title) {
        this.src = src;
        this.title = title || '';
        this.open = true;
        document.body.style.overflow = 'hidden';
    },
    close() {
        this.open = false;
        this.src = '';
        document.body.style.overflow = '';
    },
}));

// Reveal-on-scroll for elements with .reveal class.
function setupReveals() {
    const els = document.querySelectorAll('.landing .reveal');
    if (!els.length) return;
    if (prefersReducedMotion || !('IntersectionObserver' in window)) {
        els.forEach(el => el.classList.add('is-visible'));
        return;
    }
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -10% 0px' });
    els.forEach(el => observer.observe(el));
}

// Lazy Lenis smooth scroll for landing only.
async function setupLenis() {
    if (prefersReducedMotion) return;
    const onLanding = document.querySelector('.landing');
    if (!onLanding) return;
    const { default: Lenis } = await import('lenis');
    const lenis = new Lenis({
        duration: 1.1,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        smoothWheel: true,
    });
    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);

    // Hook in-page anchor scrolls.
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', (e) => {
            const href = a.getAttribute('href');
            if (!href || href === '#') return;
            const target = document.querySelector(href);
            if (!target) return;
            e.preventDefault();
            lenis.scrollTo(target, { offset: -72 });
        });
    });
}

// Lazy tsParticles for hero only when in view.
async function setupHeroParticles() {
    if (prefersReducedMotion) return;
    const container = document.getElementById('hero-particles');
    if (!container) return;
    if (!('IntersectionObserver' in window)) return;
    const observer = new IntersectionObserver(async (entries, obs) => {
        for (const entry of entries) {
            if (!entry.isIntersecting) continue;
            obs.unobserve(entry.target);
            const [{ tsParticles }, { loadSlim }] = await Promise.all([
                import('@tsparticles/engine'),
                import('@tsparticles/slim'),
            ]);
            await loadSlim(tsParticles);
            await tsParticles.load({
                id: 'hero-particles',
                options: {
                    fullScreen: { enable: false },
                    background: { color: 'transparent' },
                    fpsLimit: 60,
                    particles: {
                        number: { value: 42, density: { enable: true, area: 900 } },
                        color: { value: ['#a78bfa', '#f472b6', '#a3e635'] },
                        opacity: { value: 0.55 },
                        size: { value: { min: 1, max: 3 } },
                        links: {
                            enable: true,
                            distance: 140,
                            color: '#a78bfa',
                            opacity: 0.25,
                            width: 1,
                        },
                        move: { enable: true, speed: 0.8, outModes: { default: 'out' } },
                    },
                    interactivity: {
                        events: {
                            onHover: { enable: true, mode: 'grab' },
                        },
                        modes: { grab: { distance: 160, links: { opacity: 0.45 } } },
                    },
                    detectRetina: true,
                },
            });
        }
    }, { threshold: 0.1 });
    observer.observe(container);
}

// Prefill contact subject from query string.
function setupSubjectPrefill() {
    const params = new URLSearchParams(window.location.search);
    const subject = params.get('subject');
    if (!subject) return;
    const input = document.querySelector('#ContactForm input[name="subject"]');
    if (input && !input.value) input.value = subject;
}

document.addEventListener('DOMContentLoaded', () => {
    setupThemeToggle();
    setupReveals();
    setupSubjectPrefill();
    setupLenis();
    setupHeroParticles();
});

Alpine.start();
