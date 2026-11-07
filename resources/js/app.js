import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { SplitText } from 'gsap/SplitText';
import Lenis from 'lenis';

gsap.registerPlugin(ScrollTrigger, SplitText);

const $ = (sel, root = document) => root.querySelector(sel);
const $$ = (sel, root = document) => [...root.querySelectorAll(sel)];
const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const NAV_OFFSET = -72;

/* --------------------------------------------------------------------------
   Smooth scroll (Lenis) driven by GSAP's ticker so ScrollTrigger stays in sync.
   -------------------------------------------------------------------------- */
let lenis = null;
if (!reduced) {
    lenis = new Lenis({ lerp: 0.095, wheelMultiplier: 0.95 });
    lenis.on('scroll', ScrollTrigger.update);
    gsap.ticker.add((time) => lenis.raf(time * 1000));
    gsap.ticker.lagSmoothing(0);
}

const scrollTo = (target) => {
    const el = typeof target === 'string' ? $(target) : target;
    if (!el) return;
    if (lenis) lenis.scrollTo(el, { offset: el.id === 'top' ? 0 : NAV_OFFSET, duration: 1.4 });
    else window.scrollTo({ top: el.getBoundingClientRect().top + window.scrollY + NAV_OFFSET });
};

document.addEventListener('click', (e) => {
    const link = e.target.closest('a[href^="#"]');
    if (!link) return;
    const hash = link.getAttribute('href');
    if (hash.length < 2 || !$(hash)) return;
    e.preventDefault();
    closeMenu();
    scrollTo(hash);
});

/* --------------------------------------------------------------------------
   Nav: solid after the fold, hides on the way down, returns on the way up.
   -------------------------------------------------------------------------- */
const nav = $('[data-nav]');
let lastY = 0;
const onScroll = () => {
    const y = window.scrollY;
    nav.classList.toggle('is-scrolled', y > 40);
    const goingDown = y > lastY;
    nav.classList.toggle('is-hidden', goingDown && y > window.innerHeight * 0.9 && !document.body.classList.contains('menu-open'));
    lastY = y;
};
window.addEventListener('scroll', onScroll, { passive: true });
onScroll();

/* Mobile menu */
const toggle = $('[data-menu-toggle]');
const menu = $('[data-menu]');
function closeMenu() {
    if (!document.body.classList.contains('menu-open')) return;
    document.body.classList.remove('menu-open');
    toggle.setAttribute('aria-expanded', 'false');
    menu.setAttribute('aria-hidden', 'true');
    lenis?.start();
}
toggle?.addEventListener('click', () => {
    const open = !document.body.classList.contains('menu-open');
    if (!open) return closeMenu();
    document.body.classList.add('menu-open');
    toggle.setAttribute('aria-expanded', 'true');
    menu.setAttribute('aria-hidden', 'false');
    lenis?.stop();
});
document.addEventListener('keydown', (e) => e.key === 'Escape' && closeMenu());

/* Lagos clock */
const clock = $('[data-clock]');
if (clock) {
    const fmt = new Intl.DateTimeFormat('en-GB', { timeZone: 'Africa/Lagos', hour: '2-digit', minute: '2-digit' });
    const tick = () => (clock.textContent = fmt.format(new Date()));
    tick();
    setInterval(tick, 15000);
}

/* --------------------------------------------------------------------------
   Hover preview that trails the cursor (ledger + articles).
   -------------------------------------------------------------------------- */
$$('[data-preview-scope]').forEach((scope) => {
    const preview = $('[data-preview-el]', scope);
    const img = $('img', preview);
    if (!preview || window.matchMedia('(hover: none)').matches) return;
    const xTo = gsap.quickTo(preview, 'x', { duration: 0.6, ease: 'power3' });
    const yTo = gsap.quickTo(preview, 'y', { duration: 0.6, ease: 'power3' });
    const rTo = gsap.quickTo(preview, 'rotation', { duration: 0.8, ease: 'power3' });
    let lastX = 0;

    $$('[data-preview]', scope).forEach((row) => {
        row.addEventListener('mouseenter', () => {
            if (img.getAttribute('src') !== row.dataset.preview) img.src = row.dataset.preview;
            preview.classList.add('is-on');
        });
        row.addEventListener('mouseleave', () => preview.classList.remove('is-on'));
    });
    scope.addEventListener('mousemove', (e) => {
        xTo(e.clientX + 32);
        yTo(e.clientY - 150);
        rTo(gsap.utils.clamp(-8, 8, (e.clientX - lastX) * 0.6));
        lastX = e.clientX;
    });
});

