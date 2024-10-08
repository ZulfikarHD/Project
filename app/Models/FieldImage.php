<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldImage extends Model
{
    use HasFactory;
    protected $table = 'field_images';
    protected $fillable = [
        'field_id',
        'image_url'
    ];
}
