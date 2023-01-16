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

        $roleAdmin = Role::create(['name' => 'admin','guard_name' => 'admin']);
        $roleSuperAdmin = Role::create(['name' => 'superadmin','guard_name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor','guard_name' => 'admin']);
        $roleUser = Role::create(['name' => 'user','guard_name' => 'admin']);


        // Permission create
        $permissions = [
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dasboard.view',
                    'dashboard.edit',
                ]
            ],
                [
                    'group_name' => 'blog',
                    'permissions' => [
                        'blog.create',
                        'blog.view',
                        'blog.edit',
                        'blog.update',
                        'blog.delete',
                        'blog.approve',
                    ]
                ],

                [
                    'group_name' => 'admin',
                    'permissions' => [
                        'admin.create',
                        'admin.view',
                        'admin.edit',
                        'admin.update',
                        'admin.delete',
                        'admin.approve',
                    ]
                ],

                [
                    'group_name' => 'role',
                    'permissions' => [
                        'role.create',
                        'role.view',
                        'role.edit',
                        'role.update',
                        'role.delete',
                        'role.approve',
                    ]
                ],

                [
                    'group_name' => 'profile',
                    'permissions' => [
                        'profile.view',
                        'profile.edit',
                    ]
                ],
        ];


        for($i = 0; $i<count($permissions);$i++){
            $permissionGroup = $permissions[$i]['group_name'];
            for($j = 0; $j < count($permissions[$i]['permissions']); $j++){
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name'=> $permissionGroup,'guard_name' => 'admin']);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }

        }
    }
}
