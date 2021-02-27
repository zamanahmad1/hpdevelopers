<?php

namespace Database\Seeders;

use http\Client\Curl\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User as UserAlias;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Manager']);
        Role::create(['name' => 'Procurement']);
        Role::create(['name' => 'Accounts']);
        Role::create(['name' => 'Confirm Lanti']);


        Permission::create(['name' => 'Side Menu Employees Link']);
        //User Permissions
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'restore users']);
        //Roles Permissions
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'store roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);
        //Permissions Permissions
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'store permissions']);
        Permission::create(['name' => 'edit permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);
        //User Roles Permissions
        Permission::create(['name' => 'view user roles']);
        Permission::create(['name' => 'edit user roles']);
        Permission::create(['name' => 'update user roles']);
        //Role Permissions Permissions
        Permission::create(['name' => 'view role permissions']);
        Permission::create(['name' => 'edit role permissions']);
        Permission::create(['name' => 'update role permissions']);
        //User Direct Permission Permissions
        Permission::create(['name' => 'view user permissions']);
        Permission::create(['name' => 'edit user permissions']);
        Permission::create(['name' => 'update user permissions']);
        //Project Permissions
        Permission::create(['name' => 'view projects']);
        Permission::create(['name' => 'create projects']);
        Permission::create(['name' => 'store projects']);
        Permission::create(['name' => 'edit projects']);
        Permission::create(['name' => 'update projects']);
        Permission::create(['name' => 'delete projects']);
        Permission::create(['name' => 'restore projects']);
        //Societies Permissions
        Permission::create(['name' => 'view societies']);
        Permission::create(['name' => 'create societies']);
        Permission::create(['name' => 'store societies']);
        Permission::create(['name' => 'edit societies']);
        Permission::create(['name' => 'update societies']);
        Permission::create(['name' => 'delete societies']);
        Permission::create(['name' => 'restore societies']);
        //Sectors Permissions
        Permission::create(['name' => 'view sectors']);
        Permission::create(['name' => 'create sectors']);
        Permission::create(['name' => 'store sectors']);
        Permission::create(['name' => 'edit sectors']);
        Permission::create(['name' => 'update sectors']);
        Permission::create(['name' => 'delete sectors']);
        Permission::create(['name' => 'restore sectors']);
        //Block Permissions
        Permission::create(['name' => 'view blocks']);
        Permission::create(['name' => 'create blocks']);
        Permission::create(['name' => 'store blocks']);
        Permission::create(['name' => 'edit blocks']);
        Permission::create(['name' => 'update blocks']);
        Permission::create(['name' => 'delete blocks']);
        Permission::create(['name' => 'restore blocks']);
        //Street Permissions
        Permission::create(['name' => 'view streets']);
        Permission::create(['name' => 'create streets']);
        Permission::create(['name' => 'store streets']);
        Permission::create(['name' => 'edit streets']);
        Permission::create(['name' => 'update streets']);
        Permission::create(['name' => 'delete streets']);
        Permission::create(['name' => 'restore streets']);
        //Plot Type Permissions
        Permission::create(['name' => 'view plot types']);
        Permission::create(['name' => 'create plot types']);
        Permission::create(['name' => 'store plot types']);
        Permission::create(['name' => 'edit plot types']);
        Permission::create(['name' => 'update plot types']);
        Permission::create(['name' => 'delete plot types']);
        Permission::create(['name' => 'restore plot types']);

        $user=UserAlias::find(1);
        $user->assignRole(1);
        $role=Role::find(1);
        foreach (Permission::all() as $p){
            $role->givePermissionTo($p->name);
        }

        $user=UserAlias::find(2);
        $user->assignRole(2);
        Role::find(2)->givePermissionTo(1);

        $user=UserAlias::find(5);
        $user->assignRole(5);


    }
}
