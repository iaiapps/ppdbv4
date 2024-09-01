@extends('layouts.landing')

@section('title', 'Login Page')
@section('content')
    <div class="container-fluid">

        <div class="row vh-100">
            <div class="col-12 col-md-6 p-5 bg-grey rounded">
                @if ($errors->any())
                    {{-- @foreach ($errors->all() as $error) --}}
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{-- {{ $error }} --}}
                        Nomor WhatssApp atau Password salah!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    {{-- @endforeach --}}
                @endif
                <div class="p-0 p-md-3 text-center ">
                    <img class="logo rounded-circle bg-orange p-1 mb-3" src="{{ asset('img/logosdit.png') }}"
                        alt="logosdit" />
                    <p class="fs-3 mb-0">Login Website PPDB </p>
                    <hr class="mb-2">
                    <!-- <h1>ADMIN PPDB</h1> -->
                    <form class="mt-4" action="{{ route('login') }}" method="POST">
                        @csrf
                        {{-- email atau nomor --}}
                        <div class="mb-3">
                            <input class="form-control fs-med text-center @error('email_number') is-invalid @enderror"
                                type="text" name="email_number" placeholder="Nomor WhatssApp" />
                            {{-- @error('email_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>

                        {{-- password --}}
                        <div class="mb-3">
                            <input class="form-control fs-med text-center @error('password') is-invalid @enderror"
                                type="password" name="password" placeholder="Password" />
                            {{-- @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>

                        <button type="submit" class="btn btn-warning w-100 my-3">
                            LOGIN
                        </button>

                        @if ($show == 'on')
                            <span>atau</span>
                            <a href="{{ route('register') }}" class="btn btn-sm btn-outline-dark w-100 mt-3">Buat
                                akun</a>
                        @endif
                    </form>
                </div>
            </div>
            <div class="col-6 p-5 bg-orange d-none d-md-block text-center">
                <img class="img-fluid pt-3" src="{{ asset('img/gbr.png') }}" alt="gbr" />
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .logo {
            width: 85px;
        }

        .bg-orange {
            background-color: #f79500;
            color: white;
        }
    </style>
@endpush
