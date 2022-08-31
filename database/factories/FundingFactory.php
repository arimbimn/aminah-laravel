<?php

namespace Database\Factories;

use App\Models\Borrower;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Funding>
 */
class FundingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'borrower_id' => Borrower::all()->random()->id,
            'accepted_fund' => '1000000',
            'funding_start_date' => now(),
            'due_date' => now()->addDays(7),
            'funding_period' => fake()->numberBetween(1, 12),
            'profit_sharing_estimate' => '10',
            'payment_amount' => 0,
            'status' => '1',
            'is_finished' => 0,
            'is_active' => 1,
            'created_at' => now(),
        ];
    }
}
