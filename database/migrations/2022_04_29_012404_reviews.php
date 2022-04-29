<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function(Blueprint $oTable) {
            $oTable->bigIncrements('review_id');
            $oTable->string('author', 100);
            $oTable->text('summary')->nullable();
            $oTable->text('snippet')->nullable();
            $oTable->text('description')->nullable();
            $oTable->unsignedInteger('rating')->default(5);
            $oTable->string('date_in_text', 50)->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
