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
            'icon' => '<i class="fas fa-clock fs-4"></i>',
            'name' => 'Pendaftaran',
            'date' => '15 September 2025 - 31 Oktober 2025',
        ]);
        Timeline::create([
            'icon' => '<i class="fas fa-clock fs-4"></i>',
            'name' => 'Observasi & Psikotest',
            'date' => '08 November 2025',
        ]);
        Timeline::create([
            'icon' => '<i class="fas fa-clock fs-4"></i>',
            'name' => 'Pengumuman Hasil PPDB',
            'date' => '01 Desember 2025',
        ]);
        Timeline::create([
            'icon' => '<i class="fas fa-clock fs-4"></i>',
            'name' => 'Pembayaran Daftar Ulang',
            'date' => '01 - 10 Desember 2025',
        ]);

        Timeline::create([
            'icon' => '<i class="fas fa-clock fs-4"></i>',
            'name' => 'Test BTAQ dan Fitting Seragam',
            'date' => '09 Mei 2026',
        ]);
        Timeline::create([
            'icon' => '<i class="fas fa-clock fs-4"></i>',
            'name' => 'Pembagian seragam & kelas',
            'date' => '06 Juli 2026',
        ]);
    }
}
