<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Careers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function(Blueprint $oTable) {
            $oTable->bigIncrements('careers_id');
            $oTable->string('name', 100);
            $oTable->string('address', 300);
            $oTable->string('email', 50)->nullable();
            $oTable->string('phone', 50)->nullable();
            $oTable->string('position_applying', 300)->nullable();
            $oTable->string('driver_license', 300)->nullable();
            $oTable->string('streak_box_key', 300)->nullable();
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
        Schema::dropIfExists('careers');
    }
}
