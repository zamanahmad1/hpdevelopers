<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->string('cnic')->unique();
            $table->date('dob');
            $table->string('email');
            $table->string('father_name');
            $table->string('address');
            $table->date('cnic_issuance');
            $table->date('cnic_expiry');
            $table->string('mobile_no');
            $table->string('resedential_no');
            $table->string('notification_no');
            $table->string('cnic_front');
            $table->string('cnic_back');
            $table->string('picture');
            $table->string('country_code');
            $table->string('province_code');
            $table->string('city_code');
            $table->longText('description');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_profiles');
    }
}
