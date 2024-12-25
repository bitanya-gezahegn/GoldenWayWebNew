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
    {  Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->foreignId('schedule_id')->constrained()->onDelete('cascade');
        $table->foreignId('customer_id')->constrained('users')->onDelete('cascade');
        $table->integer('seat_number');
        $table->enum('status', ['booked', 'canceled', 'completed'])->default('booked');
        $table->string('qr_code');
        $table->timestamps();
    });
        
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};