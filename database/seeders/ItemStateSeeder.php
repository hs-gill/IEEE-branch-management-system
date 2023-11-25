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
            'Available',
            'Rented',
            'Repairment',
            'Coming soon'
        ];

        foreach($states as $state) {
            \App\Models\ItemState::create([
                'name' => $state,
            ]);
        }
    }
}
