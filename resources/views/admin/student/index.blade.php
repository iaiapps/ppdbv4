@extends('layouts.dashboard')

@section('title', 'Student Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-5 text-center">Data yang sudah mengisi Formulir Pendaftaran</p>
        <hr>
        <a href="{{ route('student.export') }}" class="btn btn-success btn-sm mb-3"> export data user</a>
        <a href="{{ route('student.card') }}" class="btn btn-success btn-sm mb-3"> print kartu peserta </a>
        <div class="table-responsive">
            <table id="table" class="table table-bordered rounded align-middle">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Nama/Gender</th>
                        <th class="text-center" scope="col">Asal Sekolah</th>
                        <th class="text-center" scope="col">Detail</th>
                        <th class="text-center" scope="col">Status</th>
                        <th class="text-center" scope="col">Act1</th>
                        <th class="text-center" scope="col">Act2</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->full_name }}
                                <span class="border border-success rounded px-2 py-1 ms-1">
                                    @if ($student->gender == 'laki-laki')
                                        {{ 'L' }}
                                    @elseif($student->gender == 'perempuan')
                                        {{ 'P' }}
                                    @else
                                        {{ 'belum ditentukan' }}
                                    @endif
                                </span>
                            </td>
                            <td>{{ $student->school_origin }}</td>
                            <td><a href="{{ route('student.show', $student->id) }}"
                                    class="btn btn-primary btn-sm ">detail</a></td>
                            <td>{{ $student->user->roles->first()->name }}</td>
                            <td>
                                <a onclick="return confirm('Apakah anda yakin untuk mengedit akun ini ?');"
                                    href="{{ route('student.edit', $student->id) }}"
                                    class="btn btn-warning btn-sm mb-1 w-100">edit
                                </a>

                                <div class="block mb-1">
                                    <form action="{{ route('student.retire', ['id' => $student->user->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary btn-sm w-100">undur</button>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <div class="block mb-1">
                                    <form action="{{ route('student.accepted', ['id' => $student->user->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm w-100">terima</button>
                                    </form>
                                </div>
                                <div class="block">
                                    <form action="{{ route('student.rejected', ['id' => $student->user->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm w-100">tolak</button>
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
