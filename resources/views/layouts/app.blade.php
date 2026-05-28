<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Adijaya Photography')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- AOS Animation --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        
        :root {
            --gold: #C9A84C;
            --gold-light: #E2C97E;
            --gold-dark: #A07830;
            --dark: #0D0D0D;
            --dark-2: #1A1A1A;
            --dark-3: #262626;
        }
        body { background-color: var(--dark); color: #f5f5f5; }
        .gold { color: var(--gold); }
        .bg-gold { background-color: var(--gold); }
        .border-gold { border-color: var(--gold); }
        .btn-gold {
            background-color: var(--gold);
            color: #0D0D0D;
            font-weight: 700;
            transition: all 0.3s;
        }
        .btn-gold:hover { background-color: var(--gold-light); }
        .btn-outline-gold {
            border: 2px solid var(--gold);
            color: var(--gold);
            font-weight: 700;
            transition: all 0.3s;
        }
        .btn-outline-gold:hover {
            background-color: var(--gold);
            color: #0D0D0D;
        }
        .card-dark {
            background-color: var(--dark-2);
            border: 1px solid var(--dark-3);
        }
        .nav-link { transition: color 0.3s; }
        .nav-link:hover { color: var(--gold) !important; }
        html {
    scroll-behavior: smooth;
}

/* Navbar transition */
nav {
    transition: box-shadow 0.3s ease;
}

/* Card hover effect */
.card-dark {
    transition: transform 0.3s ease, border-color 0.3s ease;
}
.card-dark:hover {
    transform: translateY(-4px);
    border-color: #C9A84C55 !important;
}
    </style>
    @stack('styles')
</head>
<body class="min-h-screen flex flex-col">

    {{-- NAVBAR --}}
    <nav style="background-color: #0D0D0D; border-bottom: 1px solid #C9A84C33;"
         class="sticky top-0 z-50 px-6 py-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gold flex items-center justify-center"
                     style="background-color: #C9A84C;">
                    <span class="text-black font-bold text-lg">A</span>
                </div>
                <div>
                    <span class="text-white font-bold text-lg">ADIJAYA</span>
                    <span class="gold font-bold text-lg"> PHOTOGRAPHY</span>
                </div>
            </a>

            {{-- Menu --}}
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}"
                   class="nav-link text-gray-300 text-sm font-medium">Beranda</a>
                <a href="{{ route('home') }}#packages"
                   class="nav-link text-gray-300 text-sm font-medium">Paket</a>
                <a href="{{ route('home') }}#portfolio"
                   class="nav-link text-gray-300 text-sm font-medium">Portofolio</a>
                <a href="{{ route('home') }}#testimonials"
                   class="nav-link text-gray-300 text-sm font-medium">Testimoni</a>
                <a href="{{ route('booking.check') }}"
                   class="nav-link text-gray-300 text-sm font-medium">Cek Booking</a>
                <a href="{{ route('booking.create') }}"
                   class="btn-gold px-5 py-2 rounded-full text-sm">
                    Booking Sekarang
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <button id="mobileMenuBtn" class="md:hidden text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobileMenu" class="hidden md:hidden mt-4 pb-2 flex flex-col gap-3">
            <a href="{{ route('home') }}" class="text-gray-300 text-sm py-2">Beranda</a>
            <a href="{{ route('home') }}#packages" class="text-gray-300 text-sm py-2">Paket</a>
            <a href="{{ route('home') }}#portfolio" class="text-gray-300 text-sm py-2">Portofolio</a>
            <a href="{{ route('home') }}#testimonials" class="text-gray-300 text-sm py-2">Testimoni</a>
            <a href="{{ route('booking.check') }}" class="text-gray-300 text-sm py-2">Cek Booking</a>
            <a href="{{ route('booking.create') }}" class="btn-gold px-5 py-2 rounded-full text-sm text-center">
                Booking Sekarang
            </a>
        </div>
    </nav>

    {{-- FLASH MESSAGE --}}
    @if(session('success'))
    <div class="max-w-7xl mx-auto w-full px-6 mt-4">
        <div class="bg-green-900 border border-green-600 text-green-300 px-4 py-3 rounded-lg flex justify-between items-center">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="text-green-300 hover:text-white">✕</button>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="max-w-7xl mx-auto w-full px-6 mt-4">
        <div class="bg-red-900 border border-red-600 text-red-300 px-4 py-3 rounded-lg flex justify-between items-center">
            <span>{{ session('error') }}</span>
            <button onclick="this.parentElement.remove()" class="text-red-300 hover:text-white">✕</button>
        </div>
    </div>
    @endif

    {{-- CONTENT --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer style="background-color: #0D0D0D; border-top: 1px solid #C9A84C33;" class="mt-20 py-12 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center"
                             style="background-color: #C9A84C;">
                            <span class="text-black font-bold text-lg">A</span>
                        </div>
                        <div>
                            <span class="text-white font-bold">ADIJAYA</span>
                            <span class="gold font-bold"> PHOTOGRAPHY</span>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Mengabadikan momen berharga dalam setiap jepretan dengan sentuhan artistik profesional.
                    </p>
                </div>
                <div>
                    <h4 class="gold font-semibold mb-4">Layanan</h4>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li>Foto Wisuda</li>
                        <li>Foto Pre-Wedding</li>
                        <li>Foto Wedding</li>
                        <li>Foto Maternity</li>
                    </ul>
                </div>
                <div>
                    <h4 class="gold font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li>📍 Lokasi Studio</li>
                        <li>📱 WhatsApp: 08xx-xxxx-xxxx</li>
                        <li>📧 adijaya@email.com</li>
                        <li>📸 Instagram: @adijayaphoto</li>
                    </ul>
                </div>
            </div>
            <div style="border-top: 1px solid #C9A84C33;" class="mt-8 pt-6 text-center text-gray-500 text-sm">
                © {{ date('Y') }} Adijaya Photography. All rights reserved.
            </div>
        </div>
    </footer>

    
    <script>
        // Mobile menu toggle
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Init AOS
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 80,
    });

    // Smooth scroll untuk anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Navbar shadow on scroll
    window.addEventListener('scroll', function() {
        const nav = document.querySelector('nav');
        if (window.scrollY > 50) {
            nav.style.boxShadow = '0 4px 30px rgba(201, 168, 76, 0.1)';
        } else {
            nav.style.boxShadow = 'none';
        }
    });
</script>
    @stack('scripts')
</body>
</html>