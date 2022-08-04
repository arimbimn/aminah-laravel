<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StatusType;

class StatusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusType::create([
            'name' => 'Verified',
            'code' => '1',
        ]);

        StatusType::create([
            'name' => 'Unverified',
            'code' => '2',
        ]);

        StatusType::create([
            'name' => 'Rejected',
            'code' => '3',
        ]);

        StatusType::create([
            'name' => 'Accepted',
            'code' => '4',
        ]);

        StatusType::create([
            'name' => 'Pending',
            'code' => '5',
        ]);

        StatusType::create([
            'name' => 'Lunas',
            'code' => '6',
        ]);

        StatusType::create([
            'name' => 'Belum Lunas',
            'code' => '7',
        ]);

        StatusType::create([
            'name' => 'Gagal Bayar',
            'code' => '8',
        ]);
    }
}
