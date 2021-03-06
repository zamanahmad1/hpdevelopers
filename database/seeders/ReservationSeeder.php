<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservation_statuses')->insert([[
            'name' => 'Active',
            'code' => 'active',
            'description' => 'this is for active',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'Pending',
            'code' => 'pending',
            'description' => 'this is for pending',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'Processed',
            'code' => 'processed',
            'description' => 'this is for Processed',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'Rejected',
            'code' => 'rejected',
            'description' => 'this is for Rejected',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]]);

        DB::table('reservations')->insert([[
            'plot_code' => 'p4',
            'memberprofile_code' => 'mem1',
            'reserved_till' => '2021-01-25',
            'reservation_status' => 'active',
            'description' => 'this is for bla bla bla',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]]);
    }
}
