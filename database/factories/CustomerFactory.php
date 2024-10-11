<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::role('User')->inRandomOrder()->first()->id,
            'customer_name' => $this->faker->name,
            'service_agreement' => $this->faker->word,
            'acnum' => $this->faker->word,
            'activeCustomer' => $this->faker->word,
            'contact' => $this->faker->phoneNumber,
            'estimate_template' => $this->faker->word,
            'customer_tag' => $this->faker->word,
            'job_template' => $this->faker->word,
            'invoice_template' => $this->faker->word,
            'notes' => $this->faker->sentence,
            'referral' => $this->faker->word,
            'amount' => $this->faker->randomNumber(2),
            'assigned_contract' => $this->faker->word,
            'taxable' => $this->faker->word,
            'tax_item' => $this->faker->word,
            'bussiness_id' => $this->faker->randomNumber(),
            'assigned_rep' => $this->faker->name,
            'commission_sign' => $this->faker->word,
            'commission' => $this->faker->randomNumber(2),
        ];
    }
}
