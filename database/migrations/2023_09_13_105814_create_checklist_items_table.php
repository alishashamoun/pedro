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
        Schema::create('checklist_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inspection_checklist_id');
            $table->string('description');
            $table->timestamps();

            $table->foreign('inspection_checklist_id')->references('id')->on('inspection_checklists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspection_category_rows');
    }
};
