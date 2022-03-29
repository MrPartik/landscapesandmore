<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Awards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awards', function(Blueprint $oTable) {
            $oTable->bigIncrements('awards_id');
            $oTable->unsignedBigInteger('user_id');
            $oTable->string('url');
            $oTable->string('description');
            $oTable->tinyInteger('is_active')->default(1);
            $oTable->timestamps();

            $oTable->foreign('user_id')
                ->on('users')
                ->references('id');
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
