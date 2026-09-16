<table id="table" class="table table-bordered rounded align-middle">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Cabang</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Nama Panggilan</th>
            <th scope="col">Asal Sekolah</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Tempat, Tanggal Lahir</th>
            <th scope="col">Berkebutuhan Khusus</th>
            <th scope="col">Hiperaktif</th>
            <th scope="col">Sulit Fokus</th>
            <th scope="col">Kesulitan Kontrol Impuls</th>
            <th scope="col">Tantrum Ekstrim</th>
            <th scope="col">Butuh Shadow Teacher</th>
            <th scope="col">Saudara Kandung di SDIT</th>
            <th scope="col">Jumlah Saudara</th>
            <th scope="col">Nama Saudara</th>
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
                <td>{{ $student->branch === 'sditharum_1' ? 'Harum 1' : 'Harum 2' }}</td>
                <td>{{ $student->full_name }}</td>
                <td>{{ $student->nick_name }}</td>
                <td>{{ $student->school_origin }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->place_birth }}, {{ date('d-m-Y', strtotime($student->date_birth)) }}</td>
                <td>{{ $student->special_needs }}</td>
                <td>{{ $student->is_hyperactive }}</td>
                <td>{{ $student->is_difficult_focus }}</td>
                <td>{{ $student->is_impulse_control }}</td>
                <td>{{ $student->is_extreme_tantrum }}</td>
                <td>{{ $student->needs_shadow_teacher }}</td>
                <td>{{ $student->saudara_kandung_di_sdit }}</td>
                <td>{{ $student->saudara_count }}</td>
                <td>{{ $student->saudara_names }}</td>
                <td>{{ $student->living }}</td>
                <td>{{ $student->address }}, {{ $student->rtrw }} {{ $student->desa }} {{ $student->kecamatan }}
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
