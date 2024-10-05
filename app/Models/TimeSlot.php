<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TimeSlot extends Model
{
    use HasFactory;

    protected $fillable = ['venue_id', 'day', 'start_time', 'end_time', 'price'];

    public function venue() : BelongsTo
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }
}
