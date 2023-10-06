<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Sports',
            'Textbooks',
            'Tools',
        ];

        foreach($categories as $category) {
            \App\Models\ItemCategory::create([
                'name' => $category,
                'description' => fake()->sentence(10)
            ]);
        }
    }
}
