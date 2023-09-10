<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content modal-xl">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Rincian Biaya Daftar Ulang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered rounded">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Gedung</th>
                                <th scope="col">Perpustakaan</th>
                                <th scope="col">Kegiatan</th>
                                <th scope="col">Buku dan Media</th>
                                <th scope="col">Seragam</th>
                                <th scope="col">Jilbab</th>
                                <th scope="col">IPP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($costs as $cost)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cost->name }}</td>
                                    <td>{{ $cost->gender }}</td>
                                    <td>{{ $cost->gedung }}</td>
                                    <td>{{ $cost->perpustakaan }}</td>
                                    <td>{{ $cost->kegiatan }}</td>
                                    <td>{{ $cost->bukumedia }}</td>
                                    <td>{{ $cost->seragam }}</td>
                                    <td>{{ $cost->jilbab }}</td>
                                    <td>{{ $cost->ipp }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
