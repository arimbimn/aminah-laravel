<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransactionType;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionType::create([
            'name' => 'Pengisian Saldo Lender',
            'code' => '1',
        ]);

        TransactionType::create([
            'name' => 'Pembayaran Bagi Hasil',
            'code' => '2',
        ]);

        TransactionType::create([
            'name' => 'Penarikan Saldo Lender',
            'code' => '3',
        ]);

        TransactionType::create([
            'name' => 'Penarikan Pendanaan',
            'code' => '4',
        ]);

        TransactionType::create([
            'name' => 'Penarikan Dana Admin',
            'code' => '5',
        ]);

        TransactionType::create([
            'name' => 'Pembayaran Pendanaan Lender',
            'code' => '6',
        ]);

        TransactionType::create([
            'name' => 'Pengembalian Pendanaan',
            'code' => '7',
        ]);
    }
}
