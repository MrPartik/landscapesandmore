<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InteractiveMaps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interactive_maps', function(Blueprint $oTable) {
            $oTable->bigIncrements('map_id');
            $oTable->string('map_name', 300);
            $oTable->string('map_type', 50);
            $oTable->text('map_description');
            $oTable->text('map_options');
            $oTable->text('map_images');
            $oTable->boolean('is_active')->default(true);
            $oTable->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interactive_maps');
    }
}
