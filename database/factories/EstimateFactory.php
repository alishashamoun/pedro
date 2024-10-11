<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estimate>
 */
class EstimateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id' => User::role('User')->inRandomOrder()->first()->id,
            'job_id' => Job::inRandomOrder()->first()->id,
            'client_status' => $this->faker->numberBetween(1, 8),
            'location_name' => $this->faker->word,
            'location_gated_property' => $this->faker->word,
            'location_address' => $this->faker->address,
            'location_unit' => $this->faker->word,
            'location_city' => $this->faker->city,
            'location_state' => $this->faker->state,
            'location_zipcode' => $this->faker->postcode,
            'job_cat_id' => $this->faker->randomNumber(),
            'job_sub_cat_id' => $this->faker->randomNumber(),
            'job_sub_description' => $this->faker->sentence,
            'job_description' => $this->faker->sentence,
            'mark_description' => $this->faker->sentence,
            'po_no' => $this->faker->word,
            'job_source' => $this->faker->word,
            'agent' => $this->faker->name,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->safeEmail,
            'customer_homeowner' => $this->faker->word,
            'customer_unit_cordination' => $this->faker->word,
            'current_status' => $this->faker->word,
            'requested_on' => $this->faker->date,
            'image' => $this->faker->imageUrl(),
            'document' => $this->faker->word,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'multe_job' => $this->faker->word,
            'arrival_start' => $this->faker->time,
            'arrival_end' => $this->faker->time,
            'time_duration' => $this->faker->word,
            'start_duration' => $this->faker->word,
            'end_duration' => $this->faker->word,
            'referral_source' => $this->faker->word,
            'opportunity_rating' => $this->faker->word,
            'opportunity_owner' => $this->faker->name,
            'assigned_tech' => $this->faker->name,
            'notify_tech_assign' => $this->faker->word,
            'notes_for_tech' => $this->faker->paragraph,
            'completion_notes' => $this->faker->sentence(9),
            'scheduled_at' => $this->faker->dateTime,
            'signature_time' => $this->faker->dateTime,
        ];
    }
}
