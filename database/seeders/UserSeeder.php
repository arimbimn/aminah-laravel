<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Funding;
use App\Models\Borrower;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Razka Agniatara',
            'email' => 'razka173@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Arimbi Mega Ningrum',
            'email' => 'arimbimega1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Razka Agniatara',
            'email' => 'razka19beta@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'role' => 'lender',
        ]);

        User::create([
            'name' => 'Arimbi Mega N',
            'email' => 'arimbimegan@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'role' => 'lender',
        ]);

        User::create([
            'name' => 'Arimbi Mega Ningrum',
            'email' => 'arimbimega123@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'role' => 'borrower',
        ]);

        User::create([
            'name' => 'Razka Agniatara',
            'email' => 'razka19alpha@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'role' => 'borrower',
        ]);

        User::factory()
            ->count(100)
            ->state(['role' => 'borrower'])
            ->has(
                Borrower::factory()
                    ->count(1)
                    ->state(function (array $attributes, User $user) {
                        return ['name' => $user->name, 'account_name' => $user->name, 'status' => 'Accepted'];
                    })
                    ->has(
                        Funding::factory()
                            ->count(1)
                            ->state(function (array $attributes, Borrower $borrower) {
                                return ['borrower_id' => $borrower->id, 'accepted_fund' => $borrower->borrower_first_submission, 'funding_period' => $borrower->duration, 'profit_sharing_estimate' => $borrower->profit_sharing_estimate, 'status' => '1'];
                            }),
                        'funding'
                    ),
                'borrower'
            )
            ->create();
    }
}
