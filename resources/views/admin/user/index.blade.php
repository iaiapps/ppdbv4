@extends('layouts.dashboard')

@section('title', 'User Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-5 text-center">Data Pendaftar</p>
        <hr>
        <small class="mb-3 d-block">*early bid terhitung ketika sudah upload bukti pembayaran</small>
        <div class="table-responsive">
            <table id="table" class="table table-bordered rounded">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tgl_Daftar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No. HP</th>
                        <th scope="col">Status</th>
                        {{-- <th scope="col">Tgl_Up*</th> --}}
                        <th scope="col">Bukti_Upload*</th>
                        <th scope="col">Aktfkan_Wa</th>
                        <th scope="col">Action_Button</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->created_at->isoFormat('DD/MM/YY') }} </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email_number }}</td>
                            <td>{{ $user->roles->first()->name }}</td>
                            <td>
                                {!! $user->document
                                    ? $user->document->created_at->isoFormat('DD/MM/YY')
                                    : 'belum upload <button class="btn btn-outline-danger btn-sm"><i class="bi bi-x-circle"></i></button>' !!}

                                @if ($user->document)
                                    <a href="{{ route('document.show', ['user' => $user->id]) }}"
                                        class="btn btn-outline-primary btn-sm"><i class="bi bi-image"></i></a>
                                @endif
                            </td>
                            <td>
                                @if ($user->hasRole('akun_dibuat'))
                                    <div class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Aktifkan">
                                        <form onsubmit="return confirm('Apakah anda yakin untuk mengkatifkan akun ini ?');"
                                            action="{{ route('user.activated', ['id' => $user->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="bi bi-check-circle"></i></button>
                                        </form>
                                    </div>
                                @endif
                                <a href="https://wa.me/628{{ substr($user->email_number, 2) }}" target="_blank"
                                    class="btn btn-success btn-sm"><i class="bi bi-whatsapp"></i></a>
                            </td>
                            <td>
                                <a onclick="return confirm('Apakah anda yakin untuk mengedit akun ini ?');"
                                    href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm"><i
                                        class="bi bi-pencil-square"></i></a>
                                <form class="d-inline-block"
                                    onsubmit="return confirm('Apakah anda yakin untuk mereset password ?');"
                                    action="{{ route('reset.pass', ['id' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-secondary btn-sm"><i
                                            class="bi bi-arrow-clockwise"></i>
                                    </button>
                                </form>
                                <form class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Delete"
                                    onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                    action="{{ route('user.destroy', $user->id) }}" method="post" class="d-inline">
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "pageLength": 50
            });
        });
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
