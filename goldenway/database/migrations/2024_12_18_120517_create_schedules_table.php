<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bus_id');
            $table->unsignedBigInteger('route_id');
            $table->unsignedBigInteger('driver_id');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->timestamps();

            $table->foreign('bus_id')->references('id')->on('buses');
            $table->foreign('route_id')->references('id')->on('routes');
            $table->foreign('driver_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
