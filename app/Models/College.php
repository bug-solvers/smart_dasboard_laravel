<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class College extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = [
        'name'
    ];

    protected $fillable = [
        'name'
    ];

    public static array $translatableColumns = [
        'name'=>[
            'type'=>'text',
            'is_textarea'=>false
        ],
    ];

    public static function getTranslatableFields(): array
    {
        return array_keys(self::$translatableColumns);
    }
}
