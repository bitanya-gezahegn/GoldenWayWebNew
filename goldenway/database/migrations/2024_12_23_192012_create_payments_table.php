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
<<<<<<< HEAD:goldenway/database/migrations/2024_12_18_194953_create_payments_table.php
    {     Schema::create('payments', function (Blueprint $table) {
=======
    { Schema::create('payments', function (Blueprint $table) {
>>>>>>> 58c7d06 (my  changes):goldenway/database/migrations/2024_12_23_192012_create_payments_table.php
        $table->id();
        $table->foreignId('ticket_id')->constrained('tickets')->onDelete('cascade'); // Links payment to a ticket
        $table->foreignId('customer_id')->constrained('users')->onDelete('cascade'); // Links payment to the customer
        $table->decimal('amount', 10, 2);
        $table->enum('payment_method', ['credit_card', 'paypal', 'cash', 'bank_transfer']);
<<<<<<< HEAD:goldenway/database/migrations/2024_12_18_194953_create_payments_table.php
        $table->string('payment_status')->default('completed'); // e.g., 'completed', 'failed', 'pending'
=======
        $table->enum('payment_status', ['completed', 'failed', 'pending'])->default('completed'); 
>>>>>>> 58c7d06 (my  changes):goldenway/database/migrations/2024_12_23_192012_create_payments_table.php
        $table->enum('ticket_status', ['unchecked', 'checked'])->default('unchecked'); // New column for ticket status
        $table->timestamp('payment_date')->useCurrent();
        $table->string('tx_ref')->unique();
        $table->timestamps();
    });
  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
