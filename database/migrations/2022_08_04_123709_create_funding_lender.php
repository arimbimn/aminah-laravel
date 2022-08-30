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
        Schema::create('funding_lender', function (Blueprint $table) {
            $table->id();
            $table->foreignId('funding_id');
            $table->foreignId('lender_id');
            $table->foreignId('lender_user_id');
            $table->foreignId('transaction_id')->nullable();
            $table->string('trx_hash')->nullable();
            $table->float('amount', 255, 2)->nullable();
            $table->integer('unit_amount')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('funding_lender');
    }
};
