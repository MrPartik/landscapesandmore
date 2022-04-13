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
            $oTable->text('first_name');
            $oTable->text('last_name');
            $oTable->text('email');
            $oTable->text('phone');
            $oTable->text('home_address');
            $oTable->text('city_address');
            $oTable->text('zip_code');
            $oTable->text('project_description');
            $oTable->string('reference');
            $oTable->text('message');
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
        Schema::dropIfExists('contact_us');
    }
}
