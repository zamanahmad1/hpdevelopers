<?php

namespace Database\Seeders;

use App\Models\PlotAvailability;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StreetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('streets')->insert([[
            'name' => 'Street 1',
            'code' => 'str1',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street ',
            'block_code' => 'bloa',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'Street 2',
            'code' => 'str2',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block b Street ',
            'block_code' => 'blob',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'Street 3',
            'code' => 'str3',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block c Street ',
            'block_code' => 'bloc',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'Street 4',
            'code' => 'str4',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 2 Block d Street ',
            'block_code' => 'blod',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'Street 5',
            'code' => 'str5',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 2 Block e Street ',
            'block_code' => 'bloe',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'Street 6',
            'code' => 'str6',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 2 Block f Street ',
            'block_code' => 'blof',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]]);
        $this->call(PlotTypeSeeder::class);
        $this->call(PlotStatusSeeder::class);
        $this->call(PlotCategorySeeder::class);
        $this->call(PlotShapeSeeder::class);
        $this->call(PlotAvailabilitySeeder::class);
        $this->call(PlotInhensiveFeatureSeeder::class);
        $this->call(PlotSizeSeeder::class);


    }
}
