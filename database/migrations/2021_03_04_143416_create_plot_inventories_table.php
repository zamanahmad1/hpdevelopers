<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plot_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->longText('description');
            $table->float('area');
            $table->string('shape_code');
            $table->string('street_code');
            $table->string('plotcategory_code');
            $table->string('plottype_code');
            $table->string('plotstatus_code');
            $table->string('plotsize_code');
            $table->string('inhensivefeature_code');
            $table->string('plotavailability_code');
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
        Schema::dropIfExists('plot_inventories');
    }
}
