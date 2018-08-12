<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('roomName', 100);
            $table->string('area', 25);
            $table->double('price');
            $table->integer('totalRoom');
            $table->integer('availableRoom');
            $table->string('address', 100);
            $table->string('city', 50);
            $table->unsignedInteger('ownerID');
            $table->foreign('ownerID')->references('id')->on('owners')->onDelete('cascade');
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
        Schema::dropIfExists('rooms');
    }
}
