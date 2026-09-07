<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'admin',
            'akun_dibuat',
            'akun_aktif',
            'akun_isi_formulir',
            'akun_diterima',
            'akun_ditolak',
            'akun_mengundurkan_diri',
            'akun_nonaktif',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(
                ['name' => $role, 'guard_name' => 'web']
            );
        }
    }
}
