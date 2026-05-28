@extends('layouts.app')

@section('title', 'Adijaya Photography — Abadikan Momenmu')

@section('content')

{{-- HERO SECTION --}}
<section class="relative min-h-screen flex items-center justify-center text-center px-6"
         style="background: linear-gradient(135deg, #0D0D0D 0%, #1A1A1A 60%, #0D0D0D 100%);">

    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-72 h-72 rounded-full opacity-5"
             style="background: radial-gradient(circle, #C9A84C, transparent);"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 rounded-full opacity-5"
             style="background: radial-gradient(circle, #C9A84C, transparent);"></div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto">
        <p class="gold text-sm font-semibold uppercase tracking-widest mb-4"
           data-aos="fade-down">
            ✦ Professional Photography Service ✦
        </p>
        <h1 class="text-white font-bold text-5xl md:text-7xl leading-tight mb-6"
            data-aos="fade-up" data-aos-delay="100">
            Abadikan Setiap<br>
            <span class="gold">Momen Berharga</span><br>
            Bersamamu
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-2xl mx-auto mb-10 leading-relaxed"
           data-aos="fade-up" data-aos-delay="200">
            Adijaya Photography hadir untuk mengabadikan momen spesial kamu dengan
            sentuhan artistik profesional yang membuatnya tak terlupakan.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center"
             data-aos="fade-up" data-aos-delay="300">
            <a href="{{ route('booking.create') }}"
               class="btn-gold px-8 py-4 rounded-full text-base font-semibold">
                📸 Booking Sekarang
            </a>
            <a href="#packages"
               class="btn-outline-gold px-8 py-4 rounded-full text-base font-semibold">
                Lihat Paket
            </a>
        </div>

        <div class="grid grid-cols-3 gap-8 mt-16 max-w-lg mx-auto"
             data-aos="fade-up" data-aos-delay="400">
            <div class="text-center">
                <div class="gold font-bold text-3xl">500+</div>
                <div class="text-gray-500 text-sm">Klien Puas</div>
            </div>
            <div class="text-center" style="border-left: 1px solid #C9A84C33; border-right: 1px solid #C9A84C33;">
                <div class="gold font-bold text-3xl">5★</div>
                <div class="text-gray-500 text-sm">Rating</div>
            </div>
            <div class="text-center">
                <div class="gold font-bold text-3xl">8+</div>
                <div class="text-gray-500 text-sm">Tahun Pengalaman</div>
            </div>
        </div>
    </div>
</section>

