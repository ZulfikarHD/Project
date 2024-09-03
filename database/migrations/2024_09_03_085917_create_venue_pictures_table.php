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
        Schema::create('venue_pictures', function (Blueprint $table) {
            $table->id('venue_picture_id');
            $table->foreignId('venue_id')->constrained('venues')->references('venue_id');
            $table->string('venue_picture');
            $table->integer('pic_num');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venue_pictures');
    }
};
