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
    {       Schema::create('payments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('ticket_id')->constrained()->onDelete('cascade'); // Links payment to a ticket
        $table->foreignId('customer_id')->constrained('users')->onDelete('cascade'); // Links payment to the customer
        $table->decimal('amount', 8, 2);
        $table->enum('payment_method', ['credit_card', 'paypal', 'cash', 'bank_transfer']);
        $table->string('payment_status')->default('completed'); // e.g., 'completed', 'failed', 'pending'
        $table->timestamp('payment_date')->useCurrent();
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
