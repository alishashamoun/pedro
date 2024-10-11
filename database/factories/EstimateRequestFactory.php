<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EstimateRequest>
 */
class EstimateRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'createdBy' => User::inRandomOrder()->first()->id,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'street_address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip_code' => $this->faker->postcode,
            'details' => $this->faker->paragraph,
            'picture' => $this->faker->imageUrl(),
            'frequency' => $this->faker->randomElement([
                'One Time',
                'Daily',
                'Weekly',
                'Bi-Weekly',
                'Monthly',
            ]),
        ];
    }
}
