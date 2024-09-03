<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserTeam extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_team_id';

    protected $fillable = [
        'user_id',
        'team_id',
        'role',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function team() : BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
