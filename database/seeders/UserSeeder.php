<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'zaman',
            'email' => 'zamanahmad909@gmail.com',
            'password' => Hash::make('123456789'),
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'awais',
            'email' => 'awais@gmail.com',
            'password' => Hash::make('123456789'),
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'suqlain',
            'email' => 'suqlain@gmail.com',
            'password' => Hash::make('123456789'),
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'ali',
            'email' => 'ali@gmail.com',
            'password' => Hash::make('123456789'),
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]]);
        $this->call(RolePermissionSeeder::class);
    }
}
