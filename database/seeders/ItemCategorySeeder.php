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
            ['name' => 'Drink', 'badge_color' => 'bg-blue-50 text-blue-700 ring-blue-700/10 dark:bg-blue-400/10 dark:text-blue-400 dark:ring-blue-400/30'],
            ['name' => 'Equipment', 'badge_color' => 'bg-green-50 text-green-700 ring-green-600/20 dark:bg-green-500/10 dark:text-green-400 dark:ring-green-500/20'],
            ['name' => 'Food', 'badge_color' => 'bg-purple-50 text-purple-700 ring-purple-700/10 dark:bg-purple-400/10 dark:text-purple-400 dark:ring-purple-400/30'],
        ];

        foreach($categories as $category) {
            \App\Models\ItemCategory::create([
                'name' => $category['name'],
                'badge_color' => $category['badge_color'],
            ]);
        }
    }
}
