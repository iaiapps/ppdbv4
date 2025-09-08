@extends('layouts.dashboard')

@section('title', 'Edit Setting Landing')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <h5 class="mb-4 text-center">Edit : {{ $setting->type }}</h5>

        <form action="{{ route('landset.update', $setting->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <input type="text" name="desc" class="form-control" value="{{ old('desc', $setting->desc) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Value</label>
                <input type="text" name="value" class="form-control" value="{{ old('value', $setting->value) }}">
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('landset.setting') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
