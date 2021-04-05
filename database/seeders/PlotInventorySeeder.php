<?php

namespace Database\Seeders;

use App\Models\MemberProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlotInventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plot_inventories')->insert([[
            'name' => 'plot 1',
            'code' => 'p1',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 1',
            'area' => '1125',
            'shape_code' => 'sqr',
            'street_code' => 'str1',
            'plotcategory_code' => 'plot1',
            'plottype_code' => 'rese1',
            'plotstatus_code' => 'developed' ,
            'plotsize_code' => 'M5',
            'inhensivefeature_code' => '',
            'plotavailability_code' => 'available',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'plot 2',
            'code' => 'p2',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot ',
            'area' => '775',
            'shape_code' => 'sqr',
            'street_code' => 'str2',
            'plotcategory_code' => 'plot1',
            'plottype_code' => 'rese1',
            'plotstatus_code' => 'developed' ,
            'plotsize_code' => 'M3',
            'inhensivefeature_code' => '',
            'plotavailability_code' => 'available',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'plot 3',
            'code' => 'p3',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot ',
            'area' => '1125',
            'shape_code' => 'sqr',
            'street_code' => 'str3',
            'plotcategory_code' => 'plot1',
            'plottype_code' => 'rese1',
            'plotstatus_code' => 'developed' ,
            'plotsize_code' => 'M5',
            'inhensivefeature_code' => 'PF1,MB1',
            'plotavailability_code' => 'available',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'plot 4',
            'code' => 'p4',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot ',
            'area' => '1125',
            'shape_code' => 'sqr',
            'street_code' => 'str4',
            'plotcategory_code' => 'plot1',
            'plottype_code' => 'rese1',
            'plotstatus_code' => 'developed' ,
            'plotsize_code' => 'M5',
            'inhensivefeature_code' => 'PF1,MB1,COR1',
            'plotavailability_code' => 'available',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'plot 5',
            'code' => 'p5',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot ',
            'area' => '1125',
            'shape_code' => 'sqr',
            'street_code' => 'str5',
            'plotcategory_code' => 'plot1',
            'plottype_code' => 'rese1',
            'plotstatus_code' => 'developed' ,
            'plotsize_code' => 'M5',
            'inhensivefeature_code' => '',
            'plotavailability_code' => 'available',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'plot 6',
            'code' => 'p6',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot ',
            'area' => '1125',
            'shape_code' => 'sqr',
            'street_code' => 'str6',
            'plotcategory_code' => 'plot1',
            'plottype_code' => 'rese1',
            'plotstatus_code' => 'developed' ,
            'plotsize_code' => 'M5',
            'inhensivefeature_code' => '',
            'plotavailability_code' => 'available',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'plot 7',
            'code' => 'p7',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot ',
            'area' => '1125',
            'shape_code' => 'sqr',
            'street_code' => 'str6',
            'plotcategory_code' => 'plot1',
            'plottype_code' => 'rese1',
            'plotstatus_code' => 'developed' ,
            'plotsize_code' => 'M5',
            'inhensivefeature_code' => 'PF1',
            'plotavailability_code' => 'available',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'plot 8',
            'code' => 'p8',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot ',
            'area' => '1125',
            'shape_code' => 'sqr',
            'street_code' => 'str6',
            'plotcategory_code' => 'plot1',
            'plottype_code' => 'rese1',
            'plotstatus_code' => 'undeveloped' ,
            'plotsize_code' => 'M5',
            'inhensivefeature_code' => 'MB1',
            'plotavailability_code' => 'available',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]]);
        $this->call(PlotPriceSeeder::class);
        $this->call(PlotDimensionSeeder::class);
        $this->call(MemberProfileSeeder::class);
        $this->call(ReservationSeeder::class);


    }
}
