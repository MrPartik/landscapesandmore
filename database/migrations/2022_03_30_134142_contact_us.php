<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactUs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us', function(Blueprint $oTable) {
            $oTable->bigIncrements('contact_us_id');
            $oTable->string('first_name');
            $oTable->string('last_name');
            $oTable->string('email');
            $oTable->string('home_address');
            $oTable->string('city_address');
            $oTable->string('zip_code');
            $oTable->string('project_description');
            $oTable->string('message');
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
        Schema::dropIfExists('awards');
    }
}
