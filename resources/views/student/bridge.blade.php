@extends('layouts.landing')

@section('title', 'Bridge Page')

@section('content')

    <div class="bg-orange">
        <div class="container">
            <div class="d-flex flex-column pt-4 pt-md-0 justify-content-md-center vh-100">
                <div class="bg-white p-3 p-md-5 rounded shadow">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show"> Bukti pembayaran berhasil di upload
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="text-center">
                        <img class="logobridge rounded p-1 mb-2" src="{{ asset('img/user.png') }}" alt="user" />
                        <p class="fs-4 text-black"> Assalamualaikum, <strong>{{ $user->name }} </strong> </p>
                    </div>
                    <ul class="list-group  mb-3">
                        <li class="list-group-item">
                            Sebelum melanjutkan pendaftaran, lakukan pembayaran
                            terlebih dahulu untuk <b>mengaktifkan Akun</b>.
                        </li>
                        <li class="list-group-item">
                            Biaya pendaftaran sebesar:
                            <span class="badge bg-orange">Rp 300.000</span>, pembayaran melalui
                            rekening sekolah <span class="badge bg-orange">BSI 4441234007</span><br />
                            a.n SDIT HARAPAN UMAT
                        </li>
                        <li class="list-group-item">
                            Upload bukti pembayaran disini

                            @if (Auth::user()->document)
                                <button type="button" class="btn btn-primary rounded text-white" disabled><i
                                        class="bi bi-check-circle"></i> sudah
                                    upload</button>
                            @else
                                <button type="button" class="btn btn-primary align-middle" data-bs-toggle="modal"
                                    data-bs-target="#document">
                                    upload
                                </button>
                            @endif

                        </li>

                        <li class="list-group-item">
                            Bukti pemabayaran akan divalidasi, dan Akun akan aktif dalam 1 x 24 jam, jika akun belum aktif
                            silahkan hubungi ke
                            @desktop
                                <a href="https://web.whatsapp.com/send/?phone=6285232213939" target="_blank"
                                    class="btn btn-success"> No. WA Admin</a>
                            @elsedesktop
                                <a href="https://wa.me/6285232213939" target="_blank" class="btn btn-success"> No. WA
                                    Admin</a>
                            @enddesktop
                        </li>
                    </ul>
                    <form action="{{ route('logout') }}" method="post">
                        <div class="btn-group mt-2 w-100">
                            <a href="{{ route('home') }}" class="btn btn-primary d-block-inline w-100"> Refresh Page</a>
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">logout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('student.upload')
@endsection
@push('css')
    <style>
        .logobridge {
            width: 70px;
        }
    </style>
@endpush
