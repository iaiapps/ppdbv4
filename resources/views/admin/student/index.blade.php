@extends('layouts.dashboard')

@section('title', 'Student Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 vh-100 ">
        <p class="fs-5 text-center">Data yang sudah mengisi Formulir Pendaftaran</p>
        <hr>
        <div class="table-responsive">
            <table id="table" class="table table-bordered rounded align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No. Handphone</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->user->email_number }}</td>
                            <td>{{ $student->user->roles->first()->name }}</td>
                            <td>
                                <a href="{{ route('student.show', $student->id) }}"
                                    class="btn btn-outline-orange btn-sm">detail</a>
                                <div class="d-inline-block">
                                    <form action="{{ route('student.accepted', ['id' => $student->user->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">terima</button>
                                    </form>
                                </div>
                                <div class="d-inline-block">
                                    <form action="{{ route('student.rejected', ['id' => $student->user->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">tolak</button>
                                    </form>
                                </div>
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
