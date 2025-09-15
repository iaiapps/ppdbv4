@extends('layouts.landing')

@section('title', 'Form Page')
@section('content')


    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-12 col-md-4 bg-orange p-3 p-md-5">
                <div class="text-md-end text-center">
                    <img src="{{ asset('/img/gbr.png') }}" class="img" alt="logoppdb" />
                    <p class="fs-3 my-4 text-white">
                        Formulir Pendaftaran Siswa Baru SDIT Harapan Umat Jember
                    </p>
                </div>
                <hr class="hr" />
                <!-- Progress -->
                <div class="progress mt-4">
                    <div id="progress-bar" class="progress-bar bg-success" role="progressbar" style="width: 25%">
                        Langkah 1 dari 4
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8 p-3 p-md-5">
                <div>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <form id="multiStepForm" action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- STEP 1: Identitas Siswa -->
                    <fieldset class="step active">
                        <div class="form-card">
                            <p class="fs-4">Identitas Calon Siswa</p>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="full_name">Nama Lengkap
                                        </label>
                                        <input class="form-control bg-light" id="full_name" name="full_name" type="text"
                                            value="{{ Str::upper(Auth::user()->name) }}" required readonly />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nick_name">Nama Panggilan</label>
                                        <input class="form-control" id="nick_name" name="nick_name" type="text"
                                            required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nik">NIK
                                        </label>
                                        <input class="form-control" id="nik" name="nik" type="text"required />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="kk">No KK</label>
                                        <input class="form-control" id="kk" name="kk" type="text" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="school_origin">Asal TK</label>
                                        <input class="form-control" id="school_origin" name="school_origin" type="text"
                                            required />
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="school_address">Alamat TK</label>
                                        <input class="form-control" id="school_address" name="school_address" type="text"
                                            required />
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="school_nisn">NISN TK</label>
                                        <input class="form-control" id="school_nisn" name="school_nisn" type="text"
                                            placeholder="Diisi jika memiliki NISN di TK" />
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label class="form-label" for="gender">Jenis Kelamin</label>
                                <select class="form-select" id="gender" name="gender">
                                    <option selected disabled>--- pilih ---</option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="place_birth">Tempat Lahir</label>
                                        <input class="form-control" id="place_birth" name="place_birth" type="text"
                                            required />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_birth">Tanggal Lahir</label>
                                        <input class="form-control" name="date_birth" type="date" id="date_birth"
                                            placeholder="Bulan/Hari/Tahun" />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="special_needs">Berkebutuhan Khusus</label>
                                <select class="form-select" id="special_needs" name="special_needs">
                                    <option selected disabled>--- pilih ---</option>
                                    <option>Tidak</option>
                                    <option>Netra</option>
                                    <option>Rungu</option>
                                    <option>Grahita ringan</option>
                                    <option>Grahita sedang</option>
                                    <option>Daksa ringan</option>
                                    <option>Daksa sedang</option>
                                    <option>Laras</option>
                                    <option>Wicara</option>
                                    <option>Tuna Ganda</option>
                                    <option>Hiperaktif</option>
                                    <option>Cerdas Istimewa</option>
                                    <option>Bakat Istimewa</option>
                                    <option>Kesulitan Belajar</option>
                                    <option>Indigo</option>
                                    <option>Down Syndrome</option>
                                    <option>Autis</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="saudara_kandung_di_sdit">
                                    Jumlah saudara kandung yang masih sekolah di SDIT Harum Jember
                                </label>
                                <select class="form-select" id="saudara_kandung_di_sdit" name="saudara_kandung_di_sdit">
                                    <option selected disabled>--- pilih ---</option>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-100 mt-3">
                            <button type="button" class="btn btn-orange next w-25 float-end">Lanjut</button>
                        </div>
                    </fieldset>
                    <fieldset class="step active">
                        <div class="form-card">
                            <p class="fs-4">Alamat Calon Siswa</p>

                            <div class="mb-3">
                                <label class="form-label" for="living">Tempat Tinggal Bersama</label>
                                <select class="form-select" id="living" name="living">
                                    <option selected disabled>--- pilih ---</option>
                                    <option>Orangtua</option>
                                    <option>Kakek-Nenek</option>
                                    <option>Wali</option>
                                    <option>Kos</option>
                                    <option>Asrama</option>
                                    <option>Panti Asuhan</option>
                                    <option>Lainnya</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="address" name="address" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="rt" class="form-label">RT/RW</label>
                                    <input type="text" class="form-control" id="rt" name="rtrw" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="postalcode" class="form-label">Kode Pos</label>
                                    <input type="number" class="form-control" id="postalcode" name="postalcode" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="desa" class="form-label">Desa/Kelurahan</label>
                                    <input type="text" required class="form-control" id="desa" name="desa" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <input type="text" required class="form-control" id="kecamatan"
                                        name="kecamatan" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="kota" class="form-label">Kabupaten/Kota</label>
                                    <input type="text" required class="form-control" id="kota" name="kota" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="provinsi" class="form-label">Provinsi</label>
                                    <input type="text" required class="form-control" id="provinsi"
                                        name="provinsi" />
                                </div>
                            </div>
                        </div>
                        <div class="w-100 mt-3">
                            <button type="button" class="btn btn-secondary prev w-25 float-start">Kembali</button>
                            <button type="button" class="btn btn-orange next w-25 float-end ">Lanjut</button>
                        </div>

                    </fieldset>

                    <fieldset class="step">
                        <p class="fs-4">Identitas Ayah</p>
                        <div class="mb-3">
                            <label class="form-label" for="dad">Nama Ayah</label>
                            <input class="form-control" id="dad" name="dad" type="text" required />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="dad_edu">Pendidikan Ayah</label>
                            <select class="form-select" id="dad_edu" name="dad_edu">
                                <option selected disabled>--- pilih ---</option>
                                <option>SD/Sederajat</option>
                                <option>SMP/Sederajat</option>
                                <option>SMA/Sederajat</option>
                                <option>D1</option>
                                <option>D2</option>
                                <option>D3</option>
                                <option>D4/S1</option>
                                <option>S2</option>
                                <option>S3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="dad_occupation">Pekerjaan Ayah</label>
                            <select class="form-select" id="dad_occupation" name="dad_occupation">
                                <option selected disabled>--- pilih ---</option>
                                <option>Dosen</option>
                                <option>Pegawai Bank</option>
                                <option>Dokter</option>
                                <option>
                                    Perawat/Tenaga kesehatan lain
                                </option>
                                <option>Pegawai Departemen Keuangan</option>
                                <option>TNI</option>
                                <option>Polri</option>
                                <option>PNS</option>
                                <option>Tidak Bekerja</option>
                                <option>Nelayan</option>
                                <option>Petani</option>
                                <option>Peternak</option>
                                <option>Karyawan Swasta</option>
                                <option>Pedagang Kecil</option>
                                <option>Pedagang Besar</option>
                                <option>Wiraswasta</option>
                                <option>Wirausaha</option>
                                <option>Buruh</option>
                                <option>Pensiunan</option>
                                <option>Tenaga Kerja Indonesia</option>
                                <option>Tidak dapat diterapkan</option>
                                <option>Sudah Meninggal</option>
                                <option>Lainnya</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="dad_income">
                                Penghasilan (gaji pokok dan pendapatan lain)
                            </label>
                            <input class="form-control" id="dad_income" name="dad_income" placeholder="Rp. xxx.xxx.xxx">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="dad_phone">Nomor Telpon Ayah</label>
                            <input class="form-control" id="dad_phone" name="dad_phone" type="number" />
                        </div>
                        <div class="w-100 mt-3">
                            <button type="button" class="btn btn-secondary prev w-25 float-start">Kembali</button>
                            <button type="button" class="btn btn-orange next w-25 float-end ">Lanjut</button>
                        </div>
                    </fieldset>
                    <fieldset class="step">
                        <p class="fs-4">Identitas Ibu</p>
                        <div class="mb-3">
                            <label class="form-label" for="mom">Nama Ibu</label>
                            <input class="form-control" id="mom" name="mom" type="text" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="mom_edu">Pendidikan Ibu</label>
                            <select class="form-select" id="mom_edu" name="mom_edu">
                                <option selected disabled>--- pilih ---</option>
                                <option>SD/Sederajat</option>
                                <option>SMP/Sederajat</option>
                                <option>SMA/Sederajat</option>
                                <option>D1</option>
                                <option>D2</option>
                                <option>D3</option>
                                <option>D4/S1</option>
                                <option>S2</option>
                                <option>S3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="mom_occupation">Pekerjaan Ibu</label>
                            <select class="form-select" id="mom_occupation" name="mom_occupation">
                                <option selected disabled>--- pilih ---</option>
                                <option>Dosen</option>
                                <option>Pegawai Bank</option>
                                <option>Dokter</option>
                                <option>
                                    Perawat/Tenaga kesehatan lain
                                </option>
                                <option>Pegawai Departemen Keuangan</option>
                                <option>TNI</option>
                                <option>Polri</option>
                                <option>PNS</option>
                                <option>Tidak Bekerja</option>
                                <option>Nelayan</option>
                                <option>Petani</option>
                                <option>Peternak</option>
                                <option>Karyawan Swasta</option>
                                <option>Pedagang Kecil</option>
                                <option>Pedagang Besar</option>
                                <option>Wiraswasta</option>
                                <option>Wirausaha</option>
                                <option>Buruh</option>
                                <option>Pensiunan</option>
                                <option>Tenaga Kerja Indonesia</option>
                                <option>Tidak dapat diterapkan</option>
                                <option>Sudah Meninggal</option>
                                <option>Lainnya</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="mom_income">
                                Penghasilan (gaji pokok dan pendapatan lain)
                            </label>
                            <input class="form-control" id="mom_income" name="mom_income" placeholder="Rp. xxx.xxx.xxx">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="mom_phone">Nomor Telpon Ibu</label>
                            <input class="form-control" id="mom_phone" name="mom_phone" type="number" />
                        </div>
                        <div class="w-100 mt-3">
                            <button type="button" class="btn btn-secondary prev w-25 float-start">Kembali</button>
                            <button type="button" class="btn btn-orange next w-25 float-end ">Lanjut</button>
                        </div>
                    </fieldset>

                    <fieldset class="step">
                        <p class="fs-4">Upload Foto Ananda</p>

                        <p>Ketentuan file foto</p>
                        <div class="mb-3">
                            <ul class="list-group">
                                <li class="list-group-item">File foto berukuran 4x6</li>
                                <li class="list-group-item">File foto berupa .pn atau .jpg</li>
                                <li class="list-group-item">Maksimal ukuran foto 1mb</li>
                            </ul>
                        </div>

                        <p>Upload file foto</p>
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="type" value="upload_foto">
                        <div class="mb-3">
                            <input class="form-control @error('document') is-invalid @enderror" type="file"
                                id="document" name="document" accept="image/png, image/jpeg">
                        </div>
                        <p class="d-block py-2 text-start">*Ukuran maksimal 1 MB</p>
                        <!-- Preview -->
                        <div id="preview-container" class="border border-orange border-2 text-center p-2 hfoto">
                            <img id="preview-photo" src="#" alt="Preview Foto"
                                class="img-fluid mx-auto d-block hifoto" style="max-height: 200px;">

                        </div>
                        <div class="w-100 mt-3">
                            <button type="button" class="btn btn-secondary prev w-25 float-start">Kembali</button>
                            <button type="submit" class="btn btn-success w-25 float-end">
                                Simpan
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Persiapan -->
    @if ($showPopup)
        <div class="modal fade" id="prepareModal" tabindex="-1" aria-labelledby="prepareModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-orange text-white">
                        <h5 class="modal-title" id="prepareModalLabel">Persiapan Pengisian Formulir</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-3">Assalamualaikum Warahmatullahi Wabarakatuh</p>
                        <p>Mohon siapkan terlebih dahulu data berikut sebelum mengisi formulir pendaftaran:</p>
                        <ul class="list-group">
                            <li class="list-group-item fw-bold">Data diri calon siswa dan alamat</li>
                            <li class="list-group-item fw-bold">Data asal sekolah/TK</li>
                            <li class="list-group-item fw-bold">Data Orang Tua </li>
                            <li class="list-group-item fw-bold">File foto ananda</li>
                        </ul>
                        <p class="mt-3">Setelah menyiapkan semua, silakan lanjutkan pengisian formulir dengan benar</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Saya Siap!</button>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var popup = new bootstrap.Modal(document.getElementById('popupInfo'));
                    popup.show();
                });
            </script>
        @endpush
    @endif
