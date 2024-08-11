<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create permissions
        $permissions = [
            'create item',
            'edit item',
            'delete item',
            'create subcategory',
            'edit subcategory',
            'delete subcategory'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        //Create admin role
        $adminRole = Role::create(['name' => 'admin']);

        //Asign all permissions to admin role
        $adminRole->syncPermissions($permissions);
    }
}
