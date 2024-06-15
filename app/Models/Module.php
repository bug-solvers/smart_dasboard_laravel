<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class Module extends Model
{
    use HasFactory, HasTranslations;

    const PATH = 'images/modules';

    public array $translatable = ['name', 'description'];

    protected $fillable = [
        'name',
        'image',
        'description',
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

    public function getImageAttribute($value): string
    {
        return asset(self::PATH . DIRECTORY_SEPARATOR . $value);
    }
    public function programs(): BelongsToMany
    {
        return $this->belongsToMany(Program::class);
    }
}
