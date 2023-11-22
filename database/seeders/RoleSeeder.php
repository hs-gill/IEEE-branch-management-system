<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Super Admin',
            'Admin',
            'Customer',
        ];

        foreach($roles as $role) {
            $newRole = \App\Models\Role::create([
                'name' => $role,
            ]);

            $newRole->permissions()->attach(1);
            $newRole->permissions()->attach(2);
            $newRole->permissions()->attach(3);
        }
    }
}
