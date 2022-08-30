<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'trx_hash' => md5(now()),
            'transaction_type' => '1',
            'status' => 'success',
            'user_id' => '3',
            'transaction_date' => now(),
            'transaction_datetime' => now(),
            'transaction_amount' => '5000000',
        ]);
    }
}
