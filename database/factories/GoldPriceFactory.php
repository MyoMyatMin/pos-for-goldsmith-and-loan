<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GoldPrice>
 */
class GoldPriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sixteen' => 4530000,
            'fifteen' => 4490000,
            'twelve' => 3624000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
