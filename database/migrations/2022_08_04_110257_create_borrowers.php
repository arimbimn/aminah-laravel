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
        Schema::create('borrowers', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('nik')->nullable();
            $table->text('address')->nullable();
            $table->string('status')->nullable();
            $table->string('ktp_image')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_type')->nullable();
            $table->string('business_image')->nullable();
            $table->text('business_address')->nullable();
            $table->string('siu_image')->nullable();
            $table->integer('borrower_monthly_income')->nullable();
            $table->integer('borrower_first_submission')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->text('purpose')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('profit_sharing_estimate')->nullable();
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('borrowers');
    }
};
