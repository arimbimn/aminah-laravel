<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BankAccount;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankAccount::create([
            'account_name' => 'Arimbi Mega Ningrum',
            'account_number' => '785301006340',
            'bank_name' => 'BRI',
            'is_active' => 1,
        ]);
    }
}
