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
        Schema::create('custom_pricing_rule', function (Blueprint $table) {
            $table->id('custom_pricing_rule_id');
            $table->foreignId('time_slot_id')
                  ->constrained('time_slots')
                  ->references('slot_id')
                  ->onUpdate('CASCADE')
                  ->onDelete('CASCADE');
            $table->date('date');
            $table->decimal('price_modifier', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_pricing_rule');
    }
};
