<?php

namespace Database\Seeders;

use App\Models\Role;
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
            [
                'name' => 'Administrator',
                'description' => 'System administrator with full permissions',
                'permissions' => array_keys(Role::$availablePermissions),
            ],
            [
                'name' => 'User',
                'description' => 'Regular user with limited permissions',
                'permissions' => ['dashboard'],
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
