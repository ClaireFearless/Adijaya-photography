@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4"
     style="background: linear-gradient(135deg, #0D0D0D 0%, #1A1A1A 100%);">

    <div class="w-full max-w-md">
        {{-- Logo --}}
        <div class="text-center mb-8">
            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4"
                 style="background-color: #C9A84C;">
                <span class="text-black font-bold text-2xl">A</span>
            </div>
            <h1 class="text-white font-bold text-2xl">ADIJAYA</h1>
            <p class="gold text-sm">Photography — Admin Panel</p>
        </div>

        {{-- Card Login --}}
        <div class="card-dark rounded-2xl p-8" style="border: 1px solid #C9A84C33;">
            <h2 class="text-white font-semibold text-xl mb-6 text-center">Masuk ke Dashboard</h2>

            {{-- Error --}}
            @if($errors->any())
            <div class="bg-red-900 border border-red-700 text-red-300 px-4 py-3 rounded-lg mb-4 text-sm">
                {{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <label class="block text-gray-400 text-sm mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           placeholder="admin@adijaya.com"
                           class="w-full px-4 py-3 rounded-xl text-white text-sm outline-none focus:ring-2 transition"
                           style="background-color: #262626; border: 1px solid #C9A84C33;
                                  focus:ring-color: #C9A84C;"
                           required>
                </div>

                {{-- Password --}}
                <div class="mb-6">
                    <label class="block text-gray-400 text-sm mb-2">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="passwordInput"
                               placeholder="••••••••"
                               class="w-full px-4 py-3 rounded-xl text-white text-sm outline-none transition"
                               style="background-color: #262626; border: 1px solid #C9A84C33;"
                               required>
                        <button type="button" onclick="togglePassword()"
                                class="absolute right-3 top-3 text-gray-400 hover:text-gold text-sm">
                            👁
                        </button>
                    </div>
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center gap-2 mb-6">
                    <input type="checkbox" name="remember" id="remember"
                           class="w-4 h-4 rounded" style="accent-color: #C9A84C;">
                    <label for="remember" class="text-gray-400 text-sm">Ingat saya</label>
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="w-full py-3 rounded-xl font-semibold text-black text-sm transition"
                        style="background-color: #C9A84C;"
                        onmouseover="this.style.backgroundColor='#E2C97E'"
                        onmouseout="this.style.backgroundColor='#C9A84C'">
                    Masuk
                </button>
            </form>
        </div>

        <p class="text-center text-gray-600 text-xs mt-6">
            © {{ date('Y') }} Adijaya Photography
        </p>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function togglePassword() {
        const input = document.getElementById('passwordInput');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>
@endpush