<?php

namespace Database\Seeders;

use App\Models\CostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CostCatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //laki-laki
        CostCategory::create([
            'name' => 'standart',
            'gender' => 'laki-laki',
            'gedung' => 6500000,
            'perpustakaan' => 300000,
            'kegiatan' => 1500000,
            'bukumedia' => 1300000,
            'seragam' => 900000,
            'jilbab' => 0,
            'ipp' => 845000,
            'total' => 11345000,
        ]);
        CostCategory::create([
            'name' => 'kakak 1',
            'gender' => 'laki-laki',
            'gedung' => 6250000,
            'perpustakaan' => 300000,
            'kegiatan' => 1500000,
            'bukumedia' => 1300000,
            'seragam' => 900000,
            'jilbab' => 0,
            'ipp' => 820000,
            'total' => 11070000,
        ]);
        CostCategory::create([
            'name' => 'kakak 2',
            'gender' => 'laki-laki',
            'gedung' => 6000000,
            'perpustakaan' => 300000,
            'kegiatan' => 1500000,
            'bukumedia' => 1300000,
            'seragam' => 900000,
            'jilbab' => 0,
            'ipp' => 795000,
            'total' => 10795000,
        ]);
        CostCategory::create([
            'name' => 'Anak Guru',
            'gender' => 'laki-laki',
            'gedung' => 0,
            'perpustakaan' => 300000,
            'kegiatan' => 0,
            'bukumedia' => 1300000,
            'seragam' => 900000,
            'jilbab' => 0,
            'ipp' => 150000,
            'total' => 2650000,
        ]);

        // perempuan
        CostCategory::create([
            'name' => 'standart',
            'gender' => 'perempuan',
            'gedung' => 6500000,
            'perpustakaan' => 300000,
            'kegiatan' => 1500000,
            'bukumedia' => 1300000,
            'seragam' => 900000,
            'jilbab' => 160000,
            'ipp' => 845000,
            'total' => 11505000,
        ]);
        CostCategory::create([
            'name' => 'kakak 1',
            'gender' => 'perempuan',
            'gedung' => 6250000,
            'perpustakaan' => 300000,
            'kegiatan' => 1500000,
            'bukumedia' => 1300000,
            'seragam' => 900000,
            'jilbab' => 160000,
            'ipp' => 820000,
            'total' => 11230000,
        ]);
        CostCategory::create([
            'name' => 'kakak 2',
            'gender' => 'perempuan',
            'gedung' => 6000000,
            'perpustakaan' => 300000,
            'kegiatan' => 1500000,
            'bukumedia' => 1300000,
            'seragam' => 900000,
            'jilbab' => 160000,
            'ipp' => 795000,
            'total' => 10955000,
        ]);
        CostCategory::create([
            'name' => 'Anak Guru',
            'gender' => 'perempuan',
            'gedung' => 0,
            'perpustakaan' => 300000,
            'kegiatan' => 0,
            'bukumedia' => 1300000,
            'seragam' => 900000,
            'jilbab' => 160000,
            'ipp' => 150000,
            'total' => 2810000,
        ]);
    }
}
