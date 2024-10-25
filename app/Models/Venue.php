<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model
{
    use HasFactory;

    protected $primaryKey = 'venue_id';

    protected $fillable = [
        'owner_id',
        'name',
        'address',
        'description',
        'latitude',
        'longitude',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function sports(): HasMany
    {
        return $this->hasMany(VenueSport::class, 'venue_id');
    }

    public function pictures(): HasMany
    {
        return $this->hasMany(VenuePicture::class, 'venue_id');
    }

    public function fields() : HasMany
    {
        return $this->hasMany(VenueField::class);
    }

    public function timeSlots() : HasMany
    {
        return $this->hasMany(TimeSlot::class, 'venue_id','venue_id');
    }

    public function startingPrice() : HasMany
    {
        return $this->hasMany(TimeSlot::class, 'venue_id','venue_id')->limit(1);
    }

}
