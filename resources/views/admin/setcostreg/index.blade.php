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
        <div class="table-responsive">
            <table id="table" class="table table-bordered rounded align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
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
                                <td>{{ $student->cost_category->name ?? 'belum ditentukan' }}</td>
                                <td>
                                    <form action="{{ route('set.cost', $student->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group ">
                                            <select class="form-select" name="cost_category_id">
                                                <option selected disabled>pilih kategori</option>
                                                @foreach ($costs as $cost)
                                                    <option value="{{ $cost->id }}">{{ $cost->name }}</option>
                                                @endforeach
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
    </div>
    @include('admin.setcostreg.costmodal')
@endsection
@include('layouts.partial.scripts')

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                paging: false
            });
        });
    </script>
@endpush
