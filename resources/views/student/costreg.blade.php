@extends('layouts.dashboard')

@section('title', 'Cost Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-5 text-center">Rincian Biaya Daftar Ulang Ananda :</p>
        <p class="fs-5 fw-bold text-center">{{ $student->full_name }}</p>
        <hr>
        <div class="table-responsive">
            <table id="table" class="table table-bordered rounded">
                <thead>
                    <tr>
                        <th scope="col">Uraian</th>
                        <th scope="col">Biaya</th>
                    </tr>
                </thead>
                @if ($student->cost_category_id)
                    <tbody>
                        <tr>
                            <td>Infaq Gedung</td>
                            <td>@currency($student->cost_category->gedung)</td>
                        </tr>
                        <tr>
                            <td>Infaq Perpustakaan</td>
                            <td>@currency($student->cost_category->perpustakaan)</td>
                        </tr>
                        <tr>
                            <td>Infaq Kegiatan</td>
                            <td>@currency($student->cost_category->kegiatan)</td>
                        </tr>
                        <tr>
                            <td>Buku dan Media</td>
                            <td>@currency($student->cost_category->bukumedia)</td>
                        </tr>
                        <tr>
                            <td>Seragam</td>
                            <td>@currency($student->cost_category->seragam)</td>
                        </tr>
                        <tr>
                            <td>Jilbab</td>
                            <td>@currency($student->cost_category->jilbab)</td>
                        </tr>
                        <tr>
                            <td>IPP</td>
                            <td>@currency($student->cost_category->ipp)</td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td class="fw-bold fs-5 bg-light">@currency($student->cost_category->gedung + $student->cost_category->perpustakaan + $student->cost_category->kegiatan + $student->cost_category->bukumedia + $student->cost_category->seragam + $student->cost_category->jilbab + $student->cost_category->ipp)
                            </td>
                        </tr>
                    </tbody>
                @else
                    <tr>
                        <td colspan="2" class="text-center">Rincian Uang gedung belum ditentukan, silahkan hubungi <a
                                href="https://wa.me/085232213939" target="_blank" class="btn btn-primary btn-sm">admin</a>
                        </td>
                    </tr>
                @endif
            </table>
        </div>
        <hr>
        <p>Catatan Registrasi Ulang</p>
        <div>
            <ol class="list-group list-group-numbered">
                <li class="list-group-item">Cek Rincian Daftar Ulang yang tertera. Besar biaya daftar ulang di atas sudah
                    termasuk snack dan makan siang satu bulan pertama. </li>
                <li class="list-group-item">Pembayaran pertama minimal Rp 6.000.000,-</li>
                <li class="list-group-item">Pembayaran melalui transfer Bank Syariah Indonesia No. Rek. 4441234007. a/n :
                    SDIT HARAPAN UMAT </li>
                <li class="list-group-item">Setelah melakukan transfer, mohon mengirimkan konfirmasi dengan melampirkan
                    bukti transfer ke nomor 0811-3717-716. dengan format sbb: PPDB#nama pengirim#nama siswa</li>
                <li class="list-group-item">Batas Daftar Ulang Maksimal hingga 22 Februari 2023. Bagi yang tidak melakukan
                    daftar ulang (tanpa konfirmasi) hingga waktu yang telah di tentukan, maka kami nyatakan mengundurkan
                    diri.</li>
            </ol>
        </div>
    </div>
@endsection
