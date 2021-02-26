<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sectors')->insert([[
            'name' => 'Sectors 1',
            'code' => 'sec1',
            'description' => 'this is for Gulshan-E-Habib housing society Sectors 1',
            'society_code' => 'GEHHS',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'Sectors 2',
            'code' => 'sec2',
            'description' => 'this is for Gulshan-E-Habib housing society Sectors 2',
            'society_code' => 'GEHHS',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'Sectors 3',
            'code' => 'sec3',
            'description' => 'this is for Gulshan-E-Habib housing society Sectors 3',
            'society_code' => 'GEHHS',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]]);

        $this->call(BlockSeeder::class);

    }
}
