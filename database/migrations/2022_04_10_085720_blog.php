<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function(Blueprint $oTable) {
            $oTable->bigIncrements('blog_id');
            $oTable->unsignedBigInteger('user_id');
            $oTable->string('featured_image');
            $oTable->text('title')->unique();
            $oTable->text('description');
            $oTable->text('tags');
            $oTable->longText('content');
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
        Schema::dropIfExists('blog');
    }
}
