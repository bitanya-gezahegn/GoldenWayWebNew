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
    { Schema::create('schedules', function (Blueprint $table) {
        $table->id();
        $table->foreignId('trip_id')->constrained('trips')->onDelete('cascade'); // Links to the trip
        $table->foreignId('bus_id')->constrained('buses')->onDelete('cascade'); // Links to the bus
        $table->foreignId('driver_id')->constrained('users')->onDelete('cascade'); // Links to the driver
        $table->string('status'); // Status of the schedule (e.g., scheduled, completed)
        $table->timestamps();
    });
    
    
        
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
