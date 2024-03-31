<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mortgages>
 */
class MortgagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'user_id' => 3,
            'items' => $this->faker->word,
            'address' => $this->faker->word,
            'weight'  => 4,
            'rate' => $this->faker->randomElement([2,1.5,3]),
            'amount' => $this->faker->numberBetween(10000, 9999999),
            'confirmed' => 0,
            'created_at' => date("Y-m-d", strtotime('-3 months')),
            'updated_at' => date("Y-m-d", strtotime('-3 months'))
        ];
    }
}
