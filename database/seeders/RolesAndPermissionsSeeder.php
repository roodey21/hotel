<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'list user']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);
        $admin->givePermissionTo('create user', 'delete user', 'edit user', 'list user');
    }
}
