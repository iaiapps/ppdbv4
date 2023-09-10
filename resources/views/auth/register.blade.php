@extends('layouts.landing')

@section('title', 'Register Page')
@section('content')
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-12 col-md-5 p-3 pattern">
                <div class="text-white p-3">
                    <div class="text-center mb-3">
                        <img class="logo rounded bg-white p-2 mt-0 mt-md-3 mb-3" src="{{ asset('img/registration.png') }}"
                            alt="logosdit" />
                        <h3>Informasi Pendaftaran</h3>
                        <hr class="hr" />
                    </div>
                    <ol class="fs-5">
                        <li>
                            Buat akun PPDB untuk mendaftar di website PPDB SDIT
                            Harum
                        </li>
                        <li>Akun yang sudah dibuat berstatus "Tidak Aktif".</li>
                        <li>
                            Akun akan "Aktif" jika sudah membayar biaya
                            pendaftaran dan dikonfirmasi oleh admin PPDB.
                        </li>
                        <li>Mengisi formulir pendaftaran yang disediakan</li>
                    </ol>
                    <hr class="hr" />
                </div>
            </div>
            <div class="col-12 col-md-7 p-5">
                <div class="text-center">
                    <div class="px-0 px-md-5 mb-4">
                        <img class="logo rounded-circle bg-orange p-1 mb-3" src="{{ asset('img/logosdit.png') }}"
                            alt="logosdit" />
                        <h3>Buat Akun PPDB</h3>
                        <hr />
                    </div>
                    <div class="px-0 px-md-5">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            {{-- name --}}
                            <div class="mb-3">
                                <input type="text"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
                                    placeholder="Nama lengkap calon siswa " required />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- number --}}
                            <div class="mb-3">
                                <input type="text"
                                    class="form-control form-control-lg @error('email_number') is-invalid @enderror"
                                    name="email_number" placeholder="No Wa Aktif (cth: 085xxxx)" />
                                @error('email_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- password --}}
                            <div class="form-group mb-3">
                                <input type="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror "
                                    name="password" placeholder="Password" />

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="password"
                                    class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" placeholder="Ulangi Password" />
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning btn-lg my-3 w-100">Buat Akun</button>
                        </form>

                        <div class="text-center text-muted">atau</div>
                        <br />
                        <a href="{{ route('login') }}" class="btn btn-outline-dark w-100 ">Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .logo {
            width: 80px;
        }

        .pattern {
            background-color: #f79500;
            background-image: url({{ asset('img/pattern.svg') }});
        }

        .hr {
            margin-top: 30px;
            border: 1px solid white;
            opacity: 1;
        }

        @media (max-width: 700px) {
            .fs-5 {
                font-size: 1rem !important;
            }
        }
    </style>
@endpush
