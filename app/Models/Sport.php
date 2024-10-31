<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sport extends Model
{
    use HasFactory;

    protected $primaryKey = 'sport_id';

    protected $fillable = [
        'name',
        'icon',
    ];

    public function venues() :HasMany
    {
        return $this->hasMany(VenueSport::class, 'sport_id');
    }
}
