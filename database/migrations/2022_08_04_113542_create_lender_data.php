<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenderData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender_data', function (Blueprint $table) {
            $table->id('lender_id');
            $table->string('status')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('hp_number')->nullable();
            $table->string('lender_image')->nullable();
            $table->string('nik')->nullable();
            $table->string('ktp_image')->nullable();
            $table->string('address')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
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
        Schema::dropIfExists('lender_data');
    }
}
