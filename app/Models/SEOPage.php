<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class SEOPage extends Model
{
    public static $models = [
        'Program'=>Program::class,
        'Module'=>Module::class
    ];
    public function seoable(): MorphTo
    {
        return $this->morphTo();
    }
}
