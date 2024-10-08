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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id('equipment_id');
            $table->foreignId('venue_id')->constrained('venues')->references('venue_id')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
            $table->string('name');
            $table->integer('quantity');
            $table->enum('status', ['available', 'in maintenance']);
            $table->date('last_maintenance_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
