<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class LessonQuestion extends Model
{
    use HasFactory, HasTranslations;

    const PATH = 'images/lesson_questions';

    public static mixed $types = [
        'choice',
        'true_or_false',
        'text',
    ];
    public array $translatable = ['question'];

    protected $fillable = [
        'type',
        'question',
        'active',
        'lesson_id',
        'image',
        'video_url'
    ];

    public static array $translatableColumns = [
        'question'=>[
            'type'=>'text',
            'is_textarea'=>false
        ],
    ];

    public static function getTranslatableFields(): array
    {
        return array_keys(self::$translatableColumns);
    }
    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class,'lesson_id');
    }

    public function getImageAttribute($value): string
    {
        return asset(self::PATH. DIRECTORY_SEPARATOR. $value);
    }

    public function questionAnswers(): HasMany
    {
        return $this->hasMany(LessonQuestionAnswer::class, 'lesson_question_id', 'id');
    }
}
