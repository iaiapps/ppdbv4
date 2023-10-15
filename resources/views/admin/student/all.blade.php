@extends('layouts.dashboard')

@section('title', 'All Student Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 ">
        <p class="fs-5 text-center">Data semua siswa yang sudah mengisi Formulir Pendaftaran</p>
        <hr>
        <div class="table-responsive">
            <table id="table" class="table table-striped rounded align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Nama Panggilan</th>
                        <th scope="col">Asal Sekolah</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tempat, Tanggal Lahir</th>
                        <th scope="col">Berkebutuhan Khusus</th>
                        <th scope="col">Saudara Kandung di SDIT</th>
                        <th scope="col">Tinggal Bersama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nama Ayah</th>
                        <th scope="col">Pendidikan Ayah</th>
                        <th scope="col">Pekerjaan Ayah</th>
                        <th scope="col">Penghasilan Ayah</th>
                        <th scope="col">No Hp Ayah</th>
                        <th scope="col">Nama Ibu</th>
                        <th scope="col">Pendidikan Ibu</th>
                        <th scope="col">Pekerjaan Ibu</th>
                        <th scope="col">Penghasilan Ibu</th>
                        <th scope="col">No Hp Ibu</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->nick_name }}</td>
                            <td>{{ $student->school_origin }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->place_birth }}, {{ date('d-m-Y', strtotime($student->date_birth)) }}
                            </td>
                            <td>{{ $student->special_needs }}</td>
                            <td>{{ $student->saudara_kandung_di_sdit }}</td>
                            <td>{{ $student->living }}</td>
                            <td>{{ $student->address }}, {{ $student->desa }}
                                {{ $student->kecamatan }}
                                {{ $student->kota }} {{ $student->provinsi }}</td>
                            <td>{{ $student->dad }}</td>
                            <td>{{ $student->dad_edu }}</td>
                            <td>{{ $student->dad_occupation }}</td>
                            <td>{{ $student->dad_income }}</td>
                            <td>{{ $student->dad_phone }}</td>
                            <td>{{ $student->mom }}</td>
                            <td>{{ $student->mom_edu }}</td>
                            <td>{{ $student->mom_occupation }}</td>
                            <td>{{ $student->mom_income }}</td>
                            <td>{{ $student->mom_phone }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
