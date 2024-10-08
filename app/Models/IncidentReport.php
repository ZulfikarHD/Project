<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IncidentReport extends Model
{
    use HasFactory;

    protected $primaryKey = 'incident_id';

    protected $fillable = [
        'venue_id',
        'user_id',
        'description',
        'status',
    ];

    public function venue() : BelongsTo
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
