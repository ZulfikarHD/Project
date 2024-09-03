<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPromotion extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_promotion_id';

    protected $fillable = [
        'user_id',
        'promotion_id',
        'used_at',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function promotion() : BelongsTo
    {
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }
}
