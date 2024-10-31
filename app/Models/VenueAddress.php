<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class VenueAddress extends Model
{
    use HasFactory;

    protected $table = 'venue_address';
    protected $primaryKey = 'venue_address_id';
    public $timestamp = false;

    protected $fillable = [
        'venue_id',
        'country',
        'province',
        'city',
        'district',
        'sub_district',
        'latitude',
        'longtitude',
    ];

    public function venue() : HasOne
    {
        return $this->hasOne(Venue::class, 'venue_id', 'venue_id');
    }
}
