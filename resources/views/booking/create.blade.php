@extends('layouts.app')

@section('title', 'Booking Foto — Adijaya Photography')

@section('content')

<div style="min-height: 100vh; padding-top: 120px; padding-bottom: 8rem;">
    <div class="container-main" style="max-width: 760px;">

        {{-- Header --}}
        <div style="margin-bottom: 5rem;">
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;" data-fade>
                <div class="divider" style="width: 40px;"></div>
                <span class="text-label">Reservasi</span>
            </div>
            <h1 data-reveal style="font-size: clamp(2.5rem, 6vw, 5rem); font-weight: 900;
                                    letter-spacing: -0.04em; line-height: 0.95;">
                Form Booking<br>Foto
            </h1>
        </div>

        {{-- Steps --}}
        <div style="display: flex; align-items: center; margin-bottom: 5rem;" data-fade>
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 28px; height: 28px; border-radius: 50%; background: #F5F5F5;
                            display: flex; align-items: center; justify-content: center;
                            font-size: 0.7rem; font-weight: 700; color: #0A0A0A;">1</div>
                <span style="font-size: 0.8rem; color: #F5F5F5; font-weight: 500;">Isi Data</span>
            </div>
            <div style="width: 60px; height: 1px; background: #2A2A2A; margin: 0 1rem;"></div>
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 28px; height: 28px; border-radius: 50%; border: 1px solid #2A2A2A;
                            display: flex; align-items: center; justify-content: center;
                            font-size: 0.7rem; font-weight: 700; color: #333;">2</div>
                <span style="font-size: 0.8rem; color: #333;">Pembayaran</span>
            </div>
            <div style="width: 60px; height: 1px; background: #2A2A2A; margin: 0 1rem;"></div>
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 28px; height: 28px; border-radius: 50%; border: 1px solid #2A2A2A;
                            display: flex; align-items: center; justify-content: center;
                            font-size: 0.7rem; font-weight: 700; color: #333;">3</div>
                <span style="font-size: 0.8rem; color: #333;">Konfirmasi</span>
            </div>
        </div>

        <form method="POST" action="{{ route('booking.store') }}" id="bookingForm">
            @csrf

            {{-- ======================== --}}
            {{-- 01 DATA DIRI            --}}
            {{-- ======================== --}}
            <div style="padding-bottom: 3rem; border-bottom: 1px solid #1C1C1C; margin-bottom: 3rem;"
                 data-fade>
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                    <span style="font-size: 0.65rem; color: #333; letter-spacing: 0.15em;
                                 text-transform: uppercase; font-weight: 600;">01</span>
                    <span style="font-size: 1rem; color: #F5F5F5; font-weight: 600;">Data Diri</span>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div>
                        <label style="display: block; font-size: 0.72rem; color: #555;
                                      letter-spacing: 0.1em; text-transform: uppercase;
                                      margin-bottom: 0.75rem;">
                            Nama Lengkap <span style="color: #F5F5F5;">*</span>
                        </label>
                        <input type="text" name="customer_name"
                               value="{{ old('customer_name') }}"
                               placeholder="Masukkan nama lengkap"
                               class="input-field" required>
                        @error('customer_name')
                        <p style="color: #fca5a5; font-size: 0.75rem; margin-top: 0.5rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.72rem; color: #555;
                                      letter-spacing: 0.1em; text-transform: uppercase;
                                      margin-bottom: 0.75rem;">
                            Email <span style="color: #F5F5F5;">*</span>
                        </label>
                        <input type="email" name="customer_email"
                               value="{{ old('customer_email') }}"
                               placeholder="email@contoh.com"
                               class="input-field" required>
                        @error('customer_email')
                        <p style="color: #fca5a5; font-size: 0.75rem; margin-top: 0.5rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div style="grid-column: 1 / -1;">
                        <label style="display: block; font-size: 0.72rem; color: #555;
                                      letter-spacing: 0.1em; text-transform: uppercase;
                                      margin-bottom: 0.75rem;">
                            Nomor WhatsApp <span style="color: #F5F5F5;">*</span>
                        </label>
                        <input type="text" name="customer_wa"
                               value="{{ old('customer_wa') }}"
                               placeholder="08xxxxxxxxxx"
                               class="input-field" required>
                        @error('customer_wa')
                        <p style="color: #fca5a5; font-size: 0.75rem; margin-top: 0.5rem;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- ======================== --}}
            {{-- 02 DETAIL SESI          --}}
            {{-- ======================== --}}
            <div style="padding-bottom: 3rem; border-bottom: 1px solid #1C1C1C; margin-bottom: 3rem;"
                 data-fade>
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                    <span style="font-size: 0.65rem; color: #333; letter-spacing: 0.15em;
                                 text-transform: uppercase; font-weight: 600;">02</span>
                    <span style="font-size: 1rem; color: #F5F5F5; font-weight: 600;">Detail Sesi Foto</span>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div style="grid-column: 1 / -1;">
                        <label style="display: block; font-size: 0.72rem; color: #555;
                                      letter-spacing: 0.1em; text-transform: uppercase;
                                      margin-bottom: 0.75rem;">
                            Paket Foto <span style="color: #F5F5F5;">*</span>
                        </label>
                        <select name="package_id" id="packageSelect" class="input-field" required>
                            <option value="">— Pilih Paket —</option>
                            @foreach($packages as $pkg)
                            <option value="{{ $pkg->id }}"
                                    data-price="{{ $pkg->price }}"
                                    data-dp="{{ $pkg->dp_amount }}"
                                    data-duration="{{ $pkg->duration }}"
                                    data-name="{{ $pkg->name }}"
                                    {{ (old('package_id', $selectedPackage?->id) == $pkg->id) ? 'selected' : '' }}>
                                {{ $pkg->name }} — Rp {{ number_format($pkg->price, 0, ',', '.') }}
                            </option>
                            @endforeach
                        </select>
                        @error('package_id')
                        <p style="color: #fca5a5; font-size: 0.75rem; margin-top: 0.5rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.72rem; color: #555;
                                      letter-spacing: 0.1em; text-transform: uppercase;
                                      margin-bottom: 0.75rem;">
                            Tanggal Sesi <span style="color: #F5F5F5;">*</span>
                        </label>
                        <input type="date" name="booking_date"
                               value="{{ old('booking_date') }}"
                               min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                               class="input-field" required>
                        @error('booking_date')
                        <p style="color: #fca5a5; font-size: 0.75rem; margin-top: 0.5rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.72rem; color: #555;
                                      letter-spacing: 0.1em; text-transform: uppercase;
                                      margin-bottom: 0.75rem;">
                            Jam Mulai <span style="color: #F5F5F5;">*</span>
                        </label>
                        <input type="time" name="start_time" id="startTime"
                               value="{{ old('start_time') }}"
                               class="input-field" required>
                        @error('start_time')
                        <p style="color: #fca5a5; font-size: 0.75rem; margin-top: 0.5rem;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div style="grid-column: 1 / -1;">
                        <label style="display: block; font-size: 0.72rem; color: #555;
                                      letter-spacing: 0.1em; text-transform: uppercase;
                                      margin-bottom: 0.75rem;">
                            Jam Selesai
                            <span style="color: #333; font-size: 0.65rem; margin-left: 0.5rem;">
                                (otomatis dari durasi paket)
                            </span>
                        </label>
                        <input type="time" name="end_time" id="endTime"
                               value="{{ old('end_time') }}"
                               class="input-field" required>
                    </div>
                    <div style="grid-column: 1 / -1;">
                        <label style="display: block; font-size: 0.72rem; color: #555;
                                      letter-spacing: 0.1em; text-transform: uppercase;
                                      margin-bottom: 0.75rem;">Lokasi Sesi</label>
                        <input type="text" name="location"
                               value="{{ old('location') }}"
                               placeholder="Studio Adijaya / Taman Kota / Rumah"
                               class="input-field">
                    </div>
                </div>
            </div>

            {{-- ======================== --}}
            {{-- 03 CATATAN              --}}
            {{-- ======================== --}}
            <div style="padding-bottom: 3rem; border-bottom: 1px solid #1C1C1C; margin-bottom: 3rem;"
                 data-fade>
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                    <span style="font-size: 0.65rem; color: #333; letter-spacing: 0.15em;
                                 text-transform: uppercase; font-weight: 600;">03</span>
                    <span style="font-size: 1rem; color: #F5F5F5; font-weight: 600;">Catatan Tambahan</span>
                </div>
                <textarea name="notes" rows="4"
                          placeholder="Ceritakan konsep foto, referensi, atau request khusus kamu..."
                          class="input-field" style="resize: none;">{{ old('notes') }}</textarea>
            </div>

            {{-- ======================== --}}
            {{-- 04 RINGKASAN            --}}
            {{-- ======================== --}}
            <div data-fade>
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                    <span style="font-size: 0.65rem; color: #333; letter-spacing: 0.15em;
                                 text-transform: uppercase; font-weight: 600;">04</span>
                    <span style="font-size: 1rem; color: #F5F5F5; font-weight: 600;">Ringkasan Booking</span>
                </div>

                {{-- Card Ringkasan --}}
                <div style="border: 1px solid #1C1C1C; border-radius: 20px; overflow: hidden;
                            background: #111111; margin-bottom: 2rem;">

                    {{-- Empty state --}}
                    <div id="summaryEmpty" style="padding: 3rem 2rem; text-align: center;">
                        <div style="width: 48px; height: 48px; border: 1px solid #1C1C1C;
                                    border-radius: 50%; display: flex; align-items: center;
                                    justify-content: center; margin: 0 auto 1rem;">
                            <svg viewBox="0 0 24 24" style="width: 20px; height: 20px; fill: none;
                                 stroke: #333; stroke-width: 1.5;">
                                <rect x="3" y="3" width="18" height="18" rx="3"/>
                                <path d="M9 12h6M12 9v6"/>
                            </svg>
                        </div>
                        <p style="font-size: 0.85rem; color: #333;">
                            Pilih paket untuk melihat ringkasan harga
                        </p>
                    </div>

                    {{-- Filled state --}}
                    <div id="summaryFilled" style="display: none;">

                        {{-- Paket header --}}
                        <div style="padding: 2rem; border-bottom: 1px solid #1C1C1C;
                                    display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <div style="font-size: 0.7rem; color: #555; letter-spacing: 0.1em;
                                            text-transform: uppercase; margin-bottom: 0.4rem;">Paket Dipilih</div>
                                <div id="summaryPackageName"
                                     style="font-size: 1.1rem; font-weight: 700; color: #F5F5F5;"></div>
                                <div id="summaryDuration"
                                     style="font-size: 0.8rem; color: #555; margin-top: 0.3rem;"></div>
                            </div>
                            <div style="text-align: right;">
                                <div style="font-size: 0.7rem; color: #555; margin-bottom: 0.3rem;">Total</div>
                                <div id="summaryPrice"
                                     style="font-size: 1.25rem; font-weight: 800;
                                            color: #F5F5F5; letter-spacing: -0.02em;"></div>
                            </div>
                        </div>

                        {{-- Detail pembayaran --}}
                        <div style="padding: 2rem; display: grid; grid-template-columns: 1fr 1fr;
                                    gap: 1.5rem; border-bottom: 1px solid #1C1C1C;">
                            <div style="padding: 1.5rem; border-radius: 12px; background: #0D1F0D;
                                        border: 1px solid #1a3a1a;">
                                <div style="font-size: 0.7rem; color: #555; letter-spacing: 0.1em;
                                            text-transform: uppercase; margin-bottom: 0.5rem;">DP Minimal</div>
                                <div id="summaryDp"
                                     style="font-size: 1.1rem; font-weight: 700; color: #6ee7b7;"></div>
                                <div style="font-size: 0.72rem; color: #555; margin-top: 0.3rem;">
                                    Dibayar sekarang
                                </div>
                            </div>
                            <div style="padding: 1.5rem; border-radius: 12px; background: #1a1500;
                                        border: 1px solid #3a3000;">
                                <div style="font-size: 0.7rem; color: #555; letter-spacing: 0.1em;
                                            text-transform: uppercase; margin-bottom: 0.5rem;">Sisa Pelunasan</div>
                                <div id="summaryRemaining"
                                     style="font-size: 1.1rem; font-weight: 700; color: #fbbf24;"></div>
                                <div style="font-size: 0.72rem; color: #555; margin-top: 0.3rem;">
                                    Sebelum hari sesi
                                </div>
                            </div>
                        </div>

                        {{-- Info --}}
                        <div style="padding: 1.25rem 2rem;">
                            <p style="font-size: 0.78rem; color: #333; line-height: 1.6;">
                                💡 DP dibayar saat booking untuk mengunci jadwal. Pelunasan dilakukan maksimal H-1 sebelum sesi foto.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Error jadwal --}}
                @if($errors->has('booking_date'))
                <div style="padding: 1rem 1.5rem; border-radius: 12px; background: #1a0a0a;
                            border: 1px solid #3f1515; margin-bottom: 1.5rem;">
                    <p style="color: #fca5a5; font-size: 0.85rem;">
                        ⚠ {{ $errors->first('booking_date') }}
                    </p>
                </div>
                @endif

                {{-- Submit --}}
                <button type="submit" data-magnetic
                        style="width: 100%; padding: 1.25rem; border-radius: 100px;
                               background: #F5F5F5; color: #0A0A0A; border: none;
                               font-size: 0.9rem; font-weight: 700; cursor: none;
                               letter-spacing: 0.02em; display: flex; align-items: center;
                               justify-content: center; gap: 0.75rem; transition: opacity 0.3s;"
                        onmouseover="this.style.opacity='0.85'"
                        onmouseout="this.style.opacity='1'">
                    Lanjut ke Pembayaran
                    <svg viewBox="0 0 16 16" style="width: 14px; height: 14px; fill: none;
                         stroke: currentColor; stroke-width: 2;">
                        <path d="M3 8h10M9 4l4 4-4 4"/>
                    </svg>
                </button>
                <p style="text-align: center; font-size: 0.72rem; color: #333;
                          margin-top: 1rem; letter-spacing: 0.05em;">
                    🔒 Data kamu aman & terenkripsi
                </p>
            </div>

        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const packageSelect  = document.getElementById('packageSelect');
    const startTimeInput = document.getElementById('startTime');

    function formatRupiah(number) {
        return 'Rp ' + parseInt(number).toLocaleString('id-ID');
    }

    function updateSummary() {
        const selected = packageSelect.options[packageSelect.selectedIndex];
        const empty    = document.getElementById('summaryEmpty');
        const filled   = document.getElementById('summaryFilled');

        if (!selected.value) {
            empty.style.display  = 'block';
            filled.style.display = 'none';
            return;
        }

        const price    = parseInt(selected.dataset.price);
        const dp       = parseInt(selected.dataset.dp);
        const duration = parseInt(selected.dataset.duration);

        document.getElementById('summaryPackageName').textContent = selected.dataset.name;
        document.getElementById('summaryDuration').textContent    = duration + ' Jam Sesi';
        document.getElementById('summaryPrice').textContent       = formatRupiah(price);
        document.getElementById('summaryDp').textContent          = formatRupiah(dp);
        document.getElementById('summaryRemaining').textContent   = formatRupiah(price - dp);

        empty.style.display  = 'none';
        filled.style.display = 'block';

        autoSetEndTime(duration);
    }

    function autoSetEndTime(duration) {
        if (!startTimeInput.value || !duration) return;
        const [h, m]  = startTimeInput.value.split(':').map(Number);
        const endDate = new Date();
        endDate.setHours(h + duration, m);
        document.getElementById('endTime').value =
            String(endDate.getHours()).padStart(2, '0') + ':' +
            String(endDate.getMinutes()).padStart(2, '0');
    }

    startTimeInput.addEventListener('change', () => {
        const selected = packageSelect.options[packageSelect.selectedIndex];
        if (selected.value) autoSetEndTime(parseInt(selected.dataset.duration));
    });

    packageSelect.addEventListener('change', updateSummary);
    updateSummary();
</script>
@endpush