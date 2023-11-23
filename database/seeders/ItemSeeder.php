<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Item::factory(100)->create();

        $items = Item::all();
        foreach ($items as $item) {
            $price = \App\Models\Price::create([
                'item_id' => $item->id,
                'amount' => rand(1*100, 100*100)/100,
            ]);

        }
    }
}
