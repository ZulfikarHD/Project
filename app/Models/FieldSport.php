<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FieldSport extends Model
{
    use HasFactory;

    protected $table = "field_sports";

    protected $fillable = [
        'field_id',
        'sport_id',
    ];

    public $timestamps = false;

    public function sportData() : HasOne
    {
        return $this->hasOne(Sport::class, 'sport_id', 'sport_id');
    }
}
