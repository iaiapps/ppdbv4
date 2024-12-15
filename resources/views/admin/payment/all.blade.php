@extends('layouts.dashboard')

@section('title', 'Cost Category Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100">
        <p class="fs-5 text-center">Rekap Pembayaran Daftar Ulang Siswa Baru</p>
        <hr>

        <div class="table-responsive">
            <table id="table" class="table table-bordered rounded align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="fs-small">Nama Siswa</th>
                        <th scope="col">Biaya Daftar Ulang</th>
                        <th scope="col">Pembayaran</th>
                        <th scope="col">Keterangan</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        @if ($student->user->hasRole('akun_diterima'))
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->full_name }}</td>
                                <td>
                                    @if (isset($student->cost_category->total))
                                        @currency($student->cost_category->total)
                                    @else
                                        belum ditentukan
                                    @endif
                                </td>
                                <td>
                                    <table>
                                        @foreach ($student->payment as $b)
                                            <tr>
                                                <td>
                                                    ke {{ $loop->iteration . '. ' }} @currency($b->value)
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <hr class="mt-0 mb-1">
                                    <p> total @currency($student->payment->sum('value'))</p>
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
            // var fixNewLine = {
            //     exportOptions: {
            //         format: {
            //             body: function(data, column, row) {
            //                 return column === 5 ?
            //                     data.replace(/<br\s*\/?>/gmi, '\n') :
            //                     data;
            //             }
            //         }
            //     }
            // };

            $('#table').DataTable({
                // "pageLength": 50,
                "responsive": true,
                "layout": {
                    topStart: {
                        buttons: [{
                            extend: 'excelHtml5',
                            text: 'download excel',
                        }]
                    }
                },
                "buttons": ['excel'],
            });
        });
    </script>
@endpush
