<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['name' => 'Available', 'badge_color_light' => 'bg-green-50 text-green-700 ring-green-600/20', 'badge_color_dark' => 'bg-green-500/10 text-green-400 ring-green-500/20'],
            ['name' => 'Rented', 'badge_color_light' => 'bg-gray-50 text-gray-600 ring-gray-500/10', 'badge_color_dark' => 'bg-gray-400/10 text-gray-400 ring-gray-400/20'],
            ['name' => 'In Repairs', 'badge_color_light' => 'bg-yellow-50 text-yellow-800 ring-yellow-600/20', 'badge_color_dark' => 'bg-yellow-400/10 text-yellow-500 ring-yellow-400/20'],
            ['name' => 'Coming soon', 'badge_color_light' => 'bg-blue-50 text-blue-700 ring-blue-700/10', 'badge_color_dark' => 'bg-blue-400/10 text-blue-400 ring-blue-400/30'],
        ];

        foreach($states as $state) {
            \App\Models\ItemState::create([
                'name' => $state['name'],
                'badge_color_light' => $state['badge_color_light'],
                'badge_color_dark' => $state['badge_color_dark'],
            ]);
        }
    }
}
