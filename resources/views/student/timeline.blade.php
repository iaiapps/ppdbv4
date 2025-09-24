@extends('layouts.dashboard')

@section('title', 'Timeline Page')

@section('content')
    @include('layouts.partial.name')
    <div class="bg-white rounded p-3 min-vh-100">
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-orange mb-3 text-white"> <i
                class="bi bi-arrow-left-circle"></i>
            kembali</a>
        <p class="text-center fs-5 mb-2">Jadwal PPDB SDIT Harum Jember</p>
        <div class="bg-orange p-1 text-white text-center rounded">
            <p class="m-0 p-1">Sekarang :
                <span id="time"> 'time' </span>
            </p>
        </div>
        <hr />
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Event</th>
                        <th scope="col">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($times as $time)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $time->name }}</td>
                            <td>{{ $time->date }}</td>
                        </tr>
                    @empty
                        <p>belum ada data</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function getTime() {
            var time = document.getElementById('time');
            var options = {
                weekday: "long",
                year: "numeric",
                month: "long",
                day: "numeric",
            };
            const today = new Date();
            time.innerHTML = today.toLocaleDateString("id-ID", options);
        }
        getTime()
    </script>
@endpush
