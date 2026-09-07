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
            'desc' => 'Pesan Header SPMB',
            'value' => 'Sistem Penerimaan Murid Baru SDIT Harapan Umat Jember Tahun 2027/2028',
            'type' => "tagline"
        ]);

        // schedule
        Setting::create([
            'name' => 'jadwal',
            'desc' => 'Pendaftaran SPMB SDIT Harapan Umat Jember',
            'value' => 'Tahun Ajaran 2027/2028',
            'type' => "jadwal"
        ]);
        // early bird
        Setting::create([
            'name' => 'early_bird',
            'desc' => 'Early bird, Diskon uang gedung 10%',
            'value' => '(14-21 september 2026)',
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
            'name' => 'Pak Syauqi',
            'desc' => 'Admin Web SPMB',
            'value' => '08113717716',
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
            'name' => 'onoff',
            'desc' => 'Setting buka tutup web ppdb',
            'value' => 1,
            'type' => "onoff"
        ]);

        // countdown
        Setting::create([
            'name' => 'countdown',
            'desc' => 'Tanggal pembukaan SPMB',
            'value' => "2026-09-14 00:00:00",
            'type' => "countdown"
        ]);

        // landing page content
        Setting::create([
            'name' => 'countdown_heading',
            'desc' => 'Judul halaman countdown',
            'value' => 'SEGERA DIBUKA',
            'type' => "landing"
        ]);
        Setting::create([
            'name' => 'registration_fee',
            'desc' => 'Biaya pendaftaran',
            'value' => 'Rp 350.000',
            'type' => "landing"
        ]);
        Setting::create([
            'name' => 'bank_name',
            'desc' => 'Nama bank',
            'value' => 'BSI',
            'type' => "landing"
        ]);
        Setting::create([
            'name' => 'bank_number',
            'desc' => 'Nomor rekening',
            'value' => '2005720055',
            'type' => "landing"
        ]);
        Setting::create([
            'name' => 'bank_account',
            'desc' => 'Nama pemegang rekening',
            'value' => 'SDIT HARAPAN UMAT',
            'type' => "landing"
        ]);
    }
}
