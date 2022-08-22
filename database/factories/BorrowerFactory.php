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
        $phone_number = fake()->randomElement(['0812', '0838', '0856']) . fake()->randomNumber(8, true);
        $bank_name = fake()->randomElement(['BNI', 'Mandiri', 'BCA', 'BSI', 'BRI']);
        $account_number = fake()->randomNumber(9, true);
        $business_name = fake()->company();
        return [
            'name' => $name,
            'email' => $email,
            'phone_number' => $phone_number,
            'nik' => '3172031904980002',
            'address' => $city,
            'status' => 'Pending',
            'ktp_image' => '20220812064922100_ktp.JPG',
            'business_name' => $business_name,
            'business_image' => null,
            'business_address' => $city,
            'business_type' => 'Lainnya',
            'siu_image' => '20220812064922100_siu.JPG',
            'borrower_monthly_income' => fake()->randomElement([1000000, 2000000, 300000, 4000000, 5000000]),
            'borrower_first_submission' => fake()->randomElement([1000000, 2000000, 300000, 4000000, 5000000]),
            'account_name' =>  $name,
            'account_number' => $account_number,
            'bank_name' => $bank_name,
            'purpose' => 'Membeli sebuah 2 kulkas seharga Rp5.000.000, sebuah kompor dengan harga Rp2.000.000, dan membeli sebuah peralatan masak seharga Rp3.000.000',
            'duration' => strval(fake()->numberBetween(1, 12)),
            'profit_sharing_estimate' => fake()->numberBetween(3, 30),
            'is_active' => '1',
            'created_at' => now(),
        ];
    }
}
