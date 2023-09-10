@extends('layouts.landing')
@section('title', 'Landing Page')

@section('content')
    @include('landing.header')
    <div id="beranda" class="back">
        <div class="container pb-5">
            <div class="row">
                <div class="col-12 col-md-6 pt-md-4 center">
                    <div class="pt-3 pt-md-5 ">
                        <h2 class="fs-1 bg-dark py-2 px-3 text-white d-inline-block rounded">
                            PPDB SDIT HARAPAN UMAT JEMBER
                        </h2>
                    </div>
                    <div class="pt-3">
                        <p class="fs-3 m-0">
                            Telah dibuka untuk tahun 2024/2025
                        </p>
                        <p class="fs-3">Segera daftar, kuota terbatas!</p>
                    </div>
                    <div class="pt-3 d-grid gap-2 d-md-block">
                        <a class="btn btn-dark btn-lg" href="{{ route('register') }}">
                            DAFTAR SEKARANG
                        </a>
                        <a href="https://wa.me/6285232213939" target="_blank" class="btn btn-outline-dark btn-lg">
                            WA ADMIN
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 pt-4 order-first order-md-last d-flex justify-content-center ">
                    <img class="gbr" src="{{ asset('img/gbr.png') }}" alt="gbr" />
                </div>
            </div>
        </div>
    </div>
    <div class="text-center bg-dark p-4 p-md-5 text-white top">
        <p class="fs-1">Sudah punya akun PPDB? <br> Login web disini</p>
        <a class="btn btn-orange w-50 btn-lg text-white" as="button" href="{{ route('login') }}">LOGIN</a>
    </div>
    <div id="panduan" class="bg-orange">
        <div class="container py-md-5 py-4">
            <h3 class="fs-1 text-center mb-4 text-white">Panduan Pendaftaran</h3>

            <ol class="list-group list-group-numbered fs-4">
                <li class="list-group-item">Membuat Akun PPDB, di <a
                        href="https://ppdb.sditharum.id/">https://ppdb.sditharum.id/</a></li>
                <li class="list-group-item">Membayar biaya pendaftaran sebesar :
                    <span class="bg-orange text-white px-1 rounded fw-bold">Rp 300.000</span>
                    ke rekening <span class="bg-orange text-white px-1 rounded fw-bold">BSI 4441234007</span> a.n.
                    Sekolah Dasar Islam Terpadu Harapan Umat
                    Jember.
                </li>
                <li class="list-group-item"> Upload bukti pembayaran ke web <a
                        href="https://ppdb.sditharum.id/">https://ppdb.sditharum.id/</a>
                    tunggu konfirmasi 1 x 24 jam.</li>
                <li class="list-group-item"> Setelah konfirmasi berhasil, mengisi formulir pendaftaran <a
                        href="https://ppdb.sditharum.id/">https://ppdb.sditharum.id/</a></li>
                <li class="list-group-item"> Menunggu pengumuman lanjutan dari sekolah, yang akan ditampilkan di website
                    PPDB.</li>
            </ol>

            {{-- <div class="row">
                <div class="col-12 col-md-6 p-2">
                    <div class="box-card bg-orange-panduan p-3">
                        <i class="bi bi-person-circle display-5"></i>
                        <p>
                            Membuat Akun PPDB, di <a href="https://ppdb.sditharum.id/">https://ppdb.sditharum.id/</a>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6 p-2">
                    <div class="box-card bg-orange-panduan p-3">
                        <i class="bi bi-coin display-5"></i>
                        <p>
                            Membayar biaya pendaftaran sebesar :
                            <span class="bg-orange text-white p-1 rounded fw-bold">Rp 300.000</span>
                            ke rekening sekolah BSI 4441234007 a.n.
                            Sekolah Dasar Islam Terpadu Harapan Umat
                            Jember.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6 p-2">
                    <div class="box-card bg-orange-panduan p-3">
                        <i class="bi bi-phone-flip display-5"></i>
                        <p>
                            Upload bukti transfer ke web <a href="https://ppdb.sditharum.id/">https://ppdb.sditharum.id/</a>
                            tunggu konfirmasi 1 x 24 jam.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6 p-2">
                    <div class="box-card bg-orange-panduan p-3">
                        <i class="bi bi-input-cursor-text display-5"></i>
                        <p>
                            Setelah konfirmasi berhasil, mengisi formulir pendaftaran <a
                                href="https://ppdb.sditharum.id/">https://ppdb.sditharum.id/</a></p>
                    </div>
                </div>
                <div class="col-12 col-md-6 p-2">
                    <div class="box-card bg-orange-panduan p-3">
                        <i class="bi bi-envelope-paper display-5"></i>
                        <p>
                            Menunggu pengumuman lanjutan dari sekolah.
                            Yang akan ditampilkan di website PPDB.
                        </p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <div id="jadwal" class="container">
        <h3 class="text-center fs-1 pt-3 pt-md-5">
            Jadwal Pendaftaran (Timeline)
        </h3>
        <div class="row mb-5 text-center">
            @forelse ($times as $time)
                <div class="col-6 col-md-4 py-3">
                    <div class="p-3 box-card bg-orange">
                        <img class="img-ket mb-1" src="{{ asset('img') . '/' . $time->icon }}" />
                        <p class="py-1 px-2 fs-5 my-2 bg-white rounded"> {{ $time->name }}
                        </p>
                        <p class="fs-4 text-black m-0 ">
                            {{ $time->date }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="p-3 bg-orange">
                    <p>belum ada data</p>
                </div>
            @endforelse
        </div>
    </div>

    <div id="kontak" class="bg-orange py-5">
        <div class="container ">
            <div class="p-4 px-5 bg-white rounded">
                <div class="row text-center">
                    <div class="text-center col-12 col-md-5">
                        <img src="{{ asset('img/scdh.png') }}" alt="scdh" class="gbr-cp" />
                        <h3>Jam Pelayanan</h3>
                        <h4 class="bg-orange rounded px-3 py-1">Senin s/d Jum'at</h4>
                        <p class="fs-4">08.00-15.30</p>
                        <h4 class="bg-orange rounded px-3 py-1">Sabtu</h4>
                        <p class="fs-4">08.00-11.30</p>
                    </div>
                    <div class="col-2 d-none d-md-block">
                        <div class="vr"></div>
                    </div>
                    <div class="text-center col-12 col-md-5">
                        <img src="{{ asset('img/wa.png') }}" alt="wa" class="gbr-cp" />
                        <h3>Hubungi Kami</h3>
                        <h4 class="fs-4 bg-orange rounded px-3 py-1">Ust Ristiono</h4>
                        <p class="fs-4">088-289-378-109</p>
                        <h4 class="fs-4 bg-orange rounded px-3 py-1">Pak Ikrom (konfirmasi)</h4>
                        <p class="fs-4">0852-3221-3939</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('landing.footer')
@endsection
