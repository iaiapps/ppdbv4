@extends('layouts.dashboard')

@section('title', 'Home Page')

@section('content')

    @include('layouts.partial.name')
    <div class="bg-white rounded p-3 text-center min-vh-100">
        <div class="bg-orange backheight position-relative rounded">
            <img class="logouser p-2 rounded-circle bg-white border border-5 border-orange position-absolute"
                src="{{ asset('img/administrator.png') }}" alt="user" />
        </div>
        <p class="fs-4 m-0 text-center">
            Selamat datang Admin di Dashboard website PPDB SDIT Harapan Umat
            Jember
        </p>

        <div class="row py-3">
            <div class="col-12 gy-2">
                <div class="d-block border-0 bg-secondary card h-100">
                    <div class="float-start bg-orange w-25 text-white p-2 h-100">
                        <span class="display-5 ">
                            {{ $akun_dibuat->count() }}
                        </span>
                    </div>
                    <div class="float-end text-white text-center h-100 middle py-2 px-3 lh-lg">
                        <span class="fs-4">Akun Dibuat</span>
                    </div>

                    {{-- <div class="card-footer text-muted bg-transparent border-0 text-end">
                                <button class="btn btn-dark btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="View">lihat data</button>
                            </div> --}}
                </div>
            </div>
            <hr class="my-3">

            <div class="col-12 col-md-6 gy-2">
                <div class="d-block border-0 bg-secondary card h-100">
                    <div class="float-start bg-orange w-25 text-white p-2 h-100">
                        <span class="display-5 ">
                            {{ $akun_aktif->count() }}
                        </span>
                    </div>
                    <div class="float-end text-white text-center h-100 middle py-2 px-3 lh-lg">
                        <span class="fs-4">Akun Aktif</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 gy-2">
                <div class="d-block border-0 bg-secondary card h-100">
                    <div class="float-start bg-orange w-25 text-white p-2 h-100">
                        <span class="display-5 ">
                            {{ $akun_isi_formulir->count() }}
                        </span>
                    </div>
                    <div class="float-end text-white text-center h-100 middle py-2 px-3 lh-lg">
                        <span class="fs-4">Isi Formulir</span>
                    </div>
                </div>
            </div>

            <hr class="my-3">
            <div class="col-12 col-md-6 gy-2">
                <div class="d-block border-0 bg-secondary card h-100">
                    <div class="float-start bg-orange w-25 text-white p-2 h-100">
                        <span class="display-5 ">
                            {{ $akun_diterima->count() }}
                        </span>
                    </div>
                    <div class="float-end text-white text-center h-100 middle py-2 px-3 lh-lg">
                        <span class="fs-4">Diterima</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 gy-2">
                <div class="d-block border-0 bg-secondary card h-100">
                    <div class="float-start bg-orange w-25 text-white p-2 h-100">
                        <span class="display-5 ">
                            {{ $akun_ditolak->count() }}
                        </span>
                    </div>
                    <div class="float-end text-white text-center h-100 middle py-2 px-3 lh-lg">
                        <span class="fs-4">Ditolak</span>
                    </div>
                </div>
            </div>
        </div>

        <a class="btn btn-warning w-50 my-4 btn-orange" href="{{ route('user.index') }}">
            Informasi pendaftar</a>
    </div>


@endsection
