@extends('layouts.landing')

@section('title', 'Pilih Cabang')

@section('content')
    @include('landing.up')

    <section class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <img src="{{ asset('img/logoutama.svg') }}" alt="logo" style="width: 100px;" class="mb-3">
                <h2 class="fw-bold">Pilih Cabang Pendaftaran</h2>
                <p class="text-muted fs-5">Silakan pilih cabang sekolah yang ingin didaftarkan</p>
            </div>

            <div class="row justify-content-center g-4">
                <!-- SDITHarum 1 -->
                <div class="col-md-5">
                    <form action="{{ route('branch.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="branch" value="sditharum_1">
                        <div class="card border-0 shadow-sm h-100 branch-card" onclick="this.closest('form').submit()">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <i class="bi bi-building fs-1 text-orange"></i>
                                </div>
                                <h4 class="fw-bold">SDIT Harapan Umat 1</h4>
                                <p class="text-muted mb-3">
                                    <i class="bi bi-geo-alt me-1"></i> Gg. Islamic Center, Jl. Danau Toba, Jember
                                </p>
                                <ul class="list-unstyled text-start mx-auto" style="max-width: 250px;">
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Kurikulum Nasional + JSIT</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Kelas Qur'an & Sains</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Pramuka SIT Wajib</li>
                                </ul>
                                <button type="submit" class="btn btn-orange btn-lg text-white w-100 mt-3">
                                    Pilih Cabang Ini <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- SDITHarum 2 -->
                <div class="col-md-5">
                    <form action="{{ route('branch.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="branch" value="sditharum_2">
                        <div class="card border-0 shadow-sm h-100 branch-card" onclick="this.closest('form').submit()">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <i class="bi bi-building fs-1 text-orange"></i>
                                </div>
                                <h4 class="fw-bold">SDIT Harapan Umat 2</h4>
                                <p class="text-muted mb-3">
                                    <i class="bi bi-geo-alt me-1"></i> Jl. Letto No.1, Jember
                                </p>
                                <ul class="list-unstyled text-start mx-auto" style="max-width: 250px;">
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Kurikulum Nasional + JSIT</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Kelas Qur'an & Sains</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Pramuka SIT Wajib</li>
                                </ul>
                                <button type="submit" class="btn btn-orange btn-lg text-white w-100 mt-3">
                                    Pilih Cabang Ini <i class="bi bi-arrow-right ms-2"></i>
                                </button>
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
