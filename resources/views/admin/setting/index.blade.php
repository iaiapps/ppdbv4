@extends('layouts.dashboard')

@section('title', 'Setting Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 vh-100 ">
        <p class="fs-5 text-center">Setting Aplikasi</p>
        <hr>
        <div class="p-3 mb-3 border rounded">
            <p class="m-0">Setting timeline</p>
            <hr>
            <a href="{{ route('timeline.index') }}" class="btn btn-orange">set timeline</a>
        </div>
        <div class="p-3 mb-3 border rounded">
            <p class="m-0">Setting Biaya</p>
            <hr>
            <a href="{{ route('costcat.index') }}" class="btn btn-orange">set kategori biaya</a>
        </div>

    </div>
@endsection
