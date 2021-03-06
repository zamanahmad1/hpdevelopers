<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlotPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plot_prices')->insert([[
            'name' => 'price plot 1',
            'code' => 'pp1',
            'plot_code' => 'p1',
            'installment_price' => '10',
            'cash_price' => '10',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 1 price ',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'price plot 2',
            'code' => 'pp2',
            'plot_code' => 'p2',
            'installment_price' => '10',
            'cash_price' => '10',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 2 price ',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'price plot 3',
            'code' => 'pp3',
            'plot_code' => 'p3',
            'installment_price' => '10',
            'cash_price' => '10',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 3 price ',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'price plot 4',
            'code' => 'pp4',
            'plot_code' => 'p4',
            'installment_price' => '10',
            'cash_price' => '10',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 4 price ',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'price plot 5',
            'code' => 'pp5',
            'plot_code' => 'p5',
            'installment_price' => '10',
            'cash_price' => '10',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 5 price ',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'price plot 6',
            'code' => 'pp6',
            'plot_code' => 'p6',
            'installment_price' => '10',
            'cash_price' => '10',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 6 price ',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'price plot 7',
            'code' => 'pp7',
            'plot_code' => 'p7',
            'installment_price' => '10',
            'cash_price' => '10',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 7 price ',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => 'price plot 8',
            'code' => 'pp8',
            'plot_code' => 'p8',
            'installment_price' => '10',
            'cash_price' => '10',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 8 price ',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]]);
    }
}
