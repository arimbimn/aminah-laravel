<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BorrowerStatusType;

class BorrowerStatusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BorrowerStatusType::create([
            'name' => 'Rejected',
            'code' => '1',
        ]);

        BorrowerStatusType::create([
            'name' => 'Accepted',
            'code' => '2',
        ]);

        BorrowerStatusType::create([
            'name' => 'Pending',
            'code' => '3',
        ]);
    }
}
