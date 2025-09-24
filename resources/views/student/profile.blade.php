@extends('layouts.dashboard')

@section('title', 'Detail User Page')

@section('content')

    @include('layouts.partial.name')

    <div class="bg-white p-3 rounded mb-3 d-flex justify-content-between">
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-orange text-white"> <i class="bi bi-arrow-left-circle"></i>
            kembali</a>
        <p class="fs-5 text-center mb-0">Detail Data Pendaftar</p>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-5 mb-3">
            <div class="bg-white rounded p-3">
                <div class=" text-center">
                    @if (isset($data->document))
                        <div class=" p-3 mb-3">
                            <img src="{{ asset('img-document/' . $data->document) }}" alt="document"
                                class="p-2 bg-white border border-4 border-orange foto ">
                        </div>
                    @else
                        <div class="bg-white rounded p-3 mb-3 text-center">
                            <p>Silahkan upload Foto TK Ananda</p>
                            <img class="logouser p-2 rounded-circle bg-white border border-5 border-orange mb-3"
                                src="{{ asset('img/user.png') }}" alt="user" />
                        </div>
                    @endif
                </div>
                <div class="my-3 text-center">
                    <p class="fw-bold">{{ $student->full_name }}</p>
                </div>
                <hr>
                <div class="mb-3 ">
                    <label class="form-label text-muted">Nama Panggilan</label>
                    <p class="fw-bold">{{ $student->nick_name }}</p>
                </div>

                <div class="mb-3">
                    <tr>
                        <label class="form-label text-muted">Jenis Kelamin</label>
                        <p class="fw-bold">{{ $student->gender }}</p>
                    </tr>
                    <tr>
                        <label class="form-label text-muted">Tempat, Tanggal lahir</label>
                        <p class="fw-bold">{{ $student->place_birth }},
                            {{ \Carbon\Carbon::parse($student->date_birth)->isoFormat('DD MMMM YYYY') }} </p>
                    </tr>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7">
            <div class="bg-white rounded p-3 min-vh-100 ">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                            type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Calon
                            Siswa</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                            type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Orang
                            Tua</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                        tabindex="0">
                        <table class="table">
                            <tbody>


                                <tr>
                                    <td>NIK</td>
                                    <td>{{ $student->nik }}</td>
                                </tr>
                                <tr>
                                    <td>No. KK</td>
                                    <td>{{ $student->kk }}</td>
                                </tr>
                                <tr>
                                    <td>Asal TK</td>
                                    <td>{{ $student->school_origin }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat TK</td>
                                    <td>{{ $student->school_address }}</td>
                                </tr>
                                <tr>
                                    <td>NISN TK</td>
                                    <td>{{ $student->school_nisn }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $student->address }}, {{ $student->rtrw }} {{ $student->desa }}
                                        {{ $student->kecamatan }} {{ $student->kota }} {{ $student->provinsi }}</td>
                                </tr>
                                <tr>
                                    <td>Kebutuhan Khusus</td>
                                    <td>{{ $student->special_needs }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah saudara kandung yang masih sekolah di SDIT Harum Jember</td>
                                    <td>{{ $student->saudara_kandung_di_sdit }}</td>
                                </tr>
                                <tr>
                                    <td>Tinggal bersama</td>
                                    <td>{{ $student->living }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0">
                        <p class="badge bg-orange mt-3">Data Ayah</p>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="width">Ayah</td>
                                    <td>{{ $student->dad }}</td>
                                </tr>
                                <tr>
                                    <td>Pendidikan</td>
                                    <td>{{ $student->dad_edu }}</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>{{ $student->dad_occupation }}</td>
                                </tr>
                                <tr>
                                    <td>Penghasilan</td>
                                    <td>{{ $student->dad_income }}</td>
                                </tr>
                                <tr>
                                    <td>HP</td>
                                    <td>{{ $student->dad_phone }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="badge bg-orange">Data Ibu</p>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="width">Ibu</td>
                                    <td>{{ $student->mom }}</td>
                                </tr>
                                <tr>
                                    <td>Pendidikan</td>
                                    <td>{{ $student->mom_edu }}</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>{{ $student->mom_occupation }}</td>
                                </tr>
                                <tr>
                                    <td>Penghasilan</td>
                                    <td>{{ $student->mom_income }}</td>
                                </tr>
                                <tr>
                                    <td>Hp</td>
                                    <td>{{ $student->mom_phone }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
    {{-- </div> --}}
@endsection

@push('css')
    <style>
        .width {
            width: 170px
        }

        .foto {
            height: 150px;
        }

        @media (max-width: 700px) {
            .width {
                width: 110px;
            }
        }
    </style>
@endpush
