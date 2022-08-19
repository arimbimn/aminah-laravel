<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrower>
 */
class BorrowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->name();
        $email = fake()->safeEmail();
        $city = fake()->city();
        return [
            'name' => $name,
            'email' => $email,
            'phone_number' => '081284951176',
            'nik' => '3172031904980002',
            'address' => $city,
            'status' => 'Pending',
            'ktp_image' => '20220812064922100_ktp.JPG',
            'business_name' => 'Coklat',
            'business_image' => 'aminahImg4.JPG',
            'business_address' => $city,
            'siu_image' => '20220812064922100_siu.JPG',
            'borrower_monthly_income' => '100000',
            'borrower_first_submission' => '100000',
            'account_name' =>  $name,
            'account_number' => '123456789',
            'bank_name' => fake()->randomElement(['BNI', 'Mandiri', 'BCA', 'BSI', 'BRI']),
            'purpose' => 'Membeli sebuah 2 kulkas seharga Rp5.000.000, sebuah kompor dengan harga Rp2.000.000, dan membeli sebuah peralatan masak seharga Rp3.000.000',
            'duration' => '1',
            'profit_sharing_estimate' => '10',
            'is_active' => '1',
            'created_at' => now(),
        ];

        // return [
        //     'name' => 'Razka Agniatara',
        //     'email' => 'razka19alpha@gmail.com',
        //     'phone_number' => '081284951176',
        //     'nik' => '3172031904980002',
        //     'address' => 'Jakarta',
        //     'status' => 'Pending',
        //     'ktp_image' => '20220812064922100_ktp.JPG',
        //     'business_name' => 'WEW Coklat',
        //     'business_image' => 'aminahImg4.JPG',
        //     'business_address' => 'Jakarta',
        //     'siu_image' => '20220812064922100_siu.JPG',
        //     'borrower_monthly_income' => '2000000',
        //     'borrower_first_submission' => '10000000',
        //     'account_name' => 'Razka Agniatara',
        //     'account_number' => '1234534311',
        //     'bank_name' => 'Mandiri',
        //     'purpose' => 'Membeli sebuah 2 kulkas seharga Rp5.000.000, sebuah kompor dengan harga Rp2.000.000, dan membeli sebuah peralatan masak seharga Rp3.000.000',
        //     'duration' => '10 bulan',
        //     'profit_sharing_estimate' => '10',
        //     'is_active' => '1',
        // ];
    }
}
