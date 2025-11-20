@extends('layouts.dashboard')

@section('title', 'User Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">

        <p class="fs-5 text-center">Akun Non Aktif</p>
        <hr>
        {{-- <small class="mb-3 d-block">*early bid terhitung ketika sudah upload bukti pembayaran</small> --}}

        <table id="table" class="table table-bordered rounded">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Nama</th>
                    <th class="text-center" scope="col">Tgl_Daftar</th>
                    <th class="text-center" scope="col">No_Hp</th>
                    <th class="text-center" scope="col">Status</th>

                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }} <br>

                        </td>
                        <td>{{ $user->created_at->isoFormat('DD/MM/YY') }} </td>

                        <td>{{ $user->email_number }}</td>
                        <td>{{ $user->roles->first()->name }}</td>
                        <td>

                            <form class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="Delete"
                                onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                action="{{ route('user.destroy', $user->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form> <br>


                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
@include('layouts.partial.scripts')

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "pageLength": 50,
                "responsive": true
            });
        });
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
