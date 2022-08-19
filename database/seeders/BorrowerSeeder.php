<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Borrower;

class BorrowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Borrower::create([
            'name' => 'Razka Agniatara',
            'email' => 'razka19alpha@gmail.com',
            'phone_number' => '081284951176',
            'nik' => '3172031904980002',
            'address' => 'Jakarta',
            'status' => 'Pending',
            'ktp_image' => '20220812064922100_ktp.JPG',
            'business_name' => 'WEW Coklat',
            'business_image' => 'aminahImg4.JPG',
            'business_address' => 'Jakarta',
            'siu_image' => '20220812064922100_siu.JPG',
            'borrower_monthly_income' => '2000000',
            'borrower_first_submission' => '10000000',
            'account_name' => 'Razka Agniatara',
            'account_number' => '1234534311',
            'bank_name' => 'Mandiri',
            'purpose' => 'Membeli sebuah 2 kulkas seharga Rp5.000.000, sebuah kompor dengan harga Rp2.000.000, dan membeli sebuah peralatan masak seharga Rp3.000.000',
            'duration' => '10',
            'profit_sharing_estimate' => '10',
            'is_active' => '1',
        ]);
    }
}
