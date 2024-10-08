<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VenueField extends Model
{
    use HasFactory;

    protected $fillable = ['venue_id', 'name','description'];

    public function venue() : BelongsTo
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }

    // Accessors for sports and equipment JSON
    public function getSportsAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getEquipmentAttribute($value)
    {
        return json_decode($value, true);
    }
}
