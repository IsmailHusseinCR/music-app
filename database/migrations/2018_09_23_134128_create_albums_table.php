<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamp('added_on');
            $table->unsignedInteger('artist_id');
            $table->foreign('artist_id')->references('id')->on('artists');
            $table->unsignedInteger('songin_albums_id');
            $table->foreign('songin_albums_id')->references('id')->on('songin_albums');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
