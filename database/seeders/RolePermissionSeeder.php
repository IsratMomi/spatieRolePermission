<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role create

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);


        // Permission create
        $permissions = [

            'dasboard.view',

            'blog.create',
            'blog.view',
            'blog.edit',
            'blog.update',
            'blog.delete',
            'blog.approve',



            'admin.create',
            'admin.view',
            'admin.edit',
            'admin.update',
            'admin.delete',
            'admin.approve',

            'role.create',
            'role.view',
            'role.edit',
            'role.update',
            'role.delete',
            'role.approve',


            'profile.view',
            'profile.edit',

        ];


        for($i = 0; $i<count($permissions);$i++){
            $permission = Permission::create(['name' => $permissions[$i]]);
            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);
        }
    }
}
