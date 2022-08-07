<?php

namespace Database\Seeders;

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
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Arimbi Mega Ningrum',
            'email' => 'arimbimega1@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ]);
    }
}
