<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lender;

class LenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lender::create([
            'name' => 'Razka Agniatara',
            'status' => 'Verified',
            'jenis_kelamin' => 'Laki-laki',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1998-04-19',
            'email' => 'razka19beta@gmail.com',
            'hp_number' => '081284951176',
            'nik' => '3172031904980002',
            'address' => 'DKI Jakarta',
            'account_name' => 'Razka Agniatara',
            'account_number' => '123456',
            'bank_name' => 'Mandiri',
        ]);
    }
}
