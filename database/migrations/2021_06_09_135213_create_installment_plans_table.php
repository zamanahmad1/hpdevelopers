<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installment_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->float('booking');
            $table->float('allocation');
            $table->float('confirmation');
            $table->float('months');
            $table->float('monthly_installment');
            $table->float('quarterly_installment')->nullable();
            $table->float('midyear_installment')->nullable();
            $table->float('yearly_installment')->nullable();
            $table->float('possession')->nullable();
            $table->float('total');
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
        Schema::dropIfExists('installment_plans');
    }
}
