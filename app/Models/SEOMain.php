<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEOMain extends Model
{
    protected $fillable = ['key', 'value'];

    public static $keys = [
        'meta_title' => 'text',
        'meta_description' => 'text',
        'meta_keywords' => 'text',
        'facebook_pixel' => 'text',
    ];
}
