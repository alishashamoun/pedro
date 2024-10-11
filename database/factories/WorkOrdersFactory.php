<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkOrders>
 */
class WorkOrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'job_id' => Job::inRandomOrder()->first()->id,
            'vendor_id' => 3,
            'status' => $this->faker->randomElement([
                'pending',
                'accepted'
            ]),
            'deadline' => $this->faker->dateTime,
            'payment_info' => $this->faker->word,
            'priority' => $this->faker->word,
            'note' => $this->faker->sentence(10),
        ];
    }
}
