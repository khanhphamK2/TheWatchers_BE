<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watches_genres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('watch_id');
            $table->unsignedBigInteger('genre_id');
            $table->foreign('watch_id')->references('id')->on('watches')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->unique(['watch_id', 'genre_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('watches_genres');
    }
};