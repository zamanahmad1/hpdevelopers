<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plot_sales', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('payment_type');
            $table->double('price');
            $table->double('discount')->nullable();
            $table->double('extracharges')->nullable();
            $table->longText('description');
            $table->string('installmentplan_code')->nullable();
            $table->string('plot_code');
            $table->string('membership_code');
            $table->string('user');
            $table->string('salestatus_code');
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
        Schema::dropIfExists('plot_sales');
    }
}
