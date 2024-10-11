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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('job_id');
            $table->integer('createdBy');
            $table->string('status')->default('unpaid');
            $table->string('drive_time')->nullable();
            $table->string('labor_time')->nullable();
            $table->string('payments_and_deposits_input')->nullable();
            $table->string('amount_description')->nullable();
            $table->string('amount')->nullable();
            $table->string('note_to_cust')->nullable();
            $table->string('no_bill_amount_description')->nullable();
            $table->string('no_bill_amount')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
