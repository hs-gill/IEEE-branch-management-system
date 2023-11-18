<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ItemCategorySeeder::class,
            ItemSeeder::class,
            TeamSeeder::class,
            TagSeeder::class,
            EventSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            TextbookSeeder::class,
            TransactionSeeder::class
        ]);
    }
}
