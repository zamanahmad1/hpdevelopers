<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blocks')->insert([[
            'name' => 'BLock A',
            'code' => 'bloa',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a',
            'sector_code' => 'sec1',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'BLock B',
            'code' => 'blob',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block b',
            'sector_code' => 'sec1',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'BLock C',
            'code' => 'bloc',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block c',
            'sector_code' => 'sec1',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'BLock D',
            'code' => 'blod',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 2 Block d',
            'sector_code' => 'sec2',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'BLock E',
            'code' => 'bloe',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 2 Block e',
            'sector_code' => 'sec2',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'BLock F',
            'code' => 'blof',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 2 Block f',
            'sector_code' => 'sec2',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]]);
        $this->call(StreetSeeder::class);

    }
}
