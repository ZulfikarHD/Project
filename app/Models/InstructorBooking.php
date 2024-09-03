<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InstructorBooking extends Model
{
    use HasFactory;

    protected $primaryKey = 'instructor_booking_id';

    protected $fillable = [
        'booking_id',
        'instructor_id',
        'user_id',
        'start_time',
        'end_time',
        'total_fee',
        'status',
    ];

    public function booking() : BelongsTo
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function instructor() : BelongsTo
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
