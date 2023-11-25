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
            'Rent',
            'Sell',
        ];

        foreach($types as $type) {
            \App\Models\ItemType::create([
                'name' => $type,
            ]);
        }
    }
}
