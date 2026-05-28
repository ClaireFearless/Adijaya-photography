<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            [
                'name'        => 'Paket Wisuda Basic',
                'description' => 'Sesi foto wisuda dengan 1 fotografer, 2 jam sesi, 20 foto editing.',
                'price'       => 500000,
                'dp_amount'   => 250000,
                'duration'    => 2,
                'is_active'   => true,
            ],
            [
                'name'        => 'Paket Wisuda Premium',
                'description' => 'Sesi foto wisuda dengan 2 fotografer, 4 jam sesi, 50 foto editing.',
                'price'       => 1000000,
                'dp_amount'   => 500000,
                'duration'    => 4,
                'is_active'   => true,
            ],
            [
                'name'        => 'Paket Pre-Wedding',
                'description' => 'Sesi foto pre-wedding outdoor/indoor, 4 jam sesi, 50 foto editing.',
                'price'       => 2000000,
                'dp_amount'   => 1000000,
                'duration'    => 4,
                'is_active'   => true,
            ],
            [
                'name'        => 'Paket Wedding',
                'description' => 'Dokumentasi pernikahan full day, 2 fotografer, 100 foto editing.',
                'price'       => 5000000,
                'dp_amount'   => 2500000,
                'duration'    => 8,
                'is_active'   => true,
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}