<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueAddress extends Model
{
    use HasFactory;

    protected $primaryKey = 'venue_address_id';

    protected $fillable = [
        'country',
        'province',
        'city',
        'district',
        'sub_district',
        'latitude',
        'longtitude',
    ];
}
