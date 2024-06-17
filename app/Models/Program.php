<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\Translatable\HasTranslations;

class Program extends Model
{
    use HasTranslations;

    const PATH = 'images/programs';

    public array $translatable = ['name', 'description'];

    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'discount',
        'status',
        'college_id'
    ];

    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(Module::class);
    }

    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class, 'college_id');
    }


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


    public function seo(): MorphOne
    {
        return $this->morphOne(SEOPage::class, 'seoable');
    }
}
