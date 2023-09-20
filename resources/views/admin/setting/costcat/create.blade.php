@extends('layouts.dashboard')

@section('title', 'Edit Cost Category Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-5 text-center">Edit Data Cost Category</p>
        <hr>
        <form action="{{ route('costCategory.store') }}" method="POST">
            @csrf
            <table id="table" class="table table-bordered rounded align-middle">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td> <input type="text" class="form-control" name="name">
                        </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <select class="form-select" name="gender">
                                <option selected disabled>---pilih---</option>
                                <option value="laki-laki">laki-laki</option>
                                <option value="perempuan">perempuan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Gedung</td>
                        <td> <input type="number" class="form-control" name="gedung"> </td>
                    </tr>
                    <tr>
                        <td>Perpustakaan</td>
                        <td> <input type="number" class="form-control" name="perpustakaan"> </td>
                    </tr>
                    <tr>
                        <td>Kegiatan</td>
                        <td> <input type="number" class="form-control" name="kegiatan"> </td>
                    </tr>
                    <tr>
                        <td>Buku dan Media</td>
                        <td> <input type="number" class="form-control" name="bukumedia"> </td>
                    </tr>
                    <tr>
                        <td>Seragam</td>
                        <td> <input type="number" class="form-control" name="seragam"> </td>
                    </tr>
                    <tr>
                        <td>Jilbab</td>
                        <td> <input type="number" class="form-control" name="jilbab"> </td>
                    </tr>
                    <tr>
                        <td>Ipp</td>
                        <td> <input type="number" class="form-control" name="ipp"> </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger mb-3 w-100">simpan</button>
        </form>
    </div>
@endsection
