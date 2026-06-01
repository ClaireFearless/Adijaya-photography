@extends('layouts.app')

@section('title', 'Adijaya Photography — Abadikan Momenmu')

@section('content')

{{-- ================================ --}}
{{-- HERO SECTION                     --}}
{{-- ================================ --}}
<section style="min-height: 100vh; display: flex; flex-direction: column;
                justify-content: flex-end; padding-bottom: 6rem; position: relative;
                overflow: hidden;">

    {{-- Background noise texture --}}
    <div style="position: absolute; inset: 0; opacity: 0.03;
                background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22300%22 height=%22300%22><filter id=%22n%22><feTurbulence type=%22fractalNoise%22 baseFrequency=%220.65%22 numOctaves=%223%22 stitchTiles=%22stitch%22/></filter><rect width=%22300%22 height=%22300%22 filter=%22url(%23n)%22 opacity=%221%22/></svg>');"></div>

    {{-- Big background text --}}
    <div id="heroBgText" style="position: absolute; top: 50%; left: 50%;
         transform: translate(-50%, -50%); white-space: nowrap;
         font-size: clamp(8rem, 20vw, 22rem); font-weight: 900;
         letter-spacing: -0.05em; color: transparent;
         -webkit-text-stroke: 1px #1C1C1C; pointer-events: none;
         user-select: none; z-index: 0;">
        FOTO
    </div>

    <div class="container-main" style="position: relative; z-index: 1;">

        {{-- Label --}}
        <div id="heroLabel" style="display: flex; align-items: center; gap: 1rem;
             margin-bottom: 2.5rem; opacity: 0;">
            <div style="width: 40px; height: 1px; background: #2A2A2A;"></div>
            <span class="text-label">Professional Photography Service</span>
        </div>

        {{-- Heading --}}
        <h1 style="margin-bottom: 3rem;">
            <div style="overflow: hidden;">
                <div id="heroLine1" class="text-display" style="transform: translateY(110%);">
                    Setiap Momen
                </div>
            </div>
            <div style="overflow: hidden;">
                <div id="heroLine2" class="text-display"
                     style="transform: translateY(110%); color: #2A2A2A;
                            -webkit-text-stroke: 1px #555;">
                    Adalah Karya
                </div>
            </div>
            <div style="overflow: hidden;">
                <div id="heroLine3" class="text-display" style="transform: translateY(110%);">
                    Seni
                </div>
            </div>
        </h1>

        {{-- Bottom row --}}
        <div id="heroBottom" style="display: flex; justify-content: space-between;
             align-items: flex-end; opacity: 0;">
            <div style="max-width: 380px;">
                <p class="text-subheading" style="font-size: 1rem; margin-bottom: 2rem;">
                    Adijaya Photography mengabadikan momen spesialmu dengan
                    sentuhan artistik yang tak terlupakan.
                </p>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="{{ route('booking.create') }}"
                       class="btn-secondary" data-magnetic>
                        Booking Sekarang
                        <svg viewBox="0 0 16 16" style="width: 14px; height: 14px; fill: none;
                             stroke: currentColor; stroke-width: 2;">
                            <path d="M3 8h10M9 4l4 4-4 4"/>
                        </svg>
                    </a>
                    <a href="#packages" class="btn-primary" data-magnetic>
                        Lihat Paket
                    </a>
                </div>
            </div>

            {{-- Stats --}}
            <div style="display: flex; gap: 3rem; text-align: right;">
                <div>
                    <div style="font-size: clamp(2rem, 4vw, 3.5rem); font-weight: 800;
                                letter-spacing: -0.04em; color: #F5F5F5; line-height: 1;">
                        500+
                    </div>
                    <div class="text-label" style="margin-top: 0.5rem;">Klien Puas</div>
                </div>
                <div>
                    <div style="font-size: clamp(2rem, 4vw, 3.5rem); font-weight: 800;
                                letter-spacing: -0.04em; color: #F5F5F5; line-height: 1;">
                        8+
                    </div>
                    <div class="text-label" style="margin-top: 0.5rem;">Tahun Pengalaman</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div id="scrollIndicator" style="position: absolute; right: clamp(1.5rem, 5vw, 5rem);
         bottom: 3rem; display: flex; flex-direction: column; align-items: center;
         gap: 0.75rem; opacity: 0;">
        <span class="text-label" style="writing-mode: vertical-rl; font-size: 0.65rem;">
            SCROLL
        </span>
        <div style="width: 1px; height: 60px; background: #2A2A2A; position: relative; overflow: hidden;">
            <div id="scrollLine" style="position: absolute; top: -100%; left: 0;
                 width: 100%; height: 100%; background: #F5F5F5;
                 animation: scrollDown 2s ease-in-out infinite;"></div>
        </div>
    </div>
