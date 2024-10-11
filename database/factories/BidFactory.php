<?php

namespace Database\Factories;

use App\Models\Bid;
use App\Models\EstimateRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bid>
 */
class BidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = 3;
        $estimate = EstimateRequest::inRandomOrder()->first()->id;

        if (Bid::where('user_id', $user)->where('estimate_request_id', $estimate)->exists()) {
            return $this->definition();
        } else {
            return [
                'user_id' => 3,
                'estimate_request_id' => $estimate,
                'bid' => $this->faker->optional()->randomNumber(),
                'due_date' => $this->faker->date(),
            ];
        }

    }
}
