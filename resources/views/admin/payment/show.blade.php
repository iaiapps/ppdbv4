@extends('layouts.dashboard')

@section('title', 'Detail Pembayaran')

@section('content')

    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100">
        <a href="{{ route('payment.index') }}" class="btn btn-outline-primary btn-sm mb-3"> <i
                class="bi bi-arrow-left-circle"></i>
            kembali</a>
        <br>

        <a href="{{ route('payment.create', $id) }}" class="btn btn-primary mb-3"> <i class="bi bi-plus-circle"></i>
            tambah pembayaran</a>
        <p class="fs-5 text-center mb-0">Detail Pembayaran {{ $student->full_name }}</p>
        <hr>
        <div class="clearfix">

            <div class="float-start">
                @if (isset($student->cost_category->total))
                    <p class="d-inline-block px-3 py-2 fs-5 rounded border border-primary ">Biaya Daftar Ulang <span
                            class="fw-bold">@currency($student->cost_category->total)</span>
                    </p>
                @else
                    <p class="d-inline-block px-3 py-2 fs-5 rounded border border-primary "> belum ditentukan </p>
                @endif


            </div>
            <div class="float-end">
                <p class="d-inline-block px-3 py-2 fs-5 bg-orange rounded ">Total pembayaran <span
                        class="fw-bold">@currency($payments->sum('value'))</span>
                </p>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mt-3">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Nama Pembayaran</td>
                        <td>Telah Terima Dari</td>
                        <td>Tanggal</td>
                        <td>Nominal</td>
                        <td>Bukti Pembayaran</td>
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
                            <td>@currency($payment->value)</td>
                            @php
                                $photo = $bukti->where('name', $student->full_name)->first();
                                // dd($photo);
                            @endphp
                            <td>
                                <img src="{{ asset('img-document/' . $photo->document) }}" alt="document"
                                    class="p-2 bg-white border border-2 border-orange foto">
                                <a href="{{ route('payment.photo', $photo->id) }}" class="btn btn-sm btn-primary">lihat</a>
                            </td>
                            <td><a href="{{ route('payment.show', $payment->id) }}" class="btn btn-primary btn-sm"><i
                                        class="bi bi-card-list"></i> lihat kuitansi</a>

                                <form class="d-inline-block"
                                    onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                    action="{{ route('payment.destroy', $payment->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <input type="text" name="photo" value="{{ $photo->document }}" hidden>
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .foto {
            width: 100px;
        }
    </style>
@endpush
