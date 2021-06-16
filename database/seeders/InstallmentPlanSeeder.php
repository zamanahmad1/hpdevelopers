<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstallmentPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('installment_plans')->insert([[
            'name' => '2.5 Marla 2 Year',
            'code' => '2.5M2y',
            'booking' => '10',
            'allocation' => '10',
            'confirmation' => '5',
            'months' => '30',
            'monthly_installment' => '2.5',
            'quarterly_installment' => '0',
            'midyear_installment' => '0',
            'yearly_installment' => '0',
            'possession' => '0',
            'total' => '100',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 8 price ',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => '3 Marla 2 Year',
            'code' => '3M2y',
            'booking' => '10',
            'allocation' => '10',
            'confirmation' => '5',
            'months' => '30',
            'monthly_installment' => '2.5',
            'quarterly_installment' => '0',
            'midyear_installment' => '0',
            'yearly_installment' => '0',
            'possession' => '0',
            'total' => '100',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 8 price ',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ],[
            'name' => '5 Marla 2 Year',
            'code' => '5M2y',
            'booking' => '10',
            'allocation' => '10',
            'confirmation' => '5',
            'months' => '30',
            'monthly_installment' => '2.5',
            'quarterly_installment' => '0',
            'midyear_installment' => '0',
            'yearly_installment' => '0',
            'possession' => '0',
            'total' => '100',
            'description' => 'this is for Gulshan-E-Habib housing society Sector 1 Block a Street plot 8 price ',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]]);
    }
}
