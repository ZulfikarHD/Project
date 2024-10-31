<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VenueImage extends Model
{
    use HasFactory;

    protected $primaryKey = 'venue_image_id';
    protected $table = 'venue_images';

    protected $fillable = [
        'venue_id',
        'image_url',
        'pic_num'
    ];

    public function venue() : BelongsTo
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }

    public static function countImagesByVenueId($venueId)
    {
        return self::where('venue_id', $venueId)->count();
    }

}
