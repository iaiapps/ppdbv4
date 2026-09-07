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
            'icon' => '<i class="bi bi-person-plus fs-4"></i>',
            'name' => 'Pendaftaran',
            'date' => '14 September 2026 - 31 Oktober 2026',
        ]);
        Timeline::create([
            'icon' => '<i class="bi bi-eyeglasses fs-4"></i>',
            'name' => 'Observasi & Psikotest',
            'date' => '07 November 2026',
        ]);
        Timeline::create([
            'icon' => '<i class="bi bi-megaphone fs-4"></i>',
            'name' => 'Pengumuman Hasil SPMB',
            'date' => '04 Desember 2026',
        ]);
        Timeline::create([
            'icon' => '<i class="bi bi-credit-card fs-4"></i>',
            'name' => 'Pembayaran Daftar Ulang',
            'date' => '04 - 18 Desember 2026',
        ]);

        Timeline::create([
            'icon' => '<i class="bi bi-book fs-4"></i>',
            'name' => 'Test BTAQ dan Fitting Seragam',
            'date' => '08 Mei 2027',
        ]);
        Timeline::create([
            'icon' => '<i class="bi bi-gift fs-4"></i>',
            'name' => 'Pembagian seragam & kelas',
            'date' => '06 Juli 2027',
        ]);
    }
}
