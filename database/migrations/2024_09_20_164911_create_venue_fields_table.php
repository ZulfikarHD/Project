<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenueFieldsTable extends Migration
{
    public function up()
    {
        Schema::create('venue_fields', function (Blueprint $table) {
            $table->id('field_id');
            $table->foreignId('venue_id')->constrained('venues')->references('venue_id')->onDelete('cascade');
            $table->string('name');
            $table->string('description');
            $table->string('image_url')->nullable(); // URL of the image (if uploaded)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('venue_fields');
    }
}
