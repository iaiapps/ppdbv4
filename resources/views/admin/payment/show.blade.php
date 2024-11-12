@extends('layouts.dashboard')

@section('title', 'Detail Pembayaran')

@section('content')

    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100">
        <a href="{{ route('payment.index') }}" class="btn btn-outline-primary btn-sm mb-3"> <i
                class="bi bi-arrow-left-circle"></i>
            kembali</a>
        <br>

        <a href="{{ route('payment.create', $id) }}" class="btn btn-primary btn-sm mb-3"> <i class="bi bi-plus-circle"></i>
            tambah pembayaran</a>
        <p class="fs-5 text-center mb-0">Detail Pembayaran {{ $student->full_name }}</p>
        <hr>
        <div class="clearfix">

            <div class="float-start">
                <p class="d-inline-block px-3 py-2 fs-5 rounded border border-primary ">Biaya Daftar Ulang <span
                        class="fw-bold">@currency($student->cost_category->total)</span>
                </p>
            </div>
            <div class="float-end">
                <p class="d-inline-block px-3 py-2 fs-5 bg-orange rounded ">Total pembayaran <span
                        class="fw-bold">@currency($payments->sum('value'))</span>
                </p>
            </div>
        </div>

        <table class="table align-middle mt-3">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Nama Pembayaran</td>
                    <td>Telah Terima Dari</td>
                    <td>Tanggal</td>
                    <td>Nominal</td>
                    <td>Terbilang</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $payment->name }}</td>
                        <td>{{ $payment->payment_from }}</td>
                        <td>{{ $payment->date }}</td>
                        <td>{{ $payment->value }}</td>
                        <td>{{ $payment->payment_says }}</td>
                        <td><a href="{{ route('payment.show', $payment->id) }}" class="btn btn-primary"><i
                                    class="bi bi-card-list"></i> lihat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
