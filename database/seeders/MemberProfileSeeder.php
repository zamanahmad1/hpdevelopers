<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_profiles')->insert([[
            'name' => 'awais',
            'code' => 'mem1',
            'cnic' => '4567890345678',
            'dob' => '2020-12-04',
            'email' => 'awais@gmail.com',
            'father_name' => 'javed',
            'address' => 'jfdljfldsfsdl vljvjv',
            'cnic_issuance' => '2020-12-11',
            'cnic_expiry' => '2020-12-18',
            'mobile_no' => '00001303133313',
            'resedential_no' => '00303131131013',
            'notification_no' => '0330303131',
            'cnic_front' => '201202cnic_front83578.jpg',
            'cnic_back' => '201202cnic_back16521.jpeg',
            'picture' => '201202picture25623.jpeg',
            'country_code' => 'PAK',
            'province_code' => 'PUN',
            'city_code' => 'LHR',
            'description' => 'awais IS A BUYER',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')

        ],[
            'name' => 'Syed Suqlain Raza',
            'code' => 'mem2',
            'cnic' => '3520158936721',
            'dob' => '2020-12-12',
            'email' => 'suqlain@gmail.com',
            'father_name' => 'Syed Raza',
            'address' => 'ho # 968 canal view society',
            'cnic_issuance' => '2020-12-12',
            'cnic_expiry' => '2020-12-05',
            'mobile_no' => '00001303133313',
            'resedential_no' => '00303131131013',
            'notification_no' => '0330303131',
            'cnic_front' => '201219cnic_front20664.jpg',
            'cnic_back' => '201219cnic_back4360.jpg',
            'picture' => '201219picture89544.jpg',
            'country_code' => 'PAK',
            'province_code' => 'PUN',
            'city_code' => 'LHR',
            'description' => 'this is for Syed Suqlain Raza.',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')

        ],[
            'name' => 'Rana Qasim',
            'code' => 'mem3',
            'cnic' => '3510156789112',
            'dob' => '2020-12-05',
            'email' => 'qasim@gmail.com',
            'father_name' => 'Rana',
            'address' => 'ho # 465 F-block johar town Lahore.',
            'cnic_issuance' => '2020-12-11',
            'cnic_expiry' => '2020-12-18',
            'mobile_no' => '00001303133313',
            'resedential_no' => '00303131131013',
            'notification_no' => '0330303131',
            'cnic_front' => '201219cnic_front92235.PNG',
            'cnic_back' => '201219cnic_back982.jpg',
            'picture' => '201219picture22741.jpg',
            'country_code' => 'PAK',
            'province_code' => 'PUN',
            'city_code' => 'LHR',
            'description' => 'Qasim IS A BUYER',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')

        ],[
            'name' => 'Rana Ali',
            'code' => 'mem4',
            'cnic' => '3530113213541',
            'dob' => '2020-12-04',
            'email' => 'ali@gmail.com',
            'father_name' => 'Rana',
            'address' => 'ho #90 itfeeaq town Lahore',
            'cnic_issuance' => '2020-12-11',
            'cnic_expiry' => '2020-12-31',
            'mobile_no' => '00001303133313',
            'resedential_no' => '00303131131013',
            'notification_no' => '0330303131',
            'cnic_front' => '201219cnic_front87109.png',
            'cnic_back' => '201219cnic_back81084.jpg',
            'picture' => '201219picture69119.jpg',
            'country_code' => 'PAK',
            'province_code' => 'PUN',
            'city_code' => 'LHR',
            'description' => 'Rana Ali IS A BUYER',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')

        ],[
            'name' => 'Farukh Lodhi',
            'code' => 'mem5',
            'cnic' => '3530113213543',
            'dob' => '2020-12-04',
            'email' => 'lodhi@gmail.com',
            'father_name' => 'Zubair',
            'address' => 'h # 465 sallai mor faisalabad',
            'cnic_issuance' => '2020-12-11',
            'cnic_expiry' => '2021-01-07',
            'mobile_no' => '00001303133313',
            'resedential_no' => '00303131131013',
            'notification_no' => '0330303131',
            'cnic_front' => '201219cnic_front17522.jpg',
            'cnic_back' => '201219cnic_back23461.jpg',
            'picture' => '201219picture54875.png',
            'country_code' => 'PAK',
            'province_code' => 'PUN',
            'city_code' => 'LHR',
            'description' => 'Farukh Lodhi IS A BUYER',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')

        ],[
            'name' => 'Basharat',
            'code' => 'mem6',
            'cnic' => '351121334568',
            'dob' => '2020-12-26',
            'email' => 'basharat@gmail.com',
            'father_name' => 'Rana',
            'address' => 'h# 420 gulshan-e-ravi lahore',
            'cnic_issuance' => '2020-12-11',
            'cnic_expiry' => '2021-02-27',
            'mobile_no' => '00001303133313',
            'resedential_no' => '00303131131013',
            'notification_no' => '0330303131',
            'cnic_front' => '201219cnic_front58037.jpg',
            'cnic_back' => '201219cnic_back23616.jpg',
            'picture' => '201219cnic_back23616.jpg',
            'country_code' => 'PAK',
            'province_code' => 'PUN',
            'city_code' => 'LHR',
            'description' => 'Basharat IS A BUYER',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]]);

        DB::table('member_ships')->insert([
            'code' => 'mem1GEHHS2012029559B',
            'memberprofile_code' => 'mem1',
            'society_code' => 'GEHHS',
            'membertype' => 'B',
            'description' => 'this is for member 1',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);

        DB::table('dealer_ships')->insert([
            'code' => 'mem2GEHHS2012029559D',
            'memberprofile_code' => 'mem2',
            'society_code' => 'GEHHS',
            'membertype' => 'D',
            'description' => 'this is for Dealer 1',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);

    }
}
