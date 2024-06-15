<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Exam extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['title'];

    public static mixed $types = [
        'choice',
        'true_or_false',
        'text',
    ];

    protected $fillable = [
        'title',
        'type',
        'degree',
        'success_degree',
        'fail_degree',
        'lesson_id',
    ];

    public static array $translatableColumns = [
        'title'=>[
            'type'=>'text',
            'is_textarea'=>false
        ],
    ];
    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
}
