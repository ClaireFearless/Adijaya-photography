<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Adijaya Photography')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>

{{-- ================================ --}}
{{-- CUSTOM CURSOR                    --}}
{{-- ================================ --}}
<div id="cursor"></div>
<div id="cursorDot"></div>

{{-- ================================ --}}
{{-- LOADING SCREEN                   --}}
{{-- ================================ --}}
<div id="loader">
    <div id="loaderShutter"></div>

    {{-- Logo --}}
    <div class="relative z-10 text-center">
        <div style="font-size: 0.7rem; letter-spacing: 0.3em; color: #555; margin-bottom: 2rem; text-transform: uppercase;">
            Loading
        </div>

        {{-- Aperture SVG --}}
        <div style="width: 80px; height: 80px; margin: 0 auto 2rem;">
            <svg viewBox="0 0 100 100" style="width: 100%; animation: spin 4s linear infinite;">
                <circle cx="50" cy="50" r="45" fill="none" stroke="#2A2A2A" stroke-width="1"/>
                <circle cx="50" cy="50" r="45" fill="none" stroke="#F5F5F5" stroke-width="1"
                        stroke-dasharray="70 212" stroke-linecap="round"/>
                <circle cx="50" cy="50" r="6" fill="#F5F5F5"/>
            </svg>
        </div>

        <div style="font-size: 2.5rem; font-weight: 800; letter-spacing: -0.04em; color: #F5F5F5;">
            ADIJAYA
        </div>
        <div style="font-size: 0.7rem; letter-spacing: 0.25em; color: #555; margin-top: 0.5rem; text-transform: uppercase;">
            Photography
        </div>

        {{-- Counter --}}
        <div style="margin-top: 3rem; font-size: 0.75rem; color: #333; letter-spacing: 0.1em;">
            <span id="loaderCounter">0</span>%
        </div>
    </div>
</div>

<style>
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
</style>

{{-- ================================ --}}
{{-- NAVBAR                           --}}
{{-- ================================ --}}
<nav class="navbar" id="navbar">
    {{-- Logo --}}
    <a href="{{ route('home') }}" style="text-decoration: none; display: flex; align-items: center; gap: 1rem;">
        <div style="width: 36px; height: 36px; border: 1px solid #2A2A2A; border-radius: 50%;
                    display: flex; align-items: center; justify-content: center;">
            <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: none; stroke: #F5F5F5; stroke-width: 1.5;">
                <circle cx="12" cy="12" r="3"/>
                <path d="M6.343 6.343a8 8 0 1 0 11.314 11.314A8 8 0 0 0 6.343 6.343z"
                      stroke-dasharray="4 2"/>
            </svg>
        </div>
        <div>
            <div style="font-size: 0.85rem; font-weight: 700; letter-spacing: 0.1em; color: #F5F5F5;">
                ADIJAYA
            </div>
            <div style="font-size: 0.6rem; letter-spacing: 0.2em; color: #555; margin-top: -2px;">
                PHOTOGRAPHY
            </div>
        </div>
    </a>

    {{-- Menu Desktop --}}
    <div style="display: flex; align-items: center; gap: 2.5rem;" class="nav-menu-desktop">
        <a href="{{ route('home') }}#packages" class="nav-link-item">Paket</a>
        <a href="{{ route('home') }}#portfolio" class="nav-link-item">Portofolio</a>
        <a href="{{ route('home') }}#testimonials" class="nav-link-item">Testimoni</a>
        <a href="{{ route('booking.check') }}" class="nav-link-item">Cek Booking</a>
        <a href="{{ route('booking.create') }}" class="btn-primary" data-magnetic
           style="padding: 0.6rem 1.5rem; font-size: 0.8rem;">
            Booking
            <svg viewBox="0 0 16 16" style="width: 14px; height: 14px; fill: none;
                 stroke: currentColor; stroke-width: 1.5;">
                <path d="M3 8h10M9 4l4 4-4 4"/>
            </svg>
        </a>
    </div>

    {{-- Hamburger Mobile --}}
    <button id="menuToggle" style="display: none; flex-direction: column; gap: 5px;
            background: none; border: none; cursor: none; padding: 4px;">
        <span class="menu-bar" style="width: 24px; height: 1px; background: #F5F5F5; transition: all 0.3s;"></span>
        <span class="menu-bar" style="width: 16px; height: 1px; background: #F5F5F5; transition: all 0.3s;"></span>
    </button>
