@extends('layouts.dashboard')

@section('title', 'Home Page')

@section('content')

    @include('layouts.partial.name')
    <div class="bg-white rounded p-3 text-center ">
        <div class="bg-orange backheight position-relative rounded">
            <img class="logouser p-2 rounded-circle bg-white border border-5 border-orange position-absolute"
                src="{{ asset('img/administrator.png') }}" alt="user" />
        </div>
        <p class="fs-4 m-0 text-center">
            Selamat datang Admin di Dashboard website PPDB SDIT Harapan Umat
            Jember
        </p>
        <a class="btn btn-warning w-50 my-4" href="/admin/users">
            Informasi pendaftar</a>
    </div>

@endsection
