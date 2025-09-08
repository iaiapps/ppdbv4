<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // tagline
        Setting::create([
            'name' => 'tagline',
            'desc' => 'pesan atas',
            'value' => 'Sistem Penerimaan Murid Baru SDIT Harapan Umat Jember Tahun 2026/2027',
        ]);

        // kontak
        Setting::create([
            'name' => 'Pak Ristiono',
            'desc' => 'Koordinator SPMB',
            'value' => '088289378109',
        ]);
        Setting::create([
            'name' => 'Pak Ikrom',
            'desc' => 'Admin WEb SPMB',
            'value' => '085232213939',
        ]);

        // pelayanan
        Setting::create([
            'name' => 'Jam Sekolah',
            'desc' => "Senin s/d Jum'at",
            'value' => '08.00-15.30',
        ]);
        Setting::create([
            'name' => 'Konsultasi (Online)',
            'desc' => 'Sabtu',
            'value' => '08.00-11.30',
        ]);
        Setting::create([
            'name' => 'Libur',
            'desc' => 'Minggu',
            'value' => '08.00-11.30',
        ]);
        Setting::create([
            'name' => 'onoff',
            'desc' => 'setting buka tutup web ppdb',
            'value' => 1,
        ]);
        Setting::create([
            'name' => 'countdown',
            'desc' => 'Tanggal pembukaan SPMB',
            'value' => "2025-09-15 00:00:00",
        ]);
    }
}
