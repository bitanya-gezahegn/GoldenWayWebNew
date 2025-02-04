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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('origin'); // Starting point of the route
            $table->string('destination'); // Ending point of the route
<<<<<<< HEAD
=======
            $table->decimal('distance', 8, 2)->nullable();
>>>>>>> 58c7d06 (my  changes)
            $table->json('bus_stops')->nullable(); // List of intermediate stops (if multiple)
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('routes');
    }
};
