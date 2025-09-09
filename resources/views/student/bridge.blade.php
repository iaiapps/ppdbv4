@extends('layouts.landing')

@section('title', 'Bridge Page')

@section('content')
    @include('landing.up')
    <div class="bg-orange">
        <div class="container">
            <div class="d-flex flex-column pt-4 pt-md-0 justify-content-md-center vh-100">
                <div class="bg-white p-3 p-md-5 rounded shadow">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show"> Bukti pembayaran berhasil di upload
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show"> Gambar gagal diupload, ukuran melebihi
                            batas atau
                            type gambar bukan .jpg atau .png <button type="button" class="btn-close"
                                data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="text-center">
                        <img class="logobridge rounded p-1 mb-2" src="{{ asset('img/user.png') }}" alt="user" />
                        <p class="fs-4 text-black"> Assalamualaikum, <strong>{{ $user->name }} </strong> </p>
                    </div>
                    <ul class="list-group mb-3">
                        <li class="list-group-item lh-med">
                            Sebelum melanjutkan pendaftaran, lakukan pembayaran
                            terlebih dahulu untuk <b>mengaktifkan Akun</b>.
                        </li>
                        <li class="list-group-item lh-med">
                            Biaya pendaftaran sebesar:
                            <span class="badge bg-orange textt">Rp 350.000</span>, pembayaran melalui
                            rekening sekolah <span class="badge bg-orange textt">BSI 2005720055</span><br />
                            a.n SDIT HARAPAN UMAT
                        </li>
                        <li class="list-group-item lh-med">
                            Upload bukti pembayaran disini

                            @if (!Auth::user()->document->isEmpty())
                                <button type="button" class="btn btn-primary rounded btn-sm" disabled><i
                                        class="bi bi-check-circle"></i> sudah
                                    upload</button>
                            @else
                                <button type="button" class="btn btn-primary align-middle" data-bs-toggle="modal"
                                    data-bs-target="#document">
                                    upload
                                </button>
                            @endif

                        </li>

                        <li class="list-group-item lh-med">
                            Bukti pembayaran akan divalidasi, dan Akun akan aktif dalam 1 x 24 jam, jika akun belum aktif
                            silahkan hubungi ke
                            @desktop
                                <a href="https://web.whatsapp.com/send/?phone=6285232213939" target="_blank"
                                    class="btn btn-success btn-sm"> No. WA Admin</a>
                            @elsedesktop
                                <a href="https://wa.me/6285232213939" target="_blank" class="btn btn-success btn-sm"> No. WA
                                    Admin</a>
                            @enddesktop
                        </li>
                    </ul>
                    <form action="{{ route('logout') }}" method="post">
                        <div class="btn-group mt-2 w-100">
                            <a href="{{ route('home') }}" class="btn btn-orange d-block-inline w-100 text-white"> Refresh
                                Page</a>
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

        .lh-med {
            line-height: 1.5em;
        }

        .textt {
            font-size: 0.9rem !important;
        }
    </style>
@endpush
