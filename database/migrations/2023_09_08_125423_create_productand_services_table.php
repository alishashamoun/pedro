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
        Schema::create('productand_services', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->string('description');
            $table->string('warehouse');
            $table->string('qty_hrs');
            $table->string('rate');
            $table->string('total');
            $table->string('cost');
            $table->string('margin_tax');

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
        Schema::dropIfExists('productand_services');
    }
};
