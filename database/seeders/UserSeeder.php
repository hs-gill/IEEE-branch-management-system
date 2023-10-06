<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Ringo',
            'email' => 'test@example.com',
            'password' => '$2y$10$mwB3WT2XgM/97/Iu.LRT8.Q8EgSrOb/ybQ1LM4FqZstWtCpczBjHm',
            'current_team_id' => 1
        ]);
    }
}
