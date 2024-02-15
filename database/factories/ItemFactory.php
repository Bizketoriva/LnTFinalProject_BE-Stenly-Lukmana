<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'itemName' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(5000,999000),
            'quantity' => $this->faker->numberBetween(1,100),
            'category_id' => mt_rand(1,3),
        ];
    }
}
