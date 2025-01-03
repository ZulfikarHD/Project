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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('review_id');
            $table->foreignId('user_id')->constrained('users')->references('user_id')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
            $table->foreignId('venue_id')->constrained('venues')->references('venue_id')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
            $table->foreignId('owner_id')->constrained('owners')->references('owner_id')
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');
            $table->integer('rating');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
