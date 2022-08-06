<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LenderStatusType;

class LenderStatusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LenderStatusType::create([
            'name' => 'Verified',
            'code' => '1',
        ]);

        LenderStatusType::create([
            'name' => 'Unverified',
            'code' => '2',
        ]);
    }
}
