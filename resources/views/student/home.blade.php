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
            <p class="my-1 text-white bg-danger p-1 rounded fs-3 fw-bold">Mohon Maaf ananda Belum Diterima di SDIT Harum
                Jember</p>
        @endif
    </div>

    @if (Auth::user()->hasRole('akun_isi_formulir'))
        <div class="bg-white rounded p-3 min-vh-100 text-center">
            <div class="bg-orange backheight position-relative rounded">
                <img class="logouser p-2 rounded-circle bg-white border border-5 border-orange position-absolute"
                    src="{{ asset('img/user.png') }}" alt="user" />
            </div>
            <div>
                <p class="fs-5 text-center">
                    Terima Kasih telah mengisi formulir pendaftaran di Web PPDB SDIT Harapan Umat Jember</p>
                <p>Tahap selanjutnya adalah psikotest, yang dilaksanakan sesuai jadwal yang ditentukan. </p>
                <div class="btn-group w-75 my-3" role="group" aria-label="Basic example">
                    <a class="btn btn-orange" href="{{ route('student.timeline') }}">
                        Informasi Jadwal</a>
                    <a class="btn btn-primary" href="{{ route('student.profile') }}">
                        Informasi pendaftar</a>
                </div>
                <img src="{{ asset('img/rincian.svg') }}" alt="imgrincian" class="img-fluid">
            </div>
        </div>
    @elseif (Auth::user()->hasRole('akun_diterima'))
        <div class="bg-white rounded p-3 min-vh-100 text-center">
            <div class="bg-orange backheight position-relative rounded">
                <img class="logouser p-2 rounded-circle bg-white border border-5 border-orange position-absolute"
                    src="{{ asset('img/user.png') }}" alt="user" />
            </div>
            <div>
                <p class="fs-4 m-0 text-center">
                    Tahap selanjutnya adalah daftar ulang. Rincian biaya daftar ulang bisa dilihat di bawah
                </p>
                <a class="btn btn-orange w-50 my-4" href="{{ route('student.cost') }}">
                    Lihat rincian biaya daftar ulang</a>
            </div>
        </div>
    @elseif (Auth::user()->hasRole('akun_ditolak'))
        <div class="bg-white rounded p-3 min-vh-100 text-center">
            <div class="bg-orange backheight position-relative rounded">
                <img class="logouser p-2 rounded-circle bg-white border border-5 border-orange position-absolute"
                    src="{{ asset('img/user.png') }}" alt="user" />
            </div>
            <div>
                <p class="my-1  p-1 rounded fs-3 fw-bold">Jangan putus asa dan tetap semangat</p>
            </div>
        </div>
    @endif


@endsection
