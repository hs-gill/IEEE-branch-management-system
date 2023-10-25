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
            'Chair',
            'Vice Chair',
            'Public Relations Director',
            'Academic Director',
            'Community Outreach',
            'Social Director',
            'McNaughton Director',
            'Illumination Director',
            'Finance Director',
            'Project Club Director',
            'Grad Banquet Director'
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
