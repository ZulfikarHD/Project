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
        Schema::create('sub_district', function (Blueprint $table) {
            $table->id('sub_district_id');
            $table->foreignId('district_id')
                  ->constrained('district')
                  ->references('district_id')
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
        Schema::dropIfExists('sub_district');
    }
};
