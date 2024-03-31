<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sales>
 */
class SalesFactory extends Factory
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
            'user_id' => 1,
            'items' => $this->faker->word,
            'address' => $this->faker->word,
            'price'  => $this->faker->randomElement([4530000, 4490000, 3624000]),
            'quality' => $this->faker->randomElement(['16', '15', '12']),
            'kyat' => $this->faker->numberBetween(0, 3.5),
            'pay' => $this->faker->numberBetween(0, 3.5),
            'yway' => $this->faker->numberBetween(0, 3.5),
            'ytpay' => $this->faker->numberBetween(0, 3.5),
            'ytyway' => $this->faker->numberBetween(0, 3.5),
            'amount' => $this->faker->numberBetween(10000, 9999999),
            'purchaseamt' => $this->faker->numberBetween(0, 999999),
            'debt' => 0,
            'remarks' => $this->faker->sentence,
            // 'created_at' => date("Y-m-d", strtotime('-1 days'))
            'created_at' => date("Y-m-d")
        ];
    }
}
