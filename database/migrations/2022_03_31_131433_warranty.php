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
            $oTable->string('first_name', 100);
            $oTable->string('last_name', 100);
            $oTable->string('email', 100);
            $oTable->string('phone', 100);
            $oTable->string('home_address', 100);
            $oTable->string('city_address', 50);
            $oTable->string('zip_code', 50);
            $oTable->text('often_water');
            $oTable->text('knowledge_in_plant');
            $oTable->boolean('following_watering_guide');
            $oTable->datetime('was_resolved')->nullable();
            $oTable->text('remarks')->nullable();
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