</section>

<style>
@keyframes scrollDown {
    0% { top: -100%; }
    50% { top: 0%; }
    100% { top: 100%; }
}
</style>

{{-- ================================ --}}
{{-- MARQUEE SECTION                  --}}
{{-- ================================ --}}
<div style="border-top: 1px solid #1C1C1C; border-bottom: 1px solid #1C1C1C;
            padding: 1.25rem 0; overflow: hidden; white-space: nowrap;">
    <div id="marquee" style="display: inline-flex; gap: 3rem; animation: marquee 20s linear infinite;">
        @foreach(['Foto Wisuda', 'Pre-Wedding', 'Wedding', 'Maternity', 'Portrait', 'Family', 'Foto Wisuda', 'Pre-Wedding', 'Wedding', 'Maternity', 'Portrait', 'Family'] as $item)
        <span style="font-size: 0.8rem; letter-spacing: 0.15em; color: #333;
                     text-transform: uppercase; display: inline-flex; align-items: center; gap: 1.5rem;">
            {{ $item }}
            <span style="width: 4px; height: 4px; background: #2A2A2A; border-radius: 50%;
                         display: inline-block;"></span>
        </span>
        @endforeach
    </div>
</div>

<style>
@keyframes marquee {
    from { transform: translateX(0); }
    to { transform: translateX(-50%); }
}
</style>

{{-- ================================ --}}
{{-- PACKAGES SECTION                 --}}
{{-- ================================ --}}
<section id="packages" class="section">
    <div class="container-main">

        {{-- Section header --}}
        <div style="display: flex; justify-content: space-between; align-items: flex-end;
                    margin-bottom: 5rem;">
            <div>
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;"
                     data-fade>
                    <div class="divider" style="width: 40px;"></div>
                    <span class="text-label">Paket Layanan</span>
                </div>
                <h2 class="text-heading" data-reveal>Pilih Paket<br>yang Sesuai</h2>
            </div>
            <a href="{{ route('booking.create') }}"
               class="btn-primary" data-fade data-magnetic
               style="flex-shrink: 0;">
                Booking Sekarang →
            </a>
        </div>

        {{-- Packages list --}}
        <div style="display: flex; flex-direction: column; gap: 0;">
            @forelse($packages as $index => $package)
            <div class="package-row" data-fade
                 style="display: grid; grid-template-columns: 60px 1fr auto auto;
                        align-items: center; gap: 2rem; padding: 2rem 0;
                        border-top: 1px solid #1C1C1C;
                        transition: background 0.3s; cursor: none;"
                 onmouseover="this.style.paddingLeft='1rem'"
                 onmouseout="this.style.paddingLeft='0'">

                {{-- Number --}}
                <span style="font-size: 0.75rem; color: #333; letter-spacing: 0.1em;
                             font-weight: 500;">
                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                </span>

                {{-- Name --}}
                <div>
                    <div style="font-size: clamp(1.1rem, 2vw, 1.5rem); font-weight: 700;
                                color: #F5F5F5; letter-spacing: -0.02em; margin-bottom: 0.35rem;">
                        {{ $package->name }}
                    </div>
                    <div style="font-size: 0.8rem; color: #555; display: flex; gap: 1.5rem;">
                        <span>⏱ {{ $package->duration }} Jam Sesi</span>
                        @if($package->description)
                        <span style="display: none;" class="pkg-desc">{{ Str::limit($package->description, 60) }}</span>
                        @endif
                    </div>
                </div>

                {{-- Price --}}
                <div style="text-align: right;">
                    <div style="font-size: 1.1rem; font-weight: 700; color: #F5F5F5;
                                letter-spacing: -0.02em;">
                        Rp {{ number_format($package->price, 0, ',', '.') }}
                    </div>
                    <div style="font-size: 0.75rem; color: #555; margin-top: 0.2rem;">
                        DP Rp {{ number_format($package->dp_amount, 0, ',', '.') }}
                    </div>
                </div>

                {{-- CTA --}}
                <a href="{{ route('booking.create', ['package_id' => $package->id]) }}"
                   style="display: flex; align-items: center; justify-content: center;
                          width: 44px; height: 44px; border: 1px solid #2A2A2A;
                          border-radius: 50%; color: #F5F5F5; text-decoration: none;
                          transition: all 0.3s; flex-shrink: 0;"
                   onmouseover="this.style.background='#F5F5F5'; this.style.color='#0A0A0A'"
                   onmouseout="this.style.background='none'; this.style.color='#F5F5F5'">
                    <svg viewBox="0 0 16 16" style="width: 14px; height: 14px; fill: none;
                         stroke: currentColor; stroke-width: 2;">
                        <path d="M3 8h10M9 4l4 4-4 4"/>
                    </svg>
                </a>
            </div>
            @empty
            <div style="text-align: center; color: #333; padding: 4rem 0;">
                Belum ada paket tersedia.
            </div>
            @endforelse

            {{-- Bottom border --}}
            <div style="border-top: 1px solid #1C1C1C;"></div>
        </div>
    </div>
