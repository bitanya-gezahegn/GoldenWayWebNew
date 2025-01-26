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
        Schema::table('payments', function (Blueprint $table) {
            $table->string('tx_ref')->unique()->after('id'); // Add tx_ref column
        });
    }
    
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('tx_ref'); // Drop tx_ref column if rolled back
        });
    }
    
};
