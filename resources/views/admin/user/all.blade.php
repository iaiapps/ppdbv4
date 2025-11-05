@extends('layouts.dashboard')

@section('title', 'User Page')

@section('content')
    @include('layouts.partial.name')
    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-5 text-center">Data Seluruh Pendaftar</p>
        <hr>
        <table id="table" class="table table-bordered rounded">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">No_Hp</th>
                    <th class="text-center" scope="col">Nama</th>
                    <th class="text-center" scope="col">Tgl_Daftar</th>
                    <th class="text-center" scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td> {{ $user->email_number }} </td>
                        <td>{{ $user->name }} </td>
                        <td>{{ $user->created_at->isoFormat('DD/MM/YY') }} </td>
                        <td>{{ $user->roles->first()->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
