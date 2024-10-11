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
        Schema::create('technicians', function (Blueprint $table) {
            $table->id();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('phone_type')->nullable();
            $table->string('number')->nullable();
            $table->string('ext')->nullable();
            $table->string('department')->nullable();
            $table->string('job_title')->nullable();
            $table->string('email_type')->nullable();
            $table->string('email')->unique();
            $table->string('billing_address')->nullable();
            $table->string('contact_type')->nullable();
            $table->string('active')->nullable();
            $table->string('address')->nullable();
            $table->string('aptNo')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
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
        Schema::dropIfExists('technicians');
    }
};
