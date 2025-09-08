@extends('layouts.landing')
@section('title', 'Landing Page')
@section('content')
    @include('landing.up')
    <!-- Countdown Section -->
    <section class="d-flex align-items-center justify-content-center text-white text-center bg-gradient">
        <div class="top">
            <div class="text-center mt-5 mb-4">
                <img class="logo" src="{{ asset('img/logosdit.png') }}" alt="logo">
            </div>
            <h2 class="mb-3 fw-bold fs-1">SEGERA DIBUKA</h2>
            <p class="mb-4 px-3 fs-4" style="max-width: 600px; margin:auto;">
                Sistem Penerimaan Murid Baru SDIT Harapan Umat Jember tahun 2026/2027.
            </p>
            <hr>
            <div id="timer" class="countdown-grid">
                <div class="countdown-card">
                    <span id="days" class="time">00</span>
                    <p>HARI</p>
                </div>
                <div class="countdown-card">
                    <span id="hours" class="time">00</span>
                    <p>JAM</p>
                </div>
                <div class="countdown-card">
                    <span id="minutes" class="time">00</span>
                    <p>MENIT</p>
                </div>
                <div class="countdown-card">
                    <span id="seconds" class="time">00</span>
                    <p>DETIK</p>
                </div>
            </div>
            <a href="https://wa.me/6285232213939" target="_blank" class="btn btn-success btn-lg text-white mt-5">Hubungi
                Admin</a>
        </div>
    </section>
@endsection

@push('css')
    <style>
        .logo {
            width: 110px;
        }

        .top {
            margin-bottom: 200px;
        }

        .countdown-grid {
            display: grid;
            grid-template-columns: repeat(4, auto);
            gap: 1rem;
            justify-content: center;
        }

        .bg-gradient {
            background: linear-gradient(135deg, #ff9f5a, #ff4d6e) !important;
        }

        #timer .countdown-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px 20px;
            min-width: 120px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(6px);
        }

        #timer .time {
            font-size: 3rem;
            font-weight: bold;
            color: #fff;
            display: block;
        }

        #timer p {
            margin: 0;
            font-size: 1rem;
            letter-spacing: 2px;
            color: #ffffff;
        }

        @media (max-width: 768px) {
            .countdown-grid {
                grid-template-columns: repeat(2, auto);
                row-gap: 1.5rem;
            }
        }
    </style>
@endpush
@push('scripts')
    <script>
        // Atur tanggal target (15 September 2025, 00:00:00)
        const countdownDate = new Date("Sep 15, 2025 00:00:00").getTime();

        const x = setInterval(function() {
            const now = new Date().getTime();
            const distance = countdownDate - now;

            if (distance < 0) {
                clearInterval(x);
                location.reload();
            } else {
                document.getElementById("days").innerText = Math.floor(distance / (1000 * 60 * 60 * 24));
                document.getElementById("hours").innerText = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 *
                    60 * 60));
                document.getElementById("minutes").innerText = Math.floor((distance % (1000 * 60 * 60)) / (1000 *
                    60));
                document.getElementById("seconds").innerText = Math.floor((distance % (1000 * 60)) / 1000);
            }
        }, 1000);
    </script>
@endpush
