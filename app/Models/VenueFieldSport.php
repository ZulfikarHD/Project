<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueFieldSport extends Model
{
    use HasFactory;

    protected $table = "venue_field_sports";

    protected $fillable = [
        'venue_field_id',
        'sport_id',
    ];

    public $timestamps = false;
}