{{-- PACKAGES SECTION --}}
<section id="packages" class="py-20 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <p class="gold text-sm font-semibold uppercase tracking-widest mb-3"
               data-aos="fade-down">✦ Paket Kami ✦</p>
            <h2 class="text-white font-bold text-4xl mb-4"
                data-aos="fade-up" data-aos-delay="100">Pilih Paket yang Sesuai</h2>
            <p class="text-gray-400 max-w-xl mx-auto"
               data-aos="fade-up" data-aos-delay="200">
                Kami menyediakan berbagai paket foto yang dapat disesuaikan dengan kebutuhan dan budget kamu.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($packages as $package)
            <div class="card-dark rounded-2xl overflow-hidden transition-all duration-300 flex flex-col"
                 style="border: 1px solid #262626;"
                 data-aos="fade-up"
                 data-aos-delay="{{ $loop->index * 100 }}">
                <div class="h-48 flex items-center justify-center"
                     style="background: linear-gradient(135deg, #1A1A1A, #262626);">
                    @if($package->thumbnail)
                        <img src="{{ asset('storage/' . $package->thumbnail) }}"
                             alt="{{ $package->name }}"
                             class="w-full h-full object-cover">
                    @else
                        <div class="text-center">
                            <div class="text-5xl mb-2">📸</div>
                            <div class="text-gray-600 text-sm">No Image</div>
                        </div>
                    @endif
                </div>

                <div class="p-6 flex flex-col flex-1">
                    <h3 class="text-white font-bold text-xl mb-2">{{ $package->name }}</h3>
                    <p class="text-gray-400 text-sm mb-4 flex-1">{{ $package->description }}</p>

                    <div class="flex items-center gap-2 mb-2 text-sm text-gray-400">
                        <span>⏱</span>
                        <span>{{ $package->duration }} Jam Sesi</span>
                    </div>

                    <div style="border-top: 1px solid #C9A84C22;" class="mt-4 pt-4">
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-gray-500 text-sm">Harga</span>
                            <span class="gold font-bold text-xl">
                                Rp {{ number_format($package->price, 0, ',', '.') }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-gray-500 text-sm">DP Minimal</span>
                            <span class="text-green-400 text-sm font-medium">
                                Rp {{ number_format($package->dp_amount, 0, ',', '.') }}
                            </span>
                        </div>
                        <a href="{{ route('booking.create', ['package_id' => $package->id]) }}"
                           class="btn-gold w-full py-3 rounded-xl text-sm text-center block font-semibold">
                            Pilih Paket Ini
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center text-gray-500 py-12">
                Belum ada paket tersedia.
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- TESTIMONIALS SECTION --}}
<section id="testimonials" class="py-20 px-6" style="background-color: #0D0D0D;">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <p class="gold text-sm font-semibold uppercase tracking-widest mb-3"
               data-aos="fade-down">✦ Testimoni ✦</p>
            <h2 class="text-white font-bold text-4xl mb-4"
                data-aos="fade-up" data-aos-delay="100">Kata Klien Kami</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $testimonials = [
                    ['name' => 'Rina Kartika', 'type' => 'Foto Wisuda', 'rating' => 5,
                     'comment' => 'Hasilnya luar biasa! Fotografernya sangat profesional dan sabar. Foto wisuda saya jadi sangat berkesan.'],
                    ['name' => 'Budi & Sari', 'type' => 'Pre-Wedding', 'rating' => 5,
                     'comment' => 'Sangat puas dengan hasilnya. Ide-ide foto kreatif dan editing yang bagus. Recommended banget!'],
                    ['name' => 'Dewi Lestari', 'type' => 'Foto Maternity', 'rating' => 5,
                     'comment' => 'Pelayanan ramah dan hasil foto sangat memuaskan. Momen kehamilan saya terabadikan dengan indah.'],
                ];
            @endphp

            @foreach($testimonials as $t)
            <div class="card-dark rounded-2xl p-6"
                 style="border: 1px solid #C9A84C22;"
                 data-aos="fade-up"
                 data-aos-delay="{{ $loop->index * 150 }}">
                <div class="flex gap-1 mb-4">
                    @for($i = 0; $i < $t['rating']; $i++)
                    <span class="gold">★</span>
                    @endfor
                </div>
                <p class="text-gray-300 text-sm leading-relaxed mb-6">"{{ $t['comment'] }}"</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold"
                         style="background-color: #C9A84C22; color: #C9A84C;">
                        {{ strtoupper(substr($t['name'], 0, 1)) }}
                    </div>
                    <div>
                        <div class="text-white font-medium text-sm">{{ $t['name'] }}</div>
                        <div class="text-gray-500 text-xs">{{ $t['type'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA SECTION --}}
<section class="py-20 px-6 text-center">
    <div class="max-w-3xl mx-auto">
        <p class="gold text-sm font-semibold uppercase tracking-widest mb-4"
           data-aos="zoom-in">✦ Siap? ✦</p>
        <h2 class="text-white font-bold text-4xl mb-4"
            data-aos="fade-up" data-aos-delay="100">
            Abadikan Momenmu<br>Sekarang Juga
        </h2>
        <p class="text-gray-400 mb-8"
           data-aos="fade-up" data-aos-delay="200">
            Jangan biarkan momen berharga berlalu begitu saja. Booking sekarang
            dan biarkan kami mengabadikannya untukmu.
        </p>
        <a href="{{ route('booking.create') }}"
           class="btn-gold px-10 py-4 rounded-full text-base font-semibold inline-block"
           data-aos="zoom-in" data-aos-delay="300">
            📸 Booking Sekarang
        </a>
    </div>
</section>

@endsection