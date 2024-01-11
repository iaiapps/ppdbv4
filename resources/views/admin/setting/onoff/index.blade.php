@extends('layouts.dashboard')

@section('title', 'OnOff Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-4 text-center">Setting Buka Tutup Website PPDB SDIT Harum Jember</p>
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

                    <tr>
                        <td>{{ $onoff->id }}</td>
                        <td>{{ $onoff->name }}</td>
                        <td>{{ $onoff->desc }}</td>
                        <td>
                            {{ $onoff->value == 0 ? 'pendaftaran ditutup' : 'pendaftaran dibuka' }}</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editModal">
                                Edit
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('setting.contact.store', ['id' => $onoff->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">Edit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- <div class="mb-3">
                        <label for="name" class="form-label">Nama Setting</label>
                        <input id="name" class="form-control bg-light" type="text" name="name"
                            value="{{ $onoff->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Description Setting</label>
                        <input id="desc" class="form-control bg-light" type="text" name="desc"
                            value="{{ $onoff->desc }}" readonly>
                    </div> --}}
                        <div class="mb-3">
                            <label for="value" class="form-label">Value Setting</label>
                            <select name="value" id="value" class="form-select">
                                <option disabled selected>--- pilih ---</option>
                                <option value="0">Tutup Website</option>
                                <option value="1">Buka Website</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
