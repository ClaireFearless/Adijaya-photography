@extends('layouts.app')

@section('title', 'Pembayaran — Adijaya Photography')

@section('content')

<div style="min-height: 100vh; padding-top: 120px; padding-bottom: 8rem;">
    <div class="container-main" style="max-width: 760px;">

        {{-- Header --}}
        <div style="margin-bottom: 5rem;">
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;" data-fade>
                <div class="divider" style="width: 40px;"></div>
                <span class="text-label">Pembayaran</span>
            </div>
            <h1 data-reveal style="font-size: clamp(2.5rem, 6vw, 5rem); font-weight: 900;
                                    letter-spacing: -0.04em; line-height: 0.95;">
                Pilih Metode<br>Pembayaran
            </h1>
        </div>

        {{-- Steps --}}
        <div style="display: flex; align-items: center; margin-bottom: 5rem;" data-fade>
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 28px; height: 28px; border-radius: 50%;
                            border: 1px solid #2A2A2A; display: flex; align-items: center;
                            justify-content: center; font-size: 0.7rem; color: #555;">✓</div>
                <span style="font-size: 0.8rem; color: #333;">Isi Data</span>
            </div>
            <div style="width: 60px; height: 1px; background: #F5F5F5; margin: 0 1rem;"></div>
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 28px; height: 28px; border-radius: 50%; background: #F5F5F5;
                            display: flex; align-items: center; justify-content: center;
                            font-size: 0.7rem; font-weight: 700; color: #0A0A0A;">2</div>
                <span style="font-size: 0.8rem; color: #F5F5F5; font-weight: 500;">Pembayaran</span>
            </div>
            <div style="width: 60px; height: 1px; background: #2A2A2A; margin: 0 1rem;"></div>
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 28px; height: 28px; border-radius: 50%; border: 1px solid #2A2A2A;
                            display: flex; align-items: center; justify-content: center;
                            font-size: 0.7rem; color: #333;">3</div>
                <span style="font-size: 0.8rem; color: #333;">Konfirmasi</span>
            </div>
        </div>

        {{-- Booking Info --}}
        <div style="border: 1px solid #1C1C1C; border-radius: 20px; padding: 2rem;
                    margin-bottom: 3rem; background: #111111;" data-fade>
            <div style="display: flex; justify-content: space-between; align-items: center;
                        flex-wrap: wrap; gap: 1rem;">
                <div>
                    <div style="font-size: 0.7rem; color: #555; letter-spacing: 0.1em;
                                text-transform: uppercase; margin-bottom: 0.4rem;">Kode Booking</div>
                    <div style="font-size: 1.1rem; font-weight: 800; color: #F5F5F5;
                                letter-spacing: 0.05em;">{{ $booking->booking_code }}</div>
                </div>
                <div style="text-align: right;">
                    <div style="font-size: 0.7rem; color: #555; letter-spacing: 0.1em;
                                text-transform: uppercase; margin-bottom: 0.4rem;">Paket</div>
                    <div style="font-size: 0.95rem; font-weight: 600; color: #F5F5F5;">
                        {{ $booking->package->name }}
                    </div>
                </div>
            </div>

            <div style="height: 1px; background: #1C1C1C; margin: 1.5rem 0;"></div>

            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem;">
                <div>
                    <div style="font-size: 0.7rem; color: #555; letter-spacing: 0.1em;
                                text-transform: uppercase; margin-bottom: 0.4rem;">Tanggal</div>
                    <div style="font-size: 0.875rem; color: #F5F5F5;">
                        {{ \Carbon\Carbon::parse($booking->booking_date)->translatedFormat('d F Y') }}
                    </div>
                </div>
                <div>
                    <div style="font-size: 0.7rem; color: #555; letter-spacing: 0.1em;
                                text-transform: uppercase; margin-bottom: 0.4rem;">Waktu</div>
                    <div style="font-size: 0.875rem; color: #F5F5F5;">
                        {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }} —
                        {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }} WIB
                    </div>
                </div>
                <div>
                    <div style="font-size: 0.7rem; color: #555; letter-spacing: 0.1em;
                                text-transform: uppercase; margin-bottom: 0.4rem;">Nama</div>
                    <div style="font-size: 0.875rem; color: #F5F5F5;">
                        {{ $booking->customer_name }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Pilih Tipe Pembayaran --}}
        <div style="margin-bottom: 3rem;" data-fade>
            <div style="font-size: 0.7rem; color: #555; letter-spacing: 0.15em;
                        text-transform: uppercase; margin-bottom: 1.5rem;">
                Pilih Tipe Pembayaran
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">

                {{-- Opsi DP --}}
                <label style="cursor: none;">
                    <input type="radio" name="payment_option" value="dp"
                           id="optionDp" style="display: none;" checked>
                    <div id="cardDp"
                         onclick="selectPayment('dp')"
                         style="border: 1px solid #F5F5F5; border-radius: 16px;
                                padding: 1.75rem; transition: all 0.3s; cursor: none;">
                        <div style="font-size: 1.5rem; margin-bottom: 1rem;">💰</div>
                        <div style="font-weight: 700; color: #F5F5F5; font-size: 0.95rem;
                                    margin-bottom: 0.4rem;">Bayar DP</div>
                        <div style="font-size: 0.8rem; color: #555; margin-bottom: 1.25rem;
                                    line-height: 1.5;">
                            Bayar uang muka dulu, lunasi sebelum hari sesi
                        </div>
                        <div style="font-size: 1.25rem; font-weight: 800; color: #6ee7b7;
                                    letter-spacing: -0.02em;">
                            Rp {{ number_format($booking->dp_amount, 0, ',', '.') }}
                        </div>
                        <div style="font-size: 0.72rem; color: #555; margin-top: 0.3rem;">
                            dari total Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                        </div>
                    </div>
                </label>

                {{-- Opsi Lunas --}}
                <label style="cursor: none;">
                    <input type="radio" name="payment_option" value="full"
                           id="optionFull" style="display: none;">
                    <div id="cardFull"
                         onclick="selectPayment('full')"
                         style="border: 1px solid #1C1C1C; border-radius: 16px;
                                padding: 1.75rem; transition: all 0.3s; cursor: none;">
                        <div style="font-size: 1.5rem; margin-bottom: 1rem;">✅</div>
                        <div style="font-weight: 700; color: #F5F5F5; font-size: 0.95rem;
                                    margin-bottom: 0.4rem;">Bayar Lunas</div>
                        <div style="font-size: 0.8rem; color: #555; margin-bottom: 1.25rem;
                                    line-height: 1.5;">
                            Bayar penuh sekarang, tidak perlu pelunasan lagi
                        </div>
                        <div style="font-size: 1.25rem; font-weight: 800; color: #F5F5F5;
                                    letter-spacing: -0.02em;">
                            Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                        </div>
                        <div style="font-size: 0.72rem; color: #6ee7b7; margin-top: 0.3rem;">
                            ✓ Lunas, tidak ada sisa pembayaran
                        </div>
                    </div>
                </label>
            </div>
        </div>

        {{-- Metode Pembayaran --}}
        <div style="border: 1px solid #1C1C1C; border-radius: 16px; padding: 1.75rem;
                    margin-bottom: 3rem; background: #111111;" data-fade>
            <div style="font-size: 0.7rem; color: #555; letter-spacing: 0.15em;
                        text-transform: uppercase; margin-bottom: 1.25rem;">
                Metode Pembayaran Tersedia
            </div>
            <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
                @foreach(['Transfer Bank', 'GoPay', 'OVO', 'DANA', 'QRIS', 'ShopeePay', 'Alfamart', 'Indomaret'] as $m)
                <span style="padding: 0.4rem 0.875rem; border: 1px solid #2A2A2A;
                             border-radius: 100px; font-size: 0.75rem; color: #555;">
                    {{ $m }}
                </span>
                @endforeach
            </div>
        </div>

        {{-- Tombol Bayar --}}
        <div data-fade>
            <button id="payButton" data-magnetic
                    style="width: 100%; padding: 1.25rem; border-radius: 100px;
                           background: #F5F5F5; color: #0A0A0A; border: none;
                           font-size: 0.9rem; font-weight: 700; cursor: none;
                           letter-spacing: 0.02em; display: flex; align-items: center;
                           justify-content: center; gap: 0.75rem; transition: opacity 0.3s;"
                    onmouseover="this.style.opacity='0.85'"
                    onmouseout="this.style.opacity='1'">
                <span id="payBtnText">Bayar Sekarang</span>
                <svg id="payBtnArrow" viewBox="0 0 16 16"
                     style="width: 14px; height: 14px; fill: none;
                            stroke: currentColor; stroke-width: 2;">
                    <path d="M3 8h10M9 4l4 4-4 4"/>
                </svg>
                <svg id="payBtnLoader" viewBox="0 0 24 24"
                     style="display: none; width: 18px; height: 18px; fill: none;
                            stroke: currentColor; stroke-width: 2;
                            animation: spin 1s linear infinite;">
                    <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83"/>
                </svg>
            </button>
            <p style="text-align: center; font-size: 0.72rem; color: #333;
                      margin-top: 1rem; letter-spacing: 0.05em;">
                🔒 Pembayaran aman diproses oleh Midtrans
            </p>
        </div>

    </div>
