<div class="modal fade" id="document" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Upload Bukti Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="fs-5">dokumen berupa .png atau .jpg</p>
                {{-- <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="jenisprestasi">Jenis Dokumen
                        </label>

                    </div>
                    <input class="form-control" type="file" name="file" class="pt-2">
                    <button type="submit" class="btn btn-primary mt-3 float-end">Upload Dokumen</button>
                </form> --}}


                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="name" value="{{ $user->name }} " hidden>
                    <input class="form-control" type="file" name="document" class="pt-2">
                    <button type="submit" class="btn btn-success mt-4 w-100 ">upload</button>
                </form>
            </div>

        </div>
    </div>
</div>
