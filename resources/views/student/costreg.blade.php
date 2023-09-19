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
                        <td colspan="2" class="text-center">Rincian Uang gedung belum ditentukan oleh admin</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
@endsection
