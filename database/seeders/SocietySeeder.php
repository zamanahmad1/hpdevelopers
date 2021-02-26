<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('societies')->insert([
            'name' => 'Gulshan-E-Habib',
            'code' => 'GEHHS',
            'description' => 'this is for Gulshan-E-Habib housing society',
            'project_code' => 'GEH',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        $this->call(SectorSeeder::class);

    }
}
