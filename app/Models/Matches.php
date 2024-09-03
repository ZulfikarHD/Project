<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Matches extends Model
{
    use HasFactory;

    protected $table = 'match';
    protected $primaryKey = 'match_id';

    protected $fillable = [
        'tournament_id',
        'team_a_id',
        'team_b_id',
        'match_date',
        'score_team_a',
        'score_team_b',
        'status',
    ];

    public function tournament() :BelongsTo
    {
        return $this->belongsTo(Tournament::class, 'tournament_id');
    }

    public function teamA() : BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_a_id');
    }

    public function teamB() : BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_b_id');
    }
}
