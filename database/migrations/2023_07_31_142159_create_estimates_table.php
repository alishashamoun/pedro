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
        Schema::create('estimates', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->nullable();
            $table->integer('job_id')->nullable();
            $table->string('signature')->nullable();
            $table->string('client_status')->nullable();
            $table->string('location_name')->nullable();
            $table->string('location_gated_property')->nullable();

            $table->string('location_address')->nullable();
            $table->string('location_unit')->nullable();
            $table->string('location_city')->nullable();
            $table->string('location_state')->nullable();
            $table->string('location_zipcode')->nullable();
            $table->integer('job_cat_id')->nullable();
            $table->integer('job_sub_cat_id')->nullable();
            $table->string('job_sub_description')->nullable();
            $table->string('job_description')->nullable();
            $table->string('mark_description')->nullable();
            $table->string('po_no')->nullable();
            $table->string('job_source')->nullable();
            $table->string('agent')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('customer_homeowner')->nullable();
            $table->string('customer_unit_cordination')->nullable();
            $table->string('current_status')->nullable();
            $table->string('requested_on')->nullable();
            $table->string('image')->nullable();
            $table->string('document')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('multe_job')->nullable();
            $table->string('arrival_start')->nullable();
            $table->string('arrival_end')->nullable();
            $table->string('time_duration')->nullable();
            $table->string('start_duration')->nullable();
            $table->string('end_duration')->nullable();
            $table->string('referral_source')->nullable();
            $table->string('opportunity_rating')->nullable();
            $table->string('opportunity_owner')->nullable();
            $table->string('assigned_tech')->nullable();
            $table->string('notify_tech_assign')->nullable();
            $table->string('notes_for_tech')->nullable();
            $table->string('completion_notes')->nullable();
            $table->string('scheduled_at')->nullable();
            $table->timestamp('signature_time')->nullable();

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
        Schema::dropIfExists('estimates');
    }
};
