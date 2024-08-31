@extends('layouts.dashboard')

@section('title', 'Home Page')

@section('content')

    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 mb-3 text-center">
        <p class="m-0">status PPDB</p>
        @if (Auth::user()->hasRole('akun_isi_formulir'))
            <p class="my-1 text-white bg-secondary p-2 rounded fs-5 fw-bold">Menunggu Hasil Pengumuman PPDB</p>
        @elseif (Auth::user()->hasRole('akun_diterima'))
            <p class="my-1 text-white bg-primary p-2 rounded fs-5 fw-bold">Selamat, ananda "DITERIMA" di SDIT Harum
                Jember
            </p>
        @elseif (Auth::user()->hasRole('akun_ditolak'))
            <p class="my-1 text-white bg-danger p-2 rounded fs-5 fw-bold">Mohon Maaf ananda Belum Diterima di SDIT Harum
                Jember</p>
        @endif
    </div>

    {{-- foto --}}

    @if (isset($data->document))
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3"> Foto berhasil di upload
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card p-3 mb-3">
            <div class="text-center">
                {{-- ini settingan untuk hosting --}}
                {{-- <img src="{{ url('storage/public/img-document/' . $d->document) }}" alt="document" class="img-fluid"> --}}

                {{-- ini setting untuk lokal --}}
                <img src="{{ asset('storage/img-document/' . $data->document) }}" alt="document"
                    class="p-2 bg-white border border-5 border-orange foto">
            </div>
        </div>
        <div class="bg-white rounded p-3 mb-3 text-center">
            <button href="#" class="btn btn-warning" disabled>upload foto TK</button>
        </div>
    @else
        <div class="bg-white rounded p-3 mb-3 text-center">
            <img class="logouser p-2 rounded-circle bg-white border border-5 border-orange"
                src="{{ asset('img/user.png') }}" alt="user" />
            <a href="{{ route('upload_foto') }}" class="btn btn-warning">upload foto TK</a>
        </div>
    @endif

    @if (Auth::user()->hasRole('akun_isi_formulir'))
        <div class="bg-white rounded p-3 min-vh-100 text-center">
            <div>
                <p class="text-center">
                    Terima Kasih telah mengisi formulir pendaftaran di Web PPDB SDIT Harapan Umat Jember</p>
                <p>Tahap selanjutnya adalah psikotest, yang dilaksanakan sesuai jadwal yang ditentukan. </p>
                <div class="btn-group w-100 my-3">
                    <a class="btn btn-orange w-100" href="{{ route('student.timeline') }}">
                        Informasi Jadwal</a>
                    <a class="btn btn-primary w-100" href="{{ route('student.profile') }}">
                        Data Pendaftar</a>
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
                    Tahap selanjutnya adalah daftar ulang. <br> Untuk melihat rincian biaya daftar ulang klik tombol dibawah
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

@push('css')
    <style>
        .foto {
            width: 50%;
        }

        @media (max-width: 700px) {
            .foto {
                width: 75%
            }
        }
    </style>
@endpush
