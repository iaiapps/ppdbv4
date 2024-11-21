@extends('layouts.dashboard')

@section('title', 'Edit Cost Category Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-5 text-center">Tambah data Pembayaran</p>
        <hr>
        <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="student_id" value="{{ $id }}" hidden>
            <table id="table" class="table table-bordered rounded align-middle">
                <tbody>
                    <tr>
                        <td>Nama Pembayaran</td>
                        <td> <input type="text" class="form-control" name="name"
                                placeholder="contoh : pembayaran daftar ulang ke-1">
                        </td>
                    </tr>
                    <tr>
                        <td>Telah Terima dari</td>
                        <td> <input type="text" class="form-control" name="payment_from"
                                placeholder="nama yang membayar">
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Pembayaran</td>
                        <td> <input type="date" class="form-control" name="date"> </td>
                    </tr>
                    <tr>
                        <td>Nominal pembayaran</td>
                        <td> <input type="number" class="form-control" name="value"> </td>
                    </tr>
                    <tr>
                        <td>Terbilang</td>
                        <td> <input type="jumlah" class="form-control" name="payment_says"> </td>
                    </tr>
                    <tr>
                        <td>Bukti Pembayaran</td>
                        <td> <input type="file" class="form-control" name="document"> </td>
                        <input type="text" name="type" value="upload_bukti_daftar_ulang" hidden>
                        <input type="text" name="name_pembayaran" value="{{ $name->full_name }}" hidden>
                    </tr>
                </tbody>
            </table>
            <small class="mb-3 d-block">*dokumen berupa .jpeg atau .png maksimal 1mb</small>
            <button type="submit" class="btn btn-danger mb-3 w-100">simpan</button>
        </form>
    </div>
@endsection
