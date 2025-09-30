@extends('layouts.dashboard')

@section('title', 'Set Cost Registrasi Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100">
        <button type="button" class="btn btn-outline-primary btn-sm mb-3" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Lihat Biaya Daftar ulang
        </button>
        <p class="fs-5 text-center">Tentukan Data Biaya Daftar Ulang </p>
        <hr>

        <table id="table" class="table table-bordered rounded align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Pilih Kategori Biaya</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    @if ($student->user->hasRole('akun_diterima'))
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->cost_category->name ?? 'belum ditentukan' }}
                            </td>
                            <td>
                                <form action="{{ route('set.cost', $student->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    @php
                                        $male = $costs->where('gender', 'laki-laki');
                                        $female = $costs->where('gender', 'perempuan');
                                    @endphp
                                    <div class="input-group ">
                                        <select class="form-select" name="cost_category_id">
                                            <option selected disabled>pilih kategori</option>
                                            @if ($student->gender == 'laki-laki')
                                                {
                                                @foreach ($male as $m)
                                                    <option value="{{ $m->id }}">
                                                        {{ $m->name . ' - ' . $m->gender }} </option>
                                                @endforeach
                                                }
                                            @endif
                                            @if ($student->gender == 'perempuan')
                                                {
                                                @foreach ($female as $f)
                                                    <option value="{{ $f->id }}">
                                                        {{ $f->name . ' - ' . $f->gender }} </option>
                                                @endforeach
                                                }
                                            @endif
                                        </select>
                                        <button type="submit" class="btn btn-success btn-sm">pilih</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

    </div>
    @include('admin.setcostreg.costmodal')
@endsection
@include('layouts.partial.scripts')

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                paging: false,
                "responsive": true
            });
        });
    </script>
@endpush
