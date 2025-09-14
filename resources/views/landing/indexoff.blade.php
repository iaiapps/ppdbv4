@extends('layouts.landing')
@section('title', 'Landing Page')

@section('content')
    <div id="beranda" class="pattern vh-100">
        <div class="container">
            <div class="text-center imglogo">
                <img src="{{ asset('img/closed.png') }}" alt="close" style="width:170px">
            </div>
            <p class="text-center text-light display-4 mb-3">
                MOHON MAAF
            </p>
            <div class="d-flex justify-content-center mb-3">
                <div class="text-center py-2 bg-light rounded px-5 py-3">
                    <p class="fs-5 lh-base mb-2">SPMB SDIT Harapan Umat Jember</p>
                    <p class="fs-3 mb-0">"TELAH DITUTUP"</p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="text-center py-3 p-md-3 text-light rounded">
                    <p class="fs-5 mb-4">Bagi yang sudah melakukan pendaftaran,
                        <br> silahkan Login web disini
                    </p>
                    <a class="btn btn-warning w-100 mb-3" href="{{ route('login') }}">LOGIN</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .pattern {
            background: linear-gradient(135deg, #ff9900, #ff5b5b);
            /* background-image: url({{ asset('img/pattern.svg') }}); */
        }

        @media (max-width: 768px) {
            .imglogo {
                padding-top: 30px;
                margin-bottom: 30px;
            }
        }
    </style>
@endpush
