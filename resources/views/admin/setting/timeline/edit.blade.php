@extends('layouts.dashboard')

@section('title', 'Edit Timeline Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-5 text-center">Edit Data Timeline</p>
        <hr>
        <form action="{{ route('timeline.update', $timeline->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table id="table" class="table table-bordered rounded">
                <tbody>
                    <tr>
                        <td>Icon</td>
                        <td> <input type="text" value="{{ $timeline->icon }}" class="form-control" name="icon"> </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td> <input type="text" value="{{ $timeline->name }}" class="form-control" name="name"> </td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td> <input type="text" value="{{ $timeline->date }}" class="form-control" name="date"> </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger mb-3 w-100">simpan</button>
        </form>
    </div>
@endsection