/* --------------------------------------------------------------------------
   Everything below is motion. Reduced-motion users get the static page.
   -------------------------------------------------------------------------- */
if (reduced) {
    $$('[data-count]').forEach((el) => (el.textContent = el.dataset.count));
} else {
    initMotion();
}

function initMotion() {
    const loader = $('[data-loader]');
    const ready = Promise.race([
        Promise.all([document.fonts?.ready, imageReady($('[data-hero-statue]'))]),
        new Promise((r) => setTimeout(r, 2500)),
    ]);

    lenis?.stop();
    window.scrollTo(0, 0);

    // Hide the hero pieces until the intro plays.
    gsap.set('[data-hero-char]', { yPercent: 115 });
    gsap.set('[data-hero-line]', { yPercent: 110 });
    gsap.set('[data-hero-statue]', { y: 140, opacity: 0, scale: 0.94, transformOrigin: '50% 100%' });
    gsap.set('[data-hero-fade]', { opacity: 0, y: 24 });
    gsap.set('[data-hero-watermark]', { opacity: 0, yPercent: 20 });
    const arch = $('[data-hero-arch]');
    if (arch) {
        const len = arch.getTotalLength();
        gsap.set(arch, { strokeDasharray: len, strokeDashoffset: len });
    }

    const loaderTl = gsap.timeline({ paused: true });
    if (loader) {
        const count = $('[data-loader-count]', loader);
        const counter = { v: 0 };
        loaderTl
            .from($$('.loader__char > span', loader), { yPercent: 110, duration: 0.9, ease: 'expo.out', stagger: 0.06 })
            .to(counter, { v: 100, duration: 1.1, ease: 'power2.inOut', onUpdate: () => (count.textContent = String(Math.round(counter.v)).padStart(2, '0')) }, 0)
            .to($$('.loader__char > span', loader), { yPercent: -110, duration: 0.6, ease: 'power3.in', stagger: 0.03 }, '+=0.05')
            .to(loader, { clipPath: 'inset(0 0 100% 0)', duration: 0.9, ease: 'expo.inOut' }, '-=0.25')
            .set(loader, { display: 'none' });
    }

    const heroTl = gsap.timeline({ paused: true, defaults: { ease: 'expo.out' } });
    heroTl
        .to('[data-hero-line]', { yPercent: 0, duration: 1.2 })
        .to('[data-hero-char]', { yPercent: 0, duration: 1.4, stagger: { each: 0.045, from: 'center' } }, 0.05)
        .to('[data-hero-statue]', { y: 0, opacity: 1, scale: 1, duration: 1.8 }, 0.25)
        .to(arch, { strokeDashoffset: 0, duration: 2.2, ease: 'power2.inOut' }, 0.3)
        .to('[data-hero-watermark]', { opacity: 1, yPercent: 0, duration: 1.6 }, 0.5)
        .to('[data-hero-fade]', { opacity: 1, y: 0, duration: 1.1, stagger: 0.08 }, 0.7)
        .add(() => lenis?.start(), 0.6);

    ready.then(() => {
        loaderTl.play();
        heroTl.delay(loader ? Math.max(loaderTl.duration() - 0.75, 0) : 0).play();
    });

    heroScroll();
    splitReveals();
    simpleReveals();
    imageMotion();
    manifesto();
    counters();
    practice();
    ledger();
    values();
    vision();
    people();
    marquee();
    footer();

    window.addEventListener('load', () => ScrollTrigger.refresh());
}

function imageReady(img) {
    if (!img || img.complete) return Promise.resolve();
    return new Promise((r) => img.addEventListener('load', r, { once: true }));
}

/* Hero: on scroll, the word spreads apart around the statue, which rises slower than the page. */
function heroScroll() {
    const hero = $('[data-hero]');
    if (!hero) return;
    const chars = $$('[data-hero-char]');
    const mid = (chars.length - 1) / 2;
    const st = { trigger: hero, start: 'top top', end: 'bottom top', scrub: true };

    gsap.timeline({ scrollTrigger: st })
        .to('[data-hero-figure]', { yPercent: -16, scale: 1.05, ease: 'none' }, 0)
        .to(chars, { x: (i) => (i - mid) * window.innerWidth * 0.012, ease: 'none' }, 0)
        .to('.hero__kicker', { yPercent: -60, opacity: 0, ease: 'none' }, 0)
        .to('[data-hero-watermark]', { xPercent: -62, ease: 'none' }, 0)
        .to('.hero__aside, .hero__seal, .hero__pill', { y: -60, opacity: 0, ease: 'none' }, 0);
}

