<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InteractiveMapsCoordinates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interactive_maps_coordinates', function(Blueprint $oTable) {
            $oTable->bigIncrements('cmap_id');
            $oTable->unsignedBigInteger('map_id');
            $oTable->string('lat', 300);
            $oTable->string('long', 300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interactive_maps_coordinates');
    }
}
