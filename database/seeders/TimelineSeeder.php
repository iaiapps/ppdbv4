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
            'name' => 'PPDB Sdit Harum Jember',
            'date' => '02 Okt 2023 s/d 01 Jan 2024',
        ]);
        Timeline::create([
            'icon' => '2.png',
            'name' => 'Observasi & Psikotest',
            'date' => '12 Februari 2024',
        ]);
        Timeline::create([
            'icon' => '3.png',
            'name' => 'Pengumuman Hasil PPDB',
            'date' => '11 Maret 2024',
        ]);
        Timeline::create([
            'icon' => '4.png',
            'name' => 'Pembayaran Daftar Ulang',
            'date' => '11-27 Maret 2024',
        ]);
        Timeline::create([
            'icon' => '5.png',
            'name' => 'Test BTAQ & Fitting seragam',
            'date' => '11-12 Mei 2024',
        ]);
        Timeline::create([
            'icon' => '6.png',
            'name' => 'Pembagian seragam & kelas',
            'date' => '06 Juli 2024',
        ]);
    }
}
