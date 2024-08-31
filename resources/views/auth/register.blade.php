@extends('layouts.landing')

@section('title', 'Register Page')
@section('content')
    <div class="d-flex p-3 pattern justify-content-center min-vh-100">
        <div class="col-12 col-md-6">
            <div class="text-center bg-white p-3 py-5 rounded">
                <div class="px-0 px-md-5 mb-4">
                    <img class="logo rounded-circle bg-orange p-1 mb-3" src="{{ asset('img/logosdit.png') }}" alt="logosdit" />
                    <h4>Buat Akun PPDB</h4>
                    <hr />
                </div>
                <div class="px-0 px-md-5">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        {{-- name --}}
                        <div class="mb-3">
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                                placeholder="Nama lengkap calon siswa" required />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- number --}}
                        <div class="mb-3">
                            <input type="text" class="form-control  @error('email_number') is-invalid @enderror"
                                name="email_number" placeholder="No Wa Aktif (cth: 085xxxx)" />
                            @error('email_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- password --}}
                        <div class="form-group mb-3">
                            <input type="password" class="form-control  @error('password') is-invalid @enderror "
                                name="password" placeholder="Password (min 8 karakter)" />

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="password"
                                class="form-control  @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" placeholder="Ulangi Password" />
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning my-3 w-100">Buat Akun</button>
                    </form>

                    <div class="text-center text-muted">atau</div>
                    <br />
                    <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm w-75 ">Login
                    </a>
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
    </style>
@endpush
