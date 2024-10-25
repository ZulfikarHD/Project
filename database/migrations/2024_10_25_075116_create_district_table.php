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
        Schema::create('district', function (Blueprint $table) {
            $table->id('district_id');
            $table->foreignId('city_id')
                  ->constrained('city')
                  ->references('city_id')
                  ->onUpdate('CASCADE')
                  ->onDelete('CASCADE');
            $table->string('name',50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('district');
    }
};
