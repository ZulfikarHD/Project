<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Owner extends Model
{
    use HasFactory;

    protected $primaryKey = 'owner_id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'profile_picture',
        'business_name',
    ];

    protected $hidden = [
        'password',
    ];

    public function venues() : HasMany
    {
        return $this->hasMany(Venue::class, 'owner_id');
    }
}
