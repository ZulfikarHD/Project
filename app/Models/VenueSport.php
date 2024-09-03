<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VenueSport extends Model
{
    use HasFactory;

    protected $primaryKey = 'venue_sport_id';

    protected $fillable = [
        'venue_id',
        'sport_id',
        'price_per_hour',
        'availability',
    ];

    public function venue() : BelongsTo
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }

    public function sport() : BelongsTo
    {
        return $this->belongsTo(Sport::class, 'sport_id');
    }
}
