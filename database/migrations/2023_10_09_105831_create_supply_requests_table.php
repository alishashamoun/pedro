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
        Schema::create('supply_requests', function (Blueprint $table) {
            $table->id();
            $table->string('order_progress');
            $table->string('order_ref');
            $table->date('order_date');
            $table->string('po_num');
            $table->string('manager_email');
            $table->date('sent_date');
            $table->string('receipt_status');
            $table->string('location');
            $table->string('street');
            $table->string('apt');
            $table->string('tampa');
            $table->string('fl');
            $table->string('num');
            // $table->string('description');
            $table->integer('createdBy');
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
        Schema::dropIfExists('supply_requests');
    }
};
