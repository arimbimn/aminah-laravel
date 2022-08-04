<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowerData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrower_data', function (Blueprint $table) {
            $table->id('borrower_id');
            $table->string('status')->nullable();
            $table->string('borrower_name')->nullable();
            $table->string('borrower_email')->nullable();
            $table->string('borrower_hp_number')->nullable();
            $table->string('borrower_nik')->nullable();
            $table->string('ktp_image')->nullable();
            $table->string('borrower_address')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_image')->nullable();
            $table->string('business_address')->nullable();
            $table->string('siu_image')->nullable();
            $table->integer('borrower_monthly_income')->nullable();
            $table->integer('borrower_first_submission')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('funding_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrower_data');
    }
}
