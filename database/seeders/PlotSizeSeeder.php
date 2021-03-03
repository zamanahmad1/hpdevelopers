<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlotSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plot_sizes')->insert([[
            'name' => '5 Marla',
            'code' => 'M5',
            'description' => 'this is for 5 Marla Plot',
            'installment_price' => '1000000',
            'cash_price' => '800000',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ],[
            'name' => '3 Marla',
            'code' => 'M3',
            'description' => 'this is for 3 Marla Plot',
            'installment_price' => '1200000',
            'cash_price' => '1000000',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ],[
            'name' => '2.5 Marla',
            'code' => 'M2.5',
            'description' => 'this is for 2.5 Marla Plot',
            'installment_price' => '1300000',
            'cash_price' => '1100000',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')


        ]]);
    }
}
