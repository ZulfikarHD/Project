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
            $table->id('booking_id');
            $table->foreignId('user_id')->constrained('users')->references('user_id')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
            $table->foreignId('venue_id')->constrained('venues')->references('venue_id')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
            $table->foreignId('package_id')->nullable()->constrained('event_packages')->references('package_id')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
            $table->foreignId('pricing_rule_id')->nullable()->constrained('dynamic_pricing_rules')->references('pricing_rule_id')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
            $table->date('booking_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->decimal('total_price', 8, 2);
            $table->enum('status', ['confirmed', 'canceled']);
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