</div>

<style>
@keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
</style>

@endsection

@push('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>

<script>
    let selectedPayment = 'dp';

    function selectPayment(type) {
        selectedPayment = type;
        const cardDp   = document.getElementById('cardDp');
        const cardFull = document.getElementById('cardFull');

        if (type === 'dp') {
            cardDp.style.borderColor   = '#F5F5F5';
            cardFull.style.borderColor = '#1C1C1C';
        } else {
            cardFull.style.borderColor = '#F5F5F5';
            cardDp.style.borderColor   = '#1C1C1C';
        }
    }

    document.getElementById('payButton').addEventListener('click', function() {
        const btn    = this;
        const text   = document.getElementById('payBtnText');
        const arrow  = document.getElementById('payBtnArrow');
        const loader = document.getElementById('payBtnLoader');

        // Loading state
        btn.disabled        = true;
        text.textContent    = 'Memproses...';
        arrow.style.display = 'none';
        loader.style.display = 'block';

        fetch('{{ route("payment.process") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                booking_code: '{{ $booking->booking_code }}',
                payment_type: selectedPayment
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.snap_token) {
                snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        window.location.href = '{{ route("booking.success", $booking->booking_code) }}';
                    },
                    onPending: function(result) {
                        window.location.href = '{{ route("booking.success", $booking->booking_code) }}';
                    },
                    onError: function(result) {
                        resetButton();
                        alert('Pembayaran gagal. Silakan coba lagi.');
                    },
                    onClose: function() {
                        resetButton();
                    }
                });
            } else {
                resetButton();
                alert(data.message || 'Terjadi kesalahan. Silakan coba lagi.');
            }
        })
        .catch(() => {
            resetButton();
            alert('Terjadi kesalahan koneksi.');
        });
    });

    function resetButton() {
        const btn    = document.getElementById('payButton');
        const text   = document.getElementById('payBtnText');
        const arrow  = document.getElementById('payBtnArrow');
        const loader = document.getElementById('payBtnLoader');

        btn.disabled         = false;
        text.textContent     = 'Bayar Sekarang';
        arrow.style.display  = 'block';
        loader.style.display = 'none';
        btn.style.opacity    = '1';
    }
</script>
@endpush