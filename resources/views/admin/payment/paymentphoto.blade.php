@extends('layouts.dashboard')

@section('title', 'Bukti Pembayaran')

@section('content')

    @include('layouts.partial.name')
    <div class="bg-white rounded p-3 mb-3">
        <a href="{{ url()->previous() }}" class="btn btn-orange text-white btn-sm">kembali</a>
        <hr>
        <div class="text-center">
            <img src="{{ asset('img-document/' . $document->document) }}" alt="document" class="p-2 bg-white foto">
        </div>
    </div>

@endsection

@push('css')
    <style>
        .foto {
            height: 500px;
        }

        @media (max-width: 700px) {
            .foto {
                height: 200px;
            }
        }
    </style>
@endpush
