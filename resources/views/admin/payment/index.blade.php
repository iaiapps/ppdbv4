@extends('layouts.dashboard')

@section('title', 'Cost Category Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100">
        <p class="fs-5 text-center">Pembayaran Daftar Ulang Siswa Baru</p>
        <hr>
        {{-- <a href="{{ route('studentegory.create') }}" class="btn btn-primary btn-sm mb-3"> <i class="bi bi-plus-circle"></i>
            tambah kategori</a> --}}
        <div class="table-responsive">
            <table id="table" class="table table-bordered rounded align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="fs-small">Nama Siswa</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Biaya Daftar Ulang</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        @if ($student->user->hasRole('akun_diterima'))
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->full_name }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>
                                    @if (isset($student->cost_category->total))
                                        @currency($student->cost_category->total)
                                    @else
                                        belum ditentukan
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('payment.showall', $student->id) }}" class="btn btn-primary btn-sm"><i
                                            class="bi bi-eye"></i> lihat pembayaran</a>
                                </td>
                            </tr>
                        @endif
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
                //     selector: 'td:nth-child(5)'
                // }
            });
        });
    </script>
@endpush
