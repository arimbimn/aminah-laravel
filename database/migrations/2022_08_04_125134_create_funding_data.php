<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundingData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funding_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('borrower_id');
            $table->string('status')->nullable();
            $table->string('accepted_fund')->nullable();
            $table->date('funding_start_date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('funding_period')->nullable();
            $table->integer('profit_sharing_estimate')->nullable();
            $table->integer('payment_amount')->nullable();
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
        Schema::dropIfExists('funding_data');
    }
}
