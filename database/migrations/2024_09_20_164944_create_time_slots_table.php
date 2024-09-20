<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeSlotsTable extends Migration
{
    public function up()
    {
        Schema::create('time_slots', function (Blueprint $table) {
            $table->id('slot_id');
            $table->foreignId('venue_id')->constrained('venues')->onDelete('cascade');
            $table->string('day'); // e.g., Monday, Tuesday
            $table->time('start_time');
            $table->time('end_time');
            $table->decimal('price', 8, 2); // Pricing per session
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('time_slots');
    }
}
