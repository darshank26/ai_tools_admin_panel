<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tools extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'title',
        'image',
        'logo',
        'description',
        'pros',
        'cons',
        'is_free',
        'is_paid',
        'is_freemium',
        'is_free_trial',
        'url',
        'status',
        'short_description',
        'is_featured',

    ];
}
