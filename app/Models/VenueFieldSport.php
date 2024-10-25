<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldSport extends Model
{
    use HasFactory;

    protected $table = "field_sports";

    protected $fillable = [
        'field_id',
        'sport_id',
    ];

    public $timestamps = false;
}
