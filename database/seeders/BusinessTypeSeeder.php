<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BusinessType;

class BusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BusinessType::create([
            'name' => 'Makanan'
        ]);

        BusinessType::create([
            'name' => 'Minuman'
        ]);

        BusinessType::create([
            'name' => 'Jasa'
        ]);

        BusinessType::create([
            'name' => 'Sembako'
        ]);

        BusinessType::create([
            'name' => 'Jajanan'
        ]);

        BusinessType::create([
            'name' => 'Elektronik'
        ]);

        BusinessType::create([
            'name' => 'Material'
        ]);

        BusinessType::create([
            'name' => 'Lainnya'
        ]);
    }
}
