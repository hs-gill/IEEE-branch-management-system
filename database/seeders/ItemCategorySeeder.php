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
            ['name' => 'Drink', 'badge_color_light' => 'bg-blue-50 text-blue-700 ring-blue-700/10', 'badge_color_dark' => 'bg-blue-400/10 text-blue-400 ring-blue-400/30'],
            ['name' => 'Equipment', 'badge_color_light' => 'bg-green-50 text-green-700 ring-green-600/20', 'badge_color_dark' => 'bg-green-500/10 text-green-400 ring-green-500/20'],
            ['name' => 'Food', 'badge_color_light' => 'bg-purple-50 text-purple-700 ring-purple-700/10', 'badge_color_dark' => 'bg-purple-400/10 text-purple-400 ring-purple-400/30'],
        ];

        foreach($categories as $category) {
            \App\Models\ItemCategory::create([
                'name' => $category['name'],
                'badge_color_light' => $category['badge_color_light'],
                'badge_color_dark' => $category['badge_color_dark'],
            ]);
        }
    }
}
