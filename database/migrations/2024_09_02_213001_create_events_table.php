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
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id');
            $table->foreignId('venue_id')->constrained('venues')->references('venue_id')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
            $table->foreignId('owner_id')->constrained('owners')->references('owner_id')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('event_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('max_participants');
            $table->decimal('fee', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
