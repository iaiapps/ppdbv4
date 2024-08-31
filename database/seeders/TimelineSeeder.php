<?php

namespace Database\Seeders;

use App\Models\Timeline;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // gelombang 1
        Timeline::create([
            'icon' => '1.png',
            'name' => 'Pendaftaran Gelombang 1 ',
            'date' => '01 Sept 2024 s/d 31 Okt 2024',
            'type' => 'gelombang_1'
        ]);
        Timeline::create([
            'icon' => '2.png',
            'name' => 'Observasi & Psikotest Gelombang 1',
            'date' => '03 Februari 2024',
            'type' => 'gelombang_1'
        ]);
        Timeline::create([
            'icon' => '3.png',
            'name' => 'Pengumuman Hasil PPDB Gelombang 1',
            'date' => '01 Desember 2024',
            'type' => 'gelombang_1'
        ]);
        Timeline::create([
            'icon' => '4.png',
            'name' => 'Pembayaran Daftar Ulang Gelombang 1',
            'date' => '02 - 08 Desember 2024',
            'type' => 'gelombang_1'
        ]);

        // gelombang 2
        Timeline::create([
            'icon' => '1.png',
            'name' => 'Pendaftaran Gelomabng 2 ',
            'date' => '10 Des 2024 s/d 10 Feb 2025',
            'type' => 'gelombang_2'
        ]);
        Timeline::create([
            'icon' => '2.png',
            'name' => 'Observasi & Psikotest Gelomabng 2',
            'date' => '15 Februari 2024',
            'type' => 'gelombang_2'
        ]);
        Timeline::create([
            'icon' => '3.png',
            'name' => 'Pengumuman Hasil PPDB Gelomabng 2',
            'date' => '01 Maret 2025',
            'type' => 'gelombang_2'
        ]);
        Timeline::create([
            'icon' => '4.png',
            'name' => 'Pembayaran Daftar Ulang Gelomabng 2',
            'date' => '02 - 08 Maret 2025',
            'type' => 'gelombang_2'
        ]);

        // other
        Timeline::create([
            'icon' => '5.png',
            'name' => 'Test Penempatan BTAQ & Fitting seragam',
            'date' => '26 April 2024',
            'type' => 'other'
        ]);
        Timeline::create([
            'icon' => '6.png',
            'name' => 'Pembagian seragam & kelas',
            'date' => '22 Juni 2025',
            'type' => 'other'
        ]);
    }
}
