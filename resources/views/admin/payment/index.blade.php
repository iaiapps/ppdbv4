@extends('layouts.dashboard')

@section('title', 'Cost Category Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100">
        {{-- <a href="{{ route('payment.all') }}" class="btn btn-primary">lihat rekap pembayaran</a> --}}
        <p class="fs-5 text-center">Pembayaran Daftar Ulang Siswa Baru</p>
        <hr>

        <div class="table-responsive">
            <table id="table" class="table table-bordered rounded align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="fs-small">Nama Siswa</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Biaya Daftar Ulang</th>
                        <th scope="col">Keterangan</th>
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
                                    @if ($student->payment->sum('value') == $student->cost_category->total)
                                        sudah lunas
                                    @elseif ($student->payment->sum('value') == 0)
                                        belum membayar
                                    @elseif ($student->payment->sum('value') > $student->cost_category->total)
                                        lebih dari jumlah
                                    @elseif ($student->payment->sum('value') < $student->cost_category->total)
                                        belum lunas
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
                "pageLength": 50,
                "responsive": true,
                // "rowReorder": {
                //     selector: 'td:nth-child(5)'
                // }
            });
        });
    </script>
@endpush