/* Headings: masked line-by-line rise. */
function splitReveals() {
    $$('[data-split-lines]').forEach((el) => {
        SplitText.create(el, {
            type: 'lines',
            mask: 'lines',
            linesClass: 'split-line-inner',
            autoSplit: true,
            onSplit: (self) =>
                gsap.from(self.lines, {
                    yPercent: 115,
                    duration: 1.3,
                    ease: 'expo.out',
                    stagger: 0.09,
                    scrollTrigger: { trigger: el, start: 'top 86%', once: true },
                }),
        });
    });
}

function simpleReveals() {
    $$('[data-reveal]').forEach((el) => {
        gsap.from(el, {
            y: 32,
            opacity: 0,
            duration: 1.2,
            ease: 'expo.out',
            scrollTrigger: { trigger: el, start: 'top 90%', once: true },
        });
    });

    const heritage = $('[data-heritage]');
    if (heritage) {
        gsap.from($$('[data-heritage-col]', heritage), {
            y: 60,
            opacity: 0,
            duration: 1.3,
            ease: 'expo.out',
            stagger: 0.12,
            scrollTrigger: { trigger: heritage, start: 'top 80%', once: true },
        });
    }
}

/* Images: clip-path wipes in, then drifts on scroll. */
function imageMotion() {
    $$('[data-clip-reveal]').forEach((frame) => {
        const fromUp = frame.dataset.clipReveal === 'up';
        const img = $('img', frame);
        gsap.timeline({ scrollTrigger: { trigger: frame, start: 'top 85%', once: true } })
            .fromTo(frame, { clipPath: fromUp ? 'inset(100% 0% 0% 0%)' : 'inset(0% 100% 0% 0%)' }, { clipPath: 'inset(0% 0% 0% 0%)', duration: 1.6, ease: 'expo.inOut' })
            .from(img, { scale: 1.35, duration: 2, ease: 'expo.out' }, 0.2);
    });

    $$('[data-parallax]').forEach((img) => {
        const amount = parseFloat(img.dataset.parallax) || 8;
        gsap.fromTo(img, { yPercent: -amount }, {
            yPercent: amount,
            ease: 'none',
            scrollTrigger: { trigger: img.parentElement, start: 'top bottom', end: 'bottom top', scrub: true },
        });
    });
}

/* Manifesto: words ink in as you read; inline images open like pupils. */
function manifesto() {
    const el = $('[data-scrub-words]');
    if (!el) return;
    const split = SplitText.create(el, { type: 'words', wordsClass: 'word' });
    gsap.timeline({ scrollTrigger: { trigger: el, start: 'top 78%', end: 'bottom 45%', scrub: 0.6 } })
        .fromTo(split.words, { opacity: 0.14 }, { opacity: 1, stagger: 0.12, ease: 'none' }, 0)
        .from($$('.inlay', el), { width: 0, marginInline: 0, stagger: 2.2, duration: 1.5, ease: 'power2.out' }, 0.5);
}

function counters() {
    $$('[data-count]').forEach((el) => {
        const end = parseFloat(el.dataset.count);
        const obj = { v: 0 };
        el.textContent = '0';
        gsap.to(obj, {
            v: end,
            duration: 2,
            ease: 'expo.out',
            onUpdate: () => (el.textContent = Math.round(obj.v)),
            scrollTrigger: { trigger: el, start: 'top 90%', once: true },
        });
    });

    gsap.from('[data-figure]', {
        y: 40,
        opacity: 0,
        duration: 1.2,
        ease: 'expo.out',
        stagger: 0.1,
        scrollTrigger: { trigger: '.figures', start: 'top 85%', once: true },
    });
}

/* Practice: pinned horizontal travel on desktop, stacked reveals on mobile. */
function practice() {
    const section = $('[data-practice]');
    if (!section) return;
    const track = $('[data-practice-track]', section);
    const pin = $('[data-practice-pin]', section);
    const bar = $('[data-practice-progress]', section);
    const mm = gsap.matchMedia();

    mm.add('(min-width: 1024px)', () => {
        const distance = () => track.scrollWidth - window.innerWidth;
        const travel = gsap.to(track, {
            x: () => -distance(),
            ease: 'none',
            scrollTrigger: {
                trigger: pin,
                start: 'top top',
                end: () => '+=' + distance(),
                pin: true,
                scrub: 0.8,
                invalidateOnRefresh: true,
                onUpdate: (self) => gsap.set(bar, { scaleX: self.progress }),
            },
        });

        $$('[data-pcard]', section).forEach((card) => {
            const img = $('[data-pcard-img]', card);
            gsap.fromTo(img, { xPercent: -7 }, {
                xPercent: 7,
                ease: 'none',
                scrollTrigger: { trigger: card, containerAnimation: travel, start: 'left right', end: 'right left', scrub: true },
            });
            gsap.from($('.pcard__media', card), {
                clipPath: 'inset(100% 0% 0% 0% round 999px 999px 0 0)',
                ease: 'none',
                scrollTrigger: { trigger: card, containerAnimation: travel, start: 'left 105%', end: 'left 55%', scrub: true },
            });
        });
    });

    mm.add('(max-width: 1023px)', () => {
        $$('[data-pcard]', section).forEach((card) => {
            gsap.from(card, { y: 60, opacity: 0, duration: 1.2, ease: 'expo.out', scrollTrigger: { trigger: card, start: 'top 88%', once: true } });
        });
    });
}

