@extends('layouts.dashboard')

@section('title', 'Detail Pembayaran')

@section('content')

    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100">
        <a href="{{ url()->previous() }}" class="btn btn-outline-primary btn-sm mb-3"> <i class="bi bi-arrow-left-circle"></i>
            kembali</a>
        <br>
        <div id="cetak" class="px-4">
            <div class="text-center">
                <img class="kop" src="{{ asset('img/kopkuitansi.svg') }}" alt="kop" />
            </div>
            <hr>
            <p class="fs-5 text-center">Kuitansi Pembayaran Daftar Ulang </p>
            <p class="mt-3">Telah terima dari</p>
            <table class="table">
                <tbody>
                    <tr>
                        <td class="lebartd1">Bapak/Ibu</td>
                        <td>:</td>
                        <td class="lebartd2"> namaOrtu </td>
                    </tr>
                    <tr>
                        <td>Nama Siswa</td>
                        <td>:</td>
                        <td> {{ $payment->student->full_name }} </td>
                    </tr>
                    <tr>
                        <td>Untuk Pembayaran</td>
                        <td>:</td>
                        <td> {{ $payment->name }} </td>
                    </tr>
                    <tr>
                        <td>Uang Sejumlah</td>
                        <td>:</td>
                        <td> jumlah </td>
                    </tr>
                    <tr>
                        <td>Nominal</td>
                        <td>:</td>
                        <td class="fs-5"><b>Rp. nominal </b></td>
                    </tr>
                </tbody>
            </table>

            <div class="boxttd my-3 text-center position-relative clearfix">
                <div class="float-end">
                    <p class="m-0">Jember, custom(tanggal) </p>
                    <br />
                    <br />
                    <p class="m-0"><b>Keu. SDIT Harum</b></p>
                    <div class="imgttd">
                        <img src="img/stam.png" alt="stempel" />
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('css')
    <style>
        .kop {
            width: 80% !important;
        }

        .lebartd1 {
            width: 180px !important;
        }
    </style>
@endpush