</section>

{{-- ================================ --}}
{{-- WHY US SECTION                   --}}
{{-- ================================ --}}
<section class="section" style="background: #111111;">
    <div class="container-main">

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 6rem; align-items: center;">
            <div>
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;"
                     data-fade>
                    <div class="divider" style="width: 40px;"></div>
                    <span class="text-label">Kenapa Kami</span>
                </div>
                <h2 class="text-heading" data-reveal style="margin-bottom: 2rem;">
                    Kualitas yang<br>Bicara Sendiri
                </h2>
                <p data-fade style="color: #555; font-size: 0.95rem; line-height: 1.8; max-width: 420px;">
                    Lebih dari 8 tahun pengalaman mengabadikan momen spesial dengan peralatan
                    profesional dan sentuhan artistik yang unik.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1px;
                        background: #1C1C1C; border: 1px solid #1C1C1C; border-radius: 16px;
                        overflow: hidden;">
                @php
                    $features = [
                        ['icon' => '📷', 'title' => 'Peralatan Pro', 'desc' => 'Kamera & lensa terbaik'],
                        ['icon' => '✦', 'title' => 'Artistik', 'desc' => 'Konsep foto unik & kreatif'],
                        ['icon' => '⚡', 'title' => 'Cepat', 'desc' => 'Hasil editing tepat waktu'],
                        ['icon' => '🔒', 'title' => 'Terpercaya', 'desc' => '500+ klien puas'],
                    ];
                @endphp
                @foreach($features as $f)
                <div style="background: #0A0A0A; padding: 2rem; transition: background 0.3s;"
                     onmouseover="this.style.background='#111'"
                     onmouseout="this.style.background='#0A0A0A'"
                     data-fade>
                    <div style="font-size: 1.5rem; margin-bottom: 1rem;">{{ $f['icon'] }}</div>
                    <div style="font-weight: 600; color: #F5F5F5; font-size: 0.95rem;
                                margin-bottom: 0.4rem;">{{ $f['title'] }}</div>
                    <div style="color: #555; font-size: 0.8rem;">{{ $f['desc'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ================================ --}}
{{-- TESTIMONIALS                     --}}
{{-- ================================ --}}
<section id="testimonials" class="section">
    <div class="container-main">

        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;" data-fade>
            <div class="divider" style="width: 40px;"></div>
            <span class="text-label">Testimoni</span>
        </div>
        <h2 class="text-heading" data-reveal style="margin-bottom: 5rem;">
            Kata Mereka
        </h2>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1px;
                    background: #1C1C1C;">
            @php
                $testimonials = [
                    ['name' => 'Rina Kartika', 'type' => 'Foto Wisuda',
                     'comment' => 'Hasilnya luar biasa! Fotografernya sangat profesional dan sabar. Foto wisuda saya jadi sangat berkesan dan memorable.'],
                    ['name' => 'Budi & Sari', 'type' => 'Pre-Wedding',
                     'comment' => 'Sangat puas dengan hasilnya. Ide-ide foto kreatif dan editing yang bagus. Semua teman bertanya foto di mana!'],
                    ['name' => 'Dewi Lestari', 'type' => 'Foto Maternity',
                     'comment' => 'Pelayanan ramah dan hasil foto sangat memuaskan. Momen kehamilan saya terabadikan dengan sangat indah.'],
                ];
            @endphp
            @foreach($testimonials as $i => $t)
            <div style="background: #0A0A0A; padding: 2.5rem;" data-fade
                 data-delay="{{ $i * 0.1 }}">
                <div style="display: flex; gap: 2px; margin-bottom: 1.5rem;">
                    @for($s = 0; $s < 5; $s++)
                    <svg viewBox="0 0 12 12" style="width: 12px; height: 12px; fill: #F5F5F5;">
                        <polygon points="6,1 7.5,4.5 11,4.8 8.5,7 9.3,10.5 6,8.5 2.7,10.5 3.5,7 1,4.8 4.5,4.5"/>
                    </svg>
                    @endfor
                </div>
                <p style="color: #A0A0A0; font-size: 0.9rem; line-height: 1.75;
                           margin-bottom: 2rem;">"{{ $t['comment'] }}"</p>
                <div style="display: flex; align-items: center; gap: 1rem;
                            border-top: 1px solid #1C1C1C; padding-top: 1.5rem;">
                    <div style="width: 36px; height: 36px; border-radius: 50%;
                                background: #1C1C1C; display: flex; align-items: center;
                                justify-content: center; font-size: 0.8rem; color: #555;
                                font-weight: 600; flex-shrink: 0;">
                        {{ strtoupper(substr($t['name'], 0, 1)) }}
                    </div>
                    <div>
                        <div style="color: #F5F5F5; font-size: 0.875rem; font-weight: 600;">
                            {{ $t['name'] }}
                        </div>
                        <div style="color: #333; font-size: 0.75rem; letter-spacing: 0.05em;
                                    margin-top: 0.2rem;">{{ $t['type'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================================ --}}
{{-- CTA SECTION                      --}}
{{-- ================================ --}}
<section style="border-top: 1px solid #1C1C1C; padding: 8rem 0;">
    <div class="container-main" style="text-align: center;">
        <div class="text-label" style="margin-bottom: 2rem;" data-fade>
            ✦ Siap Diabadikan? ✦
        </div>
        <h2 data-reveal style="font-size: clamp(2.5rem, 7vw, 7rem); font-weight: 900;
                                letter-spacing: -0.04em; line-height: 0.95;
                                margin-bottom: 3rem;">
            Abadikan<br>Momenmu<br>Sekarang
        </h2>
        <a href="{{ route('booking.create') }}"
           class="btn-secondary" data-magnetic data-fade
           style="font-size: 1rem; padding: 1.25rem 3rem;">
            Mulai Booking
            <svg viewBox="0 0 16 16" style="width: 16px; height: 16px; fill: none;
                 stroke: currentColor; stroke-width: 2;">
                <path d="M3 8h10M9 4l4 4-4 4"/>
            </svg>
        </a>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Hero animations
    const tl = gsap.timeline({ delay: 2.5 });

    tl.to('#heroLine1', { yPercent: 0, duration: 1, ease: 'power4.out' })
      .to('#heroLine2', { yPercent: 0, duration: 1, ease: 'power4.out' }, '-=0.75')
      .to('#heroLine3', { yPercent: 0, duration: 1, ease: 'power4.out' }, '-=0.75')
      .to('#heroLabel', { opacity: 1, y: 0, duration: 0.8, ease: 'power3.out' }, '-=0.5')
      .to('#heroBottom', { opacity: 1, y: 0, duration: 0.8, ease: 'power3.out' }, '-=0.5')
      .to('#scrollIndicator', { opacity: 1, duration: 0.6 }, '-=0.3');

    // Background text parallax
    gsap.to('#heroBgText', {
        yPercent: 30,
        ease: 'none',
        scrollTrigger: {
            trigger: 'section',
            start: 'top top',
            end: 'bottom top',
            scrub: 1,
        }
    });

    // Package row hover transition
    document.querySelectorAll('.package-row').forEach(row => {
        row.style.transition = 'padding-left 0.4s cubic-bezier(0.76,0,0.24,1)';
    });
});
</script>
@endpush