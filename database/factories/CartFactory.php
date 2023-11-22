<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
//            'user_id' => $this->faker->numberBetween(1, 5),
//            'item_id' => $this->faker->numberBetween(1, 100),
//            'price' => $this->faker->randomFloat(2,1.00, 100.00),
//            'quantity' => $this->faker->randomNumber(1, 5)
        ];
    }
}
