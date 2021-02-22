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
        $user= UserAlias::find(1);
        $role=Role::create(['name' => 'Administrator']);
        $permission=Permission::create(['name' => 'Side Menu Employees Link']);
        $role->givePermissionTo($permission);
        $user->assignRole($role);

        $user= UserAlias::find(2);
        $role=Role::create(['name' => 'Manager']);
/*        $permission=Permission::create(['name' => 'Side Menu Employees Link']);
        $role->givePermissionTo($permission);*/
        $user->assignRole($role);

        $user= UserAlias::find(3);
        $role=Role::create(['name' => 'Procurment Officer']);
  /*      $permission=Permission::create(['name' => 'Side Menu Employees Link']);
        $role->givePermissionTo($permission);*/
        $user->assignRole($role);

        $user= UserAlias::find(4);
        $role=Role::create(['name' => 'Accountant']);
        /*$permission=Permission::create(['name' => 'Side Menu Employees Link']);
        $role->givePermissionTo($permission);*/
        $user->assignRole($role);
    }
}
