<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('service_agreement')->nullable();
            $table->string('acnum')->nullable();
            $table->string('activeCustomer')->nullable();

            $table->string('contact')->nullable();

            $table->string('estimate_template')->nullable();
            $table->string('customer_tag')->nullable();
            $table->string('job_template')->nullable();
            $table->string('invoice_template')->nullable();
            $table->string('notes')->nullable();
            $table->string('referral')->nullable();
            $table->string('amount')->nullable();
            $table->string('assigned_contract')->nullable();
            $table->string('taxable')->nullable();
            $table->string('tax_item')->nullable();
            $table->integer('bussiness_id')->nullable();
            $table->string('assigned_rep')->nullable();
            $table->string('commission_sign')->nullable();
            $table->string('commission')->nullable();
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
        //
    }
};
