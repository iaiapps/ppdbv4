@extends('layouts.dashboard')

@section('title', 'Bukti Pembayaran Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">

        @forelse ($data as $d)
            <a href="{{ URL::previous() }}" class="btn btn-success btn-sm"><i class="bi bi-arrow-left-circle"></i>
                Kembali</a>
            <p class="fs-5 text-center">Bukti pembayaran {{ $d->name }}</p>
            <hr>
            @if ($d->type == 'upload_pembayaran')
                {{-- ini settingan untuk hosting --}}
                {{-- <img src="{{ url('storage/public/img-document/' . $d->document) }}" alt="document" class="img-fluid"> --}}

                {{-- ini setting untuk lokal --}}
                <img src="{{ asset('img-document/' . $d->document) }}" alt="document" class="img-fluid">
            @endif
        @empty
            <p class="fs-5 text-center">Belum ada bukti pembayaran</p>
        @endforelse
    </div>
@endsection
