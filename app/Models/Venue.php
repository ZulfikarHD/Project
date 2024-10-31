<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Venue extends Model
{
    use HasFactory;

    protected $primaryKey = 'venue_id';

    protected $fillable = [
        'owner_id',
        'name',
        'description',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function address(): HasOne
    {
        return $this->hasOne(VenueAddress::class, 'venue_address_id');
    }

    public function sports(): HasMany
    {
        return $this->hasMany(VenueSport::class, 'venue_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(VenueImage::class, 'venue_id');
    }

    public function fields() : HasMany
    {
        return $this->hasMany(Field::class);
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
