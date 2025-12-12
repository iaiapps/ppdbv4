@extends('layouts.dashboard')

@section('title', 'Cost Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-5 text-center mb-1">Rincian Biaya Daftar Ulang Ananda :</p>
        <p class="fs-5 fw-bold text-center">{{ $student->full_name }}</p>
        <hr>
        @if ($student->cost_category_id)
            <div class="row justify-content-center mb-3">
                <div class="col-md-6 col-12">
                    <p class="fs-4 text-center my-3">Biaya Awal</p>
                    <div class="text-center imgbox border rounded border-2 border-orange">
                        <img id="zoomable-img" src="{{ asset('img/rincian.svg') }}" alt="imgrincian">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <p class="my-3 fs-4 text-center">Biaya Daftar Ulang Yang Harus Dibayar</p>
                    <div class="table-responsive border rounded border-2 border-orange boxtable p-2">
                        <table id="table" class="table table-bordered rounded">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Uraian</th>
                                    <th scope="col">Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Infaq Gedung</td>
                                    <td class="text-end"> @currency($student->cost_category->gedung) </td>
                                </tr>
                                <tr>
                                    <td>Infaq Perpustakaan</td>
                                    <td class="text-end">@currency($student->cost_category->perpustakaan)</td>
                                </tr>
                                <tr>
                                    <td>Infaq Kegiatan</td>
                                    <td class="text-end">@currency($student->cost_category->kegiatan)</td>
                                </tr>
                                <tr>
                                    <td>Buku dan Media</td>
                                    <td class="text-end">@currency($student->cost_category->bukumedia)</td>
                                </tr>
                                <tr>
                                    <td>Seragam</td>
                                    <td class="text-end">@currency($student->cost_category->seragam)</td>
                                </tr>
                                <tr>
                                    <td>Jilbab</td>
                                    <td class="text-end">@currency($student->cost_category->jilbab)</td>
                                </tr>
                                <tr>
                                    <td>IPP</td>
                                    <td class="text-end">@currency($student->cost_category->ipp)</td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td class="fw-bold fs-5 bg-light w-50 text-end">@currency($student->cost_category->total)
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- <p>*Kontak Daftar Ulang ke <b>Admin keuangan</b> <a href="https://wa.me/08113717716" target="_blank"
                    class="btn btn-primary btn-sm">klik disini</a></p> --}}
            <div class="mt-4">
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item">Biaya daftar ulang di atas, sudah termasuk snack dan makan siang satu
                        bulan pertama. </li>
                    <li class="list-group-item">Pembayaran pertama minimal Rp 6.000.000, </li>
                    <li class="list-group-item">Dibayarkan melalui transfer ke No. Rek. BSI 2005720055. a/n
                        : SDIT HARAPAN UMAT </li>
                    <li class="list-group-item">Konfirmasi pembayaran dengan melampirkan bukti transfer
                        dengan format: SPMB#nama pengirim#nama siswa. Dikirim ke <span><a class="btn btn-primary btn-sm"
                                href="https://wa.me/628113717716">admin keuangan</a></span>
                    </li>
                    <li class="list-group-item">Bagi yang tidak melakukan daftar ulang (tanpa konfirmasi) hingga
                        {{ trim(explode('-', $date_cost->date)[1]) }}, maka kami nyatakan
                        mengundurkan diri.</li>
                </ol>
            </div>
        @else
            <div class="text-center">
                <p class="fs-5">Rincian Uang gedung belum ditentukan</p>

                <p>Tunggu pengumuman pada <span class="link"> <a href="{{ route('student.timeline') }}">jadwal yang
                            ditentukan</a> </span></p>
                <p> atau silahkan hubungi <a href="https://wa.me/628113717716" target="_blank"
                        class="btn btn-success ">Admin</a> </p>
            </div>
        @endif
    </div>
@endsection

@push('css')
    <style>
        .imgbox {
            overflow: scroll;
            width: 100%;
            height: 600px;
            position: relative;
        }

        .imgsize {
            width: 600px;
        }

        .boxtable {
            height: 600px;
        }

        @media (max-width: 600px) {
            .boxtable {
                height: 350px;
            }
        }
    </style>
@endpush
