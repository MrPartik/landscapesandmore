<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Warranty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranty', function(Blueprint $oTable) {
            $oTable->bigIncrements('warranty_id');
            $oTable->text('first_name');
            $oTable->text('last_name');
            $oTable->text('email');
            $oTable->text('phone');
            $oTable->text('home_address');
            $oTable->text('city_address');
            $oTable->text('zip_code');
            $oTable->text('often_water');
            $oTable->text('knowledge_in_plant');
            $oTable->boolean('following_watering_guide');
            $oTable->text('images');
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
        Schema::dropIfExists('warranty');
    }
}
