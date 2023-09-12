@extends('layouts.dashboard')

@section('title', 'Home Page')

@section('content')

    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 mb-3 text-center">
        <p class="m-0">status</p>
        @if (Auth::user()->hasRole('akun_isi_formulir'))
            <p class="my-1 text-white bg-secondary p-1 rounded fs-3 fw-bold">MENUNGGU</p>
        @elseif (Auth::user()->hasRole('akun_diterima'))
            <p class="my-1 text-white bg-primary p-1 rounded fs-3 fw-bold">Selamat, ananda "DITERIMA" di SDIT Harum
                Jember
            </p>
        @elseif (Auth::user()->hasRole('akun_ditolak'))
            <p class="my-1 text-white bg-primary p-1 rounded fs-3 fw-bold">Mohon Maaf ananda Belum Diterima di SDIT Harum
                Jember</p>
        @endif
    </div>

    <div class="bg-white rounded p-3 min-vh-100 text-center">
        <div class="bg-orange backheight position-relative rounded">
            <img class="logouser p-2 rounded-circle bg-white border border-5 border-orange position-absolute"
                src="{{ asset('img/user.png') }}" alt="user" />
        </div>
        @if (Auth::user()->hasRole('akun_isi_formulir'))
            <div>
                <p class="fs-4 m-0 text-center">
                    Terima Kasih telah mendaftar di Web PPDB SDIT Harum Jember
                </p>
                <a class="btn btn-orange w-50 my-4" href="{{ route('student.profile') }}">
                    Informasi pendaftar</a>
                <img src="{{ asset('img/rincian.svg') }}" alt="imgrincian" class="img-fluid">
            </div>
        @elseif (Auth::user()->hasRole('akun_diterima'))
            <div>
                <p class="fs-4 m-0 text-center">
                    Agenda selanjutnya adalah daftar ulang. Lihat rincian baiaya daftar ulang disini
                </p>
                <a class="btn btn-orange w-50 my-4" href="{{ route('student.profile') }}">
                    Informasi rincian biaya daftar ulang ananda</a>
            </div>
        @endif

    </div>

@endsection
