<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Superadmin - kamu sebagai maintainer
        User::create([
            'name'     => 'Super Admin',
            'email'    => 'superadmin@adijaya.com',
            'password' => Hash::make('superadmin123'),
            'role'     => 'superadmin',
        ]);

        // Admin - owner Adijaya Photography
        User::create([
            'name'     => 'Adijaya Photography',
            'email'    => 'admin@adijaya.com',
            'password' => Hash::make('admin123'),
            'role'     => 'admin',
        ]);
    }
}