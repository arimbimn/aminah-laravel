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
        Schema::create('fundings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('borrower_id');
            $table->string('accepted_fund')->nullable();
            $table->date('funding_start_date')->nullable();
            $table->date('funding_full_date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('funding_period')->nullable();
            $table->integer('profit_sharing_estimate')->nullable();
            $table->integer('payment_amount')->nullable();
            $table->string('status')->nullable();
            $table->string('description')->nullable();
            $table->boolean('is_finished')->default(0);
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
        Schema::dropIfExists('fundings');
    }
};
