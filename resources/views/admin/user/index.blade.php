@extends('layouts.dashboard')

@section('title', 'User Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-5 text-center">Data Seluruh Pendaftar</p>
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
                    <th class="text-center" scope="col">Bukti_Upload*</th>
                    <th class="text-center" scope="col">Aktifkan</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        @php
                            $message = urlencode("Assalamualaikum wr wb

❇️ Terimakasih telah memilih SDIT Harapan Umat Jember sebagai partner dalam membersamai setiap tahapan pendidikan ananda.

✅ Akun ananda sudah *\"Aktif\"* silahkan melanjutkan Proses *Pengisian Formulir* di web http://spmb.sditharum.id

❇️ Semoga ananda menjadi anak shalih shalihah. Aamiin.");
                            $phone = '628' . substr($user->email_number, 2);
                        @endphp
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }} <br>
                            @desktop
                                <a href="https://web.whatsapp.com/send/?phone={{ $phone }}" target="_blank"
                                    class="btn btn-success btn-sm mt-1"> hubungi</a>
                            @elsedesktop
                                <a href="https://wa.me/{{ $phone }}" target="_blank" class="btn btn-success btn-sm mt-1">
                                    hubungi</a>
                            @enddesktop
                        </td>
                        <td>{{ $user->created_at->isoFormat('DD/MM/YY') }} </td>
                        <td>
                            <span class="px-1 border border-success rounded">{{ $user->email_number }}</span>
                            <br>
                            @desktop
                                <a href="https://web.whatsapp.com/send/?phone={{ $phone }}&text={{ $message }}"
                                    target="_blank" class="btn btn-success btn-sm mt-1"> notif</a>
                            @elsedesktop
                                <a href="https://wa.me/{{ $phone }}?text={{ $message }}" target="_blank"
                                    class="btn btn-success btn-sm mt-1"> notif</a>
                            @enddesktop
                        </td>
                        <td>{{ $user->roles->first()->name }}</td>
                        <td>
                            {!! $user->document->where('type', 'upload_pembayaran')->first()
                                ? $user->document->where('type', 'upload_pembayaran')->first()->created_at->isoFormat('DD/MM/YY - HH:mm')
                                : '<button class="btn btn-outline-danger btn-sm w-100"><i class="bi bi-x-circle"></i> belum upload </button>' !!}

                            @if ($user->document->where('type', 'upload_pembayaran')->first())
                                <br>
                                <a href="{{ route('document.show', ['user' => $user->id]) }}"
                                    class="btn btn-outline-primary btn-sm w-100"><i class="bi bi-image"></i> lihat</a>
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
                                                class="bi bi-check-circle"></i> aktifkan?</button>
                                    </form>
                                </div>
                            @else
                                <button type="submit" class="btn btn-danger btn-sm" disabled><i
                                        class="bi bi-check-circle"></i>
                                    aktifkan?</button>
                            @endif

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
