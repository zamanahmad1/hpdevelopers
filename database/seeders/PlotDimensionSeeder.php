<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlotDimensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plot_dimensions')->insert([
            [
                'name' => 'plot front',
                'code' => 'pf1',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 1 front',
                'length' => '24.5',
                'plot_code' => 'p1',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot back',
                'code' => 'pb1',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 1 back',
                'length' => '23.5',
                'plot_code' => 'p1',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot right',
                'code' => 'pr1',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 1 right',
                'length' => '25.5',
                'plot_code' => 'p1',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot left',
                'code' => 'pl1',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 1 left',
                'length' => '21.5',
                'plot_code' => 'p1',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot front',
                'code' => 'pf2',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 2 front',
                'length' => '27.5',
                'plot_code' => 'p2',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot back',
                'code' => 'pb2',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 2 back',
                'length' => '33.5',
                'plot_code' => 'p2',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot right',
                'code' => 'pr2',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 2 right',
                'length' => '13.5',
                'plot_code' => 'p2',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot left',
                'code' => 'pl2',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 2 left',
                'length' => '23.6',
                'plot_code' => 'p2',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot front',
                'code' => 'pf3',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 3 front',
                'length' => '24.5',
                'plot_code' => 'p3',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot back',
                'code' => 'pb3',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 3 back',
                'length' => '38.5',
                'plot_code' => 'p3',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot right',
                'code' => 'pr3',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 3 right',
                'length' => '23.5',
                'plot_code' => 'p3',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot left',
                'code' => 'pl3',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 3 left',
                'length' => '33.6',
                'plot_code' => 'p3',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot front',
                'code' => 'pf4',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 4 front',
                'length' => '22.5',
                'plot_code' => 'p4',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot back',
                'code' => 'pb4',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 4 back',
                'length' => '34.5',
                'plot_code' => 'p4',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot right',
                'code' => 'pr4',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 4 right',
                'length' => '22.5',
                'plot_code' => 'p4',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot left',
                'code' => 'pl4',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 4 left',
                'length' => '34.6',
                'plot_code' => 'p4',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot front',
                'code' => 'pf5',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 5 front',
                'length' => '25.5',
                'plot_code' => 'p5',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot back',
                'code' => 'pb5',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 5 back',
                'length' => '35.5',
                'plot_code' => 'p5',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot right',
                'code' => 'pr5',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 5 right',
                'length' => '25.5',
                'plot_code' => 'p5',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot left',
                'code' => 'pl5',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 5 left',
                'length' => '37.6',
                'plot_code' => 'p5',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot front',
                'code' => 'pf6',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 6 front',
                'length' => '26.5',
                'plot_code' => 'p6',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot back',
                'code' => 'pb6',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 6 back',
                'length' => '37.5',
                'plot_code' => 'p6',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot right',
                'code' => 'pr6',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 6 right',
                'length' => '45.5',
                'plot_code' => 'p6',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot left',
                'code' => 'pl6',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 6 left',
                'length' => '38.6',
                'plot_code' => 'p6',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot front',
                'code' => 'pf7',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 7 front',
                'length' => '35.5',
                'plot_code' => 'p7',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot back',
                'code' => 'pb7',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 7 back',
                'length' => '45.5',
                'plot_code' => 'p7',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot right',
                'code' => 'pr7',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 7 right',
                'length' => '55.5',
                'plot_code' => 'p7',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot left',
                'code' => 'pl7',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 7 left',
                'length' => '17.6',
                'plot_code' => 'p7',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot front',
                'code' => 'pf8',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 8 front',
                'length' => '25.5',
                'plot_code' => 'p8',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot back',
                'code' => 'pb8',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 8 back',
                'length' => '35.5',
                'plot_code' => 'p8',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot right',
                'code' => 'pr8',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 8 right',
                'length' => '45.5',
                'plot_code' => 'p8',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],[
                'name' => 'plot left',
                'code' => 'pl8',
                'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 8 left',
                'length' => '27.6',
                'plot_code' => 'p8',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ]]);
    }
}
