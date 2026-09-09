@extends('layouts.landing')

@section('title', 'Pilih Cabang')

@section('content')
    @include('landing.up')

    <section class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Pilih Cabang Pendaftaran</h2>
                <p class="text-muted fs-5">Silakan pilih cabang sekolah yang ingin didaftarkan</p>
            </div>

            <div class="row justify-content-center g-4">
                <!-- SDITHarum 1 -->
                <div class="col-md-5 d-flex">
                    <form action="{{ route('branch.store') }}" method="POST" class="w-100">
                        @csrf
                        <input type="hidden" name="branch" value="sditharum_1">
                        <div class="card border-0 shadow-sm branch-card h-100" onclick="this.closest('form').submit()">
                            <div class="card-body text-center p-4 d-flex flex-column">
                                <div class="mb-3">
                                    <img src="{{ asset('img/logoutama.svg') }}" alt="logo" style="width: 80px;">
                                </div>
                                <h5 class="fw-bold">SDIT HARAPAN UMAT JEMBER</h5>
                                <p class="text-muted mb-3">
                                    <i class="bi bi-geo-alt me-1"></i> Jl. Danau Toba, Gg. Islamic Center, Sumbersari Jember
                                </p>
                                <div class="mt-auto pt-3">
                                    <button type="submit" class="btn btn-orange text-white w-50">
                                        Pilih Cabang Ini <i class="bi bi-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- SDITHarum 2 -->
                <div class="col-md-5 d-flex">
                    <form action="{{ route('branch.store') }}" method="POST" class="w-100">
                        @csrf
                        <input type="hidden" name="branch" value="sditharum_2">
                        <div class="card border-0 shadow-sm branch-card h-100" onclick="this.closest('form').submit()">
                            <div class="card-body text-center p-4 d-flex flex-column">
                                <div class="mb-3">
                                    <img class="border rounded-circle" src="{{ asset('img/harum2.jpg') }}" alt="logo"
                                        style="width: 80px;">
                                </div>
                                <h5 class="fw-bold">HARAPAN UMAT - Nature and Bilingual School</h5>
                                <p class="text-muted mb-3">
                                    <i class="bi bi-geo-alt me-1"></i> Jl. Parang tritis Rt 01, Rw 07 lingkungan Pelinggian
                                    Antirogo Jember
                                </p>
                                <div class="mt-auto pt-3">
                                    <button type="submit" class="btn btn-orange text-white w-50">
                                        Pilih Cabang Ini <i class="bi bi-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('landing') }}" class="text-muted text-decoration-none">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </section>

    @include('landing.footer')
@endsection

@push('css')
    <style>
        .branch-card {
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 16px;
        }

        .branch-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15) !important;
            border-color: #f97f2a !important;
        }

        .text-orange {
            color: #f97f2a !important;
        }
    </style>
@endpush
