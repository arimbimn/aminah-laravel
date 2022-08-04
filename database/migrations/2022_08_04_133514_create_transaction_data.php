<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('funding_id');
            $table->foreignId('lender_id');
            $table->foreignId('borrower_id');
            $table->string('status')->nullable();
            $table->date('transaction_date')->nullable();
            $table->timestamp('transaction_datetime')->nullable();
            $table->string('transaction_approval')->nullable();
            $table->string('transaction_type')->nullable();
            $table->integer('transaction_amount')->nullable();
            $table->string('recepient_name')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('recepient_account_number')->nullable();
            $table->string('sender_account_number')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_data');
    }
}
