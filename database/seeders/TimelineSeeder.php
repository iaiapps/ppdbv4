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
        Timeline::create([
            'icon' => '1.png',
            'name' => 'Pendaftaran ',
            'date' => '01 Okt 2023 s/d 15 Jan 2024',
        ]);
        Timeline::create([
            'icon' => '2.png',
            'name' => 'Observasi & Psikotest',
            'date' => '03 Februari 2024',
        ]);
        Timeline::create([
            'icon' => '3.png',
            'name' => 'Pengumuman Hasil PPDB',
            'date' => '03 Maret 2024',
        ]);
        Timeline::create([
            'icon' => '4.png',
            'name' => 'Pembayaran Daftar Ulang',
            'date' => '04 - 15 Maret 2024',
        ]);
        Timeline::create([
            'icon' => '5.png',
            'name' => 'Test BTAQ & Fitting seragam',
            'date' => '17-18 Mei 2024',
        ]);
        Timeline::create([
            'icon' => '6.png',
            'name' => 'Pembagian seragam & kelas',
            'date' => '10 Juli 2024',
        ]);
    }
}
