<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'customer_id' => User::role('User')->inRandomOrder()->first()->id,
            'estimate_id' => $this->faker->randomNumber(),
            'account_manager_id' => User::role('account manager')->inRandomOrder()->first()->id,
            'user_id' => User::role('User')->inRandomOrder()->first()->id,
            'location_unit' => $this->faker->word,
            'location_name' => $this->faker->word,
            'location_gated_property' => $this->faker->word,
            'location_address' => $this->faker->address,
            'location_city' => $this->faker->city,
            'location_state' => $this->faker->state,
            'location_zipcode' => $this->faker->postcode,
            'job_cat_id' => $this->faker->randomNumber(),
            'job_sub_cat_id' => $this->faker->randomNumber(),
            'job_description' => $this->faker->paragraph,
            'job_sub_description' => $this->faker->paragraph,
            'po_no' => $this->faker->word,
            'job_source' => $this->faker->word,
            'agent' => $this->faker->name,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'ext_id' => $this->faker->randomNumber(),
            'ext' => $this->faker->word,
            'email' => $this->faker->email,
            'customer_homeowner' => $this->faker->word,
            'customer_unit_cordination' => $this->faker->word,
            'current_status' => $this->faker->numberBetween(1, 8),
            'start_date' => $this->faker->date,
            'start_duration' => $this->faker->word,
            'end_duration' => $this->faker->word,
            'end_date' => $this->faker->date,
            'multe_job' => $this->faker->word,
            'start_time' => $this->faker->time,
            'end_time' => $this->faker->time,
            'time_duration' => $this->faker->word,
            'job_priority' => $this->faker->word,
            'assigned_tech' => $this->faker->name,
            'notify_tech_assign' => $this->faker->randomElement(['on','off']),
            'notes_for_tech' => $this->faker->paragraph,
            'scheduled_at' => $this->faker->dateTime,
            'completion_notes' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'document' => $this->faker->word,
            'billable' => $this->faker->word,
            'mark_description' => $this->faker->paragraph,
        ];
    }
}
