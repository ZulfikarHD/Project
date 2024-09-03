<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'booking_id',
        'user_id',
        'owner_id',
        'amount',
        'payment_date',
        'payment_method',
        'status',
    ];

    public function booking() : BelongsTo
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function owner() : BelongsTo
    {
        return $this->belongsTo(VenueOwner::class, 'owner_id');
    }
}
