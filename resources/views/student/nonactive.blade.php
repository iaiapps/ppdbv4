@extends('layouts.dashboard')

@section('title', 'Home Page')

@section('content')

    @include('layouts.partial.name')

    <div class="bg-white mb-4 shadow p-3 rounded">
        <div class="card-body">
            <h5 class="text-primary ">Mohon maaf!</h5>
            <h5 class="text-primary">Akun anda telah dinonaktifkan</h5>
        </div>
        <p>Alasan: Setelah beberapa konfirmasi anda tidak melanjutkan proses pendaftaran di SDIT Harapan Umat Jember</p>
    </div>

@endsection
