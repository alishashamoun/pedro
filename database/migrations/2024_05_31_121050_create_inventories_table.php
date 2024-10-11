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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('vendor')->nullable();
            $table->string('date')->nullable();
            $table->string('paid_for')->nullable();
            $table->string('paid')->nullable();
            $table->string('receive')->nullable();
            $table->string('product')->nullable();
            $table->string('quanity')->nullable();
            $table->string('unreceived')->nullable();
            $table->string('unit_cost')->nullable();
            $table->string('total')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('discount')->nullable();
            $table->string('tax_paid')->nullable();
            $table->string('ship_cost')->nullable();
            $table->string('grand_total')->nullable();
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
        Schema::dropIfExists('inventories');
    }
};
