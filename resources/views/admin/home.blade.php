@extends('layouts.dashboard')

@section('title', 'Home Page')

@section('content')
    @include('layouts.partial.name')
    <div class="bg-white rounded p-3 min-vh-100">
        <div class="bg-orange backheight position-relative rounded">
            <img class="logouser p-2 rounded-circle bg-white border border-5 border-orange position-absolute"
                src="{{ asset('img/administrator.png') }}" alt="user" />
        </div>
        <p class="fs-4 mb-2 text-center">
            Selamat Datang Admin di Dashboard Website SPMB SDIT Harapan Umat
            Jember
        </p>
        <p class="text-center mb-2">Waktu server sekarang: <span
                id="server-time">{{ \Carbon\Carbon::now()->translatedFormat('d/m/Y H:i:s') }}</span></p>


        <hr>
        <p class="mb-2">Statistik Web SPMB SDIT Harapan Umat Jember</p>
        <div class="row pt-1 py-3">
            <div class="col-12 col-md-6 gy-2">
                <div class="d-flex justify-content-between border-0 bg-secondary">
                    <div class="bg-radiant2 text-white p-3 d-flex align-items-center justify-content-center">
                        <span class="display-5 px-2">
                            {{ $total->count() }}
                        </span>
                    </div>
                    <div class="text-white p-3 text-end">
                        <p class="fs-4 mb-2">Total Pendaftar</p>
                        <p class="small mb-0">Jumlah Seluruh Pendaftar di Web</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 gy-2">
                <div class="d-flex justify-content-between border-0 bg-secondary h-100">
                    <div class="bg-radiant2 text-white p-3 d-flex align-items-center justify-content-center">
                        <span class="display-5 px-2">
                            @php
                                $aktif = $akun_aktif->count();
                                $form = $akun_isi_formulir->count();
                            @endphp
                            {{ $aktif + $form }}
                        </span>
                    </div>
                    <div class=" text-white p-3 text-end">
                        <p class="fs-4 mb-2">Akun Aktif</p>
                        <p class="small mb-0">Akun sudah membayar biaya pendaftaran</p>

                    </div>
                </div>
            </div>
        </div>
        <hr class="my-3">
        <p class="mb-2">Statistik pengisian dan status Akun SPMB</p>
        <div class="row">
            <div class="col-12 col-md-4 gy-2">
                <div class="d-block border-0 bg-secondary card h-100">
                    <div class="float-start bg-radiant2 text-white p-2">
                        <span class="display-5 px-3 ">
                            {{ $akun_isi_formulir->count() }}
                        </span>
                    </div>
                    <div class="float-end text-white py-2 px-3 d-flex h-100 align-items-center">
                        <p class="fs-4 mb-0">Isi Formulir</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 gy-2">
                <div class="d-block border-0 bg-secondary card h-100">
                    <div class="float-start bg-radiant2 text-white p-2">
                        <span class="display-5 px-3 ">
                            {{ $akun_diterima->count() }}
                        </span>
                    </div>
                    <div class="float-end text-white py-2 px-3 d-flex h-100 align-items-center">
                        <p class="fs-4 mb-0">Diterima</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 gy-2">
                <div class="d-block border-0 bg-secondary card h-100">
                    <div class="float-start bg-radiant2 text-white p-2">
                        <span class="display-5 px-3 ">
                            {{ $akun_ditolak->count() }}
                        </span>
                    </div>
                    <div class="float-end text-white py-2 px-3 d-flex h-100 align-items-center">
                        <p class="fs-4 mb-0">Ditolak</p>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-3">
        <p class="mb-2">Status Pengunduran Diri SPMB</p>
        <div class="row">
            <div class="col-12 col-md-6 gy-2">
                <div class="d-block border-0 bg-secondary card h-100">
                    <div class="float-start bg-radiant2 text-white p-2">
                        <span class="display-5 px-3 ">
                            {{ $akun_mengundurkan_diri->count() }}
                        </span>
                    </div>
                    <div class="float-end text-white py-2 px-3 d-flex h-100 align-items-center">
                        <p class="fs-4 mb-0">Undur Diri</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-center mt-4">
            <a href="{{ route('statistic') }}" class="btn btn-orange text-white btn-sm mb-3">lihat statsitik</a> <br>
            <a class="btn btn-warning w-50 btn-orange text-white" href="{{ route('user.index') }}">
                Informasi pendaftar</a>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Ambil waktu server dari Blade
        let serverTime = new Date("{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}");

        function updateTime() {
            // Tambah 1 detik setiap kali
            serverTime.setSeconds(serverTime.getSeconds() + 1);

            // Format tampilan
            const options = {
                year: "numeric",
                month: "2-digit",
                day: "2-digit",
                hour: "2-digit",
                minute: "2-digit",
                second: "2-digit"
            };
            document.getElementById("server-time").innerText =
                serverTime.toLocaleString("id-ID", options).replace(",", "");
        }

        // Jalankan setiap 1 detik
        setInterval(updateTime, 1000);
    </script>
@endpush
