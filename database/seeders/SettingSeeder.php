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
            'name' => 'kontak',
            'desc' => 'Ust. Ristiono',
            'value' => '0633290284',
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
        // Setting::create([
        //     'name' => 'pesan',
        //     'desc' => 'sudah daftar',
        //     'value' => 'Terimakasih',
        // ]);
        // Setting::create([
        //     'name' => 'pesan',
        //     'desc' => 'sudah upload',
        //     'value' => 'Terimakasih',
        // ]);
    }
}
