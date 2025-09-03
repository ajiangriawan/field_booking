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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('field_id')->constrained()->cascadeOnDelete();
            $table->date('booking_date');
            $table->decimal('total_price', 10, 2);
            $table->decimal('dp_amount', 10, 2); // 20% dari total
            $table->decimal('remaining_amount', 10, 2);
            $table->enum('payment_method', ['cash', 'transfer']);
            $table->enum('status', ['pending', 'dp_paid', 'fully_paid', 'cancelled'])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};