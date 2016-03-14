<?php

use App\User;
use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;
use Illuminate\Database\Seeder;

class StandardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Default User',
            'email' => 'user@domain.com',
            'password' => Hash::make('password')
        ]);
        $adminRole = Role::create([
            'name' => 'Administrator',
            'slug' => 'admin',
            'description' => 'Can do anything',
            'level' => 1,
        ]);
        $createUsersPermission = Permission::create([
            'name' => 'Create users',
            'slug' => 'create.users',
        ]);

        $deleteUsersPermission = Permission::create([
            'name' => 'Delete users',
            'slug' => 'delete.users',
        ]);
        $adminRole->permissions()->attach($createUsersPermission);
        $adminRole->permissions()->attach($deleteUsersPermission);
        $user->roles()->attach($adminRole);
    }
}
