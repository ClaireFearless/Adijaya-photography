<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
    $table->id();
    $table->string('booking_code')->unique();
    $table->foreignId('package_id')->constrained()->cascadeOnDelete();
    
    // Identitas Klien (tanpa login)
    $table->string('customer_name');
    $table->string('customer_email'); 
    $table->string('customer_wa');
    
    
    // Jadwal
    $table->date('booking_date');
    $table->time('start_time');
    $table->time('end_time');
    $table->string('location')->nullable();
    $table->text('notes')->nullable();
    
    // Payment
    $table->decimal('total_price', 10, 2);
    $table->decimal('dp_amount', 10, 2);
    $table->string('payment_type')->nullable();
    $table->enum('status', [
        'pending',
        'dp_paid',
        'paid',
        'completed',
        'canceled'
    ])->default('pending');
    $table->string('snap_token')->nullable();
    
    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};