<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Rent', 'badge_color_light' => 'bg-blue-50 text-blue-700 ring-blue-700/10', 'badge_color_dark' => 'bg-blue-400/10 text-blue-400 ring-blue-400/30'],
            ['name' => 'Sell', 'badge_color_light' => 'bg-green-50 text-green-700 ring-green-600/20', 'badge_color_dark' => 'bg-green-500/10 text-green-400 ring-green-500/20'],
        ];

        foreach($types as $type) {
            \App\Models\ItemType::create([
                'name' => $type['name'],
                'badge_color_light' => $type['badge_color_light'],
                'badge_color_dark' => $type['badge_color_dark'],
            ]);
        }
    }
}
