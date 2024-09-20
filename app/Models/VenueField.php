<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueField extends Model
{
    use HasFactory;

    protected $fillable = ['venue_id', 'name', 'sports', 'equipment', 'image_url'];

    public function venue()
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