</nav>

{{-- Mobile Menu --}}
<div id="mobileMenu" style="position: fixed; inset: 0; background: #0A0A0A; z-index: 99;
     display: flex; flex-direction: column; justify-content: center; padding: 3rem;
     transform: translateY(-100%); transition: transform 0.5s cubic-bezier(0.76,0,0.24,1);">
    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
        <a href="{{ route('home') }}#packages" class="mobile-nav-link">Paket</a>
        <a href="{{ route('home') }}#portfolio" class="mobile-nav-link">Portofolio</a>
        <a href="{{ route('home') }}#testimonials" class="mobile-nav-link">Testimoni</a>
        <a href="{{ route('booking.check') }}" class="mobile-nav-link">Cek Booking</a>
    </div>
    <div style="margin-top: 3rem; border-top: 1px solid #1C1C1C; padding-top: 2rem;">
        <a href="{{ route('booking.create') }}" class="btn-secondary"
           style="display: inline-flex;">Booking Sekarang →</a>
    </div>
</div>

<style>
.nav-link-item {
    font-size: 0.8rem;
    color: #A0A0A0;
    text-decoration: none;
    letter-spacing: 0.05em;
    transition: color 0.3s;
}
.nav-link-item:hover { color: #F5F5F5; }

.mobile-nav-link {
    font-size: clamp(2rem, 6vw, 4rem);
    font-weight: 700;
    color: #F5F5F5;
    text-decoration: none;
    letter-spacing: -0.03em;
    transition: color 0.3s;
    display: block;
}
.mobile-nav-link:hover { color: #555; }

@media (max-width: 768px) {
    .nav-menu-desktop { display: none !important; }
    #menuToggle { display: flex !important; }
}
</style>

{{-- ================================ --}}
{{-- FLASH MESSAGES                   --}}
{{-- ================================ --}}
@if(session('success'))
<div id="flashMsg" style="position: fixed; bottom: 2rem; right: 2rem; z-index: 200;
     background: #1C1C1C; border: 1px solid #2A2A2A; border-radius: 12px;
     padding: 1rem 1.5rem; display: flex; align-items: center; gap: 1rem;
     font-size: 0.875rem; color: #F5F5F5; box-shadow: 0 20px 60px rgba(0,0,0,0.5);">
    <span style="color: #6ee7b7;">✓</span>
    {{ session('success') }}
    <button onclick="document.getElementById('flashMsg').remove()"
            style="background: none; border: none; color: #555; cursor: none; margin-left: 0.5rem;">✕</button>
</div>
@endif

@if(session('error'))
<div id="flashMsg" style="position: fixed; bottom: 2rem; right: 2rem; z-index: 200;
     background: #1C1C1C; border: 1px solid #2A2A2A; border-radius: 12px;
     padding: 1rem 1.5rem; display: flex; align-items: center; gap: 1rem;
     font-size: 0.875rem; color: #F5F5F5;">
    <span style="color: #fca5a5;">✕</span>
    {{ session('error') }}
    <button onclick="document.getElementById('flashMsg').remove()"
            style="background: none; border: none; color: #555; cursor: none; margin-left: 0.5rem;">✕</button>
</div>
@endif

{{-- ================================ --}}
{{-- MAIN CONTENT                     --}}
{{-- ================================ --}}
<main>
    @yield('content')
</main>

{{-- ================================ --}}
{{-- FOOTER                           --}}
{{-- ================================ --}}
<footer style="border-top: 1px solid #1C1C1C; padding: 4rem 0 2rem;">
    <div class="container-main">
        <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 4rem; margin-bottom: 4rem;">

            <div>
                <div style="font-size: 1.5rem; font-weight: 800; letter-spacing: -0.03em;
                            color: #F5F5F5; margin-bottom: 1rem;">
                    ADIJAYA<br>PHOTOGRAPHY
                </div>
                <p style="color: #555; font-size: 0.875rem; line-height: 1.7; max-width: 280px;">
                    Mengabadikan setiap momen berharga dengan sentuhan artistik profesional.
                </p>
            </div>

            <div>
                <div class="text-label" style="margin-bottom: 1.5rem;">Layanan</div>
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <a href="#" style="color: #555; font-size: 0.875rem; text-decoration: none;
                                      transition: color 0.3s;" onmouseover="this.style.color='#F5F5F5'"
                       onmouseout="this.style.color='#555'">Foto Wisuda</a>
                    <a href="#" style="color: #555; font-size: 0.875rem; text-decoration: none;
                                      transition: color 0.3s;" onmouseover="this.style.color='#F5F5F5'"
                       onmouseout="this.style.color='#555'">Pre-Wedding</a>
                    <a href="#" style="color: #555; font-size: 0.875rem; text-decoration: none;
                                      transition: color 0.3s;" onmouseover="this.style.color='#F5F5F5'"
                       onmouseout="this.style.color='#555'">Wedding</a>
                    <a href="#" style="color: #555; font-size: 0.875rem; text-decoration: none;
                                      transition: color 0.3s;" onmouseover="this.style.color='#F5F5F5'"
                       onmouseout="this.style.color='#555'">Maternity</a>
                </div>
            </div>

            <div>
                <div class="text-label" style="margin-bottom: 1.5rem;">Kontak</div>
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <span style="color: #555; font-size: 0.875rem;">📍 Lokasi Studio</span>
                    <span style="color: #555; font-size: 0.875rem;">📱 08xx-xxxx-xxxx</span>
                    <span style="color: #555; font-size: 0.875rem;">📧 adijaya@email.com</span>
                    <span style="color: #555; font-size: 0.875rem;">📸 @adijayaphoto</span>
                </div>
            </div>
        </div>

        <div style="border-top: 1px solid #1C1C1C; padding-top: 2rem;
                    display: flex; justify-content: space-between; align-items: center;">
            <span style="color: #333; font-size: 0.8rem;">
                © {{ date('Y') }} Adijaya Photography
            </span>
            <a href="{{ route('login') }}"
               style="color: #333; font-size: 0.75rem; text-decoration: none;
                      letter-spacing: 0.1em; transition: color 0.3s;"
               onmouseover="this.style.color='#555'"
               onmouseout="this.style.color='#333'">
                ADMIN
            </a>
        </div>
    </div>
</footer>

@stack('scripts')

<script>
// Navbar scroll effect
window.addEventListener('scroll', () => {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 80) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Mobile menu toggle
const menuToggle = document.getElementById('menuToggle');
const mobileMenu = document.getElementById('mobileMenu');
let menuOpen = false;

if (menuToggle) {
    menuToggle.addEventListener('click', () => {
        menuOpen = !menuOpen;
        mobileMenu.style.transform = menuOpen ? 'translateY(0)' : 'translateY(-100%)';
        const bars = menuToggle.querySelectorAll('.menu-bar');
        if (menuOpen) {
            bars[0].style.transform = 'rotate(45deg) translate(4px, 4px)';
            bars[1].style.opacity = '0';
        } else {
            bars[0].style.transform = 'none';
            bars[1].style.opacity = '1';
        }
    });
}

// Auto hide flash message
setTimeout(() => {
    const flash = document.getElementById('flashMsg');
    if (flash) flash.remove();
}, 4000);
</script>

</body>
</html>