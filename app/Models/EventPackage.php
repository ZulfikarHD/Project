<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventPackage extends Model
{
    use HasFactory;

    protected $primaryKey = 'package_id';

    protected $fillable = [
        'owner_id',
        'name',
        'description',
        'base_price',
    ];

    public function owner() : BelongsTo
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(EventPackageItem::class, 'package_id');
    }
}
