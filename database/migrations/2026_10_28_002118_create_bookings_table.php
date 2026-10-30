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
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();

        // কোন সার্ভিস বুক করা হয়েছে
        $table->foreignId('service_id')
            ->constrained()
            ->cascadeOnDelete();

        // গ্রাহকের তথ্য
        $table->string('customer_name');
        $table->string('phone', 20);
        $table->string('address');
        $table->string('area');

        // বুকিংয়ের সময় ও সমস্যা
        $table->date('booking_date');
        $table->string('booking_time');
        $table->text('problem_description')->nullable();

        // মূল্য ও বুকিংয়ের অবস্থা
        $table->enum('price_type', ['fixed', 'quote']);
        $table->decimal('price', 10, 2)->nullable();
        $table->enum('status', [
            'pending',
            'confirmed',
            'completed',
            'cancelled'
        ])->default('pending');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
