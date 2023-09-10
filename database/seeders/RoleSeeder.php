<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'akun_dibuat',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'akun_aktif',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'akun_isi_formulir',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'akun_diterima',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'akun_ditolak',
            'guard_name' => 'web'
        ]);
    }
}
