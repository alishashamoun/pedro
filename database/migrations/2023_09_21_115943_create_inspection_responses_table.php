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
        Schema::create('inspection_responses', function (Blueprint $table) {
            $table->id();
            $table->integer('location_id');
            $table->integer('checklist_id');
            $table->integer('checklist_item_id');
            $table->string('rating');
            $table->text('remarks')->nullable();
            $table->string('file_path')->nullable();
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
        Schema::dropIfExists('inspection_responses_table');
    }
};
