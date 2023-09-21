<div class="modal fade" id="document" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Upload Bukti Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="fs-5 mb-4">gambar berupa .png atau .jpg*</p>
                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="name" value="{{ $user->name }} " hidden>
                    <input class="form-control @error('document') is-invalid @enderror" type="file" name="document"
                        class="pt-2">
                    {{-- @error('document')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}
                    <small class="d-block py-2 text-start">*ukuran maksimal 1 mb</small>
                    <button type="submit" class="btn btn-success mt-4 w-100 ">simpan data</button>
                </form>
            </div>
        </div>
    </div>
</div>
