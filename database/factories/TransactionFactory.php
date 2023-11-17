<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //use the faker to hard code some info.
            'item_id'=>rand(1,50),
            'user_id'=>rand(1,2),
            'rented_at'=>Carbon::now(),
    
        ];
    }
}
