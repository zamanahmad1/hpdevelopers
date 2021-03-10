<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([[
            'name' => 'Pakistan',
            'code' => 'PAK',
            'description' => 'this is for pakistan',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'Kuwait',
            'code' => 'KUW',
            'description' => 'this is for Kuwait',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]]);

        DB::table('provinces')->insert([[
            'name' => 'Punjab',
            'code' => 'PUN',
            'country_code' => 'PAK',
            'description' => 'this is for Punjab pakistan',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'Sindh',
            'code' => 'SIN',
            'country_code' => 'PAK',
            'description' => 'this is for Sindh',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'Balochistan',
            'code' => 'BAL',
            'country_code' => 'PAK',
            'description' => 'this is for Balochistan',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'Khyber Pakhtun Khawa',
            'code' => 'KPK',
            'country_code' => 'PAK',
            'description' => 'this is for KPK',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]]);

        DB::table('cities')->insert([[
            'name' => 'Lahore',
            'code' => 'LHR',
            'province_code' => 'PUN',
            'description' => 'this is for Punjab pakistan',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'Karachi',
            'code' => 'KAR',
            'province_code' => 'SIN',
            'description' => 'this is for Karachi Sindh',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'Quetta',
            'code' => 'QUE',
            'province_code' => 'BAL',
            'description' => 'this is for Quetta Balochistan',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'Peshawar',
            'code' => 'PES',
            'province_code' => 'KPK',
            'description' => 'this is for Peshawar KPK',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]]);
    }
}
