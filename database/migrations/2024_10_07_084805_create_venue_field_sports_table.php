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
        Schema::create('venue_field_sports', function (Blueprint $table) {
            $table->foreignId('venue_field_id')->constrained('venue_fields')->references('field_id')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
            $table->foreignId('sport_id')->constrained('sports')->references('sport_id')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venue_field_sports');
    }
};
