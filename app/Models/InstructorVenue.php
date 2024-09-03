<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InstructorVenue extends Model
{
    use HasFactory;

    protected $primaryKey = 'instructor_venue_id';

    protected $fillable = [
        'instructor_id',
        'venue_id',
    ];

    public function instructor() : BelongsTo
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }

    public function venue() : BelongsTo
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }
}
