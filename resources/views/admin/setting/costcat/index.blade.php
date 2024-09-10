@extends('layouts.dashboard')

@section('title', 'Cost Category Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100">
        <p class="fs-5 text-center">Kategori Biaya Daftar Ulang SDIT Harum Jember</p>
        <hr>
        <a href="{{ route('costCategory.create') }}" class="btn btn-primary btn-sm mb-3"> <i class="bi bi-plus-circle"></i>
            tambah kategori</a>
        <div class="table-responsive">
            <table id="table" class="table table-bordered rounded align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="fs-small">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Gedung</th>
                        <th scope="col">Perpustakaan</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Buku_Media</th>
                        <th scope="col">Seragam</th>
                        <th scope="col">Jilbab</th>
                        <th scope="col">Ipp</th>
                        <th scope="col">Ipp</th>
                        <th scope="col">Ipp</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($costcats as $costcat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $costcat->name }}</td>
                            <td>{{ $costcat->gender }}</td>
                            <td>{{ $costcat->gedung }}</td>
                            <td>{{ $costcat->perpustakaan }}</td>
                            <td>{{ $costcat->kegiatan }}</td>
                            <td>{{ $costcat->bukumedia }}</td>
                            <td>{{ $costcat->seragam }}</td>
                            <td>{{ $costcat->jilbab }} </td>
                            <td>{{ $costcat->ipp }}</td>
                            <td>{{ $costcat->ipp }}</td>
                            <td>{{ $costcat->ipp }}</td>
                            <td>Rp.
                                {{ $costcat->gedung + $costcat->perpustakaan + $costcat->kegiatan + $costcat->bukumedia + $costcat->seragam + $costcat->jilbab + $costcat->ipp }}
                            </td>
                            <td>
                                <a href="{{ route('costCategory.edit', $costcat->id) }}" class="btn btn-orange btn-sm"><i
                                        class="bi bi-pencil-square"></i></a>
                                <form onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                    action="{{ route('costCategory.destroy', $costcat->id) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
@include('layouts.partial.scripts')

@push('css')
    <style>
        #table {
            font-size: 14px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "pageLength": 10,
                "responsive": true,
                // "rowReorder": {
                //     selector: 'td:nth-child(2)'
                // }
            });
        });
    </script>
@endpush
