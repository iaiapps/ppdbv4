@extends('layouts.dashboard')

@section('title', 'Edit Contact Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-5 text-center">Edit Data Contact</p>
        <hr>
        <form action="{{ route('setting.contact', ['id' => $contact->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <table id="table" class="table table-bordered rounded align-middle">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td> <input type="text" value="{{ $contact->name }}" class="form-control bg-light" name="name"
                                readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>Desc</td>
                        <td> <input type="text" value="{{ $contact->desc }}" class="form-control" name="desc"> </td>
                    </tr>
                    <tr>
                        <td>Value</td>
                        <td> <input type="text" value="{{ $contact->value }}" class="form-control" name="value"> </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger mb-3 w-100">simpan</button>
        </form>
    </div>
@endsection
