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
        'location',
        'description',
        'capacity',
        'amenities',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(VenueOwner::class, 'owner_id');
    }

    public function sports(): HasMany
    {
        return $this->hasMany(VenueSport::class, 'venue_id');
    }

    public function venue_pictures(): HasMany
    {
        return $this->hasMany(VenuePicture::class, 'venue_id');
    }
}
