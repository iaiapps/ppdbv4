@extends('layouts.dashboard')

@section('title', 'Cost Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-5 text-center mb-1">Rincian Biaya Daftar Ulang Ananda :</p>
        <p class="fs-5 fw-bold text-center">{{ $student->full_name }}</p>
        <hr>
        @if ($student->cost_category_id)
            <div class="row justify-content-center">
                <div class="col-md-8 col-12">
                    <div class="table-responsive">
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
                                    <td> @currency($student->cost_category->gedung) </td>
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
                                    <td class="fw-bold fs-5 bg-light w-50">@currency($student->cost_category->gedung + $student->cost_category->perpustakaan + $student->cost_category->kegiatan + $student->cost_category->bukumedia + $student->cost_category->seragam + $student->cost_category->jilbab + $student->cost_category->ipp)
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <p>*Kontak Daftar Ulang ke <b>Admin keuangan</b> <a href="https://wa.me/08113717716" target="_blank"
                    class="btn btn-primary btn-sm">klik disini</a></p>
            <div>
                <ul class="list-group">
                    <li class="list-group-item">Biaya daftar ulang di atas, sudah termasuk snack dan makan siang satu
                        bulan pertama. </li>
                    <li class="list-group-item">Pembayaran pertama minimal Rp 6.000.000, </li>
                    <li class="list-group-item">Dibayarkan melalui transfer ke BSI No. Rek. 2005720055. a/n
                        : SDIT HARAPAN UMAT </li>
                    <li class="list-group-item">Konfirmasi pembayaran dengan melampirkan bukti transfer ke nomor
                        08113717716 dengan format: PPDB#nama pengirim#nama siswa</li>
                    <li class="list-group-item">Bagi yang tidak melakukan daftar ulang (tanpa konfirmasi) hingga waktu yang
                        telah di tentukan, maka kami nyatakan
                        mengundurkan diri.</li>
                </ul>
            </div>
        @else
            <div class="text-center">
                <p class="fs-5">Rincian Uang gedung belum ditentukan</p>

                <p>Tunggu pengumuman pada <span class="link"> <a href="{{ route('student.timeline') }}">jadwal yang
                            ditentukan</a> </span></p>
                <p> atau silahkan hubungi <a href="https://wa.me/085232213939" target="_blank"
                        class="btn btn-success ">Admin</a> </p>
            </div>
        @endif
        <hr>
    </div>
@endsection
