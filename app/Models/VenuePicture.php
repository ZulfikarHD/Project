<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VenuePicture extends Model
{
    use HasFactory;

    protected $primaryKey = 'venue_picture_id';

    protected $fillable = [
        'venue_id',
        'image_url',
        'pic_num'
    ];

    public function venue() : BelongsTo
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }
}
