<?php

namespace Database\Seeders;

use App\Models\Borrower;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

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
            'name' => 'Arimbi',
            'email' => 'arimbimega@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
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
            ->count(50)
            // ->state(['role' => 'borrower'])
            // ->has(Borrower::factory()->count(1), 'borrower')
            ->create();
    }
}
