@extends('layouts.dashboard')

@section('title', 'Setting Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100">
        @if (session('msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <p class="m-0">{{ session('msg') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <p class="fs-5 text-center">Setting Aplikasi</p>
        <hr>
        <div class="row">
            <div class="col-4">
                <div class="p-3 mb-3 border rounded">
                    <p class="m-0">Setting timeline</p>
                    <hr>
                    <a href="{{ route('timeline.index') }}" class="btn btn-orange">set timeline</a>
                </div>
            </div>
            <div class="col-4">
                <div class="p-3 mb-3 border rounded">
                    <p class="m-0">Setting Biaya</p>
                    <hr>
                    <a href="{{ route('costCategory.index') }}" class="btn btn-orange">set kategori biaya</a>
                </div>
            </div>
            <div class="col-4">
                <div class="p-3 mb-3 border rounded">
                    <p class="m-0">Setting Contact</p>
                    <hr>
                    <a href="{{ route('setting.contact') }}" class="btn btn-orange">set Kontak</a>
                </div>
            </div>
            <div class="col-4">
                <div class="p-3 mb-3 border rounded">
                    <p class="m-0">Setting web on/off</p>
                    <hr>
                    <a href="#" class="btn btn-orange">set Kontak</a>
                </div>
            </div>
            <div class="col-4">
                <div class="p-3 mb-3 border rounded">
                    <p class="m-0">Hapus Data User</p>
                    <hr>
                    {{-- <a href="{{ route('user.delete.all') }}" class="btn btn-orange">hapus data</a> --}}
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser">
                        hapus data user
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteUserLabel">Hapus Data User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('user.delete.all') }}">
                        @csrf
                        <div class="modal-body">
                            <p>Tuliskan kata berikut <span class="fw-bold text-danger">"DELETE"</span> untuk menghapus semua
                                data
                            </p>
                            <input type="text" name="key" class="form-control">
                        </div>
                        <div class="modal-footer justify-content-center">
                            {{-- <a href="{{ route('user.delete.all', ['key']) }}" class="btn btn-primary ">delete</a> --}}
                            <button type="submit">delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
