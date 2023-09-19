@extends('layouts.dashboard')

@section('title', 'Contact Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-4 text-center">Kontak Person PPDB SDIT Harum Jember</p>
        <hr>
        <div class="table-responsive">
            <table id="table" class="table table-bordered rounded">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Setting</th>
                        <th scope="col">Description</th>
                        <th scope="col">Value</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->desc }}</td>
                            <td>{{ $contact->value }}</td>
                            <td>
                                <a href="{{ route('setting.contact.edit', ['id' => $contact->id]) }}"
                                    class="btn btn-orange btn-sm">edit</a>
                                <a href="#" class="btn btn-danger btn-sm">delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
