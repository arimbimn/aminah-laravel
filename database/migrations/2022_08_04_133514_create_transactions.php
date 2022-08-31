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
            $table->string('trx_hash');
            $table->string('transaction_type');
            $table->string('status');
            $table->foreignId('funding_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('borrower_user_id')->nullable();
            $table->foreignId('lender_id')->nullable();
            $table->foreignId('borrower_id')->nullable();
            $table->date('transaction_date')->nullable();
            $table->timestamp('transaction_datetime')->nullable();
            $table->integer('transaction_amount');
            $table->string('sender_name')->nullable();
            $table->string('sender_bank_name')->nullable();
            $table->string('sender_account_number')->nullable();
            $table->string('recepient_name')->nullable();
            $table->string('recepient_bank_name')->nullable();
            $table->string('recepient_account_number')->nullable();
            $table->string('description')->nullable();
            $table->string('transaction_approval')->nullable();
            $table->string('file_image')->nullable();
            $table->boolean('is_approved')->nullable();
            $table->timestamp('approve_datetime')->nullable();
            $table->text('approve_notes')->nullable();
            $table->boolean('is_rejected')->nullable();
            $table->timestamp('reject_datetime')->nullable();
            $table->text('reject_notes')->nullable();
            $table->foreignId('transaction_id_ref')->nullable();
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
