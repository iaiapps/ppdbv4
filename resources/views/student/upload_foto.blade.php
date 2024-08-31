@extends('layouts.dashboard')

@section('title', 'Upload Foto Tk')

@section('content')
    <div class="card p-3">
        <div class="modal-body text-center">
            <p class="fs-5 mb-4">File foto TK berupa .png atau .jpg*</p>
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
