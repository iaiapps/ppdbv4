@extends('layouts.dashboard')

@section('title', 'Setting Landing Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-4 text-center">Setting Website SPMB SDIT Harum Jember</p>
        <hr>
        <div class="table-responsive">
            <table id="table" class="table table-bordered rounded">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Value</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($settings as $index => $setting)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $setting->name }}</td>
                            <td>{{ $setting->desc ?? '-' }}</td>
                            <td>{{ $setting->value }}</td>
                            <td>
                                <a href="{{ route('landset.edit', $setting->id) }}" class="btn btn-sm btn-warning">Edit </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <!-- Modal -->
    {{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
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
    </div> --}}
@endsection
