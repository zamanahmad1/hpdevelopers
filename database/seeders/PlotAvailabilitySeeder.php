<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlotAvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plot_availabilities')->insert([[
            'name' => 'Available',
            'code' => 'available',
            'description' => 'this is for Available plot',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ],[
            'name' => 'Reserved',
            'code' => 'reserved',
            'description' => 'this is for Reserved plot',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ],[
            'name' => 'Booked',
            'code' => 'booked',
            'description' => 'this is for Booked plot',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ],[
            'name' => 'Sold',
            'code' => 'sold',
            'description' => 'this is for Sold plot',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ],[
            'name' => 'Cancelled',
            'code' => 'cancelled',
            'description' => 'this is for Cancelled plot',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ]]);
    }
}
