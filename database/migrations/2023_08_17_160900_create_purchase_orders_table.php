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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('supplier')->nullable();
            $table->integer('order_ref')->nullable();
            $table->string('order_progress')->nullable();
            $table->string('payment_term')->nullable();
            $table->date('order_date')->nullable();
            $table->string('sender')->nullable();
            $table->string('memo_id')->nullable();
            $table->string('ship_option')->nullable();
            $table->date('sent_date')->nullable();
            $table->string('reciept_status')->nullable();
            $table->string('direct_shipping')->nullable();
            $table->string('location')->nullable();
            $table->string('street')->nullable();
            $table->string('apt')->nullable();
            $table->string('tampa')->nullable();
            $table->string('fl')->nullable();
            $table->string('num')->nullable();
            // $table->string('item_name')->nullable();
            // $table->string('qty')->nullable();
            // $table->string('unit_price')->nullable();
            // $table->string('total')->nullable();
            // $table->string('jobs_id')->nullable();
            // $table->string('receipt')->nullable();
            $table->string('desc')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('discount')->nullable();
            $table->string('tax_paid')->nullable();
            $table->string('ship_cost')->nullable();
            $table->string('grand_total')->nullable();
            $table->string('description')->nullable();
            $table->string('receipt_status')->nullable();
            $table->string('jobs_id')->nullable();
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
        Schema::dropIfExists('purchase_orders');
    }
};
