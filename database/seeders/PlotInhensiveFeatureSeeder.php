<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlotInhensiveFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plot_inhensive_features')->insert([[
            'name' => 'Park Facing',
            'code' => 'PF1',
            'description' => 'this is for Park Facing',
            'percentage' => '10',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ],[
            'name' => 'Corner',
            'code' => 'COR1',
            'description' => 'this is for Corner Plot',
            'percentage' => '10',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ],[
            'name' => 'Main Bulevard',
            'code' => 'MB1',
            'description' => 'this is for 2.5 Main Bulevard Plot',
            'percentage' => '10',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ]]);
    }
}
