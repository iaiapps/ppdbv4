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
            'name' => 'Tagline',
            'desc' => 'Pesan Header SPMB',
            'value' => 'Sistem Penerimaan Murid Baru SDIT Harapan Umat Jember Tahun 2026/2027',
            'type' => "tagline"
        ]);

        // schedule
        Setting::create([
            'name' => 'Jadwal',
            'desc' => 'Pendaftaran SPMB SDIT Harapan Umat Jember',
            'value' => 'Tahun Ajaran 2026/2027',
            'type' => "jadwal"
        ]);
        // early bird
        Setting::create([
            'name' => 'Early Bird',
            'desc' => 'Eearly bird, Diskon uang gedung 10%',
            'value' => '(15-25 september 2025)',
            'type' => "early"
        ]);

        // kontak
        Setting::create([
            'name' => 'Pak Ristiono',
            'desc' => 'Koordinator SPMB',
            'value' => '088289378109',
            'type' => "kontak"
        ]);
        Setting::create([
            'name' => 'Pak Ikrom',
            'desc' => 'Admin Web SPMB',
            'value' => '085232213939',
            'type' => "kontak"
        ]);

        // pelayanan
        Setting::create([
            'name' => 'Jam Sekolah',
            'desc' => "Senin s/d Jum'at",
            'value' => '07.15-15.15',
            'type' => "pelayanan"
        ]);
        Setting::create([
            'name' => 'Konsultasi (Online)',
            'desc' => 'Sabtu',
            'value' => '07.15-11.15',
            'type' => "pelayanan"
        ]);
        Setting::create([
            'name' => 'Libur',
            'desc' => 'Minggu',
            'value' => 'Tutup',
            'type' => "pelayanan"
        ]);

        // onoff
        Setting::create([
            'name' => 'OnOff',
            'desc' => 'Setting buka tutup web ppdb',
            'value' => 1,
            'type' => "onoff"
        ]);

        // countdown
        Setting::create([
            'name' => 'Countdown',
            'desc' => 'Tanggal pembukaan SPMB',
            'value' => "2025-09-15 00:00:00",
            'type' => "countdown"
        ]);
    }
}
