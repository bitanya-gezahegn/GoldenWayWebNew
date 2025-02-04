<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    
        Schema::create('issue_reports', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:goldenway/database/migrations/2024_12_18_120518_create_schedules_table.php
            $table->foreignId('trip_id')->constrained()->onDelete('cascade'); // Links to the trip
            $table->foreignId('driver_id')->constrained('users')->onDelete('cascade'); // Links to the driver
            $table->string('status'); // Status of the schedule (e.g., scheduled, completed)
=======
            $table->foreignId('driver_id')->constrained('users')->onDelete('cascade');
            $table->text('description');
            $table->timestamp('reported_at')->useCurrent();
>>>>>>> 58c7d06 (my  changes):goldenway/database/migrations/2024_12_23_192113_create_issue_reportss_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
