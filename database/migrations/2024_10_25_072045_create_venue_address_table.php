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
        Schema::create('venue_address', function (Blueprint $table) {
            $table->id('venue_address_id');
            $table->foreignId('venue_id')
                  ->constrained('venues')
                  ->references('venue_id')
                  ->onUpdate('CASCADE')
                  ->onDelete('CASCADE');
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('district');
            $table->string('sub_district');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venue_address');
    }
};
