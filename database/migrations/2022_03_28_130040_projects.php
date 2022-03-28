<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Projects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function(Blueprint $oTable) {
            $oTable->bigIncrements('project_id');
            $oTable->unsignedBigInteger('project_type_id');
            $oTable->string('url');
            $oTable->string('description');
            $oTable->timestamps();

            $oTable->foreign('project_type_id')
                ->on('project_types')
                ->references('project_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
