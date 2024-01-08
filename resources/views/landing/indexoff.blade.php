@extends('layouts.landing')
@section('title', 'Landing Page')

@section('content')
    {{-- @include('landing.header') --}}


    <div id="beranda" class="back vh-100">
        <div class="container pb-5">
            <div class="text-center mb-3">
                <img src="{{ asset('img/closed.png') }}" alt="close" style="width:200px">
            </div>
            <h2 class="text-center fs-2 bg-dark py-2 px-4 text-white rounded lh-base">
                MOHON MAAF PPDB SDIT HARAPAN UMAT JEMBER TAHUN 2024/2025 TELAH DITUTUP
            </h2>
        </div>
        <div class="text-center bg-dark p-4 p-md-3 text-white">
            <p class="fs-2">Bagi calon siswa yang sudah melakukan pendfataran <br> silahkan Login web disini</p>
            <a class="btn btn-orange w-50 btn-lg text-white mb-3" href="{{ route('login') }}">LOGIN</a>
        </div>
    </div>

    {{-- @include('landing.footer') --}}
@endsection
