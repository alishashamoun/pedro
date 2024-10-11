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
        Schema::create('primary_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('phone_type')->nullable();
            $table->string('number')->nullable();
            $table->string('ext')->nullable();
            $table->string('department')->nullable();
            $table->string('job_title')->nullable();
            $table->string('email_type')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('primary_contacts');
    }
};
