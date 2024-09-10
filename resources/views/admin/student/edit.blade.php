@extends('layouts.dashboard')

@section('title', 'Form Page')
@section('content')
    <div class="container-fluid">
        <div class="row bg-white">
            <div class="col-12 col-md-4 bg-orange p-3 p-md-5">
                <div class="text-md-end text-center">
                    <img src="{{ asset('/img/gbr.png') }}" class="img" alt="logoppdb" />
                    <p class="fs-3 my-4 text-white">
                        Formulir Pendaftaran Siswa Baru SDIT Harapan Umat Jember
                    </p>
                </div>
                <hr class="hr" />

            </div>
            <div class="col-12 col-md-8 p-3 p-md-5">
                <form action="{{ route('student.update', $student->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card">
                            <p class="fs-4">Identitas Calon Siswa</p>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="full_name">Nama Lengkap
                                        </label>
                                        <input class="form-control" id="full_name" name="full_name" type="text"
                                            value="{{ $student->full_name }}" required />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nick_name">Nama Panggilan</label>
                                        <input class="form-control" id="nick_name" name="nick_name" type="text"
                                            value="{{ $student->nick_name }}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nik">NIK
                                        </label>
                                        <input class="form-control" id="nik" name="nik" type="text"
                                            value="{{ $student->nik }}" required />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="kk">No KK</label>
                                        <input class="form-control" id="kk" name="kk" type="text"
                                            value="{{ $student->kk }}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="school_origin">Asal TK</label>
                                <input class="form-control" id="school_origin" name="school_origin" type="text"
                                    value="{{ $student->school_origin }}" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="school_nisn">NISN TK</label>
                                <input class="form-control" id="school_nisn" name="school_nisn" type="text"
                                    value="{{ $student->school_nisn }}" placeholder="Diisi jika memiliki NISN di TK" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="gender">Jenis Kelamin</label>
                                <select class="form-select" id="gender" name="gender">
                                    <option selected>{{ $student->gender }}</option>
                                    <hr>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="place_birth">Tempat Lahir</label>
                                        <input class="form-control" id="place_birth" name="place_birth" type="text"
                                            value="{{ $student->place_birth }}" required />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_birth">Tanggal Lahir</label>
                                        <input class="form-control" name="date_birth" type="date" id="date_birth"
                                            value="{{ $student->date_birth }}" placeholder="Bulan/Hari/Tahun" />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="special_needs">Berkebutuhan Khusus</label>
                                <select class="form-select" id="special_needs" name="special_needs">
                                    <option selected>{{ $student->special_needs }}</option>
                                    <hr>
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
                                    <option selected>{{ $student->saudara_kandung_di_sdit }}</option>
                                    <hr>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <hr />
                            <div class="mb-3">
                                <label class="form-label" for="living">Tempat Tinggal</label>
                                <select class="form-select" id="living" name="living">
                                    <option selected>{{ $student->living }}</option>
                                    <hr>
                                    <option>Bersama orangtua</option>
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
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="{{ $student->address }}" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="rt" class="form-label">RT/RW</label>
                                    <input type="text" class="form-control" id="rt" name="rtrw"
                                        value="{{ $student->rtrw }}" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="postalcode" class="form-label">Kode Pos</label>
                                    <input type="number" class="form-control" id="postalcode" name="postalcode"
                                        value="{{ $student->postalcode }}" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="desa" class="form-label">Desa/Kelurahan</label>
                                    <input type="text" required class="form-control" id="desa" name="desa"
                                        value="{{ $student->desa }}" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <input type="text" required class="form-control" id="kecamatan" name="kecamatan"
                                        value="{{ $student->kecamatan }}" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="kota" class="form-label">Kabupaten/Kota</label>
                                    <input type="text" required class="form-control" id="kota" name="kota"
                                        value="{{ $student->kota }}" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="provinsi" class="form-label">Provinsi</label>
                                    <input type="text" required class="form-control" id="provinsi" name="provinsi"
                                        value="{{ $student->provinsi }}" />
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <hr />
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <p class="fs-4">Identitas Ayah</p>
                            <div class="mb-3">
                                <label class="form-label" for="dad">Nama Ayah</label>
                                <input class="form-control" id="dad" name="dad" type="text"
                                    value="{{ $student->dad }}" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="dad_edu">Pendidikan Ayah</label>
                                <select class="form-select" id="dad_edu" name="dad_edu">
                                    <option selected>{{ $student->dad_edu }}</option>
                                    <hr>
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

                                    <option selected>{{ $student->dad_occupation }}</option>
                                    <hr>
                                    <option>Dosen</option>
                                    <option>Pegawai Bank</option>
                                    <option>Dokter</option>
                                    <option>Perawat/Tenaga kesehatan lain</option>
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
                                <select class="form-select" id="dad_income" name="dad_income">
                                    <option selected>{{ $student->dad_income }}</option>
                                    <hr>
                                    <option>kurang dari Rp. 1.000.000</option>
                                    <option> Rp. 1.000.000 - Rp. 2.000.000 </option>
                                    <option> Rp. 2.000.000 - Rp. 3.000.000 </option>
                                    <option> Rp. 3.000.000 - Rp. 4.000.000 </option>
                                    <option> Rp. 4.000.000 - Rp. 5.000.000 </option>
                                    <option> Rp. 5.000.000 - Rp. 7.500.000 </option>
                                    <option> Rp. 7.500.000 - Rp. 10.000.000 </option>
                                    <option> Rp. 10.000.000 - Rp. 20.000.000 </option>
                                    <option>Lebih dari Rp. 20.000.000</option>
                                    <option>Tidak berpenghasilan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="dad_phone">Nomor Telpon Ayah</label>
                                <input class="form-control" id="dad_phone" name="dad_phone" type="number"
                                    value="{{ $student->dad_phone }}" />
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <p class="fs-4">Identitas Ibu</p>
                            <div class="mb-3">
                                <label class="form-label" for="mom">Nama Ibu</label>
                                <input class="form-control" id="mom" name="mom" type="text"
                                    value="{{ $student->mom }}" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="mom_edu">Pendidikan Ibu</label>
                                <select class="form-select" id="mom_edu" name="mom_edu">
                                    <option selected>{{ $student->mom_edu }}</option>
                                    <hr>
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
                                    <option selected>{{ $student->mom_occupation }}</option>
                                    <hr>
                                    <option>Dosen</option>
                                    <option>Pegawai Bank</option>
                                    <option>Dokter</option>
                                    <option> Perawat/Tenaga kesehatan lain </option>
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
                                <select class="form-select" id="mom_income" name="mom_income">
                                    <option selected>{{ $student->mom_income }}</option>
                                    <hr>
                                    <option>kurang dari Rp. 1.000.000</option>
                                    <option> Rp. 1.000.000 - Rp. 2.000.000 </option>
                                    <option> Rp. 2.000.000 - Rp. 3.000.000 </option>
                                    <option> Rp. 3.000.000 - Rp. 4.000.000 </option>
                                    <option> Rp. 4.000.000 - Rp. 5.000.000 </option>
                                    <option> Rp. 5.000.000 - Rp. 7.500.000 </option>
                                    <option> Rp. 7.500.000 - Rp. 10.000.000 </option>
                                    <option> Rp. 10.000.000 - Rp. 20.000.000 </option>
                                    <option>Lebih dari Rp. 20.000.000</option>
                                    <option>Tidak berpenghasilan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="mom_phone">Nomor Telpon Ibu</label>
                                <input class="form-control" id="mom_phone" name="mom_phone" type="number"
                                    value="{{ $student->mom_phone }}" />
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-orange w-100 mt-3"
                        onclick="return confirm('Pastikan Data yang anda kirim sudah benar!')" value="Simpan Data">
                </form>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .img {
            width: 40vh;
        }

        @media (max-width: 600px) {
            .img {
                width: 20vh;
            }
        }
    </style>
@endpush
