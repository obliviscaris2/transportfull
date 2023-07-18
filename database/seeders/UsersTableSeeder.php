<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminRole = Role::create(['name' => "Administrator"]);

        // Creating Permission ------

        $permissionManageUsers = Permission::create(['name' => 'manage users']);
        $permissionAddUser = Permission::create(['name' => 'add users']);

        // ASSIGNING PERMISSIONS -----

        $permissionManageUsers->assignRole($adminRole);
        $permissionAddUser->assignRole($adminRole);

        $adminUser = User::create([
            'name' => "transport",
            'email' => 'admin@admin.com',
            'password' => '$2a$12$iUnpzXqbFrQQq6Fha2.wp.zvUPijwlVo30xDN6XNS3tltYFYIFCxW' //password
        ]);

        $adminUser->assignRole('Administrator');


    }
}
