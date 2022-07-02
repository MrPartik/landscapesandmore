<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function(Blueprint $oTable) {
            $oTable->bigIncrements('project_details_id');
            $oTable->unsignedBigInteger('project_id');
            $oTable->string('title');
            $oTable->string('images');
            $oTable->string('date');
            $oTable->string('location');
            $oTable->string('value');
            $oTable->string('category');
            $oTable->text('description');
            $oTable->timestamps();

            $oTable->foreign('project_id')
                ->on('projects')
                ->references('project_id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_details');
    }
}
