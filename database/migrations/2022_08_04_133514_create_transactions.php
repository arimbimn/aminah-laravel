<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('trx_hash')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('funding_id')->nullable();
            $table->foreignId('lender_id')->nullable();
            $table->foreignId('borrower_id')->nullable();
            $table->date('transaction_date')->nullable();
            $table->timestamp('transaction_datetime')->nullable();
            $table->string('transaction_approval')->nullable();
            $table->integer('transaction_amount')->nullable();
            $table->string('recepient_name')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('recepient_account_number')->nullable();
            $table->string('sender_account_number')->nullable();
            $table->string('description')->nullable();
            $table->string('file_image')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
