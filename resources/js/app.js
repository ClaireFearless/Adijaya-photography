import './bootstrap';
import Lenis from '@studio-freight/lenis';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);

// ================================
// LENIS SMOOTH SCROLL
// ================================
const lenis = new Lenis({
    duration: 1.4,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    smooth: true,
    smoothTouch: false,
});

// Sync Lenis dengan GSAP ScrollTrigger
lenis.on('scroll', ScrollTrigger.update);

gsap.ticker.add((time) => {
    lenis.raf(time * 1000);
});

gsap.ticker.lagSmoothing(0);

// ================================
// CUSTOM CURSOR
// ================================
const cursor = document.getElementById('cursor');
const cursorDot = document.getElementById('cursorDot');

if (cursor && cursorDot) {
    let mouseX = 0, mouseY = 0;
    let curX = 0, curY = 0;

    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;

        gsap.to(cursorDot, {
            x: mouseX,
            y: mouseY,
            duration: 0.1,
        });
    });

    gsap.ticker.add(() => {
        curX += (mouseX - curX) * 0.08;
        curY += (mouseY - curY) * 0.08;
        gsap.set(cursor, { x: curX, y: curY });
    });

    // Hover effect pada elemen interaktif
    const interactives = document.querySelectorAll('a, button, [data-cursor]');
    interactives.forEach(el => {
        el.addEventListener('mouseenter', () => {
            gsap.to(cursor, { scale: 2.5, duration: 0.3, opacity: 0.5 });
            gsap.to(cursorDot, { scale: 0, duration: 0.3 });
        });
        el.addEventListener('mouseleave', () => {
            gsap.to(cursor, { scale: 1, duration: 0.3, opacity: 1 });
            gsap.to(cursorDot, { scale: 1, duration: 0.3 });
        });
    });
}

// ================================
// LOADING SCREEN
// ================================
const loader = document.getElementById('loader');
if (loader) {
    const tl = gsap.timeline();

    tl.to('#loaderCounter', {
        innerHTML: 100,
        duration: 2,
        snap: { innerHTML: 1 },
        ease: 'power2.inOut',
    })
    .to('#loaderShutter', {
        scaleY: 1,
        duration: 0.6,
        ease: 'power4.inOut',
        transformOrigin: 'bottom',
    }, '-=0.3')
    .to('#loader', {
        yPercent: -100,
        duration: 0.8,
        ease: 'power4.inOut',
        onComplete: () => {
            loader.style.display = 'none';
            initPageAnimations();
        }
    });
}

// ================================
// PAGE ANIMATIONS
// ================================
function initPageAnimations() {

    // Text reveal per kata
    document.querySelectorAll('[data-reveal]').forEach(el => {
        const words = el.textContent.trim().split(' ');
        el.innerHTML = words.map(word =>
            `<span class="word-wrap"><span class="word">${word}</span></span>`
        ).join(' ');

        gsap.from(el.querySelectorAll('.word'), {
            yPercent: 110,
            opacity: 0,
            duration: 0.9,
            stagger: 0.07,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
            }
        });
    });

    // Fade up elements
    document.querySelectorAll('[data-fade]').forEach(el => {
        gsap.from(el, {
            y: 50,
            opacity: 0,
            duration: 0.9,
            ease: 'power3.out',
            delay: el.dataset.delay || 0,
            scrollTrigger: {
                trigger: el,
                start: 'top 88%',
            }
        });
    });

    // Image parallax
    document.querySelectorAll('[data-parallax]').forEach(el => {
        gsap.to(el, {
            yPercent: -15,
            ease: 'none',
            scrollTrigger: {
                trigger: el,
                start: 'top bottom',
                end: 'bottom top',
                scrub: 1.5,
            }
        });
    });

    // Line draw animation
    document.querySelectorAll('[data-line]').forEach(el => {
        gsap.from(el, {
            scaleX: 0,
            transformOrigin: 'left',
            duration: 1.2,
            ease: 'power3.inOut',
            scrollTrigger: {
                trigger: el,
                start: 'top 90%',
            }
        });
    });

    // Magnetic buttons
    document.querySelectorAll('[data-magnetic]').forEach(btn => {
        btn.addEventListener('mousemove', (e) => {
            const rect = btn.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            gsap.to(btn, {
                x: x * 0.3,
                y: y * 0.3,
                duration: 0.4,
                ease: 'power2.out'
            });
        });
        btn.addEventListener('mouseleave', () => {
            gsap.to(btn, { x: 0, y: 0, duration: 0.6, ease: 'elastic.out(1, 0.4)' });
        });
    });
}

// Kalau ga ada loader, langsung init
if (!loader) {
    document.addEventListener('DOMContentLoaded', initPageAnimations);
}

export { lenis, gsap, ScrollTrigger };