function ledger() {
    $$('.ledger, .articles').forEach((list) => {
        gsap.from($$('[data-ledger-row]', list), {
            y: 40,
            opacity: 0,
            duration: 1.1,
            ease: 'expo.out',
            stagger: 0.07,
            scrollTrigger: { trigger: list, start: 'top 82%', once: true },
        });
    });
}

/* Values: one value in focus at a time; the counter rolls like an odometer. */
function values() {
    const section = $('[data-values]');
    if (!section) return;
    const items = $$('[data-value]', section);
    const counter = $('[data-values-counter]', section);
    const meter = $('[data-values-meter]', section);

    const activate = (i) => {
        items.forEach((item, j) => item.classList.toggle('is-active', i === j));
        if (counter) counter.style.transform = `translateY(${(-100 * i) / items.length}%)`;
        if (meter) meter.style.transform = `scaleX(${(i + 1) / items.length})`;
    };

    items.forEach((item, i) => {
        ScrollTrigger.create({
            trigger: item,
            start: 'top 58%',
            end: 'bottom 58%',
            onToggle: (self) => self.isActive && activate(i),
        });
    });
}

/* Vision: the skyline opens from a window to full bleed. */
function vision() {
    const section = $('[data-vision]');
    if (!section) return;
    gsap.timeline({ scrollTrigger: { trigger: section, start: 'top bottom', end: 'top top', scrub: true } })
        .fromTo('[data-vision-frame]', { clipPath: 'inset(14% 10% 14% 10% round 999px 999px 0px 0px)' }, { clipPath: 'inset(0% 0% 0% 0% round 0px 0px 0px 0px)', ease: 'none' }, 0)
        .fromTo('[data-vision-img]', { scale: 1.3 }, { scale: 1, ease: 'none' }, 0);

    gsap.to('[data-vision-img]', {
        yPercent: 10,
        ease: 'none',
        scrollTrigger: { trigger: section, start: 'top top', end: 'bottom top', scrub: true },
    });
}

/* People: three columns drift at different speeds; portraits rise into their arches. */
function people() {
    const mm = gsap.matchMedia();
    mm.add('(min-width: 1024px)', () => {
        const speeds = [-40, 70, 10];
        $$('[data-people-col]').forEach((col, i) => {
            gsap.fromTo(col, { y: -speeds[i] }, {
                y: speeds[i],
                ease: 'none',
                scrollTrigger: { trigger: '.people__grid', start: 'top bottom', end: 'bottom top', scrub: true },
            });
        });
    });

    $$('.person__photo').forEach((photo) => {
        gsap.from(photo, {
            clipPath: 'inset(100% 0% 0% 0% round 999px 999px 0 0)',
            duration: 1.5,
            ease: 'expo.inOut',
            scrollTrigger: { trigger: photo, start: 'top 92%', once: true },
        });
    });
}

/* Marquee: endless drift that speeds up and reverses with scroll velocity. */
function marquee() {
    const track = $('[data-marquee]');
    if (!track) return;
    const loop = gsap.to(track, { xPercent: -100 / 3, duration: 32, ease: 'none', repeat: -1 });
    let direction = 1;
    ScrollTrigger.create({
        trigger: track,
        start: 'top bottom',
        end: 'bottom top',
        onUpdate: (self) => {
            direction = self.direction;
            const boost = gsap.utils.clamp(1, 6, Math.abs(self.getVelocity()) / 250);
            gsap.to(loop, { timeScale: direction * boost, duration: 0.2, overwrite: true });
            gsap.to(loop, { timeScale: direction, duration: 1.2, delay: 0.2, ease: 'power2.out' });
        },
    });
}

function footer() {
    gsap.from('[data-footer-mark]', {
        yPercent: 45,
        ease: 'none',
        scrollTrigger: { trigger: '[data-footer]', start: 'top bottom', end: 'bottom bottom', scrub: true },
    });
}
