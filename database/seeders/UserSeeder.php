<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email_number' => 'admin@gmail.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('password'),
            ]
        );

        $admin->syncRoles('admin');
    }
}
