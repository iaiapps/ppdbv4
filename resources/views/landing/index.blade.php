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
                        @foreach ($taglines as $tagline)
                            <p class="fs-3 m-0">
                                {{ $tagline->value }}
                            </p>
                        @endforeach
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
        <a class="btn btn-orange w-50 text-white" href="{{ route('login') }}">LOGIN</a>
    </div>
    <div id="panduan" class="bg-orange">
        <div class="container py-md-5 py-4">
            <h3 class="fs-2 text-center mb-4 text-white">Panduan Pendaftaran</h3>

            <ol class="list-group list-group-numbered fs-med">
                <li class="list-group-item">Membuat Akun PPDB, di web <a
                        href="https://ppdb.sditharum.id/">https://ppdb.sditharum.id/</a></li>
                <li class="list-group-item">Membayar biaya pendaftaran sebesar :
                    <span class="bg-orange text-white px-1 rounded fw-bold badge">Rp 300.000</span>
                    ke rekening <span class="bg-orange text-white px-1 rounded fw-bold badge">BSI 2005720055</span> a.n.
                    SDIT HARAPAN UMAT
                </li>
                <li class="list-group-item"> Upload bukti pembayaran ke web <a
                        href="https://ppdb.sditharum.id/">https://ppdb.sditharum.id/</a> dan
                    menunggu konfirmasi admin (maks 1 x 24 jam).</li>
                <li class="list-group-item"> Setelah konfirmasi berhasil, selanjutnya mengisi formulir pendaftaran di <a
                        href="https://ppdb.sditharum.id/">https://ppdb.sditharum.id/</a></li>
                <li class="list-group-item"> Menunggu pengumuman lanjutan dari sekolah, yang akan ditampilkan di web
                    PPDB.</li>
            </ol>
        </div>
    </div>

    {{-- syarat --}}
    <div id="syarat" class="bg-orange">
        <div class="container pb-md-5 pb-4">
            <h3 class="fs-2 text-center mb-4 text-white">Syarat Pendaftaran</h3>
            <ul class="list-group fs-med text-center">
                <li class="list-group-item">FC KK (Kartu Keluarga) dan Akte Lahir</li>
                <li class="list-group-item">FC Ijazah TK atau Surat Keterangan Lulus </li>
                <li class="list-group-item"> Pas Foto 3x4 3 lembar dengan background biru</li>
                <li class="list-group-item"> (*Diserahkan setelah dinyatakan lulus dan diterima sebagai siswa SDIT Harapan
                    Umat)</li>
            </ul>
        </div>
    </div>

    <div id="jadwal" class="container">
        <h3 class="text-center fs-2 pt-3 pt-md-5">
            Jadwal Pendaftaran (Timeline)
        </h3>

        @if ($tahap_1 != null)
            <hr>
            <h5 class="text-center">Pendaftaran Tahap 1 (Early Bird)</h5>
            <div class="row mb-5 text-center justify-content-center">
                @foreach ($tahap_1 as $t_1)
                    <div class="col-6 col-md-3 py-3">
                        <div class="p-3 box-card bg-orange">
                            <img class="img-ket mb-1" src="{{ asset('img') . '/' . $t_1->icon }}" />
                            <p class="py-1 px-2 my-2 bg-white rounded"> {{ $t_1->name }}
                            </p>
                            <p class="fs-med text-black m-0 ">
                                {{ $t_1->date }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if ($tahap_2 != null)
            <hr>
            <h5 class="text-center">Pendaftaran Tahap 2</h5>
            <div class="row mb-5 text-center justify-content-center">
                @foreach ($tahap_2 as $t_2)
                    <div class="col-6 col-md-3 py-3">
                        <div class="p-3 box-card bg-orange">
                            <img class="img-ket mb-1" src="{{ asset('img') . '/' . $t_2->icon }}" />
                            <p class="py-1 px-2 my-2 bg-white rounded"> {{ $t_2->name }}
                            </p>
                            <p class="fs-med text-black m-0 ">
                                {{ $t_2->date }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if ($other != null)
            <hr>
            <h5 class="text-center">Jadwal Lain</h5>
            <div class="row mb-5 text-center justify-content-center">
                @foreach ($other as $o)
                    <div class="col-6 col-md-3 py-3">
                        <div class="p-3 box-card bg-orange">
                            <img class="img-ket mb-1" src="{{ asset('img') . '/' . $o->icon }}" />
                            <p class="py-1 px-2 my-2 bg-white rounded"> {{ $o->name }}
                            </p>
                            <p class="fs-med text-black m-0 ">
                                {{ $o->date }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>

    <div id="kontak" class="bg-orange py-5">
        <div class="container ">
            <div class="p-4 px-5 bg-white rounded">
                <div class="row text-center">
                    <div class="text-center col-12 col-md-5">
                        <img src="{{ asset('img/scdh.png') }}" alt="scdh" class="gbr-cp" />
                        <h5>Jam Pelayanan</h5>
                        <h5 class="bg-orange rounded px-3 py-1">Senin s/d Jum'at</h5>
                        <p class="fs-4">08.00-15.30</p>
                        <h5 class="bg-orange rounded px-3 py-1">Sabtu (online)</h5>
                        <p class="fs-4">08.00-11.30</p>
                    </div>
                    <div class="col-2 d-none d-md-block">
                        <div class="vr"></div>
                    </div>
                    <div class="text-center col-12 col-md-5">
                        <img src="{{ asset('img/wa.png') }}" alt="wa" class="gbr-cp" />
                        <h5>Hubungi Kami</h5>
                        @forelse ($contacts as $contact)
                            <h5 class="bg-orange rounded px-3 py-1">{{ $contact->desc }}</h5>
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

@push('css')
    <style>
        @media (max-width: 600px) {
            .btn-lg {
                font-size: 1.05rem
            }
        }
    </style>
@endpush
