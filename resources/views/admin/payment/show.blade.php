@extends('layouts.dashboard')

@section('title', 'Detail Pembayaran')

@section('content')

    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100">
        <a href="{{ url()->previous() }}" class="btn btn-outline-primary btn-sm mb-3"> <i class="bi bi-arrow-left-circle"></i>
            kembali</a>
        <br>

        <a href="{{ route('payment.create', $id) }}" class="btn btn-primary btn-sm mb-3"> <i class="bi bi-plus-circle"></i>
            tambah pembayaran</a>
        <p class="fs-5 text-center mb-0">Detail Pembayaran Siswa Baru</p>
        <hr>
        <div class="text-end">
            <p class="d-inline-block px-3 py-2 fs-5 bg-orange rounded ">Total pembayaran <span
                    class="fw-bold">@currency($payments->sum('value'))</span>
            </p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Nama Pembayaran</td>
                    <td>Tanggal</td>
                    <td>Nominal</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $payment->name }}</td>
                        <td>{{ $payment->date }}</td>
                        <td>{{ $payment->value }}</td>
                        <td><a href="{{ route('payment.show', $payment->id) }}">cetak bukti pembayaran</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
