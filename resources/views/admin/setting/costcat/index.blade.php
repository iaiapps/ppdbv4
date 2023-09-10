@extends('layouts.dashboard')

@section('title', 'Cost Category Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 vh-100 ">
        <p class="fs-5 text-center">Kategori Biaya Daftar Ulang SDIT Harum Jember</p>
        <hr>
        <div class="table-responsive">
            <table id="table" class="table table-bordered rounded">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Gedung</th>
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
                            <td>
                                <a href="#" class="btn btn-orange btn-sm">edit</a>
                                <a href="#" class="btn btn-danger btn-sm">delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
@include('layouts.partial.scripts')

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "pageLength": 50
            });
        });
    </script>
@endpush
