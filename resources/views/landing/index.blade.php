@extends('layouts.landing')
@section('title', 'Landing Page')

@section('content')
    @include('landing.header')
    <div id="beranda" class="back">
        <div class="container pb-5">
            <div class="row">
                <div class="col-12 col-md-6 pt-md-4 center">
                    <div class="pt-3 pt-md-5 ">
                        <h2 class="fs-2 fw-bold bg-dark py-2 px-3 text-white d-inline-block rounded">
                            PPDB SDIT HARAPAN UMAT JEMBER
                        </h2>
                    </div>
                    <div class="py-3">
                        <p class="fs-3 m-0">
                            Telah dibuka untuk tahun 2024/2025
                        </p>
                        <p class="fs-3">Segera daftar, kuota terbatas!</p>
                    </div>
                    <div class=" d-grid gap-2 d-md-block">
                        <a class="btn btn-dark btn-lg" href="{{ route('register') }}">
                            DAFTAR SEKARANG
                        </a>
                        @desktop
                            <a href="https://web.whatsapp.com/send/?phone=6285232213939" target="_blank"
                                class="btn btn-outline-dark btn-lg">
                                WA ADMIN</a>
                        @elsedesktop
                            <a href="whatsapp://send?phone=6285232213939" target="_blank" class="btn btn-outline-dark btn-lg">
                                WA ADMIN</a>
                        @enddesktop

                    </div>
                </div>
                <div class="col-12 col-md-6 pt-4 order-first order-md-last d-flex justify-content-center ">
                    <img class="gbr" src="{{ asset('img/gbr.png') }}" alt="gbr" />
                </div>
            </div>
        </div>
    </div>
    <div class="text-center bg-dark p-4 p-md-5 text-white top">
        <p class="fs-2">Sudah punya akun ? <br> Login web disini</p>
        <a class="btn btn-orange w-50 btn-lg text-white" href="{{ route('login') }}">LOGIN</a>
    </div>
    <div id="panduan" class="bg-orange">
        <div class="container py-md-5 py-4">
            <h3 class="fs-2 text-center mb-4 text-white">Panduan Pendaftaran</h3>

            <ol class="list-group list-group-numbered fs-5">
                <li class="list-group-item">Membuat Akun PPDB, di <a
                        href="https://ppdb.sditharum.id/">https://ppdb.sditharum.id/</a></li>
                <li class="list-group-item">Membayar biaya pendaftaran sebesar :
                    <span class="bg-orange text-white px-1 rounded fw-bold badge">Rp 300.000</span>
                    ke rekening <span class="bg-orange text-white px-1 rounded fw-bold badge">BSI 4441234007</span> a.n.
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

    <div id="panduan" class="bg-orange">
        <div class="container pb-md-5 pb-4">
            <h3 class="fs-2 text-center mb-4 text-white">Syarat Pendaftaran</h3>

            <ol class="list-group list-group-numbered fs-5 text-center">
                <li class="list-group-item">FC KK (Kartu Keluarga) dan Akte Lahir</li>
                <li class="list-group-item">FC Ijazah TK atau Surat Keterangan Lulus </li>
                <li class="list-group-item"> Pas Foto 3x4 3 lembar background biru</li>
            </ol>
        </div>
    </div>

    <div id="jadwal" class="container">
        <h3 class="text-center fs-2 pt-3 pt-md-5">
            Jadwal Pendaftaran (Timeline)
        </h3>
        <div class="row mb-5 text-center">
            @forelse ($times as $time)
                <div class="col-6 col-md-4 py-3">
                    <div class="p-3 box-card bg-orange">
                        <img class="img-ket mb-1" src="{{ asset('img') . '/' . $time->icon }}" />
                        <p class="py-1 px-2 fs-5 my-2 bg-white rounded"> {{ $time->name }}
                        </p>
                        <p class="fs-5 text-black m-0 ">
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
                        <h4>Jam Pelayanan</h4>
                        <h4 class="bg-orange rounded px-3 py-1">Senin s/d Jum'at</h4>
                        <p class="fs-4">08.00-15.30</p>
                        <h4 class="bg-orange rounded px-3 py-1">Sabtu (online)</h4>
                        <p class="fs-4">08.00-11.30</p>
                    </div>
                    <div class="col-2 d-none d-md-block">
                        <div class="vr"></div>
                    </div>
                    <div class="text-center col-12 col-md-5">
                        <img src="{{ asset('img/wa.png') }}" alt="wa" class="gbr-cp" />
                        <h4>Hubungi Kami</h4>
                        @forelse ($contacts as $contact)
                            <h4 class="bg-orange rounded px-3 py-1">{{ $contact->desc }}</h4>
                            <p class="fs-4">{{ $contact->value }}</p>
                        @empty
                            <div class="p-3 bg-orange">
                                <p>belum ada data</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('landing.footer')
@endsection
