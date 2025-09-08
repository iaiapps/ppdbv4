@extends('layouts.dashboard')

@section('title', 'TimeLine Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-4 text-center">Jadwal SPMB SDIT Harum Jember</p>
        <hr>

        <div class="table-responsive">
            <table id="table" class="table table-bordered rounded">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Name</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($times as $time)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $time->icon }}</td>
                            <td>{{ $time->name }}</td>
                            <td>{{ $time->date }}</td>
                            <td>
                                <a href="{{ route('timeline.edit', $time->id) }}" class="btn btn-orange btn-sm">edit</a>
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

{{-- @push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "pageLength": 50
            });
        });
    </script>
@endpush --}}
