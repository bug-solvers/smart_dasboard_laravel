<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Lesson extends Model
{
    use HasFactory, HasTranslations;

    const PATH = 'images/lessons';
    public array $translatable = ['name', 'description'];

    protected $fillable = [
        'name',
        'description',
        'image',
        'is_free',
        'module_id'
    ];

    public static array $translatableColumns = [
        'name'=>[
            'type'=>'text',
            'is_textarea'=>false
        ],
        'description'=>[
            'type'=>'textarea',
            'is_textarea'=>true
        ]
    ];

    public static function getTranslatableFields(): array
    {
        return array_keys(self::$translatableColumns);
    }

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function getImageAttribute($value): string
    {
        return asset(self::PATH . DIRECTORY_SEPARATOR . $value);
    }
}
