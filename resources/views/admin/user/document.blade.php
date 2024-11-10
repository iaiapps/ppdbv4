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
                {{-- ini setting untuk hosting di strage folder --}}
                {{-- <img src="{{ url('storage/public/img-document/' . $d->document) }}" alt="document" class="img-fluid"> --}}

                {{-- ini setting untuk hosting di public folder --}}
                <img src="{{ asset('img-document/' . $d->document) }}" alt="document" class="img-fluid">

                <br><br>
                <form class="text-center" onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                    action="{{ route('document.delete', $d->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm "><i class="bi bi-trash3"></i> <br> hapus bukti
                        pembayaran

                    </button>
                </form>
            @endif
        @empty
            <p class="fs-5 text-center">Belum ada bukti pembayaran</p>
        @endforelse
    </div>
@endsection
