<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlotCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plot_categories')->insert([[
            'name' => 'Plot',
            'code' => 'plot1',
            'description' => 'this is for Plot',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ],[
            'name' => 'File',
            'code' => 'file1',
            'description' => 'this is for File',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ]]);
    }
}
