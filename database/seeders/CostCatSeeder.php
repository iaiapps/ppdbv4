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
            'gedung' => 5500000,
            'perpustakaan' => 300000,
            'kegiatan' => 1000000,
            'bukumedia' => 1150000,
            'seragam' => 800000,
            'jilbab' => 0,
            'ipp' => 674000,
        ]);
        CostCategory::create([
            'name' => 'kakak 1',
            'gender' => 'laki-laki',
            'gedung' => 5250000,
            'perpustakaan' => 300000,
            'kegiatan' => 1000000,
            'bukumedia' => 1150000,
            'seragam' => 800000,
            'jilbab' => 0,
            'ipp' => 649000,
        ]);
        CostCategory::create([
            'name' => 'kakak 2',
            'gender' => 'laki-laki',
            'gedung' => 5000000,
            'perpustakaan' => 300000,
            'kegiatan' => 1000000,
            'bukumedia' => 1150000,
            'seragam' => 800000,
            'jilbab' => 0,
            'ipp' => 624000,
        ]);
        CostCategory::create([
            'name' => 'Anak Guru',
            'gender' => 'laki-laki',
            'gedung' => 0,
            'perpustakaan' => 300000,
            'kegiatan' => 0,
            'bukumedia' => 1150000,
            'seragam' => 800000,
            'jilbab' => 0,
            'ipp' => 135000,
        ]);

        // perempuan
        CostCategory::create([
            'name' => 'standart',
            'gender' => 'perempuan',
            'gedung' => 5500000,
            'perpustakaan' => 300000,
            'kegiatan' => 1000000,
            'bukumedia' => 1150000,
            'seragam' => 800000,
            'jilbab' => 160000,
            'ipp' => 674000,
        ]);
        CostCategory::create([
            'name' => 'kakak 1',
            'gender' => 'perempuan',
            'gedung' => 5250000,
            'perpustakaan' => 300000,
            'kegiatan' => 1000000,
            'bukumedia' => 1150000,
            'seragam' => 800000,
            'jilbab' => 160000,
            'ipp' => 649000,
        ]);
        CostCategory::create([
            'name' => 'kakak 2',
            'gender' => 'perempuan',
            'gedung' => 5000000,
            'perpustakaan' => 300000,
            'kegiatan' => 1000000,
            'bukumedia' => 1150000,
            'seragam' => 800000,
            'jilbab' => 160000,
            'ipp' => 624000,
        ]);
        CostCategory::create([
            'name' => 'Anak Guru',
            'gender' => 'perempuan',
            'gedung' => 0,
            'perpustakaan' => 300000,
            'kegiatan' => 0,
            'bukumedia' => 1150000,
            'seragam' => 800000,
            'jilbab' => 160000,
            'ipp' => 135000,
        ]);
    }
}
