@extends('layouts.dashboard')

@section('title', 'Edit User Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-5 text-center">Edit User Contact</p>
        <hr>
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table id="table" class="table table-bordered rounded align-middle">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td> <input type="text" value="{{ $user->name }}" class="form-control" name="name">
                        </td>
                    </tr>
                    <tr>
                        <td>Number</td>
                        <td> <input type="text" value="{{ $user->email_number }}" class="form-control"
                                name="email_number">
                        </td>
                    </tr>
                    {{-- <tr>
                        <td>Password</td>
                        <td> <input type="text" class="form-control" name="password">
                        </td>
                    </tr> --}}
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger mb-3 w-100">simpan</button>
        </form>
    </div>
@endsection
