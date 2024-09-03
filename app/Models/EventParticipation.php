<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventParticipation extends Model
{
    use HasFactory;

    protected $primaryKey = 'participation_id';

    protected $fillable = [
        'event_id',
        'user_id',
        'status',
    ];

    public function event() : BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
