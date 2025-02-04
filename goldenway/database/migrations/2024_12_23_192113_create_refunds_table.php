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
    
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->constrained('payments')->onDelete('cascade'); // Links refund to the original payment
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade'); // Links refund to the customer
            $table->decimal('refund_amount', 10, 2);
            $table->text('reason')->nullable(); // Reason for the refund
            $table->enum('refund_status', ['pending', 'approved', 'rejected'])->default('pending'); // Status of refund
            $table->timestamp('refund_date')->nullable(); // The date refund is processed
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
