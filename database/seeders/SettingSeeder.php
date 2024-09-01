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
        Setting::create([
            'name' => 'tagline',
            'desc' => 'pesan 1',
            'value' => 'Telah dibuka untuk tahun 2025/2026',
        ]);
        Setting::create([
            'name' => 'tagline',
            'desc' => 'pesan 2',
            'value' => 'Segera daftar, kuota terbatas!',
        ]);

        Setting::create([
            'name' => 'kontak',
            'desc' => 'Pak Ristiono',
            'value' => '088289378109',
        ]);
        Setting::create([
            'name' => 'kontak',
            'desc' => 'Pak Ikrom (Konfirmasi)',
            'value' => '085232213939',
        ]);
        Setting::create([
            'name' => 'pelayanan',
            'desc' => "Senin s/d Jum'at",
            'value' => '08.00-15.30',
        ]);
        Setting::create([
            'name' => 'pelayanan',
            'desc' => 'Sabtu (online)',
            'value' => '08.00-11.30',
        ]);
        Setting::create([
            'name' => 'onoff',
            'desc' => 'setting buka tutup web ppdb',
            'value' => 1,
        ]);
    }
}
