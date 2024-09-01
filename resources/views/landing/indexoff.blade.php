@extends('layouts.landing')
@section('title', 'Landing Page')

@section('content')
    <div id="beranda" class="back vh-100">
        <div class="container">
            <div class="text-center mb-3">
                <img src="{{ asset('img/closed.png') }}" alt="close" style="width:200px">
            </div>
            <div class="text-center bg-dark py-2 text-white rounded mb-4 ">
                <p class="display-4 lh-base mb-2">
                    MOHON MAAF
                </p>
                <p class="fs-5 lh-base mb-2">PPDB SDIT Harapan Umat Jember</p>
                <p class="fs-3">"TELAH DITUTUP"</p>
            </div>
            <div class="text-center bg-dark p-4 p-md-3 text-white rounded">
                <p class="fs-5">Bagi calon siswa yang sudah melakukan pendaftaran, silahkan Login web disini</p>
                <a class="btn btn-orange w-50 text-white mb-3" href="{{ route('login') }}">LOGIN</a>
            </div>
        </div>
    </div>
@endsection
