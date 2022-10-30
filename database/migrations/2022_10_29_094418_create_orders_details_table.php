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
        Schema::create('orders_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount');
            $table->float('price');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('watch_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('watch_id')->references('id')->on('watches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_details');
    }
};