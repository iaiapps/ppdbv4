@extends('layouts.dashboard')

@section('title', 'Upload Foto Tk')

@section('content')
    <div class="card p-3">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show"> Gambar gagal diupload, ukuran melebihi batas atau
                type gambar bukan .jpg atau .png <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif

        <div class="modal-body text-center">
            <p class="fs-5 mb-4">File foto TK berukuran 4x6 berupa .png atau .jpg*</p>
            <form action="{{ route('upload_foto') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" value="{{ $user->name }} " hidden>
                <input type="text" name="type" value="upload_foto" hidden>

                <input class="form-control @error('document') is-invalid @enderror" type="file" name="document"
                    class="pt-2">
                {{-- @error('document')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
                <small class="d-block py-2 text-start">*ukuran maksimal 1 mb</small>
                <button type="submit" class="btn btn-success mt-4 w-100 ">simpan data</button>
            </form>
        </div>
    </div>


@endsection
