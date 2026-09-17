@extends('layouts.landing')

@section('title', 'Form Page')
@section('content')

    @include('layouts.partial.navbar')
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-12 col-md-4 bg-orange p-3 p-md-5">
                <div class="text-md-end text-center">
                    <img src="{{ asset('/img/gbr.png') }}" class="img" alt="logoppdb" />
                    <p class="fs-3 my-4 text-white">
                        Formulir Pendaftaran Siswa Baru
                    </p>
                    <div class="badge bg-white text-orange fs-6 px-3 py-2 text-wrap">
                        <i class="bi bi-building me-1"></i> {{ $user->branch_label }}
                    </div>
                </div>
                <hr class="hr" />
                <!-- Progress -->
                <div class="progress mt-4">
                    <div id="progress-bar" class="progress-bar bg-success" role="progressbar" style="width: 25%"></div>
                </div>
                <p id="progress-text" class="text-white text-center mt-2 mb-0">Tahap 1 dari 6</p>
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

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                            <strong><i class="bi bi-exclamation-triangle-fill me-2"></i>Terdapat kesalahan pengisian
                                form:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <form id="multiStepForm" action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="alert alert-warning d-flex align-items-center mb-3" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <small>Pastikan data yang diisi tidak ada kesalahan huruf, angka, tanda baca, atau spasi.</small>
                    </div>

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
                                        <input class="form-control @error('nick_name') is-invalid @enderror" id="nick_name"
                                            name="nick_name" type="text" value="{{ old('nick_name') }}" required />
                                        @error('nick_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nik">NIK
                                        </label>
                                        <input class="form-control @error('nik') is-invalid @enderror" id="nik"
                                            name="nik" type="text" value="{{ old('nik') }}" required />
                                        @error('nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="kk">Nomor KK</label>
                                        <input class="form-control @error('kk') is-invalid @enderror" id="kk"
                                            name="kk" type="text" value="{{ old('kk') }}" required />
                                        @error('kk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="school_origin">Asal TK</label>
                                        <input class="form-control @error('school_origin') is-invalid @enderror"
                                            id="school_origin" name="school_origin" type="text"
                                            value="{{ old('school_origin') }}" required />
                                        @error('school_origin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="school_nisn">NISN TK</label>
                                        <input class="form-control @error('school_nisn') is-invalid @enderror"
                                            id="school_nisn" name="school_nisn" type="text"
                                            value="{{ old('school_nisn') }}"
                                            placeholder="Diisi jika memiliki NISN di TK" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="school_address">Alamat TK</label>
                                        <input class="form-control @error('school_address') is-invalid @enderror"
                                            id="school_address" name="school_address" type="text"
                                            value="{{ old('school_address') }}" required />
                                        @error('school_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="gender">Jenis Kelamin</label>
                                <select class="form-select @error('gender') is-invalid @enderror" id="gender"
                                    name="gender">
                                    <option selected disabled>--- pilih ---</option>
                                    <option value="laki-laki" {{ old('gender') == 'laki-laki' ? 'selected' : '' }}>
                                        Laki-Laki</option>
                                    <option value="perempuan" {{ old('gender') == 'perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="place_birth">Tempat Lahir</label>
                                        <input class="form-control @error('place_birth') is-invalid @enderror"
                                            id="place_birth" name="place_birth" type="text"
                                            value="{{ old('place_birth') }}" required />
                                        @error('place_birth')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_birth">Tanggal Lahir</label>
                                        <input class="form-control @error('date_birth') is-invalid @enderror"
                                            name="date_birth" type="date" id="date_birth"
                                            value="{{ old('date_birth') }}" placeholder="Bulan/Hari/Tahun" />
                                        @error('date_birth')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="saudara_kandung_di_sdit">
                                    Apakah ananda memiliki saudara kandung yang masih sekolah di SDIT Harum Jember pada
                                    @if ($jadwal)
                                        tahun ajaran {{ $jadwal->value }}
                                    @endif
                                    ?
                                </label>
                                <select class="form-select @error('saudara_kandung_di_sdit') is-invalid @enderror"
                                    id="saudara_kandung_di_sdit" name="saudara_kandung_di_sdit"
                                    onchange="toggleSiblingFields(this)">
                                    <option selected disabled>--- pilih ---</option>
                                    <option value="Ya" {{ old('saudara_kandung_di_sdit') == 'Ya' ? 'selected' : '' }}>
                                        Ya</option>
                                    <option value="Tidak"
                                        {{ old('saudara_kandung_di_sdit') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                                @error('saudara_kandung_di_sdit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div id="sibling-fields" class="d-none">
                                <div class="mb-3">
                                    <label class="form-label">Berapa jumlahnya?</label>
                                    <input type="number" class="form-control" name="saudara_count" min="1"
                                        max="10" placeholder="Jumlah saudara"
                                        value="{{ old('saudara_count') }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Siapa namanya? (Jika tidak ada, kosongi. Jika lebih dari
                                        satu,
                                        pisahkan dengan koma)</label>
                                    <input type="text" class="form-control" name="saudara_names"
                                        placeholder="Nama saudara (opsional)" value="{{ old('saudara_names') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="w-100 mt-3">
                            <button type="button" class="btn btn-orange next w-25 float-end">Lanjut</button>
                        </div>
                    </fieldset>
                    <fieldset class="step">
                        <div class="form-card">
                            <p class="fs-4">Pertanyaan Khusus</p>
                            <div class="card border-orange">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Apakah ananda termasuk Anak Berkebutuhan Khusus?</label>
                                        <select class="form-select @error('special_needs') is-invalid @enderror"
                                            name="special_needs" required>
                                            <option selected disabled>--- pilih ---</option>
                                            <option value="Tidak"
                                                {{ old('special_needs') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                            <option value="Netra"
                                                {{ old('special_needs') == 'Netra' ? 'selected' : '' }}>Netra</option>
                                            <option value="Rungu"
                                                {{ old('special_needs') == 'Rungu' ? 'selected' : '' }}>Rungu</option>
                                            <option value="Grahita ringan"
                                                {{ old('special_needs') == 'Grahita ringan' ? 'selected' : '' }}>Grahita
                                                ringan</option>
                                            <option value="Grahita sedang"
                                                {{ old('special_needs') == 'Grahita sedang' ? 'selected' : '' }}>Grahita
                                                sedang</option>
                                            <option value="Daksa ringan"
                                                {{ old('special_needs') == 'Daksa ringan' ? 'selected' : '' }}>Daksa ringan
                                            </option>
                                            <option value="Daksa sedang"
                                                {{ old('special_needs') == 'Daksa sedang' ? 'selected' : '' }}>Daksa sedang
                                            </option>
                                            <option value="Laras"
                                                {{ old('special_needs') == 'Laras' ? 'selected' : '' }}>Laras</option>
                                            <option value="Wicara"
                                                {{ old('special_needs') == 'Wicara' ? 'selected' : '' }}>Wicara</option>
                                            <option value="Tuna Ganda"
                                                {{ old('special_needs') == 'Tuna Ganda' ? 'selected' : '' }}>Tuna Ganda
                                            </option>
                                            <option value="Hiperaktif"
                                                {{ old('special_needs') == 'Hiperaktif' ? 'selected' : '' }}>Hiperaktif
                                            </option>
                                            <option value="Cerdas Istimewa"
                                                {{ old('special_needs') == 'Cerdas Istimewa' ? 'selected' : '' }}>Cerdas
                                                Istimewa</option>
                                            <option value="Bakat Istimewa"
                                                {{ old('special_needs') == 'Bakat Istimewa' ? 'selected' : '' }}>Bakat
                                                Istimewa</option>
                                            <option value="Kesulitan Belajar"
                                                {{ old('special_needs') == 'Kesulitan Belajar' ? 'selected' : '' }}>
                                                Kesulitan Belajar</option>
                                            <option value="Indigo"
                                                {{ old('special_needs') == 'Indigo' ? 'selected' : '' }}>Indigo</option>
                                            <option value="Down Syndrome"
                                                {{ old('special_needs') == 'Down Syndrome' ? 'selected' : '' }}>Down
                                                Syndrome</option>
                                            <option value="Autis"
                                                {{ old('special_needs') == 'Autis' ? 'selected' : '' }}>Autis</option>
                                        </select>
                                        @error('special_needs')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Apakah ananda termasuk anak yang terlalu aktif tidak bisa
                                            duduk tenang dan perhatian sangat mudah teralih?</label>
                                        <select class="form-select @error('is_hyperactive') is-invalid @enderror"
                                            name="is_hyperactive" required>
                                            <option selected disabled>--- pilih ---</option>
                                            <option value="Ya" {{ old('is_hyperactive') == 'Ya' ? 'selected' : '' }}>
                                                Ya</option>
                                            <option value="Tidak"
                                                {{ old('is_hyperactive') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                        </select>
                                        @error('is_hyperactive')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Apakah ananda termasuk anak yang sulit fokus?</label>
                                        <select class="form-select @error('is_difficult_focus') is-invalid @enderror"
                                            name="is_difficult_focus" required>
                                            <option selected disabled>--- pilih ---</option>
                                            <option value="Ya"
                                                {{ old('is_difficult_focus') == 'Ya' ? 'selected' : '' }}>Ya</option>
                                            <option value="Tidak"
                                                {{ old('is_difficult_focus') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                        </select>
                                        @error('is_difficult_focus')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Apakah ananda memiliki kesulitan dalam mengontrol impuls
                                            (suka memukul, merebut, tidak mau antri)?</label>
                                        <select class="form-select @error('is_impulse_control') is-invalid @enderror"
                                            name="is_impulse_control" required>
                                            <option selected disabled>--- pilih ---</option>
                                            <option value="Ya"
                                                {{ old('is_impulse_control') == 'Ya' ? 'selected' : '' }}>Ya</option>
                                            <option value="Tidak"
                                                {{ old('is_impulse_control') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                        </select>
                                        @error('is_impulse_control')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Apakah ananda memiliki tantrum yang ekstrim (mudah
                                            frustasi saat menghadapi rutinitas kecil)?</label>
                                        <select class="form-select @error('is_extreme_tantrum') is-invalid @enderror"
                                            name="is_extreme_tantrum" required>
                                            <option selected disabled>--- pilih ---</option>
                                            <option value="Ya"
                                                {{ old('is_extreme_tantrum') == 'Ya' ? 'selected' : '' }}>Ya</option>
                                            <option value="Tidak"
                                                {{ old('is_extreme_tantrum') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                        </select>
                                        @error('is_extreme_tantrum')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-0">
                                        <label class="form-label">Apakah ananda membutuhkan shadow teacher atau guru
                                            pendamping khusus dalam pembelajaran?</label>
                                        <select class="form-select @error('needs_shadow_teacher') is-invalid @enderror"
                                            name="needs_shadow_teacher" required>
                                            <option selected disabled>--- pilih ---</option>
                                            <option value="Ya"
                                                {{ old('needs_shadow_teacher') == 'Ya' ? 'selected' : '' }}>Ya</option>
                                            <option value="Tidak"
                                                {{ old('needs_shadow_teacher') == 'Tidak' ? 'selected' : '' }}>Tidak
                                            </option>
                                        </select>
                                        @error('needs_shadow_teacher')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 mt-3">
                            <button type="button" class="btn btn-orange prev w-25 float-start">Kembali</button>
                            <button type="button" class="btn btn-orange next w-25 float-end">Lanjut</button>
                        </div>
                    </fieldset>
                    <fieldset class="step">
                        <div class="form-card">
                            <p class="fs-4">Alamat Calon Siswa</p>

                            <div class="mb-3">
                                <label class="form-label" for="living">Tempat Tinggal Bersama</label>
                                <select class="form-select @error('living') is-invalid @enderror" id="living"
                                    name="living">
                                    <option selected disabled>--- pilih ---</option>
                                    <option value="Orangtua" {{ old('living') == 'Orangtua' ? 'selected' : '' }}>Orangtua
                                    </option>
                                    <option value="Kakek-Nenek" {{ old('living') == 'Kakek-Nenek' ? 'selected' : '' }}>
                                        Kakek-Nenek</option>
                                    <option value="Wali" {{ old('living') == 'Wali' ? 'selected' : '' }}>Wali</option>
                                    <option value="Kos" {{ old('living') == 'Kos' ? 'selected' : '' }}>Kos</option>
                                    <option value="Asrama" {{ old('living') == 'Asrama' ? 'selected' : '' }}>Asrama
                                    </option>
                                    <option value="Panti Asuhan" {{ old('living') == 'Panti Asuhan' ? 'selected' : '' }}>
                                        Panti Asuhan</option>
                                    <option value="Lainnya" {{ old('living') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                    </option>
                                </select>
                                @error('living')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" value="{{ old('address') }}" required />
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="rt" class="form-label">RT/RW</label>
                                    <input type="text" class="form-control @error('rtrw') is-invalid @enderror"
                                        id="rt" name="rtrw" value="{{ old('rtrw') }}" required />
                                    @error('rtrw')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="postalcode" class="form-label">Kode Pos</label>
                                    <input type="number" class="form-control @error('postalcode') is-invalid @enderror"
                                        id="postalcode" name="postalcode" value="{{ old('postalcode') }}" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="desa" class="form-label">Desa/Kelurahan</label>
                                    <input type="text" required
                                        class="form-control @error('desa') is-invalid @enderror" id="desa"
                                        name="desa" value="{{ old('desa') }}" />
                                    @error('desa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <input type="text" required
                                        class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan"
                                        name="kecamatan" value="{{ old('kecamatan') }}" />
                                    @error('kecamatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="kota" class="form-label">Kabupaten/Kota</label>
                                    <input type="text" required
                                        class="form-control @error('kota') is-invalid @enderror" id="kota"
                                        name="kota" value="{{ old('kota') }}" />
                                    @error('kota')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="provinsi" class="form-label">Provinsi</label>
                                    <input type="text" required
                                        class="form-control @error('provinsi') is-invalid @enderror" id="provinsi"
                                        name="provinsi" value="{{ old('provinsi') }}" />
                                    @error('provinsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
                            <input class="form-control @error('dad') is-invalid @enderror" id="dad" name="dad"
                                type="text" value="{{ old('dad') }}" required />
                            @error('dad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="dad_edu">Pendidikan Ayah</label>
                            <select class="form-select @error('dad_edu') is-invalid @enderror" id="dad_edu"
                                name="dad_edu">
                                <option selected disabled>--- pilih ---</option>
                                <option value="SD/Sederajat" {{ old('dad_edu') == 'SD/Sederajat' ? 'selected' : '' }}>
                                    SD/Sederajat</option>
                                <option value="SMP/Sederajat" {{ old('dad_edu') == 'SMP/Sederajat' ? 'selected' : '' }}>
                                    SMP/Sederajat</option>
                                <option value="SMA/Sederajat" {{ old('dad_edu') == 'SMA/Sederajat' ? 'selected' : '' }}>
                                    SMA/Sederajat</option>
                                <option value="D1" {{ old('dad_edu') == 'D1' ? 'selected' : '' }}>D1</option>
                                <option value="D2" {{ old('dad_edu') == 'D2' ? 'selected' : '' }}>D2</option>
                                <option value="D3" {{ old('dad_edu') == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="D4/S1" {{ old('dad_edu') == 'D4/S1' ? 'selected' : '' }}>D4/S1</option>
                                <option value="S2" {{ old('dad_edu') == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ old('dad_edu') == 'S3' ? 'selected' : '' }}>S3</option>
                            </select>
                            @error('dad_edu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="dad_occupation">Pekerjaan Ayah</label>
                            <select class="form-select @error('dad_occupation') is-invalid @enderror" id="dad_occupation"
                                name="dad_occupation">
                                <option selected disabled>--- pilih ---</option>
                                <option value="Dosen" {{ old('dad_occupation') == 'Dosen' ? 'selected' : '' }}>Dosen
                                </option>
                                <option value="Pegawai Bank"
                                    {{ old('dad_occupation') == 'Pegawai Bank' ? 'selected' : '' }}>Pegawai Bank</option>
                                <option value="Dokter" {{ old('dad_occupation') == 'Dokter' ? 'selected' : '' }}>Dokter
                                </option>
                                <option value="Perawat/Tenaga kesehatan lain"
                                    {{ old('dad_occupation') == 'Perawat/Tenaga kesehatan lain' ? 'selected' : '' }}>
                                    Perawat/Tenaga kesehatan lain
                                </option>
                                <option value="Pegawai Departemen Keuangan"
                                    {{ old('dad_occupation') == 'Pegawai Departemen Keuangan' ? 'selected' : '' }}>Pegawai
                                    Departemen Keuangan</option>
                                <option value="TNI" {{ old('dad_occupation') == 'TNI' ? 'selected' : '' }}>TNI
                                </option>
                                <option value="Polri" {{ old('dad_occupation') == 'Polri' ? 'selected' : '' }}>Polri
                                </option>
                                <option value="PNS" {{ old('dad_occupation') == 'PNS' ? 'selected' : '' }}>PNS
                                </option>
                                <option value="Tidak Bekerja"
                                    {{ old('dad_occupation') == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja
                                </option>
                                <option value="Nelayan" {{ old('dad_occupation') == 'Nelayan' ? 'selected' : '' }}>
                                    Nelayan</option>
                                <option value="Petani" {{ old('dad_occupation') == 'Petani' ? 'selected' : '' }}>Petani
                                </option>
                                <option value="Peternak" {{ old('dad_occupation') == 'Peternak' ? 'selected' : '' }}>
                                    Peternak</option>
                                <option value="Karyawan Swasta"
                                    {{ old('dad_occupation') == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan Swasta
                                </option>
                                <option value="Pedagang Kecil"
                                    {{ old('dad_occupation') == 'Pedagang Kecil' ? 'selected' : '' }}>Pedagang Kecil
                                </option>
                                <option value="Pedagang Besar"
                                    {{ old('dad_occupation') == 'Pedagang Besar' ? 'selected' : '' }}>Pedagang Besar
                                </option>
                                <option value="Wiraswasta" {{ old('dad_occupation') == 'Wiraswasta' ? 'selected' : '' }}>
                                    Wiraswasta</option>
                                <option value="Wirausaha" {{ old('dad_occupation') == 'Wirausaha' ? 'selected' : '' }}>
                                    Wirausaha</option>
                                <option value="Buruh" {{ old('dad_occupation') == 'Buruh' ? 'selected' : '' }}>Buruh
                                </option>
                                <option value="Pensiunan" {{ old('dad_occupation') == 'Pensiunan' ? 'selected' : '' }}>
                                    Pensiunan</option>
                                <option value="Tenaga Kerja Indonesia"
                                    {{ old('dad_occupation') == 'Tenaga Kerja Indonesia' ? 'selected' : '' }}>Tenaga Kerja
                                    Indonesia</option>
                                <option value="Tidak dapat diterapkan"
                                    {{ old('dad_occupation') == 'Tidak dapat diterapkan' ? 'selected' : '' }}>Tidak dapat
                                    diterapkan</option>
                                <option value="Sudah Meninggal"
                                    {{ old('dad_occupation') == 'Sudah Meninggal' ? 'selected' : '' }}>Sudah Meninggal
                                </option>
                                <option value="Lainnya" {{ old('dad_occupation') == 'Lainnya' ? 'selected' : '' }}>
                                    Lainnya</option>
                            </select>
                            @error('dad_occupation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="dad_income">
                                Penghasilan (gaji pokok dan pendapatan lain)
                            </label>
                            <input class="form-control @error('dad_income') is-invalid @enderror" id="dad_income"
                                name="dad_income" placeholder="Rp. xxx.xxx.xxx" value="{{ old('dad_income') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="dad_phone">Nomor Telpon Ayah</label>
                            <input class="form-control @error('dad_phone') is-invalid @enderror" id="dad_phone"
                                name="dad_phone" type="number" value="{{ old('dad_phone') }}" />
                            @error('dad_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                            <input class="form-control @error('mom') is-invalid @enderror" id="mom" name="mom"
                                type="text" value="{{ old('mom') }}" required />
                            @error('mom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="mom_edu">Pendidikan Ibu</label>
                            <select class="form-select @error('mom_edu') is-invalid @enderror" id="mom_edu"
                                name="mom_edu">
                                <option selected disabled>--- pilih ---</option>
                                <option value="SD/Sederajat" {{ old('mom_edu') == 'SD/Sederajat' ? 'selected' : '' }}>
                                    SD/Sederajat</option>
                                <option value="SMP/Sederajat" {{ old('mom_edu') == 'SMP/Sederajat' ? 'selected' : '' }}>
                                    SMP/Sederajat</option>
                                <option value="SMA/Sederajat" {{ old('mom_edu') == 'SMA/Sederajat' ? 'selected' : '' }}>
                                    SMA/Sederajat</option>
                                <option value="D1" {{ old('mom_edu') == 'D1' ? 'selected' : '' }}>D1</option>
                                <option value="D2" {{ old('mom_edu') == 'D2' ? 'selected' : '' }}>D2</option>
                                <option value="D3" {{ old('mom_edu') == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="D4/S1" {{ old('mom_edu') == 'D4/S1' ? 'selected' : '' }}>D4/S1</option>
                                <option value="S2" {{ old('mom_edu') == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ old('mom_edu') == 'S3' ? 'selected' : '' }}>S3</option>
                            </select>
                            @error('mom_edu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="mom_occupation">Pekerjaan Ibu</label>
                            <select class="form-select @error('mom_occupation') is-invalid @enderror" id="mom_occupation"
                                name="mom_occupation">
                                <option selected disabled>--- pilih ---</option>
                                <option value="Dosen" {{ old('mom_occupation') == 'Dosen' ? 'selected' : '' }}>Dosen
                                </option>
                                <option value="Pegawai Bank"
                                    {{ old('mom_occupation') == 'Pegawai Bank' ? 'selected' : '' }}>Pegawai Bank</option>
                                <option value="Dokter" {{ old('mom_occupation') == 'Dokter' ? 'selected' : '' }}>Dokter
                                </option>
                                <option value="Perawat/Tenaga kesehatan lain"
                                    {{ old('mom_occupation') == 'Perawat/Tenaga kesehatan lain' ? 'selected' : '' }}>
                                    Perawat/Tenaga kesehatan lain
                                </option>
                                <option value="Pegawai Departemen Keuangan"
                                    {{ old('mom_occupation') == 'Pegawai Departemen Keuangan' ? 'selected' : '' }}>Pegawai
                                    Departemen Keuangan</option>
                                <option value="TNI" {{ old('mom_occupation') == 'TNI' ? 'selected' : '' }}>TNI
                                </option>
                                <option value="Polri" {{ old('mom_occupation') == 'Polri' ? 'selected' : '' }}>Polri
                                </option>
                                <option value="PNS" {{ old('mom_occupation') == 'PNS' ? 'selected' : '' }}>PNS
                                </option>
                                <option value="Tidak Bekerja"
                                    {{ old('mom_occupation') == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja
                                </option>
                                <option value="Nelayan" {{ old('mom_occupation') == 'Nelayan' ? 'selected' : '' }}>
                                    Nelayan</option>
                                <option value="Petani" {{ old('mom_occupation') == 'Petani' ? 'selected' : '' }}>Petani
                                </option>
                                <option value="Peternak" {{ old('mom_occupation') == 'Peternak' ? 'selected' : '' }}>
                                    Peternak</option>
                                <option value="Karyawan Swasta"
                                    {{ old('mom_occupation') == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan Swasta
                                </option>
                                <option value="Pedagang Kecil"
                                    {{ old('mom_occupation') == 'Pedagang Kecil' ? 'selected' : '' }}>Pedagang Kecil
                                </option>
                                <option value="Pedagang Besar"
                                    {{ old('mom_occupation') == 'Pedagang Besar' ? 'selected' : '' }}>Pedagang Besar
                                </option>
                                <option value="Wiraswasta" {{ old('mom_occupation') == 'Wiraswasta' ? 'selected' : '' }}>
                                    Wiraswasta</option>
                                <option value="Wirausaha" {{ old('mom_occupation') == 'Wirausaha' ? 'selected' : '' }}>
                                    Wirausaha</option>
                                <option value="Buruh" {{ old('mom_occupation') == 'Buruh' ? 'selected' : '' }}>Buruh
                                </option>
                                <option value="Pensiunan" {{ old('mom_occupation') == 'Pensiunan' ? 'selected' : '' }}>
                                    Pensiunan</option>
                                <option value="Tenaga Kerja Indonesia"
                                    {{ old('mom_occupation') == 'Tenaga Kerja Indonesia' ? 'selected' : '' }}>Tenaga Kerja
                                    Indonesia</option>
                                <option value="Tidak dapat diterapkan"
                                    {{ old('mom_occupation') == 'Tidak dapat diterapkan' ? 'selected' : '' }}>Tidak dapat
                                    diterapkan</option>
                                <option value="Sudah Meninggal"
                                    {{ old('mom_occupation') == 'Sudah Meninggal' ? 'selected' : '' }}>Sudah Meninggal
                                </option>
                                <option value="Lainnya" {{ old('mom_occupation') == 'Lainnya' ? 'selected' : '' }}>
                                    Lainnya</option>
                            </select>
                            @error('mom_occupation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="mom_income">
                                Penghasilan (gaji pokok dan pendapatan lain)
                            </label>
                            <input class="form-control @error('mom_income') is-invalid @enderror" id="mom_income"
                                name="mom_income" placeholder="Rp. xxx.xxx.xxx" value="{{ old('mom_income') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="mom_phone">Nomor Telpon Ibu</label>
                            <input class="form-control @error('mom_phone') is-invalid @enderror" id="mom_phone"
                                name="mom_phone" type="number" value="{{ old('mom_phone') }}" />
                            @error('mom_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                                <li class="list-group-item">Foto dengan seragam TK background polos</li>
                                <li class="list-group-item">Foto berukuran 4x6</li>
                                <li class="list-group-item">File foto berupa .png atau .jpg/.jpeg</li>
                                <li class="list-group-item">Maksimal ukuran foto 3 mb</li>
                            </ul>
                        </div>

                        <p>Upload file foto</p>
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="type" value="upload_foto">
                        <div class="mb-3">
                            <input class="form-control @error('document') is-invalid @enderror" type="file"
                                id="document" name="document" accept="image/png, image/jpeg">
                        </div>
                        <p class="d-block py-2 text-start">*Ukuran maksimal 3 MB</p>
                        <!-- Preview -->
                        <div id="preview-container" class="border border-orange border-2 text-center p-2 hfoto">
                            <img id="preview-photo" src="#" alt="Preview Foto"
                                class="img-fluid mx-auto d-block hifoto" style="max-height: 200px;">

                        </div>
                        <div class="w-100 mt-3">
                            <button type="button" class="btn btn-secondary prev w-25 float-start">Kembali</button>
                            <button type="submit" class="btn btn-success w-25 float-end"
                                onclick="return confirm('Pastikan semua data yang diisi sudah benar. Apakah anda yakin ingin menyimpan?')">
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

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
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
        @if ($showPopup)
            document.addEventListener("DOMContentLoaded", function() {
                var prepareModal = new bootstrap.Modal(document.getElementById('prepareModal'));
                prepareModal.show();
            });
        @endif

        const steps = document.querySelectorAll(".step");
        const nextBtns = document.querySelectorAll(".next");
        const prevBtns = document.querySelectorAll(".prev");
        const progressBar = document.getElementById("progress-bar");
        const progressText = document.getElementById("progress-text");
        let currentStep = 0;

        function showStep(step) {
            steps.forEach((s, i) => {
                s.classList.toggle("active", i === step);
            });
            progressBar.style.width = ((step + 1) / steps.length) * 100 + "%";
            progressText.innerText = `Tahap ${step + 1} dari ${steps.length}`;
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

        // Auto-scroll ke step yang ada error jika ada validation error
        @if ($errors->any())
            (function() {
                const steps = document.querySelectorAll(".step");
                for (let i = 0; i < steps.length; i++) {
                    if (steps[i].querySelector(".is-invalid")) {
                        currentStep = i;
                        showStep(currentStep);
                        steps[i].scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        break;
                    }
                }
            })();
        @endif

        document.getElementById("document").addEventListener("change", function(event) {
            let file = event.target.files[0];
            let imgPreview = document.getElementById("preview-photo");
            let container = document.getElementById("preview-container");
            let photo = document.getElementById('preview-photo')

            if (file) {
                // validasi ukuran
                if (file.size > 3145728) {
                    alert("Ukuran file maksimal 3 MB!");
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

        function toggleSiblingFields(select) {
            const fields = document.getElementById('sibling-fields');
            if (select.value === 'Ya') {
                fields.classList.remove('d-none');
            } else {
                fields.classList.add('d-none');
            }
        }
    </script>
@endpush
