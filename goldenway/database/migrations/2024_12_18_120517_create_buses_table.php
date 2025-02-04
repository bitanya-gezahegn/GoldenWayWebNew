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
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:goldenway/database/migrations/2024_12_18_120517_create_trips_table.php
            $table->foreignId('route_id')->constrained('routes')->onDelete('cascade'); // Links to the route
            $table->date('date'); // Date of the trip
            $table->time('departure_time'); // Departure time
            $table->time('arrival_time'); // Arrival time
            $table->float('price'); // Price for the trip
            $table->integer('capacity'); // Capacity of the trip
=======
            $table->string('bus_type');
            $table->string('plate_number')->unique();
>>>>>>> 58c7d06 (my  changes):goldenway/database/migrations/2024_12_18_120517_create_buses_table.php
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('routes');
    }
};