@endsection

@push('css')
    <style>
        .img {
            width: 40vh;
        }

        .modal-header.bg-orange {
            background: #f97316;
        }

        .hfoto {
            padding-top: 50px;
            height: 100px;
        }

        .hifoto {
            padding-top: 30px;
        }

        @media (max-width: 600px) {
            .img {
                width: 20vh;
            }
        }

        fieldset.step {
            display: none;
        }

        fieldset.step.active {
            display: block;
            animation: fadeIn 0.4s ease;
        }

        .is-invalid {
            border: 2px solid #dc3545 !important;
            /* merah */
            background-color: #ffe6e6;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endpush
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var prepareModal = new bootstrap.Modal(document.getElementById('prepareModal'));
            prepareModal.show();
        });

        const steps = document.querySelectorAll(".step");
        const nextBtns = document.querySelectorAll(".next");
        const prevBtns = document.querySelectorAll(".prev");
        const progressBar = document.getElementById("progress-bar");
        let currentStep = 0;

        function showStep(step) {
            steps.forEach((s, i) => {
                s.classList.toggle("active", i === step);
            });
            progressBar.style.width = ((step + 1) / steps.length) * 100 + "%";
            progressBar.innerText = `Tahap ${step + 1} dari ${steps.length}`;
        }

        function validateStep(stepIndex) {
            const inputs = steps[stepIndex].querySelectorAll("input, select, textarea");
            for (let input of inputs) {
                if (input.hasAttribute("required") && !input.value.trim()) {
                    // highlight field kosong
                    input.classList.add("is-invalid");
                    input.focus();
                    return false;
                } else {
                    input.classList.remove("is-invalid");
                }
            }
            return true;
        }
        nextBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                if (validateStep(currentStep)) {
                    if (currentStep < steps.length - 1) {
                        currentStep++;
                        showStep(currentStep);
                    }
                } else {
                    alert("Harap isi semua field wajib terlebih dahulu!");
                }
            });
        });
        prevBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });
        });
        showStep(currentStep);

        document.getElementById("document").addEventListener("change", function(event) {
            let file = event.target.files[0];
            let imgPreview = document.getElementById("preview-photo");
            let container = document.getElementById("preview-container");
            let photo = document.getElementById('preview-photo')

            if (file) {
                // validasi ukuran
                if (file.size > 1048576) {
                    alert("Ukuran file maksimal 1 MB!");
                    event.target.value = "";
                    container.classList.add("d-none");
                    return;
                }

                // validasi format
                const allowedTypes = ["image/jpeg", "image/png"];
                if (!allowedTypes.includes(file.type)) {
                    alert("Format file harus JPG atau PNG!");
                    event.target.value = "";
                    container.classList.add("d-none");
                    return;
                }

                // tampilkan preview
                let reader = new FileReader();
                reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                    container.classList.remove("hfoto");
                    photo.classList.remove("hifoto");
                }
                reader.readAsDataURL(file);
            } else {
                container.classList.add("d-none");
            }
        });
    </script>
@endpush
