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
            $oTable->string('first_name', 100);
            $oTable->string('last_name', 100);
            $oTable->string('email', 100);
            $oTable->string('phone', 100);
            $oTable->string('home_address', 100);
            $oTable->string('city_address', 50);
            $oTable->string('zip_code', 50);
            $oTable->text('project_description');
            $oTable->string('reference', 100);
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
