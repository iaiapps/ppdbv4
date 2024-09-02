@extends('layouts.dashboard')

@section('title', 'Detail User Page')

@section('content')

    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100">
        <a href="{{ url()->previous() }}" class="btn btn-outline-primary btn-sm mb-3"> <i class="bi bi-arrow-left-circle"></i>
            kembali</a>

        <p class="fs-5 text-center mb-0">Detail Data Pendaftar</p>
        <hr>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="foto-tab" data-bs-toggle="tab" data-bs-target="#foto-tab-pane"
                    type="button" role="tab" aria-controls="foto-tab-pane" aria-selected="true">
                    Foto Siswa</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button"
                    role="tab" aria-controls="home-tab-pane" aria-selected="true">Calon
                    Siswa</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"> Orang
                    Tua</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="foto-tab-pane" role="tabpanel" aria-labelledby="foto-tab"
                tabindex="0">
                <div class="text-center">
                    @if ($foto->document)
                        <img class="foto" src="{{ asset('img-document/' . $foto->document) }}" alt="foto profil">
                    @else
                        <p>belum upload foto</p>
                    @endif
                </div>
            </div>
            <div class="tab-pane fade " id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="width">Nama</td>
                            <td>{{ $student->full_name }}</td>
                        </tr>
                        <tr>
                            <td>Panggilan</td>
                            <td>{{ $student->nick_name }}</td>
                        </tr>
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
                            <td>NISN TK</td>
                            <td>{{ $student->school_nisn }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>{{ $student->gender }}</td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal lahir</td>
                            <td>{{ $student->place_birth }},
                                {{ \Carbon\Carbon::parse($student->date_birth)->isoFormat('DD MMMM YYYY') }} </td>
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
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
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
@endsection

@push('css')
    <style>
        .width {
            width: 170px
        }

        .foto {
            height: 500px;
        }

        @media (max-width: 700px) {
            .width {
                width: 110px;
            }

            .foto {
                height: 300px;
            }
        }
    </style>
@endpush
