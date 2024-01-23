<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolSubmission extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_logo',
        'product_image',
        'url',
        'pricing',
        'short_description',
        'long_description',
        'tags',
        'your_name',
        'your_email',
        'twitter_handle',
        'status',
    ];
}
