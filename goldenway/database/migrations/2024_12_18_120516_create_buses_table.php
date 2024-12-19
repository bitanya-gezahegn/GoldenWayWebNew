<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('plate_number')->unique();
            $table->integer('capacity');
            $table->enum('status', ['active', 'maintenance', 'inactive']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buses');
    }
};
