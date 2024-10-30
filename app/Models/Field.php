<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Field extends Model
{
    use HasFactory;

    protected $fillable = ['venue_id', 'name','description'];

    public function venue() : BelongsTo
    {
        return $this->belongsTo(Venue::class, 'venue_id', 'venue_id');
    }

    public function fieldImages() : HasMany
    {
        return $this->hasMany(FieldImage::class, 'field_id', 'field_id');
    }

    public function FieldSports() : HasMany
    {
        return $this->hasMany(FieldSport::class, 'field_id', 'field_id');
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
