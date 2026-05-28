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
        Schema::create('payments', function (Blueprint $table) {
    $table->id();
    $table->foreignId('booking_id')->constrained()->cascadeOnDelete();
    $table->string('midtrans_order_id')->unique(); // booking_code + _dp atau _lunas
    $table->string('midtrans_transaction_id')->nullable();
    $table->enum('payment_type', ['dp', 'full']); // DP atau Lunas
    $table->decimal('amount', 10, 2);
    $table->string('payment_method')->nullable(); // gopay, bank_transfer, qris dll
    $table->enum('status', ['pending', 'success', 'failed', 'expired'])->default('pending');
    $table->timestamp('paid_at')->nullable();
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
