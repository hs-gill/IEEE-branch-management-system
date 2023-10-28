<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [ 'name' => 'Create Event', 'slug' => 'create-event' ],
            [ 'name' => 'Update Event', 'slug' => 'update-event' ],
            [ 'name' => 'Delete Event', 'slug' => 'delete-event' ],
        ];

        foreach($roles as $role) {
            \App\Models\Permission::create([
                'name' => $role['name'],
                'slug' => $role['slug']
            ]);
        }
    }
}
