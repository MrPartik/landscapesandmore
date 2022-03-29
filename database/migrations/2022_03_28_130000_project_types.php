<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_types', function(Blueprint $oTable) {
            $oTable->bigIncrements('project_type_id');
            $oTable->string('name');
            $oTable->string('description')->nullable();
            $oTable->tinyInteger('is_active')->default(1);
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
        Schema::dropIfExists('project_types');
    }
}
