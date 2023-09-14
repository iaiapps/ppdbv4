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
                        <th scope="col">Tanggal Daftar*</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No. Handphone</th>
                        <th scope="col">Status</th>
                        <th scope="col">Transfer</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->document->created_at->isoFormat('DD-MM-YYYY') ?? 'belum upload' }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email_number }}</td>
                            <td>{{ $user->roles->first()->name }}</td>
                            <td>
                                {{ $user->document ? 'sudah' : 'belum' }}
                                <a href="{{ route('document.show', ['user' => $user->id]) }}"
                                    class="btn btn-outline-primary btn-sm">lihat
                                    bukti</a>
                            </td>
                            <td>
                                <div class="d-inline-block">
                                    <form action="{{ route('user.activated', ['id' => $user->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">aktifkan</button>
                                    </form>
                                </div>
                                <a href="https://api.whatsapp.com/send?phone=628{{ substr($user->email_number, 2) }}"
                                    target="_blank" class="btn btn-success btn-sm">kirim wa</a>
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
