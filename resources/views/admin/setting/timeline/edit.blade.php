@extends('layouts.dashboard')

@section('title', 'Edit Timeline Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-5 text-center">Edit Data Timeline</p>
        <hr>
        <div class=" mb-3">
            <p class="mb-2">Keterangan: tipe timeline</p>
            <ul class="list-group">
                <li class="list-group-item">tahap_1 = pendaftaran tahap 1</li>
                <li class="list-group-item">tahap_2 = pendaftaran tahap 2</li>
                <li class="list-group-item">other = jadwal lain</li>
                <li class="list-group-item">null = tidak ditampilkan</li>
            </ul>
        </div>
        <form action="{{ route('timeline.update', $timeline->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table id="table" class="table table-bordered rounded">
                <tbody>
                    <tr>
                        <td>Icon</td>
                        <td> <input type="text" value="{{ $timeline->icon }}" class="form-control bg-secondary-subtle"
                                name="icon" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td> <input type="text" value="{{ $timeline->name }}" class="form-control" name="name"> </td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td> <input type="text" value="{{ $timeline->date }}" class="form-control" name="date"> </td>
                    </tr>
                    <tr>
                        <td>Tipe</td>
                        <td>
                            <select name="type" class="form-select">
                                <option value="tahap_1">tahap_1</option>
                                <option value="tahap_2">tahap_2</option>
                                <option value="other">other</option>
                                <option value="null">null</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger mb-3 w-100">simpan</button>
        </form>
    </div>
@endsection
