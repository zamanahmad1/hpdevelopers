<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlotShapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plot_shapes')->insert([[
            'name' => 'Square',
            'code' => 'sqr',
            'description' => 'this is for square shape plot',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ],[
            'name' => 'Rectangle',
            'code' => 'rec',
            'description' => 'this is for rectangle shape plot',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ],[
            'name' => 'Triangle',
            'code' => 'tri',
            'description' => 'this is for triangle shape plot',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ]]);
    }
}
