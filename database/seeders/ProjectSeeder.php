<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([[
            'name' => 'Gulshan-E-Habib',
            'code' => 'GEH',
            'description' => 'this is for gulshan habib project',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ],[
            'name' => 'Gulshan-E-Habib Appartments',
            'code' => 'GEHA',
            'description' => 'this is for gulshan habib appartments project',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ],[
            'name' => 'Gulshan-E-Habib Homes',
            'code' => 'GEHH',
            'description' => 'this is for gulshan habib Homes project',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ]]);
        $this->call(SocietySeeder::class);
        $this->call(LocationSeeder::class);

    }
}
