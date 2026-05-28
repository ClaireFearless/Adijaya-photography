<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Adijaya Photography</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --gold: #C9A84C;
            --gold-light: #E2C97E;
            --dark: #0D0D0D;
            --dark-2: #1A1A1A;
            --dark-3: #262626;
            --sidebar-width: 260px;
        }
        body { background-color: #111111; color: #f5f5f5; }
        .gold { color: var(--gold); }
        .bg-gold { background-color: var(--gold); }
        .sidebar { width: var(--sidebar-width); background-color: var(--dark); border-right: 1px solid #C9A84C22; }
        .sidebar-link {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 16px; border-radius: 8px;
            color: #9ca3af; font-size: 14px;
            transition: all 0.2s; text-decoration: none;
        }
        .sidebar-link:hover, .sidebar-link.active {
            background-color: #C9A84C22;
            color: var(--gold);
        }
        .card-dark { background-color: var(--dark-2); border: 1px solid var(--dark-3); }
        .badge-pending { background: #92400e33; color: #fbbf24; }
        .badge-dp_paid { background: #1e3a5f33; color: #60a5fa; }
        .badge-paid { background: #14532d33; color: #4ade80; }
        .badge-completed { background: #14532d; color: #4ade80; }
        .badge-canceled { background: #7f1d1d33; color: #f87171; }
        .badge-success { background: #14532d33; color: #4ade80; }
        .badge-failed { background: #7f1d1d33; color: #f87171; }
    </style>
    @stack('styles')
</head>
<body class="min-h-screen flex">

    {{-- SIDEBAR --}}
    <aside class="sidebar fixed top-0 left-0 h-full flex flex-col z-40">
        {{-- Logo --}}
        <div class="p-6" style="border-bottom: 1px solid #C9A84C22;">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full flex items-center justify-center"
                     style="background-color: #C9A84C;">
                    <span class="text-black font-bold">A</span>
                </div>
                <div class="leading-tight">
                    <div class="text-white font-bold text-sm">ADIJAYA</div>
                    <div class="gold text-xs">Admin Panel</div>
                </div>
            </a>
        </div>

        {{-- Menu --}}
        <nav class="flex-1 p-4 space-y-1">
            <p class="text-gray-600 text-xs font-semibold uppercase px-3 mb-2">Menu Utama</p>
            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                📊 Dashboard
            </a>
            <a href="{{ route('admin.bookings.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
                📅 Kelola Booking
            </a>
            <a href="{{ route('admin.payments.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.payments.*') ? 'active' : '' }}">
                💳 Pembayaran
            </a>
            <a href="{{ route('admin.packages.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.packages.*') ? 'active' : '' }}">
                📦 Paket Foto
            </a>
            <a href="{{ route('admin.reviews.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                ⭐ Review
            </a>
        </nav>

        {{-- User Info + Logout --}}
        <div class="p-4" style="border-top: 1px solid #C9A84C22;">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-9 h-9 rounded-full flex items-center justify-center text-sm font-bold"
                     style="background-color: #C9A84C22; color: #C9A84C;">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="leading-tight">
                    <div class="text-white text-sm font-medium">{{ Auth::user()->name }}</div>
                    <div class="text-gray-500 text-xs capitalize">{{ Auth::user()->role }}</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full text-left sidebar-link text-red-400 hover:text-red-300"
                    🚪 Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <div class="flex-1 flex flex-col" style="margin-left: var(--sidebar-width);">

        {{-- TOP BAR --}}
        <header class="sticky top-0 z-30 px-6 py-4 flex justify-between items-center"
                style="background-color: #111111; border-bottom: 1px solid #C9A84C22;">
            <h1 class="text-white font-semibold text-lg">@yield('title', 'Dashboard')</h1>
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" target="_blank"
                   class="text-gray-400 hover:text-gold text-sm flex items-center gap-1">
                    🌐 Lihat Website
                </a>
            </div>
        </header>

        {{-- FLASH MESSAGE --}}
        @if(session('success'))
        <div class="mx-6 mt-4">
            <div class="bg-green-900 border border-green-700 text-green-300 px-4 py-3 rounded-lg flex justify-between">
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()">✕</button>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="mx-6 mt-4">
            <div class="bg-red-900 border border-red-700 text-red-300 px-4 py-3 rounded-lg flex justify-between">
                <span>{{ session('error') }}</span>
                <button onclick="this.parentElement.remove()">✕</button>
            </div>
        </div>
        @endif

        {{-- PAGE CONTENT --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>