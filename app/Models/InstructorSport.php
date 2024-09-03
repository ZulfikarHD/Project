<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InstructorSport extends Model
{
    use HasFactory;

    protected $primaryKey = 'instructor_sport_id';

    protected $fillable = [
        'instructor_id',
        'sport_id',
    ];

    public function instructor() : BelongsTo
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }

    public function sport() : BelongsTo
    {
        return $this->belongsTo(Sport::class, 'sport_id');
    }
}